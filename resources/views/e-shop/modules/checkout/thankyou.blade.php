@extends('e-shop.layouts.layout')
@section('content')


<!-- banner section starts here here -->
     <section class="inner-main-banner" style="background-image:url({{url('/e-shop/images/product-listing-banner-bg.png')}});">
        <div class="container">
            <div class="inner-banner-content text-center">
                <h1>Thank You</h1>
                <br/><br/>
                @if($order->payment_by == 'Childcare')
                <div class="childcare_message">
                  <p>{!! getAllValueWithMeta('thanku_page_text', 'general-setting') !!}</p>
                </div>
                @endif
            </div>
        </div>
    </section>

@if($order->payment_by == 'Childcare')
     <!--Than sec starts here -->
      <section class="thank-you-sec">
          <div class="container">
            <div class="thank-you-block wow zoomInDown" data-wow-delay=".45s">
                <div class="thankyou-header">
              <h1 class="site-header__title" data-lead-id="site-header-title">THANK YOU!</h1>
   
              <div class="thankyou-main-content">
                <i class="far fa-check-circle main-content__checkmark" id="checkmark"></i>

                <p class="main-content__body" data-lead-id="main-content-body"></p>
              </div>
            </div>
              <div class="order-info-card">
                <div class="order-info-head">
                  <h3>Order detail</h3>
                </div>
                <table class="order-info-table">
                   <tr>
                     <th>Order Number</th>
                     <td>{{$order->orderID}}</td>
                   </tr>
                   <tr>
                     <th>Date</th>
                     <td>@php echo date('d/m/Y (h:i:s)',strtotime($order->created_at)); @endphp</td>
                   </tr>
                   <tr>
                     <th>Total</th>
                     <td>&pound;{{custom_format($order->amount,2)}}</td>
                   </tr>
                   <tr>
                     <th>Payment Method</th>
                     <td>@if($order->payment_by == 'Childcare') Childcare Vouchers / Tax-Free Childcare @else {{$order->payment_by}} @endif</td>
                   </tr>
                </table>
                <div class="btn-wrap mt-4 text-center">
                   <p>A confirmation email has been sent to <b>@php echo getUseremail($order->user_id); @endphp</b></p>
                   <br/>
                   <a href="{{url('/user/my-bookings')}}" class="cstm-btn solid-btn">Go to My Bookings</a>
                </div>
              </div>
            </div>
          </div>
      </section>
    <!--Than sec ends here -->
@else
   <!--Than sec starts here -->
      <section class="thank-you-sec">
          <div class="container">
            <div class="thank-you-block wow zoomInDown" data-wow-delay=".45s">
                <div class="thankyou-header">
              <h1 class="site-header__title" data-lead-id="site-header-title">THANK YOU!</h1>
   
              <div class="thankyou-main-content">
                <i class="far fa-check-circle main-content__checkmark" id="checkmark"></i>

                <p class="main-content__body" data-lead-id="main-content-body">Your Order was completed Successfully</p>
              </div>
            </div>
              <div class="order-info-card">
                <div class="order-info-head">
                  <h3>Order detail</h3>
                </div>
                <table class="order-info-table">
                   <tr>
                     <th>Order Number</th>
                     <td>{{$order->orderID}}</td>
                   </tr>
                   <tr>
                     <th>Date</th>
                     <td>@php echo date('d/m/Y (h:i:s)',strtotime($order->created_at)); @endphp</td>
                   </tr>
                   <tr>
                     <th>Total</th>
                     <td>&pound;{{custom_format($order->amount,2)}}</td>
                   </tr>
                   <tr>
                     <th>Payment Method</th>
                     <td>{{$order->payment_by}}</td>
                   </tr>
                </table>
                <div class="btn-wrap mt-4 text-center">
                   <p>A confirmation email has been sent to <b>@php echo getUseremail($order->user_id); @endphp</b></p>
                   <br/>
                   <a href="{{url('/user/my-bookings')}}" class="cstm-btn solid-btn">Go to My Bookings</a>
                </div>
              </div>
            </div>
          </div>
      </section>
    <!--Than sec ends here -->
@endif
@endsection