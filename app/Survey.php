<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = [
        "rank",
        "opinion",
        "category_id",
        "user_id",
        "status",
    ];

    public function Files() {
        return $this->hasMany(SurveyMediaFiles::class, "survey_id", "id");
    }

    public function Category() {
        return $this->hasOne(SurveyCategories::class, "id", "category_id");
    }

    public function user() {
        return $this->hasOne(User::class, "id", "user_id");
    }

    public function mood() {
        return $this->hasOne(Mood::class, "user_id", "id");
    }
}
