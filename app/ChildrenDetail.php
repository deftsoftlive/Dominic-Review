<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChildrenDetail extends Model
{
    protected $fillable = [
        'parent_id', 'child_id', 'core_lang', 'primary_language', 'school', 'med_cond', 'med_cond_info', 'allergies', 'allergies_info', 'pres_med', 'pres_med_info', 'med_req', 'med_req_info', 'toilet', 'beh_need', 'beh_need_info', 'media', 'confirm', 'agree', 'created_at', 'updated_at'
    ];
}
