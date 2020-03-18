$(function(){

var $getPackageBox = $('#getPackageBox').val();
var $getCompareInformation = $('#getCompareInformation').val();


function getAllPackageIds() {
	
	var $this = $("body").find('.comparePackages:checked');
   var arr =[];
   $this.each(function(){
         
         arr.push($(this).val());
   });
    console.log(arr);
   return arr;

}



$("body").on('change','.comparePackages',function(){
	 var $div = $("body").find('#com_pack_headings');
     getDataWithRequest($getPackageBox,$div);
});




function getDataWithRequest(url,$div,type=0) {
	
	      $.ajax({
               url : url,
               data : {
               	categories : getAllPackageIds(),
               	type:type
               },
               type: 'POST',   
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
               },
                beforeSend: function() {
                    $("body").find('.custom-loading').show();
                     // $this.find('.messageNotofications').html('');
                     // $this.find('button.cstm-btn').attr('disabled','true');

                },
                success: function (result) {
                       if(parseInt(result.status) == 1){
                          if(type == 0){
                          	$("body").find('#com_pack_headings').html(result.htm);
                          }else{
                             $div.find('.modal-body').html(result.htm);
                             $div.modal('show');
                          } 

                        } 
               },
               complete: function() {
                        $("body").find('.custom-loading').hide();
               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

        });

}





$("body").on('click','.remove_fields',function(e){
	e.preventDefault();
   var $id = $(this).attr('data-pack');
   console.log($id);
   $("body").find($id).prop('checked',false);
    getDataWithRequest($getPackageBox);
});






$("body").on('click','#open_com_modal',function(e){
 e.preventDefault();
 var $div = $("body").find('#compModal');
 
 getDataWithRequest($getPackageBox,$div,1);

});




// end of function
});