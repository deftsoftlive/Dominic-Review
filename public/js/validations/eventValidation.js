$(document).ready(function(){
   // Event Form
	$('#assignCategory').validate({
    onfocusout: function (valueToBeTested) {
      $(valueToBeTested).valid();
    },
  
    highlight: function(element) {
      $('element').removeClass("error");
    },
  
    rules: {
      "event_type[]": { 
          chrequired: true,
      },
      valueToBeTested: {
          required: true,
      }
    },
    });   
  
    // Event Submitting Form 
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
