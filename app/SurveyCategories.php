<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyCategories extends Model
{
    protected $fillable = [
        "name",
        "description",
        "status",
    ];

    public function surveys() {
        return $this->hasMany(Survey::class,"category_id", "id");
    }
}
