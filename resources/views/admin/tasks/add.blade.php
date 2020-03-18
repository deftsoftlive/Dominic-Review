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
                    <li class="breadcrumb-item "><a href="{{ url($addLink) }}">View</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

     <section class="content">
      <div class="row">
        <div class="col-12">
                <div class="card">
                     <div class="card-header">
                        <div class="row">
                           <div class="col-md-6 "> <h5>Defult Task</h5></div>
                           <div class="col-md-6 text-right">
                            @if(Request::has('task'))
                             <a href="?" class="btn btn-primary">Add Sub Task</a>
                            @else
                             <a href="?task=1" class="btn btn-primary">Add Main Task</a>
                            @endif
                              
                           </div>
                        </div>
                                           
                                            <!-- <span class="d-block m-t-5">use class <code>table-hover</code> inside table element</span> -->
                    </div>
                  <!-- /.card-header -->
             @include('admin.error_message')
       
                  <div class="card-body">

       

                        <div class="col-md-12">

                          <form role="form" method="post" id="categoryForm" enctype="multipart/form-data">
                                 @csrf
                              

                                 {{select4($errors,'Event Types <small>(If you choose it then it will assign to event otherwise will be to default)</small>','event','name','General',$category)}}
 
                                 @if(Request::has('task'))
                                 <input type="hidden" name="parent" value="0">
                                  {{textbox($errors,'Main Task*','task')}}
                                  <input type="hidden" name="description" value="null">
                                @else
                                  {{select3($errors,'Main Task','parent','label','',array())}}

                                  
                                  {{textbox($errors,'Sub Task*','task')}}
                                  {{textarea($errors,'Description*','description')}}

                                @endif

         
            <!-- /.card-body -->
                              <div class="card-footer">
                                <button type="submit" id="categoryFormSbt" class="btn btn-primary">Submit</button>
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

$("body").on('change','select#event',function(){
     getSubCategoryByCategoryId();
});


    function getSubCategoryByCategoryId() {
 
         var val = $('select#event option:selected').val();
 
          $.ajax({
           url: "<?= url(route('admin.category.getTaskCategory')) ?>" ,
           data:{
              'category_id': val
           },
           dataTYPE: 'json',
           success: function(result){

                var text ='<option value="0">select</option>';

                 
                $.each(result, function( index, key ) {
                      text +='<option value="'+key.id+'">'+key.task+'</option>';
                 });


                $("#parent").html(text);
           }});

   }
 </script>
@endsection
