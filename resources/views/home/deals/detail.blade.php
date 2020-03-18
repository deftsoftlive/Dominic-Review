@extends('layouts.home')
@section('content')
 

<section class="log-sign-banner aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000" "="" style="background:url(http://49.249.236.30:8654/uploads/1574318396.png);">
    <div class="container">
            <div class="page-title text-center">
                     <h1>Deals & Discount</h1>
                </div>
            </div>    
        </section>


<section class="deal-discount-detail-sec">
   <div class="container">
   <div class="sec-card">
      <div class="deal-discount-card">
        


         <div class="card-heading">
                     <h3>{{ $deal->title }}</h3>
                  </div>

           

                 <figure class="deal-img">
               <img src="{{url($deal->image)}}">
                   <figcaption class="discount-per"><span class="blink-text">
      {{($deal->deal_off_type == 0) ? $deal->amount.'%' : '$'.$deal->amount }}
         
        <small> OFF  </small></span> </figcaption>
            </figure>

            <div class="deal-discount-description">
            	<div class="dealls-dis-head">
                  <!-- <a href="http://49.249.236.30:8654/listing/event-planner/photos#deals-sec">
                     <h4>winter deal</h4>
                  </a> -->
                  <p class="ser-text mb-2"> <span><i class="fas fa-calendar-alt"></i></span>
                      
              @if($deal->deal_life == 0)
               Permanent Deal
              @else
                      <span class="deal-starting-date">From:<strong> {{date('d-m-Y',strtotime($deal->start_date))}}</strong></span> <span class="deal-starting-date">To:<strong> {{date('d-m-Y',strtotime($deal->expiry_date))}}</strong></span>
              @endif



                  </p>
                  <p class="ser-text mt-1 mb-2">
                     <span><i class="fas fa-tag"></i></span>  {{ $deal->Business->category->label }}
                  </p>
                  <p class="ser-text mt-1 mb-2">
                     <span><i class="fas fa-info-circle"></i></span>  {!! $deal->type_of_deal == '0' ? 'Use Coupon for all packages of this Vendor.' : 'Available for <a href="'.url( route('vendor_detail_page',[$deal->Business->category->slug,$deal->Business->business_url])).'#package-sec"><strong>'.strtoupper($deal->dealPackage->title).'</strong></a> package of this Vendor' !!}
                  </p>

                  <div class="side-btns-wrap">

                       @if($deal->type_of_deal == '0')
                          <a href="javascript:void(0);" class="coupon-code" data-toggle="tooltip" title="Copy to clipboard">
                            <span class="code-text">{{ $deal->deal_code }}</span>
                            <span class="get-code">Get Code</span>
                          </a>
                         @endif
  


                          <a href="javascript:void(0);" 
                             class="icon-btn get_detail" 
                             data-title="{{$deal->Business->title}}" 
                             data-message="{{$deal->message_text}}"
                             data-id="{{$deal->id}}"
                             data-chat="{{$chats}}"
                             data-chatMessage="{{$links}}"
                             data-toggle="tooltip"
                             title="Chat">
                             <i class="fa fa-comment-dots"></i>
                          </a>









                  </div>
                  
               </div>
               <h4>{{$deal->title}}</h4>
               <p class="deal-discription">
                <?= $deal->description ?>
               </p>

               <ul class="button-grp-wrap">                 
                  
                  <li>
                  	
                 </li>
                  <li>
                     
                  </li>
               </ul>
            </div>

      </div>
  </div>
   </div>
</section>
 




@include('home.includes.deals.package')
@include('home.includes.modals.cart_popup')
@include('home.includes.modals.chat')
@include('home.includes.modals.login')
@include('home.includes.business-detail.chatbox')
 
@endsection






@section('scripts')
  
<!-- <script type="text/javascript" src="{{url('/js/deals/deals.js')}}"></script> -->
<script type="text/javascript" src="{{url('/js/deals/cart.js')}}"></script>
<script type="text/javascript" src="{{url('/js/deals/deals.js')}}"></script>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
@endsection

