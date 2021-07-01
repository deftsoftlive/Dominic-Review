<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EarlyBirdManagementCourse extends Model
{
    protected $fillable = [
        'early_bird_date', 'early_bird_time', 'course_category_id', 'discount_percentage', 'early_bird_option', 'early_bird_text1', 'early_bird_text2', 'utc_uk_diff', 'created_at', 'updated_at'
    ];
}
