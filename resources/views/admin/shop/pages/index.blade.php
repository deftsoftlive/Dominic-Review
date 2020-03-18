@extends('layouts.admin')
 
@section('content')
 <section class="content-header">
      <div class="container-fluid">
        <div class="mb-2">
    
            <div class="page-header-title">
                    <h5 class="m-b-10">{{$title}}</h5>
                </div>       
        
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('/admin')}}"><i class="feather icon-home"></i></a></li>
              <li class="breadcrumb-item active"><a href="{{url('/admin')}}">Dashboard</a></li>
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
                  <th>Title</th>
                  <th width="120">Action</th>
                </tr>
                </thead>
                <tbody>
                 
                 @foreach($shop_pages as $p)

                    <tr>
                      <td>{{$p->title}}</td>
                     
                        <td>
                            <a href="{{url(route('admin.shop.cms.delete',$p->id))}}" class="btn btn-danger">Delete</a>
                            <a href="{{url(route('admin.shop.cms.edit',$p->id))}}" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>


                 @endforeach
                 
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
  
</script>
     
@endsection
