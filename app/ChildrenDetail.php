<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChildrenDetail extends Model
{
    protected $fillable = [
        'parent_id', 'child_id', 'core_lang', 'primary_language', 'school', 'preferences', 'beh_need', 'beh_info', 'em_first_name', 'em_last_name', 'em_phone', 'em_email', 'correct_info', 'med_cond', 'med_cond_info', 'toilet', 'allergies', 'allergies_info', 'pres_med', 'pres_med_info', 'special_needs', 'special_needs_info', 'media', 'confirm', 'created_at', 'updated_at'
    ];
}
