
<!DOCTYPE html>
<html>

<!-- <head> -->
    <title>DRH Sports</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1,initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.rawgit.com/michalsnik/aos/2.0.4/dist/aos.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="{{URL::asset('/e-shop/css/owl.carousel.min.css')}}" rel="stylesheet">
        <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.0/flexslider.min.css"> -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/e-shop/css/animate.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/e-shop/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/e-shop/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/e-shop/css/custom.css')}}">

@yield('styleSheet')

  <style type="text/css">
    /*.custom-loading {
       
        display: none;
    }*/
/*    .messagePOPUP {
    position: fixed;
    width: 100%;
    top: 40%;
    padding: 30px;
    z-index: 999999999999999;
    display: none;
}

.messagePOPUP div {
    margin: 20px auto;
    padding: 20px;
    max-width: 500px;
    background: #ffffff;
    box-shadow: 0px 8px 8px #0010347a;
    border: 2px solid #f0f0f0;
    color: #001034;
    text-align: center;
    font-size: 22px;
}*/

  .no-resuld-found {
    padding: 30px;
    text-align: center;
    max-width: 470px;
    margin: 30px auto;
    border: 2px solid #d1d1d1;
    border-radius: 20px;
}
 .no-resuld-found figure{
  margin-bottom: 20px;
 }
.no-resuld-found h2{
  margin-bottom: 10px;
}
</style>
<!-- </head> -->

<body data-redirect="{{\Request::fullUrl()}}">

<!-- <div class="messagePOPUP"> </div> -->
<!--  <div class="pre-loader custom-loading">
       <div class="pre-loader-inner">
      <div class="predot white"></div>
      <div class="predot"></div>
      <div class="predot"></div>
       <div class="predot"></div>
       <div class="predot"></div>
   </div>
</div> -->

@yield('content')

    <!-- Scripting starts here -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/0.1.12/wow.min.js"></script>
    @yield('jscript')
    <script>
        new WOW().init();
    </script>
</body>

</html>
