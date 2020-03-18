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
               <h3>My Wishlist</h3>
               <div class="messageNotofications"></div>
            </div>
            <!-- start Heading -->
            @if(Auth::check() && Auth::user()->role == 'user' && $CartItems->count() > 0)
            <div class="row">
               <div class="col-lg-12">
                  <div class="cart-items-wrap mobile-hide">
                     <div class="row no-gutters">
                        <div class="col-lg-2 col-md-3">
                           <div class="cart-col-wrap">
                              <div class="cart-table-head">
                                 <h3>Event Image</h3>
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
                                 <h3>Action</h3>
                              </div>
                           </div>
                        </div>
                        
                     </div>
                  </div>
                  <!-- start Heading -->
                  <div class="cart-items-wrap" id="wishlistItems">
                  </div>
               </div>
             
            </div>
            @else
                  <div class="alert alert-info closer-step mb-3" role="alert">
                     <i class="fa fa-info-circle"></i> Your Wishlist is Empty
                  </div>
            @endif 
         </div>
      </div>
   </div>
</section>

<input type="hidden" name="wishlistRoute" value="{{url(route('cart.getWishlistItems'))}}">

@endsection
@section('scripts')

  <script type="text/javascript" src="{{url('/js/wishlistpage.js')}}"></script>

@endsection