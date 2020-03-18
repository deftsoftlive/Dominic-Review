<?php
namespace App\Traits\EmailTraits;
use Illuminate\Http\Request;
use App\VendorPackage;
use App\PackageMetaData;
use App\UserEventMetaData;
use Auth;
use App\Models\Vendors\DiscountDeal;
use App\Models\Order;
use App\Models\EventOrder;
use Session;

trait EmailTemplateTrait {


protected $emailTemplate = [
      'UserOrderSuccessFullNotification' => 4,
      'AdminOrderSuccessFullNotification' => 5,
      'VendorOrderSuccessFullNotification' => 6,
      'VendorApprovalNotificationFullNotification' => 7,
      'VendorRejectionNotificationFullNotification' => 8,
      'VendorInvitingRequestNotificationFullNotification' => 9,
      'NewVendorEmailNotificationFullNotification' => 10,
      'NewVendorEmailJoinNotificationFullNotification' => 11,
      'PricingRequestEmailNotificationFullNotification' => 12,
      'CustomPackageRequestEmailNotificationFullNotification' => 13,
      //shop
      'ShopOrderPlacedNotification' => 14,
      'ShopOrderPlacedVendorNotification' => 15,
      'BlockVendorEmailFullNotification' => 16,
      'UserInvitingRequestNotificationFullNotification' => 17,
      'ShopRejectedEmailTraitFullNotification' => 18,
      'productRejectedEmailTraitFullNotification' => 19,
      'ShopApprovedEmailTraitFullNotification' => 20,
      'ProductApprovedEmailTraitFullNotification' => 21,


];


public $adminEmail = 'bajwa9876470491@gmail.com';






}

