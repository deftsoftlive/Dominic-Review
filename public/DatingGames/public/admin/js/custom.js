$(document).ready(function(){
	alert('sfffd');
	return false;
	$("#reg-form").validate(){
		rules:{
			'fname':{
				required: true,
				minlength: 1
			},
			'lname':{
				required: true,
				minlength: 1
			}
		},
		messages:{
			'fname':{
				required: "This field is mendatory",
				minlength: "Choose a First name of at least 1 letter!"
			},
			'lname':{
				required: "This field is mendatory",
				minlength: "Choose a First name of at least 1 letter!"
			}
		}
	}
})