<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
{

    protected $table = 'categories';

    protected $fillable = [
        'name', 'parent_id', 'weight', 'visibility',
    ];

    public $timestamps = false;

    public function getCategories()
    {
        $categories = $this->main()->published()->get();
        foreach ($categories as $category) {
            if (!empty($subcategories = self::getSubcategories($category['id']))) {
                $category['subcategories'] = $subcategories;
            }
        }
        return $categories;
    }

    public static function getParentCategory($parentId)
    {
        if (!$parentId)
            return 'Главная категория';
        $db = DB::connection()->getPdo();
        $sql = "SELECT name FROM categories WHERE id=:parent_id";
        $result = $db->prepare($sql);
        $result->bindParam(':parent_id', $parentId, \PDO::PARAM_INT);
        $result->execute();
        return $result->fetchColumn();
    }

    public function getParents()
    {
        return $this->parents()->get();
    }

    public static function getVisivilityText($val)
    {
        if ($val)
            return 'Отображается';
        return 'Не отображается';
    }

    public function getSubcategories($parentId)
    {
        return $this->where('parent_id', $parentId)->published()->get();
    }

    public function getSubcategoriesAll()
    {
        return $this->subcategories()->get();
    }

    public function scopeParents($query)
    {
        $query->where('parent_id', 0);
    }

    public function scopePublished($query)
    {
        $query->where('visibility', 1);
    }

    public function scopeMain($query)
    {
        $query->where('parent_id', 0);
    }

    public function scopeSubcategories($query)
    {
        $query->where('parent_id', '<>', 0);
    }

}
