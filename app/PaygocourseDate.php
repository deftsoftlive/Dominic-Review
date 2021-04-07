<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaygocourseDate extends Model
{
    protected $fillable = [
        'course_id', 'course_date', 'seats', 'display_course', 'created_at', 'updated_at'
    ];
}
