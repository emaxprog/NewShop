<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\Order;
use App\OrderStatus;
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
        $countries = Country::all();
        $regions = Region::all();
        $cities = City::all();
        $data = [
            'deliveries' => $deliveries,
            'payments' => $payments,
            'countries' => $countries,
            'regions' => $regions,
            'cities' => $cities
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
        $this->validate($request, [
            'street' => 'required',
            'num_home' => 'required|integer',
            'mail_index' => 'required|integer'
        ]);

        $orderProducts = json_decode($_COOKIE['basket']);
        $userId = Auth::user()->id;
        $order = new Order();
        $order->user_id = $userId;
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
        $customer = $order->user;
        $products = $order->products;
        $data = [
            'order' => $order,
            'customer' => $customer,
            'products' => $products
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

    public function getRegions($id)
    {
        $regions = Country::find($id)->regions;

        $data = [
            'regions' => $regions
        ];

        return view('upload.regions', $data);
    }

    public function getCities($id)
    {
        $cities = Region::find($id)->cities;

        $data = [
            'cities' => $cities
        ];

        return view('upload.cities', $data);
    }
}
