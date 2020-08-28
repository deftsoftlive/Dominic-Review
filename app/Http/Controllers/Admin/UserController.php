<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\CoachDocument;
use App\ParentCoachReq;
use App\Course;
use App\Models\Shop\ShopCartItems;
use App\Models\Shop\ShopOrder;
use App\NewsletterSubscription;

class UserController extends Controller
{

	/*******************************
	|
	|	USER MANAGEMENT
	|
	|*******************************/


	/*******************************
	|	User Listing
	|*******************************/
    public function index() {

        $search_first_name = request()->get('search_first_name');
        $search_last_name = request()->get('search_last_name');
        $search_email = request()->get('search_email');

        if(!empty(request()->get('search_first_name')) && !empty(request()->get('search_last_name')) && !empty(request()->get('search_email'))){
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('last_name', '=', $search_last_name)
                     ->where('email', '=', $search_email)
                     ->where('role','!=','admin')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_first_name')) && !empty(request()->get('search_last_name')))
        {
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('last_name', '=', $search_last_name)
                     ->where('role','!=','admin')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_first_name')) && !empty(request()->get('search_email')))
        {
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('email', '=', $search_email)
                     ->where('role','!=','admin')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_last_name')) && !empty(request()->get('search_email')))
        {
          $users = \DB::table('users')
                     ->where('last_name', '=', $search_last_name)
                     ->where('email', '=', $search_email)
                     ->where('role','!=','admin')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_first_name')))
        {
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('role','!=','admin')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_last_name')))
        {
          $users = \DB::table('users')
                     ->where('last_name', '=', $search_last_name)
                     ->where('role','!=','admin')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_email')))
        {
          $users = \DB::table('users')
                     ->where('email', '=', $search_email)
                     ->where('role','!=','admin')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);
        }else{
          $users = User::select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])->where('role','!=','admin')->paginate(10);
        }

    	return view('admin.user-vendor.users.index',compact('users'));	
    }

    /*******************************
    |   Add User 
    |*******************************/
    public function add_user() {
        return view('admin.user-vendor.users.create');
    }

    /*******************************
    |   Save User 
    |*******************************/
    public function save_user(Request $request) {

        $validatedData = $request->validate([
            'first_name' => ['required', 'string', 'max:25'],
            'last_name' => ['required', 'string', 'max:25'],
            'gender' => ['required'],
            'address' => ['required', 'string', 'max:255'],
            'town' => ['required', 'string', 'max:255'],
            'postcode' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'Numeric','min:7'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
        ]);

        $data = $request->all();

        $user               =    new User;
        $user->role_id      =    $data['role_id'];
        $user->name         =    $data['first_name'].' '.$data['last_name'];
        $user->first_name   =    $data['first_name'];
        $user->last_name    =    $data['last_name'];
        $user->gender       =    $data['gender'];
        $user->date_of_birth=    $data['date_of_birth'];
        $user->address      =    $data['address'];
        $user->town         =    $data['town'];
        $user->postcode     =    $data['postcode'];
        $user->county       =    $data['county'];
        $user->country      =    $data['country'];
        $user->phone_number =    $data['phone_number'];
        $user->email        =    $data['email'];
        $user->updated_status = '1';
        $user->email_verified_at = '2020-03-18 11:10:38';
        $user->save(); 
        
        return redirect('/admin/users')->with('flash_message',' User has been created successfully!');
    }

    /*******************************
	|	Edit User Data
	|*******************************/
    public function edit_users($id) {
    	$user = User::where('id',$id)->first();
        $user_role = $user['role_id'];

        if($user_role == 3)
        {
            $coach_document = CoachDocument::where('coach_id',$id)->get();
        }

    	return view('admin.user-vendor.users.edit',compact('user','coach_document'));
    }

    /*******************************
    |	Update User Data
    |*******************************/
    public function update_users(Request $request) {

        $validatedData = $request->validate([
            'first_name' => ['required', 'string', 'max:25'],
            'last_name' => ['required', 'string', 'max:25'],
            'gender' => ['required'],
            'address' => ['required', 'string', 'max:255'],
            'town' => ['required', 'string', 'max:255'],
            'postcode' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'Numeric','min:7'],
            'email' => ['required', 'string', 'email', 'max:255']
        ]);

        $user = User::find($request->id);

        if($request->updated_status == '1')
        {
            $user->updated_status = '1';
            $user->email_verified_at = '2020-03-18 11:10:38';
        }else{
            $user->updated_status = '0';
            $user->email_verified_at = '2020-03-18 11:10:38';
        }
        
        $user->update($request->all()); 
        return \Redirect::back()->with('flash_message',' User details has been updated successfully!');
    }

    /*******************************
    |   Delete User Record
    |*******************************/
    public function delete_user($id) {
        $user = User::find($id);
        $user->delete();
        return \Redirect::back()->with('flash_message',' User details has been deleted successfully!');
    }

    /*******************************
    |   Parent Listing
    |*******************************/
    public function parent_list(){

        $search_first_name = request()->get('search_first_name');
        $search_last_name = request()->get('search_last_name');
        $search_email = request()->get('search_email');

        if(!empty(request()->get('search_first_name')) && !empty(request()->get('search_last_name')) && !empty(request()->get('search_email'))){
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('last_name', '=', $search_last_name)
                     ->where('email', '=', $search_email)
                     ->where('role_id','2')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_first_name')) && !empty(request()->get('search_last_name')))
        {
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('last_name', '=', $search_last_name)
                     ->where('role_id','2')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_first_name')) && !empty(request()->get('search_email')))
        {
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('email', '=', $search_email)
                     ->where('role_id','2')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_last_name')) && !empty(request()->get('search_email')))
        {
          $users = \DB::table('users')
                     ->where('last_name', '=', $search_last_name)
                     ->where('email', '=', $search_email)
                     ->where('role_id','2')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_first_name')))
        {
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('role_id','2')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_last_name')))
        {
          $users = \DB::table('users')
                     ->where('last_name', '=', $search_last_name)
                     ->where('role_id','2')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_email')))
        {
          $users = \DB::table('users')
                     ->where('email', '=', $search_email)
                     ->where('role_id','2')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);
        }else{
            $users = User::select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','type'])->where('role_id','2')->paginate(10);
        }
        return view('admin.user-vendor.users.parent-index',compact('users')); 
    }

    /*******************************
    |   Coach Listing
    |*******************************/
    public function coach_list(){

        $search_first_name = request()->get('search_first_name');
        $search_last_name = request()->get('search_last_name');
        $search_email = request()->get('search_email');

        if(!empty(request()->get('search_first_name')) && !empty(request()->get('search_last_name')) && !empty(request()->get('search_email'))){
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('last_name', '=', $search_last_name)
                     ->where('email', '=', $search_email)
                     ->where('role_id','3')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','enable_inovice','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_first_name')) && !empty(request()->get('search_last_name')))
        {
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('last_name', '=', $search_last_name)
                     ->where('role_id','3')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','enable_inovice','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_first_name')) && !empty(request()->get('search_email')))
        {
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('email', '=', $search_email)
                     ->where('role_id','3')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','enable_inovice','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_last_name')) && !empty(request()->get('search_email')))
        {
          $users = \DB::table('users')
                     ->where('last_name', '=', $search_last_name)
                     ->where('email', '=', $search_email)
                     ->where('role_id','3')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','enable_inovice','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_first_name')))
        {
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('role_id','3')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','enable_inovice','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_last_name')))
        {
          $users = \DB::table('users')
                     ->where('last_name', '=', $search_last_name)
                     ->where('role_id','3')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','enable_inovice','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_email')))
        {
          $users = \DB::table('users')
                     ->where('email', '=', $search_email)
                     ->where('role_id','3')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','enable_inovice','parent_id'])
                     ->paginate(10);
        }else{
            $users = User::select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','enable_inovice','country'])->where('role_id','3')->paginate(10);
        }
        return view('admin.user-vendor.users.coach-index',compact('users')); 
    }

    /*******************************
    |   Children Listing
    |*******************************/
    public function children_list(){

        $search_first_name = request()->get('search_first_name');
        $search_last_name = request()->get('search_last_name');
        $search_email = request()->get('search_email');

        if(!empty(request()->get('search_first_name')) && !empty(request()->get('search_last_name')) && !empty(request()->get('search_email'))){
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('last_name', '=', $search_last_name)
                     ->where('email', '=', $search_email)
                     ->where('role_id','4')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_first_name')) && !empty(request()->get('search_last_name')))
        {
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('last_name', '=', $search_last_name)
                     ->where('role_id','4')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_first_name')) && !empty(request()->get('search_email')))
        {
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('email', '=', $search_email)
                     ->where('role_id','4')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_last_name')) && !empty(request()->get('search_email')))
        {
          $users = \DB::table('users')
                     ->where('last_name', '=', $search_last_name)
                     ->where('email', '=', $search_email)
                     ->where('role_id','4')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_first_name')))
        {
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('role_id','4')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_last_name')))
        {
          $users = \DB::table('users')
                     ->where('last_name', '=', $search_last_name)
                     ->where('role_id','4')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_email')))
        {
          $users = \DB::table('users')
                     ->where('email', '=', $search_email)
                     ->where('role_id','4')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);
        }else{
            $users = User::select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','parent_id'])->where('role_id','4')->paginate(10);
        }
        return view('admin.user-vendor.users.children-index',compact('users')); 
    }

    /**********************************
    |   Unable/Disable Upload Invoice
    |**********************************/
    public function enable_inv_status(Request $request){
      $id = $request->id;
      $st = User::find($id);
      $st->enable_inovice = $request->enable_inovice;   
      $st->save();

      return \Redirect::back()->with('success','Status updated successfully.');
    }

    /*********************************
    |   Linked Coaches 
    |*********************************/
    public function linked_coaches()
    {
        $parentCoachReq = ParentCoachReq::orderBy('id','desc')->paginate(10);
        return view('admin.user-vendor.users.linked-coach',compact('parentCoachReq')); 
    }

    /*********************************
    |   Subscribed Users
    |*********************************/
    public function subscribed_users()
    {
        $subscribed_users = NewsletterSubscription::orderBy('id','desc')->paginate(10);
        return view('admin.user-vendor.subscribed-users.newsletter',compact('subscribed_users')); 
    }

    /********************************
    |   Unsubscribe Users
    |********************************/
    public function unsubscribed_users($id)
    {
        $unsubscribed_user = NewsletterSubscription::where('id',$id)->first();
        $unsubscribed_user->status = 0;
        $unsubscribed_user->unsubscribed_by = \Auth::user()->id;
        $unsubscribed_user->save();

        $user_email = $unsubscribed_user->email;

        // Mail to user
        \Mail::send('emails.newsletter.unsubscribe', ['user_email' => $user_email] , 
             function($message) use($user_email){
                 $message->to($user_email);
                 $message->subject('Subject : '.'Unsubscribe By Admin');
               });

        return \Redirect::back()->with('success',$user_email.' email is unsubscribed successfully.');
    }

    /********************************
    |   Purchased Courses List
    |********************************/
    public function change_course_list()
    {
        $purchase_course = \DB::table('shop_cart_items')->where('shop_type','course')->where('orderID','!=',NULL)->where('type','order')->paginate(10);
        return view('admin.change-course.move-child-list',compact('purchase_course')); 
    }

    /*********************************
    |   Changed Course
    |*********************************/
    public function change_course($id)
    {
        $shop_cart_items = \DB::table('shop_cart_items')->where('id',$id)->first(); 
        return view('admin.change-course.change-course',compact('shop_cart_items')); 
    }

    /*********************************
    |   Save Changed Course
    |*********************************/
    public function save_change_course(Request $request)
    {
        $validatedData = $request->validate([
            'payment_method' => ['required'],
            'course' => ['required']
        ]);

        if($request->old_course_id == $request->course)
        {
            return \Redirect::back()->with('error','Purchased course is similiar to recently assigned course.');
        }
        else
        {
            $shop = \DB::table('shop_cart_items')->where('id',$request->shop_id)->first();
            \DB::table('shop_cart_items')->where('id',$request->shop_id)->delete();
            \DB::table('shop_orders')->where('orderID',$shop->orderID)->delete();

            $course = Course::where('id',$request->course)->first();
            
            $shop                =  new ShopCartItems;
            $shop->shop_type     =  'course';
            $shop->product_id    =  $request->course;
            $shop->child_id      =  $request->player_id;
            $shop->user_id       =  $request->parent_id;
            $shop->quantity      =  1;
            $shop->price         =  $course->price;
            $shop->total         =  $course->price;
            $shop->course_season =  $course->season;
            $shop->vendor_id     =  1;
            $shop->orderID       =  '#DRHSHOP'.strtotime(date('y-m-d h:i:s'));
            $shop->type          =  'order';
            $shop->manual        =  1;
            $shop->save();

            $order               =  new ShopOrder;
            $order->orderID      =  $shop->orderID;
            $order->user_id      =  $shop->user_id;
            $order->amount       =  $shop->price;
            $order->payment_by   =  $request->payment_method;
            $order->status       =  1;
            $order->manual       =  1;
            $order->save();

            ShopCartItems::where('orderID',$order->orderID)->update(array('order_id' => $order->id));

            $player_name = getUsername($request->player_id);
            $course_name = getCourseName($shop->product_id);

            $purchase_course = \DB::table('shop_cart_items')->where('shop_type','course')->where('orderID','!=',NULL)->where('type','order')->paginate(10);

            return redirect('/admin/shop/'.$shop->id.'/change-course')->with('success','Course has been changed successfully. Now, '.$course_name.' is assigned to '.$player_name);
        }
    } 
}
