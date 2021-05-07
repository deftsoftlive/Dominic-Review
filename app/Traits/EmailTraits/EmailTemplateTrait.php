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


      // Parent request
      'parentRequestToCoach' => 3,

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

      // Information Email
      'OrderPlacedInformation' => 22, 

      // Registration Email
      'UserRegistration' => 23,

      // Coach submit a report
      'CoachSubmitReport' => 24,

      // Coach accept/denied link request
      'CoachLinkRequest' => 25,

      // New coach request
      'NewCoachRequest' => 26,

      // Admin - New Order
      'AdminOrderPlaced' => 27,

      // Verify Coach Account
      'VerifyCoachAccount' => 28,

      // Linked Player Upload Goal
      'LinkedPlayerUploadGoal' => 29,

      // Invoice Approved/Not Approved
      'InvoiceStatus' => 30,

      // New Invoice By Coach
      'NewInvoiceByCoach' => 31,

      // Book a Taster Class - Admin
      'BookATasterClass' =>32,

      // Coach Qualification Expired
      'CoachQualificationExpired' => 33,

      // Book a Taster Class - User
      'BookATasterUserClass' =>34,

      // Coach submit a report
      'CoachSubmitEndOfTermReport' => 35,
      'CoachSubmitPlayerReport' => 36,
      'CoachSubmitMatchReport' => 37,

      // Subscribe Users
      'SubscribeUsers' => 38,

      // Contact Us - User
      'ContactUs' => 40,

      // Contact Us - Admin
      'AdminContactUs' => 41,
      'OrderPlacedInformationPackageCourses' => 42,
      'GoalCommentEmailUsersend' => 43
];


public $adminEmail = 'monika27@yopmail.com';



}