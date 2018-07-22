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

Route::get('products', 'ProductController@getProducts');
Route::get('products/available', 'ProductController@getAvailable');
Route::get('products/unavailable', 'ProductController@getUnavailable');
Route::get('product/{id}', 'ProductController@getProduct');
Route::put('product/{id}', 'ProductController@updateProduct');
Route::delete('product/{id}', 'ProductController@deleteProduct');
Route::post('product', 'ProductController@storeProduct');
