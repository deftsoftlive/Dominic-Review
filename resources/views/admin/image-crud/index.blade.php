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

        <form role="form" action="{{Route('save_images')}}" method="post" id="venueForm" enctype="multipart/form-data">
        @csrf 
            <div class="form-group">
                        <label class="control-label" for="timelsots">Images </label>

                        <table class="add_on_services image_icon" style="width:100%!important">
                          <thead>
                            <tr>
                                <th width="200px;">Upload Image</th>
                                <th>Image Link</th>
                                <br/><br/>
                                <th width="170px;"><a onclick="addnewImage();" href="javascript:void(0);" class="btn btn-primary">Add Image<i class="fa fa-plus"></i></a></th>
                            </tr>
                          </thead>
                          <tbody>

                          
                          <!-- Image Icons -->
                            @if(isset($images))  

                            <input type="hidden" id="noOfQuetion" value="{{$count_image}}">
                            <div class="mainQuestions" id="mainQuestions">

                            @foreach($images as $time => $number)
                            <tr class="timeslots slots{{$time+1}}" value={{$time+1}}>
                              <td>
                                <img style="padding: 6px; border: 2px solid #3f4d67; margin: 10px;" width="100px;" height="100px;" src="{{URL::asset('/uploads/icons')}}/{{$number->image}}">
                              </td>
                              <td>
                                <div class="image-from-wrap">

                                <input class="form-control" style="width:100%" readonly="" type="text" value="{{URL::asset('/uploads/icons')}}/{{$number->image}}" id="myInput-{{$number->id}}">
                                <a onclick="myFunction({{$number->id}})" href="javascript:void(0);" class="btn btn-primary">Copy Link</a>
                              </div>

                              </td>
                              <td><a href="{{url('/admin/images/remove')}}/{{$number->id}}" onclick='return confirm("Are you sure you want to delete this image?")' href="javascript:void(0);" class="btn btn-primary">Remove Icon</a></td>                                  
                            </tr>
                            @endforeach  

                            </div>

                            @else

                            <input type="hidden" id="noOfQuetion" value="{{$count_image}}">
                            <div class="mainQuestions" id="mainQuestions">

                            <tr class="timeslots slots{{$count}}" value={{$count}}>
                              <td><input type="text" name="ac_title[{{$count}}]" class="form-control" required></td>
                              <td><a onclick="removeImage({{$count}});" href="javascript:void(0);" class="btn btn-primary">Remove Icon</a></td>
                                  
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

<script>
function myFunction(id) { 
  var copyText = document.getElementById("myInput-"+id);
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  alert("Copied the text: " + copyText.value);
}

// Since Async Clipboard API is not supported for all browser!
function copyTextToClipboard(text) {
  var textArea = document.createElement("textarea");
  textArea.value = text
  document.body.appendChild(textArea);
  textArea.focus();
  textArea.select();

  try {
    var successful = document.execCommand('copy');
    var msg = successful ? 'successful' : 'unsuccessful';
    console.log('Copying text command was ' + msg);
  } catch (err) {
    console.log('Oops, unable to copy');
  }

  document.body.removeChild(textArea);
}
</script>

  <script type="text/javascript">

        function addnewImage(){
            //noOfattribute
            var number = parseInt($("#noOfQuetion").val());  
            var newnumber =number+1;                        
            $("#noOfQuetion").val(newnumber);

            var mainHtml='<tr class="timeslots slots'+newnumber+'" value="'+newnumber+'"><td><input type="file" name="ac_title['+newnumber+']" class="form-control" required></td>';

            mainHtml+='<td></td><td><a href="javascript:void(0);" onclick="removeImage('+newnumber+');" class="btn btn-primary">Remove Icon</a></td></tr>';

            $(".add_on_services").append(mainHtml);
        }


        function removeImage(counter){
            //noOfattribute
            var number = parseInt($("#noOfQuetion").val()); 
            $(".slots"+counter).remove();
        }

</script>
