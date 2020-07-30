<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerReport extends Model
{
    protected $fillable = [
        'type', 'coach_id', 'player_id', 'season_id', 'course_id', 'date', 'term', 'selected_options', 'feedback', 'created_at', 'updated_at'
    ];
}
