<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{


    public function joins()
    {
        return $this->hasMany('App\Join','plan_id','id');
    }

    public function comment_info()
    {
        return $this->hasMany('App\Comment','plan_id','id');
    }

    public function trip()
    {
        return $this->belongsTo('App\Trip');
    }
}
