<?php

use Illuminate\Http\Request;

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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('/ok',function(){

    return ['status' => true];

});
//Rotas
Route::group(['prefix' => '/products'], function () {

    Route::get('/','Api\ProductController@index')->name('index.products');
    Route::get('/{id}','Api\ProductController@show')->name('single_products');

    Route::post('/','Api\ProductController@store')->name('store_products');
    Route::put('/{id}','Api\ProductController@update')->name('update_products');

    Route::delete('/{id}','Api\ProductController@delete')->name('delete_products');


});