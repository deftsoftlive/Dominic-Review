<?php

namespace App\Models\Tools;

use Illuminate\Database\Eloquent\Model;

class DefaultTask extends Model
{
    public function event()
    {
    	return $this->belongsTo('App\Event','event_id','id');
    }

    public function parentCategory()
    {
    	return $this->belongsTo($this,'parent','id');
    }

    public function taskList()
    {
    	return $this->hasMany($this,'parent','id');
    }
}
