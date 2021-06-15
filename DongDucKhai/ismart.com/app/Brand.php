<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'cat_id', 'name', 'status'
    ];
    function cat()
    {
        return $this->belongsTo('App\Cat');
    }
}
