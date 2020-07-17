<!DOCTYPE html>
<html lang="en">

<head>
    <title>DRH Panel</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Free Datta Able Admin Template come up with latest Bootstrap 4 framework with basic components, form elements and lots of pre-made layout options" />
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template, free admin theme, free dashboard template"/>
    <meta name="author" content="CodedThemes"/>
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.0/flexslider.min.css">
    <!-- Favicon icon -->
    <link rel="icon" href="{{URL::asset('/admin-assets/images/favicon.ico')}}" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{URL::asset('/admin-assets/fonts/fontawesome/css/fontawesome-all.min.css')}}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{URL::asset('/admin-assets/plugins/animation/css/animate.min.css')}}">
    <!-- vendor css -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/css/nestable.css')}}"> 
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link href="{{URL::asset('/bootstrap-fileinput-master/css/fileinput.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{URL::asset('/bootstrap-fileinput-master/themes/explorer-fas/theme.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{URL::asset('/AdminFILE/dist/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/admin-assets/css/style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/css/common-style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/css/common-responsive.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />


<script src="{{URL::asset('/AdminFILE/plugins/jquery/jquery.min.js')}}"></script>
 
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="{{URL::asset('/bootstrap-fileinput-master/js/fileinput.js')}}" type="text/javascript"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/i18n/af.min.js"></script> -->

<!-- <script>
    $(function () {
      $("#inputPlayer").select2();
    });
</script> -->
</head>

<body>

  <!-- Main Sidebar Container -->
@include('admin.includes.navbar')

<!-- Main Sidebar Container -->
@include('admin.includes.header')

<div class="pcoded-main-container">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
    <div class="pcoded-inner-content">
    <!-- Main Content -->
    @yield('content')
  </div>
</div>
  </div>
</div>


    <!-- Required Js -->
<!-- extra -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->



<script src="{{URL::asset('/admin-assets/js/vendor-all.min.js')}}"></script>
<script src="{{URL::asset('/admin-assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('/admin-assets/js/pcoded.min.js')}}"></script>

<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.0/jquery.validate.js"></script>
<script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
<script src="{{URL::asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script src="{{URL::asset('/admin-assets/js/validations/customValidation.js')}}"></script>
<script src="{{URL::asset('/admin-assets/js/admin_custom.js')}}" type="text/javascript"></script>

<!-- delete data js -->
<script src="{{ asset('js/deleteData.js') }}"></script>

@yield('scripts')

</body>
</html>
