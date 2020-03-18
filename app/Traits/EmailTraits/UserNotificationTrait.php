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
use App\Models\Admin\EmailTemplate;
use App\Traits\EmailTraits\UserOrderSuccess;
use App\Traits\EmailTraits\AdminOrderSuccess;
use App\Traits\EmailTraits\VendorOrderSuccess;
use App\Traits\EmailTraits\VendorApprovalNotification;
use App\Traits\EmailTraits\VendorRejectionNotification;
use App\Traits\EmailTraits\VendorInvitingRequestNotification;
use App\Traits\EmailTraits\NewVendorEmail;
use App\Traits\EmailTraits\PricingRequestEmail;

//shop emails
use App\Traits\EmailTraits\ShopProductOrderPlaced;
use App\Traits\EmailTraits\ShopProductOrderPlacedForVendor;
use App\Traits\EmailTraits\BlockVendorEmail;
use App\Traits\EmailTraits\UserInvitingRequestNotification;
use App\Traits\EmailTraits\ShopRejectedEmailTrait;
use App\Traits\EmailTraits\ShopApprovedEmailTrait;
use App\Traits\EmailTraits\productRejectedEmailTrait;
use App\Traits\EmailTraits\ProductApprovedEmailTrait;
trait UserNotificationTrait {

	use UserOrderSuccess;
	use AdminOrderSuccess;
	use VendorOrderSuccess;
	use VendorApprovalNotification;
	use VendorRejectionNotification;
	use VendorInvitingRequestNotification;
	use UserInvitingRequestNotification;
	use NewVendorEmail;
	use PricingRequestEmail;
	use ShopProductOrderPlaced;
	use ShopProductOrderPlacedForVendor;
	use BlockVendorEmail;
	use ShopRejectedEmailTrait;
	use ShopApprovedEmailTrait;
	use productRejectedEmailTrait;
	use ProductApprovedEmailTrait;

 
}