<div class="contact-profile">
      <div class="profile-cont">
          <img src="{{ProfileImage($chats->user->profile_image)}}" alt="" />
          <p>{{$chats->user->name}}</p>
      </div>
 
</div>
    <div class="messages">
       <ul class="row"  id="ChatMessages" data-action="{{url(route('getMessageOfBusiness',[$business->category->slug,$chats->id]))}}">
        @include('vendors.management.chats.messages')
      </ul>
    </div>
    <div class="message-input">
      <div class="wrap">
               <form id="sendMessage" action="{{url(route('dealAndDiscountSendMessages',$chats->id))}}">
                        <textarea name="message" required="" placeholder="Write your message.." class=" "></textarea>
                                    <i class="fa fa-paperclip attachment" aria-hidden="true"></i>
                                    <button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
               </form>
      </div>
    </div>