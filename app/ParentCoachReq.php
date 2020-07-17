<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParentCoachReq extends Model
{
    protected $fillable = [
        'parent_id', 'child_id', 'coach_id', 'status', 'reason_of_rejection', 'created_at', 'updated_ats'
    ];
}
