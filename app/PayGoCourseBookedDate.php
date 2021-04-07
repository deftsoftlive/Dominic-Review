<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayGoCourseBookedDate extends Model
{
    protected $fillable = [
        'cart_id', 'booked_date_id', 'course_id', 'date','child_id', 'occupied', 'created_at', 'updated_at'
    ];
}
