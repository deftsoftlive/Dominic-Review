@extends('layouts.home')
@section('content')
<section class="log-sign-banner" style="background:url('/frontend/images/banner-bg.png');">
   <div class="container">
      <div class="page-title text-center">
         <h1>Thank You</h1>
      </div>
   </div>
</section>
<section class="checklist-wrap thankyou-sec">
   <div class="container">
      <div class="sec-card">
         <div class="thankyou-card">
            <div class="success-message text-center">
               <figure class="apporved-icon">
                  <img src="/frontend/images/thank-you.jpg">                      
               </figure>
               <!--                     <h4 class="success-message__title">Thank You</h4> -->
               <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
            </div>
         </div>
         <div class="row">
            <!-- start Heading -->
            <div class="col-lg-8">
               <div class="cart-items-wrap">
                  <div class="row no-gutters">
                     <div class="col-lg-3">
                        <div class="cart-col-wrap">
                           <div class="cart-table-head">
                              <h3>Event Image</h3>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-9">
                        <div class="cart-col-wrap">
                           <div class="cart-table-head">
                              <h3>Details</h3>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- start Heading -->
               <div class="cart-items-wrap" id="CartItems">
                  @php $CartItems = $order->orderItems; @endphp
                  @include('users.includes.cart.thankyou_detail')
               </div>
            </div>
            <div class="col-lg-4">
               <div class="total-price-wrap">
                  <div id="cartTotals">
                    @include('users.includes.cart.thankyou_sidebar')
                  </div>
               </div>
            </div>
         </div>
         <div class="w-100 mt-4">
         <div class="responsive-table">
            <table class="table table-striped order-list-table">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Order Id</th>
                     <th>Payment Type</th>
                     <th>Price</th>
                  </tr>
               <tbody>
                  <tr>
                     <td>1</td>
                     <td>{{ $order->orderID }}</td>
                     <td>{{ $order->payment_by }}</td>
                     <td>${{ $order->amount }}</td>
                  </tr>
               </tbody>
               </thead>
            </table>
         </div>
       </div>
         <div class="order-summary-wrap">
            <div class="row">
               <div class="col-lg-12">
                  <div class="order-sum-card">
                     <div class="billing-addres-detail">
                        <h3 class="rec-heading">Billing Address</h3>
                        <div class="billing-address-line">
                           <p>
                              <span>
                              <i class="fas fa-user"></i>
                              </span>
                              {{ json_decode($order->billing_address)->name }}
                           </p>
                           <p> 
                              <span> 
                              <i class="fas fa-map-marker-alt"></i> 
                              </span> 
                              {{ json_decode($order->billing_address)->address }}, {{ json_decode($order->billing_address)->city }}, {{ json_decode($order->billing_address)->state }} {{ json_decode($order->billing_address)->country }} {{ json_decode($order->billing_address)->zipcode }}
                           </p>
                           <p> 
                              <span> <i class="fas fa-envelope"></i> </span>
                              {{ json_decode($order->billing_address)->email }}
                           </p>
                           <p>
                              <span><i class="fas fa-phone-alt"></i></span> {{ json_decode($order->billing_address)->phone_number }}
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
            <div class="button-wrap mt-4 text-center">
              <a href="{{url('/')}}" class="cstm-btn solid-btn">Back to Home</a>
            </div>
      </div>
   </div>

   </div>
   </div>
</section>
@endsection