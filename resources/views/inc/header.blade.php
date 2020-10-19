<!DOCTYPE html>
<html lang="en">
   <head>
    <title>DRH Sports</title>
    <link rel="icon" href="{{ url('/images/fav-icon.png')}}" type="image/x-icon" sizes="16x16">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,user-scalable=0">
    <link href="https://fonts.googleapis.com/css?family=Bangers|Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet">
    <link href="{{ URL::asset('/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.min.css" />
	  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{ URL::asset('/css/style.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('/css/responsive.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.0/flexslider.min.css">
    <link href="https://malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css" rel="stylesheet">
    <script src="{{URL::asset('/js/timeCounter.js')}}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {!! getAllValueWithMeta('google_analytics', 'general-setting') !!}
  </head>
  <style>
    input#crop {
        padding: 5px 25px 5px 25px;
        background: lightseagreen;
        border: #485c61 1px solid;
        color: #FFF;
        visibility: hidden;
    }

    #cropped_img {
        margin-top: 40px;
    }
  </style>

  <body id="main">
    <div class="design-loader">
      <div class="outer-loader">
          <div class="loader123">
            <span class="loader-inner"></span>
          </div>
        </div>
    </div>
    <header class="main-header">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <ul class="header-top mobile">
              <li>
                <a href="javascript:void(0);" class="top-nav-link"><span><i class="fas fa-envelope"></i></span>info@drhsports.co.uk</a>
              </li>
              <li>
                <a href="javascript:void(0);" class="top-nav-link"><span><i class="fas fa-mobile-alt"></i></span>07929 341226</a>
              </li>
              <li>
                <ul class="social-meadia-icons">
                  <li>
                    <a target="_blank" href="{{ getAllValueWithMeta('facebook_link', 'general-setting') }}" class="social-icon-link"><i class="fab fa-facebook-f"></i></a>
                  </li>
                  <li>
                    <a target="_blank" href="{{ getAllValueWithMeta('instagram_link', 'general-setting') }}" class="social-icon-link"><i class="fab fa-instagram"></i></a>
                  </li>
                  <li>
                    <a target="_blank" href="{{ getAllValueWithMeta('google_link', 'general-setting') }}" class="social-icon-link"><i class="fab fa-google-plus"></i></a>
                  </li>
                </ul>
              </li>
            </ul>

            <!-- Nav menu section -->
           <!-- /.container-->