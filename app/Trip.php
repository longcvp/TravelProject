<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    public function owner()
    {
        return $this->belongsTo('App\User','owner_id');
    }
    public function plans()
    {
        return $this->hasMany('App\Plan');
    }
    
    public function joins()
    {
        return $this->hasMany('App\Join','plan_id','id');
    }

    public function comment_info()
    {
        return $this->hasMany('App\Comment','plan_id','id');
    }
}
