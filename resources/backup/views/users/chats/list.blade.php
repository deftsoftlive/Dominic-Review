@extends('users.layouts.layout')
@section('content')

<div class="page-header">
                        <div class="page-block">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="page-header-title">
                                        <h5 class="m-b-10"></h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{url(route('user_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">My Inbox</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                  
                             
                                </div>

                            </div>
                        </div>
 </div>

  <section class="content chatbox-manage">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
 
            <div class="card-body">

              @include('admin.error_message')

 

    <div class="chat-box-container">
                <div id="frame" class="chatBox-frame">
                     <div id="sidepanel" class="chatBox-sidepanel">
                            <div id="profile" class="chat-profile">
                              <div class="wrap">
                                <img id="profile-img" src="{{ProfileImage(Auth::user()->profile_image)}}" class="online" alt="" />
                                <p>{{Auth::user()->name}}</p>                               
                              </div>
                            </div>
                            <div id="search">
                              <label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
                              <input type="text" placeholder="Search contacts..." data-search/>
                            </div>
                            <div id="contacts" data-action="{{url(route('get_chat_list'))}}">
                             

                               @include('users.chats.chatlist')
                               
                               
                            </div>
                            <input type="hidden" id="listactive" value="0">
     
                      </div>
                     <div class="content" id="userChatBox">
                       <figure class="chat-here-img">
                           <img src="/frontend/images/chat-here.png">
                       </figure>
                     </div>
       </div>

              </div>


 
 

              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

    

<!-- First User Modal -->
<div class="modal fade" id="firstUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
 
      <div class="modal-body">
        
        <div class="row">
          <div class="col-lg-6">
            <figure class="about-event-img">
              <img src="{{ asset('/frontend/images/event-form-img.png') }}">
              <div class="form-img-cont text-center">
              <h2 class="modal-title">Why are you here?</h2>
              <p>Congratulation for using our Platform</p>
            </div>
            </figure>
          </div>
          <div class="col-lg-6">
            <div class="first-user-form">
            

            <section class="multi_step_form ">  <div id="msform"> <ul id="progressbar"><li class="active"></li><li class=""></li><li class=""></li><li class=""></li></ul></div></section>

            <div class="card-heading">
      <h3>Lets talk about your event.</h3>     
    </div>

            <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label>Event Title <i class="fas fa-info-circle"></i></label>
              <div class="input-field-wrap">
              <input type="text" class="form-control" id="address">
            </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group">
              <label>Short description <i class="fas fa-info-circle"></i></label>
              <div class="input-field-wrap">
              <input type="text" class="form-control" id="description">
            </div>
            </div>
          </div>
         <div class="col-lg-12">
            <div class="form-group">
              <label>Event Place <i class="fas fa-info-circle"></i></label>
              <div class="input-field-wrap">
              <input type="text" class="form-control" id="evt-place">
            </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group">
              <label>lorem ipsum <i class="fas fa-info-circle"></i></label>
              <div class="input-field-wrap">
              <input type="text" class="form-control" id="">
            </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="btn-wrap text-right">
              <button class="cstm-btn solid-btn">Back</button>
              <button class="cstm-btn solid-btn">Next</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
     
 
     
@endsection

 
@section('scripts')
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>

<script src="{{url('/js/chats/chat.js')}}"></script>

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