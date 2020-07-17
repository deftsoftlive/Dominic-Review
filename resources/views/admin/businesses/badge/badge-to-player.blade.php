@extends('layouts.admin')
 
@section('content')
 <div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Assign badges to players</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item "><a href="{{ route('players_list') }}">View All</a></li>
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

  <form role="form" action="{{route('save_assign_badge')}}" method="post" id="venueForm" enctype="multipart/form-data">
                
          @csrf

          <input type="hidden" name="id" value="{{$purchase_course->id}}">

              @php 
                $user = DB::table('users')->where('id',$purchase_course->child_id)->first();
                $course = DB::table('courses')->where('id',$purchase_course->product_id)->first();
              @endphp

                   <b>Child Name</b> - {{$user->name}}<br/>
                   <b>Course Name</b> - {{$course->title}}

                   <br/><br/><br/>

                   <div class="cst-user-add-property">
                      <div class="cst-select-close-opt cst-select-close-opt-ipad">
                        <link rel="stylesheet" type="text/css" href="https://harvesthq.github.io/chosen/chosen.css">
                        <script src="https://harvesthq.github.io/chosen/chosen.jquery.js"></script> 
                        <div id="user--output"></div>

                            <!--190719 new custom select option--> 
                              <script>
                                    document.getElementById('user--output').innerHTML = location.search;
                                    $(".chosen-select--user").chosen();
                              </script>
                              <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
                              <link href="https://www.jqueryscript.net/demo/Select-Replacement-Plugin-jQuery-Selectator/fm.selectator.jquery.css" rel="stylesheet" type="text/css">


                              @php 
                                $selected_badges = explode(',',$purchase_course->badges);
                                $badges = DB::table('badges')->orderBy('id','asc')->get();
                              @endphp

                              <label class="control-label">Badges</label>
                              <!-- <input type="checkbox" id="checkbox2" >Select All -->
                              <select id="multiple" class="badges_list form-control" name="badges[]" multiple> 
                                <!-- <option name="badges[]" value="">All</option> -->
                                  <!-- To get all badges -->
                                  @if(isset($badges))
                                    @foreach($badges as $co)
                                         @php
                                           if(in_array($co->id,$selected_badges)){
                                              $selectedDefault  = 'selected';
                                           }else{
                                              $selectedDefault  = '';
                                           }
                                         @endphp

                                        <option name="badges[]" {{$selectedDefault}} value="{{$co->id}}">{{$co->name}} <img src="{{URL::asset('/uploads')}}/{{$co->image}}"></option>

                                    @endforeach                                        
                                  @endif

                              </select>

                              <script src="https://www.jqueryscript.net/demo/Select-Replacement-Plugin-jQuery-Selectator/fm.selectator.jquery.js"></script> 
                            <script>
                            $('#multiple').selectator({
                              showAllOptionsOnFocus: true,
                              searchFields: 'value text subtitle right'
                            });
                            </script>
                            <!--new custom select option end--> 
                      </div>
                  </div>
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