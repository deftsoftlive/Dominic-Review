@extends('layouts.admin')

@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">{{$title}}</h5>
                    <a style="float:right;" class="btn btn-primary" href="{{url('/admin/user/faqs/create')}}">Add FAQ</a>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item "><a href="javascript:void(0)">View</a></li>
                    <li class="breadcrumb-item "><a href="{{ route($addLink, ['type' => $type]) }}">Add</a></li>
                </ul>
                <br/>
            </div>
        </div>
    </div>
</div>



@include('admin.error_message')

    <div class="row">
       <div class="col-lg-12">
          <div class="card vendor-dash-card">
       <div class="card-header"><h5>{{$title}}</h5></div>
           <div class="card-body">

  <div id="faq-accordion" class="faq-accordion">

@if(count($faqs) == 0)
            <div class="col-md-12">
                <div class="alert alert-warning" role="alert">FAQs has not been added yet.</div>
              </div>
@endif

@foreach($faqs as $k => $f)
  <div class="acrdn-card">
    <div class="acrdn-header" id="headingOne">
        
        <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#{{$k}}" aria-expanded="false" aria-controls="collapseOne">
          <h3><span class="fa-stack fa-sm">
            <i class="fas fa-circle fa-stack-2x"></i>
            <i class="fas fa-plus fa-stack-1x fa-inverse"></i>
          </span>{{$f->question}} ( {{ $f->status == '1' ? 'Active' : 'In-Active' }} )</h3>          
        </button>

        <ul class="acrdn-action-btns">
          <li><a href="{{ route('admin.faqs.status', ['type'=> $type, 'id'=> $f->id]) }}" class="action_btn btn-warning" data-toggle="tooltip" title="{{ $f->status == '1' ? 'In-Active' : 'Active' }}"><i class="fas fa-toggle-on"></i></a></li>
          <li><a href="{{ route('admin.faqs.edit', ['type'=> $type, 'id'=> $f->id]) }}" class="action_btn primary-btn" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a></li>
          <li><a onclick="deleteItem(this)" href="javascript:void(0)" data-delurl="{{ route('admin.faqs.delete',[ $type, $f->id])}}" class="action_btn danger-btn" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></a></li>
        </ul>

    </div>

    <div id="{{$k}}" class="collapse" aria-labelledby="headingOne" data-parent="#faq-accordion">
      <div class="card-body">
          <h3>Answer</h3>
         <p>{!! $f->answer !!}</p>
      </div>
    </div>
  </div>
  @endforeach
</div> 

</div>
</div>
</div>
</div>
</div>

{{ $faqs->links() }}

@endsection

@section('scripts')
@endsection
