$(function(){

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





// loading all cart items

loadCartItems(0);







$("body").on('submit','#CouponApply',function(event){
    event.preventDefault();
    var $this = $( this );

      $.ajax({
               url : $this.attr('action'),
               data : $this.serialize(),
               type: 'GET',   
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
               },
                beforeSend: function() {
                    $this.find('button.cstm-btn').attr('disabled','true');
                 },
                success: function (result) {
                   if(result.status == 1){
                		    $this.find('button.cstm-btn').removeAttr('disabled');
                        $this[0].reset();
                        $this.next('.cart-error-msz').html(ErrorMsg('success',result.messages));

                        loadCartItems(0);
                       
                    }else{
                        $this.next('.cart-error-msz').html(ErrorMsg('warning',result.messages));
                        $this.find('button.cstm-btn').removeAttr('disabled');
                    }
                 },
                complete: function() {
                        $("body").find('.custom-loading').hide();
                },
                error: function (jqXhr, textStatus, errorMessage) {
                     
                }

        });
});












//---------------------------------------------------------------------------------------------------------
//   load all cart Items
//---------------------------------------------------------------------------------------------------------


 function loadCartItems(loader = 1) {
        
        var $url = $("body").find('input[name=cartRoute]').val();
        var $CartItems = $("body").find('#CartItems');
        var $cartTotals = $("body").find('#cartTotals');
 	  $.ajax({
               url : $url,
              
               type: 'GET',   
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
               },
                beforeSend: function() {
                   if(loader == 1){
                   	 $("body").find('.custom-loading').show();
                   }
                },
                success: function (result) {

                	if(result.status == 1){
                		$CartItems.html(result.data.items);
                		$cartTotals.html(result.data.amountDetail);
                	}
                        
                },
               complete: function() {
                        $("body").find('.custom-loading').hide();
               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

        });
 }












//####################################################################################################



$("body").on('click','.wishlist-icon',function(e){

    e.preventDefault();
    var $formID = $(this).attr('data-form');
    CartAndWishList($(this),$formID);

});


function CartAndWishList($btnThis,$formID) {

     var actionUrl = $btnThis.attr('data-action');
     var $this = $("body").find($formID);
     var package_id = $this.attr('data-id');
     

     $.ajax({
               url : actionUrl,
               data :$this.serialize(),
               type: 'POST',   
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
               },
                beforeSend: function() {
                    $("body").find('.custom-loading').show();
                      $("body").find('.messageNotofications').html('');
                     //$this.find('button.cstm-btn').attr('disabled','true');

                },
                success: function (result) {
                      if(parseInt(result.status) == 0){
                        //  $('#cartModal').modal('show');
                          $("body").find('.messageNotofications').html(ErrorMsg('warning',result.errors));
                           $("body").find('.custom-loading').hide();
                           //$this.find('button.cstm-btn').removeAttr('disabled');
                       }else if(parseInt(result.status) == 1){
                         $("body").find('.custom-loading').hide();
                          $("body").find('.messageNotofications').html(ErrorMsg('success',result.errors));
                             
                             window.location.href = result.url;

                       }else if(parseInt(result.status) == 4){
                              $("body").find('.custom-loading').hide();
                           $("body").find('.messageNotofications').html(ErrorMsg('warning',result.message));
                             $("body").find('#LoginModel').modal({backdrop: 'static', keyboard: false});
                             //$this.find('button.cstm-btn').removeAttr('disabled');
                       }
                       
               },
               complete: function() {
                        $("body").find('.custom-loading').hide();
               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

    });
  
}




//##################################################################################################


$("body").on('click','.package-addons-modal',function(e){
    e.preventDefault();
    var $this = $( this );
    var actionUrl = $this.attr('data-action');
    var orderID = $this.attr('data-orderID');
    var $modal = $('#PackagePopupWithAddons');
    var total = $("body").find('#CurrentCartTotal').val();
    $modal.modal({backdrop: 'static', keyboard: false});
     
        $.ajax({
               url : actionUrl,
               type: 'GET',  
               data:{
                total:total,
                orderID:orderID
               }, 
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
               },
                beforeSend: function() {
                      $("body").find('.custom-loading').show();
                      $("body").find('.messageNotofications').html('');
                     //$this.find('button.cstm-btn').attr('disabled','true');

                },
                success: function (result) {
                      if(parseInt(result.status) == 1){
                           // $("body").find('.messageNotofications').html(ErrorMsg('warning',result.errors));
                           $("body").find('.custom-loading').hide();
                           $modal.find('.modal-body').html(result.addonsHtml);
                           //$this.find('button.cstm-btn').removeAttr('disabled');
                       } 
                       
               },
               complete: function() {
                        $("body").find('.custom-loading').hide();
               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

    });

});

$("body").on('click','.addonPkg',function(){
  if($(this).is(':checked')){
        addonPrice();
  }else if(!$(this).is(':checked')){
    var val = parseInt($(this).data('price'));
    var total = $("body").find('#CurrentCartTotal').val();
    var totalPrice = parseInt(total) - val;
     $("body").find('#addonTotal').text(totalPrice);

  }
});

//###################################################################################################


function addonPrice() {
  var total = $("body").find('#CurrentCartTotal').val();
  var totalPrice = parseInt(total);
   $("body").find('.addonPkg:checked').each(function() {
       totalPrice += parseInt($(this).data('price'));
   });

  $("body").find('#addonTotal').text(totalPrice);
    
}

//###############################################################################################

$("body").on('submit','form#AddonSubmit',function(e){
   e.preventDefault();
  var $this = $( this );
  var $modal = $('#PackagePopupWithAddons');
  var actionUrl = $this.attr('action');
   $.ajax({
               url : actionUrl,
               type: 'POST',  
               data:$this.serialize(), 
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
               },
                beforeSend: function() {
                      
                      $this.find('.alertMessage').html('');
                      $this.find('button.cstm-btn').attr('disabled','true');

                  


                },
                success: function (result) {
                      if(parseInt(result.status) == 1){
                                $this.find('.alertMessage').html(ErrorMsg('success',result.messages));
                              $this.find('button.cstm-btn').removeAttr('disabled');
                                  loadCartItems(1);
                                   $modal.modal('hide');
                       }else{
                           $this.find('.alertMessage').html(result.messages);

                            $this.find('button.cstm-btn').removeAttr('disabled');
                       }
                       
               },
               complete: function() {
                        $("body").find('.custom-loading').hide();
               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

    });


});


$("body").on('click','.remove-from-cart',function()
{
    var r = confirm("Alert!! Do you want to remove this Package from Cart?");
      if (r == true) {
        var redirectionURL = $(this).attr('data-url');
        window.location.href= redirectionURL;
      } else {
        return false;
      }
});

//###############################################################################################
});
