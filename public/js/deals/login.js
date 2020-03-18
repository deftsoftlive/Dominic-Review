
$("body").on('submit','#loginForm',function(e){
   e.preventDefault();
   login($(this));
});
loginValidation();
 

function login($this) {
   
   var $dealModal = jQuery("body").find('#myModalDealDiscount');

            $.ajax({
               url : $this.attr('action'),
               data : $this.serialize(),
               type: 'POST',  // http method
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
               },
                beforeSend: function() {
                    $this.find('.loading').show();
                    $this.find('button.cstm-btn').attr('disabled','true');
                     $("body").find('.custom-loading').show();
                },

               success: function (data) {
                      if(parseInt(data.status) == 1){
                           $this[0].reset();
                           $("body").find('#LoginModel').modal('hide');

                           jQuery("body").find('#myModalDealDiscount')
                                          .find('.messageNotofications')
                                          .html(ErrorMsg('success','Login Successfully. Now you can sen message to vendor for deal & Discount.'));
                            
                            // $dealModal.find('input[name=name]').val();
                            // $dealModal.find('input[name=email]').val();
                            // $dealModal.find('input[name=phone_number]').val();

                            $("body").find('.custom-loading').hide();

                      }else if(parseInt(data.status) == 2){

                       
                        $this.find('button.cstm-btn').removeAttr('disabled');
                        $this.find('.messageNotofications').html(ErrorMsg('success',data.message));
                         $("body").find('.custom-loading').hide();

                        setTimeout(function () {
                                 $this.find('.messageNotofications').html('');
                        },3000);
                         
                      }else{

                        
                         $("body").find('.custom-loading').hide();
                        $this.find('button.cstm-btn').removeAttr('disabled');
                        $this.find('.messageNotofications').html(erorrMessage(data.errors));

                        setTimeout(function () {
                                 $this.find('.messageNotofications').html('');
                        },3000);
                         
                      }
                    
               },
               complete: function() {
                        $this.find('.loading').hide();
                        // $("body").find('.custom-loading').hide();
                        $this.find('button.cstm-btn').removeAttr('disabled');
               },
               error: function (jqXhr, textStatus, errorMessage) {
                     alert('error');
               }

        });

           return false;
}



/*----------------------------------------------------------------------------
|
|   Business filter
|_____________________________________________________________________________
*/



 function ErrorMsg(type,message){

      var txt  ='';
          txt +='<div class="alert alert-'+type+'" role="alert">';
          txt +=message;
          txt +='</div>';

          return txt;
  }


/*----------------------------------------------------------------------------
|
|   Business filter
|_____________________________________________________________________________
*/

function erorrMessage(errors) {

      var txt ="";
      $.each(errors, function( index, value ) {
        txt += ErrorMsg('warning',value);
          
      });
      return txt;
}



/*----------------------------------------------------------------------------
|
|   Business filter
|_____________________________________________________________________________
*/



 function ErrorMsg(type,message){

      var txt  ='';
          txt +='<div class="alert alert-'+type+'" role="alert">';
          txt +=message;
          txt +='</div>';

          return txt;
  }


/*----------------------------------------------------------------------------
|
|   Business filter
|_____________________________________________________________________________
*/

function erorrMessage(errors) {

      var txt ="";
      $.each(errors, function( index, value ) {
        txt += ErrorMsg('warning',value);
          
      });
      return txt;
}



 








function loginValidation() {
      var $formModal = $("body").find('#LoginModel');


      $formModal.validate({

            onfocusout: function (valueToBeTested) {
              $(valueToBeTested).valid();
            },

            highlight: function(element) {
              $('element').removeClass("error");
            },

            rules: {
               'email': {
                  required: true,
                  customemail: true,
              }, 
              'password': {
                  required: true,
               },
              valueToBeTested: {
                  required: true,
              }

            }
      });

}

