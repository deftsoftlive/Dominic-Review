<?php

namespace App\Models\Vendors;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Chat extends Model
{
    


    public function deals()
    {
    	return $this->belongsTo('App\Models\Vendors\DiscountDeal','deal_id');
    }


    public function ChatMessages()
    {
    	return $this->hasMany('App\Models\Vendors\ChatMessage','chat_id');
    }


     public function user()
    {
    	return $this->belongsTo('App\User','user_id');
    }

    public function unReadMessages()
    {
       return $this->hasMany('App\Models\Vendors\ChatMessage','chat_id')
                   ->where('receiver_id',Auth::user()->id)
                   ->where('receiver_status',0);
    }

     public function unReadFirstMessage()
    {
       return $this->hasOne('App\Models\Vendors\ChatMessage','chat_id')
                   ->where('receiver_id',Auth::user()->id)
                   ->where('receiver_status',0)
                   ->orderBy('id','DESC');
    }


    public function business()
    {
      return $this->belongsTo('App\VendorCategory','business_id');
    }


  
}
