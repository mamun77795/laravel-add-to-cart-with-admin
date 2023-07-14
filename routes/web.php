<?php

use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProductController::class,'index']);

Route::resource('products', ProductController::class);
Route::get('cart', [ProductController::class, 'cart'])->name('cart');
Route::get('add_to_cart/{id}',[ProductController::class,'addToCart'])->name('add_to_cart');
Route::delete('remove_from_cart',[ProductController::class,'remove'])->name('remove_from_cart');
Route::patch('update_cart',[ProductController::class, 'update1'])->name('update_cart');

Route::get('/admin', [ProductController::class, 'index_view']);