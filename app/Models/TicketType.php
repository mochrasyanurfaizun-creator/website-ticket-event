<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TicketType extends Model
{
    protected $fillable = [
        'event_id', 'name', 'price', 'quota', 'sold', 'perks', 'sort_order',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function getFormattedPriceAttribute(): string
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    public function getRemainingAttribute(): int
    {
        return max(0, $this->quota - $this->sold);
    }

    public function getIsSoldOutAttribute(): bool
    {
        return $this->remaining <= 0;
    }

    public function getSoldPercentageAttribute(): int
    {
        if ($this->quota === 0) return 0;
        return (int) min(100, ($this->sold / $this->quota) * 100);
    }

    protected static function booted(): void
    {
        static::created(function ($type) {
            \App\Models\AuditLog::record(
                'created',
                'TicketType',
                $type->name . ' (' . ($type->event->title ?? 'Event #' . $type->event_id) . ')'
            );
        });

        static::updated(function ($type) {
            $changes = [];
            foreach ($type->getChanges() as $field => $newValue) {
                if (in_array($field, ['updated_at', 'sort_order'])) continue;
                $changes[$field] = [
                    'from' => $type->getOriginal($field),
                    'to'   => $newValue,
                ];
            }

            // Cuma catat kalau ada perubahan berarti
            if ($changes) {
                \App\Models\AuditLog::record(
                    'updated',
                    'TicketType',
                    $type->name . ' (' . ($type->event->title ?? 'Event #' . $type->event_id) . ')',
                    $changes
                );
            }
        });

        static::deleted(function ($type) {
            \App\Models\AuditLog::record(
                'deleted',
                'TicketType',
                $type->name . ' (' . ($type->event->title ?? 'Event #' . $type->event_id) . ')'
            );
        });
    }
}