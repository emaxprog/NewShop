<?php

namespace App\Http\Controllers;

use App\ProductAttribute;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productAttributes = ProductAttribute::all();
        $data = [
            'productAttributes' => $productAttributes
        ];
        return view('productAttribute.index', $data);
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
            'attribute-name' => 'require|unique:product_attributes,name'
        ]);
        $param = ProductAttribute::create($request->all());
        return $param;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductAttribute::destroy($id);
        return "OK";
    }
}
