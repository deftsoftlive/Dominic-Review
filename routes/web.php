<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/****************************************
|
|		CMS PAGES - Start Here
|
|****************************************/

Route::any('/add-report','HomeController@add_report')->name('add-report');
Route::any('/listing','HomeController@listing')->name('listing');
Route::any('/set-goals','HomeController@get_goals')->name('set-goals');

/****************************************
|
|		CMS PAGES - End Here
|
|****************************************/


/* Auth Routes */
Auth::routes(['verify' => true]);

/* Register as coach */
Route::get('/register/coach','Auth\RegisterController@regsiter_coach')->name('register-as-coach');


/****************************************
|
|	Admin Routes - Start Here
|
|****************************************/

Route::middleware(['auth', 'verified'])->group(function () {

	Route::get('/home', 'HomeController@index')->name('home');

	Route::group(['prefix' => 'admin', 'middleware' =>'auth'], function () {

		Route::get('/users','Admin\AdminController@user_listing')->name('admin-users');

	});
});

/****************************************
|
|	Admin Routes - End Here
|
|****************************************/
