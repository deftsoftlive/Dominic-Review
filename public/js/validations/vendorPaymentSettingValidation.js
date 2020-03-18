$(document).ready(function() {
     // vendorPaymentSetting Form
  $('#vendorPaymentSettingForm').validate({
    onfocusout: function (valueToBeTested) {
      $(valueToBeTested).valid();
    },
  
    highlight: function(element) {
      $('element').removeClass("error");
    },
  
    rules: {
      "paypal_account": {
        required: true,
        email: true
      },
      "stripe_account": {
        required: true,
      },
      valueToBeTested: {
          required: true,
      }
    },
    });   
  
    // vendorPaymentSetting Submitting Form 
    $('#vendorPaymentSettingFormBtn').click(function() {
      if($('#vendorPaymentSettingForm').valid())
      {
        $('#vendorPaymentSettingFormBtn').prop('disabled', true);
        $('#vendorPaymentSettingForm').submit();
      } else {
        return false;
      }
    });
    
});
