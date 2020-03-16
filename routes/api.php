<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/category', 'Api\\ShopController@store_category')->name('shop.store.category');
Route::put('/category/{category}', 'Api\\ShopController@update_category')->name('shop.category.update');
Route::delete('/category/{id}', 'Api\\ShopController@category_destroy')->name('shop.category.destroy');

Route::post('/product', 'Api\\ShopController@store_product')->name('shop.store.product');
Route::put('/product/{product}', 'Api\\ShopController@update_product')->name('shop.product.update');
Route::delete('/product/{id}', 'Api\\ShopController@product_destroy')->name('shop.product.destroy');
