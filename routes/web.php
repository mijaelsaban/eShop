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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/index', function () {
//     return view('index');
// });

// Route::get('about', function(){
// 	return view ('about');
// });
Route::get('/shop/index', 'ProductController@index');
Route::get('/shop/index/order/{order}', 'ProductController@order');
Route::post('/shop/index', 'ProductController@cart');
Route::get('/cart', 'CartController@index');


// muestra todos los productos
Route::get('/admin/products', 'Admin\ProductsController@index');
//el primer parametro es la url, el segundo es el controllador y el metodo y en el metodo se encuentra el view con el nombre de la vista
//muestra cada producto individualmete
Route::get('/admin/products/{id}', 'Admin\ProductsController@show');

Route::get('/categories', 'CategoriesController@index');
Route::get('/category/{id}', 'CategoriesController@show');

Route::get('/admin/product/create', 'Admin\ProductsController@create');
Route::post('/admin/product/create', 'Admin\ProductsController@store');

Route::get('/admin/product/{id}/edit', 'Admin\ProductsController@edit');
Route::put('/admin/product/{id}/update', 'Admin\ProductsController@update');

Route::delete('admin/product/{id}/delete', 'Admin\ProductsController@destroy');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
