<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = [
    'user_id',
    'buyer_name',
    'buyer_email',
    'buyer_phone',
    'event_id',
    'ticket_type_id',
    'ticket_type_name',
    'order_code',
    'quantity',
    'total_price',
    'status',
    ];

    protected $casts = [
        'total_price' => 'decimal:2',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getFormattedTotalAttribute(): string
    {
        return 'Rp ' . number_format($this->total_price, 0, ',', '.');
    }

    public function tickets()
    {
        return $this->hasMany(\App\Models\Ticket::class);
    }

    protected static function booted(): void
    {
        static::updated(function ($order) {
            if ($order->wasChanged('status')) {
                $changes = [
                    'status' => [
                        'from' => $order->getOriginal('status'),
                        'to'   => $order->status,
                    ],
                ];

                \App\Models\AuditLog::record(
                    'status changed',
                    'Order',
                    $order->order_code,
                    $changes
                );
            }
        });
    }
}