@extends('layouts.vendor')
@section('vendorContents')


<div class="container-fluid">
 <div class="page_head-card">
    <div class="page-info">
            <div class="page-header-title">
                <h3 class="m-b-10">{{$title}}</h3>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('vendor_dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">List</a></li>
            </ul>
        </div>
        <div class="side-btns-wrap">
          <a href="{{url(route('vendor_packagesadd_management', $slug))}}" class="add_btn"><i class="fa fa-plus"></i></a>
        </div>
  </div>
@include('vendors.errors')
    <div class="row">
       <div class="col-lg-12">
          <div class="card vendor-dash-card">
       <div class="card-header"><h3>{{$title}}  
        </h3></div>
           <div class="card-body">

  <div class="packages-wrap">
    <div class="row"> 
@foreach($packages as $k => $f)
  <div class="col-lg-4">

<div class="package-card">
  <div class="inn-card">
    <div class="title">
      <div class="icon">
        <i class="fas fa-hand-holding-usd"></i>
      </div>
      <span class="pkg-amount">{{ $f->price }}</span>
    </div>
    <div class="content">
      <h3 class="price-table-heading">Title {{$f->title}}</h3>
      <div class="pricing-category">
      <div class="pkg-summary">
       <label>Decription</label> 
      <p class="card-text">{!! $f->description !!}</p>
      </div>
      @if(!empty($f->menus))
      <div class="pkg-summary">      
      <label>Menus</label> 
       <p class="card-text">{!! $f->menus !!}</p>
      </div>
      @endif
  </div>

      <!-- rk package details start -->
      @if(count($f->amenities) || count($f->games) || count($f->events))

     <div class="pricing-category">
      <div class="row">
@if(count($f->amenities))
<div class="col-md-6">
        <label for="no_of_hours">Amenities</label>

    <?php $amenities = getPackageAmenities($f); ?>
  <?php $packageEvents = getPackageEvents($f); ?>
 <?php $getPackageGames = getPackageGames($f); ?>
        @foreach($amenities as $amenity)
        <ul class="pkg-listing-grp"> 
        <li class="pkg-listing">{{$amenity->amenity->name}}</li>
      </ul>   
      @endforeach
 </div>
 @endif

    @if(count($f->games))
<div class="col-md-6">
  <label for="no_of_hours">Games</label>
            @foreach($getPackageGames as $game)
            <ul class="pkg-listing-grp">  
              <li class="pkg-listing">{{$game->amenity->name}}</li>
            </ul>
            @endforeach 
             </div>
      @endif

 @if(count($f->events))
<div class="col-md-6">
  <label for="no_of_hours">Events</label>
 @foreach($packageEvents as $amenity)
        <ul class="pkg-listing-grp">  
          <li class="pkg-listing">{{$amenity->event->name}}</li>
        </ul>
     @endforeach
</div>
 @endif
</div>
</div>
@endif
<!--  -->

 @if(count($f->package_addons))
<div class="pricing-category">
  <label for="no_of_hours">Add Ons</label>
     @foreach($f->package_addons as $pcd)
     <div class="vendor-category">
      <div class="category-checkboxes category-title">
        {{$pcd->key}}
        ${{$pcd->key_value}}
        <ul class="acrdn-action-btns">
          <li>
            <a onclick="deleteItem(this)" href="javascript:void(0)" data-delurl="{{ route('vendor_packagesAddOns_delete_management', ['slug' => $slug, 'id' => $pcd->id]) }}" class="action_btn danger-btn" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></a>
          </li>
        </ul>
      </div>
     </div>
   @endforeach
 </div>
 @endif
<table class="pricing-inn-table">
  <tr>
      <th>Price</th>
      <td>${{$f->price}}</td>
  </tr>
   <tr>
   <th>Number Of Hours</th>
    <td>{{$f->no_of_hours}}</td>
  </tr>
     <tr>
   <th>Number Of Days</th>
    <td>{{$f->no_of_days}}</td>
  </tr>
  
    <tr>
      <th>Price Type</th>
     <td>{{ $f->price_type === 'fix' ? 'Fix Price' : 'Price Per Person' }}</td>
   </tr>

 <tr>
  <th>Minimum Person</th>
     <td>{{$f->min_person}}</td>
   </tr>
<tr>
<th>Maximum Person</th>
<td>{{$f->max_person}}</td>
</tr>
<tr>
  <th>
Status</th>
<td>{{ $f->status === 1 ? 'Active' : 'InActive' }}</td>
</tr>
</table>


     <div class="pkg-footer text-center">
      <ul class="acrdn-action-btns single-row">
          <li><a href="{{ route('vendor_packagesedit_management', ['slug' => $category->slug, 'id' => $f->slug]) }}" class="action_btn dark-btn" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a></li>
          <li>          
            <a href="javascript:void(0);" class="action_btn btn-primary" id="addOns" onclick="openModel()" data-toggle="modal" data-target="#Addons_{{$f->id}}" data-toggle="tooltip" title="Add Ons"><i class="fas fa-plus"></i></a>
          </li>
          <li><a onclick="deleteItem(this)" href="javascript:void(0)" data-delurl="{{ route('vendor_packages_delete_management', ['slug' => $category->slug, 'id' => $f->id]) }}" class="action_btn danger-btn" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></a></li>   
        </ul>
      </div>

    </div>
  </div>
</div> 




  </div>
  <!-- ========================= -->

<!-- The Modal -->
<div class="modal" id="Addons_{{$f->id}}">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Ons</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

<form method="post" action="{{ route('vendor_packagesAddOns_management', ['slug' => $slug, 'id' => $f->id]) }}">
  @csrf
      <!-- Modal body -->
      <div class="modal-body">

      <div class="input_fields_wrap">
          <div class="form-group"><input id="title[]" required class="form-control" name="title[]" placeholder="Title"></div>
          <div class="form-group"><input type="number" required min="1" class="form-control" id="price[]" name="price[]" placeholder="Price"></div>
      </div>
       <button id="add_field_button_{{$k}}" onclick="addForm(this.id)" type="button" class="cstm-btn">Add More Fields</button>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
</form>

    </div>
  </div>
</div>

   <!-- ========================= -->



  @endforeach
</div> 
</div>

</div>
</div>
</div>
</div>
</div>


{{$packages->links()}}
   
@endsection

@section('scripts')
<script type="text/javascript">
  $(document).ready(function() {
  var max_fields      = 10; //maximum input boxes allowed
  var wrapper       = $(".input_fields_wrap"); //Fields wrapper
  
  var x = 1; //initlal text box count
  
  $(wrapper).on("click",".remove_field", function(e) { //user click on remove text
    e.preventDefault(); $(this).parent('div').remove(); x--;
  });
});

function openModel() {
  $('.addsform').remove();
}

function addForm(id) {
  $(`#${id}`).closest('div').find('.input_fields_wrap').append(`<div class="addsform" id="addsform"><div class="form-group"><input required id="title[]" class="form-control" name="title[]" placeholder="Title"></div>
     <div class="form-group"><input type="number" min="1" class="form-control" required id="price[]" name="price[]" placeholder="Price"></div><a href="#" class="remove_field">Remove</a></div>`);
}

</script>
@endsection
