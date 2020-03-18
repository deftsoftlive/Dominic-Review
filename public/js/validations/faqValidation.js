$(document).ready(function(){
   // faq Form
  $('#faqForm').validate({
     ignore: [],
    onfocusout: function (valueToBeTested) {
      $(valueToBeTested).valid();
    },
  
    highlight: function(element) {
      $('element').removeClass("error");
    },

    errorPlacement: function(error, element) {
      if (element.attr("name") == "answer") {
        error.insertAfter("#cke_answer");
      } else {
         error.insertAfter(element);
      }
    },
  
    rules: {
      "question": { 
          required: true,
          maxlength: 150,
      },
      "answer": {
        ckrequired: true,
      },
      valueToBeTested: {
          required: true,
      }
    },
    });   
  
    // faq Form Submitting 
    $('#faqFormBtn').click(function() {
      if($('#faqForm').valid()) {
        $('#faqFormBtn').prop('disabled', true);
        $('#faqForm').submit();
      } else {
        return false;
      }
    });
    
});
