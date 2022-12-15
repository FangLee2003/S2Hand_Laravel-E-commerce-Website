<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isNan;

class ProductController extends Controller
{
    public function index($cate_slug, $prod_slug)
    {
        if (Category::where('slug', $cate_slug)->exists()) {
            if (Product::where('slug', $prod_slug)->exists()) {
                $product = Product::where('slug', $prod_slug)->first();
                $related_product = Product::where('cate_id', $product->cate_id)->where('status', '1')->get();

                $cartItem = Cart::where('product_id', $product->id)->first();
                $cartItem_quantity = $cartItem ? $cartItem->product_quantity : 0;

                $checkWishlist = Wishlist::where('user_id', Auth::id())->where('product_id', $product->id)->exists() ? '1' : '0';

                $reviews = Review::where('product_id', $product->id)->get();
                $rating = ceil($reviews->sum('rating') / $reviews->count());

                return view('user.product', compact('product', 'related_product', 'cartItem_quantity', 'checkWishlist', 'reviews', 'rating'));
            }
        }
    }

    public function getSearch()
    {
        $products = Product::select('name')->where('status', '1')->get();

        $data = [];

        foreach ($products as $item) {
            $data[] = $item['name'];
        }

        return $data;
    }

    public function postSearch(Request $request)
    {
        $product_name = $request->product_name;

        if ($product_name != "") {
            $product = Product::where('name', "LIKE", "%$product_name%")->first();
            if ($product) {
                return redirect($product->findCategory->slug . '/' . $product->slug);
            }
        }
        return back()->with('warning', 'No product found');
    }
}
