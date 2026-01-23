<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title', 'description', 'client_id', 'creator_id', 'package_id',
        'status', 'budget', 'currency_id', 'deadline', 'requirements',
        'attachments', 'final_video', 'started_at', 'completed_at',
        'client_feedback', 'revision_count',
    ];

    protected $casts = [
        'budget' => 'decimal:2',
        'deadline' => 'date',
        'attachments' => 'array',
        'started_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function creator()
    {
        return $this->belongsTo(Creator::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
