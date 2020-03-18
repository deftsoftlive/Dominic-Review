// "https://www.paypal.com/sdk/js?client-id=AZD4IUxUgJ7dy4zCpAsbKcU6Jc7dQYZrblQwCslBki7-gCs54oJDEaakYz5rhl0W89Gbi-d96xosLNHL"

function initialize() {
    var input = document.getElementById('location');
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
    });
}
google.maps.event.addDomListener(window, 'load', initialize);
