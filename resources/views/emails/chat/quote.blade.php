 
<?php
 $msg = \App\Models\Vendors\ChatMessage::find($id);
 $arr = json_decode($msg->message);
 $request = (array)$arr->message;
 
$request_for = $request['request_for'] == 1 ? 'Pricing' : 'Custom Package';
$contact_type = $request['contact_type'] == 1 ? 'By Phone Call' : 'Via Email';
 
?>



<table align="left" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
      <tbody>
         <tr>
            <td>
               <table align="left" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                  <tbody>
                     <tr>
                        <td style="font-family: 'Maven Pro', sans-serif; font-size: 24px; line-height: 1; color: #333; border-left: 2px solid #36496c; padding-left: 10px;">Requested By:</td>
                     </tr>
                  </tbody>
               </table>
            </td>
         </tr>
         <tr>
            <td style="font-family: 'Maven Pro', sans-serif; font-size: 16px; line-height: 22px; color: #726c6c; padding-top: 10px;">By {{$request['name']}}</td>
         </tr>                                                
         <tr>
            <td style="font-family: 'Maven Pro', sans-serif; font-size: 16px; line-height: 22px; color: #726c6c; padding-top: 10px;">Requested for : {{$request_for}}</td>
         </tr>
         <tr>
            <td style="font-family: 'Maven Pro', sans-serif; font-size: 16px; line-height: 22px; color: #726c6c; padding-top: 10px;">Preferred Contact Method : {{$contact_type}}</td>
         </tr>
         <tr>
            <td style="font-family: 'Maven Pro', sans-serif; font-size: 16px; line-height: 22px; color: #726c6c; padding-top: 10px;">Phone: {{$request['phone_number']}}</td>
         </tr> 
         <tr>
            <td style="font-family: 'Maven Pro', sans-serif; font-size: 16px; line-height: 22px; color: #726c6c; padding-top: 10px;">Email: {{$request['email']}}</td>
         </tr> 
         <tr>
            <td style="font-family: 'Maven Pro', sans-serif; font-size: 16px; line-height: 22px; color: #726c6c; padding-top: 10px;">Email: admin@printgenie.com</td>
         </tr> 

         @if($request['request_for'] == 1) 
              <tr>
                 <td style="font-family: 'Maven Pro', sans-serif; font-size: 16px; line-height: 22px; color: #726c6c; padding-top: 10px;">Event Dated : {{$request['start_date']}}</td>
             </tr>
             <tr>
                 <td style="font-family: 'Maven Pro', sans-serif; font-size: 16px; line-height: 22px; color: #726c6c; padding-top:  10px;">Guest Capacity : {{$request['no_of_guest']}}</td>
             </tr>
         @endif

         <tr>
            <td style="font-family: 'Maven Pro', sans-serif; font-size: 16px; line-height: 22px; color: #726c6c; padding-top: 10px;">{{$request['message']}}</td>
         </tr>
        
      </tbody>
</table>




@if($arr->pkg > 0)
 @include('emails.chat.package')
@endif





<table align="left" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
      <tbody>
          <tr>
            <td style="padding-top: 20px;" align="left"><a href="{{url(route('myCategoryChat',[$msg->business->category->slug]))}}?chat_id={{$msg->chat_id}}" target="_blank" style="background-color: #36496c; color: #fff; text-transform: capitalize; padding-top: 12px; padding-right: 20px; padding-bottom: 12px; padding-left: 20px; text-decoration: none; display: inline-block; border-top-left-radius: 5px; border-top-right-radius: 5px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; font-family: 'Maven Pro', sans-serif; font-size: 14px; font-weight: 600; text-transform: uppercase;">View</a>
            </td>
         </tr>

   </tbody>
</table>





 