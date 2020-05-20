<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'name',
        'address',
        'brand',
        'model',
        'template',
        'weight',
        'user_id'
    ];
}
