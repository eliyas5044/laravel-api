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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Book resource routes
//Route::resource('book', 'BookController');
Route::resource('book', 'BookController')->middleware('auth:api');

// User routes
Route::post('register', 'ApiController@register');
Route::post('login', 'ApiController@userLogin');
Route::post('logout', 'ApiController@logout');
