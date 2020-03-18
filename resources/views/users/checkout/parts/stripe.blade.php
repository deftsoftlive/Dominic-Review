 <form action="{{$obj->nextStepRoute('checkout.payWithStripe')}}" method="POST">
  <?php $stripe = SripeAccount();  ?>
  @csrf
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button new-main-button"
    data-key="{{$stripe['pk']}}"
    data-amount="{{$obj->getTotalOrderCurrent() * 100}}"
    data-name="Envision"
    data-description="Shopping"
    data-email="{{Auth::user()->email}}"                              
    data-locale="auto">
  </script>
</form>


 