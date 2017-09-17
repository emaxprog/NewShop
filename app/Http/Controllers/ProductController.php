<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductAttribute;
use App\ProductAttributeValue;
use Illuminate\Http\Request;
use App\Category;
use App\Manufacturer;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }

    public function index()
    {
        return view('product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = $this->category->getSubcategoriesAll();
        $manufacturers = Manufacturer::all();
        $productAttributes = ProductAttribute::all();
        $data = [
            'subcategories' => $subcategories,
            'manufacturers' => $manufacturers,
            'productAttributes' => $productAttributes
        ];
        return view('product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Product::$rules);
        $images = Product::saveImages($request->file('images'));

        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->manufacturer_id = $request->manufacturer_id;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->code = $request->code;
        $product->is_new = $request->is_new;
        $product->is_recommended = $request->is_recommended;
        $product->visibility = $request->visibility;
        $product->amount = $request->amount;
        $product->images = $images;
        $product->save();

        $attrValue = isset($request->parameters) ? array_combine($request->parameters, $request->values) : null;
        if (empty($attrValue))
            return redirect()->route('admin.product.index', ['message' => 'Товар сохранен!']);
        foreach ($attrValue as $attr => $value) {
            $productAttrValue = new ProductAttributeValue();
            $productAttrValue->product_id = $product->id;
            $productAttrValue->attribute_id = $attr;
            $productAttrValue->value = $value;
            $productAttrValue->save();
        }
        return redirect()->route('admin.product.index', ['message' => 'Товар сохранен!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $images = $product->images;
        $params = $this->product->getParams($id);
        $data = [
            'product' => $product,
            'params' => $params,
            'images' => $images
        ];
        return view('product.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $images = $product->images != null ? $product->images : [];
        $manufacturers = Manufacturer::all();
        $subcategories = $this->category->getSubcategoriesAll();
        $params = Product::getParams($id);
        $productAttributes = ProductAttribute::all();
        $data = [
            'product' => $product,
            'images' => $images,
            'manufacturers' => $manufacturers,
            'subcategories' => $subcategories,
            'params' => $params,
            'productAttributes' => $productAttributes
        ];
        return view('product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, ProductAttributeValue $pavModel)
    {
        $this->validate($request, Product::$rules);

        $product = Product::find($id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->manufacturer_id = $request->manufacturer_id;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->code = $request->code;
        $product->is_new = $request->is_new;
        $product->is_recommended = $request->is_recommended;
        $product->visibility = $request->visibility;
        $product->amount = $request->amount;
        if ($request->hasFile('images')) {
            Product::saveImages($request->file('images'), $product);
        }
        $product->save();
        $attrValue = isset($request->parameters) ? array_combine($request->parameters, $request->values) : null;
        $pavModel->deleteAttributes($id);
        if ($attrValue == null)
            return redirect()->route('admin.product.index', ['message' => 'Товар сохранен!']);
        foreach ($attrValue as $attr => $value) {
            $productAttrValue = new ProductAttributeValue();
            $productAttrValue->product_id = $product->id;
            $productAttrValue->attribute_id = $attr;
            $productAttrValue->value = $value;
            $productAttrValue->save();
        }
        return redirect()->route('admin.product.index', ['message' => 'Товар сохранен!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $images = Product::find($id)->images;
        if (!$images) {
            Product::destroy($id);
            return "Продукт успешно удален!";
        }
        $root = $_SERVER['DOCUMENT_ROOT'];
        Product::destroy($id);
        foreach ($images as $image) {
            unlink($root . $image);
        }
        return "Продукт успешно удален!";
    }

    public function image_destroy($id, Request $request)
    {
        Product::deleteImages($request->src, $id);
        return 'OK';
    }

    public function upload($startFrom)
    {
        $products = $this->product->getUploadProducts($startFrom);
        $data = [
            'products' => $products
        ];
        return view('product.upload', $data);
    }

    public function uploadAmount($id)
    {
        return Product::find($id)->amount;
    }

    public function search(Request $request)
    {
        $products = $this->product->getProductsSearch($request->val);
        $data = [
            'products' => $products
        ];
        return view('product.upload', $data);
    }
}
