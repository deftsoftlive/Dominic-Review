@extends('e-shop.layouts.layout')
@section('styleSheet')
<link rel="stylesheet" type="text/css" href="{{url('/e-shop/css/cart-style.css')}}">
@endsection
@section('content')

 
  <!-- banner section starts here here -->
       <section class="inner-main-banner" style="background-image:url({{url('/e-shop/images/product-listing-banner-bg.png')}});">
        <div class="container">
            <div class="inner-banner-content text-center">
                <h1>Wishlist</h1>
            </div>
        </div>
    </section>
   <!--Shopping cart sec starts here -->
   <section class="shopping-cart-sec">
       <div class="cart block">
                <div class="container">
                   <table class="wishlist">
    <thead class="wishlist__head">
        <tr class="wishlist__row">
            <th class="wishlist__column wishlist__column--image">Image</th>
            <th class="wishlist__column wishlist__column--product">Product</th>
            <th class="wishlist__column wishlist__column--stock">Stock Status</th>
            <th class="wishlist__column wishlist__column--price">Price</th>
          <!--   <th class="wishlist__column wishlist__column--tocart"></th> -->
            <th class="wishlist__column wishlist__column--remove"></th>
        </tr>
    </thead>
    <tbody class="wishlist__body" id="loadCartItems">
        
        
    </tbody>
</table>
                </div>
            </div>
   </section>
    <!--Shopping cart sec ends here -->










<input type="hidden" id="CartUpdationURLw" value="{{url(route('shop.ajax.wishlistOperations'))}}">
 
@endsection


 @section('jscript')

<script type="text/javascript">
    
$("body").on('click','a.cartItemQtys',function(e){
	 e.preventDefault();
	 var $this = $( this );
     var type = $this.attr('data-type');
     var id = $this.attr('data-id');
     if($this.attr('data-disable') == 1){
          addToCartFunctions(type,id);
     }
});

addToCartFunctions();
function addToCartFunctions(type="list",id=0) {    
     var $urlRoute =$("body").find('#CartUpdationURLw').val();
     var $divPath = $("body").find('#loadCartItems');
     $.ajax({
               url : $urlRoute,
               data : {
                 type:type,
                 id:id
               },
               type: 'GET',   
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').show()
               },
                beforeSend: function() {
                   $("body").find('.custom-loading').show();
                    
                },
                success: function (result) {
                          if(parseInt(result.status) == 1){
                               $divPath.html(result.htm) ;
                              $("body").find('.custom-loading').hide();
                          }else if(parseInt(result.status) == 0){
                              $this.find('#errorMessageBox').text(result.messages);
                              $this.find('.cartButton').removeAttr('disabled');
                          }
               },
               complete: function() {
                        $("body").find('.custom-loading').hide();
               },
               error: function (jqXhr, textStatus, errorMessage) {
                     
               }

   });
}

</script>

 @endsection