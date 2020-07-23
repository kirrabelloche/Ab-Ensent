<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    public function classes()
    {
        return$this->hasMany('App\Classes');
    }
    public function cours()
    {
        return$this->belongsToMany('App\cours');
    }
    
}
