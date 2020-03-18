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
<form method="post" id="vendorPaymentSettingForm" action="{{ route('vendor_cat_pay_management', ['slug'=>$slug]) }}" enctype="multipart/form-data">
	@csrf
       <div class="cstm-grp-input">
        <div class="custom-control custom-radio mb-1">
          <input required type="radio" value="0" id="paypal" name="payment_status" {{ $ven_cat->payment_status == '0' ? 'checked' : '' }} class="custom-control-input"/>
          <label class="custom-control-label" for="paypal">Paypal</label>
        </div>

        

      <div class="custom-control custom-radio mb-1">
          <input required type="radio" value="1" id="stripe" name="payment_status" {{ $ven_cat->payment_status == '1' ? 'checked' : '' }} class="custom-control-input"/>
          <label class="custom-control-label" for="stripe">Stripe</label>
        </div>        

        <div class="custom-control custom-radio mb-1">
          <input required type="radio" value="2" id="both" name="payment_status" {{ $ven_cat->payment_status == '2' ? 'checked' : '' }} class="custom-control-input"/>
          <label class="custom-control-label" for="both">Both</label>
        </div>
      </div>


        <div class="selected-fields">
          <div class="form-group" id="paypal_email_div" style="display: {{ $ven_cat->payment_status == '0' || $ven_cat->payment_status == '2' ? 'block' : 'none' }}">
          <label for="paypal_email">Paypal Email</label>
          <input type="email" value="{{$ven_cat->paypal_email}}" name="paypal_email" class="form-control" id="paypal_email" placeholder="Enter paypal email">
        </div>

        <div class="form-group" id="stripe_email_div"  style="display: {{ $ven_cat->payment_status == '1' || $ven_cat->payment_status == '2' ? 'block' : 'none' }}">
          <label for="stripe_email">Stripe Account</label>
          <input type="text" value="{{$ven_cat->stripe_account}}" name="stripe_account" class="form-control" id="stripe_email" placeholder="Enter stripe email">
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
<script src="{{url('/js/validations/vendorPaymentSettingValidation.js')}}"></script>
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
