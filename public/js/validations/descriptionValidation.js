$(document).ready(function(){
   // description Form
  $('#descriptionForm').validate({
     ignore: [],
    onfocusout: function (valueToBeTested) {
      $(valueToBeTested).valid();
    },
  
    highlight: function(element) {
      $('element').removeClass("error");
    },

    errorPlacement: function(error, element) {
      if (element.attr("name") == "description") {
        error.insertAfter("#cke_description");
      } else {
         error.insertAfter(element);
      }
    },
  
    rules: {
      "description": {
        ckrequired: true,
      },
      valueToBeTested: {
          required: true,
      }
    },
    });   
  
    // description Form Submitting 
    $('#descriptionFormBtn').click(function() {
      if($('#descriptionForm').valid()) {
        $('#descriptionFormBtn').prop('disabled', true);
        $('#descriptionForm').submit();
      } else {
        return false;
      }
    });
    
});
