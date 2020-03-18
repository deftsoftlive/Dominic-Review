$(document).ready(function(){
   // prohibtion Form
  $('#prohibtionForm').validate({
     ignore: [],
    onfocusout: function (valueToBeTested) {
      $(valueToBeTested).valid();
    },
  
    highlight: function(element) {
      $('element').removeClass("error");
    },

    errorPlacement: function(error, element) {
      if (element.attr("name") == "prohibtion") {
        error.insertAfter("#cke_prohibtion");
      } else {
         error.insertAfter(element);
      }
    },
  
    rules: {
      "prohibtion": {
        ckrequired: true,
      },
      valueToBeTested: {
          required: true,
      }
    },
    });   
  
    // prohibtion Form Submitting 
    $('#prohibtionFormBtn').click(function() {
      if($('#prohibtionForm').valid()) {
        $('#prohibtionFormBtn').prop('disabled', true);
        $('#prohibtionForm').submit();
      } else {
        return false;
      }
    });
    
});
