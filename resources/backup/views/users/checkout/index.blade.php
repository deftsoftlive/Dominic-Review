@extends('layouts.home')
@section('content')


<style type="text/css">
    .banner-content {
    padding: 10px;
    margin-top: 153px;
    display: inline-block;
    width: 100%;
    text-align: center;
    z-index: 1;
    position: relative;
}

.main-banner {
    height: 461px;
    display: block;
    background-size: cover;
    background-position: center center;
    position: relative;
    overflow: hidden;
}
</style>

<section class="log-sign-banner" style="background:url('/frontend/images/banner-bg.png');">
    <div class="container">
        <div class="page-title text-center">
            <h1>Checkout</h1>
        </div>
    </div>    
</section> 
    
    <section class="checklist-wrap">
        <div class="container lr-container">
            <div class="sec-card outer-wrap">
               <span class="aside-toggle">
                                <i class="fa fa-bars"></i>
                                <span class="cross-class">
                                    <i class="fas fa-times" style="display: none;"></i>
                                </span>
                            </span>
                <div class="row">

                    
                    <div class="col-lg-9">
                        <div class="inner-content">
                            <p>Checkout</p>
                           <hr>


                       <!-- Multi step form --> 
<section class="multi_step_form">  
  <form id="msform"> 
    <!-- Tittle -->
    <div class="tittle">
      <h2>Verification Process</h2>
      <p>In order to use this service, you have to complete this verification process</p>
    </div>
    <!-- progressbar -->
    <ul id="progressbar">
      <li class="active">Event Detail</li>  
      <li>Deal Review</li> 
      <li>Package</li>
       <li>Billing</li>
       <li>Payment</li>
    </ul>
    <!-- fieldsets -->
    <div class="multistep-form-card">
    <fieldset>
      <div class="card-heading">
			<h3>Event Title</h3>					
		</div>
          <div class="multistep-body">
          	<div class="event-detail-card">
          		<h3>John's Birthday Party</h3>
          		 <p class="ser-text"> <span><i class="fas fa-calendar-alt"></i> </span> 10-12-2019 </p>
          		 <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>

          		 <ul class="button-grp-wrap text-center">
                    <li><a href="javascrtpt:void(0);" data-toggle="tooltip" title="Create Event" class="icon-btn" data-original-title="Get Deal"><i class="fas fa-plus"></i></a></li>                   
                </ul>
          	</div>
           </div>
      <div class="multistep-footer"> 
      <button type="button" class="action-button previous_button">Back</button>
      <button type="button" class="next action-button">Continue</button> 

    </div>
    </fieldset>

    <fieldset>
    	<div class="card-heading">
			<h3>Deal</h3>					
		</div>
      <div class="multistep-body">
          	<div class="deal-review-card">

          		<div class="deals-card mini-deal-card">
				    <figure class="deal-img">
				      <img src="http://49.249.236.30:8654/images/vendors/deals/1575974893kxtKknJAD099cgwqhMzZapproved.jpg">
				      <figcaption class="discount-per"><span class="blink-text">
				                 50% 
				                <small> OFF</small></span> </figcaption>      
				    </figure>
				     <div class="detal-card-details">
				      <div class="dealls-dis-head">
				        <a href="http://49.249.236.30:8654/listing/photography/prateek-dua-photography#deals-sec"> <h4>50 Percent Off</h4></a>

				<p class="ser-text"> <span><i class="fas fa-calendar-alt"></i></span>
				                        <span class="deal-starting-date">Stating:<strong> 10-12-2019</strong></span> <span class="deal-starting-date">Ending:<strong> 31-12-2019</strong></span>
				           <!-- Expires on 2019-12-31 00:00:00 -->
				                </p>

				              </div>
				      <p class="deal-discription">
				                           50% OFF on my Packages. 
				        </p>
				     </div>

				  </div>
          		  

          		 <ul class="button-grp-wrap text-center">
                    <li><a href="javascrtpt:void(0);" data-toggle="tooltip" title="Create Event" class="icon-btn" data-original-title="Get Deal"><i class="fas fa-plus"></i></a></li>                   
                </ul>
          	</div>
           </div>
      <button type="button" class="action-button previous previous_button">Back</button>
      <button type="button" class="next action-button">Continue</button>  
    </fieldset>  
    <fieldset>
      <h3>Create Security Questions</h3>
      <h6>Please update your account with security questions</h6> 
      <div class="form-group"> 
        <select class="product_select">
          <option data-display="1. Choose A Question">1. Choose A Question</option> 
          <option>2. Choose A Question</option>
          <option>3. Choose A Question</option> 
        </select>
      </div> 
      <div class="form-group fg_2"> 
        <input type="text" class="form-control" placeholder="Anwser here:">
      </div> 
      <div class="form-group"> 
        <select class="product_select">
          <option data-display="1. Choose A Question">1. Choose A Question</option> 
          <option>2. Choose A Question</option>
          <option>3. Choose A Question</option> 
        </select>
      </div> 
      <div class="form-group fg_3"> 
        <input type="text" class="form-control" placeholder="Anwser here:">
      </div> 
      <div class="multistep-footer"> 
      <button type="button" class="action-button previous previous_button">Back</button> 
      <a href="#" class="action-button">Finish</a> 
     </div>
    </fieldset> 
    </div> 
  </form>  
</section> 
<!-- End Multi step form -->   


                        </div>
                        



                                    @if($error == 0)

                                      <div class="alert alert-warning alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>OOPS!</strong> {!!$error!!} </div>

                                    @endif
 


                                    @include('users.checkout.dealInfo')
                                    @include('users.checkout.packageInfo')
                          

                    </div>

                     <div class="col-lg-3 range eventside-bar">
      
                           @include('users.checkout.sidebar')
                           
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <!-- banner section starts Ends here -->

@endsection


@section('scripts')
 <script src="https://www.sandbox.paypal.com/sdk/js?client-id=AZD4IUxUgJ7dy4zCpAsbKcU6Jc7dQYZrblQwCslBki7-gCs54oJDEaakYz5rhl0W89Gbi-d96xosLNHL"> 
  </script>
<script src="{{ asset('/js/checkout/paypal.js') }}"></script>
<script src="{{ asset('/js/checkout/coupon.js') }}"></script>
<script type="text/javascript">

(function($) {
    "use strict";  
    
    //* Form js
    function verificationForm(){
        //jQuery time
        var current_fs, next_fs, previous_fs; //fieldsets
        var left, opacity, scale; //fieldset properties which we will animate
        var animating; //flag to prevent quick multi-click glitches

        $(".next").click(function () {
            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            //activate next step on progressbar using the index of next_fs
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function (now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale current_fs down to 80%
                    scale = 1 - (1 - now) * 0.2;
                    //2. bring next_fs from the right(50%)
                    left = (now * 50) + "%";
                    //3. increase opacity of next_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({
                        'transform': 'scale(' + scale + ')',
                        'position': 'absolute'
                    });
                    next_fs.css({
                        'left': left,
                        'opacity': opacity
                    });
                },
                duration: 800,
                complete: function () {
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        });

        $(".previous").click(function () {
            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //de-activate current step on progressbar
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function (now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale previous_fs from 80% to 100%
                    scale = 0.8 + (1 - now) * 0.2;
                    //2. take current_fs to the right(50%) - from 0%
                    left = ((1 - now) * 50) + "%";
                    //3. increase opacity of previous_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({
                        'left': left
                    });
                    previous_fs.css({
                        'transform': 'scale(' + scale + ')',
                        'opacity': opacity
                    });
                },
                duration: 800,
                complete: function () {
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        });

        $(".submit").click(function () {
            return false;
        })
    }; 
    
    //* Add Phone no select
    // function phoneNoselect(){
    //     if ( $('#msform').length ){   
    //         $("#phone").intlTelInput(); 
    //         $("#phone").intlTelInput("setNumber", "+880"); 
    //     };
    // }; 
    //* Select js
    function nice_Select(){
        if ( $('.product_select').length ){ 
            $('select').niceSelect();
        };
    }; 
    /*Function Calls*/  
    verificationForm ();
    // phoneNoselect ();
    nice_Select ();
})(jQuery); 


</script>

@endsection
