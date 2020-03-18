@extends('layouts.vendor')
@section('vendorContents')
<div class="container-fluid">
    <div class="row">
       <div class="col-lg-12">
         <div class="card vendor-dash-card">
           <div class="card-header"><h3>STRIPE SETTINGS</h3></div>
           <div class="card-body">
                   @include('admin.error_message')
                      <div class="row">

                           <div class="col-md-12">
                                  @include('vendors.settings.stripeLinkUrl')
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
<script src="{{url('/js/stripe/stripeValidation.js')}}"></script>

<script type="text/javascript">
 

$(function() {

  var $form = $('#user_payment');
  $form.submit(function(event) {

    $form.find('#update_payment').prop('disabled', true);

    // Request a token from Stripe:
    Stripe.createToken({
        number: $('#card_number').val(),
        cvc: $('#cvv_code').val(),
        exp_month: $('#month').val(),
        exp_year: $('#year').val()
    }, stripeResponseHandler);

    return false;
  });

});


  function stripeResponseHandler(status, response) {
  
  var $form = $('#user_payment'); // Grab the form:

  if (response.error) { // Problem!

    // Show the errors on the form:
    
    // $('#update_payment').text('<%= t :submit %>');

    alert(response.error.message);

    // $form.find('.payment-errors').text(response.error.message);
    $form.find('#update_payment').prop('disabled', false); // Re-enable submission

  } else { // Token was created!

    // Get the token ID:
    var token = response.id;

    // Insert the token ID into the form so it gets submitted to the server:
    $form.append($('<input type="hidden" name="stripeToken">').val(token));

    // Submit the form:
     $form.get(0).submit();
  }
};

</script>

@endsection



