<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactDetail extends Model
{
    protected $fillable = [
        'participant_name', 'participant_dob', 'participant_gender', 'parent_name', 'parent_email', 'parent_telephone', 'class', 'type', 'subject', 'message'
    ];
}
