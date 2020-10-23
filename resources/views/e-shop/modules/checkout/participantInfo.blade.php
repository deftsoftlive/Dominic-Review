@extends('inc.homelayout')
@extends('e-shop.layouts.checkout')
@section('checkContent')
<style>
   header.Eshop-header {
   display: none;
   }
</style>
@php 
$login_user = Auth::user()->id;
$shop = \DB::table('shop_cart_items')->where('user_id',$login_user)->where('orderID',NULL)->groupBy('child_id')->get();
@endphp
<fieldset class="step-content" >
   <div class="step-form-content">
      <h2 class="step-content-title"><b>Participant info</b> - Please confirm that we have the correct details for our registers</h2>
      <div class="row">
         <div class="col-lg-12">
            <div class="cart block">
               <table class="cart__table cart-table">
                  <thead class="cart-table__head">
                     <tr class="cart-table__row">
                        <th class="cart-table__column cart-table__column--image">Participant Name</th>
                        <th class="cart-table__column cart-table__column--product">Medical/Behavioural</th>
                        <th class="cart-table__column cart-table__column--quantity">Contact</th>
                        <th class="cart-table__column cart-table__column--confrom">Action</th>
                     </tr>
                  </thead>
                  <tbody class="cart-table__body">

                     @php //dd($shop); @endphp
                     @foreach($shop as $sh)  
                     @if($sh->shop_type != 'product')

                     @php 
                     $child = \DB::table('users')->where('id',$sh->child_id)->first(); 
                     $child_details = \DB::table('children_details')->where('child_id',$child->id)->first();
                     @endphp
                     <tr class="cart-table__row">
                        <td class="cart-table__column cart-table__column--image" data-title="Participant Name"><b>{{$child->name}} </b></td>
                        <td class="cart-table__column cart-table__column--product" data-title="Medical/Behavioural">
                           <p id="med_beha">Medical/Behavioural:</p>

                           @php 
                              $medicals11 = DB::table('child_medicals')->where('child_id',$sh->child_id)->get(); 
                              $med_cond = []; //dd($medicals);
                           @endphp        

                           @if(count($medicals11)>0)

                              @foreach($medicals11 as $med)
                                 @php $med_cond[] = $med->medical; @endphp
                              @endforeach

                              @php $medical_conditions = implode(', ',$med_cond); @endphp

                           @else
                           
                           @endif 

                           <p><b>Medical</b> - {{isset($medical_conditions) ? $medical_conditions : 'N/A'}}</p>
                           <p><b>Behavioural</b> - {{!empty($child_details->beh_need_info) ? $child_details->beh_need_info : 'N/A'}}</p>
                           <p><b>Media Consent</b> - 
                              @if(!empty($child_details))
                                 @if(!empty($child_details->media))
                                 	@if($child_details->media == 'yes')
                                 		Yes
                                 	@elseif($child_details->media == 'no')
                                 		No
                                 	@else
                                 		N/A
                                 	@endif
                                 @endif
                              @else
                                 N/A
                              @endif
                           </p>
                        </td>

                        @if(Session::has('error'))
                        <div class="alert_msg alert alert-danger">
                           <p>{{ Session::get('error') }} </p>
                        </div>
                        @endif

                        @php
                           $child_contacts = DB::table('child_contacts')->where('child_id',$child->id)->first();
                        @endphp
                        <td class="cart-table__column cart-table__column--quantity" data-title="Contact">
                        <p><b>First Name</b> - <span>{{isset($child_contacts->first_name) ? $child_contacts->first_name : ''}}</span></p> 
                        <p><b>Last Name</b> - <span>{{isset($child_contacts->surname) ? $child_contacts->surname : ''}}</span></p>
                        <p><b>Email</b> - <span>{{isset($child_contacts->email) ? $child_contacts->email : ''}}</span></p>
                        <p><b>Phone Number</b> - <span>{{isset($child_contacts->phone) ? $child_contacts->phone : ''}}</span></p>
                        </td>

                        <td class="cart-table__column">
                           <form method="POST" id="part_info" action="{{route('shop.checkout.saveParticipantInfo')}}">
                              @csrf
                              <input type="hidden" name="user_id" value="{{$child->id}}">
                              <div class="form-group form-check">
                                 <label class="container_lable" >Confirm
                                 <input name="participant_info" type="checkbox" >
                                 <span class="checkmark"></span>
                                 </label>
                              </div>

                              @if(Auth::user()->id == $child->id)
                                <a target="_blank" class="cstm-btn main_button checkout_update" href="{{URL('/user/account-holder/details')}}">Update</a>
                              @else
                                <a target="_blank" class="cstm-btn main_button checkout_update" href="{{URL('/user/family-member/add?user=')}}{{$child->id}}">Update</a>
                              @endif

                              <!-- <a target="_blank" href="{{url('/user/family-member/add?user=')}}{{$sh->child_id}}" class="cstm-btn main_button checkout_update">Update</a> -->
                           
                        </td>
                     </tr>
                     @endif
                     @endforeach

                  </tbody>
               </table>
            </div>
         </div>
         <div class="col-lg-12">
         <div class="multistep-footer mt-4 text-right"> 

         @php 
            $shop_data = \DB::table('shop_cart_items')->where('user_id',$login_user)->select('shop_type')->where('orderID',NULL)->get();  
            $shop_type = array(); 
         @endphp

            @foreach($shop_data as $sh)
               @php $shop_type[] = $sh->shop_type; @endphp
            @endforeach

         @if (in_array('course', $shop_type, TRUE) || in_array('camp', $shop_type, TRUE)) 
               @if($sh->shop_type != 'product')
               <a href="{{$backward}}" type="submit" class="cstm-btn main_button solid-btn">back</a>
               <button id="save_participant" class="cstm-btn main_button" type="submit">Save &amp; Continue</button>
               @endif
         @endif

         @php 
            $str = 'product';
            $data1 = explode(" ",$str); 
            $data = array(); 
         @endphp
         @foreach($shop_data as $sh)
            @php $data[] = $sh->shop_type; @endphp
         @endforeach

         @if($data1 == $data)
            <div class="row">
               <br/><br/><h4>&nbsp; Not required for products</h4>
            </div>
            <a href="{{$backward}}" type="submit" class="cstm-btn main_button solid-btn">back</a>
            <a href="{{url('/shop/checkout/billing-address')}}" class="cstm-btn main_button">Save &amp; Continue</a>
         @else
         <!--  -->
               <!-- <a href="{{$backward}}" type="submit" class="cstm-btn main_button solid-btn">back</a> -->
               <!-- <button id="save_participant" class="cstm-btn main_button" type="submit">Save &amp; Continue</button> -->
         @endif
         </form>
         </div>            
         </div>
      </div>
   </div>
</fieldset>
<!-- End here -->
@endsection