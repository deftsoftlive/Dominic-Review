$(document).ready(function(){
    $('.cross').click(function(){
        $('.custm-verify-msg').css('display','none');
    });
});

$(document).ready(function(){
    $( "#date_of_birth" ).datepicker({
       changeMonth:true,
       dateFormat: 'dd-mm-yy',
       changeYear:true,
       yearRange: "-100:-18",
       maxDate: '-18Y',
       onSelect: function () {
        $("#date_of_birth").valid();
    }
    });
});

$(document).ready(function(){

/*$.validator.addMethod("check_date_of_birth", function(value, element) {

    var dob = $('#date_of_birth').val();
    var age =  18;

    var mydate = new Date(dob);
    var currdate = new Date();
    currdate.setFullYear(currdate.getFullYear() - age);

    return currdate > mydate;

}, "You must be at least 18 years of age.");*/

jQuery.validator.addMethod("noSpace", function(value, element) { 
  return value.indexOf(" ") < 0 && value != ""; 
}, "Spaces are not allowed.");

$.validator.addMethod("lettersonly", function(value, element) {
	return this.optional(element) || /^[a-z]+$/i.test(value);
}, "This field is not valid.");

$.validator.addMethod('mobileUK', function(phone_number, element) {
    phone_number = phone_number.replace(/\s+|-/g,'');
    return this.optional(element) || phone_number.length > 9 &&
        phone_number.match(/^(?:(?:(?:00\s?|\+)44\s?|0)7(?:[45789]\d{2}|624)\s?\d{3}\s?\d{3})$/);
}, 'Please specify a valid mobile number');

	$("#front-reg-form").validate({
	  rules: {
	    fname: {
	    	required: true,
	    	minlength: 2,
	    	maxlength: 50,
	    	noSpace: true,
	    	lettersonly: true 
	    },
	    lname: {
	    	required: true,
	    	minlength:2,
	    	maxlength: 50,
	    	noSpace: true,
	    	lettersonly: true 
	    },
	    email: {
	      	required: true,
	      	email: true
	    },
	    contact_no:{
	    	required: true,
	    	minlength: 11,
	    	maxlength: 12,
	    	mobileUK: true
	    },
	    date_of_birth:{
	    	required:true
	    },
	    gender: {
	    	required: true
	    },
	    password:{
	    	required: true,
            minlength: 8,
            maxlength: 15
	    },
	    password_confirmation: {
                required: true,
                maxlength: 15,
                minlength: 8,
                equalTo: "#password"
        },
	  },
	 messages: {
    password_confirmation: {
      equalTo: "Sorry, Your password does not match."
    }
  }
});

    $('#submitBtn').click(function(){
    	$(this).attr('disabled', true);
    	if($('#front-reg-form').valid()){
    		$('#front-reg-form').submit();
    	}else{
    		$(this).attr('disabled', false);
    		return false;
    	}	
    });

$("#user-profile-edit").validate({
      rules: {
        fname: {
            required: true,
            minlength: 2,
            maxlength: 50,
            noSpace: true,
            lettersonly: true 
        },
        lname: {
            required: true,
            minlength:2,
            maxlength: 50,
            noSpace: true,
            lettersonly: true 
        },
        nick_name: {
            maxlength: 50,
        },
        email: {
            required: true,
            email: true
        },
        contact_no:{
            required: true,
            minlength: 11,
            maxlength: 12,
            mobileUK: true
        },
      },
});

    $('#userSubmitButtonProfile').click(function(){
        $(this).attr('disabled', true);
        if($('#user-profile-edit').valid()){
            $('#user-profile-edit').submit();
        }else{
            $(this).attr('disabled', false);
            return false;
        }   
    });

});

$(document).ready(function(){
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    /* Toggle between adding and removing the "active" class,
    to highlight the button that controls the panel */
    this.classList.toggle("active");

    /* Toggle between hiding and showing the active panel */
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
});


$(document).ready(function(){
    $('.ham').click(function(){
        $('.dash-wrapper').toggleClass('custm-side-slide');
    });
    $('.fa-times-circle').click(function(){
        $('.dash-wrapper').removeClass('custm-side-slide');
    });
});

$(document).ready(function(){
   $("#contact_form").validate({
      rules: {
        name: {
            required: true,
            minlength: 2,
            maxlength: 70
        },
        email: {
            required: true,
            maxlength: 50,
            email: true
        },
        message: {
            required: true,
            minlength: 10,
            maxlength: 200
        }
      }
});

    $('#submit_contact_form').click(function(){
        $(this).attr('disabled', true);
        if($('#contact_form').valid()){
            // $('#contact_form').submit();
        }else{
            $(this).attr('disabled', false);
            return false;
        }   
    });
});

$(document).ready(function(){
    $("#user-password-edit").validate({
      rules: {
        current_password:{
            required: true,
            maxlength: 15
        },
        password:{
            required: true,
            minlength: 8,
            maxlength: 15
        },
        confirm_password: {
                required: true,
                maxlength: 15,
                equalTo: "#password"
        }
      },
      messages: {
        confirm_password: {
            equalTo: "Sorry, Your password does not match."
        }
    }
});

    $('#changePassword').click(function(){
        $(this).attr('disabled', true);
        if($('#user-password-edit').valid()){
            $('#user-password-edit').submit();
        }else{
            $(this).attr('disabled', false);
            return false;
        }   
    });
});

$(document).ready(function(){
    $('.messages').scrollTop($('.messages')[0].scrollHeight);
    $("#messageForm").on('submit',function(e) {
        var message = $("#mess").val();
        if($.trim(message) == '') { 
            return false;
        }
    }); 
});
