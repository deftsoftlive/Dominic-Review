<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    protected $fillable = [
        'player_id', 'parent_id', 'coach_id', 'comp_type', 'comp_date', 'comp_venue', 'comp_name', 'created_at', 'updated_at'
    ];
}
