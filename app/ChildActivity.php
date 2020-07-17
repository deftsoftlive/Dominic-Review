<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChildActivity extends Model
{
    protected $fillable = [
        'ac_title', 'created_at', 'updated_at'
    ];
}
