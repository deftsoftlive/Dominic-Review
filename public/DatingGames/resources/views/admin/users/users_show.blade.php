@extends('layouts.admin')
@section('content')

<aside class="right-side">               
    <section class="content-header">
        <h1>
            Users
            <small>Listing</small>
        </h1>
    </section>

    @include('partials/removeMessage')
    @include('partials/message')

    <section class="content">
            <div class="row">
                <div class="col-sm-7">
                    <form action="{{ route('admin.searchUsers') }}" method="POST" class="sidebar-form">
                            @csrf
                        <div class="input-group search--content-wd">
                            <input type="text" value="{{$search}}" id="search"  name="search" class="form-control facilities-search" placeholder="Search..."/>
                            <span class="input-group-btn">
                            <button type='submit' name='seach' id='search-btn' class="btn btn-flat fac-search"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                </div>
    
                <div class= "col-sm-5"> 
                    <a href="{{route('admin.showCreateUser')}}">
                        <button class="btn btn-info bttn--height-right"><i class="fa fa-fw fa-plus-circle"></i> Add New User</button>
                    </a>
                </div>
            </div>
        </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12"> 
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Users Needs approval for profile picture</h3>                                    
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                                <!-- <table id="example1" class="table table-bordered table-striped"> -->
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>New Profile Picture</th>
                                    <th>First Name</th>
                                    <th>last Name</th>
                                    <th>Email</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($profile_pic_changes as $changes)
                                <tr>
                                    <td>{{$changes->id}}</td>
                                    <td><img class="updated-img" src="/upload/images/{{$changes->new_profile_picture}}" /></td>
                                    <td>{{$changes->fname}}</td>
                                    <td>{{$changes->lname}}</td>
                                    <td>{{$changes->email}}</td>
                                    <td><a href="{{ route('admin.changeStatus', ['slug' => $changes->slug]) }}">
                                            <button class="btn btn-success"><i class="fa fa-fw fa-edit"></i>Approve</button>
                                        </a>
                                        <a href="{{ route('admin.rejectpicture', ['slug' => $changes->slug]) }}">
                                        <button class="btn btn-danger"><i class="fa fa-fw fa-times-circle"></i>Reject</button></a>
                                    </td>
                                </tr>
                                 @endforeach
                            </tbody>
                        </table>
                        @if (count ($profile_pic_changes) <= 0)
                        No Data Found.
                        @endif
                    </div>
                </div>
            </div>
        </div>
            @if($search)
            <div class="row">
                <div class="col-sm-12 search-cont">
                <p>you are searching for the : <span class="search--text"> {{$search}}</span> 
            <a href="{{route('admin.showUsers')}}" class="search-custm-btn">clear filter</a></p>
            </div>
            </div>
            @endif
        <div class="row">
            <div class="col-xs-12">                           
                
                <div class="box">
                    
                    <div class="box-header">
                        <h3 class="box-title">Users</h3>                                    
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped">
                                <!-- <table id="example1" class="table table-bordered table-striped"> -->
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Status</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr id="row_{{$user->id}}">
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->fname}}</td>
                                    <td>{{$user->lname}}</td>
                                    
                                        @switch($user->status)
                                            @case(1)
                                            <td><button class="btn btn-success">
                                                Active
                                            </button></td>
                                                @break

                                            @case(2)
                                            <td><button class="btn btn-warning">
                                                Pending
                                                @break
                                            </button></td>
                                            @default
                                            <td><button class="btn btn-danger">
                                                Suspended
                                            </button></td>
                                        @endswitch
                                    </td>
                                    <td>
                                    <a href="{{ route('admin.showEditUser', ['slug' => $user->slug]) }}">
                                        <button class="btn btn-success"><i class="fa fa-fw fa-edit"></i>Edit</button>
                                    </a>
                                    <button type="button" id="{{$user->id}}" class="btn btn-danger rem_button" data-toggle="modal" data-target="#remove_user">
									  <i class="fa fa-fw fa-times-circle"></i>Remove
									</button>
                                    </td>
                                </tr>
                                 @endforeach
                            </tbody>
                        </table>
                        @if(!($search))
                        <div class="facility--pagination"> {{ $users->links() }}</div>
                        @endif
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
        <div class="modal" id="remove_user" tabindex="-1" role="dialog">
		  	<div class="modal-dialog" role="document">
		    	<div class="modal-content">
		      		<div class="modal-header">
		        		<h5 class="modal-title">Confirmation</h5>
		        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          		<span aria-hidden="true">&times;</span>
		        		</button>
		      		</div>
		      		<div class="modal-body">
		        	<p>Are you sure, You want to delete this user?</p>
		      		</div>
		      		<div class="modal-footer">
		      			<button id="" onclick="removeUser(this.id)" class="btn btn-primary confirm_button" data-dismiss="modal">OK</button>
			        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		      		</div>
		    	</div>
			</div>
		</div>
    </section><!-- /.content -->
    <div id="updatedpic" class="modal">
      <span class="close" data-dismiss="modal">&times;</span>
      <img class="modal-img" id="modal-img" />
    </div>
</aside>
@endsection

@section('customScripts')
<script src="{{ asset('admin/js/message.js') }}" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.rem_button').click(function(){
			var userid = $(this).attr('id');
			$('.confirm_button').attr('id', userid);
		});
	});
    function removeUser(id) {
        $(`#${id}`).prop('disabled', true);
        $.ajax({
           headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           url: "{{ route('admin.userDelete') }}",
            type: "post",
            dataType: "JSON",
            data: { 'id': id },
            success: function(res)
            {
                $('#suc_show').show();
                $('#res_mess').html(res.message);
                $(`#row_${id}`).remove();

                setTimeout(function() {
                    $('#suc_show').fadeOut('fast');
                }, 2000);
            },
            error: function(err) {
                $('#err_show').show();
                $('#err_mess').html(JSON.parse(err.responseText).message);
                $(`#${id}`).prop('disabled', false);

                setTimeout(function() {
                    $('#err_show').fadeOut('fast');
                }, 2000);
            }
        });
    }   
</script>
@endsection
