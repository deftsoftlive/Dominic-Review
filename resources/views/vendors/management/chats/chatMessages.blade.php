@extends('layouts.vendor')
@section('vendorContents')

<div class="container-fluid">

 <div class="page_head-card">
    <div class="page-info">
            <div class="page-header-title">
                <h3 class="m-b-10">{{$title}}</h3>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('vendor_dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Amenities</a></li>
            </ul>
        </div>
        <div class="side-btns-wrap">
         
        </div>
  </div>

@include('vendors.errors')

 

    <div class="row">
       <div class="col-lg-12">
          <div class="card vendor-dash-card">
         <!--  <div class="card-header"><h3>{{$title}}</h3></div> -->
           <div class="card-body">
              <div class="chat-box-container">
                <div id="frame" class="chatBox-frame">
  <div id="sidepanel" class="chatBox-sidepanel">
    <div id="profile" class="chat-profile">
      <div class="wrap">
        <img id="profile-img" src="{{ProfileImage($business->profileImage->keyValue)}}" class="online" alt="" />
        <p>{{$business->title}}</p>
       <!--  <i class="fa fa-chevron-down expand-button" aria-hidden="true"></i> -->
        <div id="status-options">
          <ul>
            <li id="status-online" class="active"><span class="status-circle"></span> <p>Online</p></li>
            <li id="status-away"><span class="status-circle"></span> <p>Away</p></li>
            <li id="status-busy"><span class="status-circle"></span> <p>Busy</p></li>
            <li id="status-offline"><span class="status-circle"></span> <p>Offline</p></li>
          </ul>
        </div>
       
      </div>
    </div>
    <div id="search">
      <label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
      <input type="text" placeholder="Search contacts..." />
    </div>
    <div id="contacts">
      <ul>
         @foreach($business->chats as $c)

        <?php  $chat = $c->ChatMessages()->orderBy('id','DESC')->first(); ?>

        <li class="contact {{$chats->id == $c->id ? 'active' : ''}}">
          <a href="{{url(route('deal_discount_vendor_chatMessages',[$business->category->slug,$c->id]))}}"> 
          <div class="wrap">
            @if($c->unReadMessages->count() > 0)
            <span class="unreadMsgCount">{{$c->unReadMessages->count()}}</span>
            @endif
            <span class="contact-status online"></span>
            <img src="{{ProfileImage($c->user->profile_image)}}" alt="" />
            <div class="meta">
              <p class="name">{{$c->user->name}}</p>
              <p class="preview">{!! $chat->message !!}</p>
            </div>
          </div>
        </a>
        </li>
        @endforeach
      </ul>
    </div>
    <!-- <div id="bottom-bar">
      <button id="addcontact"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i> <span>Add contact</span></button>
      <button id="settings"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> <span>Settings</span></button>
    </div> -->
  </div>
  <div class="content">
    <div class="contact-profile">
      <div class="profile-cont">
      <img src="{{ProfileImage($chats->user->profile_image)}}" alt="" />
    
      <p>{{$chats->user->name}}</p>
      </div>
     <!--  <div class="chat-action-btns">
        <a href="javascript:void(0);"><i class="fas fa-video"></i></a>
        <a href="javascript:void(0);"><i class="fas fa-phone"></i></a>
        <a href="javascript:void(0);"> <i class="fas fa-ellipsis-v"></i></a>
      </div> -->
    </div>
    <div class="messages">
      <ul id="ChatMessages" data-action="{{url(route('getMessageOfBusiness',[$business->category->slug,$chats->id]))}}">
      
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
  </div>
</div>
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
              </div>

           </div>
        </div>
     </div>
   </div>
</div>















@endsection


@section('scripts')
  <script src="{{url('/js/chats/vendor_chat.js')}}"></script>
<script type="text/javascript">
 $(".messages").animate({ scrollTop: $(document).height() }, "fast");

$("#profile-img").click(function() {
  $("#status-options").toggleClass("active");
});

$(".expand-button").click(function() {
  $("#profile").toggleClass("expanded");
  $("#contacts").toggleClass("expanded");
});

$("#status-options ul li").click(function() {
  $("#profile-img").removeClass();
  $("#status-online").removeClass("active");
  $("#status-away").removeClass("active");
  $("#status-busy").removeClass("active");
  $("#status-offline").removeClass("active");
  $(this).addClass("active");
  
  if($("#status-online").hasClass("active")) {
    $("#profile-img").addClass("online");
  } else if ($("#status-away").hasClass("active")) {
    $("#profile-img").addClass("away");
  } else if ($("#status-busy").hasClass("active")) {
    $("#profile-img").addClass("busy");
  } else if ($("#status-offline").hasClass("active")) {
    $("#profile-img").addClass("offline");
  } else {
    $("#profile-img").removeClass();
  };
  
  $("#status-options").removeClass("active");
});

function newMessage() {
  message = $(".message-input input").val();
  if($.trim(message) == '') {
    return false;
  }
  $('<li class="sent"><img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /><p>' + message + '</p></li>').appendTo($('.messages ul'));
  $('.message-input input').val(null);
  $('.contact.active .preview').html('<span>You: </span>' + message);
  $(".messages").animate({ scrollTop: $(document).height() }, "fast");
};

$('.submit').click(function() {
  newMessage();
});

$(window).on('keydown', function(e) {
  if (e.which == 13) {
    newMessage();
    return false;
  }
});


</script>






@endsection