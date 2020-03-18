@extends('layouts.admin')
@section('content')

<aside class="right-side">               
    <section class="content-header">
        <h1>
            Matches
            <small>Listing</small>
        </h1>
    </section>

    @include('partials/removeMessage')
    @include('partials/message')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">                           
                
                <div class="box">
                    
                    <div class="box-header">
                        <h3 class="box-title">Users who attended this event:</h3>                                    
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped">
                                <!-- <table id="example1" class="table table-bordered table-striped"> -->
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Gender</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->fname}}</td>
                                    <td>{{$user->lname}}</td>
                                    <td>{{$user->gender}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                <!-- checking if both the user id exists in the table for this event -->       
                                    @if(count(App\Match::where('event_id', $event_id)
                                    ->where(function($query) use ($user)
                                    {
                                    $query->where('user1_id', '=', $user->id)
                                    ->orWhere('user2_id', '=', $user->id);
                                    })->where(function($query) use ($user_id)
                                    {
                                    $query->where('user1_id', '=', $user_id)
                                    ->orWhere('user2_id', '=', $user_id);
                                    })->get())>0)
                                    <!-- if both the user id exists in the table for this event then checking if one of the user has the status not equal to one-->

                                        @if(count(App\Match::where('event_id', $event_id)->where(function($query)
                                        {
                                        $query->where('user1_match_status', '=', 0)
                                        ->orWhere('user1_match_status', '=', null)
                                        ->orWhere('user2_match_status', '=', 0)
                                        ->orWhere('user2_match_status', '=', null);
                                        })->where(function($query) use ($user)
                                        {
                                        $query->where('user1_id', '=', $user->id)
                                        ->orWhere('user2_id', '=', $user->id);
                                        })->where(function($query) use ($user_id)
                                        {
                                        $query->where('user1_id', '=', $user_id)
                                        ->orWhere('user2_id', '=', $user_id);
                                        })->get())>0)

                                        <button id="{{$user->id}}" onclick="createAMatch(this.id)" class="btn btn-success make-a-match{{$user->id}}"> Make A Match </button>
                                        <button type="button" onclick="removeAMatch(this.id)" id="{{$user->id}}" class="btn btn-danger remove-a-match{{$user->id}}" style="display:none;"> No Match </button>
                                        <!-- if both the user id exists in the table for this event then checking if both of the user has the status equals to one-->

                                        @elseif(count(App\Match::where('event_id', $event_id)->where('user1_match_status', '=', 1)
                                        ->where('user2_match_status', '=', 1)
                                        ->where(function($query) use ($user)
                                        {
                                        $query->where('user1_id', '=', $user->id)
                                        ->orWhere('user2_id', '=', $user->id);
                                        })->where(function($query) use ($user_id)
                                        {
                                        $query->where('user1_id', '=', $user_id)
                                        ->orWhere('user2_id', '=', $user_id);
                                        })->get())>0)
                                        <button type="button" onclick="removeAMatch(this.id)" id="{{$user->id}}" class="btn btn-danger remove-a-match{{$user->id}}"> No Match </button>
                                        <button id="{{$user->id}}" onclick="createAMatch(this.id)" class="btn btn-success make-a-match{{$user->id}}" style="display:none;"> Make A Match </button>
                                        @endif

                                    @else
                                    <button id="{{$user->id}}" onclick="createAMatch(this.id)" class="btn btn-success make-a-match{{$user->id}}"> Make A Match </button>
                                    <button type="button" onclick="removeAMatch(this.id)" id="{{$user->id}}" class="btn btn-danger remove-a-match{{$user->id}}" style="display:none;"> No Match </button>
                                    @endif

                                    </td>
                                </tr>
                                 @endforeach
                            </tbody>
                        </table>
                        <div class="facility--pagination"> {{ $users->links() }}</div>
                        @if (count ($users) == 0)
                            <div class="facilities-nodata-text">
                               <p > No Data Found</p>
                            </div>
                        @endif
                        
                    </div>
                    <!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section><!-- /.content -->
</aside>
@endsection
@section('customScripts')
<script src="{{ asset('admin/js/message.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    function removeAMatch(id) {
        var event_id = {{$event_id}}
        var user_id = {{$user_id}}
        $.ajax({
           headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           url: "{{ route('admin.removeAMatch') }}",
            type: "post",
            dataType: "JSON",
            data: { 'id': id, 'event_id': event_id, 'user_id': user_id },
            success: function(res)
            {
                $('#suc_show').show();
                $('#res_mess').html(res.message);
                $(`.make-a-match${id}`).css('display','block');
                $(`.remove-a-match${id}`).css('display','none');

                setTimeout(function() {
                    $('#suc_show').fadeOut('fast');
                }, 3000);
            },
            error: function(err) {
               $('#err_show').show();
                $('#err_mess').html(JSON.parse(err.responseText).message);
                setTimeout(function() {
                    $('#err_show').fadeOut('fast');
                }, 3000);
            }
        });
    }   

    function createAMatch(id) {
        var event_id = {{$event_id}}
        var user_id = {{$user_id}}
        $.ajax({
           headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           url: "{{ route('admin.createAMatch') }}",
            type: "post",
            dataType: "JSON",
            data: { 'id': id, 'event_id': event_id, 'user_id': user_id},
            success: function(res){
                $('#suc_show').show();
                $('#res_mess').html(res.message);
                $(`.make-a-match${id}`).css('display','none');
                $(`.remove-a-match${id}`).css('display','block');
                setTimeout(function() {
                    $('#suc_show').fadeOut('fast');
                }, 3000);
            },
            error: function(err) {
                $('#err_show').show();
                $('#err_mess').html(JSON.parse(err.responseText).message);
                setTimeout(function() {
                    $('#err_show').fadeOut('fast');
                }, 3000);
            }
        });
    }   
</script>
@endsection