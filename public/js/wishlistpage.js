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

loadWishlistItems(0);





 











//---------------------------------------------------------------------------------------------------------
//   load all cart Items
//---------------------------------------------------------------------------------------------------------


 function loadWishlistItems(loader = 1) {
        
        var $url = $("body").find('input[name=wishlistRoute]').val();
        var $CartItems = $("body").find('#wishlistItems');
       // var $cartTotals = $("body").find('#cartTotals');
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
                		// $cartTotals.html(result.data.amountDetail);
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









//###################################################################################################


});