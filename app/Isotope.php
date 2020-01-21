<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use TCG\Voyager\Traits\Resizable;

class Isotope extends Model
{
    use Resizable;

    protected $fillable = [
        'mass',
        'name',
        'picture',
        'element_index',
    ];

    protected $hidden = [
        'order',
        'element_index',
    ];

    protected $casts = [
        'mass' => 'float',
    ];

    protected $primaryKey = 'mass';
    public $incrementing = false;
    protected $keyType = 'float';

    public $timestamps = false;

    public function element(): BelongsTo
    {
        return $this->belongsTo(Element::class);
    }

    public function pollutionFactors(): HasMany
    {
        return $this->hasMany(PollutionFactor::class);
    }

    public function acceptableRadiationLevels(): HasMany
    {
        return $this->hasMany(AcceptableRadiationLevel::class);
    }

    public function getPictureUriAttribute(): string
    {
        return URL::asset('storage' . DIRECTORY_SEPARATOR . $this->picture);
    }
}
