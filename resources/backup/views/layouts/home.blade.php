<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">

    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, maximum-scale=1,initial-scale=1.0">  

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


	<link rel="stylesheet" href="https://cdn.rawgit.com/michalsnik/aos/2.0.4/dist/aos.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/frontend/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.0/flexslider.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.3.0/rangeslider.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.9/css/weather-icons.css">

    <!-- materialdesignicons css -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
     <!-- ============ -->

    <link rel="stylesheet" type="text/css" href="{{URL::asset('/frontend/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

 @yield('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/frontend/css/styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/frontend/css/responsive.css')}}">
     <link rel="stylesheet" href="{{URL::asset('/css/chat.css')}}">
     <link rel="stylesheet" href="{{URL::asset('/css/common-style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/css/common-responsive.css')}}">

<style type="text/css">
    .custom-loading {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: #11111169;
        z-index: 99;
        display: none;
    }
</style>

</head>
<body data-url="{{url('/')}}" class="{{\Request::route()->getName() === 'vendor_detail_page' || \Request::route()->getName() === 'myBusinessView' ? 'gray-bg' : ''}}">
	
<div class="custom-loading"><div class="loader5"></div></div>



@if(\Request::route()->getName() =="homepage" || \Request::route()->getName() =="homepage2")
@include('home.includes.header')
@else
@include('home.includes.inner_header')

@endif

@yield('content')

@include('home.includes.footer')

  <!-- Scripting starts here -->
<!--     <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script> -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.rawgit.com/michalsnik/aos/2.0.4/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/0.1.12/wow.min.js"></script>
    <script src="{{URL::asset('/frontend/js/animation.js')}}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.3.0/rangeslider.min.js"></script>
    <script src="{{URL::asset('/frontend/js/ResizeSensor.js')}}"></script>
    <script src="{{URL::asset('/frontend/js/sticky-sidebar.min.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="{{URL::asset('/frontend/js/bootstrap-datetimepicker.min.js')}}"></script>
 <!--    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.0/jquery.flexslider.min.js"></script> -->
     <script type="text/javascript" src="{{URL::asset('frontend/js/flexslider.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('/frontend/js/owl.carousel.min.js')}}"></script>
    <script src="https://yauzer.com/js/validate.min.js"></script>
    <script src="{{URL::asset('/admin-assets/js/validations/customValidation.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
    <script type="text/javascript" src="{{URL::asset('/frontend/js/custom.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
     
    <script> 
        AOS.init();

        new WOW().init();
    </script>

    <script>








   jQuery("body").find('.custom-loading').show();
 





        //Photos flex slider 
$(window).load(function() {

      setTimeout(() => {
        jQuery("body").find('.custom-loading').hide();
           
      }, 1500)
  // The slider being synced must be initialized first
  $('#Photo-carousel').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    itemWidth: 165,
    itemMargin: 5,
    maxItems: 6,
    asNavFor: '#Photo-slider'
  });
 
  $('#Photo-slider').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    sync: "#Photo-carousel"
  });


  // The slider being synced must be initialized first
  $('#Video-carousel').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    itemWidth: 210,
    itemMargin: 5,
    asNavFor: '#Video-slider'
  });
 
  $('#Video-slider').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    sync: "#Video-carousel"
  });

});

 
$(function () {
    $('#datetimepicker1').datetimepicker();
    $('#weatherDatePicker').datetimepicker({ format: 'YYYY-MM-DD' });
});

    </script>
@yield('scripts')

</body>

</html>