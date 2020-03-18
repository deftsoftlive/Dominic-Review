$(document).ready(function() {

     // UserEventForm
  $('#UserEventForm').validate({
    onfocusout: function (valueToBeTested) {
      $(valueToBeTested).valid();
    },
  
    highlight: function(element) {
      $('element').removeClass("error");
    },
  
    rules: {
      "title": {
        required: true,
        maxlength: 150
      },
      "description": {
        required: true,
        maxlength: 300
      },      
      "long_description": {
        required: true,
        maxlength: 500
      },
      "start_date": {
        required: true,
        minDate: true
      },
      "end_date": {
        required: true,
        minStartDate: true
      },
      "start_time":{
      	required: true,
      },
      "end_time":{
      	required: true,
        // timeValidator: '#start_time'
      },
      "event_budget":{
      	required: true,
      	number: true,
      	min: 1
      },
      "min_person": {
        required: true,
        digits: true,
        min: 1,
        minlength: 1,
        maxlength: 4
      },
      "max_person": {
        required: true,
        digits: true,
        min: 1,
        minPerson: true,
        minlength: 1,
        maxlength: 10
      },
      "location": {
        required: true
      },
      "latitude": {
        required: true,
      },
      "longitude": {
        required: true,
      },
      "event_type": {
        required: true
      },      
      "seasons": {
        required: true
      },      
      "colourNames[]": {
        lengthRequired: 'colourNames',
        colourMaxLength: 'colourNames'
      },
       "colours[]": {
        lengthRequired: 'colours',
        colourMaxLength: 'colours'
      },
      "event_categories[]": {
        required: true
      },

      valueToBeTested: {
          required: true,
      }
    },
    });   
  
    // UserEvent Submitting Form 
    $('#UserEventFormBtn').click(function()
    {
      if($('#UserEventForm').valid())
      {
        $('#UserEventFormBtn').prop('disabled', true);
        $('#UserEventForm').submit();
      } else {
        window.scrollTo({top: 0, behavior: 'smooth'});
        return false;
      }
    });
    
});
