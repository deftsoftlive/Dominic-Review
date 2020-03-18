<!DOCTYPE html>
<html>

<head>
    <title>ENVISIUN</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1,initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.rawgit.com/michalsnik/aos/2.0.4/dist/aos.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="{{url('/e-shop/css/owl.carousel.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.0/flexslider.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('/e-shop/css/animate.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{url('/e-shop/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('/e-shop/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('/e-shop/css/custom.css')}}">
</head>
<style type="text/css">
  html,
.cstm404-sec , .cstm404-container{
  height: 100vh;
  overflow: hidden;
  position: relative;
}
.cstm404-sec:before, .cstm404-sec:after,
.cstm404-container:before,
.cstm404-container:after {
  content: "";
  background: linear-gradient(#203075, #233581);
  border-radius: 50%;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.cstm404-sec:before,
.cstm404-container:before {
  background: linear-gradient(#233581, #203075);
}

.cstm404-sec {
  background: linear-gradient(#203075, #233581);
  overflow: hidden;
}
.cstm404-sec:before {
  height: 105vmax;
  width: 105vmax;
  z-index: -4;
}
.cstm404-sec:after {
  height: 80vmax;
  width: 80vmax;
  z-index: -3;
}

.cstm404-container {
  display: flex;
  justify-content: center;
  align-items: center;
  color: #fff;
  font-family: "Varela Round", Sans-serif;
  text-shadow: 0 30px 10px rgba(0, 0, 0, 0.15);
}
.cstm404-container:before {
  height: 60vmax;
  width: 60vmax;
  z-index: -2;
}
.cstm404-container:after {
  height: 40vmax;
  width: 40vmax;
  z-index: -1;
}

.main {
  text-align: center;
  z-index: 5;
}

.cstm404-sec p {
  font-size: 18px;
  margin-top: 0;
  color: #fff;
  margin-bottom: 20px;
}

.cstm404-sec h1 {
  font-size: 95px;
  margin: 0;
}


.cstm404-sec .bubble {
  background-image: linear-gradient(120deg, #f6d365 0%, #fda085 100%);
  border-radius: 50%;
  box-shadow: 0 30px 15px rgba(0, 0, 0, 0.15);
  position: absolute;
}
.cstm404-sec .bubble:before, .cstm404-sec .bubble:after {
  content: "";
  /*background: linear-gradient(#ec5dc1, #d61a6f);*/
      background-image: linear-gradient(120deg, #f6d365 0%, #fda085 100%);
  border-radius: 50%;
  box-shadow: 0 30px 15px rgba(0, 0, 0, 0.15);
  position: absolute;
}
.cstm404-sec .bubble:nth-child(1) {
  top: 15vh;
  left: 15vw;
  height: 22vmin;
  width: 22vmin;
}
.cstm404-sec .bubble:nth-child(1):before {
  width: 13vmin;
  height: 13vmin;
  bottom: -25vh;
  right: -10vmin;
}
.cstm404-sec .bubble:nth-child(2) {
  top: 20vh;
  left: 38vw;
  height: 10vmin;
  width: 10vmin;
}
.cstm404-sec .bubble:nth-child(2):before {
  width: 5vmin;
  height: 5vmin;
  bottom: -10vh;
  left: -8vmin;
}
.cstm404-sec .bubble:nth-child(3) {
  top: 12vh;
  right: 30vw;
  height: 13vmin;
  width: 13vmin;
}
.cstm404-sec .bubble:nth-child(3):before {
  width: 3vmin;
  height: 3vmin;
  bottom: -15vh;
  left: -18vmin;
  z-index: 6;
}
.cstm404-sec .bubble:nth-child(4) {
  top: 25vh;
  right: 18vw;
  height: 18vmin;
  width: 18vmin;
}
.cstm404-sec .bubble:nth-child(4):before {
  width: 7vmin;
  height: 7vmin;
  bottom: -10vmin;
  left: -15vmin;
}
.cstm404-sec .bubble:nth-child(5) {
  top: 60vh;
  right: 18vw;
  height: 28vmin;
  width: 28vmin;
}
.cstm404-sec .bubble:nth-child(5):before {
  width: 10vmin;
  height: 10vmin;
  bottom: 5vmin;
  left: -25vmin;
}

</style>
<body>
   <!-- 404 page starts here -->

<section class="cstm404-sec">
  <div class="cstm404-container">
  <div class="bubble"></div>
<div class="bubble"></div>
<div class="bubble"></div>
<div class="bubble"></div>
<div class="bubble"></div>
<div class="main">
  <h1>404</h1>
  <p>It looks like you're lost...<br/>That's a trouble?</p>
  <a href="{{url('/')}}" class="cstm-btn solid-btn">Go back</a>
</div>
</div>
</section>
    <!--   footer ends here -->

    <!-- Scripting starts here -->
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/0.1.12/wow.min.js"></script>
    <script src="js/animation.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <script>
        new WOW().init();
    </script>

</body>

</html>
