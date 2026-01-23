<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = ['name_ar', 'name_en', 'code', 'symbol', 'rate_to_usd', 'active'];

    protected $casts = [
        'rate_to_usd' => 'decimal:4',
        'active' => 'boolean',
    ];

    public function countries()
    {
        return $this->hasMany(Country::class);
    }

    public function packages()
    {
        return $this->hasMany(Package::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
