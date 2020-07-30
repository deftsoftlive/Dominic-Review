@extends('layouts.admin')
 
@section('content')
 <div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">{{$title}}</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item "><a href="{{ route($addLink) }}">View</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<section class="content">
  <div class="row">
      <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
            @include('admin.error_message')
 
            <div class="card-body">

            <div class="col-md-12">

              <form role="form" method="post" id="venueForm" enctype="multipart/form-data">
                
                   @csrf
                  
                   {{textbox($errors,'Title<span class="cst-upper-star">*</span>','title', $venue->title)}}
                   {{textbox($errors,'URL<span class="cst-upper-star">*</span>','url', $venue->url)}}

                   <label class="control-label">Type</label>
                   <select class="form-control" name="type">
                     <option value="" selected="" disabled="">Select Type</option>
                     <option value="header" @if($venue->type == 'header') selected @endif>Header Menu</option>
                     <option value="footer" @if($venue->type == 'footer') selected @endif>Footer Menu</option>
                   </select>
                   <br/>

                   <label class="control-label">Select Menu</label>
                   <select class="form-control" name="sub_menu">
                     <option value="" selected="" disabled="">Select Menu</option>

                      @php 
                        $menus = DB::table('menus')->where('id','!=',$venue->id)->where('type','header')->where('sub_menu',NULL)->get();
                      @endphp

                      @foreach($menus as $me)
                        <option @if($me->id == $venue->id) selected @endif value="{{$me->id}}">{{$me->title}}</option>
                      @endforeach

                   </select>
              
                <div class="card-footer pl-0">
                  <button type="submit" id="btnVanue" class="btn btn-primary">Submit</button>
                </div>

              </form>

              </div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- /.card -->
      </div>
      <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
    
@endsection

@section('scripts')
<script src="{{url('/admin-assets/js/validations/valueValidation.js')}}"></script>
<script src="{{url('/js/validations/imageShow.js')}}"></script>
@endsection