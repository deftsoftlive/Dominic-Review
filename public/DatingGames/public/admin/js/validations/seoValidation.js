$(document).ready(function(){
  

	//Adding-Validations-On-Sign-Up-Form
	$('#metaForm').validate({
	onfocusout: function (valueToBeTested) {
	  $(valueToBeTested).valid();
	},

	highlight: function(element) {
	  $('element').removeClass("error");
	},

	rules: {
	  "metatitle": {
	  	  required: true,
	  	  maxlength: 100,
		},
		'metakeywords': {
			required: true,
			maxlength: 100,
		},
		'metadescription': {
			required: true,
			maxlength: 300,
	},

	  valueToBeTested: {
	      required: true,
	  }
	},
	});   

  //Submitting Form 
  $('#metaSubmitButton').click(function()
  {
    if($('#metaForm').valid())
    {
      $('#metaSubmitButton').prop('disabled', true);
      $('#metaForm').submit();
    }else{
      return false;
    }
  });

});
