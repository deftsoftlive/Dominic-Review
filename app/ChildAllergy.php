<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChildAllergy extends Model
{
    protected $fillable = [
        'child_id', 'type', 'allergy', 'created_at', 'updated_at'
    ];
}
