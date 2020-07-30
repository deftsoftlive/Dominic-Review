<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Wallet;
use App\WalletHistory;

class WalletController extends Controller
{
	/********************************
	|	Wallet Listing
	|********************************/
    public function wallet_index()
    {
    	$wallet = Wallet::orderBy('id','asc')->paginate(10);
    	return view('admin.wallet.index',compact('wallet'));
    }


    /********************************************
	|	Credit money in particular user's wallet 
	|********************************************/
    public function debit_amt_by_admin(Request $request)
    {
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
    }


    /********************************************
	|	Debit money in particular user's wallet 
	|********************************************/
    public function credit_amt_by_admin(Request $request)
    {
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

    	return \Redirect::back()->with('flash_message',' Amount has been credited successfully in user account!');
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
