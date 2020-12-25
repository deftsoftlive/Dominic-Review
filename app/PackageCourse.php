<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageCourse extends Model
{
    protected $fillable = [
        'booking_no', 'parent_id', 'player_id', 'account_id', 'course_id', 'price', 'status', 'link_generated', 'orderID', '	payment_date', 'created_at', 'updated_at'
    ];
}
