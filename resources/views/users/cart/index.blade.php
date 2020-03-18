@extends('layouts.home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{url('/frontend/css/cart.css')}}">
<section class="log-sign-banner aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000" "="" style="background:url(http://49.249.236.30:8654/uploads/1574318396.png);">
   <div class="container">
      <div class="page-title text-center">
         <h1>Cart</h1>
      </div>
   </div>
</section>
<section class="cart-sec">
   <div class="container lr-container">
      <div class="sec-card">
   
         <div class="cart-card">
            <div class="card-heading">
               <h3>Shopping Cart</h3>
               <div class="messageNotofications"></div>
            </div>

            @if(Auth::check() && Auth::user()->role == 'user' && $CartItems->count() > 0)
            <div class="row">
            <!-- start Heading -->
               <div class="col-lg-8">
                  <div class="cart-items-wrap mobile-hide">
                     <div class="row no-gutters">
                        <div class="col-lg-2 col-md-3">
                           <div class="cart-col-wrap">
                              <div class="cart-table-head">
                                 <h3>Image</h3>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                           <div class="cart-col-wrap">
                              <div class="cart-table-head">
                                 <h3>Details</h3>
                              </div>
                           </div>
                        </div>
                         <div class="col-lg-3 col-md-3">
                           <div class="cart-col-wrap">
                              <div class="cart-table-head">
                                 <h3>Addons</h3>
                              </div>
                           </div>
                        </div>
                        
                     </div>
                  </div>
                  <!-- start Heading -->
                  <div class="cart-items-wrap" id="CartItems">
                  </div>
               </div>
               <div class="col-lg-4">
                   @include('users.includes.cart.sidebar')           
               </div>
            </div>
            @else
                  <div class="alert alert-info closer-step mb-3" role="alert">
                     <i class="fa fa-info-circle"></i> Your Cart is Empty
                  </div>
            @endif 
         </div>

      </div>
   </div>
</section>
@include('users.includes.cart.addonsPop')
<input type="hidden" name="cartRoute" value="{{url(route('cart.getCartItems'))}}">
@endsection
@section('scripts')
<script type="text/javascript" src="{{url('/js/cartpage.js')}}"></script>
@endsection