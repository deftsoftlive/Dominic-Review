$.validator.addMethod("chrequired", function(value, elem, param) {
 return value > 0;
},"You must select at least one!");

// Ck-Editor
$.validator.addMethod('ckrequired', function (value, element, params) {
  var idname = jQuery(element).attr('id');
  var editor = CKEDITOR.instances[idname]; 
  var messageLength = jQuery.trim(editor.getData() );
  var ckValue = GetTextFromHtml(editor.getData()).replace(/<[^>]*>/gi, '').trim();
  editor.on("change", function (evt) {
    ckValue = GetTextFromHtml(editor.getData()).replace(/<[^>]*>/gi, '').trim(); 
      if(ckValue.length !== 0)
        $(`#${idname}`).closest('.form-group').find('label').eq(1).css('display', 'none');
      else
        $(`#${idname}`).closest('.form-group').find('label').eq(1).css('display', 'block');
  });
  editor.updateElement();
  return !params || ckValue.length !== 0;
}, "This field is required.");

function GetTextFromHtml(html) {  
    var dv = document.createElement("DIV");  
    dv.innerHTML = html;
    return dv.textContent || dv.innerText || "";  
}

// url
$.validator.addMethod('isUrl', function(s, element){
  var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
  return this.optional(element) || regexp.test(s)
}, 'Please enter Valid Url');

// us phone
 $.validator.addMethod("phoneUS", function (value, element) {
  return this.optional(element) || value == value.match(/^(?=.*[0-9])[- +()0-9]+$/);
}, "Please specify a valid phone number."); 

//Alphanumeric-Add-Method
$.validator.addMethod("alphanumeric", function (value, element) {
  return this.optional(element) || /^[a-z\d\-_\s]+$/i.test(value);
}, "Please enter alpha-numeric characters only."); 

// letters only 
$.validator.addMethod("lettersonly", function(value, element) {
  return this.optional(element) || /^[a-z ]+$/i.test(value);
}, "Please enter alphabets only");

// greater than equals to

$.validator.addMethod('ge', function(value, element, param) {
  return this.optional(element) || value >= param;
}, `Must be greater than or equal to field min value`);

$.validator.addMethod('greaterThan', function(value, element, param) {
  var amount = parseInt($(param).val());
  var percent = (amount / 100);
  var extra = (percent * 20);
  var amountWithMoreThan20 = parseInt(amount + extra);
  return this.optional(element) || parseInt(value) >= amountWithMoreThan20;
}, `Must be greater than direct deal amount with 20% extra amount.`);




 // greater than equals to
$.validator.addMethod('res_number', function(value, element, param) {
  return this.optional(element) || !/\d/.test(value);
}, 'Please enter valid text');

// strong password
$.validator.addMethod("pwcheck", function(value, element) {
  return this.optional(element) || 
  /[!"#$%&'()*+,.\/:;<=>?@[\\\]^`{|}~]/.test(value)  // has a special charactor
  //  /^[A-Za-z0-9\d=!\-@._*]+$/.test(value) //only allowed characters
  // /^[a-zA-Z0-9- ]*$/.test(value) // special charactor restricted
    && /[a-z]/.test(value) // has a lowercase letter
    && /[A-Z]/.test(value) // has a capital letter
    && /\d/.test(value) // has a digit      
}, 'digit, lowercase, capital, and special characters is required');

// validation for amount
$.validator.addMethod('amount', function(value, element, param) {
  return this.optional(element) || /^-?(?:\d+|\d{1,3}(?:[\s\.,]\d{3})+)(?:[\.,]\d+)?$/.test(value);
}, 'Please enter valid amount');

$.validator.addMethod("minDate", function(value, element) {
    const curDate = new Date();
    const inputDate = new Date(value); 

    // const curDatemonth = curDate.getMonth() + 1; 
    // const curDatedate = curDate.getDate() - 1; 
    // const curDateyear = curDate.getFullYear();

    // const inputDatemonth = inputDate.getMonth() + 1; 
    // const inputDatedate = inputDate.getDate(); 
    // const inputDateyear = inputDate.getFullYear();

    // const current = curDatedate + '-' + curDatemonth + '-' + curDateyear;
    // const input = inputDatedate + '-' + inputDatemonth + '-' + inputDateyear;

    if ((parseInt(curDate.getTime()) < parseInt(inputDate.getTime()))) {
      return true; 
    }
    return false;
}, "Please select date greater than of Current Date!");


$.validator.addMethod("minStartDate", function(value, element) {
    var curDate = new Date($('#start_date').val());
    var inputDate = new Date(value);
    if (inputDate == 'Invalid Date' || inputDate >= curDate) {
      return true; 
    }
    return false;
}, "Please select date greater than of Start Date!");

// minimum time
$.validator.addMethod("timeValidator", function(value, element, params) {
    let start_date = $('#start_date').val();
    let end_date = $('#end_date').val();

    if(start_date || end_date) {
      start_date = new Date($('#start_date').val());
      end_date = new Date($('#end_date').val());

      // console.log('start_date ', start_date);
      // console.log('end_date ', end_date);
      const smonth = start_date.getMonth() + 1;
      const emonth = end_date.getMonth() + 1;

      const startDate = start_date.getFullYear() + '-' + smonth + '-' + start_date.getDate();
      const endDate = end_date.getFullYear() + '-' + emonth + '-' + end_date.getDate();

      // console.log('startDate s ', startDate);
      // console.log('endDate e ', endDate);

      const val = new Date(startDate + ' ' + value);
      const par = new Date(endDate + ' ' + $(params).val());
      console.log('val ', val);
      console.log('par ', par);
      // return isNaN(val) && isNaN(par) || (Number(val) > Number(par));
      return new Date(val) < new Date(par);
    } else {
      return false;
    }
    
}, "Please select time greater than of Start Date and Time!");

$.validator.addMethod('minPerson', function(value, element) {
  const minPer = $('#min_person').val();
  if(!minPer || parseInt(minPer) > parseInt(value)) {
    return false;
  }
   return true; 
}, `Must be greater than or equal to field min Person`);


// minimum age validation
$.validator.addMethod("minAge", function(value, element, min) {
    var today = new Date();
    var birthDate = new Date(value);
    var age = today.getFullYear() - birthDate.getFullYear();
 
    if (age > min+1) {
        return true;
    }
 
    var m = today.getMonth() - birthDate.getMonth();
 
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
 
    return age >= min;
}, "You must be at least 18 years old!");


// Add method to check all color value are required
  $.validator.addMethod("lengthRequired", function (value, element, param) {
      var flag = true;             
     $(`[name^=${param}]`).each(function (i, j) {  
       $(this).parent().find('#length_'+i+'-error').remove();
        if ($.trim($(this).val()) == '') {
           flag = false;
           var counter= i + 1;
        $(this).parent().append('<label id="length_'+i+'-error" class="error">This field is required.</label>');
       }
    });  
     return flag; 
    }, "");

// Add method to check all color value are required
  $.validator.addMethod("colourMaxLength", function (value, element, param) {
      var flag = true;             
     $(`[name^=${param}]`).each(function (i, j) {  
       $(this).parent().find('#length_'+i+'-error').remove();
       console.log($.trim($(this).val().length));
        if ($.trim($(this).val().length) > 11) {
           flag = false;
           var counter= i + 1;
        $(this).parent().append('<label id="length_'+i+'-error" class="error">Maximum characters allowed 11.</label>');
       }
    });  
     return flag; 
    }, "");

/*validation for booking table*/
$(document).ready(function (){
  $('#reject_request').validate({
           rules: {
           reason_of_rejection: {
                required: true,
                maxlength:255,
                noSpace: true 
            }
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
});

/*validation for credit wallet*/
$(document).ready(function (){
  $('#credit_wallet_form').validate({
           rules: {
           money_amount: {
                required: true,
                digits: true,
                minlength: 1,
                maxlength: 5,
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
        $("#credit_wallet_btn").attr("disabled", true);
        form.submit();
    }
  });
});

/*validation for wallet*/
$(document).ready(function (){
  $('#debit_wallet_form').validate({
           rules: {
           money_amount: {
                required: true,
                digits: true,
                minlength: 1,
                maxlength: 5,
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
        $("#debit_wallet_btn").attr("disabled", true);
        form.submit();
    }
  });
});