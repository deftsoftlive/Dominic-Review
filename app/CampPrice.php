<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampPrice extends Model
{
    protected $fillable = [
        'id', 'camp_id', 'week', 'selected_session', 'early_price', 'early_time', 'early_percent', 'lunch_price', 'lunch_time', 'lunch_percent', 'fullday_price', 'fullday_time', 'fullday_percent', 'latepickup_price', 'latepickup_time', 'latepickup_percent', 'morning_price', 'morning_time', 'morning_seats', 'morning_percent', 'afternoon_price', 'afternoon_time', 'afternoon_seats', 'afternoon_percent', 'created_at', 'updated_at'
    ];
}
