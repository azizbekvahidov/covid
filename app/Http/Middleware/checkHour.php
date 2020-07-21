<?php

namespace App\Http\Middleware;

use App\SurveyCategories;
use Closure;
use \App\Survey;

class checkHour
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $array = explode("/", $request->url());

        $category = SurveyCategories::find($array["4"]);
        $survey = Survey::where("user_id", \Auth::user()->id)->where("category_id", $array["4"])->orderBy("id", "desc")->first();
        if (!is_null($survey)) {
            if (time() - strtotime(date($survey->created_at)) < 43200) {
                return redirect("/survey/category")->with(["message" => "Выберите другую категорию"]);
            }
        }
        elseif (is_null($category)) {
            return redirect("/survey/category")->with(["message" => "Вы выбрали не существующую категорию, пожалуйста выберите другую категорию"]);
        }
        return $next($request);
    }
}
