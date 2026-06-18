<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'venue',
        'city',
        'event_date',
        'event_time',
        'timezone',
        'price_start',
        'capacity',
        'tickets_sold',
        'description',
        'accent_color',
        'image_url',
        'is_featured',
        'is_trending',
    ];

    protected $casts = [
        'event_date'   => 'date',
        'is_featured'  => 'boolean',
        'is_trending'  => 'boolean',
        'price_start'  => 'decimal:2',
    ];

    // ── Accessor: format harga ke Rupiah
    public function getFormattedPriceAttribute(): string
    {
        return 'Rp ' . number_format($this->price_start, 0, ',', '.');
    }

    // ── Accessor: format tanggal ke "SAT, JUN 14"
    public function getShortDateAttribute(): string
    {
        return strtoupper($this->event_date->format('D, M j'));
    }

    // ── Accessor: persentase tiket terjual
    public function getSoldPercentageAttribute(): int
    {
        if ($this->capacity === 0) return 0;
        return (int) min(100, ($this->tickets_sold / $this->capacity) * 100);
    }

    // ── Scope: hanya event featured
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true)
                    ->whereDate('event_date', '>=', today())
                    ->orderBy('event_date');
    }

    // ── Scope: hanya event trending
    public function scopeTrending($query)
    {
        return $query->where('is_trending', true)
                    ->whereDate('event_date', '>=', today())
                    ->orderBy('event_date');
    }

    // ── Accessor: image dengan fallback
    public function getImageAttribute(): string
    {
        if ($this->image_url) {
            return $this->image_url;
        }

        // Fallback by category — foto statis Unsplash (source.unsplash.com sudah mati)
        return match($this->category) {
            'Concert'  => 'https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?w=1600&q=80',
            'Festival' => 'https://images.unsplash.com/photo-1470229722913-7c0e2dbbafd3?w=1600&q=80',
            'Comedy'   => 'https://images.unsplash.com/photo-1585699324551-f6c309eedeca?w=1600&q=80',
            'Theatre'  => 'https://images.unsplash.com/photo-1503095396549-807759245b35?w=1600&q=80',
            'Sports'   => 'https://images.unsplash.com/photo-1461896836934-ffe607ba8211?w=1600&q=80',
            default    => 'https://images.unsplash.com/photo-1540039155733-5bb30b53aa14?w=1600&q=80',
        };
    }

    public function ticketTypes()
    {
        return $this->hasMany(\App\Models\TicketType::class)->orderBy('sort_order');
    }

    // Accessor: harga termurah dari semua tipe (untuk "starting from")
    public function getLowestPriceAttribute(): float
    {
        $min = $this->ticketTypes()->min('price');
        return $min ?? $this->price_start;
    }

    public function show(string $slug)
    {
        $event = Event::where('slug', $slug)
                    ->with('ticketTypes')
                    ->firstOrFail();

        return view('events.show', compact('event'));
    }

    protected static function booted(): void
    {
        static::created(function ($event) {
            \App\Models\AuditLog::record('created', 'Event', $event->title);
        });

        static::updated(function ($event) {
            $changes = [];
            foreach ($event->getChanges() as $field => $newValue) {
                if ($field === 'updated_at') continue;

                $oldValue = $event->getOriginal($field);

                // Abaikan perubahan "semu" pada event_time (17:00:00 vs 17:00)
                if ($field === 'event_time') {
                    $oldNorm = \Carbon\Carbon::parse($oldValue)->format('H:i');
                    $newNorm = \Carbon\Carbon::parse($newValue)->format('H:i');
                    if ($oldNorm === $newNorm) continue; // jam sama, jangan catat
                }

                $changes[$field] = [
                    'from' => $oldValue,
                    'to'   => $newValue,
                ];
            }

            if ($changes) {
                \App\Models\AuditLog::record('updated', 'Event', $event->title, $changes ?: null);
            }
        });

        static::deleted(function ($event) {
            \App\Models\AuditLog::record('deleted', 'Event', $event->title);
        });
    }

    public function getFormattedTimeAttribute(): string
    {
        $time = \Carbon\Carbon::parse($this->event_time)->format('H:i');
        return $time . ' ' . ($this->timezone ?? 'WIB');
    }
}