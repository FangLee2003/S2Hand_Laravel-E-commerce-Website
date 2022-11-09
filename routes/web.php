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

Route::get('/', function () {
    return view('welcome');
});

require __DIR__ . '/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth', 'isAdmin']], function () {
    Route::get('/dashboard', 'Admin\FrontendController@index'
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
});
