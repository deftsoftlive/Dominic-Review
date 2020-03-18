@extends('layouts.admin')
@section('content')

<aside class="right-side">               
    <section class="content-header">
        <h1>
            Faqs
            <small>Listing</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Faqs Listing</li>
        </ol>
    </section>

    @include('partials/removeMessage')
    @include('partials/message')

    <section class="content">
        <a href="{{route('admin.showCreateFaq')}}">
            <button class="btn btn-info page-accordian-bttn"><i class="fa fa-fw fa-plus-circle"></i> Add New Faq</button>
        </a>
    </section>

    <!-- Main content -->
    <section class="content">
           
        <div class="row">
            <div class="col-xs-12">                           
                
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Faqs</h3>                                    
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped">
                                <!-- <table id="example1" class="table table-bordered table-striped"> -->
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($faqs as $faq)
                                <tr id="row_{{$faq->id}}">
                                    <td>{{$faq->title}}</td>
                                    <td>{{$faq->created_at->format('d-m-y')}}</td>
                                    <td>
                                        {{ ($faq->status == '1') ? 'Active' : 'Inactive'}}
                                    </td>
                                    <td>
                                    <a href="{{ route('admin.showEditFaq', ['slug' => $faq->slug]) }}">
                                        <button class="btn btn-success"><i class="fa fa-fw fa-edit"></i>Edit</button>
                                    </a>
                                    <button id="{{$faq->id}}" onclick="removeFaq(this.id)" class="btn btn-danger">
                                        <i class="fa fa-fw fa-times-circle"></i>Remove</button>
                                    </td>
                                </tr>
                                 @endforeach
                            </tbody>
                        </table>
                        <div class="facility--pagination"> {{ $faqs->links() }}</div>
                        @if (count ($faqs) == 0)
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
    function removeFaq(id) {
        $(`#${id}`).prop('disabled', true);
        $.ajax({
           headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           url: "{{ route('admin.deteleFaq') }}",
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
