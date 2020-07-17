<?php

Route::group(['prefix' => 'checkout'], function(){




   Route::get('/','Shop\CheckoutController@index')->name('shop.checkout.index');
   Route::any('/shipping/save','Shop\CheckoutController@postAddress')->name('shop.checkout.shipping');



   Route::get('/review/cart','Shop\CheckoutController@reviewCart')->name('shop.checkout.reviewCart');
   Route::get('/participant-info','Shop\CheckoutController@participantInfo')->name('shop.checkout.participantInfo');
   Route::any('/saveParticipantInfo', 'Shop\CheckoutController@saveParticipantInfo')->name('shop.checkout.saveParticipantInfo');
   Route::get('/billing-address','Shop\CheckoutController@billingAddress')->name('shop.checkout.billingAddress');
   Route::post('/billing-address','Shop\CheckoutController@postBillingAddress')->name('shop.checkout.billingAddress');

   Route::any('/payment','Shop\CheckoutController@payment')->name('shop.checkout.payment');
   Route::any('/removeCoupon','Shop\CheckoutController@removeCoupon')->name('removeCoupon');
   Route::post('/stripe/payment','Shop\CheckoutController@postPaymentStripe')->name('shop.checkout.stripe.payment');


   

});
