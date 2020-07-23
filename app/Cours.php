<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cours extends Model
{
    protected $fillable = ['user_id','title','slug','body','file','filename'];
    protected $guarded = [];
    public function cours()
    {
        return $this->hasMany('App\Cours');
    }
    public function classes()
    {
        return$this->belongsTo('App\Classes');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function filiere(){
        return $this->belongsToMany('App\Filiere');
    }
    public function departement(){
        return $this->belongsTo('App\Departement');
    }
   
    public function coments()
    {
        return $this->morphMany(Coment::class, 'commentable')->whereNull('parent_id');
    }

}
