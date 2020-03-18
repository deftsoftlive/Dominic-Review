
   <div class="compare-box">
      <div class="compare-head text-left">
         <div class="card-heading">
           <h3>Compare Packages</h3>         
         </div>
      </div> 
      <div class="row">



@foreach($packages->get() as $k => $val)

<div class="col-lg-4" id="com_pack_id_${package.id}">
    <div class="pkg-compare-card">
          <div class="package-card">
                    <div class="inn-card">
                       <div class="title">     
                         <div class="icon">
                          <i class="fas fa-hand-holding-usd"></i>
                        </div>
                       <span class="pkg-amount">${{custom_format($val->price,2)}}</span>
                      </div>
                      <div class="content">
                      <h3 class="price-table-heading">{{$val->title}}</h3>
                        <ul class="acrdn-action-btns single-row">
                             <li><a href="javascript:void(0);" 
                              class="remove_fields action_btn danger-btn" 
                              data-pack="#customCheck_{{$val->id}}"
                              ><i class="fas fa-trash-alt"></i></a></li>   
                        </ul>
                      </div>
                  </div>
              </div>
        </div>
 </div>

@endforeach















      </div>
          @if($packages->count() > 1)
            <div class="btn-wrap mt-5 text-right">
                  <button type="button" class="cstm-btn" id="open_com_modal">Compare</button>
            </div>
          @endif
      </div>
 