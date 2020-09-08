<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChildContact extends Model
{
    protected $fillable = [
        'child_id', 'type', 'first_name', 'surname', 'phone', 'email', 'relationship', 'who_are_they', 'created_at', 'updated_at'
    ];
}
