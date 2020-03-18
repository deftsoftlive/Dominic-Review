@extends('users.layouts.checkout')
@section('checkoutContent')





@include('users.checkout.completedSteps.billing')


<fieldset>
      <div class="card-heading step-billing-heading">
      <h3><i class="fa fa-cart-plus" aria-hidden="true"></i> Order Summary</h3>     

      <div id="messages"></div>
    </div>
                     
   <div class="checkout-billing-address" id="checkout-order-summary">
       
 
                  <div class="cart-items-wrap" style="display: none;">
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
                                 <h3>Addons</h3>
                              </div>
                           </div>
                        </div>
                        
                     </div>
                  </div>
                  <!-- start Heading -->
                  <div class="cart-items-wrap" id="CartItems">
                             
                  </div>


                  <div class="col-md-12 text-right mb-4"><a href="{{$obj->nextStepRoute('checkout.paymentPage')}}" class="cstm-btn solid-btn pull-right">Continue</a></div>
      




   </div>
 </fieldset>


<div class="upcomming-step">
 @include('users.checkout.completedSteps.payment')
</div>

@include('users.includes.cart.addonsPop')


<input type="hidden" name="cartRoute" value="{{$obj->nextStepRoute('checkout.getOrderSummary')}}">

@endsection

@section('scripts')
<script type="text/javascript" src="{{url('/js/cartpage.js')}}"></script>
@endsection