<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = [ 
        'header_logo','facebook_id','twitter_id', 'insta_id', 'email_id','contact_no','copyright_text',
    ];
}
