<?php
namespace App\Traits\CustomChatTrait;
use Illuminate\Http\Request;
use Auth;
use App\VendorCategory;
use App\Models\Vendors\Chat;
use App\Models\Vendors\ChatMessage;
trait CustomChatMessage {


 
#----------------------------------------------------------------------------------------------
#  Send Message -------------------------------------------------------------------------------
#----------------------------------------------------------------------------------------------



public function sendCustomChatMessage($request,$obj=0)
{
      
    return $this->CustomChatMessageSend($request,$obj);
}


#----------------------------------------------------------------------------------------------
#  Send Message -------------------------------------------------------------------------------
#----------------------------------------------------------------------------------------------

public function CustomChatMessageBox($request)
{
	 // $request_for = $request->request_for == 1 ? 'Pricing' : 'Custom Package';
	 // $contact_type = $request->contact_type == 1 ? 'By Phone Call' : 'Via Email';
	 // $text = '';
	 // $text .='<div class="custom-chat-card">';
  //    $text .='<p>I am '.$request->name.'<p>';
	 // $text .='<p><b>Requested for :</b> '.$request_for.'<p>';
	 // if($request->request_for == 1){
	 //              $text .='<p><b>Event Dated : </b>'.$request->start_date.'<p>';
	 //              $text .='<p><b>Guest Capacity : </b>'.$request->no_of_guest.' guest<p>';
	 // }
	 // $text .='<p><b>Preferred Contact Method</b>'.$contact_type.'<p>';
	 // $text .='<p><b>Contacts</b><span><i class="fa fa-phone"></i> '.$request->phone_number.'</span> <span><i class="fa fa-envelope"></i> '.$request->email.'</span><p>';
	 // $text .='<p>'.$request->message_text.'</p>';
	 // $text .='</div>';

	 // return $text;



    return [
          'name' => $request->name,
          'request_for' => $request->request_for,
          'contact_type' => $request->contact_type,
          'start_date' => $request->start_date,
          'no_of_guest' => $request->no_of_guest,
          'phone_number' => $request->phone_number,
          'email' => $request->email,
          'message' => $request->message_text
    ];


   
}




#------------------------------------------------------------------------------------------------
# save message to database
#------------------------------------------------------------------------------------------------




public function CustomChatMessageSend($request,$obj=0)
{
	      

	      $chats = Chat::where('user_id',$request['sender_id'])
                       ->where('vendor_id',$request['receiver_id'])
                       ->where('business_id',$request['business_id']);

          if($chats->count() > 0){
                $chat = $chats->first();
                $chat->updated_at =\Carbon\Carbon::now();
                $chat->save();
                $m = new ChatMessage;
                $m->sender_id = $request['sender_id'];
                $m->receiver_id = $request['receiver_id'];
                $m->deal_id = $request['deal_id'];
                $m->business_id = $request['business_id'];
                $m->chat_id = trim($chat->id);
                $m->type = $request['type'];
                $m->message = $request['message'];
                $m->sender_status = 0;
                $m->receiver_status = 0;
                $m->save();
                 return $obj == 0 ? $chat->id : $m;
          }else{
          
                $chat = new Chat;
                $chat->user_id = $request['sender_id'];
                $chat->business_id = $request['business_id'];
                $chat->deal_id = $request['deal_id'];
                $chat->vendor_id =$request['vendor_id'];
                $chat->updated_at =\Carbon\Carbon::now();
                $chat->status = 0;
                if($chat->save()){
            						$m = new ChatMessage;
            						$m->sender_id = $request['sender_id'];
            						$m->receiver_id = $request['receiver_id'];
            						$m->deal_id = $request['deal_id'];
            						$m->business_id = $request['business_id'];
            						$m->chat_id = trim($chat->id);
            						$m->message = $request['message'];
            						$m->type = $request['type'];
            						$m->sender_status = 0;
            						$m->receiver_status = 0;
                        $m->save();
                        return $obj == 0 ? $chat->id : $m;

                }

        }
}




}
