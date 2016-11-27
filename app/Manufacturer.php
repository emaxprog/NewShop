<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    protected $fillable = ['name', 'country_id'];

    public $timestamps = false;


    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function country()
    {
        return $this->belongsTo('App\Country');
    }
}
