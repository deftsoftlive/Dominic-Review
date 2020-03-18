/*$(function() {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
    $("#example1").dataTable();
    $('#example2').dataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": false,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false
    });
     //Datemask dd/mm/yyyy
     $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
     //Datemask2 mm/dd/yyyy
     $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
     //Money Euro
     $("[data-mask]").inputmask();
 
     //Date range picker
     $('#reservation').daterangepicker();
     //Date range picker with time picker
     $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
     //Date range as a button
     $('#daterange-btn').daterangepicker(
             {
                 ranges: {
                     'Today': [moment(), moment()],
                     'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                     'Last 7 Days': [moment().subtract('days', 6), moment()],
                     'Last 30 Days': [moment().subtract('days', 29), moment()],
                     'This Month': [moment().startOf('month'), moment().endOf('month')],
                     'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                 },
                 startDate: moment().subtract('days', 29),
                 endDate: moment()
             },
     function(start, end) {
         $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
     }
     );
 
     //iCheck for checkbox and radio inputs
     $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
         checkboxClass: 'icheckbox_minimal',
         radioClass: 'iradio_minimal'
     });
     //Red color scheme for iCheck
     $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
         checkboxClass: 'icheckbox_minimal-red',
         radioClass: 'iradio_minimal-red'
     });
     //Flat red color scheme for iCheck
     $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
         checkboxClass: 'icheckbox_flat-red',
         radioClass: 'iradio_flat-red'
     });
 
     //Colorpicker
     $(".my-colorpicker1").colorpicker();
     //color picker with addon
     $(".my-colorpicker2").colorpicker();
 
     //Timepicker
     $(".timepicker").timepicker({
         showInputs: false
     });
});
*/
$(document).ready(function(){
    $( "#date_of_birth" ).datepicker({
       changeMonth:true,
       dateFormat: 'dd-mm-yy',
       changeYear:true,
       yearRange: "-100:-18",
       maxDate: '-18Y'
    });
});
$(document).ready(function(){
jQuery.validator.addMethod("noSpace", function(value, element) { 
  return value.indexOf(" ") < 0 && value != ""; 
}, "Spaces are not allowed.");

$.validator.addMethod("price", function(value, element) {
    return this.optional(element) || /^\d*(.\d{2})?$/.test(value);
}, "This field is not valid.");

$.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[a-z]+$/i.test(value);
}, "This field is not valid.");

$.validator.addMethod('mobileUK', function(phone_number, element) {
    phone_number = phone_number.replace(/\s+|-/g,'');
    return this.optional(element) || phone_number.length > 9 &&
        phone_number.match(/^(?:(?:(?:00\s?|\+)44\s?|0)7(?:[0-9]\d{2}|624)\s?\d{3}\s?\d{3})$/);
}, 'Please specify a valid mobile number');

    $("#admin-edit-user").validate({
      rules: {
        fname: {
            required: true,
            minlength: 2,
            maxlength: 50,
            noSpace: true,
            lettersonly: true 
        },
        lname: {
            required: true,
            minlength:2,
            maxlength: 50,
            noSpace: true,
            lettersonly: true 
        },
        email: {
            required: true,
            email: true
        },
        contact_no:{
            required: true,
            minlength: 11,
            maxlength: 12,
            mobileUK: true
        },
        day_of_birth:{
            required: true
        },
        month_of_birth:{
            required: true
        },
        year_of_birth:{
            required: true
        },
        gender: {
            required: true
        },
      },
});

    $('#userSubmitButton').click(function(){
        $(this).attr('disabled', true);
        if($('#admin-edit-user').valid()){
            $('#admin-edit-user').submit();
        }else{
            $(this).attr('disabled', false);
            return false;
        }   
    });

});

$(document).ready(function(){

    $("#admin-create-user").validate({
      rules: {
        fname: {
            required: true,
            minlength: 2,
            maxlength: 50,
            noSpace: true,
            lettersonly: true 
        },
        lname: {
            required: true,
            minlength:2,
            maxlength: 50,
            noSpace: true,
            lettersonly: true 
        },
        nick_name: {
            maxlength: 50
        },
        role: {
            required: true
        },
        email: {
            required: true,
            email: true
        },
        contact_no:{
            required: true,
            minlength: 11,
            maxlength: 12,
            mobileUK: true
        },
        day_of_birth:{
            required: true
        },
        month_of_birth:{
            required: true
        },
        year_of_birth:{
            required: true
        },
        gender: {
            required: true
        },
        role: {
            required: true
        },
        password:{
            required: true,
            minlength: 8
        },
        confirm_password: {
                required: true,
                minlength: 8,
                equalTo: "#password"
        },
      },
     messages: {
    confirm_password: {
      equalTo: "Sorry, Your password does not match."
    }
  }
});

    $('#userSubmitButtonCreate').click(function(){
        $(this).attr('disabled', true);
        if($('#admin-create-user').valid()){
            $('#admin-create-user').submit();
        }else{
            $(this).attr('disabled', false);
            return false;
        }   
    });

});

$(document).ready(function(){
    $('#profile-pic').click(function(){
        var img_src = $('#profile-pic').attr('src');
        $('#modal-img').attr('src', img_src);
        $('#myModal').css('display','block');
    });
     $('.close').click(function(){
        $('#myModal').css('display','none');
     })
});
$(document).ready(function(){
    $('.updated-img').click(function(){
        var img_src = $('.updated-img').attr('src');
        $('#modal-img').attr('src', img_src);
        $('#updatedpic').css('display','block');
    });
     $('.close').click(function(){
        $('#updatedpic').css('display','none');
     })
});

$(document).ready(function(){
    $("#settings-form").validate({
      rules: {
        fb_link: {
            required: true,
            maxlength: 70,
            noSpace: true,
        },
        twitter_link: {
            required: true,
            maxlength: 70,
            noSpace: true, 
        },
        insta_link: {
            required: true,
            maxlength: 70,
            noSpace: true, 
        },
        email: {
            required: true,
            email: true
        },
        contact_no:{
            required: true,
            minlength: 11,
            maxlength: 12,
            mobileUK: true
        },
        copyright:{
            required: true,
            maxlength: 100
        },
    }
});

    $('#submit-btn-settings').click(function(){
        $(this).attr('disabled', true);
        if($('#settings-form').valid()){
            $('#settings-form').submit();
        }else{
            $(this).attr('disabled', false);
            return false;
        }   
    });

});

//js for create event form
$(document).ready(function(){
    $( "#date" ).datepicker({
       changeMonth:true,
       dateFormat: 'dd-mm-yy',
       minDate : 1,
       maxDate : "+6M",
       changeYear:true,
    }).on('change', function() {
    $(this).valid();
    });
    $("#time").clockpicker().on('change', function() {
    $(this).valid();
    });
    $('input[name="event_type"]').on('change', function() {
    $('#seats').valid();
    });
});

$(document).ready(function(){

    $("#create-event-form").validate({
        ignore: [],
        onfocusout: function (valueToBeTested) {
          $(valueToBeTested).valid();
        },

        highlight: function(element) {
          $('element').removeClass("error");
        },

        errorPlacement: function(error, element) 
        {   
            if (element.attr("name") == "content") 
            {
                error.insertAfter("#cke_content");
            } else {
                 error.insertAfter(element);
            }
        }, 
        rules: {
        name: {
            required: true,
            minlength: 2,
            maxlength: 50, 
        },
        venue:{
            required:true,
        },
        date:{
            required: true
        },
        time:{
            required: true
        },
        duration:{
            required: true
        },
        content:{
            required: true,
            required: function(textarea) {
                    CKEDITOR.instances[textarea.id].updateElement();
                    var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');
                    return editorcontent.length === 0;
                }
        },
        event_type:{
            required: true
        },
        seats: {
            required: true,
            maxlength: 4,
            digits: true
        },
        price: {
            required: true,
            maxlength: 6,
            price: true
        },
        min_age:{
            required: true,
            maxlength: 3,
            digits: true
        },
        max_age:{
            required: true,
            maxlength: 3,
            digits: true
        },
      }
});

    $('#create-event-form-button').click(function(){
        $(this).attr('disabled', true);
        if($('#create-event-form').valid()){
            $('#create-event-form').submit();
        }else{
            $(this).attr('disabled', false);
            return false;
        }   
    });

});

$(document).ready(function(){

    $("#edit-event-form").validate({
      ignore: [],
        onfocusout: function (valueToBeTested) {
          $(valueToBeTested).valid();
        },

        highlight: function(element) {
          $('element').removeClass("error");
        },

        errorPlacement: function(error, element) 
        {   
            if (element.attr("name") == "content") 
            {
                error.insertAfter("#cke_content");
            } else {
                 error.insertAfter(element);
            }
        }, 
        rules: {
        name: {
            required: true,
            minlength: 2,
            maxlength: 50, 
        },
        venue:{
            required:true,
        },
        duration:{
            required:true,
        },
        content:{
            required: true,
            required: function(textarea) {
                    CKEDITOR.instances[textarea.id].updateElement();
                    var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');
                    return editorcontent.length === 0;
                }
        },
        date:{
            required: true
        },
        time:{
            required: true
        },
        event_type:{
            required: true
        },
        seats: {
            required: true,
            maxlength: 4,
            digits: true
        },
        price: {
            required: true,
            maxlength:6,
            price: true
        },
        min_age:{
            required: true,
            maxlength: 3,
            digits: true
        },
        max_age:{
            required: true,
            maxlength: 3,
            digits: true
        },
        status:{
            required: true,
        },
      }
});

    $('#edit-event-form-button').click(function(){
        $(this).attr('disabled', true);
        if($('#edit-event-form').valid()){
            $('#edit-event-form').submit();
        }else{
            $(this).attr('disabled', false);
            return false;
        }   
    });

});

$(document).ready(function(){

    $("#admin-create-venue").validate({
      rules: {
        name: {
            required: true,
            minlength: 2,
            maxlength: 50
        },
        address: {
            required: true,
            maxlength: 100,
        },
        post_code: {
            required: true,
            minlength: 2,
            maxlength: 10
        },
        image: {
            required: true
        }
      }
});

    $('#venueSubmitButtonCreate').click(function(){
        $(this).attr('disabled', true);
        if($('#admin-create-venue').valid()){
            $('#admin-create-venue').submit();
        }else{
            $(this).attr('disabled', false);
            return false;
        }   
    });

    $("#admin-edit-venue").validate({
      rules: {
        name: {
            required: true,
            minlength: 2,
            maxlength: 50
        },
        address: {
            required: true,
            maxlength: 100,
        },
        post_code: {
            required: true,
            minlength: 2,
            maxlength: 10
        }
      }
});

    $('#venueSubmitButtonedit').click(function(){
        $(this).attr('disabled', true);
        if($('#admin-edit-venue').valid()){
            $('#admin-edit-venue').submit();
        }else{
            $(this).attr('disabled', false);
            return false;
        }   
    });

});