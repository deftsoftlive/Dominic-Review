<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FreezeCoachAccount extends Model
{
   	protected $fillable = [
        'coach_id', 'profile', 'reports', 'matches', 'invoices', 'goals', 'players', 'bookings', 'notifications', 'wallet', 'settings', 'created_at', 'updated_at'
    ];
}
