<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{Location, Mood, Survey, SurveyCategories, SurveyMediaFiles, User};
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
        $locations = Location::all();

        $old_mood_mark = Mood::where("user_id", \Auth::user()->id)->orderBy("id", "desc")->first();
        $old_mark_time = 0;
        if(!empty($old_mood_mark)){
            $old_mark_time = strtotime(date($old_mood_mark->created_at));
        }

        return view("frontend.survey.create", [
            "category" => $category,
            "old_mark_time" => $old_mark_time,
            "old_mood_mark" => $old_mood_mark,
            'locations' => $locations
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
        $userId = \Auth::user()->id;
        $file_name = null;
//        $rules = [
//            "category"  => "required",
//            "opinion"   => "required:max:1500",
//            "rank"      => "required",
//            "files.*"   => "file|size:5000",
//        ];
//        Validator::make($request->all(), $rules)->validate();

        $files = $request->file("files");

        $survey = Survey::create([
            "rank"          => $request->rank,
            "opinion"       => $request->opinion,
            "category_id"   => $request->category,
            "audio"         => $request->audio,
            "user_id"       => $userId,
            "status"        => "1",
            "location_id"   => $request->locate,
        ]);
        if(isset($request->mood )) {
            $old_mood_mark = Mood::where("user_id", $userId)->orderBy("id", "desc")->first();

            if (!is_null($old_mood_mark)) {

                $time = strtotime(date($old_mood_mark->created_at));

                if (time() - $time >= 43200) {
                    Mood::create([
                        "rank" => $request->mood,
                        "user_id" => $userId,
                        "category_id" => $request->category,
                        "survey_id" => $survey->id,
                    ]);
                }
            } else {
                Mood::create([
                    "rank" => $request->mood,
                    "user_id" => $userId,
                    "category_id" => $request->category,
                    "survey_id" => $survey->id,
                ]);
            }
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
                    "user_id"   => $userId,
                    "status"    => "1",
                    "survey_id" => $survey->id,
                    "path"      => $path_name,
                    "name"      => $file_name,
                ]);
            }
        }
        return response()->json("ok",200);
    }


    public function storeFiles(Request $request){

        $userId = \Auth::user()->id;
        $files = $request->file("files");
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
                    "user_id"   => $userId,
                    "status"    => "1",
                    "survey_id" => $request->id,
                    "path"      => $path_name,
                    "name"      => $file_name,
                ]);
            }
        }
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

    public function list($id){
        $user = User::find($id);
        dd($user);
        $surveyList = Survey::where('user_id',$id)->with('Category')->get();
        return view("frontend.survey.list");
    }
}
