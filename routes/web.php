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


Route::group(['middleware' => ['auth']], function() {
    Route::namespace("Frontend")->group(function () {

        Route::prefix("/survey")->group(function () {
            Route::get("/", "SurveyController@index");
            Route::get("/category", ['as' => 'survey.category', 'uses' => "SurveyController@category"]);
            Route::get("/{id}/create", ['as' => 'survey.create', 'uses' => "SurveyController@create"])->middleware("checkTime");
            Route::post("/store", ['as' => 'survey.store', 'uses' => "SurveyController@store"]);
            Route::get("/{ID}/list", ['as' => 'survey.list', 'uses' => "SurveyController@list"]);
        });

        Route::resource("survey_categories", "SurveyCategoriesController");
    });
});
Route::get("/verifyPhone", ['as' => 'register.verifyPhone','uses' => "Auth\RegisterController@verifyPhone"]);
Route::get("{ID}/setPassword", ['as' => 'register.setPassword', 'uses' => "Auth\RegisterController@setPassword"]);
Route::post("{ID}/savePassword", ['as' => 'register.savePassword', 'uses' => "Auth\RegisterController@savePassword"]);
Auth::routes();
Route::get("/{ID}/register", "Auth\RegisterController@showRegistrationForm");
Route::post("/sendMessage", "Auth\RegisterController@sendMessage");

Route::get('/', function () {

    return view ("frontend.index");
});


Route::get("locale/{locale}", function($locale) {
	session(["locale" => $locale]);
	return redirect()->back();
});