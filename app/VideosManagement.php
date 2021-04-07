<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class VideosManagement extends Model
{
    
    protected $fillable = [
        'title', 'url', 'video_category' ,'description', 'status', 'users', 'linked_coaches','created_at', 'updated_at'
    ];
    
}
