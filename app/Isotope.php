<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Isotope extends Model
{
    protected $fillable = [
        'mass',
        'name',
        'element_index',
    ];

    protected $primaryKey = 'mass';
    public $incrementing = false;
    protected $keyType = 'float';

    public $timestamps = false;

    public function element(): BelongsTo
    {
        return $this->belongsTo(Element::class);
    }
}
