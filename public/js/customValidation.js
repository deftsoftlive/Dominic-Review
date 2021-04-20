$base_url = $("#base_url").val();

$(document).ready(function (){

  // letters only 
  $.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[a-z ]+$/i.test(value);
  }, "Please enter letters only");

  $.validator.addMethod("letterdigitsonly", function(value, element) {
    return this.optional(element) || /^[a-zA-Z0-9_.-]*$/i.test(value);
  }, "Please enter alphabets and digits only");

  // Custom Email
  $.validator.addMethod("customemail", 
  function(value, element) {
       return /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(value);
      
  },'Please enter a valid email.');


  // Custom Email
  $.validator.addMethod("phonenumber", 
  function(value, element) {
       return /^[0-9 ]+$/.test(value);
      
  },'Please enter a valid phone number.');

 $.validator.addMethod("checkstrongpassword",function(value, element) {
    
  var strength = 1;
  var arr = [/.{5,}/, /[a-z]+/, /[0-9]+/, /[A-Z]+/];
  jQuery.map(arr, function(regexp) {
    if(value.match(regexp))
     strength++;
  });
  if(strength>=5){
    return true;
  }
    return false;
   },'Password must contain 1 Capital letter,1 Small letter,1 Special Character & 1 Numeric Character.'); 

  $.validator.addMethod("noSpace", function (value, element) {
    return value == '' || value.trim().length != 0;
  }, "Space not allowed."); 


   /*validation for the register form*/
     $('#register').validate({

      rules: {

      first_name: {
          required: true,
          maxlength:25,
          noSpace: true
      },
      last_name: {
          required: true,
          maxlength:25,
          noSpace: true
      },
      gender: {
          required: true,      
      },
      date_of_birth: {
          required: true,
      },
      address: {
        required: true,
        noSpace: true,
        maxlength: 255,
      }, 
      town: {
        required: true,
        maxlength: 40,
        noSpace: true,
        lettersonly:true
      },
      postcode: {
        required: true,
        noSpace: true,
        maxlength: 10
      },
      county: {
        required: true,
        maxlength: 30,
        noSpace: true,
        lettersonly:true
      },
      country: {
        required: true,
        maxlength: 30
      },
      phone_number: {
          required: true,
          phonenumber: true,
          minlength: 7,
          maxlength: 15,
      },
      email: { 
          required: true,
          customemail:true,
      },
      password: {
          required: true,
          minlength:8,
          maxlength:25,
          checkstrongpassword:true,
      }, 
      password_confirmation: {
          required: true,
          minlength:8,
          checkstrongpassword:true,
          equalTo:"#password",
          maxlength:25,
      },
      },

    messages:{
      phone:{maxlength:"Maximum character limit reached."},
      phone:{minlength:"Required, Minimum 7 characters"},
      name:{required:"This field is required."},
      lastname:{required:"This field is required."},

      email:{required:"This field is required.",email:"Please enter a valid email address."},
  
      password:{required:"This field is required."},
      password_confirmation:{
        required:"This field is required.",
        equalTo:"Password should be same."

        }

    },

    highlight: function (element, errorClass, validClass) {

      if(element.type =='text'||element.type =='password'||element.type =='email'||element.type =='select-one'||element.type == 'tel') {
          $(element).siblings("label").addClass("error");
          $(element).addClass('input--error').removeClass(validClass+' input--success');
          $(element).closest('.myForm').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        // this.findByName(element.name).removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $(element).closest('.myForm').find('i.fa').remove();
        $(element).closest('.myForm').append('<i class="fa fa-exclamation fa-lg form-control-feedback"></i>');
      }else if(element.type == 'checkbox'){
          $("input#checkbox1").after('<span class="checkmark"></span>');
      }
    },
    unhighlight: function (element, errorClass, validClass) {
      if (element.type === "text"||element.type =='password' ||element.type =='email'||element.type =='select-one'||element.type == 'tel') {
          $(element).siblings("label").removeClass("error");
          $('.errorMsg').addClass('displaynone');
          $(element).closest('.myForm').removeClass('has-error has-feedback').addClass('has-success has-feedback');
          $(element).removeClass('input--error').addClass(validClass+' input--success');
          $(element).closest('.myForm').find('i.fa').remove();
          $(element).closest('.myForm').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
      } 
    },

    errorElement : 'div',
      errorPlacement: function(error, element) {
       // $(element).next().remove();
          var placement = $(element).data('error');
          var placement1 = element.attr('name');

          if (placement) {
            $(placement).append(error)
          }else if(placement1=="gender"){
              error.insertAfter("#select_gender");
          }else {
            error.insertAfter(element);
          }
        },

      submitHandler: function(form) {        
        $("#disable_register_btnn").attr("disabled", true);
        form.submit();
      }

  });

    /*validation for the login form*/
        $('#loginForm').validate({
           rules: {
           email: {
                required: true,
                customemail:true
              
            }, password: {
                required: true,
            
                
            }
        },
        messages:{
            email:{required:"This field is required."},
            password:{required:"This field is required."},
            
        },
        highlight: function (element, errorClass, validClass) {

      if(element.type =='text'||element.type =='password'||element.type =='email'||element.type =='select-one') {
          $(element).siblings("label").addClass("error");
          $(element).addClass('input--error').removeClass(validClass+' input--success');
          $(element).closest('.myForm').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        // this.findByName(element.name).removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $(element).closest('.myForm').find('i.fa').remove();
        $(element).closest('.myForm').append('<i class="fa fa-exclamation fa-lg form-control-feedback"></i>');
      }
    },
    unhighlight: function (element, errorClass, validClass) {
      if (element.type === "text"||element.type =='password' ||element.type =='email'||element.type =='select-one') {
          $(element).siblings("label").removeClass("error");
          $('.errorMsg').addClass('displaynone');
          $(element).closest('.myForm').removeClass('has-error has-feedback').addClass('has-success has-feedback');
          $(element).removeClass('input--error').addClass(validClass+' input--success');
          $(element).closest('.myForm').find('i.fa').remove();
          $(element).closest('.myForm').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
      } 
    },
       
      submitHandler: function(form) {
        $("#disable_login_btnn").attr("disabled", true);
        form.submit();
    }
  });

  $('#email').change(function(){   
      $('.invalid-feedback').css('display','none');
  });

     /*validation for the reset form*/
     $('#passwordresetForm').validate({

       rules: {
          password: {
            required: true,
            minlength:8,
            maxlength:25,
            checkstrongpassword:true,
             // regex:/^(?=.*[A-Z])(?=.*\d).+$/
          }, 
          password_confirmation: {
            required: true,
            minlength:6,
            checkstrongpassword:true,
            equalTo:"#password",
            maxlength:25,
          },       
        },

        highlight: function (element, errorClass, validClass) {

          if(element.type =='text'||element.type =='password'||element.type =='email'||element.type =='select-one') {
              $(element).siblings("label").addClass("error");
              $(element).addClass('input--error').removeClass(validClass+' input--success');          
          }
        },
        unhighlight: function (element, errorClass, validClass) {
          if (element.type === "text"||element.type =='password' ||element.type =='email'||element.type =='select-one') {
              $(element).siblings("label").removeClass("error");
              $('.errorMsg').addClass('displaynone');          
              $(element).removeClass('input--error').addClass(validClass+' input--success');
          } 
        },
      submitHandler: function(form) {        
        $("#disable_reset_password_btnn").attr("disabled", true);
        form.submit();
      }

  });


    /*validation for the contact form*/
     $('#contact_form').validate({

      rules: {

      participant_name: {
          required: true,
          maxlength:25,
          noSpace: true,
          // lettersonly:true,
      },
      participant_dob: {
          required: true,
      },
      participant_gender: {
          required: true,
      },
      parent_name: {
          required: true,
          maxlength:25,
          noSpace: true,
          // lettersonly:true,
      },
      parent_email: { 
          required: true,
          customemail:true,
      },
      parent_telephone: {
          required: true,
          digits: true,
          minlength: 7,
          maxlength: 15,
      },
      class: {
        required: true,
        noSpace: true,
        maxlength: 30
      },
      message: {
        required: true,
      }
    },

    messages:{
      parent_telephone:{maxlength:"Maximum character limit reached."},
      parent_telephone:{minlength:"Required, Minimum 7 characters"},
      participant_name:{required:"This field is required."},
      parent_name:{required:"This field is required."},

      parent_email:{required:"This field is required.",email:"Please enter a valid email address."},
  
    },

    highlight: function (element, errorClass, validClass) {

      if(element.type =='text'||element.type =='password'||element.type =='email'||element.type =='select-one'||element.type == 'tel') {
          $(element).siblings("label").addClass("error");
          $(element).addClass('input--error').removeClass(validClass+' input--success');
          $(element).closest('.myForm').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        // this.findByName(element.name).removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $(element).closest('.myForm').find('i.fa').remove();
        $(element).closest('.myForm').append('<i class="fa fa-exclamation fa-lg form-control-feedback"></i>');
      }else if(element.type == 'checkbox'){
          $("input#checkbox1").after('<span class="checkmark"></span>');
      }
    },
    unhighlight: function (element, errorClass, validClass) {
      if (element.type === "text"||element.type =='password' ||element.type =='email'||element.type =='select-one'||element.type == 'tel') {
          $(element).siblings("label").removeClass("error");
          $('.errorMsg').addClass('displaynone');
          $(element).closest('.myForm').removeClass('has-error has-feedback').addClass('has-success has-feedback');
          $(element).removeClass('input--error').addClass(validClass+' input--success');
          $(element).closest('.myForm').find('i.fa').remove();
          $(element).closest('.myForm').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
      } 
    },

      submitHandler: function(form) {        
        var check = checkRecaptcha();
        // alert( check );
        if ( check == true ) {
        $(".disable_contact_us_btnn").attr("disabled", true);
          form.submit();

        }
      }

  });
     
    /*validation for booking table*/
        $('#camp_booking_table').validate({
           rules: {
           child_id: {
                required: true
              
            }
        },
        messages:{
            child_id:{required:"This field is required."},
            
        },
        highlight: function (element, errorClass, validClass) {

      if(element.type =='text'||element.type =='password'||element.type =='email'||element.type =='select-one') {
          $(element).siblings("label").addClass("error");
          $(element).addClass('input--error').removeClass(validClass+' input--success');
          $(element).closest('.myForm').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        // this.findByName(element.name).removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $(element).closest('.myForm').find('i.fa').remove();
        $(element).closest('.myForm').append('<i class="fa fa-exclamation fa-lg form-control-feedback"></i>');
      }
    },
    unhighlight: function (element, errorClass, validClass) {
      if (element.type === "text"||element.type =='password' ||element.type =='email'||element.type =='select-one') {
          $(element).siblings("label").removeClass("error");
          $('.errorMsg').addClass('displaynone');
          $(element).closest('.myForm').removeClass('has-error has-feedback').addClass('has-success has-feedback');
          $(element).removeClass('input--error').addClass(validClass+' input--success');
          $(element).closest('.myForm').find('i.fa').remove();
          $(element).closest('.myForm').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
      } 
    },
       
      submitHandler: function(form) {
        $("#submit-booking").attr("disabled", true);
        form.submit();
    }
  });


  /*validation for booking table*/
  $('#newsletter').validate({
     rules: {
     email: {
          required: true,
          customemail:true
        
      }
  },
  messages:{
      email:{required:"This field is required."},
      
  },
  highlight: function (element, errorClass, validClass) {

      if(element.type =='text'||element.type =='password'||element.type =='email'||element.type =='select-one') {
          $(element).siblings("label").addClass("error");
          $(element).addClass('input--error').removeClass(validClass+' input--success');
          $(element).closest('.myForm').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        // this.findByName(element.name).removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $(element).closest('.myForm').find('i.fa').remove();
        $(element).closest('.myForm').append('<i class="fa fa-exclamation fa-lg form-control-feedback"></i>');
      }
    },
    unhighlight: function (element, errorClass, validClass) {
      if (element.type === "text"||element.type =='password' ||element.type =='email'||element.type =='select-one') {
          $(element).siblings("label").removeClass("error");
          $('.errorMsg').addClass('displaynone');
          $(element).closest('.myForm').removeClass('has-error has-feedback').addClass('has-success has-feedback');
          $(element).removeClass('input--error').addClass(validClass+' input--success');
          $(element).closest('.myForm').find('i.fa').remove();
          $(element).closest('.myForm').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
      } 
    },
       
      submitHandler: function(form) {
        $("#submit-newsletter").attr("disabled", true);
        form.submit();
    }
  });


  /*validation for booking table*/
  $('#wallet').validate({
           rules: {
           money_amount: {
                required: true,     
                //digits: true,
            }
        },
        messages:{
            money_amount:{required:"This field is required."},      
        },

        highlight: function (element, errorClass, validClass) {

          if(element.type =='text'||element.type =='password'||element.type =='email'||element.type =='select-one') {
              $(element).siblings("label").addClass("error");
              $(element).addClass('input--error').removeClass(validClass+' input--success');
              $(element).closest('.myForm').removeClass('has-success has-feedback').addClass('has-error has-feedback');
            // this.findByName(element.name).removeClass('has-success has-feedback').addClass('has-error has-feedback');
            $(element).closest('.myForm').find('i.fa').remove();
            $(element).closest('.myForm').append('<i class="fa fa-exclamation fa-lg form-control-feedback"></i>');
          }
        },
        unhighlight: function (element, errorClass, validClass) {
          if (element.type === "text"||element.type =='password' ||element.type =='email'||element.type =='select-one') {
              $(element).siblings("label").removeClass("error");
              $('.errorMsg').addClass('displaynone');
              $(element).closest('.myForm').removeClass('has-error has-feedback').addClass('has-success has-feedback');
              $(element).removeClass('input--error').addClass(validClass+' input--success');
              $(element).closest('.myForm').find('i.fa').remove();
              $(element).closest('.myForm').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
          } 
        },
       
      submitHandler: function(form) {
        $("#add_money_btn").attr("disabled", true);
        form.submit();
    }
  });

  /*validation for booking table*/
  $('#request-coach').validate({
           rules: {
           child: {
                required: true 
            }
        },
        messages:{
            child:{required:"This field is required."},
            
        },
        highlight: function (element, errorClass, validClass) {

      if(element.type =='text'||element.type =='password'||element.type =='email'||element.type =='select-one') {
          $(element).siblings("label").addClass("error");
          $(element).addClass('input--error').removeClass(validClass+' input--success');
          $(element).closest('.myForm').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        // this.findByName(element.name).removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $(element).closest('.myForm').find('i.fa').remove();
        $(element).closest('.myForm').append('<i class="fa fa-exclamation fa-lg form-control-feedback"></i>');
      }
    },
    unhighlight: function (element, errorClass, validClass) {
      if (element.type === "text"||element.type =='password' ||element.type =='email'||element.type =='select-one') {
          $(element).siblings("label").removeClass("error");
          $('.errorMsg').addClass('displaynone');
          $(element).closest('.myForm').removeClass('has-error has-feedback').addClass('has-success has-feedback');
          $(element).removeClass('input--error').addClass(validClass+' input--success');
          $(element).closest('.myForm').find('i.fa').remove();
          $(element).closest('.myForm').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
      } 
    },
       
      submitHandler: function(form) {
        $("#coach-link").attr("disabled", true);
        form.submit();
    }
  });

  /*validation for booking table*/
  $('#reject_request').validate({
           rules: {
           reason_of_rejection: {
                required: true,
                maxlength:255,
                noSpace: true
            },
        },
        messages:{
            reason_of_rejection:{required:"This field is required."},
            
        },

    highlight: function (element, errorClass, validClass) {

      if(element.type =='text'||element.type =='password'||element.type =='email'||element.type =='select-one') {
          $(element).siblings("label").addClass("error");
          $(element).addClass('input--error').removeClass(validClass+' input--success');
          $(element).closest('.myForm').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        // this.findByName(element.name).removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $(element).closest('.myForm').find('i.fa').remove();
        $(element).closest('.myForm').append('<i class="fa fa-exclamation fa-lg form-control-feedback"></i>');
      }
    },
    unhighlight: function (element, errorClass, validClass) {
      if (element.type === "text"||element.type =='password' ||element.type =='email'||element.type =='select-one') {
          $(element).siblings("label").removeClass("error");
          $('.errorMsg').addClass('displaynone');
          $(element).closest('.myForm').removeClass('has-error has-feedback').addClass('has-success has-feedback');
          $(element).removeClass('input--error').addClass(validClass+' input--success');
          $(element).closest('.myForm').find('i.fa').remove();
          $(element).closest('.myForm').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
      } 
    },
       
      submitHandler: function(form) {
        $("#rej_req").attr("disabled", true);
        form.submit();
    }
  });

  /*validation on participant info*/
  $('#part_info').validate({
           rules: {
           participant_info: {
                required: true
            }
        },
        messages:{
            participant_info:{required:"This field is required."},
            
        },

    highlight: function (element, errorClass, validClass) {

      if(element.type =='text'||element.type =='password'||element.type =='email'||element.type =='select-one') {
          $(element).siblings("label").addClass("error");
          $(element).addClass('input--error').removeClass(validClass+' input--success');
          $(element).closest('.myForm').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        // this.findByName(element.name).removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $(element).closest('.myForm').find('i.fa').remove();
        $(element).closest('.myForm').append('<i class="fa fa-exclamation fa-lg form-control-feedback"></i>');
      }
    },
    unhighlight: function (element, errorClass, validClass) {
      if (element.type === "text"||element.type =='password' ||element.type =='email'||element.type =='select-one') {
          $(element).siblings("label").removeClass("error");
          $('.errorMsg').addClass('displaynone');
          $(element).closest('.myForm').removeClass('has-error has-feedback').addClass('has-success has-feedback');
          $(element).removeClass('input--error').addClass(validClass+' input--success');
          $(element).closest('.myForm').find('i.fa').remove();
          $(element).closest('.myForm').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
      } 
    },
       
      submitHandler: function(form) {
        $("#save_participant").attr("disabled", true);
        form.submit();
    }
  });

  /*validations on simple report*/
  $('#simple_report_filter').validate({
           rules: {
            season_id: {
                required: true
            },
            course_id: {
                required: true
            },
            player_id: {
                required: true
            }
        },
        messages:{
            season_id:{required:"This field is required."},
            course_id:{required:"This field is required."},
            player_id:{required:"This field is required."},
        },

    highlight: function (element, errorClass, validClass) {

      if(element.type =='text'||element.type =='password'||element.type =='email'||element.type =='select-one') {
          $(element).siblings("label").addClass("error");
          $(element).addClass('input--error').removeClass(validClass+' input--success');
          $(element).closest('.myForm').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        // this.findByName(element.name).removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $(element).closest('.myForm').find('i.fa').remove();
        $(element).closest('.myForm').append('<i class="fa fa-exclamation fa-lg form-control-feedback"></i>');
      }
    },
    unhighlight: function (element, errorClass, validClass) {
      if (element.type === "text"||element.type =='password' ||element.type =='email'||element.type =='select-one') {
          $(element).siblings("label").removeClass("error");
          $('.errorMsg').addClass('displaynone');
          $(element).closest('.myForm').removeClass('has-error has-feedback').addClass('has-success has-feedback');
          $(element).removeClass('input--error').addClass(validClass+' input--success');
          $(element).closest('.myForm').find('i.fa').remove();
          $(element).closest('.myForm').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
      } 
    },
       
      submitHandler: function(form) {
        $("#save_participant").attr("disabled", true);
        form.submit();
    }
  });

    /*validations on goals filter*/
  $('#goals').validate({
           rules: {
            goal_player: {
              required: true
            }
        },
        messages:{
            goal_player:{required:"This field is required."},
        },

    highlight: function (element, errorClass, validClass) {

      if(element.type =='text'||element.type =='password'||element.type =='email'||element.type =='select-one') {
          $(element).siblings("label").addClass("error");
          $(element).addClass('input--error').removeClass(validClass+' input--success');
          $(element).closest('.myForm').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        // this.findByName(element.name).removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $(element).closest('.myForm').find('i.fa').remove();
        $(element).closest('.myForm').append('<i class="fa fa-exclamation fa-lg form-control-feedback"></i>');
      }
    },
    unhighlight: function (element, errorClass, validClass) {
      if (element.type === "text"||element.type =='password' ||element.type =='email'||element.type =='select-one') {
          $(element).siblings("label").removeClass("error");
          $('.errorMsg').addClass('displaynone');
          $(element).closest('.myForm').removeClass('has-error has-feedback').addClass('has-success has-feedback');
          $(element).removeClass('input--error').addClass(validClass+' input--success');
          $(element).closest('.myForm').find('i.fa').remove();
          $(element).closest('.myForm').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
      } 
    },
       
      submitHandler: function(form) {
        $("#save_goal").attr("disabled", true);
        form.submit();
    }
  });

  /*validations on goals filter*/
  $('#goals1').validate({
           rules: {
            goal_player: {
                required: true
            }
        },
        messages:{
            goal_player:{required:"This field is required."},
        },

    highlight: function (element, errorClass, validClass) {

      if(element.type =='text'||element.type =='password'||element.type =='email'||element.type =='select-one') {
          $(element).siblings("label").addClass("error");
          $(element).addClass('input--error').removeClass(validClass+' input--success');
          $(element).closest('.myForm').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        // this.findByName(element.name).removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $(element).closest('.myForm').find('i.fa').remove();
        $(element).closest('.myForm').append('<i class="fa fa-exclamation fa-lg form-control-feedback"></i>');
      }
    },
    unhighlight: function (element, errorClass, validClass) {
      if (element.type === "text"||element.type =='password' ||element.type =='email'||element.type =='select-one') {
          $(element).siblings("label").removeClass("error");
          $('.errorMsg').addClass('displaynone');
          $(element).closest('.myForm').removeClass('has-error has-feedback').addClass('has-success has-feedback');
          $(element).removeClass('input--error').addClass(validClass+' input--success');
          $(element).closest('.myForm').find('i.fa').remove();
          $(element).closest('.myForm').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
      } 
    },

      submitHandler: function(form) {
        $("#save_goal").attr("disabled", true);
        form.submit();
    }
  });


  /*validations on goals confirmation filter*/
  $('#goal_detail').validate({
           rules: {
            confirmation: {
              required: true
            }
        },
        messages:{
            confirmation:{required:"This field is required."},
        },

    highlight: function (element, errorClass, validClass) {

      if(element.type =='text'||element.type =='password'||element.type =='email'||element.type =='select-one') {
          $(element).siblings("label").addClass("error");
          $(element).addClass('input--error').removeClass(validClass+' input--success');
          $(element).closest('.myForm').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        // this.findByName(element.name).removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $(element).closest('.myForm').find('i.fa').remove();
        $(element).closest('.myForm').append('<i class="fa fa-exclamation fa-lg form-control-feedback"></i>');
      }
    },
    unhighlight: function (element, errorClass, validClass) {
      if (element.type === "text"||element.type =='password' ||element.type =='email'||element.type =='select-one') {
          $(element).siblings("label").removeClass("error");
          $('.errorMsg').addClass('displaynone');
          $(element).closest('.myForm').removeClass('has-error has-feedback').addClass('has-success has-feedback');
          $(element).removeClass('input--error').addClass(validClass+' input--success');
          $(element).closest('.myForm').find('i.fa').remove();
          $(element).closest('.myForm').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
      } 
    },

    errorElement : 'div',
    errorPlacement: function(error, element) {
     // $(element).next().remove();
        var placement = $(element).data('error');
        var placement1 = element.attr('confirmation');

        if (placement) {
          $(placement).append(error)
        }else if(placement1=="confirmation"){
            error.insertAfter("#confirmation_msg");
        }else {
          error.insertAfter(element);
        }
      },
       
      submitHandler: function(form) {
        $("#save_goal").attr("disabled", true);
        form.submit();
    }
  });

  /*validations on goals confirmation filter*/
  $('#goal_detail1').validate({
           rules: {
            confirmation: {
              required: true
            }
        },
        messages:{
            confirmation:{required:"This field is required."},
        },

    highlight: function (element, errorClass, validClass) {

      if(element.type =='text'||element.type =='password'||element.type =='email'||element.type =='select-one') {
          $(element).siblings("label").addClass("error");
          $(element).addClass('input--error').removeClass(validClass+' input--success');
          $(element).closest('.myForm').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        // this.findByName(element.name).removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $(element).closest('.myForm').find('i.fa').remove();
        $(element).closest('.myForm').append('<i class="fa fa-exclamation fa-lg form-control-feedback"></i>');
      }
    },
    unhighlight: function (element, errorClass, validClass) {
      if (element.type === "text"||element.type =='password' ||element.type =='email'||element.type =='select-one') {
          $(element).siblings("label").removeClass("error");
          $('.errorMsg').addClass('displaynone');
          $(element).closest('.myForm').removeClass('has-error has-feedback').addClass('has-success has-feedback');
          $(element).removeClass('input--error').addClass(validClass+' input--success');
          $(element).closest('.myForm').find('i.fa').remove();
          $(element).closest('.myForm').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
      } 
    },

    errorElement : 'div',
    errorPlacement: function(error, element) {
     // $(element).next().remove();
        var placement = $(element).data('error');
        var placement1 = element.attr('confirmation');

        if (placement) {
          $(placement).append(error)
        }else if(placement1=="confirmation"){
            error.insertAfter("#confirmation_msg");
        }else {
          error.insertAfter(element);
        }
      },
       
      submitHandler: function(form) {
        $("#save_goal").attr("disabled", true);
        form.submit();
    }
  });

  /*validations on simple report*/
  $('#complex_report_filter').validate({
           rules: {
            coach_player_id: {
                required: true
            }
        },
        messages:{
            coach_player_id:{required:"This field is required."}
        },

    highlight: function (element, errorClass, validClass) {

      if(element.type =='text'||element.type =='password'||element.type =='email'||element.type =='select-one') {
          $(element).siblings("label").addClass("error");
          $(element).addClass('input--error').removeClass(validClass+' input--success');
          $(element).closest('.myForm').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        // this.findByName(element.name).removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $(element).closest('.myForm').find('i.fa').remove();
        $(element).closest('.myForm').append('<i class="fa fa-exclamation fa-lg form-control-feedback"></i>');
      }
    },
    unhighlight: function (element, errorClass, validClass) {
      if (element.type === "text"||element.type =='password' ||element.type =='email'||element.type =='select-one') {
          $(element).siblings("label").removeClass("error");
          $('.errorMsg').addClass('displaynone');
          $(element).closest('.myForm').removeClass('has-error has-feedback').addClass('has-success has-feedback');
          $(element).removeClass('input--error').addClass(validClass+' input--success');
          $(element).closest('.myForm').find('i.fa').remove();
          $(element).closest('.myForm').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
      } 
    },

  });

  /*validations on childcare voucher*/
  $('#childcare_form').validate({
           rules: {
            provider: {
                required: true
            },
            checkbox1: {
                required: true
            }
        },
        messages:{
            provider:{required:"This field is required"}
        },

    highlight: function (element, errorClass, validClass) {

      if(element.type =='text'||element.type =='password'||element.type =='email'||element.type =='select-one'||element.type == 'tel') {
          $(element).siblings("label").addClass("error");
          $(element).addClass('input--error').removeClass(validClass+' input--success');
          $(element).closest('.myForm').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $(element).closest('.myForm').find('i.fa').remove();
        $(element).closest('.myForm').append('<i class="fa fa-exclamation fa-lg form-control-feedback"></i>');
      }else if(element.type == 'checkbox'){
          $("input#checkbox1").after('<span class="checkmark"></span>');
      }
    },
    unhighlight: function (element, errorClass, validClass) {
      if (element.type === "text"||element.type =='password' ||element.type =='email'||element.type =='select-one'||element.type == 'tel') {
          $(element).siblings("label").removeClass("error");
          $('.errorMsg').addClass('displaynone');
          $(element).closest('.myForm').removeClass('has-error has-feedback').addClass('has-success has-feedback');
          $(element).removeClass('input--error').addClass(validClass+' input--success');
          $(element).closest('.myForm').find('i.fa').remove();
          $(element).closest('.myForm').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
      } 
    },

    errorElement : 'div',
      errorPlacement: function(error, element) {  
          var placement = $(element).data('error');
          var placement1 = element.attr('name'); 

          if (placement) {
            $(placement).append(error)
          }else if(placement1=="checkbox1"){
              error.insertAfter("#checkbox1");
          }else {
            error.insertAfter(element);
          }
        },
       
    submitHandler: function(form) {
        $("#submit-childcare").attr("disabled", true);
        $("body").addClass('processing');

        setTimeout(function(){ form.submit(); }, 1000);
        
    }
  });

    /*validations on childcare voucher*/
  $('#save_wallet,#save_wallet_payment').validate({
           rules: {
        },
        messages:{
        },
       
    submitHandler: function(form) {
        $(".wallet_confirm_order").attr("disabled", true);
        $("body").addClass('processing');

        setTimeout(function(){ form.submit(); }, 1000);
        
    }
  });




  /*validations on course booking - player selection*/
  $('#course-booking').validate({
           rules: {
            child: {
                required: true,
            },
            'selected_date_ids[]':{
              required : true,
            }
        },
        messages:{
            child:{required:"This field is required"},
            'selected_date_ids[]':{required:"Please select at least one date for booking."},
        },

      errorElement : 'div',
      errorPlacement: function(error, element) {
       // $(element).next().remove();
          var placement = $(element).data('error');
          var placement1 = element.attr('name');

          if (placement) {
            $(placement).append(error)
          }else if(placement1=="selected_date_ids[]"){
              error.insertAfter("#checkboxMsgError");
          }else {
            error.insertAfter(element);
          }
        },

    highlight: function (element, errorClass, validClass) {

      if(element.type =='text'||element.type =='password'||element.type =='email'||element.type =='select-one') {
        $(element).siblings("label").addClass("error");
        $(element).addClass('input--error').removeClass(validClass+' input--success');
        $(element).closest('.myForm').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $(element).closest('.myForm').find('i.fa').remove();
        $(element).closest('.myForm').append('<i class="fa fa-exclamation fa-lg form-control-feedback"></i>');
      }
    },
    unhighlight: function (element, errorClass, validClass) {
      if (element.type === "text"||element.type =='password' ||element.type =='email'||element.type =='select-one') {
        $(element).siblings("label").removeClass("error");
        $('.errorMsg').addClass('displaynone');
        $(element).closest('.myForm').removeClass('has-error has-feedback').addClass('has-success has-feedback');
        $(element).removeClass('input--error').addClass(validClass+' input--success');
        $(element).closest('.myForm').find('i.fa').remove();
        $(element).closest('.myForm').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
      } 
    },
       
      submitHandler: function(form) {
        $("#course_book").attr("disabled", true);
        form.submit();
    }
  });

  /*validations on course booking - player selection*/
  $('#membershipPopup').validate({
    rules: {
      membership_status: {
        required: true
      }
    },

    messages:{
        membership_status:{required:"Select membership status."},
    },

    errorElement : 'div',
      errorPlacement: function(error, element) {
       // $(element).next().remove();
          var placement = $(element).data('error');
          var placement1 = element.attr('name');

          if (placement) {
            $(placement).append(error)
          }else if(placement1=="membership_status"){
              error.insertAfter("#radio_membership");
          }else {
            error.insertAfter(element);
          }
        },
       
    submitHandler: function(form) {
      $("#membershipPopupBtn").attr("disabled", true);
      form.submit();
    }
  });

  /*validations on complex report*/
  $('#complex_report').validate({
           rules: {
            pl_name: {
                required: true
            },
            pl_dob: {
                required: true
            },
            confirmation: {
                required: true
            }
        },
        messages:{
            pl_name:{required:"This field is required"},
            pl_dob:{required:"This field is required"},
            confirmation:{required:"This field is required"}
        },

    highlight: function (element, errorClass, validClass) {

      if(element.type =='text'||element.type =='password'||element.type =='email'||element.type =='select-one') {
        $(element).siblings("label").addClass("error");
        $(element).addClass('input--error').removeClass(validClass+' input--success');
        $(element).closest('.myForm').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $(element).closest('.myForm').find('i.fa').remove();
        $(element).closest('.myForm').append('<i class="fa fa-exclamation fa-lg form-control-feedback"></i>');
      }
    },
    unhighlight: function (element, errorClass, validClass) {
      if (element.type === "text"||element.type =='password' ||element.type =='email'||element.type =='select-one') {
        $(element).siblings("label").removeClass("error");
        $('.errorMsg').addClass('displaynone');
        $(element).closest('.myForm').removeClass('has-error has-feedback').addClass('has-success has-feedback');
        $(element).removeClass('input--error').addClass(validClass+' input--success');
        $(element).closest('.myForm').find('i.fa').remove();
        $(element).closest('.myForm').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
      } 
    },
       
      submitHandler: function(form) {
        $("#submit-complex-report").attr("disabled", true);
        form.submit();
    }
  });

  /*validations on complex report*/
  $('#match_stats').validate({
           rules: {
            tp_in_match: {
                required: true,
                digits: true
            },
            tp_won: {
                required: true,
                digits: true
            },
            total_1serves_in: {
                required: true,
                digits: true
            },
            total_2serves_in: {
                required: true,
                digits: true
            },
            total_double_faults: {
                required: true,
                digits: true
            },
            total_aces: {
                required: true,
                digits: true
            },
            total_1serve_by_op: {
                required: true,
                digits: true
            },
            total_2serve_by_op: {
                required: true,
                digits: true
            },
            total_double_fault_by_op: {
                required: true,
                digits: true
            },
            tp_won_in_1serve: {
                required: true,
                digits: true
            },
            tp_won_in_2serve: {
                required: true,
                digits: true
            },
            tp_won_ops_1sereve: {
                required: true,
                digits: true
            },
            tp_won_ops_2sereve: {
                required: true,
                digits: true
            },
            tp_played_rally_4shots: {
                required: true,
                digits: true
            },
            tp_played_rally_5shots: {
                required: true,
                digits: true
            },
            tp_won_rally_4shots: {
                required: true,
                digits: true
            },
            tp_won_rally_5shots: {
                required: true,
                digits: true
            },
            total_shots_match: {
                required: true,
                digits: true
            },
        },
        messages:{
            pl_name:{required:"This field is required"},
            pl_dob:{required:"This field is required"},
            confirmation:{required:"This field is required"}
        },

    highlight: function (element, errorClass, validClass) {

      if(element.type =='text'||element.type =='password'||element.type =='email'||element.type =='select-one') {
        $(element).siblings("label").addClass("error");
        $(element).addClass('input--error').removeClass(validClass+' input--success');
        $(element).closest('.myForm').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $(element).closest('.myForm').find('i.fa').remove();
        $(element).closest('.myForm').append('<i class="fa fa-exclamation fa-lg form-control-feedback"></i>');
      }
    },
    unhighlight: function (element, errorClass, validClass) {
      if (element.type === "text"||element.type =='password' ||element.type =='email'||element.type =='select-one') {
        $(element).siblings("label").removeClass("error");
        $('.errorMsg').addClass('displaynone');
        $(element).closest('.myForm').removeClass('has-error has-feedback').addClass('has-success has-feedback');
        $(element).removeClass('input--error').addClass(validClass+' input--success');
        $(element).closest('.myForm').find('i.fa').remove();
        $(element).closest('.myForm').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
      } 
    },
       
      submitHandler: function(form) {
        $("#save_stats").attr("disabled", true);
        form.submit();
    }
  });

  /*validation for the register form*/
     $('#add-family-mem').validate({

      rules: {

      first_name: {
          required: true,
          noSpace: true,
          maxlength:25,
          
      },
      first_name1: {
        noSpace: true,
      },
      last_name1: {
        noSpace: true,
      },
      last_name: {
          required: true,
          noSpace: true,
          maxlength:25,
          
      },
      gender1: {
          required: true,      
      },
      date_of_birth: {
          required: true,
      },
      address: {
        required: true,
        noSpace: true,
        maxlength: 255,
      }, 
      town: {
        required: true,
        maxlength: 40,
        noSpace: true,
        lettersonly:true
      },
      postcode: {
        required: true,
        noSpace: true,
        maxlength: 10,
      },
      county: {
        required: true,
        maxlength: 30,
        noSpace: true,
        lettersonly:true
      },
      country: {
        required: true,
        maxlength: 30
      },
      phone_number: {
          required: true,
          digits: true,
          minlength: 7,
          maxlength: 15,
      },
      email: { 
          required: true,
          customemail:true,
      },
      relation: {
          required: true,
      }, 
      },

    messages:{
      phone:{maxlength:"Maximum character limit reached."},
      phone:{minlength:"Required, Minimum 7 characters"},
      name:{required:"This field is required."},
      lastname:{required:"This field is required."},

      email:{required:"This field is required.",email:"Please enter a valid email address."}

    },

    highlight: function (element, errorClass, validClass) {

      if(element.type =='text'||element.type =='password'||element.type =='email'||element.type =='select-one'||element.type == 'tel') {
          $(element).siblings("label").addClass("error");
          $(element).addClass('input--error').removeClass(validClass+' input--success');
          $(element).closest('.myForm').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        // this.findByName(element.name).removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $(element).closest('.myForm').find('i.fa').remove();
        $(element).closest('.myForm').append('<i class="fa fa-exclamation fa-lg form-control-feedback"></i>');
      }else if(element.type == 'checkbox'){
          $("input#checkbox1").after('<span class="checkmark"></span>');
      }
    },
    unhighlight: function (element, errorClass, validClass) {
      if (element.type === "text"||element.type =='password' ||element.type =='email'||element.type =='select-one'||element.type == 'tel') {
          $(element).siblings("label").removeClass("error");
          $('.errorMsg').addClass('displaynone');
          $(element).closest('.myForm').removeClass('has-error has-feedback').addClass('has-success has-feedback');
          $(element).removeClass('input--error').addClass(validClass+' input--success');
          $(element).closest('.myForm').find('i.fa').remove();
          $(element).closest('.myForm').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
      } 
    },

    errorElement : 'div',
      errorPlacement: function(error, element) {
       // $(element).next().remove();
          var placement = $(element).data('error');
          var placement1 = element.attr('name');

          if (placement) {
            $(placement).append(error)
          }else if(placement1=="gender1"){
              error.insertAfter("#select_gender");
          }else {
            error.insertAfter(element);
          }
        },

      submitHandler: function(form) {        
        $("#family_mem_btn").attr("disabled", true);
        form.submit();
      }

  });

//password-Validations Form
  $('#changePasswordForm').validate({
    onfocusout: function (valueToBeTested) {
      $(valueToBeTested).valid();
    },
  
    highlight: function(element) {
      $('element').removeClass("error");
    },
  
    rules: {
      "oldpassword": {
          required: true,
          maxlength: 50,
      },
      "password": {
        required: true,
        minlength: 8,
        maxlength: 25,
        checkstrongpassword:true,
    },
    "conpassword": {
      required: true,
      minlength: 8,
      maxlength: 25,
      checkstrongpassword:true,
      equalTo: "#password",
  },
  
      valueToBeTested: {
          required: true,
      }
    },
    messages: {
      conpassword: {
        equalTo: "Password and Confirm Password do not match"
    }
   }
    });   
  
    //Submitting Form 
    $('#passwordSubmitButton').click(function()
    { 
      if($('#changePasswordForm').valid())
      {
        $('#passwordSubmitButton').prop('disabled', true);
        $('#changePasswordForm').submit();
      }else{
        return false;
      }
    });


    // Stats Filter validations

    /*validation for booking table*/
    $('#stats_filter').validate({
             rules: {
             stats_participant_name: {
                  required: true
              },
              stats_match_no: {
                  required: true
              },
          },
          messages:{
              stats_participant_name:{required:"This field is required."},
              stats_match_no:{required:"This field is required."},
          },

      highlight: function (element, errorClass, validClass) {

        if(element.type =='text'||element.type =='password'||element.type =='email'||element.type =='select-one') {
            $(element).siblings("label").addClass("error");
            $(element).addClass('input--error').removeClass(validClass+' input--success');
        }
      },
      unhighlight: function (element, errorClass, validClass) {
        if (element.type === "text"||element.type =='password' ||element.type =='email'||element.type =='select-one') {
            $(element).siblings("label").removeClass("error");
            $('.errorMsg').addClass('displaynone');
            $(element).closest('.myForm').removeClass('has-error has-feedback').addClass('has-success has-feedback');
        } 
      },
         
        submitHandler: function(form) {
          form.submit();
      }
    });

    /*validation for Tennis listing filter*/
    $('#tennis-listing').validate({
             rules: {
             course: {
                  required: true
              },
              subtype: {
                  required: true
              },
              level: {
                  required: true
              },
          },
          messages:{
              course:{required:"This field is required."},
              subtype:{required:"This field is required."},
              level:{required:"This field is required."},
          },

      highlight: function (element, errorClass, validClass) {

      if(element.type =='text'||element.type =='password'||element.type =='email'||element.type =='select-one'||element.type == 'tel') {
          $(element).siblings("label").addClass("error");
          $(element).addClass('input--error').removeClass(validClass+' input--success');
          $(element).closest('.myForm').removeClass('has-success has-feedback').addClass('has-error has-feedback');
        // this.findByName(element.name).removeClass('has-success has-feedback').addClass('has-error has-feedback');
        $(element).closest('.myForm').find('i.fa').remove();
        $(element).closest('.myForm').append('<i class="fa fa-exclamation fa-lg form-control-feedback"></i>');
      }else if(element.type == 'checkbox'){
          $("input#checkbox1").after('<span class="checkmark"></span>');
      }
    },
    unhighlight: function (element, errorClass, validClass) {
      if (element.type === "text"||element.type =='password' ||element.type =='email'||element.type =='select-one'||element.type == 'tel') {
          $(element).siblings("label").removeClass("error");
          $('.errorMsg').addClass('displaynone');
          $(element).closest('.myForm').removeClass('has-error has-feedback').addClass('has-success has-feedback');
          $(element).removeClass('input--error').addClass(validClass+' input--success');
          $(element).closest('.myForm').find('i.fa').remove();
          $(element).closest('.myForm').append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
      } 
    },
         
        submitHandler: function(form) {
          form.submit();
      }
    });


});

$( "#money_amount" ).blur(function() {
    this.value = parseFloat(this.value).toFixed(2);
});