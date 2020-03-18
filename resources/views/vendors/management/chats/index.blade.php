@extends('layouts.vendor')
@section('vendorContents')

<div class="container-fluid">

 <div class="page_head-card">
    <div class="page-info">
            <div class="page-header-title">
                <h3 class="m-b-10">My Inbox</h3>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('vendor_dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">My Inbox</a></li>
            </ul>
        </div>
        <div class="side-btns-wrap">
         
        </div>
  </div>

@include('vendors.errors')

 

    <div class="row chatbox-manage">
       <div class="col-lg-12">
          <div class="card vendor-dash-card">
         
           <div class="card-body">
              <div class="chat-box-container">
                <div id="frame" class="chatBox-frame">
  <div id="sidepanel" class="chatBox-sidepanel">
    <div id="profile" class="chat-profile">
      <div class="wrap">
        <img id="profile-img" src="{{ ProfileImage($business->profileImage->keyValue) }}" class="online" alt="" />
        <p>{{ @sizeof($business->title) ? $business->title : ''  }}</p>
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
      <input type="text" placeholder="Search contacts..." data-search/>
    </div>
    <div id="contacts" data-action="{{url(route('getBusineschatList',$business->category->slug))}}">
     @include('vendors.management.chats.chatlist')
    </div>
    <input type="hidden" id="listactive" value="{{Request::has('chat_id') ? Request::get('chat_id') : 0}}">
    <!-- <div id="bottom-bar">
      <button id="addcontact"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i> <span>Add contact</span></button>
      <button id="settings"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> <span>Settings</span></button>
    </div> -->
  </div>
   <div class="content" id="userChatBox">
     <figure class="chat-here-img">
         <img src="/frontend/images/chat-here.png">
     </figure>
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