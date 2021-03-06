<?php

Route::get('/admin/login', 'Admin\AdminController@index')->name('admin_login');
Route::post('/admin/login', 'Admin\AdminController@check')->name('post_admin_login');

Route::group(['middleware' => ['AdminAuth'], 'prefix' => 'admin'], function() {
       //require __DIR__.'/ajax.php';
       require __DIR__.'/product.php';



		Route::get('/','Admin\AdminController@dashboard')->name('admin_dashboard');
		Route::get('/profile/settings','Admin\AdminController@profile')->name('admin_settings');
		Route::post('/profile/settings/image','Admin\AdminController@changeProfileImage')->name('post_admin_settings');
		Route::post('/profile/settings/password','Admin\AdminController@change')->name('post_admin_password_settings');

		Route::get('/logout', 'Admin\AdminController@logout')->name('admin_logout');

		#----------------------------------------------------------------
		#  Activities Management
		#----------------------------------------------------------------
		Route::any('/activities/child','Admin\AdminController@child_activities')->name('child_activities');
		Route::any('/activities/child/save','Admin\AdminController@save_child_activities')->name('save_child_activities');

		#----------------------------------------------------------------
		#  Image Icon Management
		#----------------------------------------------------------------
		Route::any('/image-icon','Admin\ImageIconController@image_icons')->name('image_icons');
		Route::any('/image-icon/save','Admin\ImageIconController@save_image_icons')->name('save_image_icons');
		Route::any('/image-icon/remove/{id}','Admin\ImageIconController@remove_image_icons')->name('remove_image_icons');

		#----------------------------------------------------------------
		#  Image Crud Management
		#----------------------------------------------------------------
		Route::any('/images','Admin\ImageCrudController@image_icons')->name('images');
		Route::any('/images/save','Admin\ImageCrudController@save_image_icons')->name('save_images');
		Route::any('/images/remove/{id}','Admin\ImageCrudController@remove_image_icons')->name('remove_images');

		#----------------------------------------------------------------
		#  Coach - Invoice PDF's Management
		#----------------------------------------------------------------
		Route::any('/uploaded-invoice','Admin\AdminController@uploaded_invoice')->name('uploaded_invoice');
		Route::any('/new-uploaded-invoice','Admin\AdminController@new_uploaded_invoice')->name('new_uploaded_invoice');
		Route::any('/uploaded-invoice/accept','Admin\AdminController@accept_uploaded_invoice')->name('accept_uploaded_invoice');
		Route::any('/uploaded-invoice/reject','Admin\AdminController@reject_uploaded_invoice')->name('reject_uploaded_invoice');
		Route::any('/update_inv_status','Admin\AdminController@update_inv_status')->name('update_inv_status');
		Route::any('coach_search','Admin\AdminController@coach_search')->name('coach_search');
		Route::any('reject_invoice','Admin\AdminController@reject_invoice')->name('reject_invoice');
		

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

        // Mark Notifications as read 
        Route::any('/mark_as_read/{id}','Admin\AdminController@mark_as_read')->name('mark_as_read');

        // Send email to all subscribers
        Route::any('/send_subscriber_email','Admin\AdminController@send_subscriber_email')->name('send_subscriber_email');

        // Freeze coach account
        Route::any('/freeze/coach-account/{id}','Admin\AdminController@freeze_coach_account')->name('freeze_coach_account');
        Route::any('/freeze/account-details','Admin\AdminController@save_freeze_acc_details')->name('save_freeze_acc_details');

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
		#  Season Management
		#----------------------------------------------------------------
		Route::any('/seasons','Admin\SeasonController@seasons_index')->name('admin.seasons.list');
		Route::any('/seasons/active','Admin\SeasonController@seasons_active')->name('admin.seasons.active');
		Route::any('/seasons/in-active','Admin\SeasonController@seasons_inactive')->name('admin.seasons.inactive');
		Route::get('/seasons/create','Admin\SeasonController@seasons_showCreate')->name('admin.seasons.showCreate');
		Route::post('/seasons/create','Admin\SeasonController@seasons_create')->name('admin.seasons.create');
		Route::get('/seasons/{slug}','Admin\SeasonController@seasons_showEdit')->name('admin.seasons.showEdit');
		Route::post('/seasons/{slug}','Admin\SeasonController@seasons_update')->name('admin.seasons.update');
		Route::any('/seasons/status/{slug}','Admin\SeasonController@seasons_Status')->name('admin.seasons.status');
		Route::any('/seasons/delete/{id}','Admin\SeasonController@delete_seasons')->name('delete_seasons');


		#----------------------------------------------------------------
		#  Menu Management
		#----------------------------------------------------------------
		Route::any('/menu/footer','Admin\MenuController@menu_footer_index')->name('admin.Menu.footer-list');
		Route::any('/menu/header','Admin\MenuController@menu_index')->name('admin.Menu.list');
		Route::any('/menu/active','Admin\MenuController@menu_active')->name('admin.Menu.active');
		Route::any('/menu/in-active','Admin\MenuController@menu_inactive')->name('admin.Menu.inactive');
		Route::get('/menu/create','Admin\MenuController@menu_showCreate')->name('admin.Menu.showCreate');
		Route::post('/menu/create','Admin\MenuController@menu_create')->name('admin.Menu.create');
		Route::get('/menu/{slug}','Admin\MenuController@menu_showEdit')->name('admin.Menu.showEdit');
		Route::post('/menu/{slug}','Admin\MenuController@menu_update')->name('admin.Menu.update');
		Route::any('/menu/status/{slug}','Admin\MenuController@menu_Status')->name('admin.Menu.status');
		Route::any('/menu/delete/{id}','Admin\MenuController@menu_delete')->name('delete_menu');
		Route::any('/update_menu_sort/{sort_no}/{menu_id}','Admin\MenuController@update_menu_sort')->name('update.menu.sort');


		#----------------------------------------------------------------
		#  Vochure Management
		#----------------------------------------------------------------
		Route::any('/vouchure','Admin\VochureController@vochure_index')->name('admin.vochure.list');
		Route::any('/vouchure/active','Admin\VochureController@vochure_active')->name('admin.vochure.active');
		Route::any('/vouchure/in-active','Admin\VochureController@vochure_inactive')->name('admin.vochure.inactive');
		Route::get('/vouchure/create','Admin\VochureController@vochure_showCreate')->name('admin.vochure.showCreate');
		Route::post('/vouchure/create','Admin\VochureController@vochure_create')->name('admin.vochure.create');
		Route::get('/vouchure/{slug}','Admin\VochureController@vochure_showEdit')->name('admin.vochure.showEdit');
		Route::post('/vouchure/{slug}','Admin\VochureController@vochure_update')->name('admin.vochure.update');
		Route::any('/vouchure/status/{slug}','Admin\VochureController@vochure_Status')->name('admin.vochure.status');
		Route::any('/vouchure/delete/{id}','Admin\VochureController@delete_vochure')->name('delete_vochure');

		#----------------------------------------------------------------
		#  User/Vendor Management
		#----------------------------------------------------------------
		Route::any('/users','Admin\UserController@index')->name('list_users');
		Route::any('/add-user','Admin\UserController@add_user')->name('add_user');
		Route::any('/save-user','Admin\UserController@save_user')->name('save_user');
		Route::get('/users/edit/{id}','Admin\UserController@edit_users')->name('edit_users');
		Route::post('/user/update','Admin\UserController@update_users')->name('update_users');
		Route::any('/user/delete/{id}','Admin\UserController@delete_user')->name('delete_user');
		Route::get('/user/status/{id}','Admin\UserController@user_Status')->name('admin.user.status');
		Route::any('enable_inv_status', 'Admin\UserController@enable_inv_status')->name('enable_inv_status');
		Route::any('/linked-coaches', 'Admin\UserController@linked_coaches')->name('linked_coach_player');
		Route::any('/subscribed-users', 'Admin\UserController@subscribed_users')->name('subscribed_users');
		Route::any('/subscribed-users/active', 'Admin\UserController@active_subscribed_users')->name('active_subscribed_users');
		Route::any('/unsubscribed-users/{id}', 'Admin\UserController@unsubscribed_users')->name('unsubscribed_users');
		Route::any('/family-member/overview/{id}','Admin\UserController@family_member_overview')->name('admin_family_member_overview');
   		Route::any('family-member/add','Admin\UserController@admin_add_family_member')->name('admin-add-family-member');

   		// Add Family Mamber
	    Route::any('participants-details','Admin\UserController@participants_details')->name('admin_participants_details');
	    Route::any('contact-information','Admin\UserController@contact_information')->name('admin_contact_information');
	    Route::any('medical-information','Admin\UserController@medical_information')->name('admin_medical_information');
	    Route::any('media-consent','Admin\UserController@media_consent')->name('admin_media_consent');
	    Route::any('family-member/delete/{id}','Admin\UserController@delete_family_member')->name('admin_delete_family_member');

	    // Add Family Mamber
	    Route::any('/account-holder/overview/{id}','Admin\UserController@ah_account_holder')->name('ah_account_holder');
	    Route::any('participant/details','Admin\UserController@ah_participants_details')->name('ah_admin_participants_details');
	    Route::any('contact/information','Admin\UserController@ah_contact_information')->name('ah_admin_contact_information');
	    Route::any('medical/information','Admin\UserController@ah_medical_information')->name('ah_admin_medical_information');
	    Route::any('media/consent','Admin\UserController@ah_media_consent')->name('ah_admin_media_consent');
	    // Route::any('family-member/delete/{id}','Admin\UserController@ah_delete_family_member')->name('ah_admin_delete_family_member');

	    Route::any('remove-contact/{id}','HomeController@remove_contact')->name('contact_remove_contact');
    	Route::any('remove-medical/{id}','HomeController@remove_medical')->name('contact_remove_medical');
    	Route::any('remove-allergy/{id}','HomeController@remove_allergy')->name('contact_remove_allergy');

		#----------------------------------------------------------------
		#  Change Course of Player
		#----------------------------------------------------------------
		Route::any('/purchased-course','Admin\UserController@change_course_list')->name('purchased_course_data');
		Route::any('/shop/{id}/change-course','Admin\UserController@change_course')->name('change_course');
		Route::any('/shop/course/{id}/delete/player','Admin\UserController@delete_course')->name('delete_course');
		Route::any('/change-course/save','Admin\UserController@save_change_course')->name('save_change_course');
		Route::any('/purchased-course/add','Admin\UserController@add_course_for_player')->name('add_course_for_player');
		Route::any('/purchased-course/save','Admin\UserController@save_course_for_player')->name('save_course_for_player');
		Route::any('/parent-player-linking','Admin\UserController@parent_player_linking')->name('parent_player_linking');

		Route::any('/pay-go-course-slot','Admin\UserController@paygo_course_slot')->name('paygo_course_slot');

		#----------------------------------------------------------------
		#  Change Camp of Player
		#----------------------------------------------------------------
		Route::any('/purchased-camp','Admin\UserController@change_camp_list')->name('purchased_camp_data');
		Route::any('/shop/{id}/change-camp','Admin\UserController@change_camp')->name('change_camp');
		Route::any('/shop/{id}/delete/player','Admin\UserController@delete_camp')->name('delete_camp');
		Route::any('/change-camp/save','Admin\UserController@save_change_camp')->name('save_change_camp');
		// Route::any('/purchased-camp/add','Admin\UserController@add_camp_for_player')->name('add_camp_for_player');
		// Route::any('/purchased-camp/save','Admin\UserController@save_camp_for_player')->name('save_camp_for_player');
		// Route::any('/parent-player-linking','Admin\UserController@parent_player_linking')->name('parent_player_linking');

		#----------------------------------------------------------------
		#  Parents/Children/Coach Management
		#----------------------------------------------------------------
		Route::get('/users/parent','Admin\UserController@parent_list')->name('parent_users');
		Route::get('/users/children','Admin\UserController@children_list')->name('children_users');
		Route::get('/users/coach','Admin\UserController@coach_list')->name('coach_users');
		
		// Change password route for users
		Route::get('/users/parent/change-password/{id}','Admin\UserController@ChangePassword')->name('ChangePassword');
		Route::post('/users/parent/update-password','Admin\UserController@UpdateParentPassword')->name('UpdateParentPassword');

		#----------------------------------------------------------------
		#  Testimonial Management
		#----------------------------------------------------------------
		Route::get('/testimonial','Admin\TestimonialController@testimonial_index')->name('admin.testimonial.list');
		Route::get('/testimonial/create','Admin\TestimonialController@testimonial_showCreate')->name('admin.testimonial.showCreate');
		Route::post('/testimonial/create','Admin\TestimonialController@testimonial_create')->name('admin.testimonial.create');
		Route::get('/testimonial/{slug}','Admin\TestimonialController@testimonial_showEdit')->name('admin.testimonial.showEdit');
		Route::post('/testimonial/{slug}','Admin\TestimonialController@testimonial_update')->name('admin.testimonial.update');
		Route::get('/testimonial/status/{slug}','Admin\TestimonialController@testimonial_Status')->name('admin.testimonial.status');
		Route::any('/testimonial/delete/{id}','Admin\TestimonialController@delete_testimonial')->name('delete_testimonial');


		#----------------------------------------------------------------
		#  Stripe Account Management
		#----------------------------------------------------------------
		Route::get('/stripe_account','Admin\StipeAccController@stripe_account_index')->name('admin.stripe_account.list');
		Route::get('/stripe_account/create','Admin\StipeAccController@stripe_account_showCreate')->name('admin.stripe_account.showCreate');
		Route::post('/stripe_account/create','Admin\StipeAccController@stripe_account_create')->name('admin.testimonial.create');
		Route::get('/stripe_account/{slug}','Admin\StipeAccController@stripe_account_showEdit')->name('admin.stripe_account.showEdit');
		Route::post('/stripe_account/{slug}','Admin\StipeAccController@stripe_account_update')->name('admin.testimonial.update');
		Route::get('/stripe_account/status/{slug}','Admin\StipeAccController@stripe_account_Status')->name('admin.stripe_account.status');
		Route::any('/stripe_account/delete/{id}','Admin\StipeAccController@delete_stripe_account')->name('delete_testimonial');


		#----------------------------------------------------------------
		#  Package Course Management
		#----------------------------------------------------------------
		Route::any('/package-course','Admin\PackageCourseController@package_course_index')->name('admin.packageCourse.list');
		Route::get('/package-course/create','Admin\PackageCourseController@package_course_showCreate')->name('admin.packageCourse.showCreate');
		Route::post('/package-course/create','Admin\PackageCourseController@package_course_create')->name('admin.packageCourse.create');
		Route::any('/get-courses','Admin\PackageCourseController@get_courses')->name('get_courses');
		Route::any('/package-course/delete/{booking_no}','Admin\PackageCourseController@delete_created_courses')->name('delete_created_courses');
		Route::any('/package-course/detail/{booking_no}','Admin\PackageCourseController@package_course_detail')->name('admin.packageCourse.detail');
		Route::any('/package-course/resend/{booking_no}','Admin\PackageCourseController@resend_course_link')->name('resend_course_link');


		#----------------------------------------------------------------
		#  DRH Activity Management
		#----------------------------------------------------------------
		Route::get('/drh-activity','Admin\DrhActivityController@drhactivity_index')->name('admin.drhactivity.list');
		Route::get('/drh-activity/create','Admin\DrhActivityController@drhactivity_showCreate')->name('admin.drhactivity.showCreate');
		Route::post('/drh-activity/create','Admin\DrhActivityController@drhactivity_create')->name('admin.drhactivity.create');
		Route::get('/drh-activity/{slug}','Admin\DrhActivityController@drhactivity_showEdit')->name('admin.drhactivity.showEdit');
		Route::post('/drh-activity/{slug}','Admin\DrhActivityController@drhactivity_update')->name('admin.drhactivity.update');
		Route::get('/drh-activity/status/{id}','Admin\DrhActivityController@drhactivity_Status')->name('admin.drhactivity.status');
		Route::any('/drhactivity/delete/{id}','Admin\DrhActivityController@delete_drhactivity')->name('delete_drhactivity');
		Route::any('/update_drhactivity_sort/{sort_no}/{activity_id}','Admin\DrhActivityController@update_drhactivity_sort')->name('update.activity.sort');


		#----------------------------------------------------------------
		#  Home Slider Management
		#----------------------------------------------------------------
		Route::get('/home-slider','Admin\HomeSliderController@HomeSlider_index')->name('admin.HomeSlider.list');
		Route::get('/home-slider/create','Admin\HomeSliderController@HomeSlider_showCreate')->name('admin.HomeSlider.showCreate');
		Route::post('/home-slider/create','Admin\HomeSliderController@HomeSlider_create')->name('admin.HomeSlider.create');
		Route::get('/home-slider/{slug}','Admin\HomeSliderController@HomeSlider_showEdit')->name('admin.HomeSlider.showEdit');
		Route::post('/home-slider/{slug}','Admin\HomeSliderController@HomeSlider_update')->name('admin.HomeSlider.update');
		Route::get('/home-slider/status/{id}','Admin\HomeSliderController@HomeSlider_Status')->name('admin.HomeSlider.status');
		Route::any('/home-slider/delete/{id}','Admin\HomeSliderController@delete_HomeSlider')->name('delete_HomeSlider');
		Route::any('/update_homeslider_sort/{sort_no}/{homeslider_id}','Admin\HomeSliderController@update_homeslider_sort')->name('homeslider.update.sort');


		#----------------------------------------------------------------
		#  Badge Management
		#----------------------------------------------------------------
		Route::get('/badge','Admin\BadgeController@badge_index')->name('admin.badge.list');
		Route::get('/badge/active','Admin\BadgeController@badge_active')->name('admin.badge.active');
		Route::get('/badge/in-active','Admin\BadgeController@badge_inactive')->name('admin.badge.inactive');
		Route::get('/badge/create','Admin\BadgeController@badge_showCreate')->name('admin.badge.showCreate');
		Route::post('/badge/create','Admin\BadgeController@badge_create')->name('admin.badge.create');
		Route::get('/badge/{slug}','Admin\BadgeController@badge_showEdit')->name('admin.badge.showEdit');
		Route::post('/badge/{slug}','Admin\BadgeController@badge_update')->name('admin.badge.update');
		Route::get('/badge/status/{slug}','Admin\BadgeController@badge_Status')->name('admin.badge.status');
		Route::any('/badge/delete/{id}','Admin\BadgeController@delete_badge')->name('delete_badge');
		Route::any('/badge/players/list','Admin\BadgeController@players_listing')->name('players_list');
		Route::any('/badge/assign_badge/season/{season}/course/{course_id}/player/{child_id}','Admin\BadgeController@assign_badge')->name('assign_badge');
		Route::any('/badge/players/save','Admin\BadgeController@save_assign_badge')->name('save_assign_badge');
		Route::any('/update_badge_sort/{sort_no}/{badge_id}','Admin\BadgeController@update_badge_sort')->name('badge.sort');
		Route::any('/selectedSeason','Admin\BadgeController@selectedSeason')->name('admin.selectedSeason');


		#----------------------------------------------------------------
		#  Custom Box Management
		#----------------------------------------------------------------
		Route::get('/custombox','Admin\CustomBoxController@custombox_index')->name('admin.custombox.list');
		Route::get('/custombox/create','Admin\CustomBoxController@custombox_showCreate')->name('admin.custombox.showCreate');
		Route::post('/custombox/create','Admin\CustomBoxController@custombox_create')->name('admin.custombox.create');
		Route::get('/custombox/{slug}','Admin\CustomBoxController@custombox_showEdit')->name('admin.custombox.showEdit');
		Route::post('/custombox/{slug}','Admin\CustomBoxController@custombox_update')->name('admin.custombox.update');
		Route::get('/custombox/status/{slug}','Admin\CustomBoxController@custombox_Status')->name('admin.custombox.status');
		Route::any('/custombox/delete/{id}','Admin\CustomBoxController@delete_custombox')->name('delete_custombox');
		Route::any('/update_custombox_sort/{sort_no}/{custombox_id}','Admin\CustomBoxController@update_custombox_sort')->name('update_custombox_sort');

		#----------------------------------------------------------------
		#  ChildCare Vouchures Management
		#----------------------------------------------------------------
		Route::get('/childcare-vouchure','Admin\ChildcareVoucherController@childcare_voucher_index')->name('admin.ChildcareVoucher.list');
		Route::get('/childcare-vouchure/create','Admin\ChildcareVoucherController@childcare_voucher_showCreate')->name('admin.ChildcareVoucher.showCreate');
		Route::post('/childcare-vouchure/create','Admin\ChildcareVoucherController@childcare_voucher_create')->name('admin.ChildcareVoucher.create');
		Route::get('/childcare-vouchure/{slug}','Admin\ChildcareVoucherController@childcare_voucher_showEdit')->name('admin.ChildcareVoucher.showEdit');
		Route::post('/childcare-vouchure/{slug}','Admin\ChildcareVoucherController@childcare_voucher_update')->name('admin.ChildcareVoucher.update');
		Route::get('/childcare-vouchure/status/{slug}','Admin\ChildcareVoucherController@childcare_voucher_Status')->name('admin.ChildcareVoucher.status');
		Route::any('/linked-course-camp','Admin\ChildcareVoucherController@linkedCourseCamp')->name('admin.ChildcareVoucher.link-course-camp');
		Route::any('/linked-course-camp/save','Admin\ChildcareVoucherController@save_linkedCourseCamp')->name('admin.ChildcareVoucher.save-link-course-camp');

		#----------------------------------------------------------------
		#  Session Management
		#----------------------------------------------------------------
		Route::get('/session','Admin\SessionController@session_index')->name('admin.Session.list');
		Route::get('/session/create','Admin\SessionController@session_showCreate')->name('admin.Session.showCreate');
		Route::post('/session/create','Admin\SessionController@session_create')->name('admin.Session.create');
		Route::get('/session/{id}','Admin\SessionController@session_showEdit')->name('admin.Session.showEdit');
		Route::post('/session/{id}','Admin\SessionController@session_update')->name('admin.Session.update');
		Route::get('/session/status/{id}','Admin\SessionController@session_Status')->name('admin.Session.status');
		
		#----------------------------------------------------------------
		#  Coupon Management
		#----------------------------------------------------------------
		Route::get('/coupon','Admin\CouponController@coupon_index')->name('admin.coupon.list');
		Route::get('/coupon/create','Admin\CouponController@coupon_showCreate')->name('admin.coupon.showCreate');
		Route::post('/coupon/create','Admin\CouponController@coupon_create')->name('admin.coupon.create');
		Route::get('/coupon/{id}','Admin\CouponController@coupon_showEdit')->name('admin.coupon.showEdit');
		Route::post('/coupon/{id}','Admin\CouponController@coupon_update')->name('admin.coupon.update');
		Route::get('/coupon/status/{id}','Admin\CouponController@coupon_Status')->name('admin.coupon.status');
		Route::any('/coupon/duplicate/{id}','Admin\CouponController@duplicate_coupon')->name('duplicate_coupon');
		Route::any('/coupon/delete/{id}','Admin\CouponController@delete_coupon')->name('delete_coupon');
		Route::any('/coupon/export/csv','Admin\CouponController@export_coupon_csv')->name('export_coupon_csv');
		Route::any('/coupon/import/csv','Admin\CouponController@coupon_import_csv')->name('coupon_csv');
		Route::any('/coupon/csv/save','Admin\CouponController@save_coupon_csv')->name('save_coupon_csv');

		#----------------------------------------------------------------
		#  Camp Category Management
		#----------------------------------------------------------------
		Route::get('/camp-category','Admin\CampCategoryController@camp_category_index')->name('admin.campcategory.list');
		Route::get('/camp-category/create','Admin\CampCategoryController@camp_category_showCreate')->name('admin.campcategory.showCreate');
		Route::post('/camp-category/create','Admin\CampCategoryController@camp_category_create')->name('admin.campcategory.create');
		Route::get('/camp-category/{slug}','Admin\CampCategoryController@camp_category_showEdit')->name('admin.campcategory.showEdit');
		Route::post('/camp-category/{slug}','Admin\CampCategoryController@camp_category_update')->name('admin.campcategory.update');
		Route::get('/camp-category/status/{slug}','Admin\CampCategoryController@camp_category_Status')->name('admin.campcategory.status');
		Route::get('/camp-category/delete/{id}','Admin\CampCategoryController@delete_camp_category')->name('admin.campcategory.delete');


		#----------------------------------------------------------------
		#  Course Category Management
		#----------------------------------------------------------------
		Route::get('/course-category','Admin\CourseCategoryController@course_category_index')->name('admin.LinkCourseAndCategory.list');
		Route::get('/course-category/create','Admin\CourseCategoryController@course_category_showCreate')->name('admin.LinkCourseAndCategory.showCreate');
		Route::post('/course-category/create','Admin\CourseCategoryController@course_category_create')->name('admin.LinkCourseAndCategory.create');
		Route::get('/course-category/{slug}','Admin\CourseCategoryController@course_category_showEdit')->name('admin.LinkCourseAndCategory.showEdit');
		Route::post('/course-category/{slug}','Admin\CourseCategoryController@course_category_update')->name('admin.LinkCourseAndCategory.update');
		Route::get('/course-category/status/{slug}','Admin\CourseCategoryController@course_category_Status')->name('admin.LinkCourseAndCategory.status');
		Route::get('/course-category/delete/{id}','Admin\CourseCategoryController@delete_course_category')->name('admin.LinkCourseAndCategory.delete');


		#----------------------------------------------------------------
		#  Camp Management
		#----------------------------------------------------------------
		Route::get('/camp','Admin\CampController@camp_index')->name('admin.camp.list');
		Route::get('/camp/create','Admin\CampController@camp_showCreate')->name('admin.camp.showCreate');
		Route::post('/camp/create','Admin\CampController@camp_create')->name('admin.camp.create');
		Route::get('/camp/{slug}','Admin\CampController@camp_showEdit')->name('admin.camp.showEdit');
		Route::post('/camp/{slug}','Admin\CampController@camp_update')->name('admin.camp.update');
		Route::get('/camp/status/{slug}','Admin\CampController@camp_Status')->name('admin.camp.status');
		Route::any('/camp/register/{id}','Admin\CampController@camp_view_reg')->name('camp_view_reg');

		Route::any('/book-a-camp/{slug}','Admin\CampController@admin_book_a_camp')->name('admin-book-a-camp');
		Route::any('submit-book-a-camp','Admin\CampController@submit_book_a_camp')->name('admin-submit-book-a-camp');

		// Camp duplicate route
		Route::get('/camp-duplicate/{id}','Admin\CampController@camp_duplicate')->name('admin.camp.duplicate');

		#----------------------------------------------------------------
		#  Test Category Management
		#----------------------------------------------------------------
		Route::get('/testcategory','Admin\TestCategoryController@testcategory_index')->name('admin.testcategory.list');
		Route::get('/testcategory/create','Admin\TestCategoryController@testcategory_showCreate')->name('admin.testcategory.showCreate');
		Route::post('/testcategory/create','Admin\TestCategoryController@testcategory_create')->name('admin.testcategory.create');
		Route::get('/testcategory/{slug}','Admin\TestCategoryController@testcategory_showEdit')->name('admin.testcategory.showEdit');
		Route::post('/testcategory/{slug}','Admin\TestCategoryController@testcategory_update')->name('admin.testcategory.update');
		Route::any('/testcategory/delete/{id}','Admin\TestCategoryController@delete_testcategory')->name('admin.testcategory.delete');
		Route::get('/testcategory/status/{id}','Admin\TestCategoryController@testcategory_Status')->name('admin.testcategory.status');

		#----------------------------------------------------------------
		#  Test Management
		#----------------------------------------------------------------
		Route::any('/test','Admin\TestController@test_index')->name('admin.test.list');
		Route::any('/test/active','Admin\TestController@test_active')->name('admin.test.active');
		Route::any('/test/inactive','Admin\TestController@test_inactive')->name('admin.test.inactive');
		Route::get('/test/create','Admin\TestController@test_showCreate')->name('admin.test.showCreate');
		Route::post('/test/create','Admin\TestController@test_create')->name('admin.test.create');
		Route::get('/test/{slug}','Admin\TestController@test_showEdit')->name('admin.test.showEdit');
		Route::post('/test/{slug}','Admin\TestController@test_update')->name('admin.test.update');
		Route::get('/test/status/{slug}','Admin\TestController@test_Status')->name('admin.test.status');
		Route::get('/test/delete/{id}','Admin\TestController@delete_test')->name('admin.test.delete');
		Route::any('/test/duplicate/{id}','Admin\TestController@duplicate_test')->name('duplicate_test');

		#----------------------------------------------------------------
		#  Test Management
		#----------------------------------------------------------------
		Route::any('/goals','Admin\AdminController@goals')->name('admin.goal.list');
		Route::any('/goal/{goal_type}/{id}','Admin\AdminController@goal_detail')->name('admin.goal.detail');
		Route::any('/goal/delete/{goal_type}/{id}','Admin\AdminController@delete_goal')->name('admin.goal.delete');

		#----------------------------------------------------------------
		#  Report Question Management
		#----------------------------------------------------------------
		Route::get('/reportquestion','Admin\ReportQuestionController@reportquestion_index')->name('admin.reportquestion.list');
		Route::get('/reportquestion/create','Admin\ReportQuestionController@reportquestion_showCreate')->name('admin.reportquestion.showCreate');
		Route::post('/reportquestion/create','Admin\ReportQuestionController@reportquestion_create')->name('admin.reportquestion.create');
		Route::get('/reportquestion/{slug}','Admin\ReportQuestionController@reportquestion_showEdit')->name('admin.reportquestion.showEdit');
		Route::post('/reportquestion/{slug}','Admin\ReportQuestionController@reportquestion_update')->name('admin.reportquestion.update');
		Route::get('/reportquestion/status/{id}','Admin\ReportQuestionController@reportquestion_Status')->name('admin.reportquestion.status');
		Route::any('/reportquestion/delete/{id}','Admin\ReportQuestionController@delete_reportquestion')->name('delete_reportquestion');

		// Report Question sortinng route
		Route::any('/reportquestion/{sort_no}/{course_id}','Admin\ReportQuestionController@ReportQuestionSort')->name('reportquestion_sort');

		Route::get('/report-question-option','Admin\ReportQuestionController@reportquestionopt_index')->name('admin.reportquestionopt.list');
		Route::get('/report-question-option/create','Admin\ReportQuestionController@reportquestionopt_showCreate')->name('admin.reportquestionopt.showCreate');
		Route::post('/report-question-option/create','Admin\ReportQuestionController@reportquestionopt_create')->name('admin.reportquestionopt.create');
		Route::get('/report-question-option/{id}','Admin\ReportQuestionController@reportquestionopt_showEdit')->name('admin.reportquestionopt.showEdit');
		Route::post('/report-question-option/{id}','Admin\ReportQuestionController@reportquestionopt_update')->name('admin.reportquestionopt.update');
		Route::get('/report-question-option/status/{id}','Admin\ReportQuestionController@reportquestionopt_Status')->name('admin.reportquestionopt.status');
		Route::get('/report-question-option/delete/{id}','Admin\ReportQuestionController@delete_reportquestionopt')->name('delete_reportquestionopt');

		Route::any('/player-reports','Admin\ReportQuestionController@player_reports')->name('admin.player_reports.listing');
		Route::get('/player-report/{id}','Admin\ReportQuestionController@player_reports_detail')->name('admin.player_reports.detail');
		Route::get('/player-report/delete/{id}','Admin\ReportQuestionController@player_reports_delete')->name('admin.player_reports.delete');

		Route::any('/match-reports/competitions','Admin\ReportQuestionController@comp_list')->name('admin.matchReports.compList');
		Route::any('/match-reports/competition/{id}','Admin\ReportQuestionController@comp_detail')->name('admin.matchReports.compDetail');
		Route::any('/competition/{comp_id}/match/{match_id}/stats','Admin\ReportQuestionController@match_stats')->name('admin.matchReports.matchStats');

		#----------------------------------------------------------------
		#  Import/Export Excel for Test
		#----------------------------------------------------------------
		Route::get('/excel_export','Admin\TestController@excel_export')->name('excel_export');
		Route::get('/excel_export/excel/season/{season}/course/{course}','Admin\TestController@excel')->name('excel');
		Route::any('/excel_export/import','Admin\TestController@excel_import')->name('import_excel');
		Route::any('/test_score_excel/course/{course_id}/player/{player_id}','Admin\TestController@test_score_excel')->name('test_score_excel');
		Route::any('/view_test_score/excel/season/{season}/course/{course}','Admin\TestController@view_test_score')->name('view_test_score');

		#----------------------------------------------------------------
		#  Accordian Management
		#----------------------------------------------------------------
		Route::get('/accordian','Admin\AccordianController@accordian_index')->name('admin.accordian.list');
		Route::get('/accordian/create','Admin\AccordianController@accordian_showCreate')->name('admin.accordian.showCreate');
		Route::post('/accordian/create','Admin\AccordianController@accordian_create')->name('admin.accordian.create');
		Route::get('/accordian/{slug}','Admin\AccordianController@accordian_showEdit')->name('admin.accordian.showEdit');
		Route::post('/accordian/{slug}','Admin\AccordianController@accordian_update')->name('admin.accordian.update');
		Route::get('/accordian/status/{slug}','Admin\AccordianController@accordian_Status')->name('admin.accordian.status');
		Route::any('/accordian/delete/{id}','Admin\AccordianController@delete_accordian')->name('delete_accordian');
		Route::any('/accordian/duplicate/{id}','Admin\AccordianController@duplicate_accordian')->name('duplicate_accordian');
		Route::any('/update_acc_sort/{sort_no}/{accordian_id}','Admin\AccordianController@update_accordian_sort')->name('acc.update.sort');
		Route::any('/remove_pdf_data/{acc_id}','Admin\AccordianController@remove_pdf_data')->name('acc.remove.pdf');
		
		#----------------------------------------------------------------
		#  Course Management
		#----------------------------------------------------------------
		Route::any('/course','Admin\CourseController@course_index')->name('admin.course.list');
		Route::get('/course/active','Admin\CourseController@course_active')->name('admin.course.active');
		Route::get('/course/in-active','Admin\CourseController@course_inactive')->name('admin.course.in-active');
		Route::get('/course/create','Admin\CourseController@course_showCreate')->name('admin.course.showCreate');
		Route::post('/course/create','Admin\CourseController@course_create')->name('admin.course.create');
		Route::get('/course/{slug}','Admin\CourseController@course_showEdit')->name('admin.course.showEdit');
		Route::post('/course/{slug}','Admin\CourseController@course_update')->name('admin.course.update');
		Route::get('/course/status/{slug}','Admin\CourseController@course_Status')->name('admin.course.status');
		Route::any('/update_course_price/{price}/{course_id}','Admin\CourseController@update_course_price')->name('update.price');
		Route::any('/update_course_membership_price/{price}/{course_id}','Admin\CourseController@update_course_membership_price')->name('update.price');
		Route::any('/update_course_sort/{sort_no}/{course_id}','Admin\CourseController@update_course_sort')->name('update.sort');
		Route::any('/course/delete/{id}','Admin\CourseController@delete_course')->name('delete_course');
		Route::any('/course/duplicate/{id}','Admin\CourseController@duplicate_course')->name('duplicate_course');
		Route::any('selectedCat','Admin\CourseController@selectedCat')->name('selectedCat');

		#----------------------------------------------------------------
		#  Pay Go Course Management
		#----------------------------------------------------------------
		Route::any('/pay-go-course','Admin\PayGoCourseController@pay_go_course_index')->name('admin.pay.go.course.list');
		Route::get('/pay-go-course/active','Admin\PayGoCourseController@pay_go_course_active')->name('admin.pay.go.course.active');
		Route::get('/pay-go-course/in-active','Admin\PayGoCourseController@pay_go_course_inactive')->name('admin.pay.go.course.in-active');
		Route::get('/pay-go-course/create','Admin\PayGoCourseController@pay_go_course_showCreate')->name('admin.pay.go.course.showCreate');
		Route::post('/pay-go-course/create','Admin\PayGoCourseController@pay_go_course_create')->name('admin.pay.go.course.create');
		Route::get('/pay-go-course/{slug}','Admin\PayGoCourseController@pay_go_course_showEdit')->name('admin.pay.go.course.showEdit');
		Route::post('/pay-go-course/{slug}','Admin\PayGoCourseController@pay_go_course_update')->name('admin.pay.go.course.update');
		Route::get('/pay-go-course/status/{slug}','Admin\PayGoCourseController@pay_go_course_Status')->name('admin.pay.go.course.status');

		Route::any('/update_pay_go_course_price/{price}/{course_id}','Admin\PayGoCourseController@update_pay_go_course_price')->name('pay.go.update.price');
		Route::any('/update_pay_go_course_membership_price/{price}/{course_id}','Admin\PayGoCourseController@update_pay_go_course_membership_price')->name('pay.go.update.price');
		Route::any('/update_pay_go_course_sort/{sort_no}/{course_id}','Admin\PayGoCourseController@update_pay_go_course_sort')->name('pay.go.update.sort');
		Route::any('/pay-go-course/delete/{id}','Admin\PayGoCourseController@delete_pay_go_course')->name('delete_pay_go_course');
		Route::any('/pay-go-course/duplicate/{id}','Admin\PayGoCourseController@duplicate_pay_go_course')->name('duplicate_pay_go_course');
		Route::any('pay_go_course_selectedCat','Admin\PayGoCourseController@pay_go_selectedCat')->name('pay.go.selectedCat');

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
        Route::get('/pages/delete/{slug}', 'Admin\CmsPageController@delete')->name('admin.cms-pages.delete');


        #------------------------------------------------------------------------------------
        #  Revenue Management
        #------------------------------------------------------------------------------------
        Route::get('/revenue', 'Admin\AdminController@revenue')->name('admin.revenue');
        Route::any('/revenue/courses', 'Admin\AdminController@course_revenue')->name('admin.revenue.courses');
        Route::get('/revenue/courses/{id}', 'Admin\AdminController@course_revenue_detail')->name('admin.revenue.courses.detail');
        Route::any('/revenue/camps', 'Admin\AdminController@camp_revenue')->name('admin.revenue.camps');
        Route::get('/revenue/camps/{id}', 'Admin\AdminController@camp_revenue_detail')->name('admin.revenue.camps.detail');
        Route::any('/revenue/products', 'Admin\AdminController@product_revenue')->name('admin.revenue.products');
        Route::any('/calculate_male/{id}', 'Admin\AdminController@calculate_male')->name('admin.revenue.calculate_male');
		Route::any('/generate_course_report', 'Admin\AdminController@generate_course_report')->name('generate_course_report');
		Route::any('/generate_camp_report', 'Admin\AdminController@generate_camp_report')->name('generate_camp_report');
		Route::any('/generate_product_report', 'Admin\AdminController@generate_product_report')->name('generate_product_report');

        #----------------------------------------------------------------
		#  Register Template Management
		#----------------------------------------------------------------
		Route::any('/register-template/course/{id}','Admin\RegisterTemplateController@course_reg_temp')->name('course_reg_temp');
		Route::any('/register-template/camp/{id}','Admin\RegisterTemplateController@camp_reg_temp')->name('camp_reg_temp');
		Route::any('/register-template/camp/{id}/daily-signin','Admin\RegisterTemplateController@daily_signin')->name('daily_signin');



		// Save register template dates
		Route::any('/save-course-reg-dates','Admin\RegisterTemplateController@save_course_reg_dates')->name('save_course_reg_dates');

		// Export Course register template route
		Route::get('/export-course-register/{id}','Admin\RegisterTemplateController@ExportExcelCourseRegister')->name('export_course_register');

		// Export Course register template for all route
		Route::get('/export-course-register-for-all','Admin\RegisterTemplateController@ExportExcelCourseRegisterForAll')->name('export_course_register_for_all');

		// Export Pay Go Course register template route
		Route::get('/export-pay-go-course-register/{id}','Admin\RegisterTemplateController@ExportExcelPayGoCourseRegister')->name('export_pay_go_course_register');

		// Export Pay Go Course register template for all route
		Route::get('/export-pay-go-course-register-for-all','Admin\RegisterTemplateController@ExportExcelPayGoCourseRegisterForAll')->name('export_pay_go_course_register_for_all');

		// Export Camp register template route
		Route::get('/export-camp-register/{id}','Admin\RegisterTemplateController@ExportExcelCampRegister')->name('export_camp_register');

		// Export Camp register template for all route
		Route::get('/export-camp-register-for-all','Admin\RegisterTemplateController@ExportExcelCampRegisterForAll')->name('export_camp_register_for_all');


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
        Route::any('/orders','Admin\OrderController@index')->name('admin.orders');
        Route::get('/orders/detail/{id}','Admin\OrderController@detail')->name('admin.orderDetail');
        Route::get('/orders/ajax','Admin\OrderController@ajax')->name('admin.ajaxOrders');

        Route::get('/orders/download/{id}','Admin\OrderController@order_pdf')->name('admin.order.pdf');
        Route::any('download_orders','Admin\OrderController@download_orders')->name('download.orders');


        #-------------------------------------------------------------------------------------------------------------
        #  Wallet Management
        #-------------------------------------------------------------------------------------------------------------
        Route::any('/wallet','Admin\WalletController@wallet_index')->name('admin.wallet');
        Route::any('/credit-in-wallet','Admin\WalletController@credit_amt_by_admin')->name('admin.credit.wallet');
        Route::any('/debit-from-wallet','Admin\WalletController@debit_amt_by_admin')->name('admin.debit.wallet');
        Route::get('/wallet-details/view/{user_id}','Admin\WalletController@wallet_detail')->name('admin.wallet.detail');
        

        Route::get('/add-money/wallet','Admin\WalletController@AddMoneyWallet')->name('add_money_to_wallet_admin');


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

		/********************************************************************************************/
		/*--------------------------------New Video Management Route--------------------------------*/
		/********************************************************************************************/

		Route::get('/video-management','Admin\VideoManagementController@index')->name('admin.video.management');
		Route::get('/video/create','Admin\VideoManagementController@create')->name('admin.create.video');
		Route::any('/video/save','Admin\VideoManagementController@store')->name('admin.store.video');
		Route::get('/video/{id}/edit','Admin\VideoManagementController@edit')->name('admin.edit.video');
		Route::post('/video/{id}/update','Admin\VideoManagementController@update')->name('admin.update.video');
		Route::any('/video/remove/{id}','Admin\VideoManagementController@destroy')->name('admin.remove.video');

		Route::get('/videos/status/{id}','Admin\VideoManagementController@status')->name('admin.status.video');


		/********************************************************************************************/
		/*-----------------------------New Paygo Course registers Route-----------------------------*/
		/********************************************************************************************/

		Route::get('/register-template/paygo/{id}','Admin\RegisterTemplateController@paygo_register')->name('admin.register.paygo-course');
		Route::any('/pay-go-course-booking-data','Admin\PayGoCourseController@sendCourseBookingData')->name('admin.pay.go.course.booking.data');
		Route::any('/revenue/paygo-courses', 'Admin\AdminController@paygo_course_revenue')->name('admin.revenue.paygo.courses');
        Route::get('/revenue/paygo-courses/{id}', 'Admin\AdminController@paygo_course_revenue_detail')->name('admin.revenue.paygo.courses.detail');
        Route::any('/generate-paygo-course-report', 'Admin\AdminController@generate_paygo_course_report')->name('admin.generate.paygo.course.report');
        Route::any('/mark-all-as-read/{role_id}', 'Admin\AdminController@markAllAsRead')->name('admin.notifications.all.read');
		

		/********************************************************************************************/
		/*------------------------------New Early Bird Management Route-------------------------*/
		/********************************************************************************************/

		Route::get('/early_bird/index','Admin\EarlyBirdController@index')->name('admin.early_bird.list');
		Route::get('/early_bird/create','Admin\EarlyBirdController@create')->name('admin.create.early_bird');
		Route::any('/early_bird/save','Admin\EarlyBirdController@store')->name('admin.store.early_bird');
		Route::get('/early_bird/{id}/edit','Admin\EarlyBirdController@edit')->name('admin.edit.early_bird');
		Route::post('/early_bird/{id}/update','Admin\EarlyBirdController@update')->name('admin.update.early_bird');
		Route::get('/early_bird/{id}/status','Admin\EarlyBirdController@status')->name('admin.status.early_bird');
		// Route::any('/early_bird/remove/{id}','Admin\EarlyBirdController@destroy')->name('admin.remove.early_bird');       
});
