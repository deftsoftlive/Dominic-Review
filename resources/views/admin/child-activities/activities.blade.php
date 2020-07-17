@extends('layouts.admin')
 
@section('content') 
 <div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Activities</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="{{url(route('admin_dashboard'))}}">
                      <i class="feather icon-home"></i></a>
                    </li>
                    <li class="breadcrumb-item "><a href="javascript:void(0)">Edit</a></li>
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

        <form role="form" action="{{Route('save_child_activities')}}" method="post" id="venueForm" enctype="multipart/form-data">
        @csrf 
            <div class="form-group">
                        <label class="control-label" for="timelsots">Activities</label>

                        <table class="add_on_services">
                          <thead>
                            <tr>
                                <th>Activity Name</th>
                                <th><a onclick="addnewsection();" href="javascript:void(0);"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></th>
                            </tr>
                          </thead>
                          <tbody>

                          <!-- ******************************
                          |
                          |     Course Dates
                          |
                          | ********************************* -->
                          
                            @if(isset($activities))  

                            <input type="hidden" id="noOfQuetion" value="{{$count_activity}}">
                            <div class="mainQuestions" id="mainQuestions">


                            @foreach($activities as $time => $number)
                            <tr class="timeslots slots{{$time+1}}" value={{$time+1}}>
                              <td><input type="text" name="ac_title[{{$time+1}}]" class="form-control"  value="{{$number->ac_title}}" required></td>
                              <td><a onclick="removeSection({{$time+1}});" href="javascript:void(0);"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></td>                                  
                            </tr>
                            @endforeach  

                            </div>

                            @else

                            <input type="hidden" id="noOfQuetion" value="{{$count_activity}}">
                            <div class="mainQuestions" id="mainQuestions">

                            <tr class="timeslots slots{{$count}}" value={{$count}}>
                              <td><input type="text" name="ac_title[{{$count}}]" class="form-control" required></td>
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

  <script type="text/javascript">

        function addnewsection(){
            //noOfattribute
            var number = parseInt($("#noOfQuetion").val());  
            var newnumber =number+1;                        
            $("#noOfQuetion").val(newnumber);

            var mainHtml='<tr class="timeslots slots'+newnumber+'" value="'+newnumber+'"><td><input type="text" name="ac_title['+newnumber+']" class="form-control" required></td>';

            mainHtml+='<td><a href="javascript:void(0);" onclick="removeSection('+newnumber+');"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></td></tr>';

            $(".add_on_services").append(mainHtml);
        }


        function removeSection(counter){
            //noOfattribute
            var number = parseInt($("#noOfQuetion").val()); 
            $(".slots"+counter).remove();
        }

</script>
