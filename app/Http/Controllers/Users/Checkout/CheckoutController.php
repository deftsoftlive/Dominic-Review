<?php

namespace App\Http\Controllers\Users\Checkout;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vendors\DiscountDeal;
use App\VendorPackage;
use Auth;
use App\Models\Order;
use Session;
use App\UserEvent;
use Carbon\Carbon;
use App\Traits\Checkoutproccess\Billing;

class CheckoutController extends Controller
{
    
	 
use Billing;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                

    public function __construct(Request $request)
	{   $stripe = SripeAccount();
        \Stripe\Stripe::setApiKey($stripe['sk']);
       
	}





}
