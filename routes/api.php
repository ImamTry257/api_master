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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/list','Users@list');

// Products
// without token
Route::get('products','API\ProductController@product');
Route::put('updateProduct','API\ProductController@updateProduct');

Route::post('login', 'API\UserController@login');
Route::get('register', 'API\UserController@register');
Route::post('register', 'API\UserController@register');
Route::post('check', 'API\UserController@check');
Route::group(['middleware' => 'auth:api'], function(){
    // using token
    Route::post('details', 'API\UserController@details');
    Route::post('saveProduct', 'API\ProductController@saveProduct');
});