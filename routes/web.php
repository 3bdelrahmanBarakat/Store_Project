<?php

use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\ProductController;
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
Auth::routes();

Route::get('/',[HomeController::class, 'index'])->name('index');
Route::get('/shop',[ProductController::class, 'shop'])->name('shop');
Route::get('product/{id}',[ProductController::class,'show'])->name('product.show');
Route::get('/products/filter', [ProductController::class,'filterByCategory'])->name('products.filter');



