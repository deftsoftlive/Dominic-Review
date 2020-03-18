$(document).ready(function(){
  
	$( 'textarea.body').each( function() {
		CKEDITOR.replace( $(this).attr('id') , {
		 extraPlugins: 'justify'
		});
}); 
	//Adding-Validations-On-Sign-Up-Form
	$('#pageForm').validate({
		ignore: [],
	onfocusout: function (valueToBeTested) {
	  $(valueToBeTested).valid();
	},

	highlight: function(element) {
	  $('element').removeClass("error");
	},

	errorPlacement: function(error, element) 
	{	
		if (element.attr("name") == "body") 
		{
			error.insertAfter("#cke_body");
		} else {
			 error.insertAfter(element);
		}
	}, 

	rules: {
	  "name": {
	  	  required: true,
	      maxlength: 30, 
	  },	  
	  "body": {
			required: function(textarea) {
				CKEDITOR.instances[textarea.id].updateElement();
				var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');
				return editorcontent.length === 0;
			}
	  },	  
	  "metatitle": {
	  	  required: true,
	  	  maxlength: 30,
		},
		'metakeywords': {
			required: true,
			maxlength: 30,
		},
		'metadescription': {
			required: true,
			maxlength: 100,
	},

	  valueToBeTested: {
	      required: true,
	  }
	},
	});   

  //Submitting Form 
  $('#pageSubmitButton').click(function()
  {
		if($('#pageForm').valid()) {
      $('#pageSubmitButton').prop('disabled', true);
      $('#pageForm').submit();
    } else { return false; }
  });

});
