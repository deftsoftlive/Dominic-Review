@extends('layouts.home')
@section('content')


  <section class="main-banner" style="background:url('/frontend/images/banner-bg.png');">
        <div class="container">
            <div class="banner-content">
                <h1 class="banner-heading">Vendor Listing</h1>
                <div class="search-bar">
                    <form>
                    <div class="row">
                        
                        <div class="col-lg-10 col-md-9 pd-right-0">
                            <div class="form-group">
                                <!-- <input type="text" name="" class="form-control"> -->
                                <select name="vendors[]" class="form-control select2" data-placeholder="Search Vendors">
                                     <option></option>
                                     @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->label}}</option>
                                     @endforeach
                                </select>
                                <span class="input-icon"><i class="fas fa-search"></i></span>
                            </div>
                        </div>
                         
                        <div class="col-lg-2 col-md-3 padding-left-0">
                            <div class="form-group">
                                <button class="cstm-btn solid-btn banner-btn">Search</button>
                                <!-- <a href="#" class="cstm-btn solid-btn banner-btn">Search</a> -->
                            </div>
                        </div>                    
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
    <section class="vendor-listing-sec checklist-wrap">
        <div class="container lr-container">
            <div class="sec-card outer-wrap">
               <span class="aside-toggle">
                                <i class="fa fa-bars"></i>
                                <span class="cross-class">
                                    <i class="fas fa-times" style="display: none;"></i>
                                </span>
                            </span>
                    @include('admin.error_message')
                    @include('includes.ajaxMessage')

                <div class="row">                      

                      @include('home.includes.business.sidebar')
                    
                    <div class="col-lg-9">
                        <div class="inner-content">
                            <p>Showing Results <b id="categoryCount">Searching...</b></p>
                            <span class="view-toggle">
                                 <ul>
                                    <li><a href="javascript:void(0);" class="view-mapper" data-id="#business-view" data-hide="#map-marker-placer"> <i class="fas fa-list"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="view-mapper"  data-id="#map-marker-placer" data-hide="#business-view"> <i class="fas fa-map"></i></a>
                                   </li>
                                </ul> 
                            </span>
                            <hr>
                        </div>
                        <div class="inner-content-detail" >
                                  
                                  <div id="inner-content-detail"></div>
                                  <div class="map-marker-placer" id="map-marker-placer" style="display: none;">
                                          @include('home.includes.business.map')
                                  </div>
                        </div>

                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <!-- banner section starts Ends here -->










@endsection

@section('scripts')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDULjv0UAVmj_zgc9GjBhJNh9fNuEj87LQ&libraries=places"></script>
<script type="text/javascript" src="{{url('/js/validations/businessListingFilter.js')}}"></script>
<script type="text/javascript" src="{{url('/js/validations/quotes.js')}}"></script>
<script type="text/javascript">
    function initMap() {
           var map;
           var bounds = new google.maps.LatLngBounds();

           var mapOptions = {
               mapTypeId: 'roadmap'
           };
            // Display a map on the web page
           map = new google.maps.Map(document.getElementById("mapCanvas"), mapOptions);
           map.setTilt(50);
           // Multiple markers location, latitude, and longitude
           var markers = [
             @if(@sizeof($businesses))
               @foreach($businesses as $k =>  $loopingBusiness)
               @if($loopingBusiness->latitude != "")
                ['{{ $loopingBusiness->title }}', '{{ $loopingBusiness->latitude }}', '{{ $loopingBusiness->longitude }}'], 
                @endif
               @endforeach
             @endif
           ];
           // Info window content
           var infoWindowContent = [
             @if(@sizeof($businesses))
               @foreach($businesses as $k => $loopingBusiness) 
                  @if($loopingBusiness->latitude != "") 
               ['<div class="info_content">' +
               '<div>{!!getCoverPictureOfBusiness($loopingBusiness)!!}</div>'+
               '<h3>{{ $loopingBusiness->title }}</h3>' +
               '<label>{{ $loopingBusiness->category->label }}</label>' + 
               '</div>'
               ], 
               @endif
               @endforeach
             @endif
           ];
               
           // Add multiple markers to map
           var infoWindow = new google.maps.InfoWindow(), marker, i;
           
           // Place each marker on the map  
           for( i = 0; i < markers.length; i++ ) {
               var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
               bounds.extend(position);
               marker = new google.maps.Marker({
                   position: position,
                   map: map,
                   title: markers[i][0]
               });
               
               // Add info window to marker    
               google.maps.event.addListener(marker, 'click', (function(marker, i) {
                   return function() {
                       infoWindow.setContent(infoWindowContent[i][0]);
                       infoWindow.open(map, marker);
                   }
               })(marker, i));

               // Center the map to fit all markers on the screen
               map.fitBounds(bounds);
           }

           // Set zoom level
           var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
               this.setZoom(2);
               google.maps.event.removeListener(boundsListener);
           });
   
}

google.maps.event.addDomListener(window, 'load', initMap);
</script>
@endsection