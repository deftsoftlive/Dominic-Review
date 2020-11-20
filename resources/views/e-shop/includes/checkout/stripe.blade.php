 <form action="{{url(route('shop.checkout.stripe.payment'))}}" method="POST">
  <?php $stripe = SripeAccount();  ?>
  @csrf
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button new-main-button"
    data-key="{{$stripe['pk']}}"
    data-amount="{{$obj->getGrandTotal() * 100}}"
    data-name="DRH Sports"
    data-class="DRH Sports"
    data-description="Shop"
    data-email="{{Auth::user()->email}}"   
    data-currency="gbp"                           
    data-locale="auto">
  </script>
</form>