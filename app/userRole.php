<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userRole extends Model
{
    //
    protected $fillable = [
        'name', 'display_name', 'created_at', 'updated_at'
    ];
}
