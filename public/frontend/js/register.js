$(document).ready(function(){
//Adding-Validations-On-Sign-Up-Form
$('#registerForm').validate({
onfocusout: function (valueToBeTested) {
  $(valueToBeTested).valid();
},

highlight: function(element) {
  $('element').removeClass("error");
},

rules: {
  
  "first_name": {
      required: true,
      character_with_space: true,
      maxlength: 50, 
  },
   "last_name": {
      required: true,
      character_with_space: true,
      maxlength: 50, 
  },
  'email': {
      required: true,
      customemail: true,
  },
  'password': {
      required: true,
      minlength: 6,
      maxlength: 12,
  },
  'password_confirmation': {
      equalTo: "#password",
      minlength: 6,
      maxlength: 12,
  },

  valueToBeTested: {
      required: true,
  }

},
});

$('#loginForm').validate({
onfocusout: function (valueToBeTested) {
  $(valueToBeTested).valid();
},

highlight: function(element) {
  $('element').removeClass("error");
},

rules: {
  

  'email': {
      required: true,
      customemail: true,
  },
  'password': {
      required: true,
      minlength: 6,
      maxlength: 12,
  },

  valueToBeTested: {
      required: true,
  }

},
});   

//Submisson-Form
$('#registerForm').on('submit',function(e){
   e.preventDefault();

  if($('#registerForm').valid()){
     register($(this));
  }

});


//Submisson-Form
$('#registerVendorForm').on('submit',function(e){
   e.preventDefault();

  if($('#registerVendorForm').valid()){
     registerVendorForm();
  }

});






$('#registerVendorForm').validate({
onfocusout: function (valueToBeTested) {
  $(valueToBeTested).valid();
},

highlight: function(element) {
  $('element').removeClass("error");
},

rules: {
  
  "first_name": {
      required: true,
      character_with_space: true,
      maxlength: 50, 
  },
   "last_name": {
      required: true,
      character_with_space: true,
      maxlength: 50, 
  },
  'business_type': {
      required: true      
  },
  'email': {
      required: true,
      customemail: true,
  },
  'reference_business_name': {
      required: true
      
  },
  'reference_email': {
      required: true,
      customemail: true,
  },
  'reference_contact_number': {
       required: true,
       number: true,
  },
  'business_address': {
         required: true
         
    },

  'location': {
      required: true,
       
  },

  'website_url': {
      
      url: true,
  },

  'phone_number': {
      required: true,
      number: true,
  },

  'ein_bs_number': {
      required: true,
      
  },
  'age': {
      required: true,
      minAge: 18
  },
  'id_proof': {
      required: true,
      
  },
  'categories': {
      required: true,
      
  },
  'password': {
      required: true,
      minlength: 6,
      maxlength: 12,
  },
  'password_confirmation': {
      equalTo: "#password",
      minlength: 6,
      maxlength: 12,
  },
  "agree": {
    required: true
  },

  valueToBeTested: {
      required: true,
  }

},
});





//Submisson-Form
$('#loginForm').on('submit',function(e){
   e.preventDefault();

  if($('#loginForm').valid()){
     login($(this));
  }

});



/// register function

function login($this) {
            $.ajax({
               url : $this.attr('action'),
               data : $this.serialize(),
               type: 'POST',  // http method
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
               },
                beforeSend: function() {
                    $this.find('.loading').show();
                    $this.find('button.cstm-btn').attr('disabled','true');
                     $("body").find('.custom-loading').show();
                },

               success: function (data) {
                      if(parseInt(data.status) == 1){
                           $this[0].reset();

                           $this.find('.messages').html(ErrorMsg('success',data.message));

                            setTimeout(function () {
                              window.location.href = data.redirectLink;
                              return true;
                             },3000);

                      }else if(parseInt(data.status) == 2){

                        $this.find('.loading').hide();
                        $this.find('button.cstm-btn').removeAttr('disabled');
                        $this.find('.messages').html(ErrorMsg('success',data.message));
                         $("body").find('.custom-loading').hide();

                        setTimeout(function () {
                                 $this.find('.messages').html('');
                        },3000);
                         
                      }else{

                        $this.find('.loading').hide();
                         $("body").find('.custom-loading').hide();
                        $this.find('button.cstm-btn').removeAttr('disabled');
                        $this.find('.messages').html(erorrMessage(data.errors));

                        setTimeout(function () {
                                 $this.find('.messages').html('');
                        },3000);
                         
                      }
                    
               },
               complete: function() {
                        $this.find('.loading').hide();
                        // $("body").find('.custom-loading').hide();
                        $this.find('button.cstm-btn').removeAttr('disabled');
               },
               error: function (jqXhr, textStatus, errorMessage) {
                     alert('error');
               }

        });

           return false;
}










function registerVendorForm() {
    var $this = $('body').find('#registerVendorForm');
    var form = $('body').find('#registerVendorForm')[0]; // You need to use standard javascript object here
        var formData = new FormData(form);
        var percent = $('body').find('.percent');
        var bar = $('.bar');

 

         $.ajax({

           url:$this.attr('action'),
           method:"POST",
           data:formData,
           dataType:'JSON',
           contentType: false,
           cache: false,
           processData: false,
           beforeSend: function() {
                    $this.find('.loading').show();
                    $("body").find('.custom-loading').show();
                    $this.find('button.cstm-btn').attr('disabled','true');
                    $('.progress').find('span.sr-only').text('0%');

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
                    if(parseInt(data.status) == 1){
                           $this[0].reset();

                           $this.find('.messages').html(ErrorMsg('success',data.message));
                           $this.find('button.cstm-btn').removeAttr('disabled');
                            $("body").find('.custom-loading').hide();
                            setTimeout(function () {
                                 $this.find('.messages').html('');
                            },8000);

                      }else if(parseInt(data.status) == 8){
                           $this[0].reset();

                           //$this.find('.messages').html(ErrorMsg('success',data.message));
                           //$this.find('button.cstm-btn').removeAttr('disabled');
                            setTimeout(function () {
                                 window.location.href = data.redirectLink;
                                 return true;
                            },1000);
                            $("body").find('.custom-loading').hide();

                      }else{

                        $this.find('.loading').hide();
                         $("body").find('.custom-loading').hide();
                        $this.find('button.cstm-btn').removeAttr('disabled');
                        $this.find('.messages').html(erorrMessage(data.errors));

                        setTimeout(function () {
                                 $this.find('.messages').html('');
                        },8000);
                         
                      }
           }

          });
}


/// register function

function register($this) {
  

            $.ajax({
               url : $this.attr('action'),
               data : $this.serialize(),
               type: 'POST',  // http method
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
               },
                beforeSend: function() {
                    $this.find('.loading').show();
                    $("body").find('.custom-loading').show();
                    $this.find('button.cstm-btn').attr('disabled','true');
                },

               success: function (data) {
                      if(parseInt(data.status) == 1){
                           $this[0].reset();

                           $this.find('.messages').html(ErrorMsg('success',data.message));

                            setTimeout(function () {
                                 $this.find('.messages').html('');
                            },8000);

                      }else{

                        $this.find('.loading').hide();
                         $("body").find('.custom-loading').hide();
                        $this.find('button.cstm-btn').removeAttr('disabled');
                        $this.find('.messages').html(erorrMessage(data.errors));

                        setTimeout(function () {
                                 $this.find('.messages').html('');
                        },8000);
                         
                      }
                    
               },
               complete: function() {
                        $this.find('.loading').hide();
                         $("body").find('.custom-loading').hide();
                        $this.find('button.cstm-btn').removeAttr('disabled');
               },
               error: function (jqXhr, textStatus, errorMessage) {
                     alert('error');
               }

        });

           return false;
}



   function ErrorMsg(type,message){

      var txt='';
          txt +='<div class="alert alert-'+type+'" role="alert">';
      txt +=message;
      txt +='</div>';
    return txt;
  }



function erorrMessage(errors) {
 


      var txt ="";
      $.each(errors, function( index, value ) {
        txt += ErrorMsg('warning',value);
          //  txt +='<li>'+ value +'</li>';
      });
     /// txt +='</ul>';

      return txt;
}


// Validators Rules

//Only-Character-Add-Method
  $.validator.addMethod("character_with_space", function (value, element) {
  return this.optional(element) || /^[a-zA-Z .]+$/i.test(value);
  }, "Only letters are allowed.");

  //Email-Add-Method
  $.validator.addMethod("customemail", function (value, element) {
    return this.optional(element) || /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value);
  }, "Please enter a valid email address.");  

  //Email-Add-Method
  $.validator.addMethod("customURL", function (value, element) {
    return this.optional(element) || /(^|\s)((https?:\/\/)?[\w-]+(\.[\w-]+)+\.?(:\d+)?(\/\S*)?)/.test(value);
  }, "Please enter a valid URL or delete the http:// above to continue.");  

  //Alphanumeric-Add-Method
  $.validator.addMethod("alphanumeric", function (value, element) {
    return this.optional(element) || /^[a-z\d\-_\s]+$/i.test(value);
  }, "Please enter alpha-numeric characters only.");   

  //Alphanumeric-Special-Character-Add-Method
  $.validator.addMethod("alphanumeric_special_character", function (value, element) {
    return this.optional(element) || /^[a-zA-Z0-9?=.*!@#$%^',&*_\-\s]+$/i.test(value);
  }, "Please enter alpha-numeric or special characters only.");  


  $.validator.addMethod("phoneUS", function (value, element) {
  return this.optional(element) || value == value.match(/^(?=.*[0-9])[- +()0-9]+$/);
}, "Please specify a valid phone number.");    




});
