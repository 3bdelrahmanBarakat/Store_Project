<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id','desc')->limit(4)->get();
        $categories = Category::all();
        return view('site.index',compact('products','categories'));
    }
}
