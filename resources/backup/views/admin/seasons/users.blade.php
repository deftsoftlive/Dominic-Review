@extends('layouts.admin')
 
@section('content')
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
               <h1>{{$title}}</h1> 
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="{{ url('master/') }}">Dashboard</a></li>
              <li class="breadcrumb-item "><a href="{{ route($addLink) }}">View</a></li>
            </ol>
          </div>
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

<div class="row">

<div class="col-md-6">

  <form role="form" method="post" enctype="multipart/form-data">
                <div class="card-body">
                           @csrf


                          {{selectMultiple($errors,'Users','users[]','users','name',$users,$user_ids->pluck('user_id')->toArray())}}

                    
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
 </form>


</div>

                      <div class="col-md-6">
                        <h4>Users</h4>
                      <table class="table">
                        <tr>
                          <th>Sr.no</th><th>Name</th><th>Action</th>
                        </tr>
                      <?php 
                        $userIds = $user_ids->paginate(20);
                      ?>
                      @foreach($userIds as $k => $u)

                      <tr>
                          <td>{{( $k + 1 )}}</td>
                          <td>{{$u->user->name}}</td>
                          <td><a href="{{url(route('unassignUser',$u->id))}}"><i class="fa fa-times"></i></a></td>
                      </tr>

                      @endforeach
                      </table>





                      </div>
      

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
   
   $("#users").select2();
 </script>


@endsection
