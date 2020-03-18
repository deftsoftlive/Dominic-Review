jQuery(function(){






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

                      
          }
        }
        document.getElementById('latitude').value = place.geometry.location.lat();
        document.getElementById('longitude').value = place.geometry.location.lng();
       
        autocompleted = true;
        setTimeout(function(){   getAllBusinessAccordingToFilter(); }, 1000);
      
    });
}
google.maps.event.addDomListener(window, 'load', initialize);






$('.select2').select2({
    placeholder: "Select a state" 
    
});





getAllBusinessAccordingToFilter();



/*----------------------------------------------------------------------------
|
|   Business filter
|_____________________________________________________________________________
*/



jQuery("body").on('change','.businesses',function(){

  getAllBusinessAccordingToFilter();

});

jQuery("body").on('click','.resetRadio',function(){

     $this = $('input[name=price_range]:checked');
    if($this.is(':checked')) { 
        $this.prop('checked', false);
    } 
         getAllBusinessAccordingToFilter();
});


jQuery("body").on('change','.businesses',function(){
    getAllBusinessAccordingToFilter();
});
 


function getAllBusinessAccordingToFilter() {
     var $this = jQuery("body").find('#BusinessListingFilter');
     var url = $this.attr('action');
      $.ajax({
               url : url,
               data : $this.serialize(),
               type: 'GET',   
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
               },
                beforeSend: function() {
                    $("body").find('.custom-loading').show();
                },
                success: function (result) {
                      if(parseInt(result.status) == 1){
                          jQuery("body").find('#inner-content-detail').html(result.businesses);
                          jQuery("body").find('#categoryCount').html(result.businessCount);

                          google.maps.event.addDomListener(window, 'load', initMap);
                       }
               },
               complete: function() {
                        $("body").find('.custom-loading').hide();
               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

        });
}









var valueBubble = '<output class="rangeslider__value-bubble" />';

function updateValueBubble(pos, value, context,divID) {
  pos = pos || context.position;
  value = value || context.value;
  var $valueBubble = $('.rangeslider__value-bubble', context.$range);
   $(divID).val(value);
  var tempPosition = pos + context.grabPos;
  var position = (tempPosition <= context.handleDimension) ? context.handleDimension : (tempPosition >= context.maxHandlePos) ? context.maxHandlePos : tempPosition;

  if ($valueBubble.length) {
    $valueBubble[0].style.left = Math.ceil(position) + 'px';
    $valueBubble[0].innerHTML = value;
    
  }
}

$('#sitting_capacity').rangeslider({
  polyfill: false,
  onInit: function() {
    
    this.$range.append($(valueBubble));
    updateValueBubble(null, null, this,'#sitting_capacitys');
  },
  onSlide: function(pos, value) {
     
    updateValueBubble(pos, value, this,'#sitting_capacitys');
  }
});

$('#standing_capacity').rangeslider({
  polyfill: false,
  onInit: function() {
    
    this.$range.append($(valueBubble));
    updateValueBubble(null, null, this,'#standing_capacitys');
  },
  onSlide: function(pos, value) {
     
    updateValueBubble(pos, value, this,'#standing_capacitys');
  }
});



















 

//--------------------------------------------------------------------------------
//--------------------------------------------------------------------------------


jQuery("body").on('click','.custom-video-container .play-btn',function(e){

  e.preventDefault();
  stopOtherVideo();
  var videoPath = jQuery( this ).attr('data-video');
  var Targets = jQuery( this ).attr('data-target');
  var videoTag = videoPlaySrc(videoPath);
   

   jQuery("body").find('#'+Targets).html(videoTag);
   jQuery( this ).closest('.custom-video-container').addClass('playing');
  
});



function videoPlaySrc(videoPath) {
           var text ='';
           text ='<video width="100%"  controls autoplay>';
           text +='<source src="'+videoPath+'" type="video/mp4">';
           text +='<source src="movie.ogg" type="video/ogg">';
           text +='Your browser does not support the video tag.';
           text +='</video>';
           
           return text;
}



function stopOtherVideo() {
    jQuery('.custom-video-container').removeClass('playing');

      $( ".custom-video-container" ).each(function( index ) {
          $( this ).removeClass('playing').find('.video-screen').html('');
      });
}

});