<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name', 'code', 'key', 'currency_id', 'active'];

    protected $casts = ['active' => 'boolean'];

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function creators()
    {
        return $this->hasMany(Creator::class);
    }
}
