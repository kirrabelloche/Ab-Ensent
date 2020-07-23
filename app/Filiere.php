<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    protected $fillable  = ['name', 'departement_id'];

    public function posts(){
        return $this->belongsToMany('App\Post', 'filiere_post');
    }
    public function filiere(){
        return $this->belongsToMany('App\Filiere');
    }
    public function departement(){
        return $this->belongsTo('App\Departement');
    }

}
