<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ContactDetail extends Model
{
	use Notifiable;

    protected $fillable = [
        'participant_name', 'participant_dob', 'participant_gender', 'parent_name', 'parent_email', 'parent_telephone', 'class', 'type', 'subject', 'message'
    ];
}
