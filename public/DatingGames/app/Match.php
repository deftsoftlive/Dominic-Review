<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = [
       'user1_id', 'event_id', 'user2_id', 'user1_match_status' ,'user2_match_status', 'user1_block_status', 'user2_block_status'
    ];
}
