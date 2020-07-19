<?php


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

Route::get('/', function () {
    return view('welcome');
});

Route::namespace("frontend")->group(function () {
    Route::get("/survey", "SurveyController@index");
    Route::get("/survey/category", "SurveyController@category");
    Route::get("/survey/{id}/create", "SurveyController@create");
    Route::post("/survey/store", "SurveyController@store");
    Route::resource("survey_categories", "SurveyCategoriesController");
});

Route::get("/verifyPhone", ['as' => 'register.verifyPhone','uses' => "Auth\RegisterController@verifyPhone"]);
Route::get("{ID}/setPassword", ['as' => 'register.setPassword', 'uses' => "Auth\RegisterController@setPassword"]);
Route::post("{ID}/savePassword", ['as' => 'register.savePassword', 'uses' => "Auth\RegisterController@savePassword"]);
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
