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
                <li class="breadcrumb-item"><a href="javascript:void(0)">Edit</a></li>
            </ul>
        </div>
  </div>
@include('vendors.errors')
    <div class="row">
       <div class="col-lg-12">
          <div class="card vendor-dash-card">
            <div class="card-header"><h3>{{$title}}</h3></div>
                <div class="card-body">

     
          <form method="post" id="packageForm">
      @csrf
          {{textbox($errors,'Title*','title', $package->title)}}
          {{textarea($errors,'Description*','description', $package->description)}}
          {{textarea($errors,'Do You Have Menus*','menus', $package->menus)}}

          <div class="row">

            <div class="col-md-3">
              <div class="form-group">
           <!-- <div class="radio">
            <label><input type="radio" name="price_type" value="per_person" {{ $package->price_type === 'per_person' ? 'checked' : '' }}>Price Per Person</label>
          </div>
          <div class="radio">
            <label><input type="radio" name="price_type" value="fix" {{ $package->price_type === 'fix' ? 'checked' : '' }}>Fix Price</label>
          </div> -->

               <label>Price status</label>

            <div class="custom-control custom-radio mb-1">
        <input type="radio" id="PriceType1" name="price_type" value="per_person" class="custom-control-input" checked>
        <label class="custom-control-label" for="PriceType1">Price Per Person</label>
      </div>

       <div class="custom-control custom-radio">
        <input type="radio" id="PriceType" name="price_type" value="per_person" class="custom-control-input">
        <label class="custom-control-label" for="PriceType">Fix Price</label>
      </div>



          </div>
            </div>

            <div class="col-md-3">
               <div class="form-group">
            <label for="min_person">Minimum Persom</label>
            <input type="number" value="{{$package->min_person}}" class="form-control" id="min_person" name="min_person" placeholder="Minimum Person" />
            @if ($errors->has('min_person'))
                <div class="error">{{ $errors->first('min_person') }}</div>
            @endif
          </div>
            </div>
            <div class="col-md-3">
               <div class="form-group">
            <label for="max_person">Maximum Person</label>
            <input type="number" value="{{$package->max_person}}" class="form-control" id="max_person" name="max_person" placeholder="Maximum Person" />
            @if ($errors->has('max_person'))
                <div class="error">{{ $errors->first('max_person') }}</div>
            @endif
          </div>
            </div>
             <div class="col-md-3">
               <div class="form-group">
            <label for="price">Price</label>
            <input type="text" value="{{$package->price}}" class="form-control" id="price" name="price" placeholder="Price">
            @if ($errors->has('price'))
                <div class="error">{{ $errors->first('price') }}</div>
            @endif
          </div>
            </div>
          </div>

          <div class="form-group">
            <label for="no_of_hours">Number Of Hours</label>
            <input type="number" value="{{$package->no_of_hours}}" class="form-control" id="no_of_hours" name="no_of_hours" placeholder="Number Of Hours">
            @if ($errors->has('no_of_hours'))
                <div class="error">{{ $errors->first('no_of_hours') }}</div>
            @endif
            </div>

            <div class="form-group">
            <label for="no_of_days">Number Of Days</label>
            <input type="number" class="form-control" value="{{$package->no_of_days}}" id="no_of_days" name="no_of_days" placeholder="Number Of Days">
            @if ($errors->has('no_of_days'))
                <div class="error">{{ $errors->first('no_of_days') }}</div>
            @endif
            </div>


 @if(count($category->categoryAmenity))
<div class="form-group">
  <div class="row">
            <div class="col-lg-12">
            <label for="no_of_hours">Do You Have Amenities?</label>
</div>
            @foreach($category->categoryAmenity as $cate)
                  <div class="col-lg-6">
                   <div class="vendor-category">
                      <div class="category-checkboxes category-title">
                      <input type="checkbox" name="amenity[]" value="{{$cate->Amenity->id}}" id="amenity_{{$cate->Amenity->id}}" {{activePackageMetaData(\Auth::User()->id, $category->id, $cate->Amenity->id, 'amenities', $package->id)}}>
                           <label for="amenity_{{$cate->Amenity->id}}">{{$cate->Amenity->name}}  </label>
 
                    </div>
                   </div>
                  </div>       
                 @endforeach
               </div>
               </div>
 @endif



 @if(count($category->CategoryGames))
<div class="form-group">
         <div class="row">
            <div class="col-lg-12">
            <label for="no_of_hours">Do You Have Games?</label>
            </div>
            @foreach($category->CategoryGames as $cate)
                  <div class="col-lg-6">
                   <div class="vendor-category">
                      <div class="category-checkboxes category-title">
                      <input type="checkbox" name="games[]" value="{{$cate->Amenity->id}}" id="game_{{$cate->Amenity->id}}" {{activePackageMetaData(\Auth::User()->id, $category->id, $cate->Amenity->id, 'games', $package->id)}}>
                           <label for="game_{{$cate->Amenity->id}}">{{$cate->Amenity->name}}  </label> 
                    </div>
                   </div>
                  </div>       
                 @endforeach
               </div>
             </div>
      @endif

 @if(count($category->categoryEvent))
<div class="form-group">
  <div class="row">
            <div class="col-lg-12">
            <label for="no_of_hours">Do You Have Event?</label>
</div>
            @foreach($category->categoryEvent as $cate)
                  <div class="col-lg-6">
                   <div class="vendor-category">
                      <div class="category-checkboxes category-title">
                      <input type="checkbox" name="event_type[]" value="{{$cate->Event->id}}" id="event_{{$cate->Event->id}}" {{activePackageMetaData(\Auth::User()->id, $category->id, $cate->Event->id, 'events', $package->id)}}>
                           <label for="event_{{$cate->Event->id}}">{{$cate->Event->name}}  </label>
 
                    </div>
                    </div>
                  </div>
                 @endforeach
               </div>
</div>
@endif
               <div class="form-group">
           

         <!--   <div class="custom-control custom-radio mb-1">
        <input type="radio" id="status" name="status" value="per_person" class="custom-control-input" checked>
        <label class="custom-control-label" for="status">Price Per Person</label>
      </div>

       <div class="custom-control custom-radio">
        <input type="radio" id="status2" name="status" value="per_person" class="custom-control-input">
        <label class="custom-control-label" for="status2">Fix Price</label>
      </div> -->


          </div>

            <button id="packageFormBtn" class="cstm-btn">Save</button>
      </form>                 

   
    </div>
   </div>
  </div>
  </div>
</div>
 
</div>
@endsection

@section('scripts')
<script src="{{url('/js/validations/packageValidation.js')}}"></script>

<script type="text/javascript">
  var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserWindowWidth  : 800,
        filebrowserWindowHeight : 500,
        uiColor: '#eda208',
        removePlugins: 'save, newpage',
        allowedContent:true,
        fillEmptyBlocks:true,
        extraAllowedContent:'div, a, span, section, img'
      };
  CKEDITOR.replace('description', options);
  CKEDITOR.replace('menus', options);
</script>
@endsection
