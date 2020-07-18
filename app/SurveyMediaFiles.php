<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyMediaFiles extends Model
{

    protected $fillable = [
        "user_id",
        "survey_id",
        "path",
        "name",
        "status",
    ];

    public function survey() {
        return $this->hasOne(Survey::class, "id", "survey_id");
    }

    public function user() {
        return $this->hasOne(User::class, "id", "user_id");
    }
}
