<?php

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
    $categories = App\Category::all();
    $products = App\Product::orderBy('created_at', 'desc')
             ->take(10)
             ->get();
    return view('welcome')->with('categories', $categories)->with('products', $products);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/', 'ProductController@store')->name('product.store');
Route::get('/createProduct', 'ProductController@create')->name('product.create');
Route::get('/product/{id}', 'ProductController@show')->name('product.show');
Route::get('/category/{category}', 'ProductController@category')->name('product.category');
