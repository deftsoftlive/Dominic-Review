<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\CoachDocument;
use App\ParentCoachReq;
use App\Course;
use App\ChildrenDetail;
use App\ChildContact;
use App\ChildActivity;
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
    |   Add course for player
    |********************************/
    public function add_course_for_player()
    {
       return view('admin.change-course.add-course',compact('purchase_course')); 
    }

    /********************************
    |   Save course for player
    |********************************/
    public function save_course_for_player(Request $request)
    {

        $validatedData = $request->validate([
            'parent' => ['required'],
            'cost_type' => ['required'],
            'course' => ['required']
        ]);

        $course = Course::where('id',$request->course)->first();

        if($request->cost_type == 'No Cost')
        {
            $price = 0;
            $total = 0;
            $payment_method = '-';
        }
        else{
            $price = $course->price;
            $total = $course->price;
            $payment_method = $request->payment_method;
        }


        $check_shop = ShopCartItems::where('product_id',$request->course)->where('user_id',$request->parent)->where('child_id',$request->player)->where('shop_type','course')->where('type','order')->first();

        if(!empty($check_shop))
        {
            $purchase_course = \DB::table('shop_cart_items')->where('shop_type','course')->where('orderID','!=',NULL)->where('type','order')->paginate(10);
            return \Redirect::back()->with('error',$course->title.' cousrse is already assigned to this child.'); 
        }else{

            if(!empty($request->player))
            {
                $player = $request->player;
            }else{
                $player = $request->parent;
            }

            $shop                =  new ShopCartItems;
            $shop->shop_type     =  'course';
            $shop->product_id    =  $request->course;
            $shop->child_id      =  $player;
            $shop->user_id       =  $request->parent;
            $shop->quantity      =  1;
            $shop->price         =  $price;
            $shop->total         =  $price;
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
            $order->payment_by   =  $payment_method;
            $order->status       =  1;
            $order->manual       =  1;
            $order->save();

            ShopCartItems::where('orderID',$order->orderID)->update(array('order_id' => $order->id));
            return \Redirect::back()->with('success','Course has been assigned to player successfully.'); 
        }
        
    }

    /*********************************
    |   Parent player linking
    |*********************************/
    public function parent_player_linking(Request $request)
    {
        $parent = $request->parent; 
        $player = User::where('parent_id',$parent)->get(); 

        if(count($player) > 0)
        {
          $output = '<option selected disabled value="">Please Select</option>';
          // $output = '';

          foreach($player as $sh)
          {
                $output .= '<option value="'.$sh->id.'">'.$sh->name.'</option>';
          }
        }else{
                $output .= '';
        }

        $data = array(
            'option'   => $output,
        );

        echo json_encode($data);
        }

    /********************************
    |   Purchased Courses List
    |********************************/
    public function change_course_list()
    {
        $type = request()->get('player_name');

        if(!empty($type))
        {
            $purchase_course = \DB::table('shop_cart_items')
                            ->join('users', 'shop_cart_items.child_id', '=', 'users.id')
                            ->select('shop_cart_items.*','users.name')  
                            ->where('shop_cart_items.shop_type','course')
                            ->where('shop_cart_items.orderID','!=',NULL)
                            ->where('shop_cart_items.type','order')   
                            ->where('users.name', 'LIKE', '%' . $type . '%') 
                            ->orderBy('users.name','asc')
                            ->paginate(10);

        }else{
            $purchase_course = \DB::table('shop_cart_items')
                            ->join('users', 'shop_cart_items.child_id', '=', 'users.id')
                            ->select('shop_cart_items.*','users.name')  
                            ->where('shop_cart_items.shop_type','course')
                            ->where('shop_cart_items.orderID','!=',NULL)
                            ->where('shop_cart_items.type','order')   
                            ->orderBy('users.name','asc')
                            ->paginate(10);
        }
        // dd($purchase_course);
        
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
    |   Delete Course & player data
    |*********************************/
    public function delete_course($id)
    {
        $shop = \DB::table('shop_cart_items')->where('id',$id)->first();
        \DB::table('shop_cart_items')->where('id',$id)->delete();
        \DB::table('shop_orders')->where('orderID',$shop->orderID)->delete();

        $purchase_course = \DB::table('shop_cart_items')
                            ->join('users', 'shop_cart_items.child_id', '=', 'users.id')
                            ->select('shop_cart_items.*','users.name')  
                            ->where('shop_cart_items.shop_type','course')
                            ->where('shop_cart_items.orderID','!=',NULL)
                            ->where('shop_cart_items.type','order')   
                            ->orderBy('users.name','asc')
                            ->paginate(10);

        return redirect('/admin/purchased-course')->with('purchase_course',$purchase_course)->with("success",'Player removed successfully.'); 
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

    /*********************************
    |   Family Member Overview
    |*********************************/
    public function family_member_overview($id)
    {
        $user = User::where('id',$id)->first();  
        $user_details = ChildrenDetail::where('child_id',$id)->first();
        $user_contacts = ChildContact::where('child_id',$id)->get();

        // dd($user,$user_details,$user_contacts); 

        return view('admin.user-vendor.users.family-member-overview',compact('user','user_details','user_contacts'));
    }

    /*********************************
    |   Family Member Overview
    |*********************************/
    public function admin_add_family_member()
    {
        $activities = ChildActivity::orderBy('id','asc')->get();  
        return view('admin.user-vendor.users.edit-family-member',compact('activities'));
    }

    /*------------------------------------------
    | Add Family Member - Participant Details
    |-------------------------------------------*/
    public function participants_details(Request $request)
    {   
        // dd($request->all());
        
        if($request->type == 'Adult')
        {
          $first_name = $request->first_name;
          $last_name = $request->last_name;
          $gender = $request->gender;
          $date_of_birth = $request->date_of_birth;
          $address = $request->address;
          $town = $request->town;
          $postcode = $request->postcode;
          $county = $request->county;
          $country = $request->country;
          $relation = $request->relation;
          $book_person = $request->book_person;
          $language = $request->language1;
          $primary_language = $request->primary_language1;
          $school = $request->school;
          // $show_name = $request->show_name;
        }
        elseif($request->type == 'Child')
        {
          $first_name = $request->first_name1;
          $last_name = $request->last_name1;
          $gender = $request->gender1;
          $date_of_birth = $request->date_of_birth1;
          $address = $request->address1;
          $town = $request->town1;
          $postcode = $request->postcode1;
          $county = $request->county1;
          $country = $request->country1;
          $relation = $request->relation1;
          $book_person = $request->book_person1;
          $language = $request->language1;
          $primary_language = $request->primary_language1;
          $school = $request->school1;
          // $show_name = $request->show_name1;
        }

        // dd($first_name,$book_person,$language,$primary_language);

        $check_child = User::where('id',$request->user_id)->first();

        if(!empty($check_child))
        {
          $add_family               =    User::find($request->user_id);
          $add_family->role_id      =    $request->role_id;
          $add_family->name         =    $first_name.' '.$last_name;
          $add_family->first_name   =    $first_name;
          $add_family->last_name    =    $last_name;
          $add_family->gender       =    $gender;
          $add_family->date_of_birth=    $date_of_birth;
          $add_family->address      =    $address;
          $add_family->town         =    $town;
          $add_family->postcode     =    $postcode;
          $add_family->county       =    $county;
          $add_family->country      =    $country;
          $add_family->relation     =    $relation;
          $add_family->type         =    $request->type;
          $add_family->book_person  =    $book_person;
          // $add_family->show_name    =    $show_name;
          $add_family->tennis_club  =    isset($request->tennis_club) ? $request->tennis_club : '';
          $add_family->email_verified_at = '';

          //dd($add_family);
          $add_family->save(); 

          ChildrenDetail::where('child_id',$request->user_id)->update(array('core_lang' => $language, 'school' => $school, 'primary_language' => $primary_language));

        }else{
          $add_family               =    new User;
          $add_family->role_id      =    $request->role_id;
          $add_family->name         =    $first_name.' '.$last_name;
          $add_family->first_name   =    $first_name;
          $add_family->last_name    =    $last_name;
          $add_family->gender       =    $gender;
          $add_family->date_of_birth=    $date_of_birth;
          $add_family->address      =    $address;
          $add_family->town         =    $town;
          $add_family->postcode     =    $postcode;
          $add_family->county       =    $county;
          $add_family->country      =    $country;
          $add_family->parent_id    =    \Auth::user()->id; 
          $add_family->relation     =    $relation;
          $add_family->type         =    $request->type;
          $add_family->book_person  =    $book_person;
          // $add_family->show_name    =    $show_name;
          $add_family->tennis_club  =    isset($request->tennis_club) ? $request->tennis_club : '';
          $add_family->email_verified_at = '';
          $add_family->save(); 

          $mem_detail = ChildrenDetail::create($request->all()); 
          $mem_detail->parent_id = $add_family->parent_id;
          $mem_detail->child_id = $add_family->id;
          $mem_detail->core_lang = $language;
          $mem_detail->school = $school;
          $mem_detail->primary_language = $primary_language;
          $mem_detail->save();
        }
        
        $last_user_id = $add_family->id;

        return redirect('/admin/family-member/add?user='.$last_user_id)->with('last_user_id', $last_user_id)->with('success','Participant Details added successfully.');
    }

    /*------------------------------------------
    | Add Family Member - Contact Details
    |-------------------------------------------*/
    public function contact_information(Request $request)
    {
      // dd($request->all());
      if($request->type == 'Child')
      {
        if(count($request->contact)>0)
        {
          ChildContact::where('child_id',$request->child_id)->delete();

          foreach($request->contact as $key=>$value)
          {
            $child_con = new ChildContact;
            $child_con->child_id = $request->child_id;
            $child_con->type = $request->type;
            $child_con->first_name = $value['con_first_name'];
            $child_con->surname = $value['con_last_name'];
            $child_con->phone = $value['con_phone'];
            $child_con->email = $value['con_email'];
            $child_con->relationship = $value['con_relation'];
            $child_con->who_are_they = $value['who_are_they'];
            $child_con->save();
          }
        }
      }elseif($request->type == 'Adult')
      {
        if(count($request->contact)>0)
        {
          ChildContact::where('child_id',$request->child_id)->delete();

          foreach($request->contact1 as $key1=>$value1)
          {
            $child_con = new ChildContact;
            $child_con->child_id = $request->child_id;
            $child_con->type = $request->type;
            $child_con->first_name = $value1['con_first_name1'];
            $child_con->surname = $value1['con_last_name1'];
            $child_con->phone = $value1['con_phone1'];
            $child_con->email = $value1['con_email1'];
            $child_con->relationship = $value1['con_relation1'];
            $child_con->who_are_they = $value1['who_are_they1'];
            $child_con->save();
          }
        }
      }

      $last_user_id = $request->child_id;

      return redirect('/admin/family-member/add?user='.$last_user_id)->with('last_user_id', $last_user_id)->with('success','Contact Information added successfully.');
    }

    /*--------------------------------------------------
    | Add Family Member - Medical & Behavioural Details
    |---------------------------------------------------*/
    public function medical_information(Request $request)
    {
      // dd($request->all());

      if($request->type == 'Adult')
      {
        $med_cond = $request->med_cond;
      }
      elseif($request->type == 'Child')
      {
        $med_cond = $request->med_cond1;
      }

      if($request->type == 'Adult')
      {
        $med_cond_info = json_encode($request->med_cond_info); 
        ChildrenDetail::where('child_id',$request->child_id)->update(array('med_cond' => $med_cond, 'med_cond_info' => $med_cond_info)); 
      }
      elseif($request->type == 'Child')
      {
        $med_cond_info = json_encode($request->med_cond_info); 
        $allergies_info = json_encode($request->allergies_info); 

        ChildrenDetail::where('child_id',$request->child_id)->update(array('med_cond' => $med_cond, 'allergies' => $request->allergies, 'allergies_info' => $allergies_info, 'med_cond_info' => $med_cond_info, 'pres_med' => $request->pres_med, 'pres_med_info' => $request->pres_med_info, 'med_req' => $request->med_req, 'med_req_info' => $request->med_req_info, 'toilet' => $request->toilet, 'beh_need' => $request->beh_need, 'beh_need_info' => $request->beh_need_info)); 
      }
      
      $last_user_id = $request->child_id;

      return redirect('/admin/family-member/add?user='.$last_user_id)->with('last_user_id', $last_user_id)->with('success','Medical & Behavioural Information added successfully.');

    }

    /*--------------------------------------------------
    | Add Family Member - Media Consents
    |---------------------------------------------------*/
    public function media_consent(Request $request)
    {
        ChildrenDetail::where('child_id',$request->child_id)->update(array('media' => $request->media_consent, 'confirm' => $request->confirm)); 

        $last_user_id = $request->child_id;

        return redirect('/admin/family-member/add?user='.$last_user_id)->with('last_user_id', $last_user_id)->with('success','Media Consents added successfully.');
    }

    /*----------------------------------------
    |   Delete Family Member
    |----------------------------------------*/
    public function delete_family_member($id) 
    {   
      if(!empty($id))
      {
        $u_id = base64_decode($id);
        $acc = User::find($u_id);
        $acc->delete();

        ChildrenDetail::where('child_id',$u_id)->delete();
        ChildContact::where('child_id',$u_id)->delete();
      }
      
      $user = User::where('id',\Auth::user()->id)->first(); 
      $children = User::where('role_id',4)->where('parent_id', '=', \Auth::user()->id)->get(); 
      return redirect('/admin/my-family')->with('children',$user)->with('user',$user)->with('success','Family Member has been deleted successfully!');
    }

}
