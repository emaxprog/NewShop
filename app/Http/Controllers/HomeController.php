<?php

namespace App\Http\Controllers;

use App\Afisha;
use App\Jobs\Feedback;
use App\Product;
use Illuminate\Http\Request;
use  Queue;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $productModel)
    {
        $latestProducts = $productModel->getLatestProducts();
        $recommendedProducts = $productModel->getRecommendedProducts();
        $images = Afisha::getImages();
        $data = [
            'latestProducts' => $latestProducts,
            'recommendedProducts' => $recommendedProducts,
            'images' => $images,
        ];
        return view('home', $data);
    }

    public function feedback(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'message' => $request->input('message'),
        ];
        Queue::push(new Feedback($data));
        return 'Сообщение отправлено!';
    }
}
