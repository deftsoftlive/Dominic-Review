@extends('e-shop.layouts.layout')
@section('styleSheet')
<link rel="stylesheet" type="text/css" href="{{URL::asset('/e-shop/css/cart-style.css')}}">
@endsection
@section('content')

@php $base_url = \URL::to('/'); @endphp

 <!-- banner section starts here here -->
    <section class="football-course-sec checkout_banner_none" style="background: url({{$base_url}}/public/uploads/{{ getAllValueWithMeta('checkout_banner', 'banners') }});">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="football-course-content">
              <h2 class="f-course-heading">Checkout</h2>
            </div>
          </div>
        </div>
      </div>
    </section>
   <!--Shopping cart sec starts here -->
      <section class="checkout-step-sec check_out_none">
          <div class="container">
            <div class="multi_step_form">  
                  <div id="msform">                   
                    <!-- progressbar -->
                    <ul id="progressbar">
                     <!--  <li class="{{$number >= 1 ? 'active' : ''}}">Shipping Address</li>  
                      <li class="{{$number >= 2 ? 'active' : ''}}">Cart Review</li> 
                      <li class="{{$number >= 3 ? 'active' : ''}}">Billing Address</li>
                      <li class="{{$number >= 4 ? 'active' : ''}}">Payment</li> -->

                      <li class="{{$number >= 1 ? 'active' : ''}}">Cart Review</li>  
                      <li class="{{$number >= 2 ? 'active' : ''}}">Participant Info</li> 
                      <li class="{{$number >= 3 ? 'active' : ''}}">Shipping/Billing</li>
                      <li class="{{$number >= 4 ? 'active' : ''}}">Payment</li>
                    </ul>
           
                   
                   
              @yield('checkContent')

                            
                        
                  
                </div>
             </div>              
          </div>
      </section>
    <!--Shopping cart sec ends here -->






@endsection
