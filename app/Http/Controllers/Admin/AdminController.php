<?php

namespace App\Http\Controllers\Admin;

use App\Survey;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index() {
        return view("admin.index", [
            "surveys"   => Survey::with("user","location")->orderBy("id","desc")->get(),
        ]);
    }

    public function selectSurvey(Request $request) {
        $survey = Survey::find($request->id);
        if ($survey) {
            return response()->json([
                "survey"    => $survey,
                "user"      => $survey->user,
                "hospital"  => $survey->location,
                "mood"      => $survey->mood,
                "photo"     => $survey->files,
                'audio'     => $survey->audio,
                "status"    => "success",
            ]);
        }
    }


}
