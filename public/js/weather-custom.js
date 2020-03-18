// get season
const getSeason = d => Math.floor((d.getMonth() / 12 * 4)) % 4;

function getSeasonSouthernHemisphere(date) {
// Southern hemisphere (Summer as Dec/Jan/Feb etc...)
// console.log(['Summer', 'Autumn', 'Winter', 'Spring'][getSeason(new Date())])
  return ['Summer', 'Autumn', 'Winter', 'Spring'][getSeason(new Date(date))];
}

function getSeasonNorthernHemisphere(date) {
// Northern hemisphere (Winter as Dec/Jan/Feb etc...)
// console.log(['Winter', 'Spring', 'Summer', 'Autumn'][getSeason(new Date())]);
  return ['Winter', 'Spring', 'Summer', 'Autumn'][getSeason(new Date(date))];
}


// home sidebar
function currentLatLongWeather() {

// static lat and long
   const weather_route = $('#weather_route').val();
   let url = `${weather_route}?latitude=33.5546&longitude=76.65`;
   getSideBarWeatherData(url);
// ===================================

  navigator.geolocation.getCurrentPosition(locationSuccess, locationError);
   // location fetched successfully
   function locationSuccess(position) {
    const pos = position.coords;
    const weather_route = $('#weather_route').val();
    let url = `${weather_route}?latitude=${pos.latitude}&longitude=${pos.longitude}`;
    $('#weather_route').val(url);
    getSideBarWeatherData(url);
   }

   // location fetching failed
   function locationError(error) {
      console.log("Error Code: " + error.code);
      console.log("Error Message: " + error.message);
   }
}

function getSideBarWeatherData(weather_route) {
  $.ajax({
    type: "GET",
    url: weather_route,
    cache: true,
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
    },
    success: function(forecast) {
      if(forecast.code === 400 || forecast.code === 403) {
         $('#sidebar-weather').css('display', 'none');
         return;
      }
         setForecast(forecast);
         startClock(forecast.currently.time);
         $('#sidebar-weather').css('display', 'block');
    },
    error: function(error) {
      $('#sidebar-weather').css('display', 'none');
      console.log("Error with ajax: "+ error);
    },
    complete: function() {
      $("body").find('.custom-loading').hide();
    },
  });
}

function startClock(time) {
    $("#sidebar-localTime").text(new Date(time).toLocaleTimeString());
}

function setForecast(forecast) {
   var today = forecast.daily.data[0];
   let countryUs = '';
if(forecast.timezone === 'America/New_York') countryUs = 'toFerenheit';

  $("#sidebar-localDate").text(getFormattedDate(today.time));
  $("#sidebar-mainTemperature").text(countryUs ? toFerenheit(forecast.currently.temperature)+'°F' : toCelcius(forecast.currently.temperature)+'°C');
  $("#sidebar-main-icon").attr('src', `/frontend/DarkSky-icons/SVG/${today.icon}.svg`);
}

// home sidebar end








function getFormattedDate(date) {
  var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
  return new Date(date * 1000).toLocaleDateString("en-US", options);
}

// Formats the text to CamelCase
function toCamelCase(str) {
  var arr = str.split(" ").map(
    function(sentence){
      return sentence.charAt(0).toUpperCase() + sentence.substring(1);
    }
  );
  return arr.join(" ");
}

// Converts to Celcius
function toCelcius(val) {
  return Math.round((val - 32) * (5/9));
}

// Converts to Farenheit
function toFerenheit(val) {
  var degrees = (val * 1.8) + 32;
  var rounded = Math.round(degrees);
  return rounded;
}



