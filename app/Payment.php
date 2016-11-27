<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $timestamps = false;


    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
