<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $timestamps = false;

    public function regions()
    {
        return $this->hasMany('App\Region');
    }

    public function cities()
    {
        return $this->hasManyThrough('App\City', 'App\Region');
    }

    public function manufacturers()
    {
        return $this->belongsToMany('App\Manufacturer');
    }
}
