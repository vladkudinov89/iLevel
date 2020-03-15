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
Route::post('/product', 'Api\\ShopController@store_product')->name('shop.store.product');

