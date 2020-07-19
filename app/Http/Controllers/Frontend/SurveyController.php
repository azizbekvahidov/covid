<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{Mood, Survey, SurveyCategories, SurveyMediaFiles};
use Illuminate\Support\Facades\{Validator,Storage};

class SurveyController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("frontend.survey.index", [
            "surveys" => Survey::whereStatus("1")->get(),
        ]);
    }

    public function category() {


        return view("frontend.survey.category", [
            "categories" => SurveyCategories::get(),
//            "surveys" => Survey::where("user_id", 1)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $category = SurveyCategories::find($id);
        return view("frontend.survey.create", [
            "category" => $category,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file_name = null;
        $rules = [
            "category"  => "required",
            "opinion"   => "required:max:1500",
            "rank"      => "required",
            "files.*"   => "file|size:6000",
        ];

        Validator::make($request->all(), $rules)->validate();

        $files = $request->file("files");

        $survey = Survey::create([
            "rank"          => $request->rank,
            "opinion"       => $request->opinion,
            "category_id"   => $request->category,
            "user_id"       => "1",
            "status"        => "1",
        ]);

        $old_mood_mark = Mood::where("user_id", "1")->orderBy("id", "desc")->first();

        if(!is_null($old_mood_mark)) {

            $time = strtotime(date($old_mood_mark->created_at));

            if (time() - $time >= 43200) {
                Mood::create([
                    "rank"          => $request->mood,
                    "user_id"       => "1",
                    "category_id"   => $request->category,
                    "survey_id"     => $survey->id,
                ]);
            }
        }

        else {
            Mood::create([
                "rank"          => $request->mood,
                "user_id"       => "1",
                "category_id"   => $request->category,
                "survey_id"     => $survey->id,
            ]);
        }

        if (!is_null($files)) {
            foreach ($files as $file) {
                $path_name = null;
                $mime_type = $file->getClientMimeType();
                $time = date("Ymd_His", time());
                $extension = $file->getClientOriginalExtension();
                if (str_contains($mime_type, "image")) {
                    $file_name = "IMG_".$time.".".$extension;
                    $path_name = "/public/files/images";
                    $file->storeAs($path_name, $file_name);
                }
                elseif (str_contains($mime_type, "video")) {
                    $file_name = "VID_".$time.".".$extension;
                    $path_name = "/public/files/videos";
                    $file->storeAs($path_name, $file_name);
                }
                $path_name = str_replace("public", "storage", $path_name);
                SurveyMediaFiles::create([
                    "user_id"   => "1",
                    "status"    => "1",
                    "survey_id" => $survey->id,
                    "path"      => $path_name,
                    "name"      => $file_name,
                ]);
            }
        }

        return redirect("/survey")->with(["message" => "Добавлено!"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("frontend.survey.show", [
            "survey"    => Survey::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
