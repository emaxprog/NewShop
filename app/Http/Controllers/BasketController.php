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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::check())
            return redirect('/login');
        if (!isset($_COOKIE['basket'])) {
            return redirect()->route('home');
        }
        $checkpoints = Checkpoint::all();
        $deliveries = Delivery::all();
        $payments = Payment::all();
        $data = [
            'checkpoints' => $checkpoints,
            'deliveries' => $deliveries,
            'payments' => $payments
        ];
        return view('basket.checkout', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orderProducts = json_decode($_COOKIE['basket']);
        $userId = Auth::user()->id;
        $order = new Order();
        $order->user_id = $userId;
        $order->checkpoint_id = $request->checkpoint;
        $order->delivery_id = $request->delivery;
        $order->payment_id = $request->payment;
        $order->save();
        $totalCost = 0;
        foreach ($orderProducts as $product) {
            $order->products()->attach($product->productId, ['amount' => $product->amount]);
            $totalCost += $product->price * $product->amount;
        }
        $totalCost += Delivery::find($request->delivery)->price;
        $data = [
            'orderProducts' => $orderProducts,
            'totalCost' => $totalCost
        ];
        setcookie('basket', '');
        return view('basket.checkout_finish', $data);
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
}
