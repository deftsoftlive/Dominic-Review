<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class CoachUploadPdf extends Model
{
	use Notifiable;

    protected $fillable = [
        'coach_id', 'invoice_name', 'invoice_document', 'status', 'created_at', 'updated_at'
    ];
}
