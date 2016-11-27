<?php

namespace App\Http\Controllers;

use App\Afisha;
use App\Category;
use App\Events\Event;
use App\Events\OrderIsConfirmed;
use App\Header;
use App\Jobs\Feedback;
use App\Product;
use Illuminate\Http\Request;
use  Queue;

use App\Http\Requests;
use Auth;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
