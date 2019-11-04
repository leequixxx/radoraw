<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    protected $fillable = [
        'index',
        'name',
        'symbol',
    ];

    protected $primaryKey = 'index';
    public $incrementing = false;

    public $timestamps = false;
}
