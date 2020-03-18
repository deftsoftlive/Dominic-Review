//##################################################################################################





  $("body").on('click','.categoryAssign',function(e){
        e.preventDefault();
          var $modal = $("body").find('#myModal');
         $modal.modal({backdrop: 'static', keyboard: false});
  });

  $('#myModal').on('hidden.bs.modal', function (e) {

    if(parseInt($("body").find('#cateCheck').val()) == 0){
        $("body").find('.custom-loading').show();
        window.location.reload();
      
    }
 });













$("body").find('#productCategories').validate({
	    onfocusout: function (valueToBeTested) {
	      $(valueToBeTested).valid();
	    },
	  
	    highlight: function(element) {
	      $('element').removeClass("error");
	    },
       rules: {
		      "category_id": {
		          required: true,
		          maxlength: 150
		      },
		      "subcategory_id":{
		        required: true
		      },
		      "childcategory_id":{
		        required: true
		      },
		      valueToBeTested: {
		          required: true,
              }
         } 
    
});


//##################################################################################################################




$("body").on('change','select[name=category_id]',function(){
  var val = $( this ).val();
  var $url = $("body").find('#categoryAjaxRoute').val();
  var $divID = $("#subCategory");
  ajaxCustomCategories($url,val,0,$divID);

});

$("body").on('change','select[name=subcategory_id]',function(){
	  var val = $( this ).val();
	  var $url = $("body").find('#categoryAjaxRoute').val();
	  var $divID = $("#childCategory");
	  ajaxCustomCategories($url,0,val,$divID);

});

 



function ajaxCustomCategories($url,parent,subparent,$divID) {
	  $.ajax({
               url : $url,
               data : {
	               
	               	parent:parent,
	               	subparent:subparent
               },
               type: 'GET',   
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
               },
               success: function (result) {
		          $divID.html(result);
               } 

      });
}





//##################################################################################################################
$("body").on('submit','#productCategories',function(e){
   e.preventDefault();
   var $this = $( this );
    $.ajax({
               url : $this.attr('action'),
               data : $this.serialize(),
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
		                             window.location.reload();
		                    }else{
		                          $("body").find('.custom-loading').hide();
		                          alert('error');
		                    }
                 },
                complete: function() {
                        $("body").find('.custom-loading').hide();
                },
                error: function (jqXhr, textStatus, errorMessage) {
                     
                }

      });

});



//##################################################################################################
