@extends('layouts.admin')
@section('content')

<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Pages
            <small>Listing</small>
        </h1>
    </section>
    
    @include('partials/removeMessage')
    @include('partials/message')


    <section class="content">
            <div class="facilities-wrapper">  
                    <div class="row">
                            <div class="col-sm-7 facilities-wrap-left">
                                    <form action="{{route('admin.cmspages.searchPage')}}" method="POST" class="sidebar-form">
                                            @csrf
                                        <div class="input-group search--content-wd">
                                            <input type="text" value="{{$search}}" id="search" name="search" class="form-control facilities-search" placeholder="Search..."/>
                                            <span class="input-group-btn">
                                            <button type='submit' name='seach' id='search-btn' class="btn btn-flat fac-search"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
    
                                <div class= "col-sm-5 facilities-wrap-right">
                                    <a href="{{route('admin.cmspages.showCreatePage')}}">
                                        <button class="btn btn-info bttn--height-right"><i class="fa fa-fw fa-plus-circle"></i> Add New Page</button>
                                    </a>
                                    </div>
                    </div>
                </div>
        </section>

    <!-- Main content -->
    <section class="content">
            @if($search)
            <div class="row">
                <div class="col-sm-12 search-cont">
                <p>you are searching for the : <span class="search--text"> {{$search}}</span> 
            <a href="{{route('admin.cmspages.showpages')}}" class="search-custm-btn">clear filter</a></p>
            </div>
            </div>
            @endif

        <div class="row">
            <div class="col-xs-12">                           
                
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">CMS Pages</h3>                                    
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped">
                                <!-- <table id="example1" class="table table-bordered table-striped"> -->
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>URL</th>
                                    <th>Status</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pages as $page)
                                <tr id="row_{{$page->id}}">
                                    <td>{{$page->name}}</td>
                                <td>{{url($page->slug)}}</td>
                                <td>
                                    {{ ($page->status == '1') ? 'Active' : 'Inactive'}}
                                </td>
                                    <td>
                                    <a href="{{ route('admin.cmspages.showEditPage', ['slug' => $page->slug]) }}">
                                        <button id="{{$page->id}}" class="btn btn-success"><i class="fa fa-fw fa-edit"></i>Edit</button>
                                    </a>
                                    <button type="button" id="{{$page->id}}" class="btn btn-danger rem_button" data-toggle="modal" data-target="#remove_page">
                                      <i class="fa fa-fw fa-times-circle"></i>Remove
                                    </button>
                                    </td>
                                </tr>
                                 @endforeach
                            </tbody>
                        </table>
                        <div class="facility--pagination"> {{$pages->links() }}</div>
                        @if (count ($pages) == 0)
                            <div class="facilities-nodata-text">
                               <p > No Data Found</p>
                            </div>
                        @endif
                    </div>
                    <!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
        <div class="modal" id="remove_page" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <p>Are you sure, You want to delete this Page?</p>
                    </div>
                    <div class="modal-footer">
                        <button id="" onclick="removePage(this.id)" class="btn btn-primary confirm_button" data-dismiss="modal">OK</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.content -->
</aside>
@endsection

@section('customScripts')
<script src="{{ asset('admin/js/message.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.rem_button').click(function(){
            var pageid = $(this).attr('id');
            $('.confirm_button').attr('id', pageid);
        });
    });
    function removePage(id) {
        $(`#${id}`).prop('disabled', true);
        $.ajax({
           headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           url: "{{ route('admin.cmspages.detelePage') }}",
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
