  <tr style="background-color: #fff;">
     <td style="">
        <table align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
           <tbody>
              <tr>
                 <td style="background-color: #fff; padding-top: 10px;  padding-bottom: 10px; padding-left: 10px; padding-right: 10px; border-top-left-radius: 20px; border-top-right-radius: 20px; border-bottom-left-radius: 20px; border-bottom-right-radius: 20px;">
                    <table align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                       <tbody>
                          <tr>
                             <td style="text-align: center;"><img style="width:100%;" src="{{url('/email-template/images/invited.jpg')}}"></td>
                          </tr>
                       </tbody>
                    </table>
                 </td>
              </tr>
           </tbody>
        </table>
     </td>
  </tr>
  <!-- welcome text here -->

  <!-- welcome text here -->
  <tr style="background-color: #fff;">
     <td style="">
        <table align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
           <tbody>
              <tr>
                 <td style="background-color: #fff; padding-top: 30px;  padding-bottom: 30px; padding-left: 30px; padding-right: 30px; border-top-left-radius: 20px; border-top-right-radius: 20px; border-bottom-left-radius: 20px; border-bottom-right-radius: 20px;">
                    <table align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                       <tbody>
                          
                          <tr>
                             <td style="font-family: 'Maven Pro', sans-serif; font-size: 16px; line-height: 22px; color: #726c6c; padding-top: 5px;"> 
                                <p>Hello {{$name}},</p>
                                <br/>
                                <p>Your document: {{ $document_name }} created on {{ date( 'd-m-Y', strtotime( $created_at ) ) }} will expire on {{ date( 'd-m-Y', strtotime( $expire_on ) ) }}</p>
                                
                             </td>
                          </tr>
                          <tr>
                             <td style="font-family: 'Maven Pro', sans-serif; font-size: 16px; line-height: 22px; color: #726c6c; padding-top: 5px;"> 
                                <p>Thanks!</p></td>
                          </tr>
                       </tbody>
                    </table>
                 </td>
              </tr>
           </tbody>
        </table>
     </td>
  </tr>
  <!-- Ends here -->
  <!-- info table starts here -->
                         