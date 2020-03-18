<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Panel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{URL::asset('/AdminFILE/dist/css/adminlte.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{URL::asset('/AdminFILE/plugins/iCheck/square/blue.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{URL::asset('/css/admin.css')}}">

  <style type="text/css">
    .errorBox {
    background: #f5f5f5;
    padding: 10px;
    color: red;
    text-align: center;
}
  </style>
      <!-- <script src="{{URL::asset('/frontend/js/jquery.min.js')}}"></script> -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
</head>
<body class="hold-transition login-page">
  <div class="admin-login-wrap" style="background: {{URL::asset('/frontend/images/login-bg.jpg')}}">
 <div class="login-box">
  <div class="login-logo">

    <a href="{{url('/')}}">
      <span class="dashboard-logo"><img src="{{URL::asset('/images/DRH-SPORT1.png')}}" width="100%"></span>
      <b>DRH Sports</b></a>
  </div>  
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

     
      <form action="{{ url('admin/login') }}" id="loginForm" method="post">
       @if(Session::has('messages'))

            <div class="errorBox">
                 {{Session::get('messages')}}
            </div>
 
       @endif
        @csrf
       
        {{textbox($errors, 'Email', 'email')}}
        {{password($errors, 'Password', 'password')}}
     
        <div class="row">
          <div class="col-md-12 text-center">        
          
            <button type="submit" id="loginFormBtn" class="cstm-btn">Sign In</button>

                           <label class="errorCapcha" for="g-recaptcha-response"></label>
            </div>
        
        <div class="col-md-12 text-center"> 
         @if (Route::has('password.request'))
                                    <a class="btn btn-link text-center" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                              </div>
                                
        
        </div>
      </form>
    </div>
    
  </div>
</div>  
</div>

<!-- /.login-box -->
<script src="{{URL::asset('/AdminFILE/plugins/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.0/jquery.validate.js"></script>
 <script src="{{URL::asset('/admin-assets/js/validations/customValidation.js')}}"></script>
<script src="{{URL::asset('/admin-assets/js/validations/loginValidation.js')}}"></script>

</body>
</html>
