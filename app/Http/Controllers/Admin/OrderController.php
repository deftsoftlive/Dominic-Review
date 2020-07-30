<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shop\ShopOrder;
use App\User;
use App\ChildcareVoucher;

class OrderController extends Controller
{
    
    public function index(Request $request)
    {
        $orders = Shoporder::orderBy('id','desc')->paginate(10);
    	return view('admin.orders.index',compact('orders'));
    }

    /*-----------------------------------------------
	|  Next Function starts
	|-----------------------------------------------*/	
    public function detail(Request $request,$id)
    {
    	$orders =Shoporder::find($id);
    	return view('admin.orders.detail')->with('order',$orders);
    }

    /*-----------------------------------------------
	|  Next Function starts
	|-----------------------------------------------*/	
	public function ajax()
	{
	 
		$events = \App\Models\Order::select(['id','orderID','amount', 'payment_by'])->orderBy('created_at','DESC')
		              ->get();

		return datatables()->of($events)
		->addColumn('action', function ($t) {
		return  $this->Actions($t);
		})
		
		->editColumn('amount',function($t){
		return '$'.$t->amount;
		})

		->make(true);
	}

	/*-----------------------------------------------
	|  Next Function starts
	|-----------------------------------------------*/
    public function Actions($data)
    {
            $text  ='<div class="btn-group">';
            $text .='<button type="button" class="btn btn-primary">Action</button>';
            $text .='<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">';
            $text .='<span class="caret"></span>';
            $text .='<span class="sr-only">Toggle Dropdown</span>';
            $text .='</button>';
            $text .='<div class="dropdown-menu" role="menu" x-placement="top-start" style="position: absolute; transform: translate3d(67px, -165px, 0px); top: 0px; left: 0px; will-change: transform;">';
          $url = url(route('admin.orderDetail',$data->id));
          $text .='<a href="'.$url.'" class="dropdown-item">Detail</a>';
            $text .='<div class="dropdown-divider"></div>';
            //$status=$data->status == 0 ? 'Active' : 'In-Active';
            //$text .='<a href="'.route('event_status',$data->slug).'" class="dropdown-item">'.$status.'</a>';

            $text .='</div>';
            $text .='</div>';

            return $text;
    }


    /*-----------------------------------------------
    |   Order PDF
    |-----------------------------------------------*/
    function get_order_data($order_id)
    {
        // Get Invoice notes
        $orders = \DB::table('shop_orders')->where('id',$order_id)->orderBy('id','DESC')->first(); 
        return $orders;
    }

    function order_pdf($order_id)
    {
        $pdf = \App::make('dompdf.wrapper'); 
        $pdf->loadHTML($this->convert_order_data_to_html($order_id));
        return $pdf->stream();
    }

    function convert_order_data_to_html($order_id)
    {
        $orders = $this->get_order_data($order_id); 
        $extra = getAllValueWithMeta('service_fee_amount', 'global-settings');
        $order_price = $orders->amount - $extra;

        $shipping_address = json_decode($orders->shipping_address);  
        $billing_address = json_decode($orders->billing_address); 
        $user_id = $orders->user_id;
        $user_details = User::where('id',$user_id)->first();

        if(!empty($orders->provider_id))
        {
          $provider = ChildcareVoucher::where('id',$orders->provider_id)->first();
        }
        $provider_name = isset($provider->provider_name) ? $provider->provider_name : '';


        $output = '<title>INVOICE</title> 
         <style>
    @page {
          margin: 0.5cm;
          }
</style>
        <table width="100%" style="border-collapse:collapse; ">
       
        <tbody>
        <tr>
            <td colspan="4">
                <table style="table-layout: fixed;width: 100%;border-collapse: collapse;"">

                        <tr>
                            <td  align="center"><img src="http://49.249.236.30:8654/dominic-new/public/uploads/1584078701website_logo.png" width="130px;" style="margin-bottom: 15px;">
                            </td>
                        </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <table style="table-layout: fixed;width: 100%;border-collapse: collapse;border:1px solid #011c49;margin-bottom: 20px;"> 
                    <tbody>
                        <tr>
                            <td colspan="2" style="background-color: #3f4d67;padding: 10px;color: #fff;font-size: 17px;font-family: "Open Sans", sans-serif;">Order Details</td>
                        </tr>
                        <tr>
                            <td>
                                <p style="padding: 0 10px;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;"><strong>Order ID : </strong>'.$orders->orderID.' </p>
                            </td>
                            <td>
                                <p style="padding: 0 10px;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;"><strong>Order Date : </strong>'.$orders->created_at.' </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p style="padding: 0 10px;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;"><strong>Order Amount : </strong>'.$order_price.' </p>
                            </td>
                            <td>
                                <p style="padding: 0 10px;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;"><strong>Payment Method : </strong>'.$orders->payment_by.' </p>
                            </td>
                        </tr>
                        <tr>
                        <td>';
                           
                        if(!empty($provider_name))   
                        {
                            $output .= '<p style="padding: 0 10px;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;"><strong>Provider Name : </strong>'.$provider_name.' </p>';  
                        } 

                        if(!empty($orders->transaction_details))
                        {
                            $transaction_details = explode(',',$orders->transaction_details); 
                            $tr_data = [];

                            foreach($transaction_details as $tr)
                            {
                                $tr1 = explode('- ',$tr); 
                                $tr0 = $tr1[0];
                                $tr1 = '&pound;'.$tr1[1];   
                                 $tr_data[] = $tr0.'- '.$tr1;
                            }
                            $payment_details = implode(',', $tr_data); 

                            $output .= '<p style="padding: 0 10px;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;"><strong>Payment Details : </strong>'.$payment_details.' </p>';
                        }
                        
                        $output .= '</td>
                                    <td>
                                    <p style="padding: 0 10px;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;"></p>
                                </td>

                            </tr>
                    </tbody>

                </table>
            </td>
        </tr> 
            <tr>
                <td colspan="4">
                    <table style="table-layout: fixed;width: 100%;border-collapse: collapse;border:1px solid #011c49;margin-bottom: 20px;"> 
                        <tbody>
                            <tr>
                                <td colspan="3" style="background-color: #3f4d67;padding: 10px;color: #fff;font-size: 17px;font-family: "Open Sans", sans-serif;">User Details</td>
                            </tr>
                            <tr>
                                <td>
                                    <p style="padding: 10px;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;"><strong>Name : </strong>'.$user_details->name.' </p>
                                </td>
                                <td>
                                    <p style="padding: 10px;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;"><strong>Email : </strong>'.$user_details->email.' </p>
                                </td>
                                <td>
                                    <p style="padding: 10px;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;"><strong>Phone No. : </strong>'.$user_details->phone_number.' </p>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </td>
            </tr>';

            $order_ID = $orders->orderID;
            $cart_items = \DB::table('shop_cart_items')->where('orderID',$order_ID)->get();
            $shop_type = array(); 
            foreach($cart_items as $sh){
                $shop_type[] = $sh->shop_type;
            }

            if (in_array('product', $shop_type, TRUE)){ 

            $output .= '<tr>
                <td colspan="4">
                    <table style="table-layout: fixed;width: 100%;border-collapse: collapse;border:1px solid #011c49;margin-bottom: 20px;">
                        <tbody>
                            <tr>
                                <td style="background-color: #3f4d67;padding: 10px;color: #fff;font-size: 17px;font-family: "Open Sans", sans-serif;">Shipping Address</td>
                                <td style="background-color: #3f4d67;padding: 10px;color: #fff;font-size: 17px;font-family: "Open Sans", sans-serif;">Billing Address</td>
                            </tr>
                            <tr>
                                <td style="border:1px solid #011c49;">
                                    <p style="padding:15px 10px 5px 10px;margin:0;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;"><strong>Name : </strong>'.$shipping_address->name.'</p>
                                    <p style="padding: 5px 10px;margin:0;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;"><strong>Email : </strong>'.$shipping_address->email.'</p>
                                    <p style="padding: 5px 10px;margin:0;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;"><strong>Phone : Number</strong>'.$shipping_address->phone_number.'</p>
                                    <p style="padding: 5px 10px 25px 10px;margin:0;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;"><strong>Address : </strong>'.$shipping_address->address.', '.$shipping_address->country.', '.$shipping_address->state.', '.$shipping_address->city.', Zipcode- '.$shipping_address->zipcode.'</p>
                                </td>
                                <td style="border:1px solid #011c49;">
                                    <p style="padding:15px 10px 5px 10px;margin:0;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;"><strong>Name : </strong>'.$billing_address->name.'</p>
                                    <p style="padding: 5px 10px;margin:0;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;"><strong>Email : </strong>'.$billing_address->email.'</p>
                                    <p style="padding: 5px 10px;margin:0;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;"><strong>Phone : Number</strong>'.$billing_address->phone_number.'</p>
                                    <p style="padding:  5px 10px 25px 10px;margin:0;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;"><strong>Address : </strong>'.$billing_address->address.', '.$billing_address->country.', '.$billing_address->country.', '.$billing_address->state.', Zipcode- '.$billing_address->zipcode.'</p>
                                </td>
                            </tr>
                        </tbody> 
                    </table>
                </td>
            </tr>';

            }

            $output .='<tr>
                <td colspan="4">
                    <table style="table-layout: fixed;width: 100%;border-collapse: collapse;border:1px solid #011c49;">
                        <tbody>

                            <tr>
                                <td style="background-color: #3f4d67;width:16%; padding: 10px;color: #fff;font-size: 17px;font-family: "Open Sans", sans-serif;">Order Type</td>
                                <td style="background-color: #3f4d67;width:28%;padding: 10px;color: #fff;font-size: 17px;font-family: "Open Sans", sans-serif;">Item Purchased</td>
                                <td style="background-color: #3f4d67;width:18%;padding: 10px;color: #fff;font-size: 17px;font-family: "Open Sans", sans-serif;">Participant</td>
                                <td style="background-color: #3f4d67;width:28%;padding: 10px;color: #fff;font-size: 17px;font-family: "Open Sans", sans-serif;">Details</td>
                                <td style="background-color: #3f4d67;width:10%;padding: 10px;color: #fff;font-size: 17px;font-family: "Open Sans", sans-serif;">Price</td>
                            </tr>';

                            $orderID = $orders->orderID;
                            $cart = \DB::table('shop_cart_items')->where('orderID',$orderID)->get();

                            foreach($cart as $ca){ 
                            if($ca->shop_type == 'product')
                            {
                                $product = \DB::table('products')->where('id',$ca->product_id)->first();

                                $variation = \App\Models\Products\ProductAssignedVariation::find($ca->variant_id);

                            $output .= '<tr>
                                <td style="padding:  10px;border-bottom:1px solid #3f4d67;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;">'.$ca->shop_type.'</td>
                                <td style="padding:  10px;border-bottom:1px solid #3f4d67;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;">'.$product->name.'</td>
                                <td style="padding:  10px;border-bottom:1px solid #3f4d67;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;"></td>
                                <td style="padding:  10px;border-bottom:1px solid #3f4d67;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;">';

                                if($product->product_type == 1)
                                {
                                    foreach($variation->hasVariationAttributes as $v)
                                    {
                                        $output .= $v->parentVariation->variations->name.': 
                                              <b class="bText">'.$v->parentVariation->name.'</b><br/>';
                                    }
                                }

                            $output .= '</td>
                                <td style="padding:  10px;border-bottom:1px solid #3f4d67;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;">&pound;'.$ca->total.'</td>
                            </tr>';

                            }
                            elseif($ca->shop_type == 'course')
                            {
                                $child_id = $ca->child_id;
                                $user = \DB::table('users')->where('id',$child_id)->first();
                                $course = \DB::table('courses')->where('id',$ca->product_id)->first();

                            $output .= '<tr>
                                <td style="padding:  10px;border-bottom:1px solid #3f4d67;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;">'.$ca->shop_type.'</td>
                                <td style="padding:  10px;border-bottom:1px solid #3f4d67;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;">'.$course->title.'</td>
                                <td style="padding:  10px;border-bottom:1px solid #3f4d67;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;">'.$user->name.'</td>
                                <td style="padding:  10px;border-bottom:1px solid #3f4d67;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;">'.$course->term;   

                            $output .= '<td style="padding:  10px;border-bottom:1px solid #3f4d67;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;">&pound;'.$ca->total.'</td>
                            </tr>';
                            }
                            elseif($ca->shop_type == 'camp')
                            {
                                $child_id = $ca->child_id;
                                $user = \DB::table('users')->where('id',$child_id)->first();
                                $camp = \DB::table('camps')->where('id',$ca->product_id)->first();
                                $week = json_decode($ca->week);

                            $output .= '<tr><td style="padding:  10px;border-bottom:1px solid #3f4d67;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;">'.$ca->shop_type.'</td>
                                <td style="padding:  10px;color: #000;border-bottom:1px solid #3f4d67;font-size: 15px;font-family: "Open Sans", sans-serif;">'.$camp->title.'</td>
                                <td style="padding:  10px;color: #000;border-bottom:1px solid #3f4d67;font-size: 15px;font-family: "Open Sans", sans-serif;">'.$user->name.'</td>';

                            $output .='<td style="padding:  10px;border-bottom:1px solid #3f4d67;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;">';   

                            foreach($week as $number=>$number_array)
                            {
                                foreach($number_array as $data=>$user_data)
                                {
                                  foreach($user_data as $data1=>$user_data1){
                                   
                                      $split = explode('-',$user_data1);
                                      $get_session = $split[2];
                                    
                                    if($get_session == 'early'){
                                    $output .= '<p>'.$number.' - '.$data1.' - Early Drop Off<br/>';
                                    }
                                    elseif($get_session == 'mor'){
                                    $output .= '<p>'.$number.' - '.$data1.' - Morning<br/>';
                                    }
                                    elseif($get_session == 'noon'){
                                    $output .= '<p>'.$number.' - '.$data1.' - Afternoon<br/>';
                                    }
                                    elseif($get_session == 'lunch'){
                                    $output .= '<p>'.$number.' - '.$data1.' - Lunch Club<br/>';
                                    }
                                    elseif($get_session == 'late'){
                                    $output .= '<p>'.$number.' - '.$data1.' - Late Pickup<br/>';
                                    }
                                    elseif($get_session == 'full'){
                                    $output .= '<p>'.$number.' - '.$data1.' - Full Day<br/>';
                                    }
                                    
                                  }
                                
                                }

                              }

                            $output .= '
                                <td style="padding:  10px;border-bottom:1px solid #3f4d67;color: #000;font-size: 15px;font-family: "Open Sans", sans-serif;">&pound;'.$ca->total.'</td>
                            </tr>';
                            }
                        }

                        $output .= '</tbody>
                    </table>
                </td>
            </tr>

            <tr>
                <td></td>
                <td></td> 
                <td colspan="2">
                    <table style="table-layout: fixed;width:100%; border-collapse: collapse;border:1px solid #011c49; margin-top: 20px; ">
                        <tbody>
                            <tr>
                                <td style="background-color: #3f4d67;padding: 10px;color: #fff;font-size: 17px;font-family: "Open Sans", sans-serif;">Cart Subtotal</td>
                                <td style="padding:  10px;color: #000;font-size: 17px;font-family: "Open Sans", sans-serif;">£ '.$order_price.'</td>
                            </tr>';

                            if($extra > 0){
                            $output .= '<tr>
                                <td style="background-color: #3f4d67;padding: 10px;color: #fff;font-size: 17px;font-family: "Open Sans", sans-serif;">Service Fee</td>
                                <td style="padding:  10px;color: #000;font-size: 17px;font-family: "Open Sans", sans-serif;">+ &pound;'.$extra.'</td>
                            </tr>';
                        }
                            $output .= '<tr>
                                <td style="background-color: #3f4d67;padding: 10px;color: #fff;font-size: 19px;font-family: "Open Sans", sans-serif;"> Order Total </td>
                                <td style="padding:  10px;color: #000;font-size: 19px;font-family: "Open Sans", sans-serif;"> £ <strong>'.$orders->amount.'</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>

        </tbody>';
 
        $output .= '</table>';
        return $output;
    '</div>';
    }
}
