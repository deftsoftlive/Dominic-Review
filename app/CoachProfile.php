<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoachProfile extends Model
{
    protected $fillable = [
        'coach_id', 'image', 'profile_name', 'qualified_clubs', 'qualifications', 'personal_statement', 'created_at', 'updated_at'
    ];
}
