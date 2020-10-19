@extends('layouts.frontend')
@section('content')
<div class="inner-section">
    <div class="container">
        <div class="col-md-offset-2 col-md-8">
            <div class="card custm-card">
<div class="form-box" id="login-box">
        <div class="header">{{ __('Reset11 Password') }}</div>
        <div class="body bg-gray">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        <form method="POST" id="loginform" action="{{ route('password.email') }}">
            @csrf
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                     <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                      name="email" value="{{ old('email') }}" placeholder="Email">

                        @if ($errors->has('email'))
                            <span class="help-block" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif

                    </div>
            </div>
            <div class="login-btn-sec">
                <button type="submit" id="loginSubmitButton" class=" custm-btn btn-block new-btn1">{{ __('Send Password Reset Link') }}</button>                
                <a class="custm-btn reg-custm-btn" href="{{ route('login') }}">{{ __('Login') }}</a>     
                </div> 
        </form>   
</div>
</div>
</div>
</div>
</div>
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('admin/js/bootstrap.min.js') }}" type="text/javascript"></script>  

        <script src="{{ asset('admin/js/validate.min.js') }}" type="text/javascript"></script> 

        <script src="{{ asset('admin/js/validations/userValidation.js') }}" type="text/javascript"></script>

@endsection

