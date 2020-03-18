<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"> 
        <link rel="icon" href="{{asset('frontend/images/logo.png')}}" type="image/x-icon">
        <title>Fun and Games Admin</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
       
        <!-- bootstrap 3.0.2 -->
        <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="{{ asset('admin/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="{{ asset('admin/css/ionicons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- iCheck for checkboxes and radio inputs -->
        <link href="{{ asset('admin/css/iCheck/all.css') }}" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="{{ asset('admin/css/AdminLTE.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="{{asset('admin/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- csv model -->
        <link href="{{ asset('admin/css/uploadCSVModel.css') }}" rel="stylesheet" type="text/css" />
        <link href = "{{asset('admin/css/jquery-ui.min.css')}}" rel = "stylesheet">
        <link href = "{{asset('admin/css/timepicker.min.css')}}" rel = "stylesheet">
        <!-- datepicker bootstrap -->
        <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet"> -->
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        @include('partials/admin/header')
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            @include('partials/admin/sidebar')
            <!-- Right side column. Contains the navbar and content of the page -->
            
            @yield('content')
            <!-- /.right-side -->
        </div><!-- ./wrapper -->
        
        <!-- jQuery 2.1.3 -->
        <script src="{{asset('admin/js/jquery.min.js')}}"></script>
        <!-- datepicker bootstrap -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
        <!-- custom validates -->
        <script src="{{ asset('admin/js/validate.min.js') }}" type="text/javascript"></script> 
        
        <script src="{{ asset('admin/js/validations/imageShow.js') }}" type="text/javascript"></script>
        <script src="{{ asset('admin/js/validations/customValidation.js') }}" type="text/javascript"></script>

        
        <script src="{{ asset('admin/js/validations/search.js') }}" type="text/javascript"></script>

        {{-- <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script> --}}
        <script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>

        <script src="{{ asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('admin/js/jquery-ui.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('admin/js/other.js') }}" type="text/javascript"></script>  
        <!-- jQuery UI 1.10.3 -->
        
        <!-- Bootstrap -->
        <script src="{{ asset('admin/js/bootstrap.min.js') }}" type="text/javascript"></script>
        
        <!-- DATA TABES SCRIPT -->
        <script src="{{ asset('admin/js/plugins/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
        <script src="{{asset('admin/js/plugins/datatables/dataTables.bootstrap.js')}}" type="text/javascript"></script>
        
        <!-- InputMask -->
        <script src="{{ asset('admin/js/plugins/input-mask/jquery.inputmask.js') }}" type="text/javascript"></script>
        <script src="{{ asset('admin/js/plugins/input-mask/jquery.inputmask.date.extensions.js') }}" type="text/javascript"></script>
        <script src="{{ asset('admin/js/plugins/input-mask/jquery.inputmask.extensions.js') }}" type="text/javascript"></script>
        <!-- bootstrap color picker -->
        <script src="{{ asset('admin/js/plugins/colorpicker/bootstrap-colorpicker.min.js') }}" type="text/javascript"></script>
        <!-- bootstrap time picker -->
        
        <script src="{{ asset('admin/js/timepicker.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('admin/js/plugins/timepicker/bootstrap-timepicker.min.js') }}" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="{{ asset('admin/js/plugins/sparkline/jquery.sparkline.min.js') }}" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="{{ asset('admin/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('admin/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="{{ asset('admin/js/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="{{ asset('admin/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="{{ asset('admin/js/plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="{{ asset('admin/js/AdminLTE/app.js') }}" type="text/javascript"></script>
        <!-- CK Editor -->
        {{-- <script src="{{asset('admin/js/plugins/ckeditor/ckeditor.js')}}" type="text/javascript"></script> --}}
        
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        {{-- <script src="{{ asset('admin/js/AdminLTE/dashboard.js') }}" type="text/javascript"></script>     --}}


        @yield('customScripts')

    </body>
</html>
