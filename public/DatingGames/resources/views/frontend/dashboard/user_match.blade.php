@extends('layouts.frontend')
@section('content')

 <!--main section starts Here-->

        <section class="dash-wrapper" id="myprofile">
            <div class="container">
                <div class="ham">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
                @include('frontend/dashboard/partials/dashboard_sidebar')
      		<div class="right-nav">
      		<aside class="right-side">
   
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                	<div id="msgs">
                        <div class="alert alert-success" id="success_msg" style="display:none;">
                            User has been removed successfully.
                        </div>
                        <div class="alert alert-error" id="success_msg" style="display:none;">
                            Error occured.
                        </div>
				         @if(session('success'))
				         <div class="alert alert-success">
				            {{ session('success') }}
				         </div>
				         @endif
				     </div>
                    <div class="box-header">
                        <h3 class="box-title">Make Your Matches</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <p class="custm-date"><span>Event Date: {{Carbon\Carbon::parse($event->event_date)->format('D dS F Y')}}</span><span>Event Location: {{$event->venue_name}} ({{$event->address}}, {{$event->postcode}})</span> <span>Event Time: {{Carbon\Carbon::parse($event->event_time)->format('H:i')}}</span></p>
                    <div class="row">
                    @foreach($users as $user)
                        @if(!(in_array($user->id, $rejections)) && (!(in_array($user->id, $rejected_users))))

                    

                    <div class="col-md-4 col-sm-6 col-xs-6 boxx-wrap" id="use_{{$user->id}}">
                        <div class="custm-block">
                        <figure class="match_user_fig"><img class= "match_user_fig_img" src="{{'/upload/images/'.$user->profile_picture}}" /></figure>
                        <p>@if(empty($user->nick_name))
                            {{$name = $user->fname}}
                            @else
                            {{$user->nick_name}}
                            @endif
                        </p>

        <!-- checking user for pending status -->
                @if((Carbon\Carbon::parse($event->event_date)->diffInDays(Carbon\Carbon::now()->toDateString()))<=14)
                        @if(count(App\Match::where('event_id', $event->id)->where('user1_id', '=', Auth::user()->id)
                        ->where('user2_id', '=', $user->id)
                        ->where('user1_match_status','=', '1')
                        ->where('user2_match_status','=', null)
                        ->get())>0)
                        <button class="btn btn-danger match-btn" disabled> Pending </button>
                        @endif

        <!-- checking if both the user have the status 1 then view details -->

                        @if(count(App\Match::where('event_id', $event->id)
                        ->where('user1_match_status','=', '1')
                        ->where('user2_match_status','=', '1')
                        ->where(function($query) use ($user)
                        {
                        $query->where('user1_id', '=', $user->id)
                        ->orWhere('user2_id', '=', $user->id);
                        })->where(function($query) use ($user)
                        {
                        $query->where('user1_id', '=', Auth::user()->id)
                        ->orWhere('user2_id', '=', Auth::user()->id);
                        })->get())>0)
                        <a href="{{route('user.matchedUser',['slug' => $user->slug])}}"  class="btn btn-danger match-btn {{$user->id}}"> View Details </a>
                        @endif

        <!-- checking if both the user id exists in the table for this event -->

                        @if(count(App\Match::where(function($query) use ($user)
                        {
                        $query->where('user1_id', '=', $user->id)
                        ->orWhere('user2_id', '=', $user->id);
                        })->where(function($query) use ($user)
                        {
                        $query->where('user1_id', '=', Auth::user()->id)
                        ->orWhere('user2_id', '=', Auth::user()->id);
                        })->get())>0)

            <!-- if id exists then check user status for make a match -->

                            @if(count(App\Match::where('user2_match_status', '=', null)
                            ->where('user1_match_status', '=', '1')
                            ->where('user2_id', '=', Auth::user()->id)
                            ->where('user1_id',$user->id)->get())>0)
                        <button id="{{$user->id}}" onclick="makeAMatch(this.id)" class="btn btn-danger match-btn"> Make A Match </button>
                        <a href="{{route('user.matchedUser',['slug' => $user->slug])}}"  class="btn btn-danger match-btn {{$user->id}}" style="display:none"> View Details </a>
                            @endif
            <!-- if id does not exists then display make a match button -->

                        @else
                            <button id="{{$user->id}}" onclick="makeAMatch(this.id)" class="btn btn-danger match-btn"> Make A Match </button>
                            <button id="but_{{$user->id}}" class="btn btn-danger match-btn" disabled style="display:none"> Pending </button>
                        @endif
                        <button type="button" id="{{$user->id}}" class="btn btn-danger match-btn rem-user" data-toggle="modal" data-target="#nomatch_user"> No Match </button>
                @endif
                    </div>
                </div>
            
                        @endif
                    @endforeach
                    </div>
                </div><!-- /.box -->
            </div><!--/.col (left) -->
            <!-- right column -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</aside>
      		</div>
        </div>
        <div id="enlarge-modal" class="enlarge-modal popup-custimage">
             <div class="centerModal">
                <span class="enlarge-close" data-dismiss="modal">&times;</span>
                <img class="modal-enlarge-img" id="modal-enlarge-img" />
            </div>
        </div>
        <div class="modal" id="nomatch_user" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirmation</h5>
                        <button type="button" class="close custm-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <p>Please confirm that there is no match for this person.</p>
                    </div>
                    <div class="modal-footer">
                        <button id="" onclick="removeMatch(this.id)" class="btn remove_button custm-btn" data-dismiss="modal">OK</button>
                        <button type="button" class="btn btn-secondary custm-btn" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
       </section>
@endsection
@section('customScript')
<script type="text/javascript">
    $(document).ready(function(){
        $('.match_user_fig_img').click(function(){
            var img_src = $(this).attr('src');
            $('#modal-enlarge-img').attr('src', img_src);
            $('#enlarge-modal').css('display','block');
        });
        $('.enlarge-close').click(function(){
            $('#enlarge-modal').css('display','none');
         });


        $('.rem-user').click(function(){
            var userid = $(this).attr('id');
            $('.remove_button').attr('id', userid);
        });
    });
    function removeMatch(id) {
        var event_id = {{$event->id}}
        $(`#${id}`).prop('disabled', true);
        $.ajax({
           headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           url: "{{ route('user.removeMatch') }}",
            type: "post",
            dataType: "JSON",
            data: { 'id': id, 'event_id': event_id },
            success: function(res)
            {
                $('#success_msg').css('display','block');
                $('#success_msg').html(res.message);
                $(`#use_${id}`).remove();
                window.scrollTo({ top: 0, behavior: 'smooth' });
                setTimeout(function() {
                    $('#success_msg').fadeOut('fast');
                }, 3000);
            },
            error: function(err) {
                $('#error_msg').css('display','block');
                $('#error_msg').html(err.message);
                $(`#${id}`).prop('disabled', false);
                window.scrollTo({ top: 0, behavior: 'smooth' });
                setTimeout(function() {
                    $('#error_msg').fadeOut('fast');
                }, 3000);
            }
        });
    }   

    function makeAMatch(id) {
        var event_id = {{$event->id}}
        $(`#${id}`).prop('disabled', true);
        $.ajax({
           headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           url: "{{ route('user.makeAMatch') }}",
            type: "post",
            dataType: "JSON",
            data: { 'id': id, 'event_id': event_id },
            success: function(res){
                $('#success_msg').css('display','block');
                $('#success_msg').html(res.message);
                window.scrollTo({ top: 0, behavior: 'smooth' });
                if(res.message == "There is a match and you can now see their details."){
                    $(`#${id}`).remove();
                    $(`.${id}`).css('display','block');
                } else if(res.message == "Your input has been recorder successfully. Please wait while user make a match with you.") {
                    $(`#${id}`).remove();
                    $(`#but_${id}`).css('display','block');
                } else{
                    $(`#use_${id}`).remove();
                }
                setTimeout(function() {
                    $('#success_msg').fadeOut('fast');
                }, 3000);
            },
            error: function(err) {
                $('#error_msg').css('display','block');
                $('#error_msg').html(err.message);
                $(`#${id}`).prop('disabled', false);
                window.scrollTo({ top: 0, behavior: 'smooth' });
                setTimeout(function() {
                    $('#error_msg').fadeOut('fast');
                }, 3000);
            }
        });
    }   
</script>
@endsection

