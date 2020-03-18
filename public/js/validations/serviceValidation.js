$(document).ready(function(){
   // Service Form
	$('#assignCategory').validate({
    onfocusout: function (valueToBeTested) {
      $(valueToBeTested).valid();
    },
  
    highlight: function(element) {
      $('element').removeClass("error");
    },
  
    rules: {
      "services[]": { 
          chrequired: true,
      },
      valueToBeTested: {
          required: true,
      }
    },
    });   
  
    // Service Submitting Form 
    $('#assignCategoryBtn').click(function()
    {
      if($('#assignCategory').valid())
      {
        $('#assignCategoryBtn').prop('disabled', true);
        $('#assignCategory').submit();
      } else {
        return false;
      }
    });
    
});
