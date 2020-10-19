@extends('layouts.admin')
 
@section('content') 
 <div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Image Icons</h5>
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

        <form role="form" action="{{Route('save_image_icons')}}" method="post" id="venueForm" enctype="multipart/form-data">
        @csrf 
            <div class="form-group">
                        <label class="control-label" for="timelsots">Image Icons (100 X 100)</label>

                        <table class="add_on_services image_icon">
                          <thead>
                            <tr>
                                <th>Upload Icon</th>
                                <br/><br/>
                                <th><a onclick="addnewImageIcon();" href="javascript:void(0);" class="btn btn-primary">Add Icon <i class="fa fa-plus"></i></a></th>
                            </tr>
                          </thead>
                          <tbody>

                          
                          <!-- Image Icons -->
                            @if(isset($activities))  

                            <input type="hidden" id="noOfQuetion" value="{{$count_activity}}">
                            <div class="mainQuestions" id="mainQuestions">

                            @foreach($activities as $time => $number)
                            <tr class="timeslots slots{{$time+1}}" value={{$time+1}}>
                              <td>
                                <img style="padding: 6px; border: 2px solid #3f4d67; margin: 10px;" width="100px;" height="100px;" src="{{URL::asset('/uploads/icons')}}/{{$number->icon_image}}">
                              </td>
                              <td><a href="{{url('/admin/image-icon/remove')}}/{{$number->id}}" onclick='return confirm("Are you sure you want to delete this icon?")' href="javascript:void(0);" class="btn btn-primary">Remove Icon</a></td>                                  
                            </tr>
                            @endforeach  

                            </div>

                            @else

                            <input type="hidden" id="noOfQuetion" value="{{$count_activity}}">
                            <div class="mainQuestions" id="mainQuestions">

                            <tr class="timeslots slots{{$count}}" value={{$count}}>
                              <td><input type="text" name="ac_title[{{$count}}]" class="form-control" required></td>
                              <td><a onclick="removeImageIcon({{$count}});" href="javascript:void(0);" class="btn btn-primary">Remove Icon</a></td>
                                  
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

        function addnewImageIcon(){
            //noOfattribute
            var number = parseInt($("#noOfQuetion").val());  
            var newnumber =number+1;                        
            $("#noOfQuetion").val(newnumber);

            var mainHtml='<tr class="timeslots slots'+newnumber+'" value="'+newnumber+'"><td><input type="file" name="ac_title['+newnumber+']" class="form-control" required></td>';

            mainHtml+='<td><a href="javascript:void(0);" onclick="removeImageIcon('+newnumber+');" class="btn btn-primary">Remove Icon</a></td></tr>';

            $(".add_on_services").append(mainHtml);
        }


        function removeImageIcon(counter){
            //noOfattribute
            var number = parseInt($("#noOfQuetion").val()); 
            $(".slots"+counter).remove();
        }

</script>
