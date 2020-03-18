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
				         @if(session('success'))
				         <div class="alert alert-success">
				            {{ session('success') }}
				         </div>
				         @endif
				     </div>
                    <div class="box-header">
                        <h3 class="box-title">My Profile</h3>
                    </div><!-- /.box-header -->
                    @if(Auth::user()->profile_pic_status == 2)
                        <div class="custm-profile-pic-change">
                            <div class="profile-pic-change">
                                        <div class="cross-pic">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </div>
                        <p>Kindly upload a valid profile picture.</p>
                        </div>
                        </div>
                    @endif
                    
                        <div class="custm-profile-pic-change pend-msg" style = @if(Auth::user()->profile_pic_status == 0)
                            ""
                            @else
                            "display:none"
                            @endif>
                            <div class="profile-pic-change">
                                        <div class="cross-pend-msg">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </div>
                        <p>Your profile picture is pending for approval.</p>
                        </div>
                        </div>
                    
                    <!-- form start -->
                    <form method="POST" id ="user-profile-edit" action="{{ route('user.updateprofile') }}" 
                    enctype="multipart/form-data" 
                    name="userForm" class="needs-validation">
                        @csrf
                        <div class="box-body">
                        	<div class="">
                            <div class="form-group">
                                <label for="fname">First Name<span class="mandatory">*</span></label><p class="suggestion">Only your first name will be used at events if the nickname is left blank.</p>
                            <input type="text" value="{{$user->fname}}" name="fname" class="form-control" id="fname" placeholder="First Name">
                            
                            </div>

                            <div class="form-group">
                                <label for="lname">Last Name<span class="mandatory">*</span></label>
                            <input type="text" value="{{$user->lname}}" name="lname" class="form-control" id="lname" placeholder="Last Name">
                            </div>

                            <div class="form-group">
                                <label for="nick_name">Nick Name</label><p class="suggestion">If a Nick Name is provided then only this name will be used on events and also displayed to any potential matches.</p>
                            <input type="text" value="{{$user->nick_name}}" name="nick_name" class="form-control" id="nick_name" placeholder="Nick Name">
                            
                            </div>

                            <div class="form-group">
                                <label for="email">Email<span class="mandatory" >*</span></label>
                            <input type="text" value="{{$user->email}}" name="email" class="form-control" id="email" placeholder="Email" disabled>
                            </div>

                            <div class="form-group custm-date">
                            <label for="date_of_birth" class="col-form-label text-md-right" >{{ __('Date of Birth') }}<span class="mandatory" >*</span></label>
                            <p class="suggestion">To update your Date of Birth, just contact us.</p>
                                <input type="text" class="form-control @error('date_of_birth') is-invalid @enderror" id='date_of_birth' name="date_of_birth" value="{{Carbon\Carbon::parse($user->date_of_birth)->format('dS-F-Y')}}" autocomplete="date_of_birth" disabled>
                           
                            </div>
                            
                            <div class="form-group custm-gender">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}<span class="mandatory">*</span></label>
                            <input type="radio" value="male" name="gender" class="form-control" id="gender" {{ ($user->gender=="male")? "checked" : "" }} disabled><label for="male" class="male" >Male</label>
                            <input type="radio" value="female" name="gender" class="form-control" id="gender" {{ ($user->gender=="female")? "checked" : "" }} disabled><label for="female" class="male" >Female</label>
                            </div>
                            <div class="form-group">
                                <label for="contact_no">Contact Number<span class="mandatory">*</span></label>
                            <input type="text" value="{{$user->contact_no}}" name="contact_no" class="form-control" id="contact_no">
                            </div> 
                            
                            @error('contact_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                            <div class="form-group">
                                <label for="interesting_facts">Optional Interesting Fact</label><p class="suggestion">This is used for Guess the Interesting Fact where all the attendees interesting facts are display and people try and guess whose fact is whose. This is optional and just a bit of fun.</p>
                            <textarea name="interesting_facts" class="form-control" id="interesting_facts">{{$user->interesting_facts}}</textarea>
                            </div>
                        </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button id="userSubmitButtonProfile" type="submit" class="btn custm-btn">Update User</button>
                            <a id="changePassword" href="{{route('user.changePassword')}}" class="btn custm-btn">Update Password</a>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div><!--/.col (left) -->
            <!-- right column -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</aside>
            
      		</div>
        </div>
       </section>
@endsection
@section('customScript')
<script type="text/javascript">
    $(document).ready(function(){
        $('.cross-pic').click(function(){
            $('.custm-profile-pic-change').css('display','none');
        });
        $('.cross-pend-msg').click(function(){
            $('.pend-msg').css('display','none');
        });
    });
    </script>
@endsection
