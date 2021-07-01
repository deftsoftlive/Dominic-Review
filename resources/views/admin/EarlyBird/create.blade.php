@extends('layouts.admin')
 
@section('content')
 <div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Early Bird Management</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="{{url(route('admin_dashboard'))}}">
                      <i class="feather icon-home"></i></a>
                    </li>
                    <li class="breadcrumb-item "><a href="{{ route($addLink) }}">View</a></li>
                    <li class="breadcrumb-item "><a href="javascript:void(0)">Create</a></li>
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
            <form role="form" method="post" id="EarlyBirdManagementForm" action="{{ route('admin.store.early_bird') }}" enctype="multipart/form-data">
              @csrf

              <!-- ********************************
              |
              |       EARLY BIRD MANAGEMENT
              | 
              |************************************ -->

              <!-- Banner -->
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title"><u>DATE & TIME MANAGEMENT</u></h5>
                    <label class="control-label">Early Bird Date<span class="cst-upper-star">*</span></label>
                    <input type="date" class="form-control" name="early_bird_date" required><br/>

                    <label class="control-label">Early Bird Time<span class="cst-upper-star">*</span></label>
                    <input type="time" class="form-control" name="early_bird_time" required><br/>

                    <div class="form-group label-floating is-empty">
                      <label class="control-label">Early Bird Text1 <span class="cst-upper-star">*</span></label>
                      <input type="text" class="form-control" name="early_bird_text1" required>
                    </div>

                    <div class="form-group label-floating is-empty">
                      <label class="control-label">Early Bird Text2 <span class="cst-upper-star">*</span></label>
                      <input type="text" class="form-control" name="early_bird_text2" required>
                    </div>

                    <div class="form-group label-floating is-empty">
                      <label class="control-label">Discount Percentage <span class="cst-upper-star">*</span></label>
                      <input type="number" class="form-control" name="discount_percentage" min="1" max="99" required>
                    </div>

                    <div class="form-group">
                      <label class="label-file control-label">Enable/Disable - Course Listing</label>
                      <select name="check_early_bird" class="select-player">
                        <option value="1">Enable</option>
                        <option value="0">Disable</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label class="label-file control-label">Select Course Category</label>
                      <select name="course_category_id" class="select-player" required>
                        <option selected disabled>Select Course Category</option>
                        @foreach($course_category as $category)
                          <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group label-floating is-empty">
                      <label class="control-label">UTC to UK diff in H(hour) <span class="cst-upper-star">*</span></label>
                      <input type="number" class="form-control" name="utc_uk_diff" min="0" max="1" required>
                    </div>

                </div>
              </div>

              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" id="homePageFormBtn" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
        <!-- /.card-body -->
      </div>    
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>

 
@endsection

