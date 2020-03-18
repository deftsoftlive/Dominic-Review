<div class="contact-profile">
      <div class="profile-cont">
      <img src="{{ProfileImage($chats->business->profileImage->keyValue)}}" alt="" />
    
      <p>{{$chats->business->title}}</p>
      </div>
    
    </div>
    <div class="messages">
      <ul class="row" id="ChatMessages" data-action="{{url(route('deal_discount_getMessages',$chats->id))}}">
          @include('users.chats.messages')
      </ul>
    </div>
    <div class="message-input">
      <div class="wrap">
                  <form id="sendMessage" action="{{url(route('deal_discount_sendMessages',$chats->id))}}">
                               <div class="chat-input-box">
                                    <textarea id="textarea" name="message" required placeholder="Write your message.." class="chat-input"></textarea>
                                    <i class="fa fa-paperclip attachment" aria-hidden="true"></i>
                                    <button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                  </div>
                      </form>
   </div>
</div>