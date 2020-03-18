//Checking Image Extension while uploading profile image
var _validFileExtensions = [".jpg", ".jpeg", ".gif", ".png"];


function ValidateSingleInputs(oInput, img_id) {
  $(oInput).parent().find('label .error').css('display', 'none');

  //$("label[for='" + oInput.id + "'].error").css('display', 'none');

   if (oInput.type == "file") {
     var sFileName = oInput.value;

     if (sFileName.length > 0) {
      if (Math.round(oInput.files[0].size / (1024 * 1024)) > 2) { // make it in MB so divide by 1024*1024
        alert('Please select image size less than 2 MB');
        oInput.value = "";
        document.getElementById(img_id).style.display = "none";

        return false;
     }
       var blnValid = false;
       for (var j = 0; j < _validFileExtensions.length; j++) 
       {
         var sCurExtension = _validFileExtensions[j];
         if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) 
         {
           blnValid = true;
           this.readURL(oInput, img_id);
           break;
         }
       }

       if (!blnValid) {
         alert("Sorry!! Allowed image extensions are .jpg, .jpeg, .gif, .png");
         oInput.value = "";
         $(`#${img_id}`).css('display', 'none');
         return false;
       }
     }
   }
return true;
}



function ValidateSingleInput(oInput, img_id) {
  $(oInput).parent().find('label .error').css('display', 'none');

  $("label[for='" + oInput.id + "']").css('display', 'none');

   if (oInput.type == "file") {
     var sFileName = oInput.value;

     if (sFileName.length > 0) {
      if (Math.round(oInput.files[0].size / (1024 * 1024)) > 2) { // make it in MB so divide by 1024*1024
        alert('Please select image size less than 2 MB');
        oInput.value = "";
		    document.getElementById(img_id).style.display = "none";
        return false;
     }
       var blnValid = false;
       for (var j = 0; j < _validFileExtensions.length; j++) 
       {
         var sCurExtension = _validFileExtensions[j];
         if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) 
         {
					 blnValid = true;
					 this.readURL(oInput, img_id);
           break;
         }
       }

       if (!blnValid) {
         alert("Sorry!! Allowed image extensions are .jpg, .jpeg, .gif, .png");
				 oInput.value = "";
				 $(`#${img_id}`).css('display', 'none');
         return false;
       }
     }
   }
return true;
}

function readURL(input, img_id) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $(`#${img_id}`).css('display', 'block');
				$(`#${img_id}`).attr('src', e.target.result);
        $(`#${img_id}`).closest('div').addClass('hasFile');
    }
    reader.readAsDataURL(input.files[0]);
  }
}
