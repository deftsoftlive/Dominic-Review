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

                  @php
                      $count=1;  
                  @endphp
                    
                  <label class="control-label">Page Title<span class="cst-upper-star">*</span></label>
                  <select class="select-player" name="page_title">
                        <option value="course-listing">Courses Page</option>
                        <option value="course-listing/football">Football Courses Page</option>
                        <option value="course-listing/tennis">Tennis Courses Page</option>
                        <option value="course-listing/school">School Courses Page</option>

                        <option value="camp-listing">Camp Page</option>
                        <option value="camp-download">Camp Page - Download Section</option>
                        <option value="camp-parent-info">Camp Page - Parent Info</option>

                        <option value="tennis-landing">Tennis Coaching</option>
                        <option value="tennis-landing-download">Tennis Coaching - Download Section</option>
                        <option value="tennis-landing-parent-info">Tennis Coaching - Parent Info</option>

                        <option value="football-landing">Footabll Coaching</option>
                        <option value="football-landing-download">Footabll Coaching - Download Section</option>
                        <option value="football-landing-parent-info">Footabll Coaching - Parent Info</option>

                        <option value="school-landing">School Coaching</option>
                        <option value="school-landing-download">School Coaching - Download Section</option>
                        <option value="school-landing-parent-info">School Coaching - Parent Info</option>

                        <option value="book-a-camp">Book A Camp Page</option>
                        @foreach($camp_cat as $cat)
                          <option value="camp-detail/{{$cat->slug}}">Camp Category - {{$cat->title}}</option>
                        @endforeach
                  </select><br/>

                   {{textbox($errors,'Title*','title')}}
                   {{textarea($errors,'Description*','description')}}

               <!--    <div class="form-group">
                    <label class="control-label">PDF UPLOAD<span class="cst-upper-star">*</span></label><br/>
                    <input type="file" onchange="ValidateSingleInput(this, 'pdf_src')" name="pdf" id="selImage">
                    @if ($errors->has('pdf'))
                        <div class="error">{{ $errors->first('pdf') }}</div>
                    @endif
                  </div> -->

                  <label class="control-label">Color of the Accordian<span class="cst-upper-star">*</span></label>
                  <select class="form-control" name="color">
                        <option value="#001642">Blue</option>
                        <option value="#00afef">Sky Blue</option>
                        <option value="#bea029">Yellow</option>
                  </select><br/>

                  <!-- <img src="" id="pdf_src" style="width: 100px; height: 100px; display: none"/> -->


                  <div class="form-group">
                              <label class="control-label" for="timelsots">PDF Management -</label>
                              <br/>
                              <table class="add_on_services">
                                <thead>
                                  <tr>
                                      <th>Title</th>
                                      <th>Upload PDF</th>
                                      <th><a onclick="addnewsection();" href="javascript:void(0);"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></th>
                                  </tr>
                                </thead>
                                <tbody>

                                <!-- ******************************
                                |     Accordian PDF's
                                | ********************************* -->
                              
                                  <input type="hidden" id="noOfQuetion" value="{{$count}}">
                                  <div class="mainQuestions" id="mainQuestions">

                                  <tr class="timeslots slots{{$count}}" value={{$count}}>
                                    <td><input type="text" name="accordian_title[{{$count}}]" class="form-control"></td>
                                    <td><input type="file" name="pdf[{{$count}}]" class="form-control"></td>
                                    <td><a onclick="removeSection({{$count}});" href="javascript:void(0);"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></td>
                                  </tr>
                                  </div>
                                  </tbody>
                              </table>
                            </div>


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
<script src="{{ asset('js/cke_config.js') }}"></script>
<script type="text/javascript">
   CKEDITOR.replace('description', options);
</script>

<!--  Accodian PDF Management -->
<script type="text/javascript">

        function addnewsection(){
            //noOfattribute
            var number = parseInt($("#noOfQuetion").val());  
            var newnumber =number+1;                        
            $("#noOfQuetion").val(newnumber);

            var mainHtml='<tr class="timeslots slots'+newnumber+'" value="'+newnumber+'"><td><input type="text" name="accordian_title['+newnumber+']" class="form-control"></td><td><input type="file" name="pdf['+newnumber+']" class="form-control" required></td></td><td>';

            mainHtml+='<td><a href="javascript:void(0);" onclick="removeSection('+newnumber+');"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></td></tr>';

            $(".add_on_services").append(mainHtml);
        }


        function removeSection(counter){
            //noOfattribute
            var number = parseInt($("#noOfQuetion").val());  
            $(".slots"+ counter).remove();
        }

</script>

@endsection