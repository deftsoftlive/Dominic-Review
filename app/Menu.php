<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'title', 'url', 'type', 'sub_menu', 'sort', 'created_at', 'updated_at'
    ];
}
