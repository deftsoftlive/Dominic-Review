<fieldset class="complete p-3">
<div class="complete-card">
  <div class="row">
    <div class="col-md-8">
       <h3>Billing Address <span class="check-add-icon"> <i class="fas fa-check"></i></span> </h3>
       @if(Session::has('billingAddress'))
    <div class="checkout-billing-address">
    <?php $address = json_decode(Session::get('billingAddress')); ?>
    <p><strong>{{$address->name}}</strong> {{$address->address}}, {{$address->city}}, {{$address->state}}, {{$address->country}} ({{$address->zipcode}})</p>
 
   </div>
    @endif
    </div>
    <div class="col-md-4">
      @if(Session::has('billingAddress'))
      <div class="mini-btn-wrap mt-4 text-right">
        
      <a href="{{$obj->nextStepRoute('checkout.billingAdress')}}" class="cstm-btn solid-btn">Change</a>
    </div>
    @endif
    </div>
  </div>
</div>
</fieldset>