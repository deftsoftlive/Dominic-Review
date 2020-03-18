$(document).ready(function(){

	$('#categoryForm').validate({
	onfocusout: function (valueToBeTested) {
	  $(valueToBeTested).valid();
	},

	highlight: function(element) {
	  $('element').removeClass("error");
	},

	rules: {
	  "name": {
	  	  required: true,
	      maxlength: 20, 
		},

	  valueToBeTested: {
	      required: true,
	  }
	},
	});   

  //Submitting Form 
  $('#categorySubmitButton').click(function()
  {
    if($('#categoryForm').valid())
    {
      $('#categorySubmitButton').prop('disabled', true);
      $('#categoryForm').submit();
    }else{
      return false;
    }
	});
	
});
