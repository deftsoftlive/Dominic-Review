$(document).ready(function(){
  
	//Adding-Validations-On-Sign-Up-Form
	$('#blogForm').validate({
		ignore: [],
	onfocusout: function (valueToBeTested) {
	  $(valueToBeTested).valid();
	},

	highlight: function(element) {
	  $('element').removeClass("error");
	},

	errorPlacement: function(error, element) 
	{	
		if (element.attr("name") == "content") 
		{
			error.insertAfter("#cke_content");
		} else {
			 error.insertAfter(element);
		}
	}, 

	rules: {
	  "category": {
	  	  required: true,
	      maxlength: 20, 
		}, 
		"title": {
			required: true,
			maxlength: 20, 
		},
		'content': {
				required: true,
				required: function(textarea) {
					CKEDITOR.instances[textarea.id].updateElement();
					var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');
					return editorcontent.length === 0;
				}
		},

	  "metatitle": {
	  	  required: true,
	  	  maxlength: 20,
		},
		'metakeywords': {
			required: true,
			maxlength: 20,
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
  $('#blogSubmitButton').click(function()
  {
    if($('#blogForm').valid())
    {
      $('#blogSubmitButton').prop('disabled', true);
      $('#blogForm').submit();
    }else{
      return false;
    }
  });



	$('#blogCatsForm').validate({
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
  $('#blogCatsSubmitButton').click(function()
  {
    if($('#blogCatsForm').valid())
    {
      $('#blogCatsSubmitButton').prop('disabled', true);
      $('#blogCatsForm').submit();
    }else{
      return false;
    }
  });



});
