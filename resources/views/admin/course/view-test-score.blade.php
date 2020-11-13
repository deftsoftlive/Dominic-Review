@extends('layouts.admin')
 
@section('content')
 <div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10 d-print-none">View Test Scores</h5>
                </div>
                <ul class="breadcrumb d-print-none" >
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item "><a href="{{ route('players_list') }}">View All</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<section class="content" id="DivIdToPrint">
  <div class="row">
    <div class="col-12">
      <div class="card">
      <!-- /.card-header -->
            
       @include('admin.error_message')
 
        <div class="card-body">


        @if(Session::has('success'))
          <div class="alert_msg alert alert-success">
            <p>{{ Session::get('success') }} </p>
          </div>
        @endif

          <div class="col-md-12">

            <div class="row">
              <div class="col-sm-10">

                <h5><b>Course Name</b> - @php echo getCourseName($course);  @endphp</h5>
                <h5><b>Season</b> - @php echo getSeasonname($season); @endphp</h5> 
              </div>
              <div class="col-sm-2">
                <div class="test_print_btn d-print-none">
                  <a href="javascript:void(0);" id="print_test_score" class="btn btn-primary nw_btn_four">Print</a>
                </div>
              </div>
            </div>

                <div class="table-layout">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                      @if(count($test_score)> 0)
                      <th rowspan="2">Player Name</th>
                      @endif
                      @php 
                        $test_score2 = DB::table('test_scores')->where('course_id',$course)->where('test_cat_id','!=',NULL)->where('season_id',$season)->groupBy('test_id')->get(); 
                      @endphp
                      @if(count($test_score2)> 0)
                      @foreach($test_score2 as $arr)
                        <th>@php echo getTestCatname($arr->test_cat_id); @endphp</th>
                      @endforeach
                      @endif
                      </tr>
                      <tr>
                      @if(count($test_score2)> 0)
                      @foreach($test_score2 as $arr)
                        <th>@php echo getTestname($arr->test_id); @endphp</th>
                      @endforeach
                      @endif
                      </tr>
                    </thead>


                    <tbody>

                    @php
                      $test_score1 = DB::table('test_scores')->where('course_id',$course)->where('test_cat_id','!=',NULL)->where('season_id',$season)->groupBy('user_id')->get(); 
                    @endphp
                    @foreach($test_score1 as $arr)
                    <tr>
                        <td>@php $user = DB::table('users')->where('id',$arr->user_id)->first(); @endphp {{isset($user->name) ? $user->name : ''}}</td>
                        <!-- <td>@php echo getTestCatname($arr->test_cat_id); @endphp</td> -->
                        <!-- <td>@php echo getTestname($arr->test_id); @endphp</td> -->

                        @if(!empty($user))
                          @php
                            $test_score12 = DB::table('test_scores')->where('user_id',$user->id)->where('course_id',$course)->where('test_cat_id','!=',NULL)->where('season_id',$season)->groupBy('test_id')->get(); 
                          @endphp
                          @foreach($test_score12 as $arr)
                              <td>{{$arr->test_score}}</td>
                          @endforeach
                        @endif
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
               </div>

            
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
<script type="text/javascript">
  CKEDITOR.replace('description', options);
</script>  
@endsection