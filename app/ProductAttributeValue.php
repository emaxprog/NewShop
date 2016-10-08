<?php

namespace App;

use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Model;

class ProductAttributeValue extends Model
{
    protected $table = 'product_attribute_value';
    protected $fillable = ['product_id', 'attribute_id', 'value'];
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function attribute()
    {
        return $this->belongsTo('App\ProductAttribute');
    }

    public function deleteAttribute($productId, $attributeId)
    {
        return $this->where('product_id', $productId)->where('attribute_id', $attributeId)->delete();
    }
}
