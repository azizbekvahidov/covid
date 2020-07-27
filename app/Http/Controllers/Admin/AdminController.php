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

    public function downloadZip($id){
        $survey = Survey::find($id);
        $files = $survey->files;
//        dd(storage_path()."app/public/files");
//        return response()->download(storage_path()."/app/public/files/".$survey->audio);
        $zip_file = storage_path()."\\app\\public\\archives\\files_".$id."_".date("Y-m-d").'.zip';
//        $zip_file = "/storage/archives/files_".$id."_".date("Y-m-d").'.zip';
        try{
            $zip = new \ZipArchive();

            if ($zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === TRUE) {
                if (count($files) != 0) {
                    foreach ($files as $file) {
                        $zip->addFile(storage_path()."\\app\\public\\files\\images\\". $file->name, $file->name);
//                        $zip->addFile($file->path."/". $file->name, $file->name);
                    }
                }
                if($survey->audio != null){
                    $zip->addFile(storage_path()."\\app\\public\\files\\".$survey->audio, $survey->audio);
                }
            }
            $zip->close();
        }
        catch (\Exception $ex){
            dd($ex->getMessage());
        }

        return response()->download($zip_file);
    }


}
