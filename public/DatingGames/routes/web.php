<?php


Route::get('/', 'HomeController@welcome')->name('landingPage');

Route::get('/faq', 'cms\CmsController@faq')->name('faq');
Route::get('/contact-us', 'cms\CmsController@contactUs')->name('contact');
Route::post('/contact-us', 'cms\CmsController@contactUs')->name('contact');
Route::get('/events', 'Admin\EventController@frontEvents')->name('frontend.events');
Route::get('/admin/login', 'Auth\AdminLoginController@index')->name('admin.login');
Route::get('/admin/password/reset', 'Auth\AdminResetPasswordController@index')->name('admin.reset');
Route::post('admin/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin_password.email');
Route::get('/admin/password/reset', 'Auth\AdminForgotPasswordController@show_email_link_form')->name('admin_password.request');
Route::get('admin/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/password/reset', 'Auth\AdminResetPasswordController@reset');





Auth::routes(['verify' => true]);

Route::group(['middleware' => 'verified'], function() {
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/', 'User\UserProfileController@index')->name('user.profile');
Route::post('/profile/', 'User\UserProfileController@update_user')->name('user.updateprofile');
Route::post('/editProfilePicture', 'User\UserProfileController@editProfilePicture')->name('user.editProfilePicture');
Route::get('/change-password/', 'User\UserProfileController@changePassword')->name('user.changePassword');
Route::post('/change-password/', 'User\UserProfileController@updatePassword')->name('user.updatePassword');
Route::get('/event/{slug}', 'Admin\EventController@detailEvent')->name('frontend.detailEvent');
Route::post('/event/{slug}', 'Admin\BookingController@bookEvent')->name('bookEvent');
Route::get('/payment/success', 'Admin\BookingController@paymentSuccess')->name('owner.payment_success');
Route::get('/payment/failed', 'Admin\BookingController@paymentFailed')->name('owner.payment_failed');

Route::get('/matches', 'User\MatchController@index')->name('user.match');
Route::get('/matches/event/{slug}', 'User\MatchController@matchMaking')->name('user.matchMaking');
Route::post('/removematch', 'User\MatchController@noMatch')->name('user.removeMatch');
Route::post('/make-a-match', 'User\MatchController@makeAMatch')->name('user.makeAMatch');
Route::get('/match/user/{slug}', 'User\MatchController@matchedUser')->name('user.matchedUser');

//My events page
Route::get('/user-events/', 'User\UserProfileController@myEvents')->name('user.myEvents');

 //Messaging
Route::get('inbox/users', 'User\MessageController@inbox')->name('inbox');
Route::get('inbox-user-detail/{slug}', 'User\MessageController@matchedUserDetail')->name('inbox-user-detail');
Route::post('message-store', 'User\MessageController@store')->name('message-store');
Route::get('block-user/{slug}', 'User\MatchController@block')->name('block');
Route::get('unblock-user/{slug}', 'User\MatchController@unblock')->name('unblock');
});
	
Route::group(['prefix' => 'backend', 'middleware' => ['backend', 'verified']], function() {
    // admin profile Management
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/home', 'Admin\HomeController@index')->name('admin.index');
    Route::get('/profile', 'Admin\ProfileController@profile')->name('admin.profile');
    Route::post('/updateProfile', 'Admin\ProfileController@updateProfile')->name('admin.updateProfile');
    Route::post('/updatePassword', 'Admin\ProfileController@updatePassword')->name('admin.updatePassword');

    // cmspages pages Management
    Route::get('/pages', 'Admin\PageController@showPages')->name('admin.cmspages.showpages');
    Route::post('/pageSearch', 'Admin\PageController@searchPage')->name('admin.cmspages.searchPage');
    Route::get('/page/create', 'Admin\PageController@showCreatePages')->name('admin.cmspages.showCreatePage');
    Route::post('/page/create', 'Admin\PageController@createPage')->name('admin.cmspages.createpage');
    Route::post('/detelePage', 'Admin\PageController@destroyPage')->name('admin.cmspages.detelePage');
    Route::get('/page/{slug}', 'Admin\PageController@showEditPage')->name('admin.cmspages.showEditPage');
    Route::post('/page/{slug}', 'Admin\PageController@updatePage')->name('admin.cmspages.updatePage');
    
    //Slide Management
    Route::get('/slides', 'Admin\SlidesController@showSlides')->name('admin.cmspages.showSlides');
    Route::get('/slides/create', 'Admin\SlidesController@showCreateSlides')->name('admin.cmspages.showCreateSlides');
    Route::post('/slides/create', 'Admin\SlidesController@createSlides')->name('admin.cmspages.createSlides');
    Route::post('/deteleSlides', 'Admin\SlidesController@destroySlides')->name('admin.cmspages.deteleSlides');


    // Blog Category Management
    Route::get('/blog_category', 'Admin\BlogController@showBlogCats')->name('admin.blogCat.showBlogCats');
    Route::post('/blogCatSearch', 'Admin\BlogController@searchBlogCats')->name('admin.blogCat.search');
    Route::get('/blog_category/create', 'Admin\BlogController@showCreateBlogCats')->name('admin.blogCat.showCreateBlogCats');
    Route::post('/blog_category/create', 'Admin\BlogController@createBlogCats')->name('admin.blogCat.createBlogCats');
    Route::post('/detele_blog_cat', 'Admin\BlogController@destroyBlogCat')->name('admin.blogCat.deteleBlogCat');
    Route::get('/blog_category/{slug}', 'Admin\BlogController@showEditBlogCat')->name('admin.blogCat.showEditBlogCat');
    Route::post('/blog_category/{slug}', 'Admin\BlogController@updateBlogCat')->name('admin.blogCat.updateBlogCat');
    
    // Blog Management
    Route::get('/blogs', 'Admin\BlogController@showBlogs')->name('admin.blog.showBlogs');
    Route::post('/blogSearch', 'Admin\BlogController@searchBlog')->name('admin.blog.search');
    Route::get('/blogs/create', 'Admin\BlogController@showCreateBlog')->name('admin.blog.showCreateBlog');
    Route::post('/blogs/create', 'Admin\BlogController@createBlog')->name('admin.blog.createBlog');
    Route::post('/detele_blog', 'Admin\BlogController@destroyBlog')->name('admin.blog.deteleBlog');
    Route::get('/blog/{slug}', 'Admin\BlogController@showEditBlog')->name('admin.blog.showEditBlog');
    Route::post('/blog/{slug}', 'Admin\BlogController@updateBlog')->name('admin.blog.updateBlog');

    // Faq Management
    Route::get('/faq', 'Admin\FaqController@showFaq')->name('admin.showFaqs');
    Route::get('/faq/create', 'Admin\FaqController@showCreateFaq')->name('admin.showCreateFaq');
    Route::post('/faq/create', 'Admin\FaqController@createFaq')->name('admin.createFaq');
    Route::get('/faq/{slug}', 'Admin\FaqController@showEditFaq')->name('admin.showEditFaq');
    Route::post('/faq/{slug}', 'Admin\FaqController@updateFaq')->name('admin.updateFaq');
    Route::post('/deleteFaq', 'Admin\FaqController@destroyFaq')->name('admin.deteleFaq');

    // User Management
    Route::get('/users', 'Admin\UserController@showUsers')->name('admin.showUsers');
    Route::post('/usersSearch', 'Admin\UserController@searchUsers')->name('admin.searchUsers');
    Route::get('/user/create', 'Admin\UserController@showCreateUser')->name('admin.showCreateUser');
    Route::post('/user/create', 'Admin\UserController@createUser')->name('admin.createUser');
    Route::get('/user/{slug}', 'Admin\UserController@showEditUser')->name('admin.showEditUser');
    Route::post('/user/{slug}', 'Admin\UserController@updateUser')->name('admin.updateUser');
    Route::post('/userDelete', 'Admin\UserController@destroyUser')->name('admin.userDelete');
    Route::get('/changeStatus/{slug}', 'Admin\UserController@changeStatus')->name('admin.changeStatus');
    Route::get('/user/rejectpicture/{slug}', 'Admin\UserController@rejectpicture')->name('admin.rejectpicture');
    Route::post('/user/rejectpicture/{slug}', 'Admin\UserController@rejected')->name('admin.rejected');

    //Settings
    Route::get('/settings', 'Admin\SettingsController@index')->name('admin.settings');
    Route::post('/settings', 'Admin\SettingsController@update_settings')->name('admin.update_settings');

    // Event pages Management
    Route::get('/events', 'Admin\EventController@showEvents')->name('admin.showevents');
    Route::get('/event/create', 'Admin\EventController@showCreateEvent')->name('admin.showCreateEvent');
    Route::post('/event/create', 'Admin\EventController@createEvent')->name('admin.createEvent');
    Route::post('/eventSearch', 'Admin\EventController@searchEvent')->name('admin.searchEvent');
    Route::post('/deteleEvent', 'Admin\EventController@destroyEvent')->name('admin.destroyEvent');
    Route::get('/event/{slug}', 'Admin\EventController@showEditEvent')->name('admin.showEditEvent');
    Route::post('/event/{slug}', 'Admin\EventController@updateEvent')->name('admin.updateEvent');

    // Event pages Management
    Route::get('/venues', 'Admin\VenueController@showVenues')->name('admin.showvenues');
    Route::get('/venue/create', 'Admin\VenueController@showCreateVenue')->name('admin.showCreateVenue');
    Route::post('/venue/create', 'Admin\VenueController@createVenue')->name('admin.createVenue');
    Route::post('/venueSearch', 'Admin\VenueController@searchVenue')->name('admin.searchVenue');
    Route::post('/deteleVenue', 'Admin\VenueController@destroyVenue')->name('admin.destroyVenue');
    Route::get('/venue/{id}', 'Admin\VenueController@showEditVenue')->name('admin.showEditVenue');
    Route::post('/venue/{id}', 'Admin\VenueController@updateVenue')->name('admin.updateVenue');

    //Booking Pages Mangement
    Route::get('/bookings', 'Admin\BookingController@showBooking')->name('admin.showbookings');
    Route::post('/bookingSearch', 'Admin\BookingController@searchBooking')->name('admin.searchBooking');
    Route::get('/booking/{slug}', 'Admin\BookingController@viewEvent')->name('admin.viewEvent');
    Route::post('/cancelBooking', 'Admin\BookingController@cancelBooking')->name('admin.cancelBooking');
    Route::post('/activateBooking', 'Admin\BookingController@activateBooking')->name('admin.activateBooking');
    Route::get('/createBooking/{slug}', 'Admin\BookingController@collectBooking')->name('admin.collectBooking');
    Route::post('/createBooking/{slug}', 'Admin\BookingController@createBooking')->name('admin.createBooking');

    // Matches
    Route::get('/user-event', 'Admin\AdminMatchController@index')->name('admin.matchUserList');
    Route::post('/userSearch', 'Admin\AdminMatchController@userSearch')->name('admin.userSearch');
    Route::get('/user-event/{slug}', 'Admin\AdminMatchController@viewUserEvents')->name('admin.viewUserEvents');
    Route::get('/matches/{slug}/{id}', 'Admin\AdminMatchController@viewUserMatches')->name('admin.viewUserMatches');
    Route::post('/remove-match', 'Admin\AdminMatchController@removeAMatch')->name('admin.removeAMatch');
    Route::post('/create-a-match', 'Admin\AdminMatchController@createAMatch')->name('admin.createAMatch');

    // Inbox
    Route::get('/inbox', 'User\MessageController@index')->name('admin.inbox');
    Route::post('/user-search', 'User\MessageController@userSearch')->name('admin.searchUser');
    Route::get('/user-match/{slug}', 'User\MessageController@matchedUser')->name('admin.matchedUser');
    Route::get('/messages/{slug}/{id}', 'User\MessageController@messages')->name('admin.messages');
});

Route::get('/{slug}', 'cms\CmsController@getCms')->name('getCms');



