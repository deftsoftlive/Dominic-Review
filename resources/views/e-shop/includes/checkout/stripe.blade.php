  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" /> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style type="text/css">
        .panel-title {
        display: inline;
        font-weight: bold;
        }
        .display-table {
            display: table;
        }
        .display-tr {
            display: table-row;
        }
        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 61%;
        }
        .error.form-group.hide{
            display: none;
        }
    </style>
  
<!-- <div class="container"> -->
  
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table" >
                    <div class="row display-tr" >
                        <h3 class="panel-title display-td" >Payment Details</h3>
                        <div class="display-td" >     
                        <img style="width:70%;" class="img-responsive pull-right" src="{{URL::asset('/images/stripe-payment.png')}}">        
                            <!-- <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png"> -->
                        </div>
                    </div>                    
                </div>
                <div class="panel-body">
  
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif

                    @php 
                        $stripe = SripeAccount(); 
                        $shop_cart = DB::table('shop_cart_items')->where('user_id',Auth::user()->id)->where('type','cart')->first();

                        $account_id = getAccountID($shop_cart->id);
                        $account_details = DB::table('stripe_accounts')->where('id',$account_id)->first();
                        //dd($account_details->public_key);
                    @endphp
  
                    <form role="form" action="{{url(route('shop.checkout.stripe.payment'))}}" method="post" class="require-validation"
                                data-cc-on-file="false"
                                data-stripe-publishable-key="{{isset($account_details->public_key) ? $account_details->public_key : $stripe['pk']}}"
                                id="payment-form" autocomplete="off">
                        @csrf

                        @php 
                            $base_url = \URL::current();  
                            $explodedText = explode('/purchase-package-course/', $base_url);    
                        @endphp

                        @if(!empty($explodedText[1]))
                            @php $url_id = $explodedText[1]; @endphp
                        @endif

                        <input type="hidden" name="booking_no" value="{{!empty($explodedText[1]) ? $explodedText[1] : ''}}">

                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
  
                        <div class='form-row row'>
                            <div class='col-lg-12 form-group required'>
                                <label class='control-label'>Name on Card</label> <input
                                    class='form-control' size='4' type='text' autocomplete="false">
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-lg-12 form-group  required'>
                                <label class='control-label'>Card Number</label> <input
                                    autocomplete='off' class='form-control card-number' size='20'
                                    type='text' autocomplete="false">
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                                    type='password' autocomplete="false">
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text' autocomplete="false">
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                    type='text' autocomplete="false">
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='error form-group hide'>
                                <div class='alert-danger alert'></div>
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="col-xs-12">
                                <div class="panel-btn-wrap">
                                <button class="cstm-btn main_button" type="submit">Pay Now (&pound;
                                    @php 
                                        $base_url = \URL::current();  
                                        $explodedText = explode('/purchase-package-course/', $base_url);    
                                    @endphp

                                    @if(!empty($explodedText[1]))
                                        @php 
                                            $url_id = $explodedText[1]; 
                                            $get_packages = DB::table('package_courses')->where('booking_no',$url_id)->get(); 
                                        @endphp

                                        @if(!empty($get_packages))
                                            @php $price = []; @endphp
                                            @foreach($get_packages as $package)
                                                @php $price[] = $package->price ; @endphp
                                            @endforeach

                                            @php $total_price = array_sum($price); @endphp
                                        @endif
                                    @endif

                                    @if(!empty($obj) && isset($obj))
                                        {{$obj->getGrandTotal()}}
                                    @elseif(!empty($explodedText))
                                        {{$total_price}}
                                    @endif

                                )</button>
                            </div>
                            </div>
                        </div>
                          
                    </form>
                </div>
            </div>        
        </div>
    </div>
      
<!-- </div> -->

  
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
<script type="text/javascript">
$(function() {
    var $form         = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
 
        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault();
      }
    });
  
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));

      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
  
  });
  
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            // token contains id, last4, and card type
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
            $("body").addClass('processing');
        }
    }
  
});
</script>
</html>