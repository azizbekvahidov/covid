<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyCategories extends Model
{
    protected $fillable = [
        "name",
        "description",
        "status",
        "icon"
    ];

    public function surveys() {
        return $this->hasMany(Survey::class,"category_id", "id");
    }
}
