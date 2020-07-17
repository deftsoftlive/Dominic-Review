<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoachUploadPdf extends Model
{
    protected $fillable = [
        'coach_id', 'invoice_name', 'invoice_document', 'status', 'created_at', 'updated_at'
    ];
}
