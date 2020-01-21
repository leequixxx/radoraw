<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Element extends Model
{
    protected $fillable = [
        'index',
        'name',
        'symbol',
    ];

    protected $hidden = [
        'order',
    ];

    protected $primaryKey = 'index';
    public $incrementing = false;

    public $timestamps = false;

    public function isotopes(): HasMany
    {
        return $this->hasMany(Isotope::class);
    }
}
