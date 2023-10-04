<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\IndexController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\SettingController;
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

Route::get('/index',[IndexController::class, 'index'])->name('admin');
Route::group(['as' => 'dashboard.'], function(){
    Route::prefix('settings')->controller(SettingController::class)->group(function(){
        Route::get('index', 'index')->name('settings.index');
        Route::put('{setting}/update',  'update')->name('settings.update');
    });
    Route::get('categories/ajax', [CategoryController::class, 'getall'])->name('categories.getall');
    Route::delete('categories/delete', [CategoryController::class, 'delete'])->name('categories.delete');
    Route::resource('categories',CategoryController::class)->except('destroy','create','show');
    Route::resource('products', ProductController::class)->except('show','destroy');
    Route::delete('products/delete', [ProductController::class, 'delete'])->name('products.delete');
    Route::delete('products/image/delete/{id}', [ProductController::class, 'delete_image'])->name('products.image.delete');
    Route::get('products/ajax',[ProductController::class , 'getall'])->name('products.getall');
});

Route::get('logout',[LoginController::class, 'logout'])->name('dashboard.logout');


