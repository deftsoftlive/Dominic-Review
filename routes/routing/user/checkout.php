<?php

 
 Route::group([['middleware' => 'Checkout'],'prefix' => 'checkout'], function() {

 	// paypal payment

 	Route::get('/billing-address','Users\Checkout\CheckoutController@billingAddress')->name('checkout.billingAdress');
 	Route::post('/billing-address','Users\Checkout\CheckoutController@postAddress')->name('checkout.billingAdress');


 	Route::get('/order-summary','Users\Checkout\CheckoutController@orderSummary')->name('checkout.orderSummary');
 	Route::get('/order-summary-data','Users\Checkout\CheckoutController@getOrderSummary')->name('checkout.getOrderSummary');


 	Route::get('/payment','Users\Checkout\CheckoutController@paymentPage')->name('checkout.paymentPage');
 	Route::post('/payment','Users\Checkout\CheckoutController@payWithStripe')->name('checkout.payWithStripe');
 
      
       //Route::get('buy-package/{packageSlug}','Home\Checkout\CheckoutController@payWithPackage')->name('payWithPackage');
      //Route::post('{packageSlug}','Home\Checkout\CheckoutController@payingWithPackage')->name('payingWithPackage');

		#------------------------------------------------------------------------------------------------------
		#----------------------------this will check user is logged in ----------------------------------------
		#------------------------------------------------------------------------------------------------------
		   // require __DIR__.'/pay_for_deal.php';
		    
		#------------------------------------------------------------------------------------------------------
		#------------------------------------------------------------------------------------------------------
		#------------------------------------------------------------------------------------------------------

 });



  Route::group([['middleware' => 'Checkout'],'prefix' => 'direct/checkout'], function() {

 	// paypal payment

 	Route::get('/billing-address','Users\Checkout\CheckoutController@billingAddress')->name('direct.checkout.billingAdress');
 	Route::post('/billing-address','Users\Checkout\CheckoutController@postAddress')->name('direct.checkout.billingAdress');


 	Route::get('/order-summary','Users\Checkout\CheckoutController@orderSummary')->name('direct.checkout.orderSummary');
 	Route::get('/order-summary-data','Users\Checkout\CheckoutController@getOrderSummary')->name('direct.checkout.getOrderSummary');


 	Route::get('/payment','Users\Checkout\CheckoutController@paymentPage')->name('direct.checkout.paymentPage');
 	Route::post('/payment','Users\Checkout\CheckoutController@payWithStripe')->name('direct.checkout.payWithStripe');
 });


Route::get('/thank-you', 'Home\Checkout\CheckoutController@thankyou')->name('thank-you');
