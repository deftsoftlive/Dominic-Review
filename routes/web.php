<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
##########################################################################
 Deveolper Name : Narinder Singh
 Email : bajwa7696346232@gmail.com
##########################################################################

| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
  sudo kill -9 `sudo lsof -t -i:9001`

*/


Route::get('/', function () {
    return view('welcome');
});

/* Register as coach */
Route::get('/register/coach','Auth\RegisterController@regsiter_coach')->name('register-as-coach');


//Route::post('/vendor/register', 'HomeController@create')->name('vendor_register');


error_reporting(E_ALL);



#===============================================
#
#   CMS PAGES - DRH HTML PAGES
#
#===============================================
Route::any('add-report','HomeController@add_report')->name('add-report');
Route::get('course-listing','HomeController@listing')->name('listing');
// Route::post('course-listing?age_group={age_group},level={level}','HomeController@listing')->name('listing');
Route::any('course-detail/{id}','HomeController@course_detail')->name('course_detail');
Route::any('set-goals','HomeController@set_goals')->name('set-goals');
Route::any('contact','HomeController@contact_us')->name('contact-us');
Route::any('save-contact-us','HomeController@save_contact_us')->name('save-contact-us');
Route::any('success','HomeController@success_page')->name('success_page');


#===============================================
#
#   COURSE PAGE SEARCH
#
#===============================================
Route::get('course_search','HomeController@course_search')->name('course_search');


#===============================================
#
#       Routes Files - Start Here
#
#===============================================
require __DIR__.'/routing/user/checkout.php';
require __DIR__.'/routing/home/routes.php';
require __DIR__.'/routing/home/ajax.php';


require __DIR__.'/routing/shop/routes.php';
require __DIR__.'/routing/shop/ajax.php';


require __DIR__.'/routing/admin/routes.php';
require __DIR__.'/routing/vendor/routes.php';
require __DIR__.'/routing/user/ajax.php';
require __DIR__.'/routing/user/routes.php';
#===============================================
#
#       Routes Files - End Here
#
#===============================================



/* Emails */
Route::get('/emailss',function(){
  $msg = \App\Models\Vendors\ChatMessage::find(8);
 return view('emails.chat.quote')->with('msg',$msg);
 });


Route::get('/demoo',function(){

$ups = upsArray();
$accessKey = $ups['UPS_ACCESS_KEY'];
$userId = $ups['UPS_USER_ID'];
$password = $ups['UPS_PASSWORD'];

$address = new \Ups\Entity\Address();
$address->setAttentionName('Test Test');
$address->setBuildingName('Test');
$address->setAddressLine1('Address Line 1');
$address->setAddressLine2('Address Line 2');
$address->setAddressLine3('Address Line 3');
$address->setStateProvinceCode('NYw');
$address->setCity('New Yorkwse');
$address->setCountryCode('USs');
$address->setPostalCode('100df00');

$xav = new \Ups\AddressValidation($accessKey, $userId, $password);
$xav->activateReturnObjectOnValidate(); //This is optional
try {
     $response = $xav->validate($address, $requestOption = \Ups\AddressValidation::REQUEST_OPTION_ADDRESS_VALIDATION, $maxSuggestion = 15);
     dd($response);
} catch (Exception $e) {
    var_dump($e);
}
});



#======================================================================

Route::get('/get-shipping-rate',function(){

	$ups = upsArray();
$accessKey = $ups['UPS_ACCESS_KEY'];
$userId = $ups['UPS_USER_ID'];
$password = $ups['UPS_PASSWORD'];
$rate = new Ups\Rate(
	$accessKey,
	$userId,
	$password
);

try {
    $shipment = new \Ups\Entity\Shipment();

    $shipperAddress = $shipment->getShipper()->getAddress();
    $shipperAddress->setPostalCode('99205');

    $address = new \Ups\Entity\Address();
    $address->setPostalCode('99205');
    $shipFrom = new \Ups\Entity\ShipFrom();
    $shipFrom->setAddress($address);

    $shipment->setShipFrom($shipFrom);

    $shipTo = $shipment->getShipTo();
    $shipTo->setCompanyName('Test Ship To');
    $shipToAddress = $shipTo->getAddress();
    $shipToAddress->setPostalCode('99205');

    $package = new \Ups\Entity\Package();
    $package->getPackagingType()->setCode(\Ups\Entity\PackagingType::PT_PACKAGE);
    $package->getPackageWeight()->setWeight(10);
    
    // if you need this (depends of the shipper country)
    $weightUnit = new \Ups\Entity\UnitOfMeasurement;
    $weightUnit->setCode(\Ups\Entity\UnitOfMeasurement::UOM_KGS);
    $package->getPackageWeight()->setUnitOfMeasurement($weightUnit);

    $dimensions = new \Ups\Entity\Dimensions();
    $dimensions->setHeight(10);
    $dimensions->setWidth(10);
    $dimensions->setLength(10);

    $unit = new \Ups\Entity\UnitOfMeasurement;
    $unit->setCode(\Ups\Entity\UnitOfMeasurement::UOM_IN);

    $dimensions->setUnitOfMeasurement($unit);
    $package->setDimensions($dimensions);

    $shipment->addPackage($package);

    //var_dump($rate->getRate($shipment));
} catch (Exception $e) {
    var_dump($e);
}
});