<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    protected $fillable  = ['name', 'departement_id'];

    public function posts(){
        return $this->belongsToMany('App\Post', 'filiere_post');
    }

}
