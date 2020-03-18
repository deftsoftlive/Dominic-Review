$(document).ready(function(){
   // Basic Info Form
  $('#basicInfoForm').validate({
     ignore: [],
    onfocusout: function (valueToBeTested) {
      $(valueToBeTested).valid();
    },
  
    highlight: function(element) {
      $('element').removeClass("error");
    },

    errorPlacement: function(error, element) {
      if (element.attr("name") == "address") {
        error.insertAfter("#cke_address");
      } else {
         error.insertAfter(element);
      }
    },
  
    rules: {
      "business_name": { 
          required: true,
          alphanumeric: true,
          maxlength: 30,
      },
      "website": {
        required: true,
        isUrl: true
      },
      "phone_number": {
          required: true,
          digits:true,
          minlength: 8,
          maxlength: 14,
      },
      "company": {
          required: true,
          maxlength: 50,
      },
      "travel_distaince": {
          required: true,
          digits:true,
          maxlength: 50,
      },
      "min_guest": {
        required: true,
        number: true,
        min: 1,
        minlength: 1,
        maxlength: 10
      },
      "min_price": {
          required: true,
          amount: true,
          min: 1,
          minlength: 1,
          maxlength: 10
      },
      "short_description": {
          required: true
      },
      "address": {
          required: true,
      },
      "latitude":{
      	required: true,
      	number: true
      },
      "business_location": {
        required: true,
      },
  	 "longitude":{
      	required: true,
      	number: true
      },
      "facebook_url": {
        isUrl: true
      },
      "linkedin_url": {
        isUrl: true
      },
      "twitter_url": {
        isUrl: true
      },
      "instagram_url": {
        isUrl: true
      },
      "pinterest_url": {
        isUrl: true
      },
      valueToBeTested: {
          required: true,
      }
    },
    });   
  
    // Basic Info Submitting Form 
    $('#basicInfoBtn').click(function()
    {
      if($('#basicInfoForm').valid())
      {
        $('#basicInfoBtn').prop('disabled', true);
        $('#basicInfoForm').submit();
      } else {
        window.scrollTo({top: 0, behavior: 'smooth'});
        return false;
      }
    });
    
});
