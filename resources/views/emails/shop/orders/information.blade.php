         <!-- info table starts here -->
                        <tr>
                           <td style="padding-left: 10px; padding-right: 10px; padding-bottom: 30px;">
                              <table align="center" cellpadding="0" cellspacing="0" width="100%" style= "border-collapse: collapse; border: 1px solid #efefef;">
                                 <tbody>
                                    <tr>
                                       <td width="100%" style="vertical-align: top;">
                                          <table align="center" cellpadding="0" cellspacing="0" width="100%" style= "border-collapse: collapse;">
<tbody>
<!-- <tr>
   <td style="font-family: Verdana, 'Times New Roman', Arial; font-size: 14px; line-height: 18px; color: #0c0c0c; padding-top: 10px; padding-bottom: 10px; font-weight: 600; background-color: #efefef; padding-left: 10px; padding-right: 10px;" align="left">Image</td>
   <td style="font-family: Verdana, 'Times New Roman', Arial; font-size: 14px; line-height: 18px; color: #0c0c0c; padding-top: 10px; padding-bottom: 10px; font-weight: 600; background-color: #efefef; padding-left: 10px; padding-right: 10px;" align="left">Product</td>
   <td style="font-family: Verdana, 'Times New Roman', Arial; font-size: 14px; line-height: 18px; color: #0c0c0c; padding-top: 10px; padding-bottom: 10px; font-weight: 600; background-color: #efefef; padding-left: 10px; padding-right: 10px;" align="left">Quantity</td>
   <td style="font-family: Verdana, 'Times New Roman', Arial; font-size: 14px; line-height: 18px; color: #0c0c0c; padding-top: 10px; padding-bottom: 10px; font-weight: 600; background-color: #efefef; padding-left: 10px; padding-right: 10px;" align="left">Price</td>
</tr> -->



@php 
  $shop = DB::table('shop_cart_items')->where('orderID',$orders->orderID)->where('type','order')->get();
@endphp


@foreach($shop as $item)

@if($item->shop_type == 'course')
@php 
  $course_id = $item->product_id;
  $course = DB::table('courses')->where('id',$course_id)->first();  
  $child = DB::table('users')->where('id',$item->child_id)->first();
@endphp

      <br/> <br/> <br/>

      <tr>
         <td colspan="2" style="border-bottom:2px solid #fff; font-family: Verdana, 'Times New Roman', Arial; font-size: 14px; line-height: 18px; color: #0c0c0c; padding-top: 10px; padding-bottom: 10px; font-weight: 600; background-color: #efefef; padding-left: 10px; padding-right: 10px; padding-top: 10px;" align="left">Course Name</td>
           <td colspan="2" style="border-bottom:2px solid #fff; font-family: Verdana, 'Times New Roman', Arial; font-size: 14px; line-height: 18px; color: #0c0c0c; padding-top: 10px; padding-bottom: 10px; font-weight: 200; background-color: #efefef; padding-left: 10px; padding-right: 10px;" align="left">{{isset($course->title) ? $course->title : '-' }}</td>
      </tr>
    
      <tr>
         <td colspan="2" style="border-bottom:2px solid #fff; font-family: Verdana, 'Times New Roman', Arial; font-size: 14px; line-height: 18px; color: #0c0c0c; padding-top: 10px; padding-bottom: 10px; font-weight: 600; background-color: #efefef; padding-left: 10px; padding-right: 10px;" align="left">Venue</td>
           <td colspan="2" style="border-bottom:2px solid #fff; font-family: Verdana, 'Times New Roman', Arial; font-size: 14px; line-height: 18px; color: #0c0c0c; padding-top: 10px; padding-bottom: 10px; font-weight: 200; background-color: #efefef; padding-left: 10px; padding-right: 10px;" align="left">{{isset($course->location) ? $course->location : '-' }}</td>
      </tr>

      <tr>
         <td colspan="2" style="border-bottom:2px solid #fff; font-family: Verdana, 'Times New Roman', Arial; font-size: 14px; line-height: 18px; color: #0c0c0c; padding-top: 10px; padding-bottom: 10px; font-weight: 600; background-color: #efefef; padding-left: 10px; padding-right: 10px;" align="left">Day Time</td>
            <td colspan="2" style="border-bottom:2px solid #fff; font-family: Verdana, 'Times New Roman', Arial; font-size: 14px; line-height: 18px; color: #0c0c0c; padding-top: 10px; padding-bottom: 10px; font-weight: 200; background-color: #efefef; padding-left: 10px; padding-right: 10px;" align="left">{{isset($course->day_time) ? $course->day_time : '-' }}</td>    
      </tr>

      <tr>
         <td colspan="2" style="border-bottom:2px solid #fff; font-family: Verdana, 'Times New Roman', Arial; font-size: 14px; line-height: 18px; color: #0c0c0c; padding-top: 10px; padding-bottom: 10px; font-weight: 600; background-color: #efefef; padding-left: 10px; padding-right: 10px;" align="left">Age Group</td>
            <td colspan="2" style="border-bottom:2px solid #fff; font-family: Verdana, 'Times New Roman', Arial; font-size: 14px; line-height: 18px; color: #0c0c0c; padding-top: 10px; padding-bottom: 10px; font-weight: 200; background-color: #efefef; padding-left: 10px; padding-right: 10px;" align="left">{{isset($course->age_group) ? $course->age_group : '-' }}</td>    
      </tr>

      <tr>
         <td colspan="2" style="border-bottom:4px solid #3f4c67; font-family: Verdana, 'Times New Roman', Arial; font-size: 14px; line-height: 18px; color: #0c0c0c; padding-top: 10px; padding-bottom: 10px; font-weight: 600; background-color: #efefef; padding-left: 10px; padding-right: 10px;" align="left">More Info</td>
            <td colspan="2" style="border-bottom:4px solid #3f4c67; font-family: Verdana, 'Times New Roman', Arial; font-size: 14px; line-height: 18px; color: #0c0c0c; padding-top: 10px; padding-bottom: 10px; font-weight: 200; background-color: #efefef; padding-left: 10px; padding-right: 10px;" align="left">{!!isset($course->more_info) ? $course->more_info : '-' !!}</td>    
      </tr>


      <tr>
         <td colspan="2" style="border-bottom:4px solid #3f4c67; font-family: Verdana, 'Times New Roman', Arial; font-size: 14px; line-height: 18px; color: #0c0c0c; padding-top: 10px; padding-bottom: 10px; font-weight: 600; background-color: #efefef; padding-left: 10px; padding-right: 10px;" align="left">Further Info</td>
            <td colspan="2" style="border-bottom:4px solid #3f4c67; font-family: Verdana, 'Times New Roman', Arial; font-size: 14px; line-height: 18px; color: #0c0c0c; padding-top: 10px; padding-bottom: 10px; font-weight: 200; background-color: #efefef; padding-left: 10px; padding-right: 10px;" align="left">{!!isset($course->info_email_content) ? $course->info_email_content : '-' !!}</td>    
      </tr>

@elseif($item->shop_type == 'camp')

@php 
  $camp_id = $item->product_id;
  $camp = DB::table('camps')->where('id',$camp_id)->first();  
  $child = DB::table('users')->where('id',$item->child_id)->first();
@endphp

      <br/> <br/> <br/>

      <tr>
         <td colspan="2" style="border-bottom:2px solid #fff; font-family: Verdana, 'Times New Roman', Arial; font-size: 14px; line-height: 18px; color: #0c0c0c; padding-top: 10px; padding-bottom: 10px; font-weight: 600; background-color: #efefef; padding-left: 10px; padding-right: 10px; padding-top: 10px;" align="left">Camp Name</td>
           <td colspan="2" style="border-bottom:2px solid #fff; font-family: Verdana, 'Times New Roman', Arial; font-size: 14px; line-height: 18px; color: #0c0c0c; padding-top: 10px; padding-bottom: 10px; font-weight: 200; background-color: #efefef; padding-left: 10px; padding-right: 10px;" align="left">{{isset($camp->title) ? $camp->title : '-' }}</td>
      </tr>
    
      <tr>
         <td colspan="2" style="border-bottom:2px solid #fff; font-family: Verdana, 'Times New Roman', Arial; font-size: 14px; line-height: 18px; color: #0c0c0c; padding-top: 10px; padding-bottom: 10px; font-weight: 600; background-color: #efefef; padding-left: 10px; padding-right: 10px;" align="left">Camp Location</td>
           <td colspan="2" style="border-bottom:2px solid #fff; font-family: Verdana, 'Times New Roman', Arial; font-size: 14px; line-height: 18px; color: #0c0c0c; padding-top: 10px; padding-bottom: 10px; font-weight: 200; background-color: #efefef; padding-left: 10px; padding-right: 10px;" align="left">{{isset($camp->location) ? $camp->location : '-' }}</td>
      </tr>

      <tr>
         <td colspan="2" style="border-bottom:2px solid #fff; font-family: Verdana, 'Times New Roman', Arial; font-size: 14px; line-height: 18px; color: #0c0c0c; padding-top: 10px; padding-bottom: 10px; font-weight: 600; background-color: #efefef; padding-left: 10px; padding-right: 10px;" align="left">Description</td>
            <td colspan="2" style="border-bottom:2px solid #fff; font-family: Verdana, 'Times New Roman', Arial; font-size: 14px; line-height: 18px; color: #0c0c0c; padding-top: 10px; padding-bottom: 10px; font-weight: 200; background-color: #efefef; padding-left: 10px; padding-right: 10px;" align="left">{!!isset($camp->description) ? $camp->description : '-' !!}</td>    
      </tr>

      <tr>
         <td colspan="2" style="border-bottom:2px solid #fff; font-family: Verdana, 'Times New Roman', Arial; font-size: 14px; line-height: 18px; color: #0c0c0c; padding-top: 10px; padding-bottom: 10px; font-weight: 600; background-color: #efefef; padding-left: 10px; padding-right: 10px;" align="left">Usefull Info</td>
            <td colspan="2" style="border-bottom:2px solid #fff; font-family: Verdana, 'Times New Roman', Arial; font-size: 14px; line-height: 18px; color: #0c0c0c; padding-top: 10px; padding-bottom: 10px; font-weight: 200; background-color: #efefef; padding-left: 10px; padding-right: 10px;" align="left">{!!isset($camp->usefull_info) ? $camp->usefull_info : '-' !!}</td>    
      </tr>

      <tr>
         <td colspan="2" style="border-bottom:4px solid #3f4c67; font-family: Verdana, 'Times New Roman', Arial; font-size: 14px; line-height: 18px; color: #0c0c0c; padding-top: 10px; padding-bottom: 10px; font-weight: 600; background-color: #efefef; padding-left: 10px; padding-right: 10px;" align="left">Further Info</td>
            <td colspan="2" style="border-bottom:4px solid #3f4c67; font-family: Verdana, 'Times New Roman', Arial; font-size: 14px; line-height: 18px; color: #0c0c0c; padding-top: 10px; padding-bottom: 10px; font-weight: 200; background-color: #efefef; padding-left: 10px; padding-right: 10px;" align="left">{!!isset($camp->info_email_content) ? $camp->info_email_content : '-' !!}</td>    
      </tr>

@endif

<br/> <br/> <br/>
                                                 
@endforeach                                           
                          
                       </tbody>
                    </table>
                 </td>
              </tr>

           </tbody>
        </table>
     </td>
  </tr>
                        <!-- info table ends here -->