<?php

namespace App\Http\Controllers;

use App\Checkpoint;
use App\Delivery;
use App\Order;
use App\OrderProduct;
use App\Payment;
use App\Product;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use Mail;

class BasketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = [];
        if (isset($_COOKIE['basket'])) {
            $order = json_decode($_COOKIE['basket']);
        }
        $data = [
            'orderProducts' => $order
        ];
        return view('basket.index', $data);
    }
}
