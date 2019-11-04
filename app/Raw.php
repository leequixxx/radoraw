<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Raw extends Model
{
    protected $fillable = [
        'name',
        'picture',
    ];

    public $timestamps = false;
}
