<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function delivery()
    {
        return $this->belongsTo('App\Delivery');
    }

    public function payment()
    {
        return $this->belongsTo('App\Payment');
    }

    public function checkpoints()
    {
        return $this->belongsTo('App\Checkpoint');
    }


    public function products()
    {
        return $this->belongsToMany('App\Product')->withPivot('amount');
    }

    public function status()
    {
        return $this->belongsTo('App\OrderStatus');
    }
}
