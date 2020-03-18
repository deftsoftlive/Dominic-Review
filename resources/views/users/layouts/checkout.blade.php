@extends('layouts.home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{url('/frontend/css/cart.css')}}">

<style type="text/css">
 body{
    background: #f7f7f7;
}
.multi_step_form {
    margin-bottom: 30px;
}
.sec-card {
    margin-top:-125px;
  }

.multi_step_form #msform #progressbar {
    margin-bottom: 0px;
    overflow: hidden;
}

.log-sign-banner {
    min-height: 383px;
    padding: 151px 0px 70px;
    overflow-Y: auto;
    background-size: cover !important;
    background-position: center center !important;
}


.multistep-form-card {
    background: transparent;
}
.multistep-form-card fieldset{
padding: 0px;
margin-bottom: 15px;
}


.step-billing-heading h3{
  display: block;
    text-align: left;
    padding: 10px 15px;
    margin-left:0;
    margin-right:0;
    background: #eda108;
    border-bottom: 1px solid #ddd;
    margin-top:0px;
    
    color: #ffffff;
    margin-bottom: 0px;

}
.step-billing-heading  h3:after{
    display: none;
}

.step-billing-heading  h3 i {
    color: #ffffff;
    background: #eda208;

    font-size: 23px;
 /*   width: 35px;
    height: 35px;*/
    line-height: 31px;
    text-align: center;
}

fieldset.complete .card-heading h3 {
    background: #fff;
    color: #333;
}

.upcomming-step .card-heading h3 a{
    display: none;
}

.upcomming-step .checkout-billing-address {
    display: none;
}

.checkout-billing-address {
    margin-top: 0;
}


.upcomming-step .multistep-form-card fieldset{
    background: #ddd !important;
}

fieldset.complete {
    padding-bottom: 0px;
}

.upcomming-step fieldset.complete h3 {
    opacity: 0.5;
}
</style>

<section class="log-sign-banner" style="background:url('/frontend/images/banner-bg.png');">
    <div class="container">
        <div class="page-title text-center">
            <h1>Checkout</h1>
        </div>
    </div>    
</section> 

<section class="checkout-wrap">
        <div class="container lr-container">
           <div class="sec-card">
               <span class="aside-toggle">
                   <i class="fa fa-bars"></i>
                     <span class="cross-class">
                         <i class="fas fa-times" style="display: none;"></i>
                     </span>
               </span>
               @if(!empty($stepNumber))
                <?= stepbarCheck($stepNumber, $haveDeal) ?>
                @endif
           
 <div class="multistep-form-card"> 
          <div class="row"> 
                    
            <div class="col-lg-8">           
                           
                @include('vendors.errors')
               
                @yield('checkoutContent')
           </div>

              <div class="col-lg-4">
                   @include('users.includes.cart.sidebar')
           
               </div>
      </div>
      
       
          
         
          
</div>
</div>
</div>
</section>
<input type="hidden" name="cartRoute" value="{{url(route('checkout.getOrderSummary'))}}">
@endsection

@section('scripts')
<script type="text/javascript" src="{{url('/js/cartpage.js')}}"></script>
 <script src="https://www.sandbox.paypal.com/sdk/js?client-id=ATM1-l4SIZt42mV4cWma2TQKjMXFFUF94dWEy-aaCjnqrqseiUYHlnrzF4-QDZlXq1TU4cLrToOlPBuS"> 
  </script>
<script src="{{ asset('/js/checkout/paypal.js') }}"></script>
 

@endsection
