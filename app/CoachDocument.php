<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class CoachDocument extends Model
{
	use Notifiable;
	
    protected $fillable = [
        'coach_id', 'document_name', 'document_type', 'expiry_date', 'notification', 'upload_document', 'created_at', 'updated_at'
    ];
}
