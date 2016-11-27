<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ProductAttributeValue;

class ProductAttributeValueController extends Controller
{
    public function destroy($id, Request $request, ProductAttributeValue $pavModel)
    {
        $attributeId = $request->attributeId;
        return $pavModel->deleteAttribute($id, $attributeId);
    }
}
