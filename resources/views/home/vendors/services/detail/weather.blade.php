<input type="hidden" value="{{$vendor->latitude}}" id="latitude" />
<input type="hidden" value="{{$vendor->longitude}}" id="longitude" />

<input type="hidden" value="{{ route('get_venue_weather', ['latitude' => $vendor->latitude, 'longitude' => $vendor->longitude]) }}" id="venue_weather_route" />

<a data-toggle="modal" data-target="#weatherModal" id="open_weather_modal" style="opacity: 0;" href="javascript:void(0);">
  
  <div class="weather-mini-card">
  <div class="weather-info">
    <div class="weather-info-wrapper">
      <div class="info-date">
        <h1 id="localTime"></h1>
        <h5><span id="localDate"></span></h5>
      </div>
      
      <div class="info-weather">
        <div class="weather-wrapper">
          <span class="weather-temperature" id="mainTemperature"></span>
          <div class="weather-sunny"><img id="main-icon" src="{{ asset('/frontend/DarkSky-icons/SVG/clear-day.svg') }}"></div>
        </div>        
        <h5><span class="weather-city" id="cityName"></span> <spam id="cityCode"></spam></h5>
      </div>
    </div>
  </div>
</div>

</a>

<!-- Modal -->
<div id="weatherModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="inner-loader" id="weather-loader" style="display: none;">
        <div class="loader5"></div>
      </div>

      <div class="modal-header">
      	<h4 class="modal-title">Weather Report</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <form class="weather-form">
        <div class="row">
          <div class="col-lg-9">
             <div class="form-group mb-0">
                <input type="text" class="form-control" id="weatherDatePicker" placeholder="select date">
                <span class="input-icon"><i class="fas fa-calendar-alt"></i></span>
              </div>
            </div>
            <div class="col-lg-3">            
              <input type="button" onclick="searchWeather()" class="cstm-btn" value="Search">
            </div>
          </div>
        </form>
    </div>
   <!--  Weather chart sec -->
      <div class="weather-chart-container">
       <div class="" id="weather-content">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card card-weather">
                    <div class="weather-card-body">
                        <div class="weather-date-location">
                            <p class="text-gray"> <span class="weather-date" id="modal-localDate"></span> 
                              <span class="weather-location" id="modal-cityName"></span> <span class="weather-location" id="modal-cityCode"></span> </p>
                        </div>
                        <div class="weather-data d-flex">
                            <div class="mr-auto">
                               <div class="weather-status d-f a-i-c">
                                <span class="weather-status-icon"><img id="modal-main-icon" src="{{ asset('/frontend/DarkSky-icons/SVG/clear-day.svg') }}"></span><h4 class="display-3" id="modal-mainTemperature"></h4>
                              </div>
                                <p id="tempDescription"></p>
                            </div>
                        </div>
                    </div>
                    <div class="weather-card-body p-0">
                        <div class="d-flex weakly-weather" id="w-hourly"></div>
                    </div>
                </div>
            </div>
        </div>
        </div>
      </div>
    </div>

  </div>
</div>
