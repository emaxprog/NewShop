<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false;

    public function region()
    {
        return $this->belongsTo('App\Region');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
