<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use PDO;

class Product extends Model
{

    protected $fillable = [
        'name',
        'category_id',
        'manufacturer_id',
        'description',
        'price',
        'code',
        'availability',
        'is_new',
        'is_recommended',
        'visibility',
    ];

    public $timestamps = false;

    const PATH_TO_IMAGES_OF_PRODUCTS = '/template/images/content/products/';
    const PATH_TO_NO_IMAGE = '/template/images/site/noImage.jpg';

    public function orders()
    {
        return $this->belongsToMany('App\Order')->withPivot('amount')->withTimestamps();
    }

    public function attribute_values()
    {
        return $this->hasMany('App\ProductAttributeValue');
    }

    public function getSelectedProducts($id, $num, $minPrice, $maxPrice, $manufacturersIds)
    {
        if ($minPrice == null && $maxPrice == null) {
            $minPrice = 10000;
            $maxPrice = 300000;
        }
        if ($manufacturersIds == null)
            return $selectedProducts = $this->preview()->category($id)
                ->rangePrice($minPrice, $maxPrice)
                ->paginate($num);
        return $selectedProducts = $this->preview()->category($id)
            ->manufacturers($manufacturersIds)
            ->rangePrice($minPrice, $maxPrice)
            ->paginate($num);
    }

    public function getLatestProducts()
    {
        $latestProducts = $this->latest('id')->preview()->published()->take(6)->get();
        return $latestProducts;
    }

    public function getRecommendedProducts()
    {
        $recommendedProducts = $this->latest('id')->preview()->recommended()->published()->take(3)->get();
        return $recommendedProducts;
    }

    public static function getPreview($images)
    {
        if ($images != null) {
            $images = explode(';', $images);
            return $images[0];
        }
        return self::PATH_TO_NO_IMAGE;
    }

    public static function getImage($imagePath)
    {
        if ($imagePath != null) {
            return $imagePath;
        }
        return self::PATH_TO_NO_IMAGE;
    }

    public function paginateProducts($num)
    {
        return $this->paginate($num);
    }

    public function paginateProductsOfCategory($id, $num)
    {
        $productsOfCategory = $this->preview()->category($id)->paginate($num);
        return $productsOfCategory;
    }

    public function getUploadProducts($startFrom = 0)
    {
        return $this->latest('id')->skip($startFrom)->take(5)->get();
    }

    public static function getParams($id)
    {
        $db = DB::connection()->getPdo();
        $result = $db->prepare("CALL get_params(:id)");
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $params = self::getArrayObjects($result);
        return $params;
    }

    private static function getArrayObjects($result)
    {
        $params = [];
        while ($row = $result->fetchObject()) {
            $params[] = $row;
        }
        return $params;
    }

    public static function getArrayImages($str)
    {
        if (!$str)
            return [];
        return explode(';', $str);
    }

    public static function toStrImages($arr)
    {
        if (empty($arr))
            return [];
        return implode(';', $arr);
    }

    public function scopeRangePrice($query, $minPrice, $maxPrice)
    {
        $query->whereBetween('price', [$minPrice, $maxPrice]);
    }

    public function scopeManufacturers($query, $manufacturersIds)
    {
        $query->whereIn('manufacturer_id', $manufacturersIds);
    }

    public function scopeCategory($query, $id)
    {
        $query->where('category_id', $id);
    }

    public function scopePreview($query)
    {
        $query->select('id', 'name', 'price', 'is_new', 'is_recommended', 'images');
    }

    public function scopePublished($query)
    {
        $query->where('visibility', 1);
    }

    public function scopeRecommended($query)
    {
        $query->where('is_recommended', 1);
    }
}
