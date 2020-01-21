<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AcceptableRadiationLevel extends Model
{
    protected $fillable = [
        'raw_id',
        'isotope_id',
        'levels',
    ];

    protected $casts = [
        'levels' => 'array',
    ];

    protected $hidden = [
        'order',
    ];

    public $timestamps = false;

    public function raw(): BelongsTo
    {
        return $this->belongsTo(Raw::class);
    }

    public function isotope(): BelongsTo
    {
        return $this->belongsTo(Isotope::class, 'isotope_id', 'id');
    }
}
