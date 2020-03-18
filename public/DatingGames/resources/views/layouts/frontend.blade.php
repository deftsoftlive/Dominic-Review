<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Delius" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
    <link href = "{{asset('frontend/css/jquery-ui.min.css')}}" rel = "stylesheet">
    <link rel="icon" href="{{asset('upload/images/'.$settings->header_logo)}}" type="image/x-icon">
    <title>Fun and Games Dating, Manchester, UK</title>
</head>
<body>
    @include('partials/frontend/header')
    
    @yield('content')

    @include('partials/frontend/footer')
<!--footer section starts here-->
    <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/js/morphext.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap-tabcollapse.js')}}"></script>
    <script src="{{asset('frontend/js/validate.min.js')}}"></script>   
    <script src="{{asset('frontend/js/custom.js')}}"></script>
    <script>
        $('.backbanner').owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
           autoplayTimeout:4000,
            autoplay:true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })

    </script>
    <script>
        $('.events').owlCarousel({
            loop: false,
            margin: 10,
            nav: true,
            autoplay:true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        })

    </script>
</body>

</html>
@yield('customScripts')
@yield('customScript')