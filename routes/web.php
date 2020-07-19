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


Route::namespace("frontend")->group(function () {

    Route::prefix("/survey")->group(function () {
        Route::get("/", "SurveyController@index");
        Route::get("/category", "SurveyController@category");
        Route::get("/{id}/create", "SurveyController@create")->middleware("checkTime");
        Route::post("/store", "SurveyController@store");
    });

    Route::resource("survey_categories", "SurveyCategoriesController");
});
