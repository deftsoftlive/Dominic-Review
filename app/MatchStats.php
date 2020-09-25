<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchStats extends Model
{
    protected $fillable = [
    	 'competition_id', 'match_id', 'tp_in_match', 'goal_subtitle', 'total_1serves_in', 'total_2serves_in', 'total_double_faults', 'total_aces', 'total_1serve_by_op', 'total_2serve_by_op', 'total_double_fault_by_op', 'tp_won_in_1serve', 'tp_won_in_2serve', 'tp_won_ops_1sereve', 'tp_won_ops_2sereve', 'tp_played_rally_4shots', 'tp_played_rally_5shots', 'tp_won_rally_4shots', 'tp_won_rally_5shots', 'total_shots_match', 'created_at', 'updated_at'
    ];
}
