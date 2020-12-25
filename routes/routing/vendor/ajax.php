<?php






Route::group(['prefix' => 'ajax'], function(){

Route::post('/upload-gallery-images','Vendor\ManagementController@uploadGalleryImage')->name('uploadGalleryImage');

Route::post('/deal-And-Discount-Send-Messages/{id}','Vendor\ChatController@sendMessages')->name('dealAndDiscountSendMessages');
 
Route::get('/chat/{slug}/get-messages/{id}','Vendor\ChatController@getMessages')->name('getMessageOfBusiness');
 
Route::get('/business/{slug}/chatlist', 'Vendor\ChatController@getchatList')->name('getBusineschatList'); 




Route::get('/chat/{slug}/chatbox/{id}','Vendor\ChatController@getChatbox')->name('getChatBoxOfBusiness');


});
