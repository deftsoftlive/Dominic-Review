
$(document).ready(function(){







selectOptionDirectAmount();

  $('select[name="deal_off_type"]').change(function() {
         selectOptionDirectAmount();
    });


  function selectOptionDirectAmount() {
        const selectedDealLife = $('select[name="deal_off_type"]').children("option:selected").val();
        if(selectedDealLife === '1') {
           $('#min_rs').css('display', 'block');
        } else {
           $('#min_rs').css('display', 'none');
        }
  }












  
   // deal Form
  $('#dealForm').validate({
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
      "packages":{
        required: true
      },
      "type_of_deal":{
        required: true
      },
      "deal_code": {
        required: true,
        alphanumeric: true,
        maxlength: 10
      },
      "amount": {
        required: true,
        positiveNumber: true,
        minlength: 1,
        maxlength: function(element){
          // if Off type is Percent
                    if($('#deal_off_type').find('select').val() == 0){
                        return 2;
                    }
                    else{
                        return 5;
                    }
                }
      },
      "deal_life": {
        required: true
      },
      "start_date": {
        required: true,
        minDate: true
      },
      "expiry_date": {
        required: true,
        minStartDate: true
      },
      "deal_off_type": {
        required: true
      },
       "min_amount": {
        required: function(element){
         
                    if($('#deal_off_type').find('select').val() == 1){
                        return true;
                    }
                    else{
                        return true;
                    }
                },
        number:true,
        greaterThan:'#amount'

      },
       "description": {
          required: true,
          maxlength: 500
      },
      'message_text': {
          required: true,
          maxlength: 300
      },
      valueToBeTested: {
          required: true,
      }
    },
    });   
  
    // deal Form Submitting 
    $('#dealFormBtn').click(function() {
      if($('#dealForm').valid()) {
        $('#dealFormBtn').prop('disabled', true);
        $('#dealForm').submit();
      } else {
        return false;
      }
    });


    $.validator.addMethod('positiveNumber',
    function (value) { 
        return Number(value) > 0;
    }, 'Please enter a valid number.');
    
});
