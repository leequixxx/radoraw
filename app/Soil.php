<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
