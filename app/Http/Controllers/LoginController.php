<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Cart;
use App\Order;
use App\OrderItems;
class LoginController extends Controller
{
    

    #login check

    public function check(Request $request)
    {

    	$this->validate($request,[
                  'email' => 'required|email',
                //  'g-recaptcha-response' => 'required_if:from_shopify,==,0|captcha',
                  'password' => 'required'
    	]);
      
		if (Auth::attempt(['email' => $request->email, 'password' => $request->password,'role' => 'vendor']))
        {

           // return Auth::user();
            if(Auth::user()->email_verified_at){

             return redirect()->intended('vendors');
            }else{
              Auth::logout();
              return redirect('/login')->with('messages','Your Account is nor verified yet.');
            }

        }elseif (Auth::attempt(['email' => $request->email, 'password' => $request->password,'role' => 'admin']))
        {
              
              return redirect()->intended('admin');

        }elseif (Auth::attempt(['email' => $request->email, 'password' => $request->password,'role' => 'user']))
        {

           
            if(Auth::user()->email_verified_at){
                 return redirect()->intended('user');
            }else{
              Auth::logout();
              return redirect('/login')->with('messages','Your Account is nor verified yet.');
            }

        }else{
        	return redirect('/login')->with('messages','Invalid Email | Password');
        }
	 
    }




/*________________________________________________________________________________________________________________
|
|           store all cart data to user database
|_________________________________________________________________________________________________________________
*/


public function createUserCart()
{
       if(Cart::getTotalQuantity() > 0){

             #################################################################################################
                $oID = Session::has('orderID') ? Session::get('orderID') : 0;

                $order = Order::where('id',$oID)->where('user_id',Auth::user()->id)->where('status',0)->first();

                   if(!empty($order)){
                            $orderID = Session::get('orderID');
                            
                   }else{

                        $o = new Order;
                        $o->orderID = '#ORD'.strtotime(date("d-m-Y h:i:sa")); 
                        $o->user_id = Auth::user()->id;
                        $o->save();

                        $orderID = $o->id;
                        Session::put('orderID',$o->id);

                   }

                  foreach(Cart::getContent() as $item):


                         $this->insertCartDataToDatabase($item,$orderID);
                    
                        
                 endforeach;    


                            
                          



             #################################################################################################
       }

       return 1;
}




/*________________________________________________________________________________________________________
|
|            insertCartDataToDatabase
|________________________________________________________________________________________________________
*/


  public function insertCartDataToDatabase($item,$orderID)
  {

                   # id have productId - ColorID - sizeID exp: (1-2-1)

                    


                                $product_id = $item->attributes->product_id;
                                $size_id = $item->attributes->size_id;
                                $color_id = $item->attributes->color_id;
 
                             

                                $checkOrderItems = new OrderItems;
                                $checkOrderItems->product_id = $product_id;
                                $checkOrderItems->orderID = $orderID;
                                $checkOrderItems->qty = $item->quantity;
                                $checkOrderItems->color_id = $color_id;
                                $checkOrderItems->size_id = $size_id;
                                $checkOrderItems->price =$item->price;
                                $checkOrderItems->subtotal = $item->price * $item->quantity;
                                $checkOrderItems->attributes =json_encode($item->attributes);
                                $checkOrderItems->save();
                     
                            
               Cart::remove($item->id);
   }

/*__________________________________________________________________________________________________
|
|
|___________________________________________________________________________________________________
*/

public function register(Request $request)
{
        $v= \Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
             'password' => ['required','min:6','confirmed']
        ]);

        if($v->fails()){
             return response()->json(['status' => 0,'errors' => $v->errors()]);
        }else{

 

           return response()->json(['status' => 1]);

        }

        
}






public function checkWalletCreatedorNOT()
{

   $user_id = \Auth::user()->id;
   $w = \App\MyWallet::where('user_id',$user_id)->count();


   $user = new \App\LoginTime;
   $user->user_id = $user_id;
   $user->save();

   if($w === 0){
      $w = new \App\MyWallet;
      $w->amount = 0;
      $w->user_id = Auth::user()->id;
      $w->save();
     }
}


/*__________________________________________________________________________________
|
|   user_account_2
|____________________________________________________________________________________
*/

public function user_account_2()
{
   if(Auth::check()){
           
       
            
             return redirect('/'.Auth::user()->role);
          

   }
    return redirect('/');
}


     
}
