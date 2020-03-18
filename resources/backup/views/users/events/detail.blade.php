
@extends('users.layouts.layout')
@section('content')

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-header-title">
                    <h5 class="m-b-10">Detail Event</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item "><a href="{{ route('user_events') }}">Events</a></li>
                    <li class="breadcrumb-item "><a href="javascript:void(0)">Detail Event</a></li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="btn-wrap text-right mb-3">
                <a href="{{ route('user_show_edit_event', $user_event->slug) }}" class="cstm-btn">edit Event</a>
              </div>
            </div>

        </div>
    </div>
</div>
<input type="hidden" id="end_date" value="{{$user_event->end_date}}">
<section class="content">
      <div class="row">

        <!-- [ rating list ] end-->

                            @php  
                              $start_time = \Carbon\Carbon::now();  
                              $finish_time = \Carbon\Carbon::parse($user_event->end_date); 
                              $result = $start_time->diffInDays($finish_time, false);
                            @endphp
                           
                                <div class="{{$result <= 0 ? 'col-md-12' : 'col-md-6 mb-4'}}">
                                    <div class="tab-content card equal-card" id="myTabContent">
                                      <div class="card-block">
                                      <div class="upcmg-evnt-head"><h3>Event Details</h3></div>
                    <table class="table table-hover">               
                        <tbody>
                            <tr>
                              <td width="100">

                                     @if($user_event->event_picture !="")
                                     <img src="{{url($user_event->event_picture)}}" width="100%">
                                     @endif
                                 

                              </td>
                                <td>
                                  <a>   <h4>{{ $user_event->title }} </h4>
                                       <p class="m-0">{{ $user_event->description }}</p>
                                  </a>
                                </td>
                                <td class="text-right" style="white-space: nowrap;">
                                  ({{ $user_event->min_person }} - {{ $user_event->max_person }}) Persons
                                </br>
                                      <i class="fas fa-clock"></i> 
                           
                              @if($result <= 0)
                              Past Event
                            @else
                              {{ $result }} Days left
                            @endif

                                </td>
                            </tr>
                           
                        </tbody>
                    </table>
                                    </div>
                                </div>
                              </div>


                                 @if($result > 0)
                                <div class="col-md-6 mb-4">
                                    <div class="Upcoming-event-card card equal-card">
                                        <div class="card-block">
                                          <div class="upcmg-evnt-head text-center">
                                          <!-- <h2>Upcoming Events</h2> -->
                                          <h3>Count-Down to your event is on</h3>
                                          <!-- <p>{{$user_event->description}}</p> -->
                                        </div>
                                        <div class="countdown-timer-container">
                                        <ul class="count-down-timer">
                                          <li><span id="days-up_{{$user_event->id}}"></span>days</li>
                                          <li><span id="hours-up_{{$user_event->id}}"></span>Hours</li>
                                          <li><span id="minutes-up_{{$user_event->id}}"></span>Minutes</li>
                                          <li><span id="seconds-up_{{$user_event->id}}"></span>Seconds</li>
                                        </ul>
                                      </div>
                                        </div>
                                      </div>
                                </div>
                                @endif

                               

      </div>
    </section>

<section class="content">
<div class="row">

    

         <div class="col-md-6 mb-4">
          <div class="card equal-card"> 
      <div class="card-body">
          <div class="upcmg-evnt-head"><h3>Vendors Services Related to your Event</h3></div>

        <div class="card-inn-content">
          <div class="table-responsive">
            <table class="table event-table">
              @foreach($user_event->eventCategories as $category)
               <tr>
                 <td><label>{{$category->eventCategory->label}} </label></td>
                 <td><p class="hire-status">Not Hired</p></td>
                 <td>
                  @if(count( categoryOrders($category->eventCategory->id, $user_event->id) ) > 0)
                  <span class="event-status color-green">
                    <i class="fas fa-check-circle"></i>
                  </span>
                  @else
                  <span class="event-status color-red">
                    <i class="fas fa-times-circle"></i>
                  </span>                    
                  @endif
               </td>
               @if(count( categoryOrders($category->eventCategory->id, $user_event->id) ) > 0)
                 <td class="action-td"><a href="javascript:void(0);" onclick="payments({{ categoryOrders($category->eventCategory->id, $user_event->id) }})" data-toggle="modal" data-target="#cat_Modal" class="action-btn"><i class="fas fa-eye"></i></a></td>
               @else
                 <td class="action-td"><a href="javascript:void(0);" class="action-btn"><i class="fas fa-eye-slash"></i></a></td>
               @endif
               </tr>

               @endforeach
            </table>
          </div>
        </div>

    </div>
</div>
</div>

                                <div class="col-md-6 mb-4">
                                  <div class="event-planning-navigation card equal-card">
                                    <div class="card-body">
                                     <div class="upcmg-evnt-head"><h3>My Event Planning Tool Box</h3></div>
                                     <nav class="evt-plan-navigation">
                                      <ul>
                                        <li>Welcome Back {{ Auth::user()->name }}! Lets continue Planning</li>
                                        <li><a href="javascript:void(0);"><span class="plan-nav-icon"><i class="fas fa-list-alt"></i></span>Guest List</a></li>
                                       <li><a href="javascript:void(0);"><span class="plan-nav-icon"><i class="fab fa-chrome"></i></span>Create <br/> Website</a></li>
                                       <li><a href="javascript:void(0);"><span class="plan-nav-icon"><i class="fas fa-gift"></i></span>Gift</a></li>
                                       <li><a href="javascript:void(0);"><span class="plan-nav-icon"><i class="far fa-edit"></i></span>Create <br/> Event</a></li>
                                       <li><a href="javascript:void(0);"><span class="plan-nav-icon"><i class="fas fa-couch"></i></span>Seating <br/> Chart</a></li>
                                       <li><a href="javascript:void(0);"><span class="plan-nav-icon"><i class="fas fa-dollar-sign"></i></span>Budget</a></li>
                                       <li><a href="javascript:void(0);"><span class="plan-nav-icon"><i class="fas fa-tasks"></i></span>Checklist</a></li>
                                        <li><a href="javascript:void(0);"><span class="plan-nav-icon"><i class="fas fa-comments"></i></span>Message <br/> Vendors</a></li>
                                       
                                     </ul>
                                     </nav>  
                                     </div>                                                            
                                  </div>
                               </div>

<div class="col-md-12">

<div class="card"> 
      <div class="card-body">
        <div class="cstm-card-head">
            <h5 class="card-title">Recommended Vendors for {{$user_event->title}}</h5>
          </div>
          <div class="recommended-vedors-wrap">
             @foreach($user_event->eventCategories as $category)
                <div class="rec-card">
                   <h3 class="rec-heading">{{$category->eventCategory->label}}</h3>
                    <div class="row">
          			@if(count($category->eventCategory->businesses) > 0)
                      @foreach($category->eventCategory->businesses as $business)
                      <div class="col-lg-4">
                        <a href="{{ route('vendor_detail_page', ['catslug' => $category->eventCategory->slug, 'bslug' => $business->business_url]) }}" class="recommended-vedor" target="_blank">
                         <figure> <img src="{{url(getBasicInfo($business->vendors->id, $business->category_id,'basic_information','cover_photo'))}}"/></figure>
                          <div class="rec-detail">
                          <h3>{{ $business->title }}</h3>
                              <p>{{ getBasicInfo($business->vendors->id, $business->category_id,'basic_information','short_description') }}</p>
                        </div>
                        </a>
                      </div>
                    @endforeach
                    @else
                    <div class="col-lg-12">
                    	<h5>No Recommended Vendor</h5>
                    </div>
                    @endif
                    </div>

                  <div class="row">
                     <div class="col-lg-4 col-md-6">
                    <div class="amt-list-wrap">
                     <label class="rec-heading">Amenities</label>
                     <ul class="pkg-listing-grp">  
                      @if(count($category->eventCategory->CategoryAmenity) > 0)
                      @foreach($category->eventCategory->CategoryAmenity as $amenity)
                          <li class="pkg-listing">{{ $amenity->Amenity->name }}</li>
                      @endforeach
                      @else
                     <li class="pkg-listing">No Recommended Vendor Amenities</li>
                    @endif

                     </ul>
                   </div>
                  </div>

                    <div class="col-lg-4 col-md-6">
                    <div class="amt-list-wrap">
                     <label class="rec-heading">Games</label>
                     <ul class="pkg-listing-grp">  
                      @if(count($category->eventCategory->CategoryGames) > 0)
                      @foreach($category->eventCategory->CategoryGames as $game)
                          <li class="pkg-listing">{{ $game->Games->name }}</li>
                      @endforeach
                      @else
                     <li class="pkg-listing">No Recommended Vendor Games</li>
                    @endif

                     </ul>
                   </div>
                  </div>

                </div>
                </div>
             @endforeach          
         </div>
      </div>
   </div>

</div>
</section>
     



<!-- Modal -->
<div id="cat_Modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Modal Header</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" id="modal_body">


      </div>     
    </div>
  </div>
</div>



@endsection

@section('scripts')
<script src="{{url('/js/comingsoon.js')}}"></script>
<script type="text/javascript">
comingsoon('end_date', 'days_{{$user_event->id}}', 'hours_{{$user_event->id}}', 'minutes_{{$user_event->id}}', 'seconds_{{$user_event->id}}');
comingsoon('end_date', 'days-up_{{$user_event->id}}', 'hours-up_{{$user_event->id}}', 'minutes-up_{{$user_event->id}}', 'seconds-up_{{$user_event->id}}');

function payments(paymentsData) {
  console.log('paymentsData ', paymentsData);

  let modal_data = '';
for (var i = 0; i < paymentsData.length; i++) {
  
  modal_data += `<div class="order-booking-card">
<div class="card-heading">
<h3>Event Details</h3>
</div>
<div class="responsive-table">
<table class="table table-striped order-list-table">
<thead>
<tr>
<th>#</th>
<th>Order Id</th>
<th>Payment Type</th>
<th>Price</th>
</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>INVORD28</td>
<td>paypal</td>
<td>$556</td>
</tr>
</tbody>
</table>
</div>
<div class="order-summary-wrap">
<div class="row">
<div class="col-lg-6">
<div class="order-sum-card">
<div class="billing-addres-detail">
<h3 class="rec-heading">Billing Address</h3>

<div class="billing-address-line">
<p><span><i class="fas fa-user"></i></span>Narinder Singh</p>
<p> <span> <i class="fas fa-map-marker-alt"></i> </span> sddsd, sdsdsd, Baretta, Punjab India wqewewe</p>
<p> <span> <i class="fas fa-envelope"></i> </span> bajwa9876470491@gmail.com</p>
<p><span><i class="fas fa-phone-volume"></i></span> 1212878777</p>
<p></p> 
</div>
</div>
</div>
</div>

<div class="col-lg-6">
<div class="order-sum-card">
<div class="billing-addres-detail">

<div class="payment-sidebar cstm-sidebar">
<h3 class="rec-heading">Payment Details</h3>
<table id="payment-table" class="table payment-table">
<tbody><tr>
<th>
Price
<p>(Gold)</p>
</th>
<td>$1000</td>
</tr>
<tr>
<th colspan="2">
Addons 
<ul class="mini-inn-table">
<li><span class="labl"> Add On for two Large Portrait </span><span> $50 </span></li>     
</ul>
</th>
</tr>
<tr>
<th>Tax</th>
<td> $ 3</td>
</tr>
<tr>
<th>Service Fee</th>
<td>$ 3</td>
</tr>
<tr class="total-price-row">
<th>Total Payable Amount</th>
<td>$<span id="packagePrice">556</span></td>
</tr>
</tbody></table>
<section class="content-header">
<div class="row" id="suc_show" style="display: none;">
<div class="col-md-12">
<div class="alert alert-success">
<strong>Success! </strong>
<span id="res_mess"></span>
</div>
</div>
</div>              
<div class="row" id="err_show" style="display: none;">
<div class="col-md-12">
<div class="alert alert-danger">
<strong>Error! </strong>
<span id="err_mess"></span>
</div>         
</div>
</div>
</section>                
</div>
</div>
</div>
</div>
</div>
</div>
</div>`;
paymentsData[i]
}
  $('#modal_body').html(modal_data);
 } 

</script>

<script>
  var type = 1, //circle type - 1 whole, 0.5 half, 0.25 quarter
    radius = '10em', //distance from center
    start = -90, //shift start from 0
    $elements = $('.event-planning-navigation li:not(:first-child)'),
    numberOfElements = (type === 1) ?  $elements.length : $elements.length - 1, //adj for even distro of elements when not full circle
    slice = 360 * type / numberOfElements;

$elements.each(function(i) {
    var $self = $(this),
        rotate = slice * i + start,
        rotateReverse = rotate * -1;
    
    $self.css({
        'transform': 'rotate(' + rotate + 'deg) translate(' + radius + ') rotate(' + rotateReverse + 'deg)'
    });
});
</script>
@endsection


