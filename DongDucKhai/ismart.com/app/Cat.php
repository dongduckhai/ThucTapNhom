<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cat extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name'
    ];
    function brand()
    {
        return $this->hasMany('App\Brand');
    }
    function post()
    {
        return $this->hasMany('App\Post');
    }
}
