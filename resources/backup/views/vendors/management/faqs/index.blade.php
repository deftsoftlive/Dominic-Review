@extends('layouts.vendor')
@section('vendorContents')
<div class="container-fluid">

 <div class="page_head-card">
    <div class="page-info">
            <div class="page-header-title">
                <h3 class="m-b-10">{{$title}}</h3>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('vendor_dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">FAQs</a></li>
            </ul>
        </div>
        <div class="side-btns-wrap">
         <a href="{{url(route($addLink, $slug))}}" class="add_btn">
          <i class="fa fa-plus"></i></a>
        </div>
  </div>
@include('vendors.errors')

    <div class="row">
       <div class="col-lg-12">
          <div class="card vendor-dash-card">
       <div class="card-header"><h3>{{$title}}   </h3></div>
           <div class="card-body">

  <div id="faq-accordion" class="faq-accordion">


    @if($faqCount == 0)
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
          </span><!-- <span class="question-count">{{($k + 1)}}</span> --> {{$f->question}}</h3>          
        </button>
        <ul class="acrdn-action-btns">  
          <li><a href="{{ route('vendor_faqsedit_management',[$category->slug,$f->id])}}" class="action_btn primary-btn" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a></li>
          <li><a onclick="deleteItem(this)" href="javascript:void(0)" data-delurl="{{ url(route('vendor_faq_del_management',[$category->slug,$f->id]))}}" class="action_btn danger-btn" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></a></li>
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






{{$faqs->links()}}
   
@endsection


@section('scripts')

<script type="text/javascript">
  
  $(document).ready(function(){
  $("#faq-accordion").on("hide.bs.collapse show.bs.collapse", e => {
    $(e.target).prev().find("i:last-child").toggleClass("fa-minus fa-plus");
  });
  });    

</script>

@endsection
