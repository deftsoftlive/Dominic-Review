@extends('layouts.frontend')
@section('content')
<div class="inner-section">
    <div class="container"> 
        <div class="col-md-offset-2 col-md-8">
            <div class="card custm-card">
                <div class="form-box" id="login-box">
                    <div class="header">{{ __('Login') }}</div>
                        <form method="POST" id="loginform" action="{{ route('login') }}">
                        @csrf
                            <div class="body bg-gray">
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                         
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                name="email" value="{{ old('email') }}" placeholder="Email">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" 
                                    name="password" placeholder="Password">
                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="login-btn-sec">
                                <button type="submit" id="loginSubmitButton" class="custm-btn new-btn btn-block cust-width-btn">{{ __('Login') }}</button>                
                                <a class="custm-btn reg-custm-btn cust-width-btn" href="{{ route('register') }}">{{__('Register')}}</a>  
                                <a class="forget-paswrd" href="{{ route('password.request') }}">Forgot Password ?</a>    
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
@endsection
