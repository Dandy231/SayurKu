<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// TODO Homepage
Route::get('/', function () {
    return redirect()->route('dashboard');
});
Route::get('/', function () {
    return redirect()->route('home');
});

// TODO Admin Dashboard Route
Route::prefix('dashboard')
    ->middleware(['auth:sanctum', 'admin'])
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('transactions/{id}/status/{status}', [TransactionController::class, 'changeStatus'])
            ->name('transactions.changeStatus');
        Route::resource('users', UserController::class);
        Route::resource('transactions', TransactionController::class);
        Route::resource('products', ProductController::class);
        Route::resource('categories', CategoryController::class);
    });
Route::prefix('home')
    ->middleware(['auth:sanctum', 'user'])
    ->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::resource('transaksi', TransaksiController::class);
    });
// Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
//     Route::get('home', [HomeController::class, 'index'])->name('home');
    // Route::view('welcome', 'welcome')->name('welcome');
    // Route::view('cards', 'cards')->name('cards');
    // Route::view('charts', 'charts')->name('charts');
    // Route::view('buttons', 'buttons')->name('buttons');
    // Route::view('modals', 'modals')->name('modals');
    // Route::view('tables', 'tables')->name('tables');
    // Route::view('calendar', 'calendar')->name('calendar');
// });
