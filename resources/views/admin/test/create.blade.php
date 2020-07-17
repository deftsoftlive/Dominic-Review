@extends('layouts.admin')
 
@section('content')

<style>
div#selectator_multiple {
    min-height: 0px!important;
}
</style>
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

                   <label class="control-label">Test Category<span class="cst-upper-star">*</span></label>
                   @php 
                    $testcategory = DB::table('test_categories')->orderBy('id','asc')->get();
                   @endphp
                    <select class="select-player" name="test_cat_id">
                      @foreach($testcategory as $te)
                      <option value="{{$te->id}}">{{$te->title}}</option>
                      @endforeach
                    </select><br/>

                  <div class="form-group" >
                      <label class="control-label">Season</label>
                        <select id="season_id" class="select-player" name="season">
                          <option selected="" disabled="">Please Select Season</option>
                          @php 
                            $season = DB::table('seasons')->where('status',1)->get();
                          @endphp
                          @if(!empty($season))
                            @foreach($season as $se)
                              <option value="{{$se->id}}">{{$se->title}}</option>
                            @endforeach
                          @endif
                        </select>
                    </div>

                   <div class="form-group" >
                      <label class="control-label">Course</label>
                        <select id="course" class="select-player" name="course">
                        </select>
                    </div>

                    <!-- <div class="cst-select-close-opt cst-select-close-opt-ipad">
                        <link rel="stylesheet" type="text/css" href="https://harvesthq.github.io/chosen/chosen.css">
                        <script src="https://harvesthq.github.io/chosen/chosen.jquery.js"></script>
                        
                        <div id="user--output"></div>

                        <script>`
                            document.getElementById('user--output').innerHTML = location.search;
                            $(".chosen-select--user").chosen();

                        </script>
                        <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
                        <link href="https://www.jqueryscript.net/demo/Select-Replacement-Plugin-jQuery-Selectator/fm.selectator.jquery.css" rel="stylesheet" type="text/css">

                        <label class="control-label">Courses</label>
                        <select id="multiple" name="courses[]" class="form-control" multiple>
                          @php $courses = DB::table('courses')->where('status','1')->get(); @endphp
                            @foreach($courses as $co)
                            <option data-att="{{$co->id}}" name="courses[]" value="{{$co->id}}">{{$co->title}}</option>
                            @endforeach
                        </select>

                        <script src="https://www.jqueryscript.net/demo/Select-Replacement-Plugin-jQuery-Selectator/fm.selectator.jquery.js"></script>
                        <script>
                            $('#multiple').selectator({
                                showAllOptionsOnFocus: true,
                                searchFields: 'value text subtitle right'
                            });

                        </script>
                    </div> -->
                  
                   {{textbox($errors,'Title<span class="cst-upper-star">*</span>','title')}}
                   {{textarea($errors,'Description<span class="cst-upper-star">*</span>','description')}}
              
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
<!-- <script type="text/javascript">
  $('#selImage').on('change', function (){
    $(this).parent().find('label').css('display', 'none');
  });
</script> -->
@endsection
