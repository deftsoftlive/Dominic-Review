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
      "category[]": { 
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
        window.scrollTo({top: 0, behavior: 'smooth'});
        return false;
      }
    });
    
});
