@extends('vendors.management.layout')
@section('vendorContents')

<div class="container-fluid">


 <div class="page_head-card">
    <div class="page-info">
            <div class="page-header-title">
                <h3 class="m-b-10">{{$title}}</h3>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('vendor_dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">List</a></li>
            </ul>
        </div>
        <div class="side-btns-wrap">
          <a href="{{url(route('vendor_add_deals_management',$slug))}}" class="add_btn"><i class="fa fa-plus"></i></a>
        </div>
  </div>

@include('vendors.errors')
 



    <div class="row">
       <div class="col-lg-12">
          <div class="card vendor-dash-card">
            <div class="card-header">
              <h3>{{$title}} </h3>
            </div>
                <div class="card-body">

                  @if($dealCount == 0)

                   <div class="col-md-12">
                    <div class="alert alert-warning" role="alert">Deals & Discount are not assigned to this Category.</div>
                  </div>

                  @endif

           @foreach($deals as $deal)

           <div class="deals-card">
    <figure class="deal-img">
      <img src="{{url($deal->image)}}">
      <figcaption class="discount-per"><span class="blink-text">
        @if($deal->deal_off_type == 0)
         {{$deal->amount}}% 
        @else
         ${{$deal->amount}} 
        @endif
        <small> OFF</small></span> </figcaption>      
    </figure>
     <div class="detal-card-details">
      <div class="dealls-dis-head">
        <a href="{{url( route('vendor_detail_page',[$deal->Business->category->slug,$deal->Business->business_url]))}}#deals-sec"> <h4>{{$deal->title}}</h4></a>

<p class="ser-text"> <span><i class="fas fa-calendar-alt"></i></span>
        @if($deal->deal_life == 0)
          Permanent Deal
        @else
                <span class="deal-starting-date">Stating:<strong> {{date('d-m-Y',strtotime($deal->start_date))}}</strong></span> <span class="deal-starting-date">Ending:<strong> {{date('d-m-Y',strtotime($deal->expiry_date))}}</strong></span>
           <!-- {{$deal->deal_life == 1 ? 'Expires on '.$deal->expiry_date : 'Permanent promotion'}} -->
        @endif
        </p>

        @if($deal->type_of_deal == '0')
        <a href="javascript:void(0);" class="coupon-code">
          <span class="code-text">{{ $deal->deal_code }}</span>
          <span class="get-code">Get Code</span>
        </a>
       @endif
      </div>
      <p class="deal-discription">
             <?php $description =  $deal->description; ?>
                                               {{substr($description,0,100)}} {{strlen($description) > 100 ? '...' : ''}}
        </p>
        <ul class="acrdn-action-btns single-row">
          <li><a data-toggle="tooltip" title="Edit" href="{{url(route('vendor_edit_deals_management',[$slug,$deal->id]))}}" class="action_btn dark-btn"><i class="fas fa-pencil-alt"></i></a></li>         
          <li><a data-toggle="tooltip" title="Delete" onclick="deleteItem(this)" href="javascript:void(0)" data-delurl="{{url(route('vendor_delete_deals_management',[$slug,$deal->id]))}}" class="action_btn danger-btn"><i class="fas fa-trash-alt"></i></a></li>   
        </ul>
     </div>

  </div>




          @endforeach

          {{$deals->links()}}
        </div>
       </div>
      </div>
      </div>
    </div>
 
</div>
@endsection

@section('scripts')
<script type="text/javascript">
  CKEDITOR.replace('answer');
</script>
@endsection
