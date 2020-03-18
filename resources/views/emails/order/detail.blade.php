         <!-- info table starts here -->
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
                                                   <td style="font-family: Verdana, 'Times New Roman', Arial; font-size: 14px; line-height: 18px; color: #0c0c0c; padding-top: 10px; padding-bottom: 10px; font-weight: 600; background-color: #efefef; padding-left: 10px; padding-right: 10px;" align="left">Package</td>
                                                   <td style="font-family: Verdana, 'Times New Roman', Arial; font-size: 14px; line-height: 18px; color: #0c0c0c; padding-top: 10px; padding-bottom: 10px; font-weight: 600; background-color: #efefef; padding-left: 10px; padding-right: 10px;" align="left">Addons</td>
                                                   <td style="font-family: Verdana, 'Times New Roman', Arial; font-size: 14px; line-height: 18px; color: #0c0c0c; padding-top: 10px; padding-bottom: 10px; font-weight: 600; background-color: #efefef; padding-left: 10px; padding-right: 10px;" align="left">Price</td>
                                                </tr>






@foreach($order as $item)
                             






      <tr>
         <td style="font-family: Verdana, 'Times New Roman', Arial; vertical-align:top;font-size: 14px; line-height: 22px; color: #0c0c0c; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px; width: 70px;" ><img src="{{url('/email-template/images/event-img.png')}}" width="70"></td>
         <td style="font-family: Verdana, 'Times New Roman', Arial;vertical-align:top; font-size: 14px; line-height: 22px; color: #0c0c0c; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;">
            <p style="color: #333; font-weight:bold; margin-top: 0px; margin-bottom: 5px;  font-size: 16px; font-family: Verdana, 'Times New Roman', Arial;">{{$item->event->title}}</p>
            <span style="color: #333;  font-size: 14px; font-family: Verdana, 'Times New Roman', Arial;">
             <b>Vendor:</b> {{$item->vendor->title}}
           </span>
            <p style="color: #333; font-weight:600; margin-top: 0px; margin-bottom: 5px;  font-size: 14px; font-family: Verdana, 'Times New Roman', Arial;">
             <span style="color: #333;  font-size: 14px; font-family: Verdana, 'Times New Roman', Arial;">
             <b>Package:</b> {{$item->package->title}}
           </span>
            </p>

            <p style="color: #333; font-weight:600; margin-top: 0px; margin-bottom: 5px;  font-size: 14px; font-family: Verdana, 'Times New Roman', Arial;">

               <p style="line-height: 18px;padding: 0;margin: 0;color: #333;font-size: 12px;">
                 <b>Amount : </b> ${{custom_format($item->package->price,2)}}
               </p>

               @if($item->addon_price > 0)
               <p style="line-height: 18px;padding: 0;margin: 0;color: #333;font-size: 12px;">
                 <b>Addons : </b> ${{custom_format($item->addon_price,2)}}
               </p>
               @endif

                <p style="line-height: 22px;padding: 0;margin: 0;color: #333;font-size: 16px;font-weight: 600;">
                 <b>Total : </b> ${{custom_format(($item->package->price + $item->addon_price),2)}}
               </p>
                           
                                @if($item->discount > 0 &&  $item->discounted_price < $item->package->price && $item->deal != null && $item->deal->count() > 0) 
                                    <del class="main-price">${{custom_format($item->package->price + $item->addon_price,2)}}</del> 
                                  @endif
                         ${{custom_format($item->discounted_price,2)}} 
                           
                             
                 @if($item->discount > 0 && $item->deal != null && $item->deal->count() > 0)
                   <p style="line-height: 18px;padding: 0;margin: 0;color: #3e3e3e;font-size: 12px;">
                     {!! dealInfoInCart($item) !!}
                    </p>
                 @endif
                   
            </p>
         </td>
         <td style="font-family: Verdana, 'Times New Roman', Arial;vertical-align:top; font-size: 14px; line-height: 22px; color: #0c0c0c; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;">
            <!-- Addons table -->
            <table align="center" cellpadding="0" cellspacing="0" width="100%" style= "border-collapse: collapse;">
               <tbody>

                @if($item->addons !="")
                    {!!addonsInEMail($item)!!}
                @endif
                 
                   
               </tbody>
            </table>
            
         </td>
         <td align="top" style="font-family: Verdana, 'Times New Roman', Arial; vertical-align: top; font-size: 16px; font-weight: bold; line-height: 22px; color: #0c0c0c; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;">${{custom_format($item->discounted_price,2)}}</td>
      </tr>
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
                        <!-- info table ends here -->