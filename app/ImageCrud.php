<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageCrud extends Model
{
    protected $fillable = [
        'image', 'created_at', 'updated_at'
    ];
}
