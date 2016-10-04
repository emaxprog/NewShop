<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductAttribute;
use App\ProductAttributeValue;
use Illuminate\Http\Request;
use App\Category;
use App\Manufacturer;
use PDO;
use App\Http\Requests;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $productModel)
    {
        $products = $productModel->getUploadProducts();
        $data = [
            'products' => $products
        ];
        return view('product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $categoryModel)
    {
        $subcategories = $categoryModel->getSubcategoriesAll();
        $manufacturers = Manufacturer::all();
        $data = [
            'subcategories' => $subcategories,
            'manufacturers' => $manufacturers
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
        $this->validate($request, [
            'name' => 'required',
            'code' => 'required|integer',
            'price' => 'required|integer'
        ]);

        $root = $_SERVER['DOCUMENT_ROOT'] . Product::PATH_TO_IMAGES_OF_PRODUCTS;
        $pathsToImages = [];
        foreach ($request->file('images') as $image) {
            if (empty($image))
                continue;
            $imageName = $image->getClientOriginalName();
            $pathsToImages[] = Product::PATH_TO_IMAGES_OF_PRODUCTS . $imageName;
            $image->move($root, $imageName);
        }
        $images = implode(';', $pathsToImages);
        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->manufacturer_id = $request->manufacturer_id;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->code = $request->code;
        $product->availability = $request->availability;
        $product->is_new = $request->is_new;
        $product->is_recommended = $request->is_recommended;
        $product->visibility = $request->visibility;
        $product->images = $images;
        $product->save();

        $attrValue = isset($request->parameters) ? array_combine($request->parameters, $request->values) : null;
        if (empty($attrValue))
            return redirect()->route('admin', ['message' => 'Товар сохранен!']);
        foreach ($attrValue as $attr => $value) {
            $productAttrValue = new ProductAttributeValue();
            $productAttrValue->product_id = $product->id;
            $productAttrValue->attribute_id = $attr;
            $productAttrValue->value = $value;
            $productAttrValue->save();
        }
        return redirect()->route('admin', ['message' => 'Товар сохранен!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Product $productModel)
    {
        $product = Product::find($id);
        $images = Product::getArrayImages($product->images);
        $params = $productModel->getParams($id);
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
    public function edit($id, Category $categoryModel)
    {
        $product = Product::find($id);
        $product->images != null ? $images = Product::getArrayImages($product->images) : $images = [];
        $manufacturers = Manufacturer::all();
        $subcategories = $categoryModel->getSubcategoriesAll();
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
        $this->validate($request, [
            'name' => 'required',
            'code' => 'required|integer',
            'price' => 'required|integer'
        ]);

        $root = $_SERVER['DOCUMENT_ROOT'] . Product::PATH_TO_IMAGES_OF_PRODUCTS;
        $pathToImages = [];

        $product = Product::find($id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->manufacturer_id = $request->manufacturer_id;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->code = $request->code;
        $product->availability = $request->availability;
        $product->is_new = $request->is_new;
        $product->is_recommended = $request->is_recommended;
        $product->visibility = $request->visibility;
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if (empty($image))
                    continue;
                $imageName = $image->getClientOriginalName();
                $pathToImages[] = Product::PATH_TO_IMAGES_OF_PRODUCTS . $imageName;
                $image->move($root, $imageName);
            }
            $images = $pathToImages;
            if ($product->images != null) {
                $product->images = Product::getArrayImages($product->images);
                $product->images = array_merge($product->images, $images);
            } else
                $product->images = $images;
            $product->images = Product::toStrImages($product->images);
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
        Product::destroy($id);
        return "Продукт успешно удален!";
    }

    public function delete_image(Request $request)
    {
        $product_id = $request->product_id;
        $image_path = $request->src;
        $root = $_SERVER['DOCUMENT_ROOT'];
        $product = Product::find($product_id);
        $images = explode(';', $product->images);
        if (($key = array_search($image_path, $images)) >= 0) {
            unset($images[$key]);
            if (file_exists($root . $image_path))
                unlink($root . $image_path);
        }
        $product->images = null;
        if (!empty($images)) {
            $newImages = implode(';', $images);
            $product->images = $newImages;
        }
        $product->save();
        return 'OK';
    }

    public function upload(Request $request, Product $productModel)
    {
        $startFrom = $request->startFrom;
        $products = $productModel->getUploadProducts($startFrom);
        $data = [
            'products' => $products
        ];
        return view('product.upload', $data);
    }
}
