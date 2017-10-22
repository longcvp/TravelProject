<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Join extends Model
{
    protected $table = 'joins';
    public $timestamps = false;

    public function users()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
