$(document).ready(function(){
   // Style Form
  $('#assignCategory').validate({
    onfocusout: function (valueToBeTested) {
      $(valueToBeTested).valid();
    },
  
    highlight: function(element) {
      $('element').removeClass("error");
    },
  
    rules: {
      "styles[]": { 
          chrequired: true,
      },
      valueToBeTested: {
          required: true,
      }
    },
    });  	

  $('#basicInfoForm').validate({
    onfocusout: function (valueToBeTested) {
      $(valueToBeTested).valid();
    },
  
    highlight: function(element) {
      $('element').removeClass("error");
    },
  
    rules: {
      "title": { 
          required: true,
          maxlength: 20,
          alphanumeric: true
      },      
      "description": { 
          required: true,
          maxlength: 100
      },      
      "image": { 
          required: true,
      },
      valueToBeTested: {
          required: true,
      }
    },
    });   

  $('#editStyleForm').validate({
    onfocusout: function (valueToBeTested) {
      $(valueToBeTested).valid();
    },
  
    highlight: function(element) {
      $('element').removeClass("error");
    },
  
    rules: {
      "title": { 
          required: true,
          maxlength: 20,
          alphanumeric: true
      },      
      "description": { 
          required: true,
          maxlength: 100
      },      

      valueToBeTested: {
          required: true,
      }
    },
    });   
  
    // Style Submitting Form 
    $('#assignCategoryBtn').click(function()
    {
      if($('#basicInfoForm').valid())
      {
        $('#assignCategoryBtn').prop('disabled', true);
        $('#basicInfoForm').submit();
      } else {
        return false;
      }
    });    

    $('#basicInfoBtn').click(function()
    {
      if($('#assignCategory').valid())
      {
        $('#basicInfoBtn').prop('disabled', true);
        $('#assignCategory').submit();
      } else {
        return false;
      }
    });    

    $('#editStyleBtn').click(function()
    {
      if($('#editStyleForm').valid())
      {
        $('#editStyleBtn').prop('disabled', true);
        $('#editStyleForm').submit();
      } else {
        return false;
      }
    });



  function deleteItem(item) {
    const url = $(item).data('delurl');
    if (confirm("Are you sure you want to delete it!")) {
      window.location.href = url;
    }
  }

    
});
