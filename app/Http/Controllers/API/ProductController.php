<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 5);
        $title = $request->input('title');

        if ($id) {
            $product = Product::find($id);
            if ($product) {
                return ResponseFormatter::success(
                    $product,
                    'Data Product Fetched'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data Product not found',
                    404
                );
            }
        }


        // TODO Query Product
        $product = Product::query();

        if ($title)
            $product->where('title', 'like', '%' . $title . '%');

        return ResponseFormatter::success(
            $product->paginate($limit),
            'List Product Fetched'
        );
    }
}
