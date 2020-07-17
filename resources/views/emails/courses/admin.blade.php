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
                             <td style="font-family: 'Maven Pro', sans-serif; font-size: 16px; line-height: 22px; color: #726c6c; padding-top: 10px;"> 
                                <p>Hello Admin,</p>
                                <p>DRH Sports!</p>
                                <br/>
                                @if($type == 'course')
                                  <p>"<strong>{{$participant_name}}</strong>" is requested for taster class with following information:</p>
                                  <p>Participant Name - {{$participant_name}}</p>
                                  <p>Participant DOB - {{$participant_dob}}</p>
                                  <p>Participant Gender - {{$participant_gender}}</p>
                                  <p>Parent Name - {{$parent_name}}</p>
                                  <p>Parent Email - {{$parent_email}}</p>
                                  <p>Parent Telephone - {{$parent_telephone}}</p>
                                  <p>Class - {{$class}}</p>
                                @elseif($type == 'contact') 
                                  <p>"<strong>{{$participant_name}}</strong>" is requested to contact DRH Sports:</p>
                                  <p>Name - {{$participant_name}}</p>
                                  <p>Email - {{$parent_email}}</p>
                                  <p>Telephone - {{$parent_telephone}}</p>
                                  <p>Subject - {{$subject}}</p>
                                  <p>Message - {{$contact_message}}</p>
                                @endif
                             </td>
                          </tr>
                          <tr>
                             <td style="padding-top: 20px;" align="left">
                                <a href="{{url(route('register'))}}" target="_blank" style="background-color: #36496c; color: #fff; text-transform: capitalize; padding-top: 12px; padding-right: 20px; padding-bottom: 12px; padding-left: 20px; text-decoration: none; display: inline-block; border-top-left-radius: 5px; border-top-right-radius: 5px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; font-family: 'Maven Pro', sans-serif; font-size: 14px; font-weight: 600; text-transform: uppercase;">JOIN WITH US</a></td>
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
                         