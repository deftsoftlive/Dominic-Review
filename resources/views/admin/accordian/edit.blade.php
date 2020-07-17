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
                  
                  <label class="control-label">Page Title<span class="cst-upper-star">*</span></label>
                  <select class="select-player" name="page_title">
                      <option value="course-listing" {{ $venue->page_title == 'course-listing' ?  'selected' : '' }}>Courses Page</option>
                      <option value="course-listing/football" {{ $venue->page_title == 'course-listing/football' ?  'selected' : '' }}>Football Courses Page</option>
                      <option value="course-listing/tennis" {{ $venue->page_title == 'course-listing/tennis' ?  'selected' : '' }}>Tennis Courses Page</option>
                      <option value="course-listing/school" {{ $venue->page_title == 'course-listing/school' ?  'selected' : '' }}>School Courses Page</option>
                      <option value="camp-listing" {{ $venue->page_title == 'camp-listing' ?  'selected' : '' }}>Camp Page</option>
                      <option value="camp-download" {{ $venue->page_title == 'camp-download' ?  'selected' : '' }}>Camp Page - Download Section</option>
                      <option value="camp-parent-info" {{ $venue->page_title == 'camp-parent-info' ?  'selected' : '' }}>Camp Page - Parent Info</option>
                      <option value="book-a-camp" {{ $venue->page_title == 'book-a-camp' ?  'selected' : '' }}>Book A Camp Page</option>

                      <option value="tennis-landing" {{ $venue->page_title == 'tennis-landing' ?  'selected' : '' }}>Tennis Coaching</option>
                      <option value="tennis-landing-download" {{ $venue->page_title == 'tennis-landing-download' ?  'selected' : '' }}>Tennis Coaching - Download Section</option>
                      <option value="tennis-landing-parent-info" {{ $venue->page_title == 'tennis-landing-parent-info' ?  'selected' : '' }}>Tennis Coaching - Parent Info</option>

                      <option value="football-landing" {{ $venue->page_title == 'football-landing' ?  'selected' : '' }}>Footabll Coaching</option>
                      <option value="football-landing-download" {{ $venue->page_title == 'football-landing-download' ?  'selected' : '' }}>Footabll Coaching - Download Section</option>
                      <option value="football-landing-parent-info" {{ $venue->page_title == 'football-landing-parent-info' ?  'selected' : '' }}>Footabll Coaching - Parent Info</option>

                      <option value="school-landing" {{ $venue->page_title == 'school-landing' ?  'selected' : '' }}>School Coaching</option>
                      <option value="school-landing-download" {{ $venue->page_title == 'school-landing-download' ?  'selected' : '' }}>School Coaching - Download Section</option>
                      <option value="school-landing-parent-info" {{ $venue->page_title == 'football-landing-parent-info' ?  'selected' : '' }}>School Coaching - Parent Info</option>

                      @foreach($camp_cat as $cat)
                        <option {{ $venue->page_title == 'camp-detail/'.$cat->slug ? 'selected' : '' }} value="camp-detail/{{$cat->slug}}">Camp Category - {{$cat->title}}</option>
                      @endforeach
                  </select><br/>

                   {{textbox($errors,'Title<span class="cst-upper-star">*</span>','title', $venue->title)}}
                   {{textarea($errors,'Description<span class="cst-upper-star">*</span>','description', $venue->description)}}

            <!--       <div class="form-group">
                    <label class="control-label">PDF UPLOAD<span class="cst-upper-star">*</span></label><br/>
                    <input type="file" name="pdf" id="selImage" onchange="ValidateSingleInput(this, 'pdf_src')">
                    @if ($errors->has('pdf'))
                        <div class="error">{{ $errors->first('pdf') }}</div>
                    @endif
                  </div>

                  @php 
                      $pdf = $venue->pdf;
                  @endphp

                  @if(!empty($pdf))
                    <a target="_blank" href="{{URL::asset('/uploads')}}/{{ $pdf }}" class="btn">View PDF</a>
                  @endif -->

                  <br/>

                  <label class="control-label">Color of the Accordian<span class="cst-upper-star">*</span></label>
                  <select class="form-control" name="color">
                        <option value="#be298d" {{ $venue->color == '#be298d' ?  'selected' : '' }}>Pink</option>
                        <option value="#00afef" {{ $venue->color == '#00afef' ?  'selected' : '' }}>Blue</option>
                        <option value="#bea029" {{ $venue->color == '#bea029' ?  'selected' : '' }}>Yellow</option>
                  </select><br/>

                  <div class="form-group">
                        <label class="control-label" for="timelsots">PDF Management</label>

                        <table class="add_on_services">
                          <thead>
                            <tr>
                                <th>Title</th>
                                <th>PDFs</th>
                                <th>View</th>
                                <th><a onclick="addnewsection();" href="javascript:void(0);"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></th>

                            </tr>
                          </thead>
                          <tbody>
                          <!-- ******************************
                          |
                          |     Accordian PDF
                          |
                          | ********************************* -->
                          
                            @if(isset($acc_pdf))  

                            <input type="hidden" id="noOfQuetion" value="{{$acc_pdf_count}}">
                            <div class="mainQuestions" id="mainQuestions">


                            @foreach($acc_pdf as $time => $number) 
                            <tr class="timeslots slots{{$time+1}}" value={{$time+1}}>
                              <td><input type="text" name="accordian_title[{{$time+1}}]" class="form-control"  value="{{$number->accordian_title}}" disabled></td>
                              <td><input type="text" name="pdf[{{$time+1}}]" class="form-control"  value="{{$number->pdf}}" disabled>
                              </td>
                              <td><a target="_blank" name="pdf[{{$time+1}}]" href="{{URL::asset('/uploads/accordian')}}/{{$number->pdf}}">View PDF</a></td>
                              <td><a id="remove_pdf" onclick="return confirm('The File is permanently removed for this accordian. Are you sure you want to delete this File?')" data-id="{{$number->id}}" href="javascript:void(0);"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></td>                                  
                            </tr>
                            @endforeach  

                            </div>

                            @else

                            <input type="hidden" id="noOfQuetion" value="{{$acc_pdf_count}}">
                            <div class="mainQuestions" id="mainQuestions">

                            <tr class="timeslots slots{{$count}}" value={{$count}}>
                              <td><input type="text" name="accordian_title[{{$count}}]" class="form-control"></td>
                              <td><input type="text" name="pdf[{{$count}}]" class="form-control"  value=""></td>
                              <td></td>
                              <td><a onclick="removeSection({{$count}});" href="javascript:void(0);"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></td>
                                  
                              </tr>

                            </div>

                            @endif

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

<!-- Accordian PDF Management -->
<script type="text/javascript">

        function addnewsection(){
            //noOfattribute
            var number = parseInt($("#noOfQuetion").val());  
            var newnumber =number+1;                        
            $("#noOfQuetion").val(newnumber);

            var mainHtml='<tr class="timeslots slots'+newnumber+'" value="'+newnumber+'"><td><input type="text" name="accordian_title['+newnumber+']" class="form-control"></td><td><input type="file" name="pdf['+newnumber+']" class="form-control"></td><td></td>';

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