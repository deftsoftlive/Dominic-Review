<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBadge extends Model
{
    protected $fillable = [
        'id', 'user_id', 'season_id', 'badges', 'badges_points'
    ];
}
