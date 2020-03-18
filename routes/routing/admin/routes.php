<?php

Route::get('/admin/login', 'Admin\AdminController@index')->name('admin_login');
Route::post('/admin/login', 'Admin\AdminController@check')->name('post_admin_login');

Route::group(['middleware' => ['AdminAuth'], 'prefix' => 'admin'], function() {
       require __DIR__.'/ajax.php';
       require __DIR__.'/product.php';

		Route::get('/','Admin\AdminController@dashboard')->name('admin_dashboard');
		Route::get('/profile/settings','Admin\AdminController@profile')->name('admin_settings');
		Route::post('/profile/settings/image','Admin\AdminController@changeProfileImage')->name('post_admin_settings');
		Route::post('/profile/settings/password','Admin\AdminController@change')->name('post_admin_password_settings');

		Route::get('/logout', 'Admin\AdminController@logout')->name('admin_logout');

		#----------------------------------------------------------------
		#  Category Management
		#----------------------------------------------------------------

		Route::get('/category/index','Admin\CategoryController@index')->name('list_category');
		Route::get('/category/index/sorting','Admin\CategoryController@sortingIndex')->name('index_sorting_category');
		Route::post('ajax/category/index/sorting','Admin\CategoryController@sorting')->name('sorting_category');
		Route::get('/category/create','Admin\CategoryController@create')->name('create_category');
		Route::post('/category/create','Admin\CategoryController@store')->name('store_category');
		Route::get('/category/edit/{slug}','Admin\CategoryController@edit')->name('edit_category');
		Route::get('/category/variations/{slug}','Admin\CategoryController@category_variations')->name('category_variations');

		Route::post('/category/variations/{slug}','Admin\CategoryController@category_variations_save')->name('category_variations_save');

		Route::post('/category/edit/{slug}','Admin\CategoryController@update')->name('update_category');
		Route::get('/category/delete/{id}','Admin\CategoryController@delete')->name('delete_category');
		Route::post('/category/delete/image/{id}','Admin\CategoryController@deleteImage')->name('delete_category_image');
		Route::get('/category/ajax/edit/','Admin\CategoryController@edit2')->name('edit_ajax_category');



		Route::get('/category/tasks/index','Admin\CategoryController@taskList')->name('admin.category.taskList');
		Route::get('/category/tasks/add','Admin\CategoryController@tasks')->name('admin.category.tasks.add');
		Route::post('/category/tasks/add','Admin\CategoryController@postTasks')->name('admin.category.tasks.add');
		Route::get('/ajax/category/tasks','Admin\CategoryController@getTaskCategory')->name('admin.category.getTaskCategory');
        Route::get('/ajax/category/tasks/ajax','Admin\CategoryController@ajax2')->name('admin.category.ajax2');

        Route::get('/category/tasks/edit/{id}','Admin\CategoryController@editTask')->name('admin.category.tasks.edit');
        Route::post('/category/tasks/edit/{id}','Admin\CategoryController@updateTask')->name('admin.category.tasks.edit');


		#----------------------------------------------------------------
		#  Event/Celebration Management
		#----------------------------------------------------------------

		Route::get('/events','Admin\EventController@index')->name('list_events');
		Route::get('/event/create','Admin\EventController@create')->name('create_event_type');
		Route::post('/event/create','Admin\EventController@store')->name('store_events');
		Route::get('/event/ajax','Admin\EventController@ajax_getEvent')->name('ajax_getEvents');
		Route::get('/event/edit/{slug}','Admin\EventController@edit')->name('edit_event');
		Route::post('/event/edit/{slug}','Admin\EventController@update')->name('update_event');
		Route::get('/event/status/{slug}','Admin\EventController@event_status')->name('event_status');



		#----------------------------------------------------------------
		#  Amenities/Games Management
		#----------------------------------------------------------------
		// GAMES
		Route::get('/games','Admin\AmenityGamesController@game_index')->name('list_games');

		Route::get('/amenities','Admin\AmenityGamesController@index')->name('list_amenities');
		Route::get('/amenities/create','Admin\AmenityGamesController@create')->name('create_amenities_type');
		Route::post('/amenities/create','Admin\AmenityGamesController@store')->name('store_amenities');
		Route::get('/amenities/ajax','Admin\AmenityGamesController@ajax_getAmenity')->name('ajax_getAmenity');
		//  games
		Route::get('/games/ajax','Admin\AmenityGamesController@ajax_getGames')->name('ajax_getGames');
		Route::get('/amenities/edit/{slug}','Admin\AmenityGamesController@edit')->name('edit_amenity');
		Route::post('/amenities/edit/{slug}','Admin\AmenityGamesController@update')->name('update_amenity');
		Route::get('/amenities/status/{slug}','Admin\AmenityGamesController@amenity_status')->name('amenity_status');


		#----------------------------------------------------------------
		#  Event/Celebration Management
		#----------------------------------------------------------------
		Route::get('/seasons','Admin\SeasonController@index')->name('list_seasons');
		Route::get('/seasons/create','Admin\SeasonController@create')->name('create_seasons');
		Route::post('/seasons/create','Admin\SeasonController@store')->name('store_seasons');
		Route::get('/seasons/ajax','Admin\SeasonController@ajax_getEvent')->name('ajax_getSeasons');
		Route::get('/seasons/edit/{slug}','Admin\SeasonController@edit')->name('edit_seasons');
		Route::post('/seasons/edit/{slug}','Admin\SeasonController@update')->name('update_seasons');
		Route::get('/seasons/status/{slug}','Admin\SeasonController@event_status')->name('seasons_status');

		#----------------------------------------------------------------
		#  User/Vendor Management
		#----------------------------------------------------------------
		Route::get('/users','Admin\UserController@index')->name('list_users');
		Route::any('/add-user','Admin\UserController@add_user')->name('add_user');
		Route::any('/save-user','Admin\UserController@save_user')->name('save_user');
		Route::get('/users/edit/{id}','Admin\UserController@edit_users')->name('edit_users');
		Route::post('/user/update','Admin\UserController@update_users')->name('update_users');
		Route::any('/user/delete/{id}','Admin\UserController@delete_user')->name('delete_user');

		#----------------------------------------------------------------
		#  Parents/Coach Management
		#----------------------------------------------------------------
		Route::get('/users/parent','Admin\UserController@parent_list')->name('parent_users');
		Route::get('/users/coach','Admin\UserController@coach_list')->name('coach_users');

		#----------------------------------------------------------------
		#  Testimonial Management
		#----------------------------------------------------------------
		Route::get('/testimonial','Admin\TestimonialController@testimonial_index')->name('admin.testimonial.list');
		Route::get('/testimonial/create','Admin\TestimonialController@testimonial_showCreate')->name('admin.testimonial.showCreate');
		Route::post('/testimonial/create','Admin\TestimonialController@testimonial_create')->name('admin.testimonial.create');
		Route::get('/testimonial/{slug}','Admin\TestimonialController@testimonial_showEdit')->name('admin.testimonial.showEdit');
		Route::post('/testimonial/{slug}','Admin\TestimonialController@testimonial_update')->name('admin.testimonial.update');
		Route::get('/testimonial/status/{slug}','Admin\TestimonialController@testimonial_Status')->name('admin.testimonial.status');


		#----------------------------------------------------------------
		#  Course Management
		#----------------------------------------------------------------
		Route::get('/course','Admin\CourseController@course_index')->name('admin.course.list');
		Route::get('/course/create','Admin\CourseController@course_showCreate')->name('admin.course.showCreate');
		Route::post('/course/create','Admin\CourseController@course_create')->name('admin.course.create');
		Route::get('/course/{slug}','Admin\CourseController@course_showEdit')->name('admin.course.showEdit');
		Route::post('/course/{slug}','Admin\CourseController@course_update')->name('admin.course.update');
		Route::get('/course/status/{slug}','Admin\CourseController@course_Status')->name('admin.course.status');



		#----------------------------------------------------------------
		#  Businesses Management
		#----------------------------------------------------------------
		Route::get('/businesses', 'Admin\BusinessController@index')->name('admin.business.index');
		Route::get('/businesses/ajax_getBusinesses/{status}', 'Admin\BusinessController@ajax_getBusinesses')->name('admin.business.ajax_getBusinesses');
		Route::get('/businesses/changeBusinessesStatus/{ven_cat_id}/{status}', 'Admin\BusinessController@changeBusinessesStatus')->name('admin_business_changeBusinessesStatus');

		Route::post('/vendors/business/rejectBusinessStatus/{user_id}/{service_id}','Admin\BusinessController@rejectBusinessStatus')->name('admin_vendor_business_rejectBusinessStatus');

		#----------------------------------------------------------------
		#  Venue Management
		#----------------------------------------------------------------
		Route::get('/venues','Admin\VenueController@index')->name('admin.venues.list');
		Route::get('/venues/create','Admin\VenueController@showCreate')->name('admin.venues.showCreate');
		Route::post('/venues/create','Admin\VenueController@create')->name('admin.venues.create');
		Route::get('/venues/ajax_getVenues','Admin\VenueController@ajax_getVenues')->name('admin.venues.ajax_getVenues');
		Route::get('/venues/{slug}','Admin\VenueController@showEdit')->name('admin.venues.showEdit');
		Route::post('/venues/{slug}','Admin\VenueController@update')->name('admin.venues.update');
		Route::get('/venues/status/{slug}','Admin\VenueController@venueStatus')->name('admin.venues.status');


		#----------------------------------------------------------------
		#  Style Management
		#----------------------------------------------------------------
		Route::get('/styles','Admin\StyleController@index')->name('admin.styles.list');
		Route::get('/styles/create','Admin\StyleController@showCreate')->name('admin.styles.showCreate');
		Route::post('/styles/create','Admin\StyleController@create')->name('admin.styles.create');
		Route::get('/styles/ajax_getStyles','Admin\StyleController@ajax_getStyles')->name('admin.styles.ajax_getStyles');
		Route::get('/styles/{slug}','Admin\StyleController@showEdit')->name('admin.styles.showEdit');
		Route::post('/styles/{slug}','Admin\StyleController@update')->name('admin.styles.update');
		Route::get('/styles/status/{slug}','Admin\StyleController@styleStatus')->name('admin.styles.status');

        


        #------------------------------------------------------------------------------------
        #  General Settings
        #------------------------------------------------------------------------------------


        Route::get('/settings/general', 'Admin\GeneralSettingController@index')->name('list_general_settings');
        Route::post('/settings/general', 'Admin\GeneralSettingController@typeStore')->name('list_general_settings');
        Route::get('/settings/general/edit/{id}', 'Admin\GeneralSettingController@add')->name('add_general_settings');
        Route::post('/settings/general/edit/{id}', 'Admin\GeneralSettingController@store')->name('add_general_settings');
        Route::get('/settings/general/ajax', 'Admin\GeneralSettingController@ajaxData')->name('list_general_ajax_settings');

        // payment Setting
        Route::get('/settings/payment', 'Admin\GeneralSettingController@payments')->name('list_payment_settings');
        Route::post('/settings/payment', 'Admin\GeneralSettingController@updatePayments')->name('list_payment_settings');

        // global Setting
        Route::get('/settings/global', 'Admin\GeneralSettingController@global')->name('global_settings');
        Route::post('/settings/global', 'Admin\GeneralSettingController@updateGlobal')->name('global_settings');

        Route::get('/ajax/settings/general/upload', 'Admin\GeneralSettingController@MetaImage')->name('meta_images');


        #------------------------------------------------------------------------------------
        #  Cms Page
        #------------------------------------------------------------------------------------
        Route::get('/pages', 'Admin\CmsPageController@index')->name('admin.cms-pages.list');
        Route::get('/pages/ajaxData', 'Admin\CmsPageController@ajaxData')->name('admin.cms-pages.ajaxData');
        Route::get('/pages/create', 'Admin\CmsPageController@showCreate')->name('admin.cms-pages.showCreate');
        Route::post('/pages/create', 'Admin\CmsPageController@create')->name('admin.cms-pages.create');
        Route::get('/pages/{slug}', 'Admin\CmsPageController@edit')->name('admin.cms-pages.edit');
        Route::post('/pages/{slug}', 'Admin\CmsPageController@update')->name('admin.cms-pages.update');
        Route::get('/pages/status/{slug}', 'Admin\CmsPageController@changeStatus')->name('admin.cms-pages.status');


        #------------------------------------------------------------------------------------
        #  Faq
        #------------------------------------------------------------------------------------
        Route::get('/{type}/faqs', 'Admin\FaqController@index')->name('admin.faqs.lists');
        // Route::get('/faqs/ajaxData/{type}', 'Admin\FaqController@ajaxData')->name('admin.faqs.ajaxData');
        Route::get('/{type}/faqs/create', 'Admin\FaqController@showCreate')->name('admin.faqs.showCreate');
        Route::post('/{type}/faqs/create', 'Admin\FaqController@create')->name('admin.faqs.create');
        Route::get('/{type}/faqs/{id}', 'Admin\FaqController@edit')->name('admin.faqs.edit');
        Route::post('/{type}/faqs/{id}', 'Admin\FaqController@update')->name('admin.faqs.update');
        Route::get('/{type}/faqs/delete/{id}', 'Admin\FaqController@delete')->name('admin.faqs.delete');
        Route::get('/{type}/faqs/status/{id}', 'Admin\FaqController@changeStatus')->name('admin.faqs.status');

        
        Route::get('/my-business/{slug}/{vendorSlug}', 'Vendor\MyBusinessController@index')->name('vendorBusinessView');


        // Email Management
        Route::get('/commission/settings', 'Admin\CommissionController@fee')->name('admin.commission');
        Route::get('/commission/settings/{id}', 'Admin\CommissionController@delete')->name('admin.commissionDelete');
        Route::post('/commission/settings', 'Admin\CommissionController@store')->name('admin.commission');

        #-------------------------------------------------------------------------------------------------------------
        #  Email Templates
        #-------------------------------------------------------------------------------------------------------------


        Route::get('/email-management', 'Admin\EmailManagementController@index')->name('admin.emails.index');
        Route::post('/email-management', 'Admin\EmailManagementController@create')->name('admin.emails.index');
        Route::get('/email-management/{id}', 'Admin\EmailManagementController@edit')->name('admin.emails.update');
        Route::post('/email-management/{id}', 'Admin\EmailManagementController@update')->name('admin.emails.update');

        #-------------------------------------------------------------------------------------------------------------
        #  admin.orders
        #-------------------------------------------------------------------------------------------------------------

        Route::get('/orders','Admin\OrderController@index')->name('admin.orders');
        Route::get('/orders/detail/{id}','Admin\OrderController@detail')->name('admin.orderDetail');
        Route::get('/orders/ajax','Admin\OrderController@ajax')->name('admin.ajaxOrders');

       #--------------------------------------------------------------------------------------------------------------
       #  Vendors
       #--------------------------------------------------------------------------------------------------------------
        
	     Route::get('/inviting/vendors','Admin\VendersController@invite')->name('admin.vendor.invite');
	     Route::get('/inviting/vendor/{id}','Admin\VendersController@inviteDetail')->name('admin.vendor.inviting');
	     Route::get('/inviting/vendor/request/{id}','Admin\VendersController@vendorInvite')->name('admin.vendorInvite');



       #--------------------------------------------------------------------------------------------------------------
       #  users
       #--------------------------------------------------------------------------------------------------------------
       
		Route::get('/inviting/users','Admin\VendersController@invite2')->name('admin.user.invite');
		Route::get('/inviting/user/{id}','Admin\VendersController@inviteDetail2')->name('admin.user.inviting');
		Route::get('/inviting/user/request/{id}','Admin\VendersController@vendorInvite2')->name('admin.userInvite');



		Route::get('/vendors/new','Admin\VendersController@index')->name('admin.vendor.list');
		Route::get('/vendors/ajax-new-vendors','Admin\VendersController@ajax_getVendors')->name('ajax-new-vendors');
		Route::get('/vendors/ajax-inviting-vendors','Admin\VendersController@ajax_getInvitingVendors')->name('ajax_getInvitingVendors');


       #--------------------------------------------------------------------------------------------------------------
       #  users
       #--------------------------------------------------------------------------------------------------------------
       

		Route::get('/vendors/new/{id}','Admin\VendersController@detail')->name('admin.vendor.detail');
        Route::get('/vendors/approved/{id}','Admin\VendersController@approved')->name('admin.vendor.approved');
		Route::post('/vendors/rejected/{id}','Admin\VendersController@rejected')->name('admin.vendor.rejected');


       #--------------------------------------------------------------------------------------------------------------
       #  users
       #--------------------------------------------------------------------------------------------------------------
       


		Route::get('/vendor/disputes','Admin\DisputeController@index')->name('admin.vendor.dispute');
		Route::get('/vendor/disputes/ajax','Admin\DisputeController@ajax')->name('admin.vendor.dispute.ajax');

		Route::get('/vendor/disputes/{id}','Admin\DisputeController@detail')->name('admin.vendor.dispute.detail');
		Route::get('/vendor/disputes/{id}/block','Admin\DisputeController@block')->name('admin.vendor.dispute.block');

       #--------------------------------------------------------------------------------------------------------------
       #  users
       #--------------------------------------------------------------------------------------------------------------
       
});
