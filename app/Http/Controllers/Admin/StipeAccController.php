<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\StripeAccount;

class StipeAccController extends Controller
{
    /*----------------------------------------
    |
    |   Stripe Account MANAGEMENT
    |
    |----------------------------------------*/


    /*----------------------------------------
    |   Listing of stripe_accounts
    |----------------------------------------*/ 
    public function stripe_account_index() {
        $stripe_account = StripeAccount::select(['id','account_name','acc_holder_name','status','slug'])->paginate(10);
    	return view('admin.stripe_account.index',compact('stripe_account'))
    	->with(['title' => 'Stripe Account Management', 'addLink' => 'admin.stripe_account.showCreate']);
    }

    public function stripe_account_showCreate() {
    	return view('admin.stripe_account.create')->with(['title' => 'Create Stripe Account', 'addLink' => 'admin.stripe_account.list']);
    }

    /*----------------------------------------
    |   Add stripe_account 
    |----------------------------------------*/ 
    public function stripe_account_create(Request $request) {
    	$validatedData = $request->validate([
            'account_name' => ['required', 'string'],
            'acc_holder_name' => ['required'],
            'secret_key' => ['required'],
            'public_key' => ['required'],
            // 'client_key' => ['required'],
        ]);

    	StripeAccount::create([
    		'account_name' => $request['account_name'],
            'acc_holder_name' => $request['acc_holder_name'],
    		'secret_key' => $request['secret_key'],
    		'public_key' => $request['public_key'],
    		// 'client_key' => $request['client_key'],
    	]);
    	return redirect()->route('admin.stripe_account.list')->with('flash_message', 'Stripe Account has been created successfully!');
    }

    /*----------------------------------------
    |   Edit stripe_account content
    |----------------------------------------*/ 
    public function stripe_account_showEdit($slug) {
    	$venue = StripeAccount::FindBySlugOrFail($slug);
    	return view('admin.stripe_account.edit')
    	->with(['venue' => $venue, 'title' => 'Edit Stripe Account', 'addLink' => 'admin.stripe_account.list']);
    }

    /*----------------------------------------
    |   Update stripe_account content
    |----------------------------------------*/ 
    public function stripe_account_update(Request $request, $slug) {
    	$validatedData = $request->validate([
            'account_name' => ['required', 'string'],
            'acc_holder_name' => ['required'],
            'secret_key' => ['required'],
            'public_key' => ['required'],
            // 'client_key' => ['required'],
        ]);

    	$venue = StripeAccount::FindBySlugOrFail($slug);

    	$venue->update([
    		'account_name' => $request['account_name'],
            'acc_holder_name' => $request['acc_holder_name'],
    		'secret_key' => $request['secret_key'],
    		'public_key' => $request['public_key'],
    		// 'client_key' => $request['client_key'],
    	]);
    	return redirect()->route('admin.stripe_account.list')->with('flash_message', 'Stripe Account has been updated successfully!');
    }

    /*----------------------------------------
    |   Delete User Record
    |----------------------------------------*/
    public function delete_stripe_account($id) {
        $user = StripeAccount::find($id);
        $user->delete();
        return \Redirect::back()->with('flash_message',' Stripe Account has been deleted successfully!');
    }

    /*----------------------------------------
    |   Change the status of the stripe_account
    |----------------------------------------*/ 
    public function stripe_account_Status($slug) {
     $venue = StripeAccount::FindBySlugOrFail($slug);

     if(!empty($venue)){
        $venue->status = $venue->status == 1 ? 0 : 1;
        $venue->save();
        $msg= $venue->status == 1 ? 'Stripe Account of <b>'.$venue->title.'</b> is Activated' : 'Stripe Account of <b>'.$venue->title.'</b> is Deactivated';
       return redirect(route('admin.stripe_account.list'))->with('flash_message', $msg);
     }
     return redirect()->back()->with('flash_message', 'Something Went Woring!');
    }
}
