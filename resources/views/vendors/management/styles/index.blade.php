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
                <li class="breadcrumb-item"><a href="javascript:void(0)">Styles</a></li>
                <li class="breadcrumb-item"><a href="{{ route('vendor_listing_style', $slug) }}">List Styles</a></li>
                <li class="breadcrumb-item"><a href="{{ route('vendor_new_style', $slug) }}">Add New Styles</a></li>
            </ul>
        </div>
  </div>
  
  @include('vendors.errors')

    <div class="row">
       <div class="col-lg-12">
          <div class="card vendor-dash-card">
            <div class="card-header"><h3>{{$title}}</h3></div>
                <div class="card-body">
  <form id="assignCategory" method="POST">
              <div class="row ">
                 @if($styles->count() > 0)
                 @foreach($styles->get() as $s)
                  <div class="col-lg-6">
                   <div class="vendor-category">
                      <div class="category-checkboxes category-title">
                      <input type="checkbox" name="styles[]" value="{{$s->id}}" id="category-{{$s->id}}"
                       {{activeCategoryMetaData(Auth::User()->id,$category->category_id, $s->id, 'styles')}}>
                           <label for="category-{{$s->id}}">{{$s->title}}  </label>
                    </div>                    
                   </div>
                  </div>
                 @endforeach
                 <div class="col-md-12">
                      @csrf 
                  <div class="btn-wrap mt-2 mb-3">
                      <button class="cstm-btn" id="assignCategoryBtn">Assign</button>
                    </div>
                      <div class="errorMessages"></div>
                 </div>
                   @else
                   <div class="col-md-12">
                    <div class="alert alert-warning" role="alert">Styles are not assigned to this Category.</div>
                  </div>
                 @endif
                 </div>
                </form>
     <div class="col-md-12"> 
    </div>
    </div>
   </div>
  </div>
  </div>
</div>
 
</div>
@endsection

@section('scripts')
<script src="{{url('/js/validations/styleValidation.js')}}"></script>
@endsection
