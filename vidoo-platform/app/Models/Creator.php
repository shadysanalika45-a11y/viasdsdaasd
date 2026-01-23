<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Creator extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'country_id',
        'password',
        'gender',
        'birthdate',
        'bio',
        'avatar',
        'instagram',
        'tiktok',
        'youtube',
        'linkedin',
        'followers_count',
        'rating',
        'completed_projects',
        'verified',
        'email_verified_at',
        'active',
        'available',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'birthdate' => 'date',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'verified' => 'boolean',
        'active' => 'boolean',
        'available' => 'boolean',
        'rating' => 'decimal:2',
    ];

    // Relationships
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function messages()
    {
        return $this->morphMany(Message::class, 'sender');
    }
}
