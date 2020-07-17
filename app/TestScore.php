<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestScore extends Model
{
    protected $fillable = [
        'test_id', 'test_cat_id', 'user_id', 'season_id', 'course_id', 'excel_file', 'complete_data', 'test_score', 'created_at', 'updated_at'
    ];
}
