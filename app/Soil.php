<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use TCG\Voyager\Traits\Resizable;
use URL;

class Soil extends Model
{
    use Resizable;

    protected $fillable = [
        'name',
        'picture',
    ];

    protected $hidden = [
        'order',
        'picture',
    ];

    public $timestamps = false;

    public function pollutionFactors(): HasMany
    {
        return $this->hasMany(PollutionFactor::class);
    }

    public function getPictureUriAttribute(): string
    {
        return URL::asset('storage' . DIRECTORY_SEPARATOR . $this->picture);
    }
}
