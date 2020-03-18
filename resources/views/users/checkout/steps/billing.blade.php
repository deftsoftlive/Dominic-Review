@extends('users.layouts.checkout')
@section('checkoutContent')



 

<fieldset>
      <div class="card-heading step-billing-heading">
      <h3><i class="fas fa-map-marker-alt"></i> Billing Address</h3>     

      <div id="messages"></div>
    </div>
                     
   <div class="checkout-billing-address p-4">
      <form method="post" id="billingForm" class="row">  
        @csrf
        <div class="col-md-6">
               <!-- {{textbox($errors,'Name','name',$address->name)}} -->

            <div class="form-group">
              <input type="text" id="name" class="form-control" name="name" 
              value="{{$address->name}}" 
              placeholder="Enter your Name">
              <span class="input-icon"><i class="fas fa-user"></i></span>
           </div>


        </div>
        <div class="col-md-6">
               <!-- {{textbox($errors,'Email','email',$address->email)}} -->
            <div class="form-group">
              <input type="email" id="email" class="form-control" name="email" 
              value="{{$address->email}}" 
              placeholder="Enter your Email">
              <span class="input-icon"><i class="fas fa-envelope"></i></span>
           </div>

        </div> 
        <div class="col-md-6">
               <!-- {{textbox($errors,'Phone Number','phone_number',$address->phone_number)}} -->
               <div class="form-group">
              <input type="text" id="phone_number" class="form-control" name="phone_number" 
              value="{{$address->phone_number}}" 
              placeholder="Enter your Phone Number">
              <span class="input-icon"><i class="fa fa-phone"></i></span>
           </div>
        </div> 
        <div class="col-md-6">
               <!-- {{textbox($errors,'Address','address',$address->address)}} -->
               <div class="form-group">
              <input type="text" id="address" class="form-control" name="address" autocomplete="false" 
              value="{{$address->address}}" 
              placeholder="Enter your Address">
              <span class="input-icon"><i class="fas fa-search-location"></i></span>
           </div>
        </div> 
        <div class="col-md-6">
               <!-- {{textbox($errors,'Country','country',$address->country)}} -->
               <div class="form-group">
              <input type="text" id="country" class="form-control" name="country" 
              value="{{$address->country}}" 
              placeholder="Enter your Country">
              <span class="input-icon"><i class="fas fa-flag"></i></span>
           </div>
        </div> 
        <div class="col-md-6">
               <!-- {{textbox($errors,'State','state',$address->state)}} -->
               <div class="form-group">
              <input type="text" id="state" class="form-control" name="state" 
              value="{{$address->state}}" 
              placeholder="Enter your State">
              <span class="input-icon"><i class="fas fa-map-marker-alt"></i></span>
           </div>
        </div> 
        <div class="col-md-6">
               <!-- {{textbox($errors,'City','city',$address->city)}} -->
               <div class="form-group">
              <input type="text" id="city" class="form-control" name="city" 
              value="{{$address->city}}" 
              placeholder="Enter your City">
              <span class="input-icon"><i class="fas fa-city"></i></span>
           </div>
        </div> 
        <div class="col-md-6">
               <!-- {{textbox($errors,'Zipcode','zipcode',$address->zipcode)}} -->
               <div class="form-group">
              <input type="text" id="zipcode" class="form-control" name="zipcode" 
              value="{{$address->zipcode}}" 
              placeholder="Enter Your Zipcode">
              <span class="input-icon"><i class="fas fa-mail-bulk"></i></span>
           </div>
        </div>

        
        <input type="hidden" id="country_short_code" name="country_short_code" value="{{ $address->country_short_code }}">
        <input type="hidden" id="latitude" name="latitude" value="{{ $address->latitude }}">
        <input type="hidden" id="longitude" name="longitude" value="{{ $address->longitude }}">

        <div class="col-md-12">

           <!-- <button class="cstm-btn solid-btn">Continue</button> -->
           <div class="multistep-footer mt-4 text-right"> 
             <button id="billingFormBtn" type="submit" class="cstm-btn solid-btn">Save & Continue</button>
          </div>

        </div>
      </form>
                          
   </div>

</fieldset>








<div class="upcomming-step">
@include('users.checkout.completedSteps.orderSummary')
@include('users.checkout.completedSteps.payment')

</div>

 
<input type="hidden" name="cartRoute" value="{{$submitBillingForm}}">
 
@endsection

@section('scripts')
<script type="text/javascript" src="{{url('/js/cartpage.js')}}"></script>

<script src="{{ asset('/js/checkout/billingValidation.js') }}" ></script>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDULjv0UAVmj_zgc9GjBhJNh9fNuEj87LQ&libraries=places"></script>

 <script type="text/javascript">
   
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
            var addressType = addressType;
            switch (addressType) { 
              case 'locality': 
                document.getElementById('city').value = val;
                break;
              case 'administrative_area_level_1': 
                document.getElementById('state').value = val;
                break;
              case 'postal_code': 
                document.getElementById('zipcode').value = val;
                break;               
              case 'country': 
                document.getElementById('country').value = val;
                document.getElementById('country_short_code').value = place.address_components[i].short_name;
                break;                  
            }            
          }
        }
        document.getElementById('latitude').value = place.geometry.location.lat();
        document.getElementById('longitude').value = place.geometry.location.lng();
        document.getElementById('address').value = place.name;
        autocompleted = true;
    });
}
google.maps.event.addDomListener(window, 'load', initialize);   

 </script>

@endsection