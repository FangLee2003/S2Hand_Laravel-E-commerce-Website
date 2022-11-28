<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


require __DIR__ . '/auth.php';

Auth::routes();

Route::get('/', 'User\HomeController@index');

Route::get('search-product', 'User\ProductController@getSearch');
Route::post('search-product', 'User\ProductController@postSearch');

//Route::get('/admin', function () {
//    return view('admin');
//})->middleware(['auth'])->name('admin');

Route::group(['middleware' => ['auth']], function () {
    Route::get('account', 'User\AccountController@index');
    Route::post('account', 'User\AccountController@updateAccount');

    Route::get('password', 'User\PasswordController@index');
    Route::post('password', 'User\PasswordController@updatePassword');

    Route::get('wishlist', 'User\WishlistController@index');
    Route::post('update-wishlist-item', 'User\WishlistController@updateProduct');

    Route::get('cart', 'User\CartController@index');
    Route::post('add-cart-item', 'User\CartController@addProduct');
    Route::post('delete-cart-item', 'User\CartController@deleteProduct');
    Route::post('update-cart-item', 'User\CartController@updateProduct');

    Route::get('count-wishlist-item', 'User\WishlistController@countProduct');
    Route::get('count-cart-item', 'User\CartController@countProduct');

    Route::get('checkout', 'User\CheckoutController@index');
    Route::post('checkout', 'User\CheckoutController@placeOrder');

    Route::get('orders', 'User\OrderController@index');
    Route::get('order/{id}', 'User\OrderController@orderDetails');

    Route::get('cancel-order/{id}', 'User\OrderController@cancelOrder');
    Route::post('cancel-order/{id}', 'User\OrderController@cancelOrder');
});

Route::group(['middleware' => ['auth', 'isAdmin']], function () {
    Route::prefix("admin")->group(function () {
        Route::get('/', function () {
            return redirect('admin/dashboard');
        });
        Route::get('dashboard', 'Admin\DashboardController@index');

        Route::get('categories', 'Admin\CategoryController@index');

        Route::get('add-category', 'Admin\CategoryController@getAdd');
        Route::post('add-category', 'Admin\CategoryController@postAdd');

        Route::get('edit-category/{id}', 'Admin\CategoryController@getEdit');
        Route::put('edit-category/{id}', 'Admin\CategoryController@putEdit');

        Route::get('delete-category/{id}', 'Admin\CategoryController@delete');

        Route::get('products', 'Admin\ProductController@index');

        Route::get('add-product', 'Admin\ProductController@getAdd');
        Route::post('add-product', 'Admin\ProductController@postAdd');

        Route::get('edit-product/{id}', 'Admin\ProductController@getEdit');
        Route::put('edit-product/{id}', 'Admin\ProductController@putEdit');

        Route::get('delete-product/{id}', 'Admin\ProductController@delete');

        Route::get('orders', 'Admin\OrderController@index');
        Route::get('complete-order/{id}', 'Admin\OrderController@completeOrder');

        Route::get('accounts', 'Admin\AccountController@index');

        Route::get('add-account', 'Admin\AccountController@getAdd');
        Route::post('add-account', 'Admin\AccountController@postAdd');

        Route::get('edit-account/{id}', 'Admin\AccountController@getEdit');
        Route::put('edit-account/{id}', 'Admin\AccountController@putEdit');

        Route::get('delete-account/{id}', 'Admin\AccountController@delete');
    });
});

Route::get('{slug}', 'User\CategoryController@index');
Route::get('{cate_slug}/{prod_slug}', 'User\ProductController@index');
