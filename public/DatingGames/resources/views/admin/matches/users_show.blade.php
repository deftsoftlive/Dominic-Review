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

    <section class="content">
            <div class="row">
                <div class="col-sm-7">
                    <form action="{{ route('admin.userSearch') }}" method="POST" class="sidebar-form">
                            @csrf
                        <div class="input-group search--content-wd">
                            <input type="text" value="{{$search}}" id="search"  name="search" class="form-control facilities-search" placeholder="Search..."/>
                            <span class="input-group-btn">
                            <button type='submit' name='seach' id='search-btn' class="btn btn-flat fac-search"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    <!-- Main content -->
    <section class="content">
            @if($search)
            <div class="row">
                <div class="col-sm-12 search-cont">
                <p>you are searching for the : <span class="search--text"> {{$search}}</span> 
            <a href="{{route('admin.matchUserList')}}" class="search-custm-btn">clear filter</a></p>
            </div>
            </div>
            @endif
        <div class="row">
            <div class="col-xs-12">                           
                
                <div class="box">
                    
                    <div class="box-header">
                        <h3 class="box-title">Matches</h3>                                    
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
                                    <a class="btn btn-primary" href="{{route('admin.viewUserEvents',['slug'=>$user->slug])}}">View User Events
                                    </a>
                                    </td>
                                </tr>
                                 @endforeach
                            </tbody>
                        </table>
                        <div class="facility--pagination"> {{ $users->links() }}</div>
                        @if (count ($users) == 0)
                            <div class="facilities-nodata-text">
                               <p > No Data Found</p>
                            </div>
                        @endif
                        
                    </div>
                    <!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section><!-- /.content -->
</aside>
@endsection