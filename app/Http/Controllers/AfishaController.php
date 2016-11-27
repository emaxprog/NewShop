<?php

namespace App\Http\Controllers;

use App\Afisha;
use Illuminate\Http\Request;

use App\Http\Requests;

class AfishaController extends Controller
{
    public function edit()
    {
        $images = Afisha::getImages();
        $data = [
            'images' => $images
        ];
        return view('afisha.edit', $data);
    }

    public function update(Request $request)
    {
        $pathToDirImages = $_SERVER['DOCUMENT_ROOT'] . Afisha::PATH_TO_DIR_IMAGES;
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
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

        return redirect()->route('admin.product.index');
    }

    public function destroy(Request $request)
    {
        $root = $_SERVER['DOCUMENT_ROOT'];
        $src = $request->src;
        $image = $root . $src;
        if (file_exists($image))
            unlink($image);
        return 'OK';
    }
}
