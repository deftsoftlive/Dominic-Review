$(document).ready(function(){
  

	//profile-Validations Form
	$('#profileForm').validate({
	onfocusout: function (valueToBeTested) {
	  $(valueToBeTested).valid();
	},

	highlight: function(element) {
	  $('element').removeClass("error");
	},

	rules: {
	  "name": {
	  	  required: true,
	      maxlength: 50,
	  },

	  valueToBeTested: {
	      required: true,
	  }
	},
	});   

  //Submitting Form 
  $('#profileSubmitButton').click(function()
  {
    if($('#profileForm').valid())
    {
      $('#profileSubmitButton').prop('disabled', true);
      $('#profileForm').submit();
    }else{
      return false;
    }
  });

  //password-Validations Form
	$('#changePasswordForm').validate({
    onfocusout: function (valueToBeTested) {
      $(valueToBeTested).valid();
    },
  
    highlight: function(element) {
      $('element').removeClass("error");
    },
  
    rules: {
      "oldpassword": {
          required: true,
          maxlength: 50,
      },
      "password": {
        required: true,
        minlength: 8,
        maxlength: 20,
    },
    "conpassword": {
      required: true,
      minlength: 8,
      maxlength: 20,
      equalTo: "#password",
  },
  
      valueToBeTested: {
          required: true,
      }
    },
    messages: {
      conpassword: {
        equalTo: "Password and Confirm Password do not match"
    }
   }
    });   
  
    //Submitting Form 
    $('#passwordSubmitButton').click(function()
    { 
      if($('#changePasswordForm').valid())
      {
        $('#passwordSubmitButton').prop('disabled', true);
        $('#changePasswordForm').submit();
      }else{
        return false;
      }
    });


    //login-Validations Form
	$('#loginform').validate({
    onfocusout: function (valueToBeTested) {
      $(valueToBeTested).valid();
    },
  
    highlight: function(element) {
      $('element').removeClass("error");
    },
  
    rules: {
      "email": {
          required: true,
          maxlength: 50,
      },
      "password": {
        required: true,
        maxlength: 50,
    },
  
      valueToBeTested: {
          required: true,
      }
    },
    });   
  
    //Submitting Form 
    $('#loginSubmitButton').click(function()
    {
      if($('#loginform').valid())
      {
        $('#loginSubmitButton').prop('disabled', true);
        $('#loginform').submit();
      }else{
        return false;
      }
    });

      //New User-Validations Form
	$('#userForm').validate({
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
      // "role_id": {
      //   required: true,
      //   maxlength: 1,
      // },
      "email": {
          required: true,
          maxlength: 50,
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
  
      valueToBeTested: {
          required: true,
      }
    },
    messages: {
      conpassword: {
        equalTo: "Password and Confirm Password do not match"
    }
   }
    });   
  
    //Submitting Form 
    $('#userSubmitButton').click(function()
    { 
      if($('#userForm').valid())
      {
        $('#userSubmitButton').prop('disabled', true);
        $('#userForm').submit();
      }else{
        return false;
      }
    });

});
