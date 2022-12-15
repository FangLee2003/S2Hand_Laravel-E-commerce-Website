<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function addReview(Request $request)
    {
        $user_id = Auth::id();
        $product_id = $request->input('product_id');
        $rating = $request->input('rating');
        $review = $request->input('review');

        $product_check = Product::where('id', $product_id)->where('status', '1')->first();

        if ($product_check) {
            $purchase_check = OrderItem::where('user_id', $user_id)->where('product_id', $product_id)->first();
            if ($purchase_check) {
                $exist_review = Review::where('user_id', $user_id)->where('product_id', $product_id)->first();
                if ($exist_review) {
                    $exist_review->rating = $rating;
                    $exist_review->review = $review;

                    $exist_review->update();
                } else {
                    $new_review = new Review();

                    $new_review->user_id = $user_id;
                    $new_review->product_id = $product_id;
                    $new_review->rating = $rating;
                    $new_review->review = $review;

                    $new_review->save();
                }
                return back()->with('success', "Submit review successfully");
            }
            return back()->with('warning', "You can not review a product without purchasing it");
        }
        return back()->with('warning', "Product does not exist");
    }
}
