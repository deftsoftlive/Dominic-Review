$(function(){



//----------------------------------------------------------------------------------------------------------
//----     Reload Function
//----------------------------------------------------------------------------------------------------------


loadFeaturedCategory();




//----------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------


function loadFeaturedCategory() {
	 var $this = $("body").find('#loadFeaturedCategory');
	 var url =$this.attr('data-route');


	 custom_ajaxFunction(url,$this);
}












//----------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------

function custom_ajaxFunction(url,$divPath,$data='') {
	  $.ajax({
               url : url,
               data : $data,
               type: 'GET',   
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
               },
                beforeSend: function() {
                },
                success: function (result) {
                        if(parseInt(result.status) == 1){
                            $divPath.html(result.htm) ;
                        }
               },
               complete: function() {
                        $("body").find('.custom-loading').hide();
               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

   });
}













});