@extends('inc.homelayout')

@section('title', 'DRH|Register')

@section('content')

@php $country_code = DB::table('country_code')->get(); @endphp

<style>
    .alert{
        margin-bottom: 0px;
    }
    #register-sec{display: none;}
</style>
<div class="account-menu acc_sub_menu">
  <div class="container">
    <div class="outer-wrap">
    <div class="menu-title">
	  <span>Account</span> menu
	</div>
	<nav>
	  <ul>
	    @include('inc.parent-menu')
	  </ul>
	</nav>
</div>
  </div>
</div>

<!-- Success Message -->
@if(Session::has('success'))               
    <div class="alert_msg alert alert-success">
        <!-- <h2>Success <i class="fa fa-exclamation" aria-hidden="true"></i></h2> -->
        <p>{{ Session::get('success') }} </p>
    </div>
@endif

<section class="member section-padding c-d-book-now family_members">

<div class="container">
    <div class="text-center">
        <div class="section-heading">
              <h1 class="sec-heading">My Family</h1>
        </div>
    </div>

        <div class="row">
				
				<!-- ***********************
                |   Parent Details - Start
                |*************************** -->
				<div class="col-sm-12">
				  <div class="type-parent">
                        <!-- <a href="#register-sec" id="parent_detail" class="member-container"> -->
                        <a href="{{url('/user/family-member/overview')}}/{{Auth::user()->id}}" class="member-container">
                          <div class="member-icon">
                            <i>{{$user->first_name}}</i>
                          </div>
                        </a>
                    </div>
				</div>
				<!-- ***********************
                |   Parent Details - End
                |*************************** -->
				
				
				<!-- ***********************
				|	Children Details - Start
				|*************************** -->
				<div class="all-members">
				@if(count($children)>0)
					@foreach($children as $ch)	
					  <div class="col-md-2 type-{{$ch->type}}">
					    <a href="{{url('/user/family-member/overview')}}/{{$ch->id}}" class="member-container">
						  <div class="member-icon">
						    <i class="fas fa-eye"></i>
						  </div>
						  <div class="member-name">
						    {{$ch->first_name}}
						  </div>
						</a>
					  </div>
					@endforeach 
				@endif
				<!-- ***********************
				|	Children Details - End
				|*************************** -->


				<!-- *************************
                |   Add Family Member - Start
                |***************************** -->
				<div class="col-md-2 type-add" style="padding-top: 10px;">
				    <a href="{{url('/user/family-member/add')}}" class="member-container add-member">
					  <div class="member-icon">
					    <i class="fas fa-plus"></i>
					  </div>
					  <div class="member-name">
					    Add family member
					  </div>
					</a>
				  </div>
				<!-- *************************
                |   Add Family Member - End
                |***************************** -->

		  		</div>
				</div>
                
                <!-- *************************
                |   Linkings - Start
                |***************************** -->
        		<div class="member-book">
        			<a target="_blank" href="{{url('/shop')}}" class="cstm-btn main_button">Go To Shop</a>
            		<a target="_blank" href="{{url('/coach-listing')}}" class="cstm-btn main_button">Coach Connect</a>
            		<a target="_blank" href="{{url('/tennis-landing')}}" class="cstm-btn main_button">Book Tennis Coaching</a>
            		<a target="_blank" href="{{url('camp-listing')}}" class="cstm-btn main_button">Book A Holiday Camp</a>
            		<a target="_blank" href="{{url('/football-landing')}}" class="cstm-btn main_button">Book Football Coaching</a>
            		<a target="_blank" href="{{url('/school-landing')}}" class="cstm-btn main_button">Book A School Club</a>
        		</div>
                <!-- *************************
                |   Linkings - End
                |***************************** -->
         </div>
</section>

<!-- Account setting section for account holder - Start Here -->
<section class="register-sec account_settings section-padding" id="register-sec">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card acc_card">
                <div class="card-header">{{ __('Account Settings') }}</div>

                <div class="card-body">
                    <form class="register-form" method="POST" action="{{route('update_account_settings')}}">
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
                        <div class="form-group row gender-opt signup-gender-op ">
                            <label for="gender" class="col-md-12 col-form-label text-md-right ">{{ __('Gender') }}</label>

                            <div class="col-md-12 det-gender-opt main_acc-set" >

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
                      <!--   <div class="form-group row">
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
                        </div>   -->  


                    </div>
                    <div class="form-button">
                        <div class="form-group row mb-0">
                            <div class="col-md-12 form-btn">
                                <button type="submit" class="cstm-btn main_button">
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
<!-- Account setting section for account holder - End Here -->

<!-- Course/Camp Linking - Start -->
<section class="click-here-sec">
      <div class="container">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="click-sec-content">
              <h2 class="click-sec-tagline">Need help with kids camps or our coaching courses?</h2>
                <ul class="click-btn-content">
                  <li>
                    <figure>
                    <img src="{{url('/')}}/public/images/click-btn-img.png">
                </figure>
                </li>
                <li>
                  <a href="" class="cstm-btn main_button">Click Here</a>
                </li>
                <li>
                    <figure>
                    <img src="{{url('/')}}/public/images/click-btn-img.png">
                </figure>
                </li>
                </ul>
            </div>
          </div>
        </div>
      </div>
</section>
<!-- Course/Camp Linking - End -->

@endsection