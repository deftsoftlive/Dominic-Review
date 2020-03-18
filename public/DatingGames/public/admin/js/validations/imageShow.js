//Checking Image Extension while uploading profile image
var _validFileExtensions = [".jpg", ".jpeg", ".gif", ".png"];

function ValidateSingleInput(oInput) {
   if (oInput.type == "file") {
     var sFileName = oInput.value;

     if (sFileName.length > 0) {
       var blnValid = false;
       for (var j = 0; j < _validFileExtensions.length; j++) 
       {
         var sCurExtension = _validFileExtensions[j];
         if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) 
         {
					 blnValid = true;
					 this.readURL(oInput);
           break;
         }
       }

       if (!blnValid) {
         alert("Sorry!! Allowed image extensions are .jpg, .jpeg, .gif, .png");
				 oInput.value = "";
				 document.getElementById('image_src').style.display = "none";
         return false;
       }
     }
   }
return true;
}

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
				$('#image_src').attr('src', e.target.result);
				document.getElementById('image_src').style.display = "block";
    }
    reader.readAsDataURL(input.files[0]);
  }
}
