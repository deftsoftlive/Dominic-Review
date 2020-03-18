$(document).ready(function(){
  
	//Adding-Validations-On-Sign-Up-Form
	$('#faqForm').validate({
		ignore: [],
	onfocusout: function (valueToBeTested) {
	  $(valueToBeTested).valid();
	},

	highlight: function(element) {
	  $('element').removeClass("error");
	},

	errorPlacement: function(error, element) 
	{	
		if (element.attr("name") == "description") 
		{
			error.insertAfter("#cke_description");
		} else {
			 error.insertAfter(element);
		}
	}, 

	rules: {
		"title": {
			required: true,
			maxlength: 80, 
		},
		'description': {
				required: true,
				required: function(textarea) {
					CKEDITOR.instances[textarea.id].updateElement();
					var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');
					return editorcontent.length === 0;
				}
		},

	  valueToBeTested: {
	      required: true,
	  }
	},
	});   

  //Submitting Form 
  $('#faqSubmitButton').click(function()
  {
    if($('#faqForm').valid())
    {
      $('#faqSubmitButton').prop('disabled', true);
      $('#faqForm').submit();
    }else{
      return false;
    }
  });

});
