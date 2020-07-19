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

Route::get('/map-marker', 'API\LocationController@mapMarker');
Route::get('/getLocation', 'API\LocationController@getLocation');
Route::post("/sendMessage", "Auth\RegisterController@sendMessage");
Route::post("/verifyCode", "Auth\RegisterController@verifyCode");
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
