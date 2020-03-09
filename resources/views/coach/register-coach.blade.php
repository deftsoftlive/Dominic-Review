<!-- Header section -->
@extends('inc.homelayout')

@section('title', 'DRH|Coach Registration')

@section('content')

<!-- Country listing -->
@php $country_code = DB::table('country_code')->get(); @endphp

<section class="account-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="account-sec-content">
                        <h2 class="account-sec-heading">Register As Coach</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="register-sec">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Coach Registration Form') }}</div>

                <div class="card-body">
                    <form id="register" class="register-form" method="POST" action="{{ route('register') }}">
                        @csrf

                        <input type="hidden" name="role_id" value="2">
                        <div class="row">
                        <!-- First Name -->
                        <div class="form-group row">
                            <label for="first_name" class="col-md-12 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-12">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" placeholder="Please enter first name" required autocomplete="first_name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Last Name -->
                        <div class="form-group row">
                            <label for="last_name" class="col-md-12 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-12">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" placeholder="Please enter last name" required autocomplete="last_name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Gender -->
                        <div class="form-group row gender-opt">
                            <label for="gender" class="col-md-12 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-12 det-gender-opt">
                                <!-- <input id="gender" type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" required autocomplete="gender" autofocus> -->

                                <input type="radio" id="male" name="gender" value="male">
                                <label for="male">Male</label><br>
                                <input type="radio" id="female" name="gender" value="female">
                                <label for="female">Female</label><br>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Date of Birth -->
                        <div class="form-group row">
                            <label for="date_of_birth" class="col-md-12 col-form-label text-md-right">{{ __('Date Of Birth') }}</label>

                            <div class="col-md-12">
                                <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}" required autocomplete="date_of_birth" autofocus>

                                @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="form-group row address-detail">
                            <label for="address" class="col-md-12 col-form-label text-md-right">{{ __('Address (Number & Street)') }}</label>

                            <div class="col-md-12">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" placeholder="Please enter address" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Town -->
                        <div class="form-group row">
                            <label for="town" class="col-md-12 col-form-label text-md-right">{{ __('Town') }}</label>

                            <div class="col-md-12">
                                <input id="town" type="text" placeholder="Please enter town" class="form-control @error('town') is-invalid @enderror" name="town" value="{{ old('town') }}" required autocomplete="town" autofocus>

                                @error('town')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Postcode -->
                        <div class="form-group row">
                            <label for="postcode" class="col-md-12 col-form-label text-md-right">{{ __('Postcode') }}</label>

                            <div class="col-md-12">
                                <input id="postcode" type="text" placeholder="Please enter postcode" class="form-control @error('postcode') is-invalid @enderror" name="postcode" value="{{ old('postcode') }}" required autocomplete="postcode" autofocus>

                                @error('postcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- County -->
                        <div class="form-group row">
                            <label for="county" class="col-md-12 col-form-label text-md-right">{{ __('County') }}</label>

                            <div class="col-md-12">
                                <input id="county" type="text" class="form-control @error('county') is-invalid @enderror" name="county" value="{{ old('county') }}" placeholder="Please enter county" required autocomplete="county" autofocus>

                                @error('county')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Country -->
                        <div class="form-group row">
                            <label for="country" class="col-md-12 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-12">
                            <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

                                <select id="country" name="country" class="form-control cstm-select-list nw_cstm_select">

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
                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" placeholder="Please enter phone number" required autocomplete="phone_number" autofocus>

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Email Address -->
                        <div class="form-group row">
                            <label for="email" class="col-md-12 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Please enter email address" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="form-group row">
                            <label for="password" class="col-md-12 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Please enter password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-12 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-12">
                                <input id="password-confirm" placeholder="Please enter confirm password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                    </div>
                    <div class="form-button">
                        <div class="form-group row mb-0">
                            <div class="col-md-12 form-btn">
                                <button type="submit" class="cstm-btn">
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
