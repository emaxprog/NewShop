<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'categories';

    protected $fillable = [
        'name', 'parent_id', 'weight', 'visibility',
    ];

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

    public function getSubcategories($parentId)
    {
        return $this->where('parent_id', $parentId)->published()->get();
    }

    public function getSubcategoriesAll()
    {
        return $this->subcategories()->get();
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
