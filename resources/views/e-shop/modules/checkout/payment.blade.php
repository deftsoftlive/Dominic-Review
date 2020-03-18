@extends('e-shop.layouts.checkout')
@section('checkContent')






  <!-- fourth step content starts here -->
                    <fieldset class="step-content" >
                        
                          <h2 class="step-content-title">Payment</h2>
                          <div class="row">
                           <div class="col-lg-8">
                              <div class="Payment-block">
                                  <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"><span class="tab-icon"><i class="fas fa-credit-card"></i></span>Card</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"><span class="tab-icon"><i class="fab fa-cc-paypal"></i></span>Paypal</a>
                                        </li>
                                        
                                    </ul><!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                             @include('e-shop.includes.checkout.stripe')
                                        </div>
                                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                                            <a href="javascript:void(0);" class="cstm-btn solid-btn">Pay With Paypal</a>
                                        </div>                                        
                                    </div>
                              </div>
                            </div> 
                            <div class="col-lg-4" id="priceCartSideBar">
                                   @include('e-shop.includes.checkout.priceCartSidebar')

                            </div>                       
                           
                        

                            <div class="col-md-12">

                               <!-- <button class="cstm-btn solid-btn">Continue</button> -->
                               <div class="multistep-footer mt-4 text-right"> 
                                <a href="{{$backward}}" class="cstm-btn">Back</a>
                                 
                              </div> 

                            </div>
                        </div>
                          
                  </fieldset> 
 <!-- End -->  









@endsection