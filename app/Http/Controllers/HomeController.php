<?php

namespace App\Http\Controllers;

use App\Afisha;
use App\Category;
use App\Header;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;

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
        $userEmail = $request->email;
        $userName = $request->name;
        $userPhone = $request->phone;
        $userMessage = $request->message;
        $adminEmail = 'alexandr@localhost';
        $subject = 'Тема';
        $message = "От кого:" . $userEmail . "\n\nТел:" . $userPhone . "\n\nСообщение:" . $userMessage;
        $headers = "Content-type:text/plain; charset=utf-8";

        mail($adminEmail, $subject, $message, $headers);
        return 'Сообщение отправлено!';
    }
}
