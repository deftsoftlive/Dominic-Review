<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccordianPdf extends Model
{
    protected $fillable = [
        'accordian_id', 'title', 'pdf', 'created_at', 'updated_at'
    ];
}
