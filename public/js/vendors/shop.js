$(function(){

 
 

var $checkAvailabilty = $("body").find('#checkAvailabilty').val();
$("body").find('#shopCreate').validate({
             ignore: [],
		    onfocusout: function (valueToBeTested) {
		      $(valueToBeTested).valid();
		    },
		  
		    highlight: function(element) {
		      $('element').removeClass("error");
		    },

		    errorPlacement: function(error, element) {
		      if (element.attr("name") == "address") {
		        error.insertAfter("#cke_address");
		      } else {
		         error.insertAfter(element);
		      }
		    },
  
		    rules: {
		      "shop_name": { 
		          required: true,
		          alphanumeric: true,
		          maxlength: 30,
		          remote:{
		          	       url:$checkAvailabilty,
		          	       type:"POST"
		          }
		      },
		      logo:{
		      	required: true
		      },
		      valueToBeTested: {
		          required: true,
		      }
		    } 
 });   
  
     




//--------------------------------------------------------------------------------
//--------------------------------------------------------------------------------
//--------------------------------------------------------------------------------


$("body").on('submit','#shopCreate',function(e){
    e.preventDefault();
    if($(this).valid()){
    	submitShopForm($(this));
    }
});




//--------------------------------------------------------------------------------
//--------------------------------------------------------------------------------
//--------------------------------------------------------------------------------



function submitShopForm($this) {
 
     var url = $this.attr('action');
     var form = $this[0];
	   var formData = new FormData(form);
	   var percent = $('body').find('.percent');
	   var bar = $('.bar');
 
       $.ajax({

           url:url,
           method:"POST",
           data:formData,
           dataType:'JSON',
           contentType: false,
           cache: false,
           processData: false,
           beforeSend: function() {
            
                 $('body').find('.progress').show();
                 $('.progress').find('span.sr-only').text('0%');
                 $("body").find('.custom-loading').show();
	                $this.find('.messageNotofications').html('');
	                $this.find('button.cstm-btn').attr('disabled','true');

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
           success:function(data)
           {
            $('#globalMessages').html('');
            console.log(data.html);
              if(data.status == 1){
                    $('body').find('.progress').hide();
                    $('.progress').find('span.sr-only').text('0%');
                    $('.progress .progress-bar').css('width','0%');
                    //form.reset();
                    window.location.href = data.redirect;
              }else{
                   $('body').find('.progress').hide();
                   $('.progress').find('span.sr-only').text('0%');
                   $('.progress .progress-bar').css('width','0%');
                   $("body").find('.custom-loading').hide();
                   $('body').find('#globalMessages').css('display', 'block');
                   $('#globalMessages').html(data.messages);
                   $this.find('button.cstm-btn').attr('disabled','false');
             }

           }

          });
    
}



 




//--------------------------------------------------------------------------------
//--------------------------------------------------------------------------------
//--------------------------------------------------------------------------------
 

});


 






























