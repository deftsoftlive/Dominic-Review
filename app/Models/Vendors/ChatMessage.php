<?php

namespace App\Models\Vendors;

use Illuminate\Database\Eloquent\Model;
use Auth;
class ChatMessage extends Model
{
    


    public function sender()
    {
    	return $this->belongsTo('App\User','sender_id');
    }

    public function receiver()
    {
      return $this->belongsTo('App\User','receiver_id');
    }
    public function parentMsg()
    {
    	return $this->belongsTo($this,'parent');
    }

    public function chat()
    {
      return $this->belongsTo('App\Chat','chat_id');
    }

     


     public function business()
    {
      return $this->belongsTo('App\VendorCategory','business_id');
    }


    public function receiveStatus()
    {
    	return $this->belongsTo($this,'id','id')->where(function($t){
                      $msg = $t->first();
                      if($msg->receiver_id == Auth::user()->id){
                      	$msg->receiver_status = 1;
                      	$msg->save();
                      }
    	});
    }

    
}
