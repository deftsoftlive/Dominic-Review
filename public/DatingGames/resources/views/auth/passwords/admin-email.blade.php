<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Admin</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="{{ asset('admin/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="{{ asset('admin/css/AdminLTE.css') }}" rel="stylesheet" type="text/css" />

    </head>
    <body class="bg-black">

<div class="form-box" id="login-box">
        <div class="header">{{ __('Reset Password') }}</div>
        <div class="body bg-gray">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        <form method="POST" id="loginform" action="{{ route('admin_password.email') }}">
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
            <div class="footer">  
                <button type="submit" id="loginSubmitButton" class="btn bg-olive btn-block">{{ __('Send Password Reset Link') }}</button>                
                <p><a href="{{ route('admin.login') }}">{{ __('Login') }}</a></p>      
            </div>
        </form>   
</div>
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('admin/js/bootstrap.min.js') }}" type="text/javascript"></script>  

        <script src="{{ asset('admin/js/validate.min.js') }}" type="text/javascript"></script> 

        <script src="{{ asset('admin/js/validations/userValidation.js') }}" type="text/javascript"></script>

    </body>
</html>

