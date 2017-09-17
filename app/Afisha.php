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

    public static function saveImages($images)
    {
        $pathToDirImages = $_SERVER['DOCUMENT_ROOT'] . self::PATH_TO_DIR_IMAGES;

        foreach ($images as $image) {
            if (empty($image))
                continue;
            for ($i = 0; $i < 10; $i++) {
                $pathToImage = $pathToDirImages . $i . '.jpg';
                if (file_exists($pathToImage))
                    continue;
                $image->move($pathToDirImages, $i . '.jpg');
                break;
            }
        }
    }

    public static function deleteImage($imageSrc)
    {
        $root = $_SERVER['DOCUMENT_ROOT'];
        $image = $root . $imageSrc;
        if (file_exists($image)) {
            unlink($image);
            return true;
        }
        return false;
    }
}
