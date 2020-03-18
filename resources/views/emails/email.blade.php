@extends('emails.layout')
@section('content')

@php
  $business = "{business-title}";
  $results = $data->title ? $data->title : '';
  $data->email->title = str_replace($business, $results, $data->email->title);
  $data->email->body = str_replace($business, $results, $data->email->body);
@endphp

<tr style="background-color: #fff;">
  <td style="">
    <table align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
      <tbody>
        <tr>
          <td style="background-color: #fff; padding-top: 30px;  padding-bottom: 30px; padding-left: 30px; padding-right: 30px; border-top-left-radius: 20px; border-top-right-radius: 20px; border-bottom-left-radius: 20px; border-bottom-right-radius: 20px;">
            <table align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
              <tbody>
              <tr>
              <td>
                <table align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                <tbody>

                  @if(!empty($data->email->title))
                  <tr>
                    <td style="font-family: 'Maven Pro', sans-serif; font-size: 24px; line-height: 1; color: #333; border-left: 2px solid #36496c; padding-left: 10px;">{{$data->email->title}}</td>
                  </tr>
                  @endif
                
                </tbody>
              </table>
              </td>
            </tr>

                @if(!empty($data->email->body))
                <tr>
                  <td style="font-family: 'Maven Pro', sans-serif; font-size: 16px; line-height: 22px; color: #726c6c; padding-top: 10px;">{!! $data->email->body !!}</td>
                </tr>
                @endif

                @if(!empty($data->link))
                <tr>
                  <td style="padding-top: 20px;" align="left"><a href="{{url($data->link)}}" target="_blank" style="background-color: #36496c; color: #fff; text-transform: capitalize; padding-top: 12px; padding-right: 20px; padding-bottom: 12px; padding-left: 20px; text-decoration: none; display: inline-block; border-top-left-radius: 5px; border-top-right-radius: 5px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; font-family: 'Maven Pro', sans-serif; font-size: 14px; font-weight: 600; text-transform: uppercase;">Open Link</a>
                  </td>
                </tr>
                @endif

                @if(!empty($data->comment))
                 @include('emails.rejectedBusinessTemp')
                @endif

              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
  </td>
</tr>
@endsection 
