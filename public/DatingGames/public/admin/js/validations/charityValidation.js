$(document).ready(function(){
  
	//Adding-Validations-On-Sign-Up-Form
	$('#charityForm').validate({
		ignore: [],
	onfocusout: function (valueToBeTested) {
	  $(valueToBeTested).valid();
	},

	highlight: function(element) {
	  $('element').removeClass("error");
	},

	errorPlacement: function(error, element) 
	{	
		if (element.attr("name") == "long_description") 
		{
			error.insertAfter("#cke_long_description");
		} else {
			 error.insertAfter(element);
		}
	}, 

	rules: {
		"name": {
			required: true,
      maxlength: 20, 
		},
		"email": {
			required: true,
      maxlength: 20, 
		},
		"password": {
			required: true,
			minlength: 8,
			maxlength: 20,
	},
	"confirm_password": {
		required: true,
		minlength: 8,
		maxlength: 20,
		equalTo: "#password",
},
	  "business_name": {
	  	  required: true,
	      maxlength: 20, 
		}, 
		"paypal_email": {
			required: true,
      maxlength: 20, 
		},
		"address": {
			required: true,
			maxlength: 20,
		},
		"business_name": {
			required: true,
			maxlength: 20,
		},
		"phone": {
			required: true,
			phoneUS: true,
		},
		"website": {
			required: true,
			isUrl: true,
		},
		"short_description": {
			required: true,
			maxlength: 20,
		},
		'long_description': {
				required: function(textarea) {
					CKEDITOR.instances[textarea.id].updateElement();
					var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');
					return editorcontent.length === 0;
				}
		},

	  "facebook": {
			isUrl: true,
		},
		'linkedin': {
			isUrl: true,
		},
		'instagram': {
			isUrl: true,
	},

	  valueToBeTested: {
	      required: true,
	  }
	},
	});  

  //Submitting Form 
  $('#charitySubmitButton').click(function()
  {
    if($('#charityForm').valid())
    {
      $('#charitySubmitButton').prop('disabled', true);
      $('#charityForm').submit();
    }else{
      return false;
    }
  });

});

var _validFileExtensions = [".jpg", ".jpeg", ".gif", ".png", "mp4" ,"3gp", "mov", "wmv", "avi"];

function checkFileUploadExt(fieldObj) {
  for (var i = 0; i < fieldObj.files.length; i++) {
     var file = fieldObj.files[i];
		 var FileName = file.name;
		 var blnValid = false;
		for (var j = 0; j < _validFileExtensions.length; j++) {
				var sCurExtension = _validFileExtensions[j];
				
				// var reader = new FileReader();
				// reader.onload = function (e) {
				// 	if(file.type.split('/')[0] == 'image') {
				// 		var elem = document.createElement("img");
				// 		elem.setAttribute("src", e.target.result);
				// 		elem.setAttribute("height", "100");
				// 		elem.setAttribute("width", "100");
				// 		elem.setAttribute("alt", "Flower");
				// 		document.getElementById("gallery").appendChild(elem);
				// 	} 
				// }
				// 	reader.readAsDataURL(file);

				if (FileName.substr(FileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
					blnValid = true;
					break;
				}
			}
			if (!blnValid) {
				alert("Sorry!! Allowed image extensions are .jpg, .jpeg, .gif, .png, mp4, 3gp, mov, wmv, avi");
				fieldObj.value = "";
				return false;
			}
  }
}

var _validImageExtensions = [".jpg", ".jpeg", ".gif", ".png"];

function ValidateImageLogo(oInput) {
   if (oInput.type == "file") {
     var sFileName = oInput.value;

     if (sFileName.length > 0) {
       var blnValid = false;
       for (var j = 0; j < _validImageExtensions.length; j++) 
       {
         var sCurExtension = _validImageExtensions[j];
         if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) 
         {
					 blnValid = true;
					 this.readLogoURL(oInput);
           break;
         }
       }

       if (!blnValid) {
         alert("Sorry!! Allowed image extensions are .jpg, .jpeg, .gif, .png");
				 oInput.value = "";
				 document.getElementById('logo_src').style.display = "none";
         return false;
       }
     }
   }
return true;
}

function readLogoURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
				$('#logo_src').attr('src', e.target.result);
				document.getElementById('logo_src').style.display = "block";
    }
    reader.readAsDataURL(input.files[0]);
  }
}

