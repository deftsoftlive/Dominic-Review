@extends('layouts.admin')
 
@section('content')
 <div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Link course & camp with childcare vouchers</h5>
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

              <form action="{{route('admin.ChildcareVoucher.save-link-course-camp')}}" method="POST" enctype="multipart/form-data">
                
                   @csrf
            
                   <!-- <div class="col-sm-12"> -->
                    @php 
                      $link_course_camp = DB::table('childcare_vouchers')->first();
                    @endphp

                    @if(!empty($link_course_camp->linked_course) || !empty($link_course_camp->linked_camp))
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
                                $selected_courses = explode(',',$link_course_camp->linked_course);
                                $selected_camps = explode(',',$link_course_camp->linked_camp);

                                $courses = DB::table('courses')->where('status','1')->get();
                                $camps = DB::table('camps')->where('status','1')->get();
                              @endphp

                              <label class="control-label">Courses</label>
                              <input type="checkbox" id="checkbox" >Select All
                              <select id="multiple" class="form-control" name="courses[]" multiple> 
                                <option name="courses[]" value="">All</option>
                                  <!-- To get all engineers -->
                                  @if(isset($courses))
                                    @foreach($courses as $co)
                                         @php
                                           if(in_array($co->id,$selected_courses)){
                                              $selectedDefault  = 'selected';
                                           }else{
                                              $selectedDefault  = '';
                                           }
                                         @endphp

                                        <option name="courses[]" {{$selectedDefault}} value="{{$co->id}}">{{$co->title}}</option>
                                    @endforeach                                        
                                  @endif

                              </select>
                              
                              <br/><br/>

                              <label class="control-label">Camps</label>
                              <input type="checkbox" id="checkbox1" >Select All
                              <select id="multiple1" class="form-control" name="camps[]" multiple> 
                                <option name="camps[]" value="">All</option>
                                  <!-- To get all engineers -->
                                  @if(isset($camps))
                                    @foreach($camps as $co)
                                         @php
                                           if(in_array($co->id,$selected_camps)){
                                              $selectedDefault  = 'selected';
                                           }else{
                                              $selectedDefault  = '';
                                           }
                                         @endphp

                                        <option name="camps[]" {{$selectedDefault}} value="{{$co->id}}">{{$co->title}}</option>
                                    @endforeach                                        
                                  @endif

                              </select>

                              <script src="https://www.jqueryscript.net/demo/Select-Replacement-Plugin-jQuery-Selectator/fm.selectator.jquery.js"></script> 
                            <script>
                            $('#multiple').selectator({
                              showAllOptionsOnFocus: true,
                              searchFields: 'value text subtitle right'
                            });

                            $('#multiple1').selectator({
                              showAllOptionsOnFocus: true,
                              searchFields: 'value text subtitle right'
                            });

                            </script>
                            <!--new custom select option end--> 
                      </div>
                    </div>
                    @else
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

                        <label class="control-label">Courses</label>
                        <input type="checkbox" id="checkbox" >Select All
                        <select id="multiple" name="courses[]" class="form-control" multiple>
                        	@php $courses = DB::table('courses')->where('status','1')->get(); @endphp
                            <option name="courses[]" value="">All</option>
                            @foreach($courses as $co)
                            <option data-att="{{$co->id}}" name="courses[]" value="{{$co->id}}">{{$co->title}}</option>
                            @endforeach
                        </select>
                        
                        <br/><br/>

                        <label class="control-label">Camps</label>
                        <input type="checkbox" id="checkbox1" >Select All
                        <select id="multiple1" name="camps[]" class="form-control" multiple>
                        	@php $camps = DB::table('camps')->where('status','1')->get(); @endphp
                            <option name="camps[]" value="">All</option>
                            @foreach($camps as $co)
                            <option data-att="{{$co->id}}" name="camps[]" value="{{$co->id}}">{{$co->title}}</option>
                            @endforeach
                        </select>

                        <script src="https://www.jqueryscript.net/demo/Select-Replacement-Plugin-jQuery-Selectator/fm.selectator.jquery.js"></script>
                        <script>
                            $('#multiple').selectator({
                                showAllOptionsOnFocus: true,
                                searchFields: 'value text subtitle right'
                            });

                            $('#multiple1').selectator({
                                showAllOptionsOnFocus: true,
                                searchFields: 'value text subtitle right'
                            });

                        </script>
                        <!--new custom select option end-->
                    <!-- </div> -->
                    </div>
                    @endif

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
<script type="text/javascript">
$(document).ready(function() {
    $("#checkbox").click(function(){
      if($("#checkbox").is(':checked') ){ //select all
        $("#multiple").find('option').prop("selected",true);
        $("#multiple").trigger('change');
      } else { //deselect all
        $("#multiple").find('option').prop("selected",false);
        $("#multiple").trigger('change');
      }
  });

    $("#checkbox1").click(function(){
      if($("#checkbox1").is(':checked') ){ //select all
        $("#multiple1").find('option').prop("selected",true);
        $("#multiple1").trigger('change');
      } else { //deselect all
        $("#multiple1").find('option').prop("selected",false);
        $("#multiple1").trigger('change');
      }
  });

});
</script>
@endsection
