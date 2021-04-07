<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\User;
use App\CoachDocument;
use App\ParentCoachReq;
use App\Course;
use App\ChildrenDetail;
use App\ChildContact;
use App\ChildActivity;
use App\ChildMedical;
use App\ChildAllergy;
use App\CampPrice;
use App\Models\Shop\ShopCartItems;
use App\Models\Shop\ShopOrder;
use App\NewsletterSubscription;
use App\Models\Admin\EmailTemplate;
use App\Traits\EmailTraits\EmailNotificationTrait;

class UserController extends Controller
{

    use RegistersUsers;
    use EmailNotificationTrait;

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
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id','type'])
                     ->orderBy('id','desc')
                     ->paginate(50);

        }else if(!empty(request()->get('search_first_name')) && !empty(request()->get('search_last_name')))
        {
            $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('last_name', '=', $search_last_name)
                     ->where('role','!=','admin')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id','type'])
                     ->orderBy('id','desc')
                     ->paginate(50);

        }else if(!empty(request()->get('search_first_name')) && !empty(request()->get('search_email')))
        {
            $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('email', '=', $search_email)
                     ->where('role','!=','admin')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id','type'])
                     ->orderBy('id','desc')
                     ->paginate(50);

        }else if(!empty(request()->get('search_last_name')) && !empty(request()->get('search_email')))
        {
            $users = \DB::table('users')
                     ->where('last_name', '=', $search_last_name)
                     ->where('email', '=', $search_email)
                     ->where('role','!=','admin')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id','type'])
                     ->orderBy('id','desc')
                     ->paginate(50);

        }else if(!empty(request()->get('search_first_name')))
        {
            $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('role','!=','admin')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id','type'])
                     ->orderBy('id','desc')
                     ->paginate(50);

        }else if(!empty(request()->get('search_last_name')))
        {
            $users = \DB::table('users')
                     ->where('last_name', '=', $search_last_name)
                     ->where('role','!=','admin')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id','type'])
                     ->orderBy('id','desc')
                     ->paginate(50);

        }else if(!empty(request()->get('search_email')))
        {
            $users = \DB::table('users')
                     ->where('email', '=', $search_email)
                     ->where('role','!=','admin')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id','type'])
                     ->orderBy('id','desc')
                     ->paginate(50);
        }else{
            $users = User::select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id','type'])->where('role','!=','admin')->orderBy('id','desc')->paginate(50);
        }

        // dd($users);

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
        // $user->save(); 
        
        if($user->save())
        {
            $this->VerifyCoachAccountSuccess($user->id);
        }

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
        $user->name = $user->first_name.' '.$user->last_name;
        $user->save();

        $this->VerifyCoachAccountSuccess($user->id);

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
                     ->paginate(50);

        }else if(!empty(request()->get('search_first_name')) && !empty(request()->get('search_last_name')))
        {
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('last_name', '=', $search_last_name)
                     ->where('role_id','2')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(50);

        }else if(!empty(request()->get('search_first_name')) && !empty(request()->get('search_email')))
        {
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('email', '=', $search_email)
                     ->where('role_id','2')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(50);

        }else if(!empty(request()->get('search_last_name')) && !empty(request()->get('search_email')))
        {
          $users = \DB::table('users')
                     ->where('last_name', '=', $search_last_name)
                     ->where('email', '=', $search_email)
                     ->where('role_id','2')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(50);

        }else if(!empty(request()->get('search_first_name')))
        {
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('role_id','2')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(50);

        }else if(!empty(request()->get('search_last_name')))
        {
          $users = \DB::table('users')
                     ->where('last_name', '=', $search_last_name)
                     ->where('role_id','2')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(50);

        }else if(!empty(request()->get('search_email')))
        {
          $users = \DB::table('users')
                     ->where('email', '=', $search_email)
                     ->where('role_id','2')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(50);
        }else{
            $users = User::select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','type'])->where('role_id','2')->paginate(50);
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
                     ->paginate(50);

        }else if(!empty(request()->get('search_first_name')) && !empty(request()->get('search_last_name')))
        {
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('last_name', '=', $search_last_name)
                     ->where('role_id','3')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','enable_inovice','parent_id'])
                     ->paginate(50);

        }else if(!empty(request()->get('search_first_name')) && !empty(request()->get('search_email')))
        {
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('email', '=', $search_email)
                     ->where('role_id','3')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','enable_inovice','parent_id'])
                     ->paginate(50);

        }else if(!empty(request()->get('search_last_name')) && !empty(request()->get('search_email')))
        {
          $users = \DB::table('users')
                     ->where('last_name', '=', $search_last_name)
                     ->where('email', '=', $search_email)
                     ->where('role_id','3')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','enable_inovice','parent_id'])
                     ->paginate(50);

        }else if(!empty(request()->get('search_first_name')))
        {
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('role_id','3')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','enable_inovice','parent_id'])
                     ->paginate(50);

        }else if(!empty(request()->get('search_last_name')))
        {
          $users = \DB::table('users')
                     ->where('last_name', '=', $search_last_name)
                     ->where('role_id','3')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','enable_inovice','parent_id'])
                     ->paginate(50);

        }else if(!empty(request()->get('search_email')))
        {
          $users = \DB::table('users')
                     ->where('email', '=', $search_email)
                     ->where('role_id','3')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','enable_inovice','parent_id'])
                     ->paginate(50);
        }else{
            $users = User::select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','enable_inovice','country'])->where('role_id','3')->paginate(50);
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
                     ->paginate(50);

        }else if(!empty(request()->get('search_first_name')) && !empty(request()->get('search_last_name')))
        {
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('last_name', '=', $search_last_name)
                     ->where('role_id','4')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(50);

        }else if(!empty(request()->get('search_first_name')) && !empty(request()->get('search_email')))
        {
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('email', '=', $search_email)
                     ->where('role_id','4')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(50);

        }else if(!empty(request()->get('search_last_name')) && !empty(request()->get('search_email')))
        {
          $users = \DB::table('users')
                     ->where('last_name', '=', $search_last_name)
                     ->where('email', '=', $search_email)
                     ->where('role_id','4')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(50);

        }else if(!empty(request()->get('search_first_name')))
        {
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('role_id','4')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(50);

        }else if(!empty(request()->get('search_last_name')))
        {
          $users = \DB::table('users')
                     ->where('last_name', '=', $search_last_name)
                     ->where('role_id','4')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(50);

        }else if(!empty(request()->get('search_email')))
        {
          $users = \DB::table('users')
                     ->where('email', '=', $search_email)
                     ->where('role_id','4')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(50);
        }else{
            $users = User::select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','parent_id'])->where('role_id','4')->paginate(50);
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
        $parentCoachReq = ParentCoachReq::orderBy('id','desc')->paginate(50);
        return view('admin.user-vendor.users.linked-coach',compact('parentCoachReq')); 
    }

    /*********************************
    |   Subscribed Users
    |*********************************/
    public function subscribed_users()
    {
        $subscribed_users = NewsletterSubscription::orderBy('id','desc')->paginate(50);
        return view('admin.user-vendor.subscribed-users.newsletter',compact('subscribed_users')); 
    }

    public function active_subscribed_users()
    {
        $subscribed_users = NewsletterSubscription::orderBy('id','desc')->where('unsubscribed_by',NULL)->paginate(50);
        return view('admin.user-vendor.subscribed-users.subscribers',compact('subscribed_users')); 
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
       return view('admin.change-course.add-course'); 
    }

    /********************************
    |   Save course for player
    |********************************/
    public function save_course_for_player(Request $request)
    {
        //dd($request->all());

        if(!empty($request->parent) && !empty($request->course) && !empty($request->cost_type))
        {
            /*if ( $request->course_type == 'paygo' ) {
                $course = \App\PayGoCourse::where('id',$request->course)->first();
                $check_shop = ShopCartItems::where('product_id',$request->course)->where('user_id',$request->parent)->where('child_id',$request->player)->where('shop_type','paygo-course')->where('type','order')->first();
                $shop_type = 'paygo-course';
            }else{
                
                $course = Course::where('id',$request->course)->first();
                $check_shop = ShopCartItems::where('product_id',$request->course)->where('user_id',$request->parent)->where('child_id',$request->player)->where('shop_type','course')->where('type','order')->first();
                $shop_type = 'course';
            }*/
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
            $course = Course::where('id',$request->course)->first();
            $check_shop = ShopCartItems::where('product_id',$request->course)->where('user_id',$request->parent)->where('child_id',$request->player)->where('shop_type','course')->where('type','order')->first();
            $shop_type = 'course';
            //dd($payment_method);
            /*$check_shop = ShopCartItems::where('product_id',$request->course)->where('user_id',$request->parent)->where('child_id',$request->player)->where('shop_type','course')->where('type','order')->first();*/

            if(!empty($check_shop))
            {
                $purchase_course = \DB::table('shop_cart_items')->where('shop_type','course')->where('orderID','!=',NULL)->where('type','order')->paginate(50);
                return \Redirect::back()->with('error',$course->title.' course is already assigned to this child.'); 
            }else{

                if(!empty($request->player))
                {
                    $player = $request->player;
                }else{
                    $player = $request->parent;
                }

                $shop                =  new ShopCartItems;
                $shop->shop_type     =  $shop_type;
                $shop->product_id    =  $request->course;
                $shop->child_id      =  $player;
                $shop->user_id       =  $player;
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

        }else{
            return \Redirect::back()->with('error','Please fill the required fields.'); 
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
                            /*->where(function($q) { 
                                $q->where('shop_cart_items.shop_type', 'course') 
                                ->orWhere('shop_cart_items.shop_type', 'paygo-course'); 
                                })*/
                            ->where('shop_cart_items.orderID','!=',NULL)
                            ->where('shop_cart_items.type','order')   
                            ->where('users.name', 'LIKE', '%' . $type . '%') 
                            ->orderBy('users.name','asc')
                            ->paginate(50);

        }else{
            $purchase_course = \DB::table('shop_cart_items')
                            ->join('users', 'shop_cart_items.child_id', '=', 'users.id')
                            ->select('shop_cart_items.*','users.name')  
                            ->where('shop_cart_items.shop_type','course')
                            /*->where(function($q) { 
                                $q->where('shop_cart_items.shop_type', 'course') 
                                ->orWhere('shop_cart_items.shop_type', 'paygo-course'); 
                                })*/
                            ->where('shop_cart_items.orderID','!=',NULL)
                            ->where('shop_cart_items.type','order')   
                            ->orderBy('users.name','asc')
                            ->paginate(50);
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
                            ->paginate(50);

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

            $purchase_course = \DB::table('shop_cart_items')->where('shop_type','course')->where('orderID','!=',NULL)->where('type','order')->paginate(50);

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
        $user_medicals = ChildMedical::where('child_id',$id)->get();
        $user_allergies = ChildAllergy::where('child_id',$id)->get();

        // dd($user,$user_details,$user_contacts); 

        return view('admin.user-vendor.users.family-member-overview',compact('user','user_details','user_contacts','user_medicals','user_allergies'));
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
        if($request->type == 'Adult')
    {
      $first_name = $request->first_name;
      $last_name = $request->last_name;
      $gender = $request->gender1;
      $date_of_birth = $request->date_of_birth;
      $address = $request->address;
      $town = $request->town;
      $postcode = $request->postcode;
      $county = $request->county;
      $country = $request->country;
      $relation = $request->relation1;
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
    }else{
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
      // $add_family->date_of_birth=    $date_of_birth;
      $add_family->address      =    $address;
      $add_family->town         =    $town;
      $add_family->postcode     =    $postcode;
      $add_family->county       =    $county;
      $add_family->country      =    $country;
      $add_family->parent_id    =    \Auth::user()->id; 
      $add_family->relation     =    $relation;
      // $add_family->type         =    $request->type;
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
      // $add_family->date_of_birth=    $date_of_birth;
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
      if(!empty($request->contact))
        {
          if($request->type == 'Child')
          {
            if(count($request->contact)>0)
            {
              ChildContact::where('child_id',$request->child_id)->delete();

              foreach($request->contact as $key=>$value)
              {
                if($value['con_first_name'] == NULL || $value['con_last_name'] == NULL || $value['con_phone'] == NULL)
                {
                  $last_user_id = $request->child_id;
                  return redirect('/admin/family-member/add?user='.$last_user_id)->with('last_user_id', $last_user_id)->with('error','No contact information exist.');
                }else{
                  $child_con = new ChildContact;
                  $child_con->child_id = $request->child_id;
                  $child_con->type = $request->type;
                  $child_con->first_name = isset($value['con_first_name']) ? $value['con_first_name'] : '';
                  $child_con->surname = isset($value['con_last_name']) ? $value['con_last_name'] : '';
                  $child_con->phone = isset($value['con_phone']) ? $value['con_phone'] : '';
                  $child_con->email = isset($value['con_email']) ? $value['con_email'] : '';
                  $child_con->relationship = isset($value['con_relation']) ? $value['con_relation'] : '';
                  $child_con->who_are_they = isset($value['who_are_they']) ? $value['who_are_they'] : '';
                  $child_con->save();
                }
                
              }
            }
          }elseif($request->type == 'Adult')
          {
            if(isset($request->contact1) && count($request->contact1)>0)
            {
              ChildContact::where('child_id',$request->child_id)->delete();

              foreach($request->contact1 as $key1=>$value1)
              {

                if($value1['con_first_name1'] == NULL || $value1['con_last_name1'] == NULL || $value1['con_phone1'] == NULL)
                {
                  $last_user_id = $request->child_id;
                  return redirect('/admin/family-member/add?user='.$last_user_id)->with('last_user_id', $last_user_id)->with('error','No contact information exist.');
                }else{
                  $child_con = new ChildContact;
                  $child_con->child_id = $request->child_id;
                  $child_con->type = $request->type;
                  $child_con->first_name = isset($value1['con_first_name1']) ? $value1['con_first_name1'] : '';
                  $child_con->surname = isset($value1['con_last_name1']) ? $value1['con_last_name1'] : '';
                  $child_con->phone = isset($value1['con_phone1']) ? $value1['con_phone1'] : '';
                  $child_con->email = isset($value1['con_email1']) ? $value1['con_email1'] : '';
                  $child_con->relationship = isset($value1['con_relation1']) ? $value1['con_relation1'] : '';
                  $child_con->who_are_they = isset($value1['who_are_they1']) ? $value1['who_are_they1'] : '';
                  $child_con->save();
                }
              }
            }else if(isset($request->contact) && count($request->contact)>0){
              $last_user_id = $request->child_id;
                  return redirect('/admin/family-member/add?user='.$last_user_id)->with('last_user_id', $last_user_id)->with('error','No contact information exist.');
            }
          }

          $last_user_id = $request->child_id;

          return redirect('/admin/family-member/add?user='.$last_user_id)->with('last_user_id', $last_user_id)->with('success','Contact Information added successfully.');
        }
        else
        {
          $last_user_id = $request->child_id;
          return redirect('/admin/family-member/add?user='.$last_user_id)->with('last_user_id', $last_user_id)->with('error','No contact information exist.');
        }  
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

            if(isset($request->med_cond_info) && !empty($request->med_cond_info))
            {
              if(count($request->med_cond_info)>0)
              {
                ChildMedical::where('child_id',$request->child_id)->delete();

                if($request->med_cond_info != null)
                {
                  foreach($request->med_cond_info as $key=>$value)
                  {
                    $child_med = new ChildMedical;
                    $child_med->child_id = $request->child_id;
                    $child_med->type = $request->type;
                    $child_med->medical = $value; 
                    $child_med->save();
                  }
                }
              }

              ChildrenDetail::where('child_id',$request->child_id)->update(array('med_cond' => $med_cond, 'med_cond_info' => $med_cond_info)); 
            }
            else
            {
              $last_user_id = $request->child_id;

              return redirect('/admin/family-member/add?user='.$last_user_id)->with('last_user_id', $last_user_id)->with('error','No medical information exist.');
            }
            
          }
          elseif($request->type == 'Child')
          {
            $med_cond_info = json_encode($request->med_cond_info1); 
            $allergies_info = json_encode($request->allergies_info); 


            if(isset($request->pres_med) && isset($request->beh_need) && isset($request->allergies) && isset($med_cond) && isset($request->med_req))
            {
              if(count($request->med_cond_info)>0)
              {
                ChildMedical::where('child_id',$request->child_id)->delete();

                if($request->med_cond_info1 != null)
                {
                  foreach($request->med_cond_info1 as $key=>$value)
                  {
                    $child_med = new ChildMedical;
                    $child_med->child_id = $request->child_id;
                    $child_med->type = $request->type;
                    $child_med->medical = $value; 
                    $child_med->save();
                  }
                }
              }

              if(count($request->allergies_info)>0)
              {
                ChildAllergy::where('child_id',$request->child_id)->delete();

                if($request->allergies_info != null)
                {
                  foreach($request->allergies_info as $key1=>$value1)
                  {
                    $child_all = new ChildAllergy;
                    $child_all->child_id = $request->child_id;
                    $child_all->type = $request->type;
                    $child_all->allergy = $value1; 
                    $child_all->save();
                  }
                }
              }

              ChildrenDetail::where('child_id',$request->child_id)->update(array('med_cond' => $med_cond, 'allergies' => $request->allergies, 'allergies_info' => $allergies_info, 'med_cond_info' => $med_cond_info, 'pres_med' => $request->pres_med, 'pres_med_info' => $request->pres_med_info, 'med_req' => $request->med_req, 'med_req_info' => $request->med_req_info, 'toilet' => $request->toilet, 'beh_need' => $request->beh_need, 'beh_need_info' => $request->beh_need_info)); 
            
            }
            else
            {
              $last_user_id = $request->child_id;

              return redirect('/admin/family-member/add?user='.$last_user_id)->with('last_user_id', $last_user_id)->with('error','No medical information exist.');
            }
          
          }
          
          $last_user_id = $request->child_id;

          return redirect('/admin/family-member/add?user='.$last_user_id)->with('last_user_id', $last_user_id)->with('success','Medical & Behavioural Information added successfully.');

    }

    /*--------------------------------------------------
    | Add Family Member - Media Consents
    |---------------------------------------------------*/
    public function media_consent(Request $request)
    {
        if(!empty($request->confirm) && isset($request->confirm))
          {
            if($request->confirm == 'yes')
            {
              ChildrenDetail::where('child_id',$request->child_id)->update(array('media' => $request->media_consent, 'confirm' => $request->confirm)); 

              $last_user_id = $request->child_id;
              return redirect('/admin/family-member/add?user='.$last_user_id)->with('last_user_id', $last_user_id)->with('success','Media Consents added successfully.');
            }
            else{
              ChildrenDetail::where('child_id',$request->child_id)->update(array('media' => $request->media_consent, 'confirm' => $request->confirm)); 

              $last_user_id = $request->child_id;
              return redirect('/admin/family-member/add?user='.$last_user_id)->with('last_user_id', $last_user_id)->with('error','You will not be able to book this participant onto any DRH Sports activity if you select NO to this question.');
            }
            
          }else{
            $last_user_id = $request->child_id;

            return redirect('/admin/family-member/add?user='.$last_user_id)->with('last_user_id', $last_user_id)->with('error','Please confirm the details you have filled.');
        }
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

    /*------------------------------------------
    | Remove contact from Family member section
    |------------------------------------------*/
    public function remove_contact($id)
    {
      ChildContact::where('id',$id)->delete();

      return \Redirect::back()->with('success',' Contact removed successfully!');
    } 

    /*------------------------------------------
    | Remove medical from Family member section
    |------------------------------------------*/
    public function remove_medical($id)
    {
      ChildMedical::where('id',$id)->delete();

      return \Redirect::back()->with('success',' Medical condition removed successfully!');
    } 

    /*------------------------------------------
    | Remove allergy from Family member section
    |------------------------------------------*/
    public function remove_allergy($id)
    {
      ChildAllergy::where('id',$id)->delete();

      return \Redirect::back()->with('success',' Allergy condition removed successfully!');
    } 

    /*------------------------------------------
    | Account Holder Details
    |-------------------------------------------*/
    public function ah_account_holder($id) {
        $user = User::where('id',$id)->first();
        return view('admin.user-vendor.users.account-holder',compact('user'));
    } 

    /*------------------------------------------
    | Account Holder - Participant Details
    |-------------------------------------------*/
    public function ah_participants_details(Request $request)
    {   
        // dd($request->all());

        $check_child = User::where('id',$request->user_id)->first();

        if(!empty($check_child))
        {
          $add_family               =    User::find($request->user_id);
          $add_family->role_id      =    $request->role_id;
          $add_family->name         =    $request->first_name.' '.$request->last_name;
          $add_family->first_name   =    $request->first_name;
          $add_family->last_name    =    $request->last_name;
          $add_family->gender       =    $request->gender;
          $add_family->date_of_birth=    $request->date_of_birth;
          $add_family->address      =    $request->address;
          $add_family->town         =    $request->town;
          $add_family->postcode     =    $request->postcode;
          $add_family->county       =    $request->county;
          $add_family->country      =    $request->country;
          $add_family->parent_id    =    \Auth::user()->id; 
          $add_family->relation     =    $request->relation;
          $add_family->type         =    $request->type;
          $add_family->book_person  =    $request->book_person;
          // $add_family->show_name    =    $show_name;
          $add_family->tennis_club  =    isset($request->tennis_club) ? $request->tennis_club : '';
          $add_family->email_verified_at = '';

          //dd($add_family);
          $add_family->save(); 

          // ChildrenDetail::where('child_id',$request->user_id)->update(array('core_lang' => $language, 'school' => $school, 'primary_language' => $primary_language));

        }
        
        $last_user_id = $add_family->id;

        return redirect('/admin/account-holder/overview/'.$last_user_id)->with('last_user_id', $last_user_id)->with('success','Participant Details updated successfully.');
    }

    /*------------------------------------------
    | Account Holder - Contact Details
    |-------------------------------------------*/
    public function ah_contact_information(Request $request)
    {
      //dd($request->all());

      if(!empty($request->contact1))
      {
        if(isset($request->contact1) && count($request->contact1)>0)
        {
          ChildContact::where('child_id',$request->child_id)->delete();

          foreach($request->contact1 as $key1=>$value1)
          {
            if($value1['con_first_name1'] == NULL || $value1['con_last_name1'] == NULL || $value1['con_phone1'] == NULL)
            {
              $last_user_id = $request->child_id;
              return redirect('/admin/account-holder/overview/'.$last_user_id)->with('last_user_id', $last_user_id)->with('error','No contact information exist.');
            }else{
              $child_con = new ChildContact;
              $child_con->child_id = $request->child_id;
              $child_con->type = $request->type;
              $child_con->first_name = isset($value1['con_first_name1']) ? $value1['con_first_name1'] : '';
              $child_con->surname = isset($value1['con_last_name1']) ? $value1['con_last_name1'] : '';
              $child_con->phone = isset($value1['con_phone1']) ? $value1['con_phone1'] : '';
              $child_con->email = isset($value1['con_email1']) ? $value1['con_email1'] : '';
              $child_con->relationship = isset($value1['con_relation1']) ? $value1['con_relation1'] : '';
              $child_con->who_are_they = isset($value1['who_are_they1']) ? $value1['who_are_they1'] : '';
              $child_con->save();
            }
          }

        }
        else if(isset($request->contact) && count($request->contact)>0)
        {
          $last_user_id = $request->child_id;
              return redirect('/admin/account-holder/overview/'.$last_user_id)->with('last_user_id', $last_user_id)->with('error','No contact information exist.');
        }

        $ch = new ChildrenDetail;
        $ch->parent_id = $request->child_id;
        $ch->child_id = $request->child_id;
        $ch->save();

        $last_user_id = $request->child_id;

        return redirect('/admin/account-holder/overview/'.$last_user_id)->with('last_user_id', $last_user_id)->with('success','Contact Information added successfully.');
      }
      else
      {
        $last_user_id = $request->child_id;
        return redirect('/admin/account-holder/overview/'.$last_user_id)->with('last_user_id', $last_user_id)->with('error','No contact information exist.');
      }  
    }

    /*--------------------------------------------------
    | Account Holder - Media Consents
    |---------------------------------------------------*/
    public function ah_media_consent(Request $request)
    {   
      if(!empty($request->confirm) && isset($request->confirm))
      {
        if($request->confirm == 'yes')
        {
          ChildrenDetail::where('child_id',$request->child_id)->update(array('media' => $request->media_consent, 'confirm' => $request->confirm)); 

          $last_user_id = $request->child_id;
          return redirect('/admin/account-holder/overview/'.$last_user_id)->with('last_user_id', $last_user_id)->with('success','Media Consents added successfully.');
        }
        else{
          ChildrenDetail::where('child_id',$request->child_id)->update(array('media' => $request->media_consent, 'confirm' => $request->confirm)); 

          $last_user_id = $request->child_id;
          return redirect('/admin/account-holder/overview/'.$last_user_id)->with('last_user_id', $last_user_id)->with('error','You will not be able to book this participant onto any DRH Sports activity if you select NO to this question.');
        }
        
      }else{
        $last_user_id = $request->child_id;

        return redirect('/admin/account-holder/overview/'.$last_user_id)->with('last_user_id', $last_user_id)->with('error','Please confirm the details you have filled.');
      }
        
    }

    /*--------------------------------------------------
    | Account Holder - Medical & Behavioural Details
    |---------------------------------------------------*/
    public function ah_medical_information(Request $request)
    {
      // dd($request->all());

        $med_cond_info = json_encode($request->med_cond_info); 

        if(isset($request->med_cond_info) && !empty($request->med_cond_info))
        {
          if(count($request->med_cond_info)>0)
          {
            ChildMedical::where('child_id',$request->child_id)->delete();

            if($request->med_cond_info != null)
            {
              foreach($request->med_cond_info as $key=>$value)
              {
                $child_med = new ChildMedical;
                $child_med->child_id = $request->child_id;
                $child_med->type = $request->type;
                $child_med->medical = $value; 
                $child_med->save();
              }
            }
          }

          ChildrenDetail::where('child_id',$request->child_id)->update(array('med_cond' => $request->med_cond, 'med_cond_info' => $med_cond_info)); 
        }
        else
        {
          $last_user_id = $request->child_id;

          return redirect('/admin/account-holder/overview/'.$last_user_id)->with('last_user_id', $last_user_id)->with('error','No medical information exist.');
        }
      
      $last_user_id = $request->child_id;

      return redirect('/admin/account-holder/overview/'.$last_user_id)->with('last_user_id', $last_user_id)->with('success','Medical & Behavioural Information added successfully.');

    }


    /********************************
    |   Purchased Camp List
    |********************************/
    public function change_camp_list()
    {
        $type = request()->get('player_name');

        if(!empty($type))
        {
            $purchase_course = \DB::table('shop_cart_items')
                            ->join('users', 'shop_cart_items.child_id', '=', 'users.id')
                            ->select('shop_cart_items.*','users.name')  
                            ->where('shop_cart_items.shop_type','camp')
                            ->where('shop_cart_items.orderID','!=',NULL)
                            ->where('shop_cart_items.type','order')   
                            ->where('users.name', 'LIKE', '%' . $type . '%') 
                            ->orderBy('users.name','desc')
                            ->paginate(50);

        }else{
            $purchase_course = \DB::table('shop_cart_items')
                            ->join('users', 'shop_cart_items.child_id', '=', 'users.id')
                            ->select('shop_cart_items.*','users.name')  
                            ->where('shop_cart_items.shop_type','camp')
                            ->where('shop_cart_items.orderID','!=',NULL)
                            ->where('shop_cart_items.type','order')   
                            ->orderBy('users.name','desc')
                            ->paginate(50);
        }
        // dd($purchase_course);
        
        return view('admin.change-camp.move-child-list',compact('purchase_course')); 
    }

    /*********************************
    |   Changed Course
    |*********************************/
    public function change_camp($id)
    {
        $shop_cart_items = \DB::table('shop_cart_items')->where('id',$id)->first(); //dd($shop_cart_items);
        return view('admin.change-camp.change-camp',compact('shop_cart_items')); 
    }

    /*********************************
    |   Delete Course & player data
    |*********************************/
    public function delete_camp($id)
    {
        $shop = \DB::table('shop_cart_items')->where('id',$id)->first();
        \DB::table('shop_cart_items')->where('id',$id)->delete();
        \DB::table('shop_orders')->where('orderID',$shop->orderID)->delete();

        $purchase_course = \DB::table('shop_cart_items')
                            ->join('users', 'shop_cart_items.child_id', '=', 'users.id')
                            ->select('shop_cart_items.*','users.name')  
                            ->where('shop_cart_items.shop_type','camp')
                            ->where('shop_cart_items.orderID','!=',NULL)
                            ->where('shop_cart_items.type','order')   
                            ->orderBy('users.name','asc')
                            ->paginate(50);

        return redirect('/admin/purchased-camp')->with('purchase_course',$purchase_course)->with("success",'Player removed successfully.'); 
    }

    /*********************************
    |   Save changed camp
    |*********************************/
    public function save_change_camp(Request $request)
    {
        //dd($request->all());

        $validatedData = $request->validate([
            'payment_method' => ['required'],
            'camp_id' => ['required']
        ]);

        if($request->old_camp_id == $request->camp)
        {
            return \Redirect::back()->with('error','Purchased camp is similiar to recently assigned camp.');
        }
        else
        {
            $camp_id = $request->camp_id; 
            $week = $request->week; 
            $child = $request->player;   

            $camp_price = CampPrice::where('camp_id',$camp_id)->first();

            $early_price = $camp_price->early_price; 
            $early_percent = $camp_price->early_percent;

            $lunch_price = $camp_price->lunch_price;
            $lunch_percent = $camp_price->lunch_price;

            $fullday_price = $camp_price->fullday_price;
            $fullday_percent = $camp_price->fullday_percent;

            $latepickup_price = $camp_price->latepickup_price;
            $latepickup_percent = $camp_price->latepickup_price;

            $morning_price = $camp_price->morning_price;
            $morning_seats = $camp_price->morning_seats;
            $morning_percent = $camp_price->morning_percent;

            $afternoon_price = $camp_price->afternoon_price;
            $afternoon_seats = $camp_price->afternoon_seats;
            $afternoon_percent = $camp_price->afternoon_percent;

            $arrNewSku = array();
            $incI = 0;
            $count_early = array();
            $count_late_pickup = array();
            $count_lunch_club = array();

            $camp_morning = array();
            $camp_noon = array();
            $camp_full = array();

              if(isset($week))
              {
                foreach($week as $arrKey => $arrData){ 

                  if(isset($arrData['early_drop'])){  
                    $arrNewSku[$incI]['early_drop'] = isset($arrData['early_drop']) ? $arrData['early_drop'] : '';
                    $count_early[] = count($arrData['early_drop'])*$early_price;
                  }

                  if(isset($arrData['late_pickup'])){  
                    $arrNewSku[$incI]['late_pickup'] = isset($arrData['late_pickup']) ? $arrData['late_pickup'] : '';
                    $count_late_pickup[] = count($arrData['late_pickup'])*$latepickup_price;
                  }

                  if(isset($arrData['lunch'])){  
                    $arrNewSku[$incI]['lunch'] = isset($arrData['lunch']) ? $arrData['lunch'] : '';
                    $count_lunch_club[] = count($arrData['lunch'])*$lunch_price;
                  }

                  if(isset($arrData['camp']))
                  {  
                    $camp_data = array();;
                    foreach ($arrData['camp'] as $sku){ 
                      $camp_array = explode('-',$sku);
                      $camp_data[] = $camp_array[2];
                    }
                    $camp_counts = array_count_values($camp_data);
                    $camp_morning[] = (isset($camp_counts['mor']) ? $camp_counts['mor'] : 0)*$morning_price;
                    $camp_noon[] = (isset($camp_counts['noon']) ? $camp_counts['noon'] : 0)*$afternoon_price;
                    $camp_full[] = (isset($camp_counts['full']) ? $camp_counts['full'] : 0)*$fullday_price;
                  }

                    $incI++;
                }

                // dd($request->all(), $camp_morning,$camp_noon,$camp_full);

                $early_drop_price = isset($count_early) ? array_sum($count_early) : '';
                $late_pickup_price = isset($count_late_pickup) ? array_sum($count_late_pickup) : '';
                $lunch_club_price = isset($count_lunch_club) ? array_sum($count_lunch_club) : '';

                $morning_price = isset($camp_morning) ? array_sum($camp_morning) : '';
                $afternoon_price = isset($camp_noon) ? array_sum($camp_noon) : '';
                $fullweek_price = isset($camp_full) ? array_sum($camp_full) : '';

                // Add Prices 
                $add_price = $early_drop_price+$late_pickup_price+$lunch_club_price+$morning_price+$afternoon_price+$fullweek_price;

                $sel_week = json_encode($request->week);
            }
            // dd($request->all(),$sel_week);

            $shop = \DB::table('shop_cart_items')->where('id',$request->shop_id)->first();
            \DB::table('shop_cart_items')->where('id',$request->shop_id)->delete();
            \DB::table('shop_orders')->where('orderID',$shop->orderID)->delete();

            $course = Course::where('id',$request->course)->first();
            
            $add_course = new ShopCartItems;
            $add_course->shop_type  = 'camp';
            $add_course->quantity   = 1;
            $add_course->vendor_id  = 1;
            $add_course->product_id = $camp_id;
            $add_course->user_id    = $request->parent_id;
            $add_course->price      = $add_price;
            $add_course->total      = $add_price;
            $add_course->week       = $sel_week;
            $add_course->camp_price = $add_price;
            $add_course->child_id   = $child;
            $add_course->type       = 'order';
            $add_course->orderID    = '#DRHSHOP'.strtotime(date('y-m-d h:i:s'));
            $add_course->manual     = '1';
            $add_course->save();


            $so = new ShopOrder;
            $so->user_id = $add_course->user_id;
            $so->payment_by = isset($request->payment_method) ? $request->payment_method : '';
            $so->amount = $add_price;
            $so->orderID = $add_course->orderID;
            $so->status = 1;
            $so->save();

            ShopCartItems::where('orderID',$so->orderID)->update(array('order_id' => $so->id));

            $player_name = getUsername($request->player_id);
            $course_name = getCourseName($shop->product_id);

            $purchase_course = \DB::table('shop_cart_items')
                            ->join('users', 'shop_cart_items.child_id', '=', 'users.id')
                            ->select('shop_cart_items.*','users.name')  
                            ->where('shop_cart_items.shop_type','camp')
                            ->where('shop_cart_items.orderID','!=',NULL)
                            ->where('shop_cart_items.type','order')   
                            ->orderBy('users.name','desc')
                            ->paginate(50);

            return redirect('/admin/purchased-camp')->with('purchase_course',$purchase_course)->with('success','Camp has been changed successfully.');
        }
    } 


}
