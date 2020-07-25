<?php

namespace App\Http\Controllers\API;

use App\SurveyMediaFiles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FilesController extends Controller
{

    public function uploadImage(Request $request){

        $file = $request->file("photo");
        if (!is_null($file)) {
                $path_name = null;
                $mime_type = $file->getClientMimeType();
                $time = date("Ymd_His", time());
                $extension = $file->getClientOriginalExtension();
                if (str_contains($mime_type, "image")) {
                    $file_name = "IMG_".$time.".".$extension;
                    $path_name = "/public/files/images";
                    $file->storeAs($path_name, $file_name);
                }
                else{
                    return response()->json([
                        "status" => "typeError",
                        "message" => "type is not image"
                    ],404);
                }
                $path_name = str_replace("public", "storage", $path_name);
                $media = SurveyMediaFiles::create([
                    "user_id"   => 0,
                    "status"    => "1",
                    "survey_id" => 0,
                    "path"      => $path_name,
                    "name"      => $file_name,
                ]);

            return response()->json([
                "status" => "success",
                "message" => $media->id
            ],200);

        }
    }
    //
}
