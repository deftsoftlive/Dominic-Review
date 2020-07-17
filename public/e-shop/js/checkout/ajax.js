

 $('#shippingForm').validate({
    onfocusout: function (valueToBeTested) {
      $(valueToBeTested).valid();
    },
  
    highlight: function(element) {
      $('element').removeClass("error");
    },
  
    rules: {
      "name": {
          required: true,
          alphanumeric: true
      },
      "email": {
          required: true,
          email: true
      },
      "phone_number": {
          required: true,
          phoneUS: true
      },
      "address": {
          required: true,
      },
      "country": {
          required: true,
      },
      "state": {
          required: true,
      },
      "city": {
          required: true,
      },
      "zipcode": {
          required: true,
      },
      valueToBeTested: {
          required: true,
      }
    },
    });   
  
    










$("body").on('submit','#shippingForm',function(e){
     e.preventDefault();

  submitShippingAddress($(this));
});








function submitShippingAddress($this) { 
	$.ajax({
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          url: $this.attr('action'),
          type: "POST",
          dataType: "JSON",
          data: $this.serialize(),
          beforeSend: function() {
          jQuery("body").find('.custom-loading').show();
           $this.find('.submitBTN').attr('disabled','true');
          },   
          success: function(res) {
             if(res.status == 1) {
                    
                    setTimeout(function() {
                       $('#messages').text(res.errors);
                    }, 3000);


                   $this.find('.submitBTN').removeAttr('disabled');
                    window.location.href = res.redirectLink;
             }else{

                   $this.find('.submitBTN').removeAttr('disabled');
                        $('#messages').html(erorrMessage(res.errors));
                    setTimeout(function() {
                        $('#messages').html('');
                    }, 3000);

             }

             
              
             
          }, 
          error: function(err) {
           
               $('#err_show').show();
                $('#err_mess').html(JSON.parse(err.responseText).message);

                setTimeout(function() {
                  $('#err_show').fadeOut('smooth');
                }, 3000);
          },
          complete: function() {
             $('#couponFormBtn').prop('disabled', false);
          jQuery("body").find('.custom-loading').hide();
         }
      }); 
}







//######################################################################################################


 












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

//######################################################################################################
//    start
//######################################################################################################













