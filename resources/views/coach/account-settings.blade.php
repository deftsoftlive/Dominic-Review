@extends('inc.homelayout')

@section('title', 'DRH|Register')

@section('content')

@php 
  $country_code = DB::table('country_code')->get(); 
  $notification = DB::table('parent_coach_reqs')->where('coach_id',Auth::user()->id)->where('status',NULL)->count();
  $user = DB::table('users')->where('id',Auth::user()->id)->first();    
@endphp
<div class="account-menu">
  <div class="container">
    <div class="menu-title">
      <span>Account</span> menu
    </div>
    <nav>
      <ul>
        @include('inc.coach-menu')
      </ul>
    </nav>
  </div>
</div>

@if(Session::has('success'))               
    <div class="alert_msg alert alert-success">
        <p>{{ Session::get('success') }} </p>
    </div>
@endif

<section class="register-sec">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Account Settings') }}</div>

                <div class="card-body">
                    <form id="acc-settings" class="register-form" method="POST" action="{{route('update_account_settings')}}">
                        @csrf

                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <div class="row">
                        <!-- First Name -->
                        <div class="form-group row">
                            <label for="first_name" class="col-md-12 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-12">

                                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ $user->first_name }}" required autofocus placeholder="Please enter first name">

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                               
                            </div>
                        </div>

                        <!-- Last Name -->
                        <div class="form-group row">
                            <label for="last_name" class="col-md-12 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-12">

                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ $user->last_name }}" required autofocus placeholder="Please enter last name">
                                
                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Gender -->
                        <div class="form-group row gender-opt signup-gender-op">
                            <label for="gender" class="col-md-12 col-form-label text-md-right ">{{ __('Gender') }}</label>

                            <div class="col-md-12 det-gender-opt">

                                <input type="radio" id="male" name="gender" value="male" {{ $user->gender == 'male' ? 'checked' : '' }}>
                                <label for="male">Male</label><br>
                                <input type="radio" id="female" name="gender" value="female" {{ $user->gender == 'female' ? 'checked' : '' }}>
                                <label for="female">Female</label><br>

                                <div id="select_gender"></div>
                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Date of Birth -->
                        <div class="form-group row">
                            <label for="date_of_birth" class="col-md-12 col-form-label text-md-right">{{ __('Date Of Birth') }}</label>

                            <div class="col-md-12">

                                <input id="date_of_birth" type="date" class="form-control{{ $errors->has('date_of_birth') ? ' is-invalid' : '' }}" name="date_of_birth" value="{{ $user->date_of_birth }}" required autofocus placeholder="Please enter date of birth">

                                @if ($errors->has('date_of_birth'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('date_of_birth') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="form-group row address-detail">
                            <label for="address" class="col-md-12 col-form-label text-md-right">{{ __('Address (Number & Street)') }}</label>

                            <div class="col-md-12">

                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $user->address }}" required autofocus placeholder="Please enter address">

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Town -->
                        <div class="form-group row">
                            <label for="town" class="col-md-12 col-form-label text-md-right">{{ __('Town') }}</label>

                            <div class="col-md-12">

                                <input id="town" type="text" class="form-control{{ $errors->has('town') ? ' is-invalid' : '' }}" name="town" value="{{ $user->town }}" required autofocus placeholder="Please enter town">

                                
                                @if ($errors->has('town'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('town') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>

                        <!-- Postcode -->
                        <div class="form-group row">
                            <label for="postcode" class="col-md-12 col-form-label text-md-right">{{ __('Postcode') }}</label>

                            <div class="col-md-12">

                                <input id="postcode" type="text" class="form-control{{ $errors->has('postcode') ? ' is-invalid' : '' }}" name="postcode" value="{{ $user->postcode }}" required autofocus placeholder="Please enter postcode">

                                 @if ($errors->has('postcode'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('postcode') }}</strong>
                                        </span>
                                    @endif

                            </div>
                        </div>

                        <!-- County -->
                        <div class="form-group row">
                            <label for="county" class="col-md-12 col-form-label text-md-right">{{ __('County') }}</label>

                            <div class="col-md-12">

                                <input id="county" type="text" class="form-control{{ $errors->has('county') ? ' is-invalid' : '' }}" name="county" value="{{ $user->county }}" required autofocus placeholder="Please enter county">

                                 @if ($errors->has('county'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('county') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>

                        <!-- Country -->
                        <div class="form-group row">
                            <label for="country" class="col-md-12 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-12">
                             <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

                                <select id="country" name="country" class="form-control cstm-select-list">
                                    <option value="{{$user->country}}">{{$user->country}}</option>
                                    @foreach($country_code as $name)
                                        <option value="{{$name->countryname}}">{{$name->countryname}}</option>
                                    @endforeach

                                </select>

                                 @if ($errors->has('country'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

	                    <!-- Relationship -->
                       <!--  <div class="form-group row">
                            <label for="relation" class="col-md-12 col-form-label text-md-right">{{ __('What is your relationship to this person?') }}</label>

                            <div class="col-md-12">
                             <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

                                <select id="relation" name="relation" class="form-control cstm-select-list">
                                	<option selected="" disabled="" value="">Please Choose</option>
                                    <option value="Mother" {{$user->relation == 'Mother' ? 'selected' : ''}}>Mother</option>
                                    <option value="Father" {{$user->relation == 'Father' ? 'selected' : ''}}>Father</option>
                                    <option value="Guardian" {{$user->relation == 'Guardian' ? 'selected' : ''}}>Guardian</option>
                                    <option value="Spouse" {{$user->relation == 'Spouse' ? 'selected' : ''}}>Spouse/Partner</option>
								</select>

                                 @if ($errors->has('relation'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('relation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>    --> 


                    </div>
                    <div class="form-button">
                        <div class="form-group row mb-0">
                            <div class="col-md-12 form-btn">
                                <button type="submit" class="cstm-btn">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>



<section class="change-password">
<div class="container">
    <div class="row">
        <!-- left column -->
        <div class="col-lg-8 col-md-10">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Change Password</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form method="POST" id="changePasswordForm" action="{{route('coach.updatePassword')}}">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="oldpassword">Old Password</label>
                            <input type="password" name="oldpassword" class="form-control" 
                            id="oldpassword" placeholder="Enter Old Password">
                        </div>
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" name="password" class="form-control" 
                            id="password" placeholder="Enter New Password">
                        </div>
                        <div class="form-group">
                            <label for="conpassword">Confirm Password</label>
                            <input type="password" name="conpassword" class="form-control" 
                            id="conpassword" placeholder="Enter Confirm Password">
                        </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" id="passwordSubmitButton" class="cstm-btn">Update Password</button>
                    </div>
                </form>
            </div><!-- /.box -->
        </div><!--/.col (left) -->
        <!-- right column -->
    </div>   <!-- /.row -->
	</div>
</section><!-- /.content -->
@endsection
