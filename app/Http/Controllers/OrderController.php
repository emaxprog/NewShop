<?php

namespace App\Http\Controllers;

use App\Checkpoint;
use App\City;
use App\Country;
use App\Order;
use App\OrderStatus;
use App\Product;
use App\Region;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Delivery;
use App\Payment;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::latest('id')->get();
        $data = [
            'orders' => $orders
        ];
        return view('order.index', $data);
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

        $deliveries = Delivery::all();
        $payments = Payment::all();
        $data = [
            'deliveries' => $deliveries,
            'payments' => $payments,
        ];
        return view('order.create', $data);
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
        $order = new Order();
        $order->delivery_id = $request->delivery;
        $order->payment_id = $request->payment;
        Auth::user()->orders()->save($order);
        $totalCost = 0;
        foreach ($orderProducts as $orderProduct) {
            $order->products()->attach($orderProduct->productId, ['amount' => $orderProduct->amount]);
            $totalCost += $orderProduct->price * $orderProduct->amount;
            $product = Product::find($orderProduct->productId);
            $product->amount -= $orderProduct->amount;
            $product->save();
        }
        $totalCost += Delivery::find($request->delivery)->price;
        $data = [
            'orderProducts' => $orderProducts,
            'totalCost' => $totalCost
        ];
        setcookie('basket', '');
        
        event(new OrderIsConfirmed(Auth::user()));

        return view('order.store', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        $user = $order->user;
        $products = $order->products;
        $totalPrice = $order->products->sum('price');
        $data = [
            'order' => $order,
            'user' => $user,
            'products' => $products,
            'totalPrice' => $totalPrice
        ];

        return view('order.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        $statusList = OrderStatus::all();
        $data = [
            'order' => $order,
            'statusList' => $statusList
        ];

        return view('order.edit', $data);
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
        $order = Order::find($id);
        $order->status_id = $request->status;
        $order->save();

        return redirect()->route('admin.order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::destroy($id);

        return 'OK';
    }
}
