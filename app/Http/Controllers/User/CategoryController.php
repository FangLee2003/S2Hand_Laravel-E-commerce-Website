<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function getIndex($slug)
    {
        if (Category::where('slug', $slug)->exists()) {
            $category = Category::where('slug', $slug)->first(); // Get first object of collection, not entire collection
            $product = Product::where('cate_id', $category->id)->where('status', '1');

            return [$category, $product];
        }
    }
//    public function filter($slug, $filter)
//    {
//        if (Category::where('slug', $slug)->exists()) {
//            $category = Category::where('slug', $slug)->first(); // Get first object of collection, not entire collection
//            $product = Product::where('cate_id', $category->id)->where('status', '1')->where('status', '1')->get();
//
//            return view('user.category', compact('category', 'product'));
//        } else {
//            return redirect('/')->with('warning', '404 NOT FOUND!');
//        }
//    }

    public function getFilter($product, $from, $to)
    {
        return $product->whereRaw('CAST(`selling_price`AS SIGNED) BETWEEN ? AND ?', [(int)$from, (int)$to]);
    }

    public function getOrder($product, $order)
    {
        if ($order == "default") {
            $product = $product->orderBy('name');
        } else if ($order == "popularity") {
            $product = $product->orderBy('trending', 'DESC');
        } else if ($order == "low-high") {
            $product = $product->orderBy('selling_price');
        } else if ($order == "high-low") {
            $product = $product->orderBy('selling_price', 'DESC');
        }
        return $product;
    }

    public function index($slug)
    {
        if (Category::where('slug', $slug)->exists()) {
            $category = $this->getIndex($slug)[0]; // Get first object of collection, not entire collection
            $product = $this->getIndex($slug)[1]->paginate(1);
            $from = 0;
            $to = 900;
            $order = "default";

            return view('user.category', compact('category', 'product', 'from', 'to', 'order'));
        } else {
            return redirect('/')->with('warning', '404 NOT FOUND!');
        }
    }

    public function indexFilterOrder($slug, $from, $to, $order)
    {
        $category = $this->getIndex($slug)[0]; // Get first object of collection, not entire collection

        $product = $this->getIndex($slug)[1];
        $product = $this->getFilter($product, $from, $to);
        $product = $this->getOrder($product, $order)->paginate(1);

        return view('user.category', compact('category', 'product', 'from', 'to', 'order'));
    }
}
