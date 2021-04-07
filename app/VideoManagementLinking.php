<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoManagementLinking extends Model
{
    protected $fillable = [
        'video_id', 'user_id', 'season_id', 'created_at', 'updated_at'
    ];
}
