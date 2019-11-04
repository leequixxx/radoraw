<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use URL;

class Raw extends Model
{
    protected $fillable = [
        'name',
        'picture',
    ];

    protected $hidden = [
        'order',
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

    public function getPictureUriAttribute(): string
    {
        return URL::asset('storage' . DIRECTORY_SEPARATOR . $this->picture);
    }
}
