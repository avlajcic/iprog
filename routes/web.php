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
    $products = App\Product::orderBy('created_at', 'desc')->paginate(5);
    return view('welcome')->with('categories', $categories)->with('products', $products);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/messages', 'HomeController@messages')->name('messages');
Route::post('/messages/update', 'HomeController@messagesUpdate')->name('messages.update');
Route::post('/', 'ProductController@store')->name('product.store');
Route::get('/createProduct', 'ProductController@create')->name('product.create');
Route::get('/product/{id}', 'ProductController@show')->name('product.show');
Route::get('/product/edit/{id}', 'ProductController@edit')->name('product.edit');
Route::get('/products/{id}', 'ProductController@products')->name('product.products');
Route::get('/category/{category}', 'ProductController@category')->name('product.category');
Route::post('/rent', 'ProductController@rent')->name('product.rent');
