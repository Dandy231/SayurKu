<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 5);
        $name = $request->input('name');

        if ($id) {
            $category = Category::find($id);

            if ($category) {
                return ResponseFormatter::success(
                    $category,
                    'Data Category Fetched'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data category not found',
                    404
                );
            }
        }

        $category = Category::query();

        if ($name) {
            $category->where('name', 'like', '%' . $name . '%');
        }

        return ResponseFormatter::success(
            $category->paginate($limit),
            'List Category Fetched'
        );
    }
}
