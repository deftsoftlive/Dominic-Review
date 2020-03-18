<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InviteVendor extends Model
{
    

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    
    #------------------------------------------------------------------------------------
    #
    #------------------------------------------------------------------------------------

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }
}
