@extends('emails.layout')
@section('content')
 
 
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

                  	   <?= $data ?>
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





@endsection