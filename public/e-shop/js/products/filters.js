
 

loadProductListWithFilter();

//===============================================================================================================



function loadProductListWithFilter($v=0) {
	 var $this = $("body").find('form#ProductFilterOfSidebar');
     var $url = $this.attr('action');
     var $divPath = $("body").find('#loadProducts');
	 $.ajax({
               url : $url,
               data : $this.serialize(),
               type: 'POST',   
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').show()
               },
                beforeSend: function() {
                  
                    $("body").find('.custom-loading').show();
                  
                },
                success: function (result) {
                        if(parseInt(result.status) == 1){
                            $divPath.html(result.htm) ;

                              setTimeout(function() {
                                  $("body").find('.custom-loading').hide();
                              }, 3000);
                        }
               },
               complete: function() {
                        $("body").find('.custom-loading').hide();
               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

   });
}


//===============================================================================================================

jQuery("body").on('click','.resetRadio',function(){
          $this = $('input[name=price]:checked');
          if($this.is(':checked')) { 
              $this.prop('checked', false);
          } 
          loadProductListWithFilter(1);
});



//===============================================================================================================



$("body").on('change','.formInputFilter',function(){
loadProductListWithFilter(1);
});







































