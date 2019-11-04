<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AcceptableRadiationLevel extends Model
{
    protected $fillable = [
        'raw_id',
        'isotope_id',
        'level',
    ];

    protected $casts = [
        'level' => 'float',
    ];

    public $timestamps = false;

    public function raw(): BelongsTo
    {
        return $this->belongsTo(Raw::class);
    }

    public function isotope(): BelongsTo
    {
        return $this->belongsTo(Isotope::class);
    }
}
