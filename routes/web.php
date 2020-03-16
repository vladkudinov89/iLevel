<?php

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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', function () {
        return redirect()->route('shop.index');
    });

    Route::get('/', 'ShopController@index')->name('shop.index');

    Route::get('/category/create', 'ShopController@create')->name('shop.category.create');
    Route::get('/category/{category}/edit', 'ShopController@category_edit')->name('shop.category.edit');
    Route::get('/category/{category}', 'ShopController@category_show')->name('shop.category.show');

    Route::get('/product/create', 'ShopController@product_create')->name('shop.product.create');
    Route::get('/product/{product}/edit', 'ShopController@product_edit')->name('shop.product.edit');
    Route::get('/product/{product}', 'ShopController@product_show')->name('shop.product.show');
});
