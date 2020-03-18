$(document).ready(function(){
   // package Form
  $('#packageForm').validate({
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
      "title": {
        required: true,
        alphanumeric: true,
        maxlength: 30
      },
      "description": {
        ckrequired: true,
      },
      "min_person": {
        required: true,
        digits: true,
        min: 1,
        minlength: 1,
        maxlength: 4
      },
      "max_person": {
        required: true,
        digits: true,
        min: 1,
        minPerson: true,
        minlength: 1,
        maxlength: 10
      },
      "price": {
        required: true,
        amount: true,
        min: 1,
        minlength: 1,
        maxlength: 5
      },
      "no_of_hours": {
        required: true,
        min: 1,
        max: 24
      },
      "no_of_days": {
        required: true,
        min: 1,
        max: 366
      },
      valueToBeTested: {
          required: true,
      }
    },
    });   
  
    // package Form Submitting 
    $('#packageFormBtn').click(function() {
      if($('#packageForm').valid()) {
        $('#packageFormBtn').prop('disabled', true);
        $('#packageForm').submit();
      } else {
        window.scrollTo({top: 0, behavior: 'smooth'});
        return false;
      }
    });
    
});
