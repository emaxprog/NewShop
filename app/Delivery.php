<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    public $timestamps = false;

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
