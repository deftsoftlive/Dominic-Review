<?php

 Route::group(['middleware' => ['UserAuth'],'prefix' => 'user'], function() {
         require __DIR__.'/tools/routes.php';

         Route::get('/', 'Users\DashboardController@index')->name('user_dashboard'); 
         Route::get('/profile', 'Users\DashboardController@profile')->name('user_profile'); 
         Route::post('/profile', 'Users\DashboardController@updateProfile')->name('user_profile'); 

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