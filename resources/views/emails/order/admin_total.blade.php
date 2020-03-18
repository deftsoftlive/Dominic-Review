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
                                                            <th style="font-family: Verdana, 'Times New Roman', Arial; vertical-align: top; font-size: 14px; padding-top:4px; padding-bottom: 4px; color: #606060;">Cart Subtotal</th>
                                                            <td style="font-family: Verdana, 'Times New Roman', Arial;padding-top:4px; padding-bottom: 4px; vertical-align: top; font-size: 14px; font-weight: bold color: #000;">
                                                               <strong>$1,030.00</strong>
                                                            </td>
                                                         </tr>
                                                       @if($order->sum('discount') > 0)
                                                       
                                                        <tr>
                                                            <th style="font-family: Verdana, 'Times New Roman', Arial; vertical-align: top; font-size: 14px; padding-top:4px; padding-bottom: 15px; color: #606060;">Discount</th>
                                                            <td style="font-family: Verdana, 'Times New Roman', Arial;padding-top:4px; padding-bottom: 15px; vertical-align: top; font-size: 14px; font-weight: bold color: #000;">
                                                               <strong>	- ${{custom_format($order->sum('discount'),2)}}</strong>
                                                            </td>
                                                         </tr>
                                                        
                                                       @endif  


                                                        <?php $extra = getOrderExtraFees($order);
                                                         $total = $order->sum('discounted_price') - ($extra['commission'] + $extra['service']);
                                                        ?>
                                                          
                                                         <tr>
                                                            <th style="font-family: Verdana, 'Times New Roman', Arial; vertical-align: top; font-size: 14px; padding-top:4px; padding-bottom: 15px; color: #606060;">Service Fee</th>
                                                            <td style="font-family: Verdana, 'Times New Roman', Arial;padding-top:4px; padding-bottom: 15px; vertical-align: top; font-size: 14px; font-weight: bold color: #000;">
                                                               <strong> + ${{custom_format($extra['service'],2)}}</strong>
                                                            </td>
                                                         </tr>

                                                          <tr>
                                                            <th style="font-family: Verdana, 'Times New Roman', Arial; vertical-align: top; font-size: 14px; padding-top:4px; padding-bottom: 15px; color: #606060;">Tax</th>
                                                            <td style="font-family: Verdana, 'Times New Roman', Arial;padding-top:4px; padding-bottom: 15px; vertical-align: top; font-size: 14px; font-weight: bold color: #000;">
                                                               <strong> + ${{custom_format($extra['tax'],2)}}</strong>
                                                            </td>
                                                         </tr>


                                                           

                                                         <tr>
                                                            <th style="font-family: Verdana, 'Times New Roman', Arial; vertical-align: top; font-size: 14px; padding-top:4px; padding-bottom: 15px; color: #606060;">Website Fee</th>
                                                            <td style="font-family: Verdana, 'Times New Roman', Arial;padding-top:4px; padding-bottom: 15px; vertical-align: top; font-size: 14px; font-weight: bold color: #000;">
                                                               <strong> + ${{custom_format($extra['commission'],2)}}</strong>
                                                            </td>
                                                         </tr>
                                                         
                                                        


                                                         <tr>
                                                            <th style="font-family: Verdana, 'Times New Roman', Arial; vertical-align: top; font-size: 18px; padding-top:4px; padding-bottom: 4px; color: #606060; border-top: 1px solid #d1d1d1;">Order Total</th>
                                                            <td style="font-family: Verdana, 'Times New Roman', Arial; border-top: 1px solid #d1d1d1;padding-top:4px; padding-bottom: 4px; vertical-align: top; font-size: 18px; font-weight: bold color: #000;">
                                                               <strong> ${{custom_format($o->amount,2)}}</strong>
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
                                 
                              </table>
                           </td>
                        </tr>