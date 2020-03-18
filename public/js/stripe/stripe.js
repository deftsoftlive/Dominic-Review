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