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
    ];

    protected $casts = [
        'is_promoted' => 'boolean',
        'points_awarded' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
