<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::with('images','category')->find($id);


    $selectedCategoryId = session('selectedCategoryId');

    return view('site.product.show', compact('product', 'selectedCategoryId'));
    }

    public function shop(Request $request)
    {
        $products = Product::orderBy('created_at', 'asc')->paginate(3);
        $categories = Category::all();
        $selectedCategoryId = "";

        if($request->ajax())
        {
            $view = view('site.product.child',compact('products','categories','selectedCategoryId'))->render();
            return Response::json(['view' => $view, 'nextPageUrl' => $products->nextPageUrl()]);
        }
        return view('site.product.shop',compact('products','categories','selectedCategoryId'));

    }

    public function filterByCategory(Request $request)
    {
        $selectedCategoryId = $request->input('category_id');

    if ($selectedCategoryId) {
        $selectedCategory = Category::find($selectedCategoryId);
        $products = $selectedCategory->product()->orderBy('created_at', 'asc')->paginate(3);

    } else {
        $products = Product::orderBy('created_at', 'asc')->paginate(3);

    }

    $categories = Category::all();


    $request->session()->put('selectedCategoryId', $selectedCategoryId);

    if($request->ajax())
    {
        $view = view('site.product.child',compact('products','categories','selectedCategoryId'))->render();
        return Response::json(['view' => $view, 'nextPageUrl' => $products->nextPageUrl()]);
    }

    return view('site.product.shop', compact('products', 'categories', 'selectedCategoryId'));
    }
}
