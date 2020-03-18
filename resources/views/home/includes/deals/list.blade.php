@php $i=0; @endphp 

@foreach($discount_deals as $dealDisount)



  @php
  $i++;

  $deal = \App\Models\Vendors\DiscountDeal::find($dealDisount->id);

    $chats = $deal->Business->getChatOfLoggedUser != null && $deal->Business->getChatOfLoggedUser->count() > 0 ? 1 : 0;
    $links = '';
    if($deal->Business->getChatOfLoggedUser != null && $deal->Business->getChatOfLoggedUser->count() > 0){
       
       $link = url(route('deal_discount_chats')).'?chat_id='.$deal->Business->getChatOfLoggedUser->id;
       $links = '<div class="deal-sucess-msg"><span class="suc-msg-icon"><i class="far fa-clock"></i></span>Your message has been sent to vendor, soon vendor will reply you.<div class="btn-wrap text-center mt-3"><a href="'.$link.'" class="cstm-btn">View chat</a>
       </div>
       </div>';
    }


  $businessDetailLink = url( route('vendor_detail_page',[$deal->Business->category->slug,$deal->Business->business_url])).'#deals-sec';


  $redirectLink = $deal->type_of_deal == 0 ? $businessDetailLink : url(route('payWithDeal',[$deal->slug,$deal->dealPackage->slug]));



  @endphp


  @php 
    $dealStatus = DealCurrentStatus($deal->start_date, $deal->expiry_date) 
  @endphp 
 


  <div class="deals-card aos-init aos-animate" data-aos="fade-left" data-aos-duration="2000">
    <figure class="deal-img">
      <img src="{{url($deal->image)}}">
      <figcaption class="discount-per"><span class="blink-text">
        {{($deal->deal_off_type == 0) ? $deal->amount.'%' : '$'.$deal->amount }}
         <small> OFF  </small></span> </figcaption>      
    </figure>
     <div class="detal-card-details">
      <div class="dealls-dis-head">
        <a href="{{url(route('get_deal_detail',[$deal->slug]))}}"> <h4>{{$deal->title}}</h4></a>

        <p class="ser-text"> <span><i class="fas fa-calendar-alt"></i></span>
        @if($deal->deal_life == 0)
          Permanent Deal
        @else
                <span class="deal-starting-date">Stating:<strong> {{date('d-m-Y',strtotime($deal->start_date))}}</strong></span> <span class="deal-starting-date">Ending:<strong> {{date('d-m-Y',strtotime($deal->expiry_date))}}</strong></span>
        @endif
        </p>

        <p class="ser-text mt-1">
         <span><i class="fas fa-tag"></i></span> {{ $deal->Business->category->label }}
        </p>

       <p class="ser-text mt-1">
         <span><i class="fas fa-info-circle"></i></span>  
         {!! $deal->type_of_deal == '0' ? 'Use Coupon for all packages of this Vendor.' : 'Available for <a href="'.url( route('vendor_detail_page',[$deal->Business->category->slug,$deal->Business->business_url])).'#package-sec"><strong>'.strtoupper($deal->dealPackage->title).'</strong></a> package of this Vendor' !!}
        </p>

        @if($deal->type_of_deal == '0')
        <a href="javascript:void(0);" class="coupon-code" data-toggle="tooltip" title="Copy to clipboard">
          <span class="code-text">{{ $deal->deal_code }}</span>
          <span class="get-code">Get Code</span>
        </a>
       @endif
      </div>
      <p class="deal-discription">
             <?php $description =  $deal->description; ?>
                                               {{substr($description,0,100)}} {{strlen($description) > 100 ? '...' : ''}}
        </p>

         

         @if($dealStatus == "Upcoming Deal")

          <div class="sm-countdown-wrap">
            <ul class="count-down-timer button-grp-wrap">
                <input type="hidden" value="{{$deal->start_date}}" id="start_date_{{$deal->id}}" class="timerWatch" data-days="#days_{{$deal->id}}" data-hours="#hours_{{$deal->id}}" data-minutes="#minutes_{{$deal->id}}" data-seconds="#seconds_{{$deal->id}}" />
                <li><span id="days_{{$deal->id}}"></span>days</li>
                <li><span id="hours_{{$deal->id}}"></span>Hours</li>
                <li><span id="minutes_{{$deal->id}}"></span>Minutes</li>
                <li><span id="seconds_{{$deal->id}}"></span>Seconds</li>
            </ul>
          </div>         

         @else
          
         <ul class="button-grp-wrap">
                        <li>
                          <a href="{{url( route('vendor_detail_page',[$deal->Business->category->slug,$deal->Business->business_url]))}}#deals-sec" data-toggle="tooltip" title="More Detail" class="icon-btn"><i class="fa fa-eye"></i>
                          </a>
                        </li>
                        <li>
                          <a href="{{url(route('get_deal_detail',[$deal->slug]))}}" data-toggle="tooltip" title="Get Deal" class="icon-btn">
                            <i class="fas fa-tags"></i>
                          </a>
                        </li>
                        <li>
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
          </li>
        </ul>
        @endif


     </div>

  </div>
 
  <hr class="hr-break">
 
 
@endforeach


@if($i == 0)

  @include('includes.not_found')

 @endif


<!-- Modal -->
<div class="get_Deal modal fade" id="myModalDealDiscount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Get Deal & Discount</h4>
      </div>
      <div class="modal-body">
         <form id="getDealForm" action="{{url(route('get-deal-request'))}}">
            <div class="messageNotofications"></div>
            <input type="hidden" name="deal_id" value="">

            <div class="row">
                 <div class="col-md-6">
                      {{textbox($errors,'Name','name',$name)}}
                 </div>

                 <div class="col-md-6">
                      {{textbox($errors,'Email','email',$email)}}
                 </div>

                  <div class="col-md-6">
                      {{textbox($errors,'Phone Number','phone_number',$phone)}}
                 </div>
                 <div class="col-md-6">
                      {{datebox($errors,'Event Date','event_date',$event_date)}}
                 </div>
                  <div class="col-md-12">
                      {{textarea($errors,'Message','message')}}
                 </div>
                 <div class="col-md-12">
                  <div class="btn-wrap mt-3">
                      <button type="submit" class="cstm-btn solid-btn detail-btn pull-right">Submit</button>
                  </div>
                    
                </div>
            </div>
      </form>
      <div class="MessageChat"></div>
          </div>
           
    </div>
  </div>
</div>

 





