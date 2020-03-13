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
    Route::get('/category/create', 'ShopController@create')->name('shop.create');
    Route::get('/category/{category}', 'ShopController@show')->name('shop.show');

});
