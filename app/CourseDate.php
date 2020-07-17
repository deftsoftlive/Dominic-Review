<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseDate extends Model
{
    protected $fillable = [
        'course_id', 'course_date', 'display_course', 'created_at', 'updated_at'
    ];
}
