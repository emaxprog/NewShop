<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Afisha extends Model
{
    const PATH_TO_DIR_IMAGES = '/template/images/content/afisha/';

    public static function getImages()
    {
        $root = $_SERVER['DOCUMENT_ROOT'];
        $images = [];
        for ($i = 0; $i < 10; $i++) {
            $pathToImage = self::PATH_TO_DIR_IMAGES . $i . '.jpg';
            if (!file_exists($root . $pathToImage))
                continue;
            $images[] = $pathToImage;
        }
        return $images;
    }
}
