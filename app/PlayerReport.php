<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PlayerReport extends Model
{
	use Notifiable;

    protected $fillable = [
        'type', 'coach_id', 'player_id', 'coach_id', 'season_id', 'course_id', 'date', 'term', 'selected_options', 'feedback', 'created_at', 'updated_at'
    ];
}
