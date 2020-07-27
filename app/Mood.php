<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mood extends Model
{
    protected $fillable = [
        "name",
        "rank",
        "user_id",
        "category_id",
        "survey_id",
    ];


    public function getMood($userId,$created_at){
        $res = Mood::where("user_id",$userId)->where("created_at","<=",$created_at)->orderBy("id","desc")->first();

        return $res;
    }
}
