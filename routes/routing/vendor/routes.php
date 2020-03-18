<?php

Route::group(['middleware' => ['VendorAuth'],'prefix' => 'vendors'], function(){

require __DIR__.'/ajax.php';
require __DIR__.'/shop.php';
		Route::get('/', 'Vendor\VendorController@index')->name('vendor_dashboard'); 
		Route::get('/settings', 'Vendor\VendorController@vendor_profile')->name('vendor_profile'); 
		Route::post('/settings', 'Vendor\VendorController@vendorProfile')->name('vendor_profile');
        Route::get('/settings/password', 'Vendor\VendorController@password')->name('vendor_password'); 
		Route::post('/settings/password', 'Vendor\VendorController@changePassword')->name('vendor_password'); 

        Route::get('/settings/payment', 'Vendor\VendorController@payment')->name('vendor_payment'); 
		Route::post('/settings/payment', 'Vendor\VendorController@updatePayment')->name('vendor_payment');
        Route::get('/category/{slug}/payment', 'Vendor\ManagementController@paymentSetting')->name('vendor_cat_pay_management');
        Route::post('/category/{slug}/payment', 'Vendor\ManagementController@updatePaymentSetting')->name('vendor_cat_pay_management');


        Route::get('/category/assign', 'Vendor\CategoryController@assign')->name('vendor_category_assign');    
		Route::get('/category/assign/new', 'Vendor\CategoryController@assign2')->name('vendor_category_assign2');    
		Route::post('/category/assign', 'Vendor\CategoryController@assignCategory')->name('vendorAssignCategory'); 


		#-------------------------------------------------------------------------------------------
		#  vendor_category_management
		#-------------------------------------------------------------------------------------------
        Route::get('/category/{slug}/basic/information', 'Vendor\ManagementController@about')->name('vendor_category_management');
        Route::get('/category/{slug}/basic/information/add', 'Vendor\ManagementController@addAbout')->name('vendor_basic_category_management');
		Route::post('/category/{slug}/basic/information/add', 'Vendor\ManagementController@storeAbout')->name('vendor_basic_category_management');
        
        Route::post('/ajax/category/{slug}/basic/information/cover-photo','Vendor\ManagementController@MetaImage')->name('meta_image');



        #-------------------------------------------------------------------------------------------
        #  vendor_category_management
        #------------------------------------------------------------------------------------------- 


		Route::get('/category/{slug}/gallery/images', 'Vendor\ManagementController@images')->name('vendor_category__image_management');

        Route::get('/category/{slug}/gallery/image-gallery', 'Vendor\ManagementController@imageGallery')->name('vendor_category__image_gallery_management');

		Route::get('/category/{slug}/gallery/images/add', 'Vendor\ManagementController@imageView')->name('vendor_category_add_image_management');
		Route::post('/ajax/category/management/gallery/images', 'Vendor\ManagementController@upload')->name('upload_vendor_image_gallery');


        Route::get('/category/{slug}/delete/metas/{id}', 'Vendor\ManagementController@delete')->name('vendor_category_meta_delete');

        Route::get('/category/{slug}/gallery/videos', 'Vendor\ManagementController@videos')->name('vendor_category_videos_management');

        Route::get('/category/{slug}/gallery/videos/add', 'Vendor\ManagementController@addVideos')->name('vendor_category_videos_add_management');
        Route::post('/category/{slug}/gallery/videos/add', 'Vendor\ManagementController@saveVideos')->name('vendor_category_videos_add_management');



         Route::get('/category/{slug}/gallery/videos/delete/{id}', 'Vendor\ManagementController@deleteVideos')->name('vendor_category_videos_delete_management');


          Route::get('/category/{slug}/gallery/videos/edit/{id}', 'Vendor\ManagementController@editVideos')->name('vendor_category_videos_edit_management');

         Route::post('/category/{slug}/gallery/videos/edit/{id}', 'Vendor\ManagementController@updateVideos')->name('vendor_category_videos_edit_management');



        #-------------------------------------------------------------------------------------------
		#  vendor_category_management
		#-------------------------------------------------------------------------------------------


        Route::get('/category/{slug}/faqs', 'Vendor\ManagementController@faqs')->name('vendor_faqs_management');
        Route::get('/category/{slug}/faqs/add', 'Vendor\ManagementController@faqsAdd')->name('vendor_faqsadd_management');  
        Route::post('/category/{slug}/faqs/add', 'Vendor\ManagementController@faqsStore')->name('vendor_faqsadd_management'); 

       // Route::get('/category/{slug}/faqs/delete/{id}', 'Vendor\ManagementController@faqsDelete')->name('vendor_faq_del_management'); 

        Route::get('/category/{slug}/faqs/del/{id}', 'Vendor\ManagementController@faqsDelete')->name('vendor_faq_del_management');  
        Route::get('/category/{slug}/faqs/edit/{id}', 'Vendor\ManagementController@faqsEdit')->name('vendor_faqsedit_management');  
        Route::post('/category/{slug}/faqs/edit/{id}', 'Vendor\ManagementController@faqsUpdate')->name('vendor_faqsedit_management');


        #-------------------------------------------------------------------------------------------
		#  vendor amitiies asso=ign
		#-------------------------------------------------------------------------------------------


        Route::get('/category/{slug}/amenity', 'Vendor\ManagementController@amenity')->name('get_vendor_amenity_management');
        Route::post('/ajax/category/{slug}/amenity', 'Vendor\ManagementController@amenityAssignAjax')
        ->name('vendor_amenity_management');


        #-------------------------------------------------------------------------------------------
        #  vendor amitiies asso=ign
        #-------------------------------------------------------------------------------------------


        Route::get('/category/{slug}/season', 'Vendor\ManagementController@seasons')->name('get_vendor_season_management');
        Route::post('/ajax/category/{slug}/season', 'Vendor\ManagementController@seasonAssignAjax')->name('vendor_season_management');


        #-------------------------------------------------------------------------------------------
		#  vendor events asso=ign
		#-------------------------------------------------------------------------------------------


        Route::get('/category/{slug}/event', 'Vendor\ManagementController@event')->name('get_vendor_event_management');
        Route::post('/ajax/category/{slug}/event', 'Vendor\ManagementController@eventAssignAjax')->name('vendor_event_management');


        

        #-------------------------------------------------------------------------------------------
		#  vendor events asso=ign
		#-------------------------------------------------------------------------------------------


        Route::get('/category/{slug}/services', 'Vendor\ManagementController@services')->name('get_vendor_services_management');


        Route::post('/ajax/category/{slug}/services', 'Vendor\ManagementController@servicesAssignAjax')->name('vendor_eservices_management');

        

        #-------------------------------------------------------------------------------------------
		#  vendor category Description
		#-------------------------------------------------------------------------------------------


        Route::get('/category/{slug}/description', 'Vendor\ManagementController@description')->name('vendor_description_management');
        Route::get('/category/{slug}/description/add', 'Vendor\ManagementController@descriptionAdd')->name('vendor_descriptionadd_management');
        Route::post('/category/{slug}/description/add', 'Vendor\ManagementController@descriptionStore')->name('vendor_descriptionadd_management');




        Route::get('/category/{slug}/style', 'Vendor\ManagementController@style')->name('vendor_style_management');
        Route::post('/category/{slug}/style', 'Vendor\ManagementController@styleStore')->name('vendor_styleStore_management');
        Route::get('/category/{slug}/create-style', 'Vendor\ManagementController@newStyle')->name('vendor_new_style');
        Route::post('/category/{slug}/store-style', 'Vendor\ManagementController@storeStyle')->name('vendor_store_style');
        Route::get('/category/{slug}/list-styles', 'Vendor\ManagementController@listingStyles')->name('vendor_listing_style');
        Route::get('/category/{slug}/styles/delete/{id}', 'Vendor\ManagementController@deleteStyles')->name('vendor_delete_styles_management');
        Route::any('/category/{catSlug}/{slug}/styles/edit/{id}', 'Vendor\ManagementController@editStyles')->name('vendor_edit_styles_management');
        // Route::post('/category/{slug}/style', 'Vendor\ManagementController@styleAdd')->name('vendor_styleAdd_management');
        // Route::get('/category/{slug}/style/add', 'Vendor\ManagementController@styleAdd')->name('vendor_styleadd_management');
        // Route::post('/category/{slug}/style/add', 'Vendor\ManagementController@styleStore')->name('vendor_styleadd_management');



        #-----------------------------------------------------------------------------------
        #  vendor events asso=ign
        #-----------------------------------------------------------------------------------

        Route::get('/category/{slug}/packages', 'Vendor\VendorPackageController@packages')->name('vendor_packages_management');

        Route::get('/category/{slug}/packages/add', 'Vendor\VendorPackageController@packagesAdd')->name('vendor_packagesadd_management');  
        Route::post('/category/{slug}/packages/add', 'Vendor\VendorPackageController@packagesStore')->name('vendor_packagesadd_management'); 
        Route::get('/category/{slug}/packages/delete/{id}', 'Vendor\VendorPackageController@packagesDelete')->name('vendor_packages_delete_management');  
        Route::get('/category/{slug}/packages/edit/{id}', 'Vendor\VendorPackageController@packagesEdit')->name('vendor_packagesedit_management');  
        Route::post('/category/{slug}/packages/edit/{id}', 'Vendor\VendorPackageController@packagesUpdate')->name('vendor_packagesedit_management');
        Route::post('/category/{slug}/packages/addOns/{id}', 'Vendor\VendorPackageController@addOnsCreate')->name('vendor_packagesAddOns_management');
        Route::get('/category/{slug}/packages/addOns/delete/{id}', 'Vendor\VendorPackageController@addOnsDelete')->name('vendor_packagesAddOns_delete_management');



          Route::get('/category/{slug}/custom/package/{id}/{chat_id}', 'Vendor\CustomPackageController@packagesAdd')->name('vendor.custom.packageCreate');  

            Route::post('/category/{slug}/custom/package/{id}/{chat_id}', 'Vendor\CustomPackageController@store')->name('vendor.custom.packageCreate'); 



        #-----------------------------------------------------------------------------------
        #  vendor De;as and Discount
        #-----------------------------------------------------------------------------------

         Route::get('/category/{slug}/deals', 'Vendor\DealController@index')->name('vendor_deals_management');

         Route::get('/category/{slug}/deals/add', 'Vendor\DealController@add')->name('vendor_add_deals_management');
         Route::post('/category/{slug}/deals/add', 'Vendor\DealController@store')->name('vendor_add_deals_management');



         Route::get('/category/{slug}/deals/edit/{id}', 'Vendor\DealController@edit')->name('vendor_edit_deals_management');
         Route::post('/category/{slug}/deals/edit/{id}', 'Vendor\DealController@update')->name('vendor_edit_deals_management');



         Route::get('/category/{slug}/deals/delete/{id}', 'Vendor\DealController@delete')->name('vendor_delete_deals_management');


           



        #-----------------------------------------------------------------------------------
        #  Prohibtion & Restrictions
        #-----------------------------------------------------------------------------------


        Route::get('/category/{slug}/prohibtion/restrictions', 'Vendor\ManagementController@prohibtion')->name('vendor_prohibtion_management');
       Route::get('/category/{slug}/prohibtion/restrictions/add', 'Vendor\ManagementController@prohibtionAdd')->name('vendor_add_prohibtion_management');
        
       Route::post('/category/{slug}/prohibtion/restrictions/add', 'Vendor\ManagementController@prohibtionStore')->name('vendor_add_prohibtion_management');


        #-----------------------------------------------------------------------------------
        #  Preview My Business
        #-----------------------------------------------------------------------------------

        

        Route::get('/my-business/{slug}/{vendorSlug}', 'Vendor\MyBusinessController@index')->name('myBusinessView');
        Route::post('/my-business/{slug}/{vendorSlug}', 'Vendor\MyBusinessController@submitForApproval')->name('myBusinessView');




        #-----------------------------------------------------------------------------------
        #  Preview My Business
        #-----------------------------------------------------------------------------------

        

        Route::get('/category/{slug}/chats', 'Vendor\ChatController@index')->name('myCategoryChat');



        Route::get('/category/{slug}/chat', 'Vendor\ChatController@index2')->name('myCategoryChats');
        Route::get('/category/{slug}/chat/{id}', 'Vendor\ChatController@chatMessages')->name('deal_discount_vendor_chatMessages');


        #-----------------------------------------------------------------------------------
        #  Stripe Settings
        #-----------------------------------------------------------------------------------

        Route::get('/payment/settings/stripe', 'Vendor\StripePaymentSettingController@index')->name('stripeSettings');
        Route::post('/payment/settings/stripe', 'Vendor\StripePaymentSettingController@store')->name('stripeSettings');



        #-----------------------------------------------------------------------------------
        #
        #-----------------------------------------------------------------------------------

        Route::get('/category/{slug}/orders', 'Vendor\OrderController@index')->name('vendor.orders');
        Route::get('/category/{slug}/order/{id}', 'Vendor\OrderController@detail')->name('vendor.orderDetail');


});