<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PollutionFactor extends Model
{
    protected $fillable = [
        'soil_id',
        'raw_id',
        'isotope_id',
        'coefficient',
    ];

    protected $hidden = [
        'order',
    ];

    protected $casts = [
        'coefficient' => 'float',
    ];

    public $timestamps = false;

    public function soil(): BelongsTo
    {
        return $this->belongsTo(Soil::class);
    }

    public function raw(): BelongsTo
    {
        return $this->belongsTo(Raw::class);
    }

    public function isotope(): BelongsTo
    {
        return $this->belongsTo(Isotope::class, 'isotope_id', 'id');
    }
}
