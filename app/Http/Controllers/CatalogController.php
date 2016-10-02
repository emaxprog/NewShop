<?php

namespace App\Http\Controllers;

use App\Manufacturer;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;

class CatalogController extends Controller
{
    public function index(Request $request, $id, Product $productModel)
    {
        $minPrice = $maxPrice = $selectedManufacturersIds = null;
        $manufacturers = Manufacturer::all();
        if ($request->has('minPrice') || $request->has('maxPrice')) {
            $minPrice = $request->minPrice;
            $maxPrice = $request->maxPrice;
        }
        if ($request->has('manufacturers')) {
            $selectedManufacturersIds = $request->manufacturers;
        }
        $selectedProducts = $productModel->getSelectedProducts($id, 3, $minPrice, $maxPrice, $selectedManufacturersIds);
        $products = $selectedProducts;
        $data = [
            'id' => $id,
            'products' => $products,
            'manufacturers' => $manufacturers,
            'selectedManufacturersIds' => $selectedManufacturersIds,
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice,
        ];
        return view('catalog.index', $data);
    }
}
