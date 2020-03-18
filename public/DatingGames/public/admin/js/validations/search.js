$(document).ready(function(){
  
	$('.sidebar-form').validate({
	onfocusout: function (valueToBeTested) {
	  $(valueToBeTested).valid();
	},

	highlight: function(element) {
	  $('element').removeClass("error");
	},

	rules: {
		"search": {
			required: true,
			maxlength: 30, 
		},

	  valueToBeTested: {
	      required: true,
	  }
	},
	});   

  //Submitting Form 
  $('#search-btn').click(function()
  {
    if($('.sidebar-form').valid())
    {
      $('#search-btn').prop('disabled', true);
      $('.sidebar-form').submit();
    }else{
      return false;
    }
  });

});
