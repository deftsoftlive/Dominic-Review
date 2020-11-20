   <!-- Price table starts here -->
   <tr>
      <td style="padding: 10px;">
         <table align="center" cellpadding="0" cellspacing="0" width="100%" style= "border-collapse: collapse;">
            <tr>
               <td style=" "></td>
               <td style="padding:10px; background: #f6f6f6;width: 300px;">
                  <table align="center" cellpadding="0" cellspacing="0" width="100%" style= "border-collapse: collapse; background: #f6f6f6; text-align: left;">
                     <tbody>
                        <tr>
                           <td width="100%" style="font-family: Verdana, 'Times New Roman', Arial; vertical-align: top; font-size: 20px; text-transform: uppercase;padding: 10px 0px; text-align: left; color:#36496c;font-weight: 600;">
                              ORDER TOTALS
                           </td>
                        </tr>
                        <tr>
                           <td style="">
                              <table style="width: 400px; background: #f6f6f6;">
                                 <tbody>
                                    <tr>
                                       <th style="font-family: Verdana, 'Times New Roman', Arial; vertical-align: top; font-size: 14px; padding-top:4px; padding-bottom: 4px; color: #606060;">Payment Method</th>
                                       <td style="font-family: Verdana, 'Times New Roman', Arial;padding-top:4px; padding-bottom: 4px; vertical-align: top; font-size: 14px; font-weight: bold color: #000;">
                                          <strong>{{$order->payment_by}}</strong>
                                       </td>
                                    </tr>
                                    <!-- <tr>
                                       <th style="font-family: Verdana, 'Times New Roman', Arial; vertical-align: top; font-size: 14px; padding-top:4px; padding-bottom: 4px; color: #606060;">Cart Subtotal</th>
                                       <td style="font-family: Verdana, 'Times New Roman', Arial;padding-top:4px; padding-bottom: 4px; vertical-align: top; font-size: 14px; font-weight: bold color: #000;">
                                          <strong>£{{custom_format($order->orderItems->sum('total'),2)}}</strong>
                                       </td>
                                    </tr>
                                  -->


                                   @php $extra = $order->getPaymentDetails(); @endphp
                                     
                                   <!--  <tr>
                                       <th style="font-family: Verdana, 'Times New Roman', Arial; vertical-align: top; font-size: 14px; padding-top:4px; padding-bottom: 15px; color: #606060;">Service Fee</th>
                                       <td style="font-family: Verdana, 'Times New Roman', Arial;padding-top:4px; padding-bottom: 15px; vertical-align: top; font-size: 14px; font-weight: bold color: #000;">
                                          <strong> + £{{custom_format($extra['service'],2)}}</strong>
                                       </td>
                                    </tr> -->


                                    <!--   <tr>
                                       <th style="font-family: Verdana, 'Times New Roman', Arial; vertical-align: top; font-size: 14px; padding-top:4px; padding-bottom: 15px; color: #606060;">Tax</th>
                                       <td style="font-family: Verdana, 'Times New Roman', Arial;padding-top:4px; padding-bottom: 15px; vertical-align: top; font-size: 14px; font-weight: bold color: #000;">
                                          <strong> + £{{custom_format($extra['tax'],2)}}</strong>
                                       </td>
                                    </tr> -->
                                    
                                   


                                    <tr>
                                       <th style="font-family: Verdana, 'Times New Roman', Arial; vertical-align: top; font-size: 18px; padding-top:4px; padding-bottom: 4px; color: #606060; border-top: 1px solid #d1d1d1;">Order Total</th>
                                       <td style="font-family: Verdana, 'Times New Roman', Arial; border-top: 1px solid #d1d1d1;padding-top:4px; padding-bottom: 4px; vertical-align: top; font-size: 18px; font-weight: bold color: #000;">
                                          <strong>£{{custom_format($order->amount,2)}}</strong>
                                       </td>
                                    </tr>

                                   
                                 </tbody>
                              </table>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </td>
            </tr>
            <tr>
            	<td style="  "></td>
            	<td style="padding:10px; background: #001642;width: 300px;">
            		<table align="center" cellpadding="0" cellspacing="0" width="100%" style= "border-collapse: collapse;">
            			<tr>
            				<td style="font-family: Verdana, 'Times New Roman', Arial; padding-top: 10px; padding-bottom: 10px; vertical-align:middle; font-size: 18px; color: #fff; text-align:center;">Thank you for your purchase </td>
            			</tr>
            		</table>
            	</td>
            </tr>

            <tr>
               <td style="  "></td>
               <td style="padding:10px; color: #001642;width: 300px;"><a target="_blank" href="{{url('/contact')}}">Got a question about your purchase? - Contact us!</a></td>
            </tr>

            <br/>
          
         </table>
      </td>
   </tr>