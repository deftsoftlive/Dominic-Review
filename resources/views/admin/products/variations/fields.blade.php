@extends('layouts.admin')
 
@section('content')



<style type="text/css">
.btn-sm{
  padding: 5px !important;
}
.pull-right{
  float: right;
}
a.remove-attribute.btn.btn-sm.btn-danger.pull-right {
    padding: 0 6px !important;
    font-size: 12px;
    position: relative;
    top: 20px;
    right: -11px;
    height: 43px;
    line-height: 40px;
    text-align: center !important;
    display: inline-block;

}
</style>



<?php



if($variation_id > 0 && !empty($VariationExtra)){

$label = $VariationExtra->label;
$name = $VariationExtra->name;
$type = $VariationExtra->type;
$attributes = json_decode($VariationExtra->attributes);
$required = !empty($attributes->required) && $attributes->required == 'true' ? 1 : 0;
}else{

$label = '';
$name = '';
$type = '';
$attributes = [];
$required = '';

}












?>
 <div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">{{ $title }}</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item "><a href=" ">View</a></li>
                     
                </ul>
            </div>
        </div>
    </div>
</div>

       <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
                     <div class="card-header"> 
                      <h5 class="heading3">Add Custom Fields</h5>
                      <small></small>
                    </div>
       @include('admin.error_message')
 
            <div class="card-body">


                  <div class="row">
                    <div class="col-md-6">
                      <form role="form" method="post" id="faqForm" enctype="multipart/form-data">
                        @csrf

                          <div class="col-md-12">
                              {{textbox($errors, 'Field Label*', 'label',$label)}}
                              {{textbox($errors, 'Name*', 'name',$name)}}
                              {{selectsimple($errors,'Filed Type','type',$types,$type)}}
                              {{selectsimple($errors,'Do you want to required this field','required',[
                                   0 => 'No',
                                   1 => 'Yes',
                              ],$required)}}
                            
                          </div>

                           <div class="col-md-12">
                            <h4>Attributes</h4>
                            @if(!empty($attributes))

                                                 <div class="row">
                                                      @php $i =0; @endphp
                                                      @foreach($attributes as $k => $v)
                                                         @if($k != 'required')
                                                              @if($i == 0)
                                                         <div class="col-md-5">
                                                              {{selectsimple2($errors,'Field Attribute','attribute_key[]',$obj->InputOtherAttribute(),'select',$k)}}
                                                         </div>
                                                         <div class="col-md-7">
                                                              {{textbox($errors, 'AttributeValue*', 'attribute_value[]',$v)}}
                                                         </div>
                                                   </div>
                                    </div>

                                     <div class="col-md-12">
                                      <div class="more-attribute">
                                     @else

                                            <div class="row">
                                               <div class="col-md-5">
                                                    {{selectsimple2($errors,'','attribute_key[]',$obj->InputOtherAttribute(),'select',$k)}}
                                               </div>
                                               <div class="col-md-6">
                                                    {{textbox($errors, '', 'attribute_value[]',$v)}}
                                                </div>
                                                <div class="col-md-1">
                                               <a href="javascript:void(0)" class="remove-attribute btn btn-sm btn-danger pull-right"><i class="fas fa-times"></i></a>
                                               </div>
                                           </div>



                                     @endif
                                     @php $i++; @endphp
                                  @endif
                              @endforeach
                              
                              </div>
                                <a href="javascript:void(0)" id="addAttribute" class="btn btn-sm btn-primary pull-right">Add Attribute</a>
                             </div>


                            @endif


                            @if($variation_id == 0 || $i == 0)


                             <div class="row">
                                 <div class="col-md-5">
                                      {{selectsimple2($errors,'Field Attribute','attribute_key[]',$obj->InputOtherAttribute())}}
                                 </div>
                                 <div class="col-md-7">
                                      {{textbox($errors, 'AttributeValue*', 'attribute_value[]')}}
                                 </div>
                              </div>
                            </div>

                            <div class="col-md-12">
                              <div class="more-attribute">
                              
                              </div>
                              <a href="javascript:void(0)" id="addAttribute" class="btn btn-sm btn-primary pull-right">Add Attribute</a>
                             </div>

                            @endif

                           <div class="card-footer">
                                <button type="submit" id="faqFormBtn" class="btn btn-primary">Submit</button>
                           </div>
                      </form>
                    </div>
                    <div class="col-md-6">
                      <div class="table-responsive">
                      <table class="table cstm-admin-table">
                         <tr>
                           <th>Sr.no</th>
                           <th>Fields</th>
                           <th>Action</th>
                         </tr>

                         @foreach($variations->VariationExtras as $k => $v)
                             <tr>
                               <td>{{$k + 1}}</td>
                               <td>{{$v->label}}</td>
                               <td>
                                 <div class="btn-group">
                                        <button type="button" class="btn btn-primary">Action</button
                                          ><button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                            <span class="caret"></span><span class="sr-only">Toggle Dropdown</span>
                                          </button>
                                          <div class="dropdown-menu" role="menu" x-placement="top-start" style="position: absolute; transform: translate3d(-18px, -82px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                 <a href="{{url(route('admin.products.custom.fields.edit.variations',[$v->slug,$v->id]))}}" class="dropdown-item">Edit</a>
                                                 <div class="dropdown-divider"></div>

                                                  <a href="{{url(route('admin.products.custom.fields.delete.variations',[$v->slug,$v->id]))}}" class="dropdown-item">Delete</a>
                                                  
                                             
                                            </div>
                                  </div>
                               </td>
                             </tr>
                         @endforeach
                      </table>
                      </div>  
                    </div>

                  </div>

            </div>
          </div>
        </div>
      </div>
    </section>

 

 <div class="col-md-12" id="getAtrributeField" style="opacity:0">
   <div class="row">
       <div class="col-md-5">
            {{selectsimple2($errors,'','attribute_key[]',$obj->InputOtherAttribute())}}
       </div>
       <div class="col-md-6">
            {{textbox($errors, '', 'attribute_value[]')}}
        </div>
        <div class="col-md-1">
       <a href="javascript:void(0)" class="remove-attribute btn btn-sm btn-danger pull-right"><i class="fas fa-times"></i></a>
       </div>
   </div>
  </div>
     
@endsection

@section('scripts')
 

<script type="text/javascript">
 var $countAttribute = "{{count($obj->InputOtherAttribute())}}";
   

 function fetch() {
   var get=document.getElementById("get").value;
   let color = document.getElementById("color");
    color.value = get;
     color.focus();
} 


$("body").on('click','.remove-attribute',function(e){
    e.preventDefault();
    var $this =$( this );
    $this.closest('.row').remove();

    var $this = $("body").find('.more-attribute');
    var $matched = $this.find('.row').length;
    if(parseInt($matched) < parseInt($countAttribute)){
       $('#addAttribute').show();
    }
});




$("body").on('click','#addAttribute',function(e){
    e.preventDefault();
    var $this = $("body").find('.more-attribute');
    var $matched = $this.find('.row').length;

    if(parseInt($matched) < parseInt($countAttribute)){
        var $html = $("body").find('#getAtrributeField').html();
        $this.append($html);
        var $matched = $this.find('.row').length;
        if(parseInt($matched) == parseInt($countAttribute)){
          $(this).hide();
        }
    }else{
        $(this).hide();
    }
 
});













$('form').validate({
    onfocusout: function (valueToBeTested) {
      $(valueToBeTested).valid();
    },
  
    highlight: function(element) {
      $('element').removeClass("error");
    },
  
    rules: {
      "name": { 
          required: true,
      },
      "label": { 
          required: true,
      },
      "type": { 
          required: true,
      },
      valueToBeTested: {
          required: true,
      }
    },
    });   
   




</script>
@endsection
