$(document).ready(function(){
   // Season Form
	$('#assignCategory').validate({
    onfocusout: function (valueToBeTested) {
      $(valueToBeTested).valid();
    },
  
    highlight: function(element) {
      $('element').removeClass("error");
    },
  
    rules: {
      "seasons[]": { 
          chrequired: true,
      },
      valueToBeTested: {
          required: true,
      }
    },
    });   
  
    // Season Submitting Form 
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
