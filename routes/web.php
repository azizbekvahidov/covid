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
    Route::get("/survey/{id}/create", "SurveyController@create")->middleware("checkTime");
    Route::post("/survey/store", "SurveyController@store");
    Route::resource("survey_categories", "SurveyCategoriesController");
});
