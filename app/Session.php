<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable = [
        'session', 'time', 'cost', 'status', 'created_at', 'updated_at'
    ];
}
