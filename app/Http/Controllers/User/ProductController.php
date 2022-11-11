<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($cate_slug, $prod_slug)
    {
        if (Category::where('slug', $cate_slug)->exists()) {
            if (Product::where('slug', $prod_slug)->exists()) {
                $product = Product::where('slug', $prod_slug)->first();
                $related_product = Product::where('cate_id', $product->cate_id)->where('status', '1')->get();
                return view('user.product', compact('product','related_product'));
            }
        }
    }
}
