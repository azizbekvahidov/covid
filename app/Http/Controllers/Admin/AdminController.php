<?php

namespace App\Http\Controllers\Admin;

use App\Survey;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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

            $zip_file = $this->downloadZip($request->id);
            return response()->json([
                "survey"    => $survey,
                "user"      => $survey->user,
                "hospital"  => $survey->location,
                "mood"      => $survey->mood,
                "photo"     => $survey->files,
                'audio'     => $survey->audio,
                "status"    => "success",
                "zipFile"   => $zip_file,
            ]);
        }
    }

    public function downloadZip($id){
        $survey = Survey::find($id);
        $files = $survey->files;
        $zip_file_path = storage_path()."/app/public/archives/";
        $zip_file_name = "files_".$id.".zip";
        if (file_exists($zip_file_path.$zip_file_name)) {
            return $zip_file_name;
        };
        try{
            $zip = new \ZipArchive();

            if ($zip->open($zip_file_path.$zip_file_name, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === TRUE) {
                if (count($files) != 0) {
                    foreach ($files as $file) {
                        $zip->addFile(storage_path()."/app/public/files/images/". $file->name, $file->name);
                    }
                }
                if($survey->audio != null){
                    $zip->addFile(storage_path()."/app/public/files/".$survey->audio, $survey->audio);
                }
            }
            $zip->close();
        }
        catch (\Exception $ex){
            // dd($ex->getMessage());
        }

        return $zip_file_name;
    }


}
