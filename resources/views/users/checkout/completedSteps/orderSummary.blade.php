<fieldset 
class="complete p-3 {{(!empty($orders) && $orders->count() > 0 && Session::has('OrderSummary')) ? '' : 'notCompleted disabled'}}">
<div class="complete-card">
  <div class="row">
    <div class="col-lg-8">
       <h3>Order Summary <span class="check-add-icon">
        @if(!empty($orders) && $orders->count() > 0 && Session::has('OrderSummary'))
           <i class="fas fa-check"></i></span>
        @else
         <i class="far fa-clock"></i></span>
        @endif 
      </h3>
    <div class="checkout-billing-address">
    @if(!empty($orders) && $orders->count() > 0 && Session::has('OrderSummary'))
        <p>{{$orders->count()}} {{$orders->count() == 1 ? 'Item' : 'Items'}}</p>
    @endif
    </div>
    
    </div>
 @if(!empty($orders) && $orders->count() > 0 && Session::has('OrderSummary'))
    <div class="col-lg-4">
      <div class="mini-btn-wrap mt-3 text-right">
      <a href="{{url(route('checkout.orderSummary'))}}" class="cstm-btn solid-btn">Change</a>
    </div>
    </div>
@endif
  </div>
</div>
</fieldset>