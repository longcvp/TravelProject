<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password','username','address','phone','birthday','gender','id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function joins()
    {
        return $this->hasMany('App\Join','user_id','id');
    }

    public function plans()
    {
        return $this->hasMany('App\Plan','user_id','id');
    }

    public function follows()
    {
        return $this->hasMany('App\Follow','user_id','id');
    }
}
