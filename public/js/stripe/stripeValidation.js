$(document).ready(function(){
   // Basic Info Form
  $('#stripeForm').validate({
     ignore: [],
    onfocusout: function (valueToBeTested) {
      $(valueToBeTested).valid();
    },
  
    highlight: function(element) {
      $('element').removeClass("error");
    },
  
    rules: {
      "stripe_account": { 
          required: true,
      },
      "category": {
        required: function(){
               if($("body").find('#accountType1').is(':checked')){
                return true;
               }else{
                return false;
               }

        },
      },
      valueToBeTested: {
          required: true,
      }
    },
    });   
  
    // stripeForm Submitting Form 
    $('#stripeFormBtn').click(function()
    {
      if($('#stripeForm').valid())
      {
        $('#stripeFormBtn').prop('disabled', true);
        $('#stripeForm').submit();
      } else {
        return false;
      }
    });






//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

$("body").on('change','input[name=type]',function(){
   checkTypeAccount();
});

function checkTypeAccount() {
  var $this = $("body").find('#VendorCategories');
   if($("body").find('#accountType1').is(':checked')){
     $this.show();
   }else{
     $this.hide();
   }
}

















    
});
