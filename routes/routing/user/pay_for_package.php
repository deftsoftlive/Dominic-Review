  <?php


  Route::get('buy-package/{packageSlug}','Users\Checkout\CheckoutController@payWithPackage')->name('payWithPackage');

  Route::group(['middleware' => 'UserAuth','prefix' => 'buy-package'], function() {

      Route::post('/expressCheckout', 'Users\Checkout\PaypalController@expressCheckout')->name('checkout.expressCheckout');
      Route::get('/paypal/payToVendor', 'Users\Checkout\PaypalController@payouts')->name('user_payToVendor');
      Route::post('/paypal/payToVendor', 'Users\Checkout\PaypalController@payouts2')->name('user_payToVendor');

      Route::post('/checkCouponCode', 'Users\Checkout\CheckoutController@checkCouponCode')->name('checkout.checkCouponCode');
      Route::post('/removeCouponCode', 'Users\Checkout\CheckoutController@removeCouponCode')->name('checkout.removeCouponCode');


      Route::get('{packageSlug}/event','Users\Checkout\StepController@payWithPackage')->name('checkout.eventType');
      Route::post('{packageSlug}/event','Users\Checkout\StepController@eventType')->name('checkout.eventType');
      //Route::post('/{dealSlug}/{packageSlug}','Users\Checkout\StepController@withDealEventType')->name('checkout.eventType');


      # package review for package only
      Route::get('{packageSlug}/package/detail','Users\Checkout\StepController@packageType')->name('checkout.packageStep');
      Route::post('{packageSlug}/package/detail','Users\Checkout\StepController@packageTypePost')->name('checkout.packageStep');


        # package review for package only
      Route::get('{packageSlug}/billing/address','Users\Checkout\StepController@billingType')->name('checkout.billingStep');
      Route::post('{packageSlug}/billing/address','Users\Checkout\StepController@billingTypePost')->name('checkout.billingStep');

      # package review for package only
      Route::get('{packageSlug}/payment','Users\Checkout\StepController@paymentType')->name('checkout.paymentStep');
      Route::post('{packageSlug}/payment','Users\Checkout\StepController@paymentTypePost')->name('checkout.paymentStep');


      Route::get('{dealSlug}/{packageSlug}/deal','Users\Checkout\StepController@dealStep')->name('checkout.dealStep');


   });