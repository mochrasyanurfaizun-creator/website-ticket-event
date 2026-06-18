<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    protected $fillable = [
        'user_id', 'user_name', 'action',
        'target_type', 'target_label', 'ip_address', 'changes',
    ];

    protected $casts = [
        'changes' => 'array',
    ];

    public static function record(
        string $action,
        string $targetType,
        ?string $targetLabel = null,
        ?array $changes = null
    ): void {
        $user = auth()->user();
        if (!$user || !$user->is_admin) return;

        self::create([
            'user_id'      => $user->id,
            'user_name'    => $user->name,
            'action'       => $action,
            'target_type'  => $targetType,
            'target_label' => $targetLabel,
            'ip_address'   => request()->ip(),
            'changes'      => $changes,
        ]);
    }
}