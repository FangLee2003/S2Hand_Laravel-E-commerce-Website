<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
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

                return view('user.product', compact('product', 'related_product', 'cartItem_quantity', 'checkWishlist'));
            }
        }
    }
}
