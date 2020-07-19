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
}
