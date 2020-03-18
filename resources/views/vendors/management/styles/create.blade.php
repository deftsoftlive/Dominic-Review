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
               <form method="post" id="basicInfoForm" action="{{ route('vendor_store_style', $slug) }}" enctype="multipart/form-data">
                  @csrf
                  <div class="">
                     <div class="panel panel-default">
                        <div class="panel-body">
                           
                              {{textbox($errors,'Style Title*','title')}}
                           
                        </div>
                     </div>                     

                     <div class="panel panel-default">
                        <div class="panel-body">
                           
                              {{textarea($errors,'Style Description*','description')}}
                           
                        </div>
                     </div>                     

                     <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="form-group">
                           
                              {{choosefile($errors,'Style Image*','image')}}
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

@endsection

@section('scripts')
<script src="{{url('/js/validations/styleValidation.js')}}"></script>
@endsection