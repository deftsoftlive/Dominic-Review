$(document).ready(function(){
   // Amenity Form
	$('#assignCategory').validate({
    onfocusout: function (valueToBeTested) {
      $(valueToBeTested).valid();
    },
  
    highlight: function(element) {
      $('element').removeClass("error");
    },
  
    rules: {
      "amenity[]": { 
          chrequired: true,
      },
      valueToBeTested: {
          required: true,
      }
    },
    });   
  
    // Amenity Submitting Form 
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
