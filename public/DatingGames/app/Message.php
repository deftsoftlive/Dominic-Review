<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    // 
	protected $fillable = ['to_id', 'from_id', 'message', 'status', 'created_at', 'updated_at'];
	
	public function UsersA(){
        return $this->belongsTo('App\User','to_id', 'id' );
    }

    public function UsersB(){
        return $this->belongsTo('App\User','from_id', 'id');
    }
	
	
	/* public function UsersA(){
        return $this->belongsToMany('App\User', 'id', 'to_id');
    }

    public function UsersB(){
        return $this->belongsToMany('App\User', 'id', 'from_id');
    }
	 */
}
 