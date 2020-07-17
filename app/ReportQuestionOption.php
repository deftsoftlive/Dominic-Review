<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportQuestionOption extends Model
{
    protected $fillable = [
        'report_question_id', 'option_title', 'created_at', 'updated_at'
    ];

}
