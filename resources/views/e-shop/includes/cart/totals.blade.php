<?php
$subtotal = 0;
$total = 0;

if($userCartContent->count() > 0){
 
$subtotal = $userCartContent->sum('total');
$total = $userCartContent->sum('total');

}else{
    $subtotal = Cart::getSubTotal();
    $total = Cart::getTotal();
}

?>   
                           
 <h3 class="card-title">Cart Totals</h3>
        <table class="cart__totals">
            <thead class="cart__totals-header">
                <tr>
                    <th>Subtotal</th>
                    <td>£{{custom_format($subtotal,2)}}</td>
                </tr>
            </thead>
           <!--  <tbody class="cart__totals-body">
                <tr>
                    <th>Shipping</th>
                    <td>$25.00
                        <div class="cart__calc-shipping"><a href="#">Calculate Shipping</a></div>
                    </td>
                </tr>
                <tr>
                    <th>Tax</th>
                    <td>$0.00</td>
                </tr>
            </tbody> -->
            <tfoot class="cart__totals-footer">
                <tr>
                    <th>Total</th>
                    <td>£{{custom_format($total,2)}}</td>
                </tr>
            </tfoot>
        </table>

        <!-- <a class="cstm-btn solid-btn btn-xl btn-block cart__checkout-button" href="{{url(route('shop.checkout.index'))}}">Proceed to checkout</a> -->
        <a class="cstm-btn solid-btn btn-xl btn-block cart__checkout-button main_button" href="{{url(route('shop.checkout.reviewCart'))}}">Proceed to checkout</a>