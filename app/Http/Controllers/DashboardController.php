<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = DB::table('users')->where('roles', '=', 'USER')->count();
        $product = DB::table('products')->count();
        $category = DB::table('categories')->count();
        $transaction = DB::table('transactions')->count();
        return view('dashboard', [
            'user' => $user,
            'product' => $product,
            'category' => $category,
            'transaction' => $transaction,
        ]);
    }
}
