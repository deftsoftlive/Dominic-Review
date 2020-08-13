<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SetGoal extends Model
{
    protected $fillable = [
        'goal_id', 'player_id', 'parent_id', 'goal_type', 'parent_comment', 'coach_id', 'coach_comment', 'created_at', 'updated_at'
    ];

}
