<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = 'plans';
    public $timestamps = false;

    public function joins()
    {
        return $this->hasMany('App\Join','plan_id','id');
    }

    public function comment_info()
    {
        return $this->hasMany('App\Comment','plan_id','id');
    }
}
