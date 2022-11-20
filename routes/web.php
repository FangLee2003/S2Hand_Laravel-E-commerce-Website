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

//Route::get('/admin', function () {
//    return view('admin');
//})->middleware(['auth'])->name('admin');

Route::group(['middleware' => ['auth']], function () {
    Route::get('account', 'User\AccountController@index');
    Route::post('account', 'User\AccountController@updateAccount');

    Route::get('password', 'User\PasswordController@index');
    Route::post('password', 'User\PasswordController@updatePassword');

    Route::get('orders', 'User\OrderController@index');
    Route::post('orders', 'User\OrderController@updateOrder');

    Route::get('cart', 'User\CartController@index');
    Route::post('add-cart-item', 'User\CartController@addProduct');
    Route::post('delete-cart-item', 'User\CartController@deleteProduct');
    Route::post('update-cart-item', 'User\CartController@updateProduct');

    Route::get('checkout', 'User\CheckoutController@index');
    Route::post('checkout', 'User\CheckoutController@placeOrder');
});

Route::group(['middleware' => ['auth', 'isAdmin']], function () {
    Route::get('admin', function () {
        return redirect('admin/dashboard');
    });
    Route::get('admin/dashboard', 'Admin\DashboardController@index'
//        function () {
//        return view('admin.index');
//    }
    );
    Route::get('admin/categories', 'Admin\CategoryController@index');

    Route::get('admin/add-category', 'Admin\CategoryController@getAdd');
    Route::post('admin/add-category', 'Admin\CategoryController@postAdd');

    Route::get('admin/edit-category/{id}', 'Admin\CategoryController@getEdit');
    Route::put('admin/edit-category/{id}', 'Admin\CategoryController@putEdit');

    Route::get('admin/delete-category/{id}', 'Admin\CategoryController@delete');

    Route::get('admin/products', 'Admin\ProductController@index');

    Route::get('admin/add-product', 'Admin\ProductController@getAdd');
    Route::post('admin/add-product', 'Admin\ProductController@postAdd');

    Route::get('admin/edit-product/{id}', 'Admin\ProductController@getEdit');
    Route::put('admin/edit-product/{id}', 'Admin\ProductController@putEdit');

    Route::get('admin/delete-product/{id}', 'Admin\ProductController@delete');
});

Route::get('{slug}', 'User\CategoryController@index');

Route::get('{cate_slug}/{prod_slug}', 'User\ProductController@index');
