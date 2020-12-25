@extends('layouts.admin')
 
@section('content')

 <div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Upload Coupon CSV</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
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

              <form role="form" class="manage_coupon" action="{{route('save_coupon_csv')}}" method="post" id="venueForm" enctype="multipart/form-data">
                
                   @csrf

                   <label class="control-label">Upload Coupon CSV<span class="cst-upper-star">*</span></label>
                   <input type="file" class="form-control" name="csv"><br/>

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