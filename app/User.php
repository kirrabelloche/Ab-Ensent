<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Events\UserCreated;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $dispatchesEvents = [
        'created' => UserCreated::class,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // Relation helokent de role
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
//autoriser les action get
public function isAdmin()
{
    return $this->roles()->where('name','admin')->first();
}

    public function hasAnyRole(array $roles)
    {
        return $this->roles()->whereIn('name', $roles)->first();
    }
   
    public function cours() {
  
        return $this->hasMany(Post::class);
     
    }
}
