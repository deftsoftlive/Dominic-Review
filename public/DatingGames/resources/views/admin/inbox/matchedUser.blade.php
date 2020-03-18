@extends('layouts.admin')
@section('content')

<aside class="right-side">               
    <section class="content-header">
        <h1>
            Users
            <small>Listing</small>
        </h1>
    </section>

    @include('partials/removeMessage')
    @include('partials/message')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">                           
                
                <div class="box">
                    
                    <div class="box-header">
                        <h3 class="box-title">This user have match with the following users:</h3>                                    
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped">
                                <!-- <table id="example1" class="table table-bordered table-striped"> -->
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Gender</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->fname}}</td>
                                    <td>{{$user->lname}}</td>
                                    <td>{{$user->gender}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                    <a class="btn btn-primary" href="{{route('admin.messages',['slug' => $user1->slug, 'id'=> $user->id])}}">View Messages
                                    </a>
                                    </td>
                                </tr>
                                 @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                    <!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section><!-- /.content -->
</aside>
@endsection