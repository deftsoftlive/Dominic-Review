// Ck-Editor
  $.validator.addMethod('ckrequired', function (value, element, params) {
      var idname = jQuery(element).attr('id');
      var messageLength = jQuery.trim ( CKEDITOR.instances[idname].getData() );
      CKEDITOR.instances[idname].updateElement();    
      return !params || messageLength.length !== 0;
  }, "This field is required.");


$(document).ready(function(){
   // Add Department Form
  $('#venueForm').validate({
    ignore: [],
    onfocusout: function (valueToBeTested) {
      $(valueToBeTested).valid();
    },
    highlight: function(element) {
      $('element').removeClass("error");
    },

    errorPlacement: function(error, element) { 
        if (element.attr("name") == "description") 
        {
          error.insertAfter("#cke_description");
        } else if(element.attr("name") == "description_more") {
          error.insertAfter("#cke_description_more");
        } else {
           error.insertAfter(element);
        }
    },
  
    rules: {
      "title": { 
          required: true,
          // alphanumeric: true,
          maxlength: 60,
      },
      "description": {
          ckrequired: true,          
      },
      "description_more": {
          ckrequired: true,          
      },
      valueToBeTested: {
          required: true,
      }
    },
    });   
  
    // Add Department Submitting Form 
    $('#btnVanue').click(function()
    {
      if($('#venueForm').valid())
      {
        $('#btnVanue').prop('disabled', true);
        $('#venueForm').submit();
      } else {
        return false;
      }
    });
    
});

$(document).ready(function(){
   // Add Department Form
  $('#venueFormPaygo').validate({
    onfocusout: function (valueToBeTested) {
      $(valueToBeTested).valid();
    },
  
    highlight: function(element) {
      $('element').removeClass("error");
    },
  
    rules: {
      "title": { 
          required: true,
          // alphanumeric: true,
          maxlength: 60,
      },
      "description": {
          required: true,          
      },
    },
    });   
  
    // Add Department Submitting Form 
    $('#btnVanue').click(function()
    {
      if($('#venueFormPaygo').valid())
      {
        $('#btnVanue').prop('disabled', true);
        $('#venueFormPaygo').submit();
      } else {
        return false;
      }
    });
    
});
