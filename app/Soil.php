<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Soil extends Model
{
    protected $fillable = [
        'name',
        'coefficient',
    ];

    protected $casts = [
        'coefficient' => 'float',
    ];

    public $timestamps = false;

    public function pollutionFactors(): HasMany
    {
        return $this->hasMany(PollutionFactor::class);
    }
}
