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
                <li class="breadcrumb-item"><a href="{{ route('vendor_new_style', $slug) }}">Add New Styles</a></li>
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
            @if(@sizeof($styles)) @foreach($styles as $loopingStyles)
            <div class="card-body">
                <div class="deals-card">
                    <figure class="deal-img">
                      <img src="{{ asset('uploads/'.$loopingStyles->image) }}">    
                    </figure>
                     <div class="detal-card-details">
                      <div class="dealls-dis-head">
                        <a href="http://49.249.236.30:8654/listing/photography/kanny-photo-lab#deals-sec"> <h4>{{ $loopingStyles->title }}</h4></a>
                      </div>
                      <p class="deal-discription">
                          {{ $loopingStyles->description }}
                        </p>
                        <ul class="acrdn-action-btns single-row">
                          <li><a data-toggle="tooltip" title="" href="{{url(route('vendor_edit_styles_management',[$slug, $loopingStyles->slug,$loopingStyles->id]))}}" class="action_btn dark-btn" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></a></li>         
                          <li><a data-toggle="tooltip" title="" onclick="deleteItem(this)" href="javascript:void(0)" data-delurl="{{url(route('vendor_delete_styles_management',[$loopingStyles->slug,$loopingStyles->id]))}}" class="action_btn danger-btn" data-original-title="Delete"><i class="fas fa-trash-alt"></i></a></li>   
                        </ul>
                     </div>

                  </div>                
            </div>
            @endforeach
            @else
                  <div class="col-md-12">
                    <div class="alert alert-warning" role="alert">Styles has not been added yet.</div>
                  </div>
            @endif
         </div>
      </div>
   </div>


  </div>
</div>

@endsection