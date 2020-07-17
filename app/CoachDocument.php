<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoachDocument extends Model
{
    protected $fillable = [
        'coach_id', 'document_name', 'document_type', 'expiry_date', 'notification', 'upload_document', 'created_at', 'updated_at'
    ];
}
