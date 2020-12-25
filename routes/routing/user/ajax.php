<?php







Route::group(['prefix' => 'ajax'], function(){

  Route::post('/send-message/{id}', 'Users\ChatController@sendMesage')->name('deal_discount_sendMessages'); 
  Route::get('/get-message/{id}', 'Users\ChatController@getMessages')->name('deal_discount_getMessages'); 
  Route::get('/get-chat-list', 'Users\ChatController@getList')->name('get_chat_list'); 
  Route::get('/get-messages/{id}', 'Users\ChatController@getChatBox')->name('chat_user_getMessages');  
  Route::post('/get-event-categories', 'Users\UserEventController@getEventCategories')->name('user_get_event_categories');    
   Route::get('/get-event-category', 'Users\UserEventController@getEventCategory')->name('user_get_event_category');  


    Route::post('/get-step-2', 'Users\PopUpStepController@saveEventFromPopup')->name('steps.second');  
    Route::get('/get-package-addons/{id}', 'Users\Cart\CartController@getAddons')->name('getPackageAddons');  
    Route::post('/add-package-addons', 'Users\Cart\CartController@addAddons')->name('addPackageAddons');  


    Route::get('/get-order-detail-according-to-category-event/{id}', 'Users\UserEventController@getOrderDetailOfEvent')->name('getOrderDetailOfEvent'); 

});























