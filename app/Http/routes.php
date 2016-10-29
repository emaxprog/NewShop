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
Route::resource('product', 'ProductController', ['only' => 'show']);
Route::get('product/{id}/amount', 'ProductController@uploadAmount');
Route::resource('user', 'UserController');
Route::post('feedback', 'HomeController@feedback');
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::put('header', ['as' => 'admin.header.update', 'uses' => 'HeaderController@update']);
    Route::get('header', ['as' => 'admin.header.edit', 'uses' => 'HeaderController@edit']);
    Route::delete('afisha', 'AfishaController@destroy');
    Route::get('afisha/edit', ['as' => 'admin.afisha.edit', 'uses' => 'AfishaController@edit']);
    Route::put('afisha', ['as' => 'admin.afisha.update', 'uses' => 'AfishaController@update']);
    Route::resource('order', 'OrderController', ['except' => ['create', 'store']]);
    Route::resource('category', 'CategoryController');
    Route::delete('product/{id}/pav', 'ProductAttributeValueController@destroy');
    Route::delete('product/{id}/image', 'ProductController@image_destroy');
    Route::get('product/upload/{startFrom}', 'ProductController@upload');
    Route::resource('product_attributes', 'ProductAttributeController');
    Route::resource('product', 'ProductController', ['except' => 'show']);
    Route::get('/', ['as' => 'admin', 'uses' => 'AdminController@index']);
});

Route::resource('order', 'OrderController', ['only' => ['create', 'store']]);

Route::get('user/regions/{id}', 'OrderController@uploadRegions');
Route::get('user/cities/{id}', 'OrderController@uploadCities');

Route::get('basket', ['as' => 'basket', 'uses' => 'BasketController@index']);
Route::group(['prefix' => 'catalog'], function () {
    Route::get('category/{id}', ['as' => 'category', 'uses' => 'CatalogController@index']);
});
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index', 'middleware' => 'admin.redirect']);
