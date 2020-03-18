jQuery(function(){



 
  $('[data-toggle="tooltip"]').tooltip();
 

$("body").on('click','.coupon-code',function() {
  /* Get the text field */
  var text = $(this).parent().find('.code-text').text();
  var copyText = document.createElement("textarea");
  document.body.appendChild(copyText);
  copyText.value = text;
  /* Select the text field */
  copyText.select(); 
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/
  /* Copy the text inside the text field */
  document.execCommand("copy");
  document.body.removeChild(copyText);
  $(this).attr('data-original-title', `Copied ${copyText.value}`);
});

$("body").on('mouseover','.coupon-code',function() {
 $(this).attr('data-original-title', `Copy to clipboard`);
});
 
  

getAllDealsAjax();
 
/*----------------------------------------------------------------------------
|
|   Business filter
|_____________________________________________________________________________
*/

function initialize() 
{
    var input = document.getElementById('address');
    var options = {    
    types: ['address'],
    componentRestrictions: {country: ["us", "ca"]}
    };
    var componentForm = {
      street_number: 'short_name',
      route: 'long_name',
      locality: 'long_name',
      administrative_area_level_1: 'short_name',
      country: 'long_name',
      postal_code: 'short_name'
    };    
    var autocomplete = new google.maps.places.Autocomplete(input, options);
    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var place = autocomplete.getPlace();
        
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];

            console.log(addressType);

                      
          }
        }
        document.getElementById('latitude').value = place.geometry.location.lat();
        document.getElementById('longitude').value = place.geometry.location.lng();
       
        autocompleted = true;
        setTimeout(function(){  getAllDealsAjax();   }, 1000);
      
    });
}
google.maps.event.addDomListener(window, 'load', initialize);

jQuery("body").on('change','.businesses',function(){

  getAllDealsAjax();

});

/*----------------------------------------------------------------------------
|
|   Business filter
|_____________________________________________________________________________
*/

jQuery("body").on('submit','#getDealForm',function(e){
   e.preventDefault();
   var $this = jQuery( this );
   var url = $this.attr('action');
   //if($this.valid()){
      $.ajax({
               url : url,
               data : $this.serialize(),
               type: 'POST',   
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
               },
                beforeSend: function() {
                    $("body").find('.custom-loading').show();
                     $this.find('.messageNotofications').html('');
                     $this.find('button.cstm-btn').attr('disabled','true');

                },
                success: function (result) {
                       if(parseInt(result.status) == 0){
                          $this.find('.messageNotofications').html(erorrMessage(result.errors));
                          $this.find('button.cstm-btn').removeAttr('disabled');
                       
                       }else if(parseInt(result.status) == 1){
                            $this.find('.messageNotofications').html(ErrorMsg('warning',result.message));
                            $this[0].reset();
                            $this.closest('.modal-body').addClass('aleadyRequested').find('.MessageChat').html('<p>'+result.link+'</p>');

                       }else if(parseInt(result.status) == 2){
                            $this.find('.messageNotofications').html(ErrorMsg('warning',result.message));
                            $this.find('button.cstm-btn').removeAttr('disabled');

                       }else if(parseInt(result.status) == 3){
                            $this.find('.messageNotofications').html(ErrorMsg('warning',result.message));
                            $this.find('button.cstm-btn').removeAttr('disabled');

                       }else if(parseInt(result.status) == 4){
                           $this.find('.messageNotofications').html(ErrorMsg('warning',result.message));
                           $("body").find('#LoginModel').modal({backdrop: 'static', keyboard: false});
                           $this.find('button.cstm-btn').removeAttr('disabled');
                       }
               },
               complete: function() {
                        $("body").find('.custom-loading').hide();
               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

        });
   //}

});

/*----------------------------------------------------------------------------
|
|   Business filter
|_____________________________________________________________________________
*/


jQuery("body").on('click','.get_detail',function(e){
    e.preventDefault();
    var $this = jQuery( this );
    var $modal =jQuery('#myModalDealDiscount');

    if(parseInt($this.attr('data-chat')) == 1){
       $modal.find('.modal-body').addClass('aleadyRequested').find('.MessageChat').html('<p>'+$this.attr('data-chatMessage') +'</p>');
       $modal.modal({backdrop: 'static', keyboard: false});
    }else{

      $modal.find('.modal-body').removeClass('aleadyRequested');

      $modal.find('#busines_title').text($this.attr('data-title'));
      //$modal.find('#message').html($this.attr('data-message'));
      $modal.find('input[name=deal_id]').val($this.attr('data-id'));
      $modal.modal({backdrop: 'static', keyboard: false});
      dealValidation();
      
    }
    
});
 
/*----------------------------------------------------------------------------
|
|   Business filter
|_____________________________________________________________________________
*/


function getAllDealsAjax() {
     var $this = jQuery("body").find('#formBusinessDisountDeals');
     var url = $this.attr('action');
      $.ajax({
               url : url,
               data : $this.serialize(),
               type: 'GET',   
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
               },
                beforeSend: function() {
                    $("body").find('.custom-loading').show();
                },
                success: function (result) {
                      if(parseInt(result.status) == 1){
                          jQuery("body").find('#inner-content-detail').html(result.deals);
                          jQuery("body").find('#categoryCount').html(result.dealCount);
  
                       }
               },
               complete: function() {
                        $("body").find('.custom-loading').hide();
               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

        });
}

/*----------------------------------------------------------------------------
|
|   Business filter
|_____________________________________________________________________________
*/

$("body").on('submit','#loginForm',function(e){
   e.preventDefault();

  
     login($(this));
  

});
loginValidation();
dealValidation();

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
                             jQuery("body").find('#dataLogged').val(1);
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





 
});