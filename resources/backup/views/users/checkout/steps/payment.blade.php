@extends('users.checkout.index1')
@section('checkoutContent')

 





          <?php  

  $total = round($package->price + 3) + 3;

  $per = $total / 100;

  $discountedPrice = (!empty($deal)) ? ($deal->deal_off_type == 0) ? $deal->amount * $per :  ($total -$deal->amount) : $total;
  $stripe = SripeAccount(); 
?>
<fieldset>
<div class="payment-table sidebar">
    <div class="row">
        <!-- <div class="col-lg-6">
        	<div class="payment-card-detail">
<label>Your Order</label>

<table class="table">
    <tr>
        <th>Package Price</th><td>${{$package->price}}</td>
    </tr>
  @if(!empty($deal))
    <tr>
        <th>Deal Discount</th><td>{{($deal->deal_off_type == 0) ? $deal->amount.'%' : '$'.$deal->amount }}</td>
    </tr>
  @endif


    <tr>
        <th>Tax</th><td>$3.00</td>
    </tr>

    <tr>
        <th>Service Fee</th><td>$3.00</td>
    </tr>

   <tr>
        <th>Total</th><td>${{$discountedPrice}}</td>
   </tr>    

</table>
</div>
</div> -->




 <div class="col-lg-12">
  <div class="payment-card-detail">
    <!-- <form>
     <label>Do You have any Coupon Code ?</label>
     <div class="flex-field-grp">
  
         <input type="text" name="couponcode" class="form-control"/>
   
     <div class=" btn-wrap">
     <button class="cstm-btn solid-btn">Apply</button>
 </div>
     </div>

 </form> -->


 <!-- <div class="form-group">
  <label>Preferred contact method:</label>
  <div class="custom-control custom-radio">
   <input type="radio" value="stripe" id="stripeRadio" name="paymentby" class="custom-control-input" checked>
   <label class="custom-control-label" for="stripeRadio">Stripe</label>
  </div>
  <div class="custom-control custom-radio">
   <input type="radio" value="paypal" id="paypalRadio" name="paymentby" class="custom-control-input" >
   <label class="custom-control-label" for="paypalRadio">Paypal </label>
  </div>
  </div> -->

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
    @include('users.checkout.parts.paypal')
  </div>
</div>
</div>


</div>
 </div>


 <div class="col-md-12">
  <div class="multistep-footer mt-4">
  <div class="row">
    <div class="col-md-4">
  <figure class="card-accepted">
     <img src="{{ asset('/frontend/images/payment-cards.png') }}">
  </figure>
</div>
 <div class="col-md-8">
           <div class="btn-wrap text-right"> 
            <a href="{{ !empty($backStepUrl) ? $backStepUrl : 'javascript:void(0)' }}" class="cstm-btn solid-btn previous_button">Back</a> 
          </div>
</div>
        </div>
      </div>
    </div>

<!-- <div class="col-lg-6 offset-lg-3">
	<div class="payment-card-detail">
		
	</div>


</div> -->
</div>
</div>
</fieldset>
@endsection