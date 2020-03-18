@extends('layouts.admin')
@section('content')

<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Blog Category
            <small>Listing</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Blog Categories Listing</li>
        </ol>
    </section>

    @include('partials/removeMessage')
    @include('partials/message')

    <section class="content">
                <div class="row">
                        <div class="col-sm-7">
                                <form action="{{route('admin.blogCat.search')}}" method="POST" class="sidebar-form">
                                        @csrf
                                    <div class="input-group search--content-wd">
                                        <input type="text" value="{{$search}}" id="search"  name="search" class="form-control facilities-search" placeholder="Search..."/>
                                        <span class="input-group-btn">
                                        <button type='submit' name='seach' id='search-btn' class="btn btn-flat fac-search"><i class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                                </form>
                            </div>

                            <div class= "col-sm-5">
                                <a href="{{route('admin.blogCat.showCreateBlogCats')}}">
                                    <button class="btn btn-info bttn--height-right"><i class="fa fa-fw fa-plus-circle"></i> Add New Blog Category</button>
                                </a>
                                </div>
                </div>
    </section>

    <!-- Main content -->
    <section class="content">
            @if($search)
            <div class="row">
                <div class="col-sm-12 search-cont">
                <p>you are searching for the : <span class="search--text"> {{$search}}</span> 
            <a href="{{route('admin.blogCat.showBlogCats')}}" class="search-custm-btn">clear filter</a></p>
            </div>
            </div>
            @endif

        <div class="row">
            <div class="col-xs-12">                           
                
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Blog Categories</h3>                                    
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped">
                                <!-- <table id="example1" class="table table-bordered table-striped"> -->
                            <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($blogCategories as $blogCategory)
                                <tr id="row_{{$blogCategory->id}}">
                                    <td>{{$blogCategory->name}}</td>
                                    <td>{{$blogCategory->created_at->format('d-m-y')}}</td>
                                    <td>
                                        {{ ($blogCategory->status == '1') ? 'Active' : 'Inactive'}}
                                    </td>
                                    <td>
                                    <a href="{{ route('admin.blogCat.showEditBlogCat', ['slug' => $blogCategory->slug]) }}">
                                        <button class="btn btn-success"><i class="fa fa-fw fa-edit"></i>Edit</button>
                                    </a>
                                    <button id="{{$blogCategory->id}}" onclick="removeBlogCat(this.id)" class="btn btn-danger"><i class="fa fa-fw fa-times-circle"></i>Remove</button>
                                    </td>
                                </tr>
                                 @endforeach
                            </tbody>
                        </table>
                        <div class="facility--pagination"> {{$blogCategories->links() }}</div>
                        @if (count ($blogCategories) == 0)
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

@section('customScripts')
<script src="{{ asset('admin/js/message.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    function removeBlogCat(id) {
        $(`#${id}`).prop('disabled', true);
        $.ajax({
           headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           url: "{{ route('admin.blogCat.deteleBlogCat') }}",
            type: "post",
           dataType: "JSON",
            data: { 'id': id },
            success: function(res)
            {
                $('#suc_show').show();
                $('#res_mess').html(res.message);
                $(`#row_${id}`).remove();

                setTimeout(function() {
                    $('#suc_show').fadeOut('fast');
                }, 2000);
            },
            error: function(err) {
                $('#err_show').show();
                $('#err_mess').html(JSON.parse(err.responseText).message);
                $(`#${id}`).prop('disabled', false);

                setTimeout(function() {
                    $('#err_show').fadeOut('fast');
                }, 2000);
            }
        });
    }   
</script>
@endsection
