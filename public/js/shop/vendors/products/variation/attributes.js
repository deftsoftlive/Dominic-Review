
$(function(){



//==============================================================================================
//==============================================================================================
//==============================================================================================

$("body").on('submit','#saveAttributeProducts',function(e){
   e.preventDefault();
   var $loader = $("body").find('.loader3');
   var $this = $(this);
   var $div =$("body").find('.loadAllVariationOfProduct');
    $.ajax({
               url : $this.attr('data-action'),
               data : $this.serialize(),
               type: 'POST',   
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
               },
               beforeSend: function() {
		 			$loader.show();
			   },   
               success: function (result) {
               	 if(result.status == 1){
			          $div.html(result.htm);
			          
			          $("body").find('.select2').select2();
			          $loader.hide();
                 }
              } 
         });
 });




//=====================================================================================================
//=====================================================================================================
//=====================================================================================================



$("body").on('click','.addMoreVariationAttributes',function(e){
   e.preventDefault();
   
   var $loader = $("body").find('.loader3');
   var $this = $(this);
   var $div = $("body").find('#variantListOfItems');
   $.ajax({
               url : $this.attr('data-action'),
               data :{
               	  count:$this.attr('data-count')
               },
               type: 'GET',   
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
               },
               beforeSend: function() {
		 			$loader.show();
			   },   
               success: function (result) {
               	 if(result.status == 1){
			           $div.append(result.htm);
			           $this.remove();
			           $loader.hide();
                 }
              } 
   });

});







});




































