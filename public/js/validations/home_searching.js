

var $url = jQuery("body").attr('data-url');








    


activeAllCategories();



jQuery("body").on('click','.getCategory',function(e){
   e.preventDefault();
   var $this = jQuery( this );
   var category_id =  $this.attr('data-id');
   var formDiv =  $this.attr('data-tag');
   jQuery('#'+formDiv).find('#vendor_category_id').val(category_id);
   var url =  $this.attr('data-url');

   hideShowColums(formDiv,category_id);
   getFormDataAccordingCategory(formDiv,url);
});


function activeAllCategories() {

   var $this = jQuery("body").find('a.activelink.getCategory');
   var category_id =  $this.attr('data-id');
   var formDiv =  $this.attr('data-tag');

   

   var url =  $this.attr('data-url');

   hideShowColums(formDiv,category_id);
   getFormDataAccordingCategory(formDiv,url);
}



function hideShowColums(formDiv,category_id) {



  if(parseInt(category_id) == 0){
      jQuery("body").find('.addressColumn').removeClass('col-lg-6').addClass('col-lg-4');
      jQuery("body").find('.eventColumn').removeClass('col-lg-6').addClass('col-lg-4');
      jQuery("body").find('.vendorColumn').removeClass('hide');
      jQuery('#'+formDiv).find('#vendor_category_id').val(category_id);
       
  }else{
      jQuery("body").find('.addressColumn').removeClass('col-lg-4').addClass('col-lg-6');
      jQuery("body").find('.eventColumn').removeClass('col-lg-4').addClass('col-lg-6');
      jQuery("body").find('.vendorColumn').addClass('hide');
      jQuery('#'+formDiv).find('#vendor_category_id').val(category_id);
       
  }
  
}



function getFormDataAccordingCategory(formDiv,$url) {
      
       var eventType = jQuery('#'+formDiv).find('select.eventType');
       var SuggestedVendors = jQuery('#'+formDiv).find('select.SuggestedVendors');
       var amenitiesAndGames = jQuery('#'+formDiv).find('select.amenitiesAndGames');


       $.ajax({
               url : $url,
             //  data : $this.serialize(),
               type: 'GET',  // http method
               // data:{
               //    category_id : category_id
               // },
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
               },
                beforeSend: function() {
                    $("body").find('.custom-loading').show();
                   // $this.find('button.cstm-btn').attr('disabled','true');
                },

               success: function (result) {
                      if(parseInt(result.status) == 1){

                        console.log(result.data.events);
         
                        eventType.html(result.data.events);
                        amenitiesAndGames.html(result.data.amenities);
                        SuggestedVendors.html(result.data.vendors);
                       
                      }
                     
               },
               complete: function() {
                        $("body").find('.custom-loading').hide();
                      //  $this.find('button.cstm-btn').removeAttr('disabled');
               },
               error: function (jqXhr, textStatus, errorMessage) {
                     alert('error');
               }

        });

}









function initialize() 
{
    var input = document.getElementById('address');
    var options = {    
    types: ['address'],
    componentRestrictions: {country: ["us", "ca"]}
    };
    var componentForm = {
      street_number: 'short_name',
      route: 'long_name',
      locality: 'long_name',
      administrative_area_level_1: 'short_name',
      country: 'long_name',
      postal_code: 'short_name'
    };    
    var autocomplete = new google.maps.places.Autocomplete(input, options);
    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var place = autocomplete.getPlace();
        
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];

            console.log(addressType);

            // var addressType = addressType;
            // switch (addressType) { 
            //   case 'locality': 
            //     document.getElementById('city').value = val;
            //     break;
            //   case 'administrative_area_level_1': 
            //     document.getElementById('state').value = val;
            //     break;
            //   case 'postal_code': 
            //     document.getElementById('zipcode').value = val;
            //     break;                  
            // }            
          }
        }
        document.getElementById('latitude').value = place.geometry.location.lat();
        document.getElementById('longitude').value = place.geometry.location.lng();
        //document.getElementById('address').value = place.name;
        autocompleted = true;
    });
}
google.maps.event.addDomListener(window, 'load', initialize);


$('#SuggestedVendors, #amenities').select2({ 
    closeOnSelect: false
   });


$('#EventSelect').select2();












 















 