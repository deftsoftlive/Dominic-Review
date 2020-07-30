<?php

 Route::group(['middleware' => ['UserAuth'],'prefix' => 'user'], function() {
         require __DIR__.'/tools/routes.php';

         Route::get('/', 'Users\DashboardController@index')->name('user_dashboard'); 
         Route::get('/profile', 'Users\DashboardController@profile')->name('user_profile'); 
         Route::post('/profile', 'Users\DashboardController@updateProfile')->name('user_profile'); 

         #-----------------------------------------------------------------------------------
         #  Coach Profile  ------------------------------------------------------------------
         #-----------------------------------------------------------------------------------
         Route::any('coach-reports', 'HomeController@coach_report')->name('coach_report');
         Route::any('coach-save-simple-reports', 'HomeController@save_simple_report')->name('save_simple_report');
         Route::any('coach-save-complex-reports', 'HomeController@save_complex_report')->name('save_complex_report');
         Route::any('get_player_from_course/{course_id}', 'HomeController@get_player_from_course')->name('get_player_from_course');
         Route::any('get_course_from_season/{season_id}', 'HomeController@get_course_from_season')->name('get_course_from_season');

         Route::any('report_popup', 'HomeController@report_popup')->name('report_popup');
         Route::any('sim_report_popup', 'HomeController@sim_report_popup')->name('sim_report_popup');

         Route::any('coach-qualifications', 'HomeController@qualifications')->name('qualifications');
         Route::any('save-qualifications', 'HomeController@save_qualifications')->name('save-qualifications');
         Route::any('coach-profile', 'HomeController@coach_profile')->name('coach_profile');
         Route::any('update-coach-profile', 'HomeController@update_coach_profile')->name('update_coach_profile');
         Route::any('delete/coach/document/{id}', 'HomeController@delete_coach_document')->name('delete_coach_document');
         Route::any('coach/player', 'HomeController@coach_player')->name('coach_player');

         // Upload Invoice PDF - By Coach
         Route::any('upload-invoice', 'HomeController@upload_inv_index')->name('upload_invoice');
         Route::any('upload-invoice/accept', 'HomeController@upload_inv_accept')->name('inv_accept');
         Route::any('upload-invoice/not-approved', 'HomeController@upload_inv_not_approve')->name('inv_not_approve');
         Route::any('upload-invoice/pending', 'HomeController@upload_inv_pending')->name('inv_pending');
         Route::any('upload-invoice/add', 'HomeController@upload_inv_add')->name('add_upload_invoice');
         Route::any('upload-invoice/save', 'HomeController@upload_inv_save')->name('save_upload_invoice');
         Route::any('upload-invoice/edit/{id}', 'HomeController@upload_inv_edit')->name('edit_upload_invoice');

         Route::any('badges','HomeController@badges')->name('badges');
         Route::get('selectedSeason','HomeController@selectedSeason')->name('selectedSeason');
         Route::any('update_user_profile','HomeController@update_user_profile')->name('update_user_profile');
         Route::any('update_tennis_club/{tennis_club}/{user_id}/{shop_id}','HomeController@update_tennis_club')->name('update_tennis_club');

         Route::any('dismiss-request/coach', 'HomeController@dismiss_req_by_coach')->name('dismiss-request-coach');
         Route::any('dismiss-request/parent', 'HomeController@dismiss_req_by_parent')->name('dismiss-request-parent');

         Route::any('request-by-parent', 'HomeController@request_by_parent')->name('request_by_parent');
         Route::any('my-coaches', 'HomeController@linked_coaches')->name('linked_coaches');
         Route::any('reject_request', 'HomeController@reject_request')->name('reject_request');
         Route::any('undo_reject_request', 'HomeController@undo_reject_request')->name('undo_reject_request');
         Route::any('parent-coach', 'HomeController@parent_coach')->name('parent_coach');
         Route::any('add-money-to-wallet', 'HomeController@add_money_to_wallet')->name('add_money_to_wallet');
         Route::any('stripe-wallet', 'HomeController@stripe_wallet')->name('stripe-wallet');
         Route::any('add-wallet-amt', 'HomeController@add_wallet_amt')->name('add_wallet_amt');
         Route::post('updatePassword', 'HomeController@updatePassword')->name('coach.updatePassword');
         Route::any('notifications', 'HomeController@parent_notifications')->name('parent_notifications');

         #-----------------------------------------------------------------------------------
         #  Event Management ----------------------------------------------------------------
         #-----------------------------------------------------------------------------------

          Route::get('/events', 'Users\UserEventController@index')->name('user_events');
          Route::get('/events/{id}', 'Users\UserEventController@index')->name('user_event');
          Route::get('/event/create', 'Users\UserEventController@showCreateEvent')->name('user_show_create_event');
          Route::post('/event/create', 'Users\UserEventController@create')->name('user_show_create_event');
          Route::get('/events/edit/{slug}', 'Users\UserEventController@showEditEvent')->name('user_show_edit_event');
          Route::get('/events/detail/{slug}', 'Users\UserEventController@showDetailEvent')->name('user_show_detail_event');
          Route::get('/hitesh-event', 'Users\UserEventController@hiteshEvent')->name('hitesh_event');
          Route::post('/events/edit/{slug}', 'Users\UserEventController@update')->name('user_show_edit_event');
          Route::post('/events/update/{slug}', 'Users\UserEventController@eventExtraDetail')->name('eventExtraDetail');


         #-----------------------------------------------------------------------------------
         #  Event Management ----------------------------------------------------------------
         #-----------------------------------------------------------------------------------
          
          Route::get('/favourite-vendors/{id}', 'Users\DashboardController@addFavouriteVendors')->name('user_add_favourite_vendors');
          Route::get('/favourite-vendors', 'Users\DashboardController@favouriteVendors')->name('user_show_favourite_vendors');
          Route::get('/favourite-vendors/delete/{id}', 'Users\DashboardController@deleteFavouriteVendor')->name('user_delete_favourite_vendors');


         Route::get('/messages/chats', 'Users\ChatController@index')->name('deal_discount_chats'); 
         Route::get('/messages/chat/{id}', 'Users\ChatController@chat')->name('deal_discount_chatMessages'); 

         #-----------------------------------------------------------------------------------
         #  Event Management ----------------------------------------------------------------
         #-----------------------------------------------------------------------------------


         #-----------------------------------------------------------------------------------
         #  Orders Management ----------------------------------------------------------------
         #-----------------------------------------------------------------------------------


          Route::get('/orders', 'Users\UserOrderController@index')->name('user_orders'); 
          Route::get('/order/{orderID}/detail', 'Users\UserOrderController@orderDetail')->name('order_details');

          
          Route::get('/orders/event/{orderID}', 'Users\UserEventController@dispute')->name('user.event.dispute');
          Route::post('/orders/event/{orderID}', 'Users\UserEventController@disputePost')->name('user.event.dispute');


          Route::get('/orders/event/review/{orderID}', 'Users\UserEventController@dispute')->name('user.event.review');
          Route::post('/orders/event/review/{orderID}', 'Users\UserEventController@disputePost')->name('user.event.review');
         #-----------------------------------------------------------------------------------
         #  Orders Management ----------------------------------------------------------------
         #-----------------------------------------------------------------------------------


          Route::get('shop/orders', 'Users\ShopOrderController@index')->name('users.shop.orders'); 

          Route::get('shop/order/{orderID}/detail', 'Users\ShopOrderController@orderDetail')
               ->name('users.shop.order.detail'); 

           Route::get('shop/order/review/{order_id}/{item_id}/create',
                      'Users\ShopOrderController@addReview'
                      )->name('users.shop.order.review');

          Route::post('shop/order/review/{order_id}/{item_id}/create',
                      'Users\ShopOrderController@saveReview'
                      )->name('users.shop.order.review');


           #-----------------------------------------------------------------------------------
           #  Inviting Vendors ----------------------------------------------------------------
           #-----------------------------------------------------------------------------------
   
          Route::get('/inviting-vendors', 'Users\VendorsController@index')->name('user.inviting.vendors'); 
          Route::get('/inviting-vendor', 'Users\VendorsController@add')->name('users.invite.newVendor'); 
          Route::post('/inviting-vendor', 'Users\VendorsController@store')->name('users.invite.newVendor'); 


           #-----------------------------------------------------------------------------------
           #  Inviting Vendors ----------------------------------------------------------------
           #-----------------------------------------------------------------------------------
   
          Route::get('/inviting-users', 'Users\VendorsController@index2')->name('user.inviting.users'); 
          Route::get('/inviting-user', 'Users\VendorsController@add2')->name('users.invite.newUser'); 
          Route::post('/inviting-user', 'Users\VendorsController@store2')->name('users.invite.newUser'); 





     









});