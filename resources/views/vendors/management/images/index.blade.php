@extends('vendors.management.layout')
@section('vendorContents')

<div class="container-fluid">

    <div class="page_head-card">
    <div class="page-info">
            <div class="page-header-title">
                <h3 class="m-b-10">{{$title}}</h3>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('vendor_dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">List</a></li>
            </ul>
        </div>
        <div class="side-btns-wrap">
           
        </div>
  </div>
@include('vendors.errors')
 
    <div class="row">
       <div class="col-lg-12">
          <div class="card vendor-dash-card">
       <div class="card-header">
            <h3>Added Images </h3>
       </div>
           <div class="card-body">





  <form method="post" id="upload_form" enctype="multipart/form-data">
             {{ csrf_field() }}

                  <!-- <div class="form-group">
                    <div class="input-group">
                      <div class="custom-file" style="width: 100%">

                        <input type="file" class="custom-file-input" name="gallery_image[]" multiple="" id="select_file">
                        <label class="custom-file-label" for="select_file">Choose file</label>
                      </div>                     
                    </div>
                   </div> -->


        <div class="form-group">
          <label for="file" class="sr-only">File</label>
          <div class="input-group">
            <input type="text" name="filename" class="form-control" placeholder="No file selected" readonly>
            <span class="input-group-btn">
              <div class="btn btn-default  custom-file-uploader">
                <input type="file" class="custom-file-input" name="gallery_image[]" multiple="" accept="image/*" id="select_file" onchange="ValidateSingleInput(this, 'image_src')">     
        <!-- onchange="this.form.filename.value = this.files.length ? this.files[0].name : ''"  -->
                Select a file
              </div>
            </span>
          </div>
        </div>


              
 <div class="progress">
  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
    <span class="sr-only">0% Complete</span>
  </div>
</div>
<input type="hidden" name="category_id" value="{{$category->category_id}}">
      </form>









<div class="row" id="getListing"> 
</div>


</div>
</div>
</div>
</div>
</div>
@endsection






@section('scripts')
<script src="{{url('/js/validations/imageShow.js')}}"></script>
<script type="text/javascript">


  getList();
  
  $('body').on('change','#select_file', function(e){
        var form = $('body').find('#upload_form')[0]; // You need to use standard javascript object here
        var formData = new FormData(form);
        var percent = $('body').find('.percent');
        var bar = $('.bar');



         $.ajax({

           url:"{{ url(route('uploadGalleryImage')) }}",
           method:"POST",
           data:formData,
           dataType:'JSON',
           contentType: false,
           cache: false,
           processData: false,
           beforeSend: function() {
            
               $('body').find('.progress').show();
               $('.progress').find('span.sr-only').text('0%');

          },
           xhr: function () {
            var xhr = new window.XMLHttpRequest();
            xhr.upload.addEventListener("progress", function (evt) {
                if (evt.lengthComputable) {
                    var percentComplete = evt.loaded / evt.total;
                    percentComplete = parseInt(percentComplete * 100);
                    $('.progress').find('span.sr-only').text(percentComplete + '%');
                    $('.progress .progress-bar').css('width', percentComplete + '%');
                }
            }, false);
            return xhr;
          },
           success:function(data)
           {
            $('#globalMessages').html('');
            console.log(data.html);
            if(data.success ==true){
                  $('body').find('.progress').hide();
                  $('.progress').find('span.sr-only').text('0%');
                   $('.progress .progress-bar').css('width','0%');
                    form.reset();
                   getList();

                

            }else{
                $('body').find('.progress').hide();
                  $('.progress').find('span.sr-only').text('0%');
                   $('.progress .progress-bar').css('width','0%');
                $('body').find('#globalMessages').css('display', 'block');

                 $('#globalMessages').html(data.message);

        

            }

           }

          });
    });



$("body").on('click','a.page-link',function(e){
    e.preventDefault();
    var url = $( this ).attr('href');
    getList(url);
});



/*____________________________________________________________________________________________________
|
|
|_____________________________________________________________________________________________________
*/

function getList(link="{{ url(route('vendor_category__image_gallery_management',$category->slug)) }}") {

  
  
         $.ajax({

           url:link,
           method:"GET",
           data:{
            getdata : 1
           },
           dataType:'JSON',
           beforeSend: function() {
            
               $("body").find('.loading-div').show();

           },
           success:function(data)
           {
             $('#getListing').html(data.result);
           },
            complete: function() {
            
               $("body").find('.loading-div').hide();

           }

          });
}





</script>
@endsection