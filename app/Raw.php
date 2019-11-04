<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Raw extends Model
{
    protected $fillable = [
        'name',
        'picture',
    ];

    public $timestamps = false;

    public function acceptableRadiationLevels(): HasMany
    {
        return $this->hasMany(AcceptableRadiationLevel::class);
    }

    public function pollutionFactors(): HasMany
    {
        return $this->hasMany(PollutionFactor::class);
    }
}
