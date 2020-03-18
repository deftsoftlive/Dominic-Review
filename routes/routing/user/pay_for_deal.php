<?php






Route::get('/buy-deal/{dealSlug}/{packageSlug}','Users\Checkout\DealStepController@payWithDeal')->name('payWithDeal');
//Route::post('/buy-deal/{dealSlug}/{packageSlug}','Users\Checkout\CheckoutController@payingWithDeal')->name('payWithDeal');



Route::group(['middleware' => 'UserAuth','prefix' => 'buy-deal'], function() {

    # step 1
    Route::get('/{dealSlug}/{packageSlug}/event','Users\Checkout\DealStepController@eventStep')->name('eventWithDeal');
    Route::post('/{dealSlug}/{packageSlug}/event','Users\Checkout\DealStepController@eventStepStore')->name('eventWithDeal');

    # step 2
    Route::get('/{dealSlug}/{packageSlug}/deal','Users\Checkout\DealStepController@dealStep')->name('checkoutDeal.dealReview');

      Route::post('/{dealSlug}/{packageSlug}/deal','Users\Checkout\DealStepController@dealStepPost')->name('checkoutDeal.dealReview');

	# package review for package only
	Route::get('/{dealSlug}/{packageSlug}/package/detail','Users\Checkout\DealStepController@packageType')->name('checkoutDeal.packageStep');
	Route::post('/{dealSlug}/{packageSlug}/package/detail','Users\Checkout\DealStepController@packageTypePost')->name('checkoutDeal.packageStep');

    
	# package review for package only
	Route::get('/{dealSlug}/{packageSlug}/billing/address','Users\Checkout\DealStepController@billingType')->name('checkoutDeal.billingStep');
	Route::post('/{dealSlug}/{packageSlug}/billing/address','Users\Checkout\DealStepController@billingTypePost')->name('checkoutDeal.billingStep');

     # package review for package only


    Route::get('/{dealSlug}/{packageSlug}/payment','Users\Checkout\DealStepController@paymentType')->name('checkoutDeal.paymentStep');
    Route::post('/{dealSlug}/{packageSlug}/payment','Users\Checkout\DealStepController@paymentTypePost')->name('checkoutDeal.paymentStep');
});









