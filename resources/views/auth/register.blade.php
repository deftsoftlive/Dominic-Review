@extends('inc.homelayout')

@section('title', 'DRH|Register')

@section('content')

@php $country_code = DB::table('country_code')->orderBy('countryname','asc')->get(); @endphp

<!-- <section class="account-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="account-sec-content">
                        <h2 class="account-sec-heading">Register As Parent Or Adult</h2>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

@php $base_url = \URL::to('/'); @endphp
<section class="football-course-sec" style="background: url({{$base_url}}/public/uploads/{{ getAllValueWithMeta('signup_banner', 'banners') }});">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="football-course-content">
          <h2 class="f-course-heading">Register As Parent Or Adult</h2>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="register-sec">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card pr-form">
                <div class="card-header">{{ __('Parent/Adult Registration Form') }}</div>

                <div class="card-body">
                    <form id="register" class="register-form" method="POST" action="{{ route('register') }}">
                        @csrf

                        <input type="hidden" name="role_id" value="2">
                        <div class="row">
                        <!-- First Name -->
                        <div class="form-group row">
                            <label for="first_name" class="col-md-12 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-12">

                                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus placeholder="Please enter first name">

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

                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus placeholder="Please enter last name">
                                
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

                                <input type="radio" id="male22" name="gender" value="male">
                                <label for="male22">Male</label><br>
                                <input type="radio" id="female22" name="gender" value="female">
                                <label for="female22">Female</label><br>

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

                                <input id="date_of_birth" type="date" class="form-control{{ $errors->has('date_of_birth') ? ' is-invalid' : '' }}" name="date_of_birth" value="{{ old('date_of_birth') }}" required autofocus placeholder="Please enter date of birth">

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

                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus placeholder="Please enter address">

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

                                <input id="town" type="text" class="form-control{{ $errors->has('town') ? ' is-invalid' : '' }}" name="town" value="{{ old('town') }}" required autofocus placeholder="Please enter town">

                                
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

                                <input id="postcode" type="text" class="form-control{{ $errors->has('postcode') ? ' is-invalid' : '' }}" name="postcode" value="{{ old('postcode') }}" required autofocus placeholder="Please enter postcode">

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

                                <input id="county" type="text" class="form-control{{ $errors->has('county') ? ' is-invalid' : '' }}" name="county" value="{{ old('county') }}" required autofocus placeholder="Please enter county">

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

                        <!-- Phone Number -->
                        <div class="form-group row">
                            <label for="country" class="col-md-12 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-12">

                                <input id="phone_number" type="text" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ old('phone_number') }}" required autofocus placeholder="Please enter phone number">

                                 @if ($errors->has('phone_number'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone_number') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>

                        <!-- Email Address -->
                        <div class="form-group row">
                            <label for="email" class="col-md-12 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-12">
 
                                <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Please enter email">

                                 @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="form-group row">
                            <label for="password" class="col-md-12 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-12">

                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required autofocus placeholder="Please enter password">

                                 @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-12 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-12">

                                <input id="password_confirmation" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" value="{{ old('password_confirmation') }}" required autofocus placeholder="Please enter password confirmation">
                            </div>
                        </div>

                    </div>
                    <div class="form-button">
                        <div class="form-group row mb-0">
                            <div class="col-md-12 form-btn">
                                <button type="submit" class="cstm-btn main_button">
                                    {{ __('Register') }}
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
@endsection
