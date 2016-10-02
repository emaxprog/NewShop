<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $fillable = ['name', 'unit'];
    public $timestamps = false;

    public function attribute_values()
    {
        return $this->hasMany('App\ProductAttributeValue');
    }
}
