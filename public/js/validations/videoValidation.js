$(document).ready(function(){
   // Video Form
  $('#videoForm').validate({
    onfocusout: function (valueToBeTested) {
      $(valueToBeTested).valid();
    },
  
    highlight: function(element) {
      $('element').removeClass("error");
    },
  
    rules: {
      "title": { 
          required: true,
          alphanumeric: true,
          maxlength: 30,
      },
      "video_link": {
        required: true,
        url: true
      },
      valueToBeTested: {
          required: true,
      }
    },
    });   
  
    // Video Form Submitting 
    $('#videoFormBtn').click(function() {
      if($('#videoForm').valid()) {
        $('#videoFormBtn').prop('disabled', true);
        $('#videoForm').submit();
      } else {
        return false;
      }
    });
   
});
