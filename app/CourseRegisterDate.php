<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseRegisterDate extends Model
{
    protected $fillable = [
        'course_id', 'player_id', 'course_date', 'checked', 'created_at', 'updated_at'
    ];
}
