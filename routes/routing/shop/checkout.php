<?php

Route::group(['prefix' => 'checkout','middleware' => 'ShopCheckoutCheck'], function(){




   Route::get('/','Shop\CheckoutController@index')->name('shop.checkout.index');
   Route::post('/shipping/save','Shop\CheckoutController@postAddress')->name('shop.checkout.shipping');



   Route::get('/review/cart','Shop\CheckoutController@reviewCart')->name('shop.checkout.reviewCart');
   Route::get('/billing-address','Shop\CheckoutController@billingAddress')->name('shop.checkout.billingAddress');
   Route::post('/billing-address','Shop\CheckoutController@postBillingAddress')->name('shop.checkout.billingAddress');

   Route::get('/payment','Shop\CheckoutController@payment')->name('shop.checkout.payment');
   Route::post('/stripe/payment','Shop\CheckoutController@postPaymentStripe')->name('shop.checkout.stripe.payment');


   

});
