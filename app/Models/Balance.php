<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'points',
        'currency',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'points' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
