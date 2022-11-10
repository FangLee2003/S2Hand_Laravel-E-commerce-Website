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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/admin', function () {
//    return view('admin');
//})->middleware(['auth'])->name('admin');

Route::group(['middleware' => ['auth', 'isAdmin']], function () {
    Route::get('/dashboard', 'Admin\DashboardController@index'
//        function () {
//        return view('admin.index');
//    }
    );
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
});
