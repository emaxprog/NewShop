<?php

namespace App\Http\Controllers;

use App\Afisha;
use Illuminate\Http\Request;

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
        if ($request->hasFile('images')) {
            Afisha::saveImages($request->file('images'));
        }

        return redirect()->route('admin.product.index');
    }

    public function destroy(Request $request)
    {
        Afisha::deleteImage($request->src);
        return 'OK';
    }
}
