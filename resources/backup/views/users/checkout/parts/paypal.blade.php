
<input type="hidden" id="expressCheckoutUrl" value="{{ route('checkout.expressCheckout') }}">

<input type="hidden" id="pay_amount" value="{{ $obj->getPayableAmount($deal,$package) }}">
<input type="hidden" id="pay_url" value="{{ route('user_payToVendor') }}">
<input type="hidden" id="pay_email" value="{{ $package->business->vendors->email }}">
<input type="hidden" id="pay_vendor_id" value="{{ $package->business->vendors->id  }}">
<input type="hidden" id="pay_business_id" value="{{ $package->business->id }}">

@if(!empty($deal) && !empty($deal->id))
	<input type="hidden" id="pay_deal_id" value="{{ $deal->id }}">
@else
	<input type="hidden" id="pay_deal_id" value="0">
@endif

<input type="hidden" id="pay_event_id" value="0">
<input type="hidden" id="pay_category_id" value="{{ $package->business->category->id }}">
<input type="hidden" id="pay_balance_transaction" value="Payement by Paypal">
<input type="hidden" id="pay_success_url" value="{{ route('thank-you') }}">

<!-- <div id="paypal-button-container"></div> -->

<div>
	<button onclick="expressCheckout()" id="paypal_btn" type="button" class="cstm-btn solid-btn">Pay by Paypal</button>
</div>
