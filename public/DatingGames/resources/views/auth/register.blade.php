@extends('layouts.frontend')
@section('content')
<div class="inner-section">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-offset-2 col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}
                </div>
                    <h3 class="reg-text">Please register an account with us</h3>
                <div class="card-body">
                    <form method="POST" id="front-reg-form" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label for="fname" class="col-form-label text-md-right">{{ __('First Name') }}<span class="mandatory">*</span></label>

                                <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" required autocomplete="fname">

                                @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>

                        <div class="form-group">
                            <label for="lname" class="col-form-label text-md-right">{{ __('Last Name') }}<span class="mandatory">*</span></label>

                            
                                <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="lname">

                                @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>


                        <div class="form-group custm-date">
                            <label for="date_of_birth" class="col-form-label text-md-right">{{ __('Date of Birth') }}<span class="mandatory">*</span></label>
                                <input type="text" class="form-control @error('date_of_birth') is-invalid @enderror" id='date_of_birth' name="date_of_birth" value="{{ old('date_of_birth') }}" required autocomplete="date_of_birth">
                        </div>
                            @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        <div class="form-group">
                            <label for="gender" class="col-form-label text-md-right">{{ __('Gender') }}<span class="mandatory">*</span></label>

                                <input type="radio" id="male" name="gender" value="male"  {{ old('gender') == 'male' ? 'checked' : '' }} checked/> <label for="male">Male</label>
                                <input type="radio" id="female" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}/> <label for="female">Female</label>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>
                        
                        <div class="form-group">
                            <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}<span class="mandatory">*</span></label>

                            
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group">
                            <label for="contact_no" class="col-form-label text-md-right">{{ __('Contact Number') }}<span class="mandatory">*</span></label>

                           
                                <input id="contact_no" type="text" class="form-control @error('contact_no') is-invalid @enderror" name="contact_no" value="{{ old('contact_no') }}" required autocomplete="contact_no">

                                @error('contact_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-form-label text-md-right">{{ __('Password') }}<span class="mandatory">*</span></label>

                            
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}<span class="mandatory">*</span></label>

                           
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                           
                        </div>

               
                        
                                <button type="button" id="submitBtn" class="btn custm-btn reg-btn">
                                    {{ __('Register') }}
                                </button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection