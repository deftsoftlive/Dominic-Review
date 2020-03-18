$(function(){

   // deal Form
  $("body").find('#sendMessageFormToVendor').validate({
	    onfocusout: function (valueToBeTested) {
	      $(valueToBeTested).valid();
	    },
	  
	    highlight: function(element) {
	      $('element').removeClass("error");
	    },
       rules: {
		      "name": {
		          required: true,
		          maxlength: 150
		      },
		      "email":{
		        required: true
		      },
		      "start_date": {
		        required: function(element){
		         
		                    if($("body").find('input[name=request_for]').val() == 1){
		                        return true;
		                    }
		                    else{
		                        return true;
		                    }
		                },
		        minDate: true
		      },
		      "no_of_guest": {
		        required:function(element){
		         
		                    if($("body").find('input[name=request_for]').val() == 1){
		                        return true;
		                    }
		                    else{
		                        return true;
		                    }
		                },
		         number:true
		      },
		      "contact_type": {
		        required: true
		       },
		       'message_text': {
		           required: true,
		           maxlength: 300
		      },
		      valueToBeTested: {
		          required: true,
              }
         } 
       
   
    
});

//---------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------

 // deal Form
  function formValidationRuleManage() {
  $("body").find('#cstm-pkg-form').validate({
	    onfocusout: function (valueToBeTested) {
	      $(valueToBeTested).valid();
	    },
	  
	    highlight: function(element) {
	      $('element').removeClass("error");
	    },
       rules: {
		      "title": {
		          required: true,
		          maxlength: 150
		      },"event": {
		          required: true,
		          maxlength: 150
		      },
		      "min_person":{
		        required: true,
		        number:true
		      },
		      "max_person":{
		        required: true,
		        number:true
		      },
		      "price": {
		        required:true,
		        number: true
		      },
		      "games": {
		        required: true
		       },
		       "events": {
		        required: true
		       },
		       'amitity': {
		           required: true,
		       },
		      valueToBeTested: {
		          required: true,
              }
         } 
       });
  }
//---------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------

formValidationRuleManage();

function showHideFieldAccordingToRequestType($this) {
	 
	 var val = parseInt($this.val());

	 if(val == 1){
	 	$("body").find('#request_for').show();
	 }else{
	 	$("body").find('#request_for').hide();
	 }
}




//---------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------




$("body").on('click change','.requestFor',function(){
    showHideFieldAccordingToRequestType($(this));
});



//---------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------




    var $url = $("body").find('#getUserUpcomingEvent').val();
$("body").on('submit','#sendMessageFormToVendor',function(e){
    e.preventDefault();
    var val = parseInt($("body").find('input[name=request_for]').val());
    var $logged = jQuery("body").find('#dataLogged').val(1);
    var $this = $(this);
    if($logged == 1 && val == 1){
    	submitMessageRequestForm($this,$url,$this.serialize());
    }else{
        submitMessageRequestForm($this,$url,$this.serialize());
    }
});


//---------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------


// function createCustomPackageFunction($this) {

// 	var $url = $("body").find('#getUserUpcomingEvent').val();
//     $.ajax({
//                url : $url,
//                type: 'GET',   
//                dataTYPE:'JSON',
//                headers: {
//                  'X-CSRF-TOKEN': $('input[name=_token]').val()
//                },
//                 beforeSend: function() {
//                        $("body").find('.custom-loading').show();
//                  },
//                 success: function (result) {

//                          var $modal = $("body").find('#CstmPackage');
//                          $modal.find('.modal-body').html(result.htm);
// 	                     $modal.modal({backdrop: 'static', keyboard: false});

//                  },
//                 complete: function() {
//                         $("body").find('.custom-loading').hide();
//                 },
//                 error: function (jqXhr, textStatus, errorMessage) {
                     
//                 }

//       });

// }



//---------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------




function submitMessageRequestForm($this,$url,$data) {
	  
     $.ajax({
               url : $url,
               data : $data,
               type: 'POST',   
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
               },
                beforeSend: function() {
                    $this.find('button.cstm-btn').attr('disabled','true');
                     $("body").find('.custom-loading').show();
                },
                success: function (result) {
                   if(result.status == 1){
                		    $this.find('button.cstm-btn').removeAttr('disabled');
                            $this[0].reset();
                            $("body").find('#sendMessageFormToVendor')[0].reset();
                            $("body").find('#cstm-pkg-form')[0].reset();
                             var $modal = $("body").find('#CstmPackage');
                             $modal.find('.modal-body').html(ErrorMsg('success',result.message));
                             $this.find('.messageNotofications').html(ErrorMsg('success',result.message));
                             $("body").find('.custom-loading').hide();
                            setTimeout(function () {
                                 $this.find('.messageNotofications').html('');
                                 $("body").find('#CstmPackage').modal('hide');
                                 window.location.href = result.url;
                            },2000);
 
                    }else if(result.status == 2){
                		   
                           $("body").find('#LoginModel').modal({backdrop: 'static', keyboard: false});
                           $this.find('button.cstm-btn').removeAttr('disabled');

                           $this.find('.messageNotofications').html(ErrorMsg('warning',result.message));
                            $("body").find('.custom-loading').hide();
                            setTimeout(function () {
                                 $this.find('.messageNotofications').html('');
                            },3000);
                         
                       
                    }else if(result.status == 4){
                		   
                         var $modal = $("body").find('#CstmPackage');
                         $modal.find('.modal-body').html(result.htm);
	                     $modal.modal({backdrop: 'static', keyboard: false});
	                      $("body").find('.custom-loading').hide();
	                      $this.find('button.cstm-btn').removeAttr('disabled');
                         
                       
                    }else{
                        $this.find('.messageNotofications').html(ErrorMsg('warning',result.message));
                         $("body").find('.custom-loading').hide();
                        $this.find('button.cstm-btn').removeAttr('disabled');
                    }
                 },
                complete: function() {
                        $("body").find('.custom-loading').hide();
                },
                error: function (jqXhr, textStatus, errorMessage) {
                     
                }

      });
}


 
 $('#CstmPackage').on('hidden.bs.modal', function () {
    $('#sendMessageFormToVendor').find('button.cstm-btn').removeAttr('disabled');
});



/*----------------------------------------------------------------------------
|
|   Business filter
|_____________________________________________________________________________
*/


$("body").on('submit','#cstm-pkg-form',function(e){
	e.preventDefault();
		var $this = $(this);
        formValidationRuleManage();
	if($(this).valid()){
submitMessageRequestForm($this,$url,$this.serialize());
	}
});

 

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


});

































