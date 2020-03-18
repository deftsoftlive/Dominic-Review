@extends('users.layouts.checkout')
@section('checkoutContent')

<?php  
 $stripe = SripeAccount(); 
?>


@include('users.checkout.completedSteps.billing')

@include('users.checkout.completedSteps.orderSummary')



<fieldset>
      <div class="card-heading step-billing-heading">
         <h3><i class="fas fa-money-check-alt"></i> Payment Method </h3>     
         <div id="messages"></div>
      </div>

   

    <div class="checkout-billing-address p-4">

      <div class="alert alert-info closer-step mb-3" role="alert">
        <i class="fa fa-info-circle"></i> One Step closer to your event
      </div>

      <div class="payment-table sidebar">
           <div class="row">
            <div class="col-lg-12">
                <div class="payment-card-detail">
                  

                        <ul class="nav nav-tabs" id="Payment-tab" role="tablist">
                          <li class="nav-item">
                              <a class="nav-link active show" id="allevent-tab" data-toggle="tab" href="#allevent" role="tab" aria-controls="allevent" aria-selected="true">Payment By Stripe</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" id="upcoming-tab" data-toggle="tab" href="#upcoming" role="tab" aria-controls="upcoming" aria-selected="false">Payment By Paypal</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="PaymentTabContent">
                          <div class="tab-pane fade active show" id="allevent" role="tabpanel" aria-labelledby="allevent-tab">
                             <div id="paymentStripe" class="payment-type">
                               @include('users.checkout.parts.stripe')
                             </div>
                          </div>
                          <div class="tab-pane fade" id="upcoming" role="tabpanel" aria-labelledby="upcoming-tab">
                            <div id="paymentPaypal" class="payment-type">
                            
                            </div>
                          </div>
                        </div>
               </div>
          </div>
    </div>
</div>


 
    </div>
  
 </fieldset>




<input type="hidden" name="cartRoute" value="{{$obj->nextStepRoute('checkout.getOrderSummary')}}">
 
@endsection

@section('scripts')
<script type="text/javascript" src="{{url('/js/cartpage.js')}}"></script>
 
@endsection