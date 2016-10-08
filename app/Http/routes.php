<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();
Route::post('delete_image', 'ProductController@delete_image');
Route::get('upload', 'ProductController@upload');
Route::resource('product', 'ProductController', ['only' => 'show']);
Route::resource('user', 'UserController');
Route::post('feedback', 'HomeController@feedback');
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::put('header/update', ['as' => 'admin.header.update', 'uses' => 'HeaderController@update']);
    Route::get('header/edit', ['as' => 'admin.header.edit', 'uses' => 'HeaderController@edit']);
    Route::delete('afisha/destroy', 'AfishaController@destroy');
    Route::get('afisha/edit', ['as' => 'admin.afisha.edit', 'uses' => 'AfishaController@edit']);
    Route::put('afisha/update', ['as' => 'admin.afisha.update', 'uses' => 'AfishaController@update']);
    Route::resource('order', 'OrderController');
    Route::resource('category', 'CategoryController');
    Route::get('delete_pav', 'ProductAttributeController@deleteAttribute');
    Route::resource('product_attributes', 'ProductAttributeController');
    Route::resource('product', 'ProductController', ['except' => 'show']);
    Route::get('/', ['as' => 'admin', 'uses' => 'AdminController@index']);
});
Route::post('checkout', ['as' => 'checkout.store', 'uses' => 'BasketController@store']);
Route::get('checkout', ['as' => 'checkout.create', 'uses' => 'BasketController@create']);
Route::get('basket', ['as' => 'basket', 'uses' => 'BasketController@index']);
Route::group(['prefix' => 'catalog'], function () {
    Route::get('category/{id}', ['as' => 'category', 'uses' => 'CatalogController@index'])->where(['id' => '[0-9]+']);
});
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index', 'middleware' => 'admin.redirect']);
