 <tbody>

  <tr>
                <th>
                    Price
                    <p>({{$package->title}})</p>

                </th>
                <td>${{custom_format($package->price,2)}}</td>
            </tr>

            @if(@sizeof($addOns))
            <tr>
                <th colspan="2">
                    Addons
                    <ul class="mini-inn-table">
                      @foreach($addOns as $loopingAddOns)
                        <li><span class="labl"> {{ $loopingAddOns->key }} </span><span> <i class="fa fa-plus"></i> ${{ custom_format($loopingAddOns->key_value) }}</span></li>
                      @endforeach   
                    </ul>
                </th>
            </tr>
            @endif

            @if(!empty($deal))
            <tr>
                <th>Deal Discount</th>
                <td><i class="fa fa-minus"></i> {{ ($deal->deal_off_type == 0) ? $deal->amount.'%' : '$'.$deal->amount }} OFF</td>
            </tr>
            @endif

            <tr>
                <th>Tax</th>
                <td><i class="fa fa-plus"></i> $3.00</td>
            </tr>

            <tr>
                <th>Service Fee</th>
                <td><i class="fa fa-plus"></i> $3.00</td>
            </tr>
           
          

             @if(@sizeof($coupnCode))
            <tr>
                <th>Promo Code Applied
                    <p> {{ $coupnCode->deal_code }} <span>{{ ($coupnCode->deal_off_type == 0) ? $coupnCode->amount.'%' : '$'.$coupnCode->amount }} Off</span></p>
                    <p class="removeCoupon"><span onclick="removeCoupon()">Remove Coupon</span></p>
                </th>
                <td><i class="fa fa-minus"></i> ${{ custom_format($coupnCode->amount) }}</td>
            </tr>
            @endif

            <tr class="total-price-row">
                <th>Total Payable Amount</th>
                <td>$<span id="packagePrice">{{custom_format($obj->getPayableAmount($deal,$package),2)}}</span></td>
            </tr>

   </tbody>     