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
        $id = $request->url(){20};
        $category = SurveyCategories::find($id);
        $survey = Survey::where("user_id", "1")->where("category_id", $id)->orderBy("id", "desc")->first();
        if (!is_null($survey)) {
            if (time() - strtotime(date($survey->created_at)) < 43200) {
                return redirect("/survey/category");

            }
        }

        elseif (is_null($category)) {
            return redirect("/survey/category");
        }

        return $next($request);
    }
}
