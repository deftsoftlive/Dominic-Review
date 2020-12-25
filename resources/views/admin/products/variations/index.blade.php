@extends('layouts.admin')
 
@section('content')

 <section class="content-header">
      <div class="container-fluid">
        <div class="mb-2">
    
            <div class="page-header-title">
                    <h5 class="m-b-10">{{$title}}</h5>
                </div>       
        
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/admin') }}"><i class="feather icon-home"></i></a></li>
              <li class="breadcrumb-item active"><a href="{{ url('/admin') }}">Dashboard</a></li>
              <li class="breadcrumb-item "><a href="{{ url($addLink) }}">Add</a></li>
            </ol>
        
        </div>
      </div><!-- /.container-fluid -->
    </section>
       <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
        
        @include('admin.error_message')
 
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  
                 
                  <th>Name</th>
                 
                  <th width="120">Action</th>
                </tr>
                </thead>
                <tbody>
                 
                 
                </tbody>
              </table>
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

    
      

<script type="text/javascript">
 
 
$(function() { 
        var i=1;
    $('#example2').DataTable({
         
        processing: true,
        serverSide: true,
        ajax: '<?= $ajaxLink ?>',
        columns: [
            
             { data: 'name', name: 'name' },
            
             // { data: 'status', name: 'status' },
             { data: 'action', name: 'action' },

             

             
        ]
       
    });


});
 

</script>
     
@endsection
