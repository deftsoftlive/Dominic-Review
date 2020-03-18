@extends('layouts.vendor')
@section('vendorContents')
<div class="container-fluid">
    <div class="row">
       <div class="col-lg-6 offset-lg-3">
          <div class="card vendor-dash-card">
       <div class="card-header"><h3>PAYMENT SETTINGS</h3></div>
           <div class="card-body">
@include('admin.error_message')
<div class="row">

<div class="col-md-12">

<form method="post" id="vendorPaymentSettingForm" enctype="multipart/form-data">
	@csrf

  <label>Choose Global Payment Type</label>
  <div class="cstm-grp-input">
  <div class="custom-control custom-radio mb-1">
    <input required type="radio" value="0" id="global" name="payment_type" {{ Auth::User()->payment_type ? Auth::User()->payment_type == '0' ? 'checked' : '' : 'checked'}} class="custom-control-input"/>
    <label class="custom-control-label" for="global">Global Payment Settings</label>
  </div>

  <div class="custom-control custom-radio mb-1">
    <input required type="radio" value="1" id="business" name="payment_type" {{ Auth::User()->payment_type == '1' ? 'checked' : '' }} class="custom-control-input"/>
    <label class="custom-control-label" for="business">Business Wise</label>
  </div>
</div>


<div id="sel_global" style="display: {{ Auth::User()->payment_type ? Auth::User()->payment_type == '0' ? 'block' : 'none' : 'block'}}">
       <label>Choose Global Payment Type</label>
       <div class="cstm-grp-input">
        <div class="custom-control custom-radio mb-1">
          <input required type="radio" value="0" id="paypal" name="payment_status" {{ Auth::User()->payment_status == '0' ? 'checked' : '' }} class="custom-control-input"/>
          <label class="custom-control-label" for="paypal">Paypal</label>
        </div>

       

      <div class="custom-control custom-radio mb-1">
          <input required type="radio" value="1" id="stripe" name="payment_status" {{ Auth::User()->payment_status == '1' ? 'checked' : '' }} class="custom-control-input"/>
          <label class="custom-control-label" for="stripe">Stripe</label>
        </div>
        

        <div class="custom-control custom-radio mb-1">
          <input required type="radio" value="2" id="both" name="payment_status" {{ Auth::User()->payment_status ? Auth::User()->payment_status == '2' ? 'checked' : '' : 'checked'}} class="custom-control-input"/>
          <label class="custom-control-label" for="both">Both</label>
        </div>
        </div>

        <div class="selected-fields">
           <div class="form-group" id="paypal_email_div" style="display: {{ Auth::User()->payment_status ? Auth::User()->payment_status == '0' || Auth::User()->payment_status == '2' ? 'block' : 'none' : 'block' }}">
          <label for="paypal_account">Paypal Account</label>
          <input type="email" value="{{Auth::User()->paypal_account}}" name="paypal_account" class="form-control" id="paypal_account" placeholder="Enter paypal email">
        </div>

          <div class="form-group" id="stripe_email_div"  style="display: {{ Auth::User()->payment_status ?Auth::User()->payment_status == '1' || Auth::User()->payment_status == '2' ? 'block' : 'none' : 'block' }}">
            <label for="stripe_account">Stripe Account</label>

            <!-- <input type="text" value="{{Auth::User()->stripe_account}}" name="stripe_account" class="form-control" id="stripe_account" placeholder="Enter stripe email"> -->

            @include('vendors.settings.stripeLinkUrl')
          </div>
        </div>
  </div>


     <div class="btn-wrap">
      <button id="vendorPaymentSettingFormBtn" class="cstm-btn">Update</button>
     </div>
</form>

</div>
</div>
</div>
</div>
</div>
</div>
</div>

@endsection

@section('scripts')
<script src="https://js.stripe.com/v2/"></script>
<script src="{{url('/js/validations/vendorPaymentSettingValidation.js')}}"></script>
<script src="{{url('/js/stripe/stripe.js')}}"></script>

<script type="text/javascript">
$('input[type=radio][name=payment_type]').change(function() {
  if (this.value == 0) {
      $('#sel_global').show();
  } else if (this.value == 1) {
      $('#sel_global').hide();
  }
});

$('input[type=radio][name=payment_status]').change(function() {
  if (this.value == 0) {
    $('#stripe_email_div').hide();
    $('#paypal_email_div').show();
  } else if (this.value == 1) {
    $('#paypal_email_div').hide();
    $('#stripe_email_div').show();
  } else {
    $('#paypal_email_div').show();
    $('#stripe_email_div').show();
  }
});
</script>
@endsection
