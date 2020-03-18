@extends('layouts.home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{url('/frontend/css/cart.css')}}">

<section class="log-sign-banner aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000" "="" style="background:url(http://49.249.236.30:8654/uploads/1574318396.png);">
    <div class="container">
            <div class="page-title text-center">
                     <h1>Wishlist</h1>
                </div>
            </div>    
        </section>


<section class="cart-sec wishlist-sec">
   <div class="container lr-container">
     <div class="sec-card">
        <div class="cart-card">
           <div class="card-heading">
                <h3>My Wishlist</h3>
                     <div class="messageNotofications"></div>
            </div>

                       <div class="responsive-table">
                <table class="table cart-table">
                    <thead>
                        <tr>
                            <th width="20%">Event</th>
                            <th width="20%">Packages</th>
                            <th width="20%">Deals & Discount</th>
                            <th>Basic Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="wishlistItems">
                        
                            
                    </tbody>
                </table>
                <table class="cart-table bottom">

                        <tbody>
                          <tr>
                            <td></td>
                                           
  
                        </tr>

                    </tbody>
                </table>
        </div>
        
        </div>
    </div>
  </div>
</section>








 

<input type="hidden" name="wishlistRoute" value="{{url(route('cart.getWishlistItems'))}}">

@endsection
@section('scripts')

  <script type="text/javascript" src="{{url('/js/wishlistpage.js')}}"></script>

@endsection