@extends('layouts.admin')
 
@section('content')
 <div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Change Course</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{url('/admin/purchased-course')}}"><b>Purchased Courses</b></a></li>
                    <li class="breadcrumb-item">Change Course</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@if(Session::has('success'))
    <div class="alert_msg alert alert-success">
      <p>{{ Session::get('success') }} </p>
    </div>
@endif

@if(Session::has('error'))
    <div class="alert_msg alert alert-danger">
      <p>{{ Session::get('error') }} </p>
    </div>
@endif
<a style="float:right;" href="{{url('/admin/purchased-course')}}" class="btn btn-primary">Back</a>
<br/><br/><br/>
<section class="content">
  <div class="row">
      <div class="col-12">
        <div class="card">


            <!-- /.card-header -->
        @include('admin.error_message')
 
          <div class="card-body">

              <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table class="table table-bordered  cst-reports reports-detail" style="width:100%">
                      <tr>
                        <th>Date</th>
                        <th>Player Name</th> 
                        <th>Parent Name</th>
                        <th>Purchased Course</th>
                      </tr>
                      <tr>
                        <td style="width:25%"><p>@php echo date("d-m-Y",strtotime($shop_cart_items->created_at)); @endphp</p></td>
                        <td style="width:25%"><p>@php echo getUsername($shop_cart_items->child_id); @endphp</p></td>
                        <td style="width:25%"><p>@php echo getUsername($shop_cart_items->user_id); @endphp</p></td>
                        <td style="width:25%"><p>@php echo getCourseName($shop_cart_items->product_id); @endphp</p></td>
                    </tr>
                    </table>
                </div>
              </div>

              <form action="{{route('save_change_course')}}" enctype="multipart/form-data">
                
                @csrf
                <input type="hidden" name="shop_id" value="{{$shop_cart_items->id}}">
                <input type="hidden" name="player_id" value="{{$shop_cart_items->child_id}}">
                <input type="hidden" name="parent_id" value="{{$shop_cart_items->user_id}}">
                <input type="hidden" name="old_course_id" value="{{$shop_cart_items->product_id}}">

                  <label class="control-label">Change Course<span class="cst-upper-star">*</span></label>
                  @php $courses = DB::table('courses')->where('status',1)->orderby('id','desc')->get(); @endphp
                  <select class="form-control" name="course">
                    <option disabled selected="" value="">Select Course</option>
                    @foreach($courses as $co)
                      <option value="{{$co->id}}">{{$co->title}}</option>
                    @endforeach
                  </select>

                  <br/>
                  
                  <label class="control-label">Payment Method<span class="cst-upper-star">*</span></label>
                  <select class="form-control" name="payment_method">
                    <option disabled selected="" value="">Select Payment Method</option>
                    <option value="STRIPE">Stripe</option>
                    <option value="Wallet">Wallet</option>
                    <option value="Childcare">Childcare</option>
                  </select>
                  <br/>

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
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
     
@endsection