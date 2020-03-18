$(document).ready(function(){
   // package Form
  $("body").find('#firstEventCreate').validate({
     ignore: [],
	    onfocusout: function (valueToBeTested) {
	      $(valueToBeTested).valid();
	    },
  
	    highlight: function(element) {
	      $('element').removeClass("error");
	    },
 
  
    rules: {
      "title": {
        required: true,
        alphanumeric: true,
        maxlength: 30
      },
      "event_type": {
        required: true
         
      },
      "description": {
        required: true,
      },

      "location": {
        required: true,
      },
      
      valueToBeTested: {
          required: true,
      }
    }
});   
  
 


 $("body").find('#secondEventCreate').validate({
     ignore: [],
	    onfocusout: function (valueToBeTested) {
	      $(valueToBeTested).valid();
	    },
  
	    highlight: function(element) {
	      $('element').removeClass("error");
	    },
 
  
    rules: {
      
      "min_person": {
        required: true,
        digits: true,
        min: 1,
        minlength: 1,
        maxlength: 4
      },
      "max_person": {
        required: true,
        digits: true,
        min: 1,
        minPerson: true,
        minlength: 1,
        maxlength: 10
      },
       "start_date": {
        required: true,
        minDate: true
      },
      "end_date": {
        required: true,
        minStartDate: true
      },
      "start_time": {
        required: true,
         
      },
      "end_time": {
        required: true,
         
      },
      valueToBeTested: {
          required: true,
      }
    },
    });   
  
 

$("body").on('click','.btn-back-step',function(e){
  $("body").find('.custom-loading').show();
  var $this = $( this ).attr('data-action');
  var backStep = $( this ).attr('data-step');
    $("body").find('.step1').hide();
    $("body").find('.step2').hide();
    $("body").find('.step3').hide();
    $("body").find('.step4').hide();
    $("body").find('.step5').hide();
    $("body").find('.'+$this).show();
    
    setprogressBar(backStep);
    $("body").find('.custom-loading').hide();
  
});

$("body").find('.step1').show();
$("body").find('.step2').hide();
$("body").find('.step3').hide();
$("body").find('.step4').hide();
$("body").find('.step5').hide();

//CKEDITOR.replace('long_description');
  



  $("body").find('#thirdEventCreate').validate({
     ignore: [],
      onfocusout: function (valueToBeTested) {
        $(valueToBeTested).valid();
      },
  
      highlight: function(element) {
        $('element').removeClass("error");
      },
 
  
    rules: {
      "categories": {
        required: true
        
      },
      valueToBeTested: {
          required: true,
      }
    }
}); 


$('#start_time').clockface();
$('#end_time').clockface();

 

$("body").on('change','#get',function(){
     var val = $( this ).val();
     $("body").find("#colour").val(val);
});







$("body").find('#forthEventCreate').validate({
     ignore: [],
      onfocusout: function (valueToBeTested) {
        $(valueToBeTested).valid();
      },
  
      highlight: function(element) {
        $('element').removeClass("error");
      },
 
  
    rules: {
      "long_description": {
        required: true,
         
      },
      "event_budget": {
        required: true,
        number:true
         
      },
      "description": {
        required: true,
      },

      "event_picture": {
        required: true,
      },
      
      valueToBeTested: {
          required: true,
      }
    }
});   



$("body").find('#fiveEventCreate').validate({
     ignore: [],
      onfocusout: function (valueToBeTested) {
        $(valueToBeTested).valid();
      },
  
      highlight: function(element) {
        $('element').removeClass("error");
      },
 
  
    rules: {
      "Colour": {
        required: true,
         
      },
      "seasons": {
        required: true
         
      },
      "ideas": {
        required: true,
      },

      "notepad": {
        required: true,
      },
      "agree": {
        required: true,
      },
      "event_picture": {
        required: true,
      },
      
      valueToBeTested: {
          required: true,
      }
    }
});   





$("body").on('submit','#firstEventCreate',function(e){
       e.preventDefault();
       var $this = $( this );
       $("body").find('.custom-loading').show();
 
     if($( this ).valid()){


         localStorage.setItem("title", $this.find('#title').val());
         localStorage.setItem("event_type", $this.find('#event_type').val());
         localStorage.setItem("description", $this.find('#description').val());
         localStorage.setItem("location", $this.find('#location').val());
         localStorage.setItem("latitude", $this.find('#latitude').val());
         localStorage.setItem("longitude", $this.find('#longitude').val());


     	  $("body").find('.step1').hide();
     	  $("body").find('.step2').show();
         setprogressBar(2);
     }
     $("body").find('.custom-loading').hide();

});



//------------------------------------------------------------------------------

$("body").on('submit','#secondEventCreate',function(e){
       e.preventDefault();
     var $this = $( this );
     $("body").find('.custom-loading').show();
     if($( this ).valid()){
         localStorage.setItem("start_date", $this.find('#start_date').val());
         localStorage.setItem("start_time", $this.find('#start_time').val());
         localStorage.setItem("end_date", $this.find('#end_date').val());
         localStorage.setItem("end_time", $this.find('#end_time').val());
         localStorage.setItem("min_person", $this.find('#min_person').val());
         localStorage.setItem("max_person", $this.find('#max_person').val());

         $("body").find('.step1').hide();
         $("body").find('.step2').hide();
         $("body").find('.step3').show();
         $("body").find('.step5').hide();

         setprogressBar(3);
     }
     $("body").find('.custom-loading').hide();

});



//############################################################################################




$("body").on('submit','#thirdEventCreate',function(e){
       e.preventDefault();
     var $this = $( this );
     $("body").find('.custom-loading').show();
     if($( this ).valid()){
           var yourArray = getAllCategoryCheckedForEvent();
           if(parseInt(yourArray.length) > 0){
                 
                 $("body").find('.step1').hide();
                 $("body").find('.step2').hide();
                 $("body").find('.step3').hide();
                 $("body").find('.step5').hide();
                 $("body").find('.step4').show();
                 $this.find('.messages').text('');
                 setAllInputIntoOneForm();
                 setprogressBar(4);
                   
            }else{

              $this.find('.messages').text('<div class="alert alert-danger" role="alert">The categories is required.</div>');

            }

            console.log( localStorage.getItem("categories"));
     }
     $("body").find('.custom-loading').hide();

});






//############################################################################################




$("body").on('submit','#forthEventCreate',function(e){
       e.preventDefault();
     var $this = $( this );

     if($( this ).valid()){
         localStorage.setItem("long_description", $this.find('#long_description').val());
         localStorage.setItem("event_budget", $this.find('#event_budget').val());

                 $("body").find('.step1').hide();
                 $("body").find('.step2').hide();
                 $("body").find('.step3').hide();
                 $("body").find('.step4').hide();
                 $("body").find('.step5').show();
                 $this.find('.messages').text('');
                 setAllInputIntoOneForm();
                 setprogressBar(5);
     }

});







//############################################################################################









$("body").on('submit','#fiveEventCreate',function(e){
       e.preventDefault();
     var $this = $( this );

     if($( this ).valid()){
        
             var formData = new FormData(this);
             var yourArray = getAllCategoryCheckedForEvent();
             formData.append('event_categories',yourArray);


       	   $.ajax({
              url: $this.attr("action"),
              type: 'POST',
              data: formData,
              dataTYPE:'JSON',
              beforeSend: function() {
                    $("body").find('.custom-loading').show();
                     
              },
              success: function (data) {
                   if(data.status == 1){
                        window.location.href= data.url;
                        $("body").find('.custom-loading').hide();
                   }else{
                    $("body").find('.custom-loading').hide();
                    alert(data.errors);
                   }

              },
              cache: false,
              contentType: false,
              processData: false
          });
     }

});









function getAllCategoryCheckedForEvent(argument) {
  var yourArray =[];
  $("body").find("input:checkbox[class=categoryCheckboxes]:checked").each(function(){
        yourArray.push($(this).val());
  

  });
    
     return yourArray;
}




 
 







$("body").on('change','#event_type',function() {
   var $this = $(this);
    const selectedEvent = $(this).val();

    var url = $this.attr('data-action');
     
     $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url:url,
        type: "get",
        dataType: "JSON",
        data: { '_token': $('meta[name="csrf-token"]').attr('content'), 'id': selectedEvent },
        success: function(res)
        { 
          $("body").find('#all-services').html(res); 
          
        },
        error: function(err) {
            console.log(err);
        }
    });
});









//-------------------------------------------------------------------------------------------------



function setAllInputIntoOneForm() {
         var fort_title = localStorage.getItem("title");
         var fort_event_type = localStorage.getItem("event_type");
         var fort_description = localStorage.getItem("description");
         var fort_location = localStorage.getItem("location");
         var fort_latitude = localStorage.getItem("latitude");
         var fort_longitude = localStorage.getItem("longitude");
         var fort_start_date = localStorage.getItem("start_date");
         var fort_start_time = localStorage.getItem("start_time");
         var fort_end_date = localStorage.getItem("end_date");
         var fort_end_time = localStorage.getItem("end_time");
         var fort_min_person = localStorage.getItem("min_person");
         var fort_max_person = localStorage.getItem("max_person");
         var fort_long_description = localStorage.getItem("long_description");
         var fort_event_budget = localStorage.getItem("event_budget");
         

         var $this = $("body").find('#fiveEventCreate');

         $this.find('#fort_title').val(fort_title);
         $this.find('#fort_event_type').val(fort_event_type);
         $this.find('#fort_description').val(fort_description);
         $this.find('#fort_location').val(fort_location);
         $this.find('#fort_latitude').val(fort_latitude);
         $this.find('#fort_longitude').val(fort_longitude);
         $this.find('#fort_start_date').val(fort_start_date);
         $this.find('#fort_start_time').val(fort_start_time);
         $this.find('#fort_end_date').val(fort_end_date);
         $this.find('#fort_end_time').val(fort_end_time);
         $this.find('#fort_min_person').val(fort_min_person);
         $this.find('#fort_max_person').val(fort_max_person);
         $this.find('#fort_long_description').val(fort_long_description);
         $this.find('#fort_event_budget').val(fort_event_budget);





}








//----------------------------------------------------------------------------------------------------





function formModalSubmit(argument) {
           
          $.ajax({
              url: window.location.pathname,
              type: 'POST',
              data: formData,
              success: function (data) {
                  alert(data)
              },
              cache: false,
              contentType: false,
              processData: false
          });
        
}









//------------------------------------------------------------------------------

function setprogressBar(val) {
    if(parseInt(val) == 1){
        $("body").find('li.stp-1').addClass('active');
        $("body").find('li.stp-2').removeClass('active');
        $("body").find('li.stp-3').removeClass('active');
        $("body").find('li.stp-4').removeClass('active');
        $("body").find('li.stp-5').removeClass('active');
    }

     if(parseInt(val) == 2){
        $("body").find('li.stp-1').addClass('active');
        $("body").find('li.stp-2').addClass('active');
        $("body").find('li.stp-3').removeClass('active');
        $("body").find('li.stp-4').removeClass('active');
        $("body").find('li.stp-5').removeClass('active');
    }

     if(parseInt(val) == 3){
        $("body").find('li.stp-1').addClass('active');
        $("body").find('li.stp-2').addClass('active');
        $("body").find('li.stp-3').addClass('active');
        $("body").find('li.stp-4').removeClass('active');
        $("body").find('li.stp-5').removeClass('active');
    }

     if(parseInt(val) == 4){
        $("body").find('li.stp-1').addClass('active');
        $("body").find('li.stp-2').addClass('active');
        $("body").find('li.stp-3').addClass('active');
        $("body").find('li.stp-4').addClass('active');
        $("body").find('li.stp-5').removeClass('active');
    }

     if(parseInt(val) == 5){
        $("body").find('li.stp-1').addClass('active');
        $("body").find('li.stp-2').addClass('active');
        $("body").find('li.stp-3').addClass('active');
        $("body").find('li.stp-4').addClass('active');
        $("body").find('li.stp-5').addClass('active');
    }
}










    
    
});





































