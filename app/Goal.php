<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    protected $fillable = [
        'goal_title', 'goal_subtitle', 'goal_type', 'advanced_type', 'created_at', 'updated_at'
    ];
}
