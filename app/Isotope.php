<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
