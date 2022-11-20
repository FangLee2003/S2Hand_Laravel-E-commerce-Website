<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function index($slug)
    {
        if (Category::where('slug', $slug)->exists()) {
            $category = Category::where('slug', $slug)->first(); // Get first object of collection, not entire collection
            $product = Product::where('cate_id', $category->id)->where('status', '1')->get();

            return view('user.category', compact('category', 'product'));
        } else {
            return redirect('/')->with('warning', '404 NOT FOUND!');
        }
    }
}
