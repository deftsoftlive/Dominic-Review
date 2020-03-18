<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Free Datta Able Admin Template come up with latest Bootstrap 4 framework with basic components, form elements and lots of pre-made layout options" />
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template, free admin theme, free dashboard template"/>
    <meta name="author" content="CodedThemes"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon icon -->
    <link rel="icon" href="{{url('/admin-assets/images/favicon.ico')}}" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{url('/admin-assets/fonts/fontawesome/css/fontawesome-all.min.css')}}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{url('/admin-assets/plugins/animation/css/animate.min.css')}}">
    <!-- vendor css -->
    <link rel="stylesheet" type="text/css" href="{{url('/css/nestable.css')}}"> 
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link href="/bootstrap-fileinput-master/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="/bootstrap-fileinput-master/themes/explorer-fas/theme.css" media="all" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="{{url('/admin-assets/css/style.css')}}">
    <link rel="stylesheet" href="{{url('/css/chat.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/AdminFILE/dist/css/jquery-ui.css')}}">
<link href="{{ url('/css/vendors/vendor-custom.css') }}" rel="stylesheet">
<link href="{{ url('/css/vendors/vendor-responsive.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{url('/css/common-style.css')}}">
     <link rel="stylesheet" href="{{url('/css/common-responsive.css')}}">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="{{url('clockface/css/clockface.css')}}">
 
<script src="{{url('/AdminFILE/plugins/jquery/jquery.min.js')}}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="{{url('/bootstrap-fileinput-master/js/fileinput.js')}}" type="text/javascript"></script>
<script src="{{url('clockface/js/clockface.js')}}" type="text/javascript"></script>

</head>

<body>
<div class="custom-loading"><div class="loader5"></div></div>
  <!-- Main Sidebar Container -->
@include('vendors.sidebar')

<!-- Main Sidebar Container -->
@include('vendors.header')

<div class="pcoded-main-container">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
    <div class="pcoded-inner-content">
    <!-- Main Content -->
    @yield('vendorContents')
  </div>
</div>
  </div>
</div>

<script src="{{url('/admin-assets/js/vendor-all.min.js')}}"></script>
<script src="{{url('/admin-assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{url('/admin-assets/js/pcoded.min.js')}}"></script>

<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.0/jquery.validate.js"></script>
<script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="{{url('/admin-assets/js/validations/customValidation.js')}}"></script>

<!-- delete data js -->
<script src="{{ asset('js/deleteData.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
@yield('scripts')

</body>
</html>
