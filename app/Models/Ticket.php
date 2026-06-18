<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    protected $fillable = ['order_id', 'ticket_code', 'status', 'used_at'];

    protected $casts = [
        'used_at' => 'datetime',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function getIsUsedAttribute(): bool
    {
        return $this->status === 'used';
    }
}