$(function(){







$("body").on('click','.getQuote',function(e){
   e.preventDefault();
   var id = $( this ).attr('data-id');

   $("body").find('#GetQuoteModel').modal('show');


});




function dealValidation() {
      var $formModal = $("body").find('#getDealForm');


      $formModal.validate({

            onfocusout: function (valueToBeTested) {
              $(valueToBeTested).valid();
            },

            highlight: function(element) {
              $('element').removeClass("error");
            },

            rules: {
              
              "name": {
                  required: true,
                  character_with_space: true,
                  maxlength: 50, 
              },
              'email': {
                  required: true,
                  customemail: true,
              }, 
              'phone_number': {
                  required: true,
               }, 
               'event_date': {
                  required: true,
               }, 
               
              valueToBeTested: {
                  required: true,
              }

            }
      });

}


























});