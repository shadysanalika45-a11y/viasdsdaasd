<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'url',
        'is_promoted',
        'points_awarded',
        'rating_total',
        'rating_count',
        'average_rating',
    ];

    protected $casts = [
        'is_promoted' => 'boolean',
        'points_awarded' => 'integer',
        'rating_total' => 'integer',
        'rating_count' => 'integer',
        'average_rating' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
