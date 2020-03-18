$(function(){

//=======================================================================================
variationNavbarToggle();
hasStockFunction();
hasStockManageFunction();
function variationNavbarToggle() {
	 var loader = $("body").find('.loader3');
	 var $val = $("body").find('#variationType').val();
     var $navgeneral = $("body").find('a.nav-general');
     var $navvariation = $("body").find('a.nav-variation');
     var $navinventory = $("body").find('a.nav-inventory');
     loader.show();
     if($val == 1){
     	  showBoxActive($("body").find('.nav-attributes'));
          $navgeneral.hide();
          $navvariation.show();
          $navinventory.hide();
          

     }else{

     	  showBoxActive($("body").find('.nav-general'));
     	  $navgeneral.show();
          $navvariation.hide();
          $navinventory.show();
          

     }
      loader.hide();
}




//=======================================================================================


 $("body").on('change','#variationType',function(){
            variationNavbarToggle();

 });



//=======================================================================================


function showBoxActive($this=null) {
      $("body").find('.navVariant').removeClass('active');
      
      if($this != null){
      	  $this.addClass('active');
       }
       variationBoxToggle();
}



//=======================================================================================


function variationBoxToggle() {
	  $("body").find('.variationBoxInner').hide();
	  $("body").find('.navVariant').each(function(){
	  	    if($(this).hasClass('active')){
	  	    	 var $variationBoxInner = $(this).attr('data-show');
	             $("body").find($variationBoxInner).show();
	             loadContentAccordingToSelectOption($(this));
	  	    }
      });

}











function loadContentAccordingToSelectOption($this) {
	 
   var $type = $this.attr('data-show');
   var $url = $("body").find('#loadAllstepWhenClieckOnTab').val();
   var $divID = $("body").find($type);

   switch($type){

       case '#generalBox':
        return getContentWithType($type,$url,1,$divID);
       break;

        case '#inventoryBox':
        return getContentWithType($type,$url,2,$divID);
       break;

        case '#attributeBox':
        return getContentWithType($type,$url,3,$divID);
       break;

        case '#variationBox':
        return getContentWithType($type,$url,4,$divID);
       break;
        


   }

 
}


function getContentWithType($type,$url,$step,$divID) {
	     var $variationType = $("body").find('#variationType').val();
	      var $loader = $("body").find('.loader3');
	     $.ajax({
               url : $url,
               data : {
	                step:$step,
	                variationType:$variationType
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
		          $divID.html(result.htm);
		          defaultJs();
		          $loader.hide();
               } 
         });
}






//=================================================================================================================
//=================================================================================================================
//=================================================================================================================



$("body").on('click','.remove-attribute',function(e){
  e.preventDefault();
  var val = parseInt($(this).attr('data-id'));
  if(val > 0){
  	  var $url = $(this).attr('data-url');
  	  deleteProductVarationWithID($url);


  }else{
  	$(this).clostest('.productItemParentDiv').remove();

  }

});


//==================================================================================================================
//==================================================================================================================
//==================================================================================================================

function deleteProductVarationWithID($url) {
	   var $loader = $("body").find('.loader3');
	   
	   $.ajax({
	               url : $url,
	               type: 'GET',   
	               dataTYPE:'JSON',
	               headers: {
	                 'X-CSRF-TOKEN': $('input[name=_token]').val()
	               },
	               beforeSend: function() {
			 			$loader.show();
				   },   
	               success: function (result) {
	               	 if(result){
				           variationBoxToggle();
				           $loader.hide();
	                 }
	              } 
	   });
}












//=======================================================================================


$("body").on('click','.navVariant',function(e){
   e.preventDefault();
   showBoxActive($(this));
});




//==========================================================================================


function hasStockFunction() {
	var $hasStock = $("body").find('#hasStock');
	var $hasStockClass = $("body").find('.hasStock');
	$hasStockClass.hide();
	if($hasStock.is(':checked')){
		$hasStockClass.show();
	}
}


$("body").on('change','#hasStock',function(){
   hasStockFunction();
});




//==========================================================================================


function hasStockManageFunction() {
	var $hasStock = $("body").find('#hasStockManage');
	var $hasStockClass = $("body").find('.hasStockManage');
	$hasStockClass.hide();
	if($hasStock.is(':checked')){
		$hasStockClass.show();
	}
}


$("body").on('change','#hasStockManage',function(){
   hasStockManageFunction();
});

//==========================================================================================
//==========================================================================================

$("body").on('click','#loadAllVariationOfProductBTN',function(e){
   e.preventDefault();
   var $url = $( this ).attr('data-route');
   var option = $("body").find('#loadAllVariationOfProduct');
   var val =  option.val();
          if(val != ''){
               option.find('option:selected').attr('disabled','true');
			   var $div =$("body").find('.loadAllVariationOfProduct');
			   getAllVariationDetailAjax($url,val,$div);
          	
          }

});

//==========================================================================================
//==========================================================================================



function getAllVariationDetailAjax($url,types,$divID) {
	 var variationType = $("body").find('#variationType').val();
	  $.ajax({
               url : $url,
               data : {
	                type:types,
	                variationType:variationType
               },
               type: 'GET',   
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
               },
               success: function (result) {
		          $divID.append(result);
		          defaultJs();
 
               } 

      });
}


//===================================================================
defaultJs();

function defaultJs() {
	 

$("body").find('.select2').select2();
// $this = $("body").find('form.saveVariationStockForm');
// validationRuleOfAttributes($this);
var $formVariationGeneralSetting = $("body").find('form#VariationGeneralSetting');

VariationGeneralSettingValidation($formVariationGeneralSetting);
//======================================================================================================

$("body").find('#inventoryFormSubmit').validate({
	    onfocusout: function (valueToBeTested) {
	      $(valueToBeTested).valid();
	    },
	  
	    highlight: function(element) {
	      $('element').removeClass("error");
	    },
       rules: {
		      "sku": {
		          required: true,
		          maxlength: 150
		      },
		       
		      "stock":{
		        required: function(){
		        	 if($("body").find('#hasStock').is(':checked')){
		        	 	return true;
		        	 }
		        }
		      },
		      "lowInStock":{
		        required: function(){
		        	 if($("body").find('#hasStock').is(':checked')){
		        	 	return true;
		        	 }
		        }
		      },
		      valueToBeTested: {
		          required: true,
              }
         } 
    
});
//======================================================================================================








}




//===================================================================================================
//===================================================================================================
//===================================================================================================



$("body").on('submit','.saveVariationStockForm',function(e){
  
   var $this = $(this);
   validationRuleOfAttributes($this);
   var $loader = $("body").find('.loader3');
   var $div =$("body").find('.loadAllVariationOfProduct');
   if($this.valid()){
    submitShopForm($this);
    // $.ajax({
    //            url : $this.attr('data-action'),
    //            data : $this.serialize(),
    //            type: 'POST',   
    //            dataTYPE:'JSON',
    //            headers: {
    //              'X-CSRF-TOKEN': $('input[name=_token]').val()
    //            },
    //            beforeSend: function() {
    //   		 			$loader.show();
    //   			   },   
    //            success: function (result) {
	   //             	 if(result.status == 1){

				//                     variationBoxToggle();
				//                     $loader.hide();

	   //               }else if(result.status == 0){

				//                     $this.find('.messages').html(result.messages);
	   //               	        $loader.hide();

	   //               }
                 
    //           } 
    //      });
   }
   return false;
});



function submitShopForm($this) {
 
     var url = $this.attr('data-action');
     var form = $this[0];
     var formData = new FormData(form);
     var percent = $('body').find('.percent');
     var bar = $('.bar');
     var $loader = $("body").find('.loader3');
     var $loader = $("body").find('.loader3');
     var $div =$("body").find('.loadAllVariationOfProduct');
 
       $.ajax({

           url:url,
           method:"POST",
           data:formData,
           dataType:'JSON',
           contentType: false,
           cache: false,
           headers: {
             'X-CSRF-TOKEN': $('input[name=_token]').val()
           },
           processData: false,
           beforeSend: function() {
            
                  $('body').find('.progress').show();
                  $('.progress').find('span.sr-only').text('0%');
                   
                  $this.find('.messageNotofications').html('');
                  $this.find('button.cstm-btn').attr('disabled','true');
                  $loader.show();

            },
             xhr: function () {
              var xhr = new window.XMLHttpRequest();
              xhr.upload.addEventListener("progress", function (evt) {
                  if (evt.lengthComputable) {
                      var percentComplete = evt.loaded / evt.total;
                      percentComplete = parseInt(percentComplete * 100);
                      $('.progress').find('span.sr-only').text(percentComplete + '%');
                      $('.progress .progress-bar').css('width', percentComplete + '%');
                  }
              }, false);
              return xhr;
            },
           success:function(result)
           {
                   if(result.status == 1){
                             variationBoxToggle();
                             $loader.hide();
                   }else if(result.status == 0){
                            $this.find('.messages').html(result.messages);
                            $loader.hide();
                   }
           }

          });
    
}



//===================================================================================================
//===================================================================================================
//===================================================================================================
var $formVariationGeneralSetting = $("body").find('form#VariationGeneralSetting');

VariationGeneralSettingValidation($formVariationGeneralSetting);

$("body").on('submit','form#VariationGeneralSetting',function(e){
  
   var $this = $(this);
 
   var $loader = $("body").find('.loader3');
   var $div =$("body").find('.loadAllVariationOfProduct');
   if($this.valid()){
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
				          alert(result.messages);
				          $loader.hide();
	                 }else if(result.status == 0){
				          alert(result.messages);
	                 	 $loader.hide();
	                 }
                 
              } 
         });
   }
   return false;
});



function VariationGeneralSettingValidation($this) {
	$this.validate({
	    onfocusout: function (valueToBeTested) {
	      $(valueToBeTested).valid();
	    },
	  
	    highlight: function(element) {
	      $('element').removeClass("error");
	    },
       rules: {

              "price": {
                number:true,
                required:true
              },
              "sale_price": {
                number:true,
                required:true,
                maxlength:function(){
                	      $val =$("body").find('form.saveVariationStockForm').find('input[name=price]').val();
                	   return $val;
                }
              },
              "height": {
                number:true,
                required:true,
              },
		      "width": {
                number:true,
                required:true,
              },
		      "length": {
                number:true,
                required:true,
              },
		      "weight": {
                number:true,
                required:true,
              },
		      
		      valueToBeTested: {
		          required: true,
              }
         } 
    
});
}





 
function validationRuleOfAttributes($this) {
	$this.validate({
	    onfocusout: function (valueToBeTested) {
	      $(valueToBeTested).valid();
	    },
	  
	    highlight: function(element) {
	      $('element').removeClass("error");
	    },
       rules: {

              "price": {
                number:true,
                required:true
              },
              "sale_price": {
                number:true,
                required:true,
                maxlength:function(){
                	      $val =$("body").find('form.saveVariationStockForm').find('input[name=price]').val();
                	   return $val;
                }
              },
              "stock_status": {
                number:true,
                required:true,
              },
		      "sku": {
		          required: function(){
		        	 if($("body").find('input[name=hasStockManage]').is(':checked')){
		        	 	return true;
		        	 }
		          },
		          maxlength:10,
		          // remote:{
		          // 	      url:function(){
		          // 	      	alert($(this).attr('data-url'));
		          // 	      },
            //               type:"get"
		          // }
		      },
		      "stock":{
		        required: function(){
		        	 if($("body").find('input[name=hasStockManage]').is(':checked')){
		        	 	return true;
		        	 }
		        }
		      },
		      "lowInStock":{
		        required: function(){
		        	 if($("body").find('input[name=hasStockManage]').is(':checked')){
		        	 	return true;
		        	 }
		        }
		      },
		      valueToBeTested: {
		          required: true,
              }
         } 
    
});
}



















});




























