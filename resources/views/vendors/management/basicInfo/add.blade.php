@extends('vendors.management.layout')
@section('vendorContents')
<div class="container-fluid">
   <div class="page_head-card">
      <div class="page-info">
         <div class="page-header-title">
            <h3 class="m-b-10">{{$title}}</h3>
         </div>
         <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('vendor_dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route($addLink, $slug) }}">List</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Add</a></li>
         </ul>
      </div>
   </div>
   @include('vendors.errors')
   <div class="row">
      <div class="col-lg-12">
         <div class="card vendor-dash-card">
            <div class="card-header">
               <h3>{{$title}}</h3>
            </div>
            <div class="card-body">
               <!-- 
                  <h3>   <a href="{{url(route('vendor_faqsadd_management',$slug))}}"><i class="fa fa-plus"></i></a></h3> -->
               <form method="post" id="basicInfoForm" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="type" value="basic_information">
                  <div class="">
                     <div class="panel panel-default">
                        <div class="panel-heading">Business Info</div>
                        <div class="panel-body">
                           <div class="row">
                              <div class="col-md-6">{{textbox($errors,'Business Name*','business_name', $business_name)}}</div>

                              <div class="col-md-6">{{textbox($errors,'Company*','company',$company)}}</div>
                              
                              <div class="col-md-6">{{textbox($errors,'Phone number*','phone_number',$phone_number)}}</div>
                              
                              <div class="col-md-6">{{textbox($errors,'Website*','website',$website)}}</div>
                              
                              <div class="col-md-6">{{textbox($errors,'Basic Price*','min_price',$min_price)}}</div>

                               <div class="col-md-6">{{textbox($errors,'Min Guest*','min_guest',$min_guest)}}</div>


                              <div class="col-md-12">{{textarea($errors, 'Short Description about your Business*', 'short_description', $short_description)}}</div>
                               
                            <!-- <input type="hidden" name="address" value="{{$address}}"> -->
                           </div>
                        </div>
                     </div>

                     @if($category->cover_type == 1)
                     <div class="panel panel-default">
                        <div class="panel-heading">Business Cover Image</div>
                        <div class="panel-body">
                           <div class="row">
                              <div class="col-md-6">  

                             
        
                                <div class="form-group">
                                  <label class="label-file">Business Cover Image*</label>
                                  <input type="file" {{ $address ? '' : 'required' }} accept="image/*" multiple onchange="ValidateSingleInput(this, 'image_src')" class="form-control" name="cover_photo">

                                  @if ($errors->has('cover_photo'))
                                      <div class="error">{{ $errors->first('cover_photo') }}</div>
                                  @endif
                                 </div>

                                 </div>
                                    <div class="col-md-6">
                                       <img src="<?= url($cover_photo) ?>" style="display: {{ $cover_photo ? 'block' : 'none'  }} " id="image_src" width="200"/>
                                    </div>
                                 </div>
                              </div>
                           </div>

                     @else


                      <div class="panel panel-default">
                        <div class="panel-heading">Business Cover Video</div>
                        <div class="panel-body">
                           <div class="row">
                              <div class="col-md-6"> 
 
                                <div class="form-group">
                                 <label>Business Cover Photo</label>
                                 <input type="file" name="cover_video_image" class="form-control">
                                 <label class="error">{{$errors->first('cover_video_image')}}</label>
                              </div>

                            </div>
                              <div class="col-md-6">  

                                     
                                      <div class="form-group">
                                         <label>Business Cover Video</label>
                                         <input type="file" name="cover_video" class="form-control">
                                          <label class="error">{{$errors->first('cover_video')}}</label>

                                      </div>

                              </div>
                              <div class="col-md-6">
                                 <?php  if($cover_video_image != ""): ?>
                                 <img src="<?= url($cover_video_image) ?>" width="100%">
                                 <?php endif; ?>
                              </div>

                              <div class="col-md-6">
                                 <?php if($cover_video != ""):?>

                                    <video width="100%" height="340" controls>
                                         <source src="<?= url($cover_video) ?>" type="video/mp4">
                                         <source src="movie.ogg" type="video/ogg">
                                         Your browser does not support the video tag.
                                       </video>

                                 <?php endif; ?>
                              </div>
                           </div>
                        </div>
                     </div>

 
                     @endif
                     <div class="panel panel-default">
                        <div class="panel-heading">Business Document</div>
                        <div class="panel-body">
                           <div class="row">
                              <div class="col-md-6">
                                  {{choosefile($errors,'Business address proof 1','bessiness_address_proof_1')}}
                              </div>
                              <div class="col-md-6">
                                @if($bessiness_address_proof_1 !="")
                                <a href="javascript::void(0)" data-href="{{url($bessiness_address_proof_1)}}"  class="viewDocument cstm-btn">View Business address proof 1</a>
                              @else N/A @endif</div>
                             <div class="col-md-6">
                                  {{choosefile($errors,'Business address proof 2','bessiness_address_proof_2')}}
                              </div>
                              <div class="col-md-6">@if($bessiness_address_proof_2 !="")
                                <a href="javascript::void(0)" data-href="{{url($bessiness_address_proof_2)}}" class="viewDocument cstm-btn">View Business address proof 2</a>
                              @else N/A @endif</div>

                              <div class="col-md-6">
                                  {{choosefile($errors,'Business Registration proof','business_registation_proof')}}
                              </div>
                              <div class="col-md-6">
                                @if($business_registation_proof !="")
                                <a href="javascript::void(0)" data-href="{{url($business_registation_proof)}}" class="viewDocument cstm-btn">View Business address proof 1</a>@else N/A @endif</div>


                           </div>
                        </div>
                     </div>

                     <div class="panel panel-default">
                        <div class="panel-heading">Travelling Range</div>
                        <div class="panel-body">
                           <div class="row">
                              <div class="col-md-12">
                                 {{textbox($errors,'Max Travel Distance (In Miles)*','travel_distaince',$travel_distaince)}}
                              </div>
                           </div>
                        </div>
                     </div>

                  @if($VendorCategory ->category->capacity == 1)

                    <div class="panel panel-default">
                        <div class="panel-heading">Guest Capacity</div>
                        <div class="panel-body">
                           <div class="row">
                              <div class="col-xl-4 col-lg-6">
                                  <div class="vendor-category">
                                    <div class="category-checkboxes category-title">
                                    <input type="radio" name="capacity_type" value="1" id="category-1" 
                                    {{$VendorCategory->capacity_type == 1 || old('capacity_type') == 1 ? 'checked' : ''}} 
                                    {{$VendorCategory->capacity_type == 0 || old('capacity_type') == 1 ? 'checked' : ''}}>
                                         <label for="category-1">Sitting Guest Capacity</label>
                                    </div>
                                 </div>
                              </div>

                              <div class="col-xl-4 col-lg-6">
                                  <div class="vendor-category">
                                    <div class="category-checkboxes category-title">
                                    <input type="radio" name="capacity_type" value="2" id="category-2" 
                                    {{$VendorCategory->capacity_type == 2 || old('capacity_type') == 2 ? 'checked' : ''}}>
                                         <label for="category-2">Standing Guest Capacity</label>
                                    </div>
                                 </div>
                              </div>

                              <div class="col-xl-4 col-lg-6">
                                  <div class="vendor-category">
                                    <div class="category-checkboxes category-title">
                                    <input type="radio" name="capacity_type" value="3" id="category-3" 
                                    {{$VendorCategory->capacity_type == 3 || old('capacity_type') == 3 ? 'checked' : ''}}>
                                         <label for="category-3">Both Sitting/Standing</label>
                                    </div>
                                 </div>
                              </div>
                           </div>

                           <div class="row" id="loadCapcity">


                           </div>
                        </div>
                     </div>
                     @endif

                     <div class="panel panel-default">
                        <div class="panel-body">
                           <div class="row">
                              <div class="col-md-12">
                                 {{textbox($errors,'Business Location','business_location', $VendorCategory->business_location,$address)}}
                              </div>

                              <div class="col-md-6">
                                 {{textbox($errors,'Latitude','latitude',$VendorCategory->latitude)}}
                              </div>

                              <div class="col-md-6">
                                 {{textbox($errors,'Longitude','longitude',$VendorCategory->longitude)}}
                              </div>
                           </div>
                        </div>
                     </div>                     

                     <div class="panel panel-default">
                        <div class="panel-heading">Social Media Links</div>
                        <div class="panel-body">
                           <div class="row">
                              <div class="col-md-6">
                                 {{textbox($errors,'Facebook Link','facebook_url',$facebook_url)}}
                              </div>
                              <div class="col-md-6">
                                 {{textbox($errors,'Linkedin Link','linkedin_url',$linkedin_url)}}
                              </div>

                              <div class="col-md-6">
                                 {{textbox($errors,'Twitter Link','twitter_url',$twitter_url)}}
                              </div>                              
                              <div class="col-md-6">
                                 {{textbox($errors,'Instagram Link','instagram_url',$instagram_url)}}
                              </div>                              
                              <div class="col-md-6">
                                 {{textbox($errors,'Pinterest Link','pinterest_url',$pinterest_url)}}
                              </div>
                           </div>
                        </div>
                     </div>




                  </div>
                  <button class="cstm-btn" id="basicInfoBtn">Save</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
</div>






<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Business Document</h4>
      </div>
      <div class="modal-body">
       <img src="" width="100%">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')

 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{ getAllValueWithMeta('google_api_key', 'global-settings') }}&libraries=places"></script>

<script src="{{url('/js/validations/basicInfoValidation.js')}}"></script>
<script src="{{url('/js/validations/imageShow.js')}}"></script>

<script type="text/javascript">



  $("body").on('click','.viewDocument',function(e){
      e.preventDefault();
      var url = $( this ).attr('data-href');

      $('#myModal').find('.modal-body').find('img').attr('src',url);

      $('#myModal').modal('show');


  });




jQuery("body").on('change','input[name=capacity_type]',function(){
   
   capacity_type();
});

capacity_type();
function capacity_type() {

    var val = $('input[name=capacity_type]:checked').val();
    var text ="";  
    if(val == 1){
      
      text +="<div class='col-md-12'>"+textbox('Sitting','sitting_capacity','<?= $VendorCategory->sitting_capacity ?>')+"</div>";


    }else if(val == 2){

      text +="<div class='col-md-12'>"+textbox('Standing','standing_capacity','<?= $VendorCategory->standing_capacity ?>')+"</div>";

    }else{
      text +="<div class='col-md-6'>"+textbox('Sitting','sitting_capacity','<?= $VendorCategory->sitting_capacity ?>')+"</div>";
      text +="<div class='col-md-6'>"+textbox('Standing','standing_capacity','<?= $VendorCategory->standing_capacity ?>')+"</div>";
    }


    jQuery('#loadCapcity').html(text);
}



function textbox(label,name,val='') {
      text  ="<div class='form-group label-floating is-empty'>";
      text +="<label class='control-label'>"+label+"</label>";
      text +='<input type="text" class="form-control " name="'+name+'" value="'+val+'" id="'+name+'">';
      text +="</div>";

      return text;
}














  
function initialize() 
{
    var input = document.getElementById('business_location');
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

</script>
@endsection