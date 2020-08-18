<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchGameChart extends Model
{
    protected $fillable = [
        'comp_id', 'match_id', 'player_id', 'image', 'created_at', 'updated_at'
    ];
}
