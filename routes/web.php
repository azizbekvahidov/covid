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
            Route::get("/list", ['as' => 'survey.list', 'uses' => "SurveyController@list"]);
            Route::get("/{ID}/detail", ['as' => 'survey.detail', 'uses' => "SurveyController@detail"]);
        });

        Route::resource("survey_categories", "SurveyCategoriesController");
	Route::prefix("/user")->group(function() {
            Route::get("/index",   ["as" => "user.index",      'uses' => "UserController@index"]);
            Route::get("/profile", ["as" => "user.profile",    'uses' => "UserController@profile"]);
            Route::get("/edit",    ["as" => "user.edit",       'uses' => "UserController@edit"]);
            Route::post("/update", ["as" => "user.update",     'uses' => "UserController@update"]);
            Route::post("/sendMessage",     "UserController@sendMessage");
        });
    });

    Route::prefix("/admin")->middleware("checkRole")->namespace("Admin")->group(function () {
        Route::redirect("/","/admin/index");
        Route::get("/index", ["as" => "admin.index", "uses" => "AdminController@index"]);
    });
});
Route::namespace("Auth")->group(function () {
    Route::get("/verifyPhone",          ['as' => 'register.verifyPhone',  'uses' => "RegisterController@verifyPhone"]);
    Route::get("{ID}/setPassword",      ['as' => 'register.setPassword',  'uses' => "RegisterController@setPassword"]);
    Route::post("{ID}/savePassword",    ['as' => 'register.savePassword', 'uses' => "RegisterController@savePassword"]);
    Route::get("/{ID}/register",    "RegisterController@showRegistrationForm");
    Route::post("/sendMessage",     "RegisterController@sendMessage");
});
Auth::routes();

Route::get('/', function () {
    return view ("frontend.index");
});


Route::get("locale/{locale}", function($locale) {
	session(["locale" => $locale]);
	return redirect()->back();
});
