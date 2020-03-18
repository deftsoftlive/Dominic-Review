<?php
$page = App\Models\Vendors\CustomPackage::where('id',$arr->pkg);
$c = $page->first();
 
?>


@if($c->count() > 0)





<table align="left" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
      <tbody>
         <tr>
            <td>
               <table align="left" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                  <tbody>
                     <tr>
                        <td style="font-family: 'Maven Pro', sans-serif; font-size: 24px; line-height: 1; color: #333; border-left: 2px solid #36496c; padding-left: 10px;">Custom Package</td>
                     </tr>
                  </tbody>
               </table>
            </td>
         </tr>
         <tr>
            <td style="font-family: 'Maven Pro', sans-serif; font-size: 16px; line-height: 22px; color: #726c6c; padding-top: 10px;">
                   {{$c->title}}
             </td>
         </tr>
          
          <tr>
            <td style="font-family: 'Maven Pro', sans-serif; font-size: 16px; line-height: 22px; color: #726c6c; padding-top: 10px;">
                   {{$c->category->label}}
             </td>
         </tr>
         <tr>
            <td style="font-family: 'Maven Pro', sans-serif; font-size: 16px; line-height: 22px; color: #726c6c; padding-top: 10px;">
                 Guest Capacity <b>{{$c->min_person}} To {{$c->max_person}}</b>
             </td>
         </tr>
         <tr>
            <td style="font-family: 'Maven Pro', sans-serif; font-size: 16px; line-height: 22px; color: #726c6c; padding-top: 10px;">
                   <h1 class="cstmpkg-price">${{custom_format($c->price,2)}} / BUDGET</h1>
             </td>
         </tr>
           


     </tbody>
</table>


 



@endif


