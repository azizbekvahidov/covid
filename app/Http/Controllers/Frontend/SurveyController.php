<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{Location, Mood, Survey, SurveyCategories, SurveyMediaFiles, User};
use Maatwebsite\Excel\Facades\Excel;
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
        $locations = Location::orderBy("type")->get();
        $rank = 0;
        $old_mood_mark = Mood::where("user_id", \Auth::user()->id)->orderBy("id", "desc")->first();
        if(!empty($old_mood_mark)){
            $rank = $old_mood_mark->rank;
        }
        $old_mark_time = 0;
        if(!empty($old_mood_mark)){
            $old_mark_time = strtotime(date($old_mood_mark->created_at));
        }

        $diff = 42300 - (time() - $old_mark_time );

        $sec = ($diff % 60 < 10) ? "0".$diff % 60 : $diff % 60;
        $minute = ($diff / 60 % 60 < 10) ? "0".($diff / 60 % 60 ) : $diff / 60 % 60  ;
        $hour = $diff / 3600 % 24;


        return view("frontend.survey.create", [
            "category" => $category,
            "old_mark_time" => $old_mark_time,
            "rank" => $rank,
            'locations' => $locations,
            "mood_time" => $hour.":".$minute.":".$sec
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

        $survey = \App\Survey::where("user_id", $userId)->where("category_id", $request->category)->orderBy("id", "desc")->first();
        if (!is_null($survey)) {
            $date = strtotime(date($survey->created_at));
            if ((strtotime(date("Y-m-d H:i:s")) - $date) < 43200) {
                return response()->json("redirect",200);
            }
        }
        $file_name = null;
//        $rules = [
//            "category"  => "required",
//            "opinion"   => "required:max:1500",
//            "rank"      => "required",
//            "files.*"   => "file|size:5000",
//        ];
//        Validator::make($request->all(), $rules)->validate();


        $audio = $request->file("audio");
        $audioName = null;
        if (!is_null($audio)) {

                $path_name = null;
                $mime_type = $audio->getClientMimeType();
                $time = date("Ymd_His", time());
                $extension = $audio->getClientOriginalExtension();
                $audioName = "AUD_".$time.".mp3";
                $path_name = "/public/files";
                $audio->storeAs($path_name, $audioName);

        }
        $locate = (isset($request->mapSelected) ? $request->mapSelected : $request->locate);
        $survey = Survey::create([
            "rank"          => $request->rank,
            "opinion"       => $request->opinion,
            "category_id"   => $request->category,
            "audio"         => $audioName,
            "user_id"       => $userId,
            "status"        => "1",
            "location_id"   => $locate == "" ? 0 : $locate,
            "clinic_desc"   => $request->clinic_desc,
        ]);
        if(isset($request->photo)){
            foreach($request->photo as $val){
                $media = SurveyMediaFiles::find($val);
                $media->user_id = $userId;
                $media->survey_id = $survey->id;
                $media->save();
            }
        }
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

        return response()->json("ok",200);
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

    public function list(){
        $user = User::find(\Auth::user()->id);
        $surveyList = Survey::where('user_id',$user->id)->with('Category')->orderBy("id","desc")->get();
        return view("frontend.survey.list",[
            "user" => $user,
            "surveyList" => $surveyList
        ]);
    }
    public function detail($id){
        $survey = Survey::where('id',$id)->with('Category','Files')->first();
        $user = User::find($survey->user_id);
        return view("frontend.survey.detail",[
            "user" => $user,
            "survey" => $survey
        ]);
    }

    public function exportData(){
        return Excel::download(new Survey(), 'survey.xlsx');
    }



    public function downloadZip($id){
        $survey = Survey::find($id);
        $files = $survey->Files;
//        return response()->download(public_path()."/storage/files/".$survey->audio);
        $zip_file = storage_path()."/archives/files_".$id."_".date("Y-m-d").'.zip';
        try{
            $zip = new \ZipArchive();
            if ($zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === TRUE) {
                if (count($files) != 0) {
                    foreach ($files as $file) {
                        $zip->addFile(storage_path()."/files/images/". $file->name);
                    }
                }
                if($survey->audio != null){
                    $zip->addFile(storage_path()."/files/".$survey->audio);
                }
            }
            $zip->close();
        }
        catch (\Exception $ex){
            dd($ex->getMessage());
        }

//        return response()->download($zip_file);
    }
}
