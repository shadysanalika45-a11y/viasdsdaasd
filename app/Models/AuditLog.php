<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'action',
        'payload',
    ];

    protected $casts = [
        'payload' => 'array',
    ];

    public static function record(string $action, ?User $user, array $payload = []): void
    {
        static::create([
            'user_id' => $user?->id,
            'action' => $action,
            'payload' => $payload,
        ]);
    }
}
