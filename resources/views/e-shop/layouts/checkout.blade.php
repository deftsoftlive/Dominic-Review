  @extends('e-shop.layouts.layout')
@section('styleSheet')
<link rel="stylesheet" type="text/css" href="{{url('/e-shop/css/cart-style.css')}}">
@endsection
@section('content')




 <!-- banner section starts here here -->
    <section class="inner-main-banner" style="background-image:url({{url('/e-shop/images/product-listing-banner-bg.png')}});">
        <div class="container">
            <div class="inner-banner-content text-center">
                <h1>Checkout</h1>
            </div>
        </div>
    </section>
   <!--Shopping cart sec starts here -->
      <section class="checkout-step-sec">
          <div class="container">
            <div class="multi_step_form">  
                  <div id="msform">                   
                    <!-- progressbar -->
                    <ul id="progressbar">
                      <li class="{{$number >= 1 ? 'active' : ''}}">Shipping Address</li>  
                      <li class="{{$number >= 2 ? 'active' : ''}}">Cart Review</li> 
                      <li class="{{$number >= 3 ? 'active' : ''}}">Billing Address</li>
                      <li class="{{$number >= 4 ? 'active' : ''}}">Payment</li>
                    </ul>
           
                   
                   
              @yield('checkContent')

                            
                        
                  
                </div>
             </div>              
          </div>
      </section>
    <!--Shopping cart sec ends here -->






@endsection
