<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchReport extends Model
{
   	protected $fillable = [
        'comp_id', 'player_id', 'opponent_name', 'start_date', 'surface_type', 'condition', 'result', 'score', 'wht_went_well', 'wht_could_better', 'other_comments', 'created_at', 'updated_at'
    ];
}
