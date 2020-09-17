<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChildMedical extends Model
{
    protected $fillable = [
        'child_id', 'type', 'medical', 'created_at', 'updated_at'
    ];
}
