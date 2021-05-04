<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Wallet;
use App\WalletHistory;
use App\User;

class WalletController extends Controller
{
	/********************************
	|	Wallet Listing
	|********************************/
    public function wallet_index()
    {
        $user_name = request()->get('u_name');  

        if(!empty($user_name)){
            $wallet = \DB::table('wallets')
                    ->leftjoin('users', 'wallets.user_id', '=', 'users.id')
                    ->select('wallets.*', 'users.name')
                    ->orWhere( 'users.name', 'LIKE', '%' . $user_name . '%' )
                    ->paginate(10); 
        }else{
           $wallet = Wallet::orderBy('id','asc')->paginate(10); 
       }  
    	
    	return view('admin.wallet.index',compact('wallet'));
    }

    // Add money to wallet for the users that having no money in wallet
    public function AddMoneyWallet(){
        $wallet_user = Wallet::pluck('user_id')->toArray(); 
        // $users = User::select(['id','role', 'email','name','type'])
        //             ->where(function($q) { 
        //                 $q->where('role_id', '2') 
        //                 ->orWhere('role_id', '3'); 
        //             })->whereNotIn('id',$wallet_user)->get();

        $users = User::select(['id','role', 'email','name','type'])->where('role_id','2')->whereNotIn('id',$wallet_user)->get();
        $coaches = User::select(['id','role', 'email','name','type'])->where('role_id','3')->whereNotIn('id',$wallet_user)->get();

        return view('admin.wallet.add-money',compact('users','coaches'));
    }


    /********************************************
	|	Credit money in particular user's wallet 
	|********************************************/
    public function debit_amt_by_admin(Request $request)
    {   
        if(!empty($request->user_id)){
            if(!empty($request->money_amount) && $request->money_amount > 0){
                $check_wallet_amount = Wallet::where('user_id',$request->user_id)->first();                
                if($check_wallet_amount->money_amount < $request->money_amount){
                    return \Redirect::back()->with('error_flash_message','Available wallet amount should be greater than debit request amount.');    
                }

                $wallet = new WalletHistory;
                $wallet->type = 'debit';
                $wallet->user_id = $request->user_id;
                $wallet->payment_by = 1;
                $wallet->money_amount = $request->money_amount;
                $wallet->save();

                $creditWalletHistory = WalletHistory::where('user_id',$request->user_id)->where('type','credit')->get();
                $debitWalletHistory = WalletHistory::where('user_id',$request->user_id)->where('type','debit')->get();

                $wallet_amt1 = [];
                foreach($creditWalletHistory as $wh){
                    $wallet_amt1[] = $wh->money_amount;
                }

                $wallet_amt2 = [];
                foreach($debitWalletHistory as $wh){
                    $wallet_amt2[] = $wh->money_amount;
                }

                $total_credit_amt = array_sum($wallet_amt1);
                $total_debit_amt = array_sum($wallet_amt2);

                $wallet_amt = $total_credit_amt - $total_debit_amt;
                Wallet::where('user_id',$request->user_id)->update(array('money_amount' => $wallet_amt));

                return \Redirect::back()->with('flash_message',' Amount has been debited successfully from user account!');
            }else{
                return \Redirect::back()->with('error_flash_message','Please enter a valid amount.');    
            }
        }else{
            return \Redirect::back()->with('error_flash_message','Please select a user.');
        }
    }


    /********************************************
	|	Debit money in particular user's wallet 
	|********************************************/
    public function credit_amt_by_admin(Request $request)
    { 
        if(!empty(($request->user_id))){
            if(!empty($request->money_amount) && $request->money_amount > 0){                
                $check_wallet = Wallet::where('user_id',$request->user_id)->first();
                
                $wallet = new WalletHistory;
                $wallet->type = 'credit';
                $wallet->user_id = $request->user_id;
                $wallet->payment_by = 1;
                $wallet->money_amount = $request->money_amount;
                $wallet->save();

                $creditWalletHistory = WalletHistory::where('user_id',$request->user_id)->where('type','credit')->get();
                $debitWalletHistory = WalletHistory::where('user_id',$request->user_id)->where('type','debit')->get();

                $wallet_amt1 = [];
                foreach($creditWalletHistory as $wh){
                    $wallet_amt1[] = $wh->money_amount;
                }

                $wallet_amt2 = [];
                foreach($debitWalletHistory as $wh){
                    $wallet_amt2[] = $wh->money_amount;
                }

                $total_credit_amt = array_sum($wallet_amt1);
                $total_debit_amt = array_sum($wallet_amt2);

                $wallet_amt = $total_credit_amt - $total_debit_amt;
                Wallet::where('user_id',$request->user_id)->update(array('money_amount' => $wallet_amt));

                if(empty($check_wallet)){
                    $walletData['user_id'] = $request->user_id;
                    $walletData['money_amount'] = $request->money_amount;
                    $wallet = Wallet::create($walletData); 
                    $wallet->save();  
                }
                return \Redirect::route('admin.wallet')->with('flash_message',' Amount has been credited successfully in user account!');
            }else{
                return \Redirect::back()->with('error_flash_message','Please enter a valid amount.');    
            }
        }else{
            return \Redirect::back()->with('error_flash_message','Please select a user.');
        }
    }


    /********************************************
	|	Wallet Detail Page 
	|********************************************/
	public function wallet_detail($user_id)
	{
		$walletHistory = WalletHistory::where('user_id',$user_id)->orderBy('id','desc')->paginate(10);
		return view('admin.wallet.detail',compact('walletHistory','user_id'));
	}
}
