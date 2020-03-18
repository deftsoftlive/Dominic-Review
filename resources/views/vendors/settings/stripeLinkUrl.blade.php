
<?php $sripeArray = SripeAccount(); ?>
@if(isset($_GET['code']))
<?php

 
                            $code = $_GET['code'];
                            $token_request_body = array(
                              'grant_type' => 'authorization_code',
                              'client_id' => $sripeArray['client_id'],
                              'code' => $code,
                              'client_secret' => $sripeArray['sk']
                            );

                            define('TOKEN_URI', 'https://connect.stripe.com/oauth/token');
                            define('AUTHORIZE_URI', 'https://connect.stripe.com/oauth/authorize');

                            $req = curl_init(TOKEN_URI);
                            curl_setopt($req, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($req, CURLOPT_POST, true );
                            curl_setopt($req, CURLOPT_POSTFIELDS, http_build_query($token_request_body));

                            // TODO: Additional error handling
                            $respCode = curl_getinfo($req, CURLINFO_HTTP_CODE);
                            $resp = json_decode(curl_exec($req), true);
                            curl_close($req);
  ?>



@if(!empty($resp['stripe_user_id']))
    <form action="{{ route('stripeSettings') }}" id="stripeForm" method="post">
      {{csrf_field()}}
      <input type="text" name="stripe_account" id="stripe_account" value="<?php echo $resp['stripe_user_id']; ?>" 
      class="form-control wdth" readonly>

      <div class="form-group">
        <label>Create Account for</label>
        <ul>
          <li>
                <input type="radio" name="type" id="accountType1" value="1" checked>
                <label for="accountType1">
                  Business
                </label>
          </li>

          @if(Auth::user()->shop->count() > 0)

          <li>
              <input type="radio" name="type" id="accountType2" value="2">
               <label for="accountType2">
                  E-Shop
               </label>
          </li>
          @endif
        </ul>

      </div>

      
      @if(!empty(Auth::User()->stripe_account))
        <div class="form-group label-floating is-focused" id="VendorCategories">
          <label class="control-label">Categories</label>
          <select class="form-control valid" name="category" id="category">
            <option value="">Select Category</option>
            @foreach(Auth::User()->services as $cate)  
              <option value="{{$cate->category->slug}}">{{$cate->category->label}}</option>
            @endforeach
          </select>
        </div>
      @endif

      <div class="col-md-6 col-sm-6 col-xs-12">
        <button id="stripeFormBtn" class="btn btn-primary">Activate Account</button>
      </div>
      </form>

@endif
                            
@elseif (isset($_GET['error'])) 

                            <!-- echo $_GET['error_description']; -->
                            {{ app('request')->input('error_description') }}

 @else                         
<?php
                            $authorize_request_body = array(
                              'response_type' => 'code',
                              'scope' => 'read_write',
                              'client_id' =>  $sripeArray['client_id']
                            );

                            define('AUTHORIZE_URI', 'https://connect.stripe.com/oauth/authorize');

                            $url = AUTHORIZE_URI . '?' . http_build_query($authorize_request_body);


 
 ?>


@if(!empty(Auth::user()->stripe_account))


   <table class="table">
     <tr>
        <th width="200">Global Account Id</th><td>{{Auth::user()->stripe_account}}</td>
     </tr>

    @foreach(Auth::User()->services as $cate)  
    <tr>
      <th width="200">{{$cate->category->label}}</th>
      <td>{{ $cate->stripe_account ? $cate->stripe_account : Auth::user()->stripe_account }}</td>
    </tr>
    @endforeach

    @if(Auth::user()->shop->count() > 0)
    <tr>
      <th width="200">{{Auth::user()->shop->name}}</th>
      <td>{{ Auth::user()->shop->stripe_account_id }}</td>
    </tr>
       
    @endif

     <tr>
        <th width="200">Account Status</th><td>Active</td>
     </tr>
   </table>





    <a href='{{$url}}' class='btn btn-primary'>Connect with Stripe For Business</a> 

@else
  <a href='{{$url}}' class='btn btn-primary'>Connect with Stripe</a> 
@endif


    


@endif