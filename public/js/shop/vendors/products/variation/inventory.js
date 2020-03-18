
// $("body").find('#inventoryFormSubmit').validate({
// 	    onfocusout: function (valueToBeTested) {
// 	      $(valueToBeTested).valid();
// 	    },
	  
// 	    highlight: function(element) {
// 	      $('element').removeClass("error");
// 	    },
//        rules: {
// 		      "sku": {
// 		          required: true,
// 		          maxlength: 150
// 		      },
		       
// 		      "stock":{
// 		        required: function(){
// 		        	 if($("body").find('#hasStock').is(':checked')){
// 		        	 	return true;
// 		        	 }
// 		        }
// 		      },
// 		      "lowInStock":{
// 		        required: function(){
// 		        	 if($("body").find('#hasStock').is(':checked')){
// 		        	 	return true;
// 		        	 }
// 		        }
// 		      },
// 		      valueToBeTested: {
// 		          required: true,
//               }
//          } 
    
// });


$("body").on('submit','#inventoryFormSubmit',function(e){
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
               	 	   // alert('Inventry info is saved');
                 	 alert(result.messages);
			           $loader.hide();
                 }else{
                 	 alert(result.messages);
                 	  $loader.hide();
                 }
              } 
         });
}); 



 //=============================================================================================================
 //=============================================================================================================
 //=============================================================================================================
 //=============================================================================================================
 //=============================================================================================================
 //=============================================================================================================
 //=============================================================================================================
 





//==============================================================================================================
//==============================================================================================================
//==============================================================================================================

























