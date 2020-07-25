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

Route::get('/map-marker',       'API\LocationController@mapMarker');
Route::get('/getLocation',      'API\LocationController@getLocation');
Route::post("/verifyCode",      "Auth\RegisterController@verifyCode");
Route::post("/resetPassword",   "Auth\LoginController@resetPassword");
Route::post("/changePassword",  "Auth\LoginController@changePassword");
Route::post("/uploadImage",  "API\FilesController@uploadImage");
Route::post("/user/{ID}/removeImg", ["as" => "api.user.removeImg",     'uses' => "Frontend\UserController@removeImg"]);
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
