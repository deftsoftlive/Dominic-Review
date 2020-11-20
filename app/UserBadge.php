<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class UserBadge extends Model
{
	use Notifiable;

    protected $fillable = [
        'id', 'user_id', 'season_id', 'stage_id', 'course_id', 'badges', 'badges_points'
    ];
}
