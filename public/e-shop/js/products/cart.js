



//==================================================================================================================
//==================================================================================================================
//==================================================================================================================


$("body").on('submit','#ADDToCART',function(e){
  e.preventDefault();
  addToCartFunction();
});








function addToCartFunction() {
	 var $this = $("body").find('form#ADDToCART');
     var $url = $this.attr('data-action');  alert
     var $divPath = $("body").find('#loadProducts');
	 $.ajax({
               url : $url,
               data : $this.serialize(),
               type: 'GET',   
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').show()
               },
                beforeSend: function() {
                   $("body").find('.custom-loading').show();
                   $this.find('.cartButton').attr('disabled','true');
                },
                success: function (result) {
                        if(parseInt(result.status) == 1){
                            $divPath.html(result.htm) ;

                                  $("body").find('.custom-loading').hide();
                                   $this.find('#errorMessageBox').html(ErrorMsg('success',result.messages));
                              setTimeout(function() {
                                  window.location.href=result.url;
                              }, 1000);
                        }else if(parseInt(result.status) == 0){
                        	  $this.find('#errorMessageBox').text(result.messages);
                              $this.find('.cartButton').removeAttr('disabled');

                        }
               },
               complete: function() {
                        $("body").find('.custom-loading').hide();
               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

   });
}







 function ErrorMsg(type,message){

      var txt  ='';
          txt +='<div class="alert alert-'+type+'" role="alert">';
          txt +=message;
          txt +='</div>';

          return txt;
  }






// $("body").on('click','.filterType',function(){

//      var $this = $("body").find('form#ADDToCART');
//      var $url = $this.attr('data-action');
//      var $divPath = $("body").find('#loadProducts');
//    $.ajax({
//                url : $url,
//                data : $this.serialize(),
//                type: 'GET',   
//                dataTYPE:'JSON',
//                headers: {
//                  'X-CSRF-TOKEN': $('input[name=_token]').show()
//                },
//                 beforeSend: function() {
//                    $("body").find('.custom-loading').show();
//                    $this.find('.cartButton').attr('disabled','true');
//                 },
//                 success: function (result) {
//                         if(parseInt(result.status) == 1){
//                             $divPath.html(result.htm) ;

//                                   $("body").find('.custom-loading').hide();
//                                    $this.find('#errorMessageBox').text(result.messages);
//                               setTimeout(function() {
//                                   window.location.reload();
//                               }, 3000);
//                         }else if(parseInt(result.status) == 0){
//                             $this.find('#errorMessageBox').text(result.messages);
//                               $this.find('.cartButton').removeAttr('disabled');

//                         }
//                },
//                complete: function() {
//                         $("body").find('.custom-loading').hide();
//                },
//                error: function (jqXhr, textStatus, errorMessage) {
                     
//                }

//    });

// });































