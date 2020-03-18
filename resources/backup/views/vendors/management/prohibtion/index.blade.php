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
                <li class="breadcrumb-item"><a href="javascript:void(0)">List</a></li>
            </ul>
        </div>
        <div class="side-btns-wrap">
          <a href="{{url(route($addLink, $slug))}}" class="add_btn"><i class="fa {{$prohibtion == ""?'fa-plus':'fa-pencil-alt'}}"></i></a>
        </div>
  </div>

@include('vendors.errors')
 
    <div class="row">
       <div class="col-lg-12">
          <div class="card vendor-dash-card">
            <div class="card-header">
              <h3>{{$title}} </h3>
            </div>
                <div class="card-body">

 
 

     <div class="col-md-12"> 
      @if($prohibtion == "")  
           <p>Not added yet.</p>
      @endif
        <?= $prohibtion ?>      

    </div>
    </div>
   </div>
  </div>
  </div>
</div>
 
</div>
@endsection

@section('scripts')
<script type="text/javascript">
  CKEDITOR.replace('answer');
</script>
@endsection
