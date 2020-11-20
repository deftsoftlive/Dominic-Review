<h5>&nbsp;<b>Order ID</b> - {{$orders->orderID}}</h5> 

@php 
   $orders = DB::table('shop_cart_items')->where('orderID',$orders->orderID)->get(); 
@endphp

<br/>

<tr>
   <td style="padding-left: 10px; padding-right: 10px; padding-bottom: 30px;">
      <table align="center" cellpadding="0" cellspacing="0" width="100%" style= "border-collapse: collapse; border: 1px solid #efefef;">
         <tbody>
            <tr>
               <td width="100%" style="vertical-align: top;">
                  <table align="center" cellpadding="0" cellspacing="0" width="100%" style= "border-collapse: collapse;">
<tbody>
<tr>
   <td style="font-family: Verdana, 'Times New Roman', Arial; font-size: 14px; line-height: 18px; color: #0c0c0c; padding-top: 10px; padding-bottom: 10px; font-weight: 600; background-color: #efefef; padding-left: 10px; padding-right: 10px;" align="left">Image</td>
   <td style="font-family: Verdana, 'Times New Roman', Arial; font-size: 14px; line-height: 18px; color: #0c0c0c; padding-top: 10px; padding-bottom: 10px; font-weight: 600; background-color: #efefef; padding-left: 10px; padding-right: 10px;" align="left">Product</td>
   <td style="font-family: Verdana, 'Times New Roman', Arial; font-size: 14px; line-height: 18px; color: #0c0c0c; padding-top: 10px; padding-bottom: 10px; font-weight: 600; background-color: #efefef; padding-left: 10px; padding-right: 10px;" align="left">Quantity</td>
   <td style="font-family: Verdana, 'Times New Roman', Arial; font-size: 14px; line-height: 18px; color: #0c0c0c; padding-top: 10px; padding-bottom: 10px; font-weight: 600; background-color: #efefef; padding-left: 10px; padding-right: 10px;" align="left">Price</td>
</tr>



    

@foreach($orders as $item)

@if($item->shop_type == 'product')
@php  
    $product = $item->product_id; 
    $product_data = DB::table('products')->where('id',$item->product_id)->first();
    $variation = \App\Models\Products\ProductAssignedVariation::find($item->variant_id);
@endphp       

                
 
      <tr>
         <td style="font-family: Verdana, 'Times New Roman', Arial; vertical-align:top;font-size: 14px; line-height: 22px; color: #0c0c0c; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px; width: 70px;" >
             
         </td>
         <td style="font-family: Verdana, 'Times New Roman', Arial;vertical-align:top; font-size: 14px; line-height: 22px; color: #0c0c0c; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;">
            <p style="color: #333; font-weight:bold; margin-top: 0px; margin-bottom: 5px;  font-size: 16px; font-family: Verdana, 'Times New Roman', Arial;">Product Name - {{$product_data->name}}</p>
            <span style="color: #333;  font-size: 14px; font-family: Verdana, 'Times New Roman', Arial;">
              @if(!empty($item->voucher_code)) 
                <p><b>Voucher</b> - {{$item->voucher_code}}</p> 
              @endif
           </span>
           


            <p style="color: #333; font-weight:600; margin-top: 0px; margin-bottom: 5px;  font-size: 14px; font-family: Verdana, 'Times New Roman', Arial;">

               <p style="line-height: 18px;padding: 0;margin: 0;color: #333;font-size: 12px;">
                 <b>Price : </b> ${{custom_format($item->price,2)}}
               </p>

               
                @if(!empty($product_data) && $product_data->product_type == 1)
                  @foreach($variation->hasVariationAttributes as $v)
                    <p style="line-height: 18px;padding: 0;margin: 0;color: #333;font-size: 12px;">
                       <b>{{$v->parentVariation->variations->name}}: </b> {{$v->parentVariation->name}}
                    </p>
                  @endforeach
                @endif
            </p>
         </td>
         <td style="font-family: Verdana, 'Times New Roman', Arial;vertical-align:top; font-size: 14px; line-height: 22px; color: #0c0c0c; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;">
            <!-- Addons table -->
            {{$item->quantity}}
            
         </td>
         <td align="top" style="font-family: Verdana, 'Times New Roman', Arial; vertical-align: top; font-size: 16px; font-weight: bold; line-height: 22px; color: #0c0c0c; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;">£{{custom_format($item->total,2)}}</td>
      </tr>

@elseif($item->shop_type == 'course')
@php 
  $course_id = $item->product_id;
  $course = DB::table('courses')->where('id',$course_id)->first();  
  $child = DB::table('users')->where('id',$item->child_id)->first();
@endphp
      <tr>
         <td style="font-family: Verdana, 'Times New Roman', Arial; vertical-align:top;font-size: 14px; line-height: 22px; color: #0c0c0c; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px; width: 70px;" >
             Course - 
         </td>
         <td style="font-family: Verdana, 'Times New Roman', Arial;vertical-align:top; font-size: 14px; line-height: 22px; color: #0c0c0c; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;">
            <p style="color: #333; font-weight:bold; margin-top: 0px; margin-bottom: 5px;  font-size: 16px; font-family: Verdana, 'Times New Roman', Arial;">{{$course->title}}</p>
            <span style="color: #333;  font-size: 14px; font-family: Verdana, 'Times New Roman', Arial;">
             <b>Child:</b> {{$child->name}}
           </span>
           


            <p style="color: #333; font-weight:600; margin-top: 0px; margin-bottom: 5px;  font-size: 14px; font-family: Verdana, 'Times New Roman', Arial;">

               <p style="line-height: 18px;padding: 0;margin: 0;color: #333;font-size: 12px;">
                 <b>Price : </b> £{{custom_format($item->price,2)}}
               </p>

                   
            </p>
         </td>
         <td style="font-family: Verdana, 'Times New Roman', Arial;vertical-align:top; font-size: 14px; line-height: 22px; color: #0c0c0c; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;">
            <!-- Addons table -->
            {{$item->quantity}}
            
         </td>
         <td align="top" style="font-family: Verdana, 'Times New Roman', Arial; vertical-align: top; font-size: 16px; font-weight: bold; line-height: 22px; color: #0c0c0c; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;">£{{custom_format($item->total,2)}}</td>
      </tr>

@elseif($item->shop_type == 'camp')
@php 
  $camp_id = $item->product_id;
  $camp = DB::table('camps')->where('id',$camp_id)->first();  
  $child = DB::table('users')->where('id',$item->child_id)->first();
  $week = json_decode($item->week); 
@endphp
      <tr>
         <td style="font-family: Verdana, 'Times New Roman', Arial; vertical-align:top;font-size: 14px; line-height: 22px; color: #0c0c0c; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px; width: 70px;" >
             Camp - 
         </td>
         <td style="font-family: Verdana, 'Times New Roman', Arial;vertical-align:top; font-size: 14px; line-height: 22px; color: #0c0c0c; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;">
            <p style="color: #333; font-weight:bold; margin-top: 0px; margin-bottom: 5px;  font-size: 16px; font-family: Verdana, 'Times New Roman', Arial;">{{$camp->title}}</p>
            <span style="color: #333;  font-size: 14px; font-family: Verdana, 'Times New Roman', Arial;">
             <b>Child:</b> {{$child->name}}
             <p>
               @foreach($week as $number=>$number_array)

                    @foreach($number_array as $data=>$user_data)

                      @foreach($user_data as $data1=>$user_data1)
                        @php 
                          $split = explode('-',$user_data1);
                          $get_session = $split[2];
                        @endphp
                        @if($get_session == 'early')
                          {{$number}} - {{$data1}} - Early Drop Off<br/>
                        @elseif($get_session == 'mor')
                          {{$number}} - {{$data1}} - Morning<br/>
                        @elseif($get_session == 'noon')
                          {{$number}} - {{$data1}} - Afternoon<br/>
                        @elseif($get_session == 'lunch')
                          {{$number}} - {{$data1}} - Lunch Club<br/>
                        @elseif($get_session == 'late')
                          {{$number}} - {{$data1}} - Late Pickup<br/>
                        @elseif($get_session == 'full')
                          {{$number}} - {{$data1}} - Full Day<br/>
                        @endif
                      @endforeach
                    
                      @endforeach

                  @endforeach
             </p>
           </span>
           


            <p style="color: #333; font-weight:600; margin-top: 0px; margin-bottom: 5px;  font-size: 14px; font-family: Verdana, 'Times New Roman', Arial;">

               <p style="line-height: 18px;padding: 0;margin: 0;color: #333;font-size: 12px;">
                 <b>Price : </b> £{{custom_format($item->price,2)}}
               </p>

                   
            </p>
         </td>
         <td style="font-family: Verdana, 'Times New Roman', Arial;vertical-align:top; font-size: 14px; line-height: 22px; color: #0c0c0c; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;">
            <!-- Addons table -->
            {{$item->quantity}}
            
         </td>
         <td align="top" style="font-family: Verdana, 'Times New Roman', Arial; vertical-align: top; font-size: 16px; font-weight: bold; line-height: 22px; color: #0c0c0c; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;">£{{custom_format($item->total,2)}}</td>
      </tr>
@endif
      <!-- next row -->
                                                 
@endforeach                                           
                          
                       </tbody>
                    </table>
                 </td>
              </tr>

           </tbody>
        </table>
     </td>
  </tr>
                        <!-- info table ends here