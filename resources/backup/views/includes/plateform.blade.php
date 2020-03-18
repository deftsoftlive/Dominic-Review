    <section class="platform">
        <div class="container cst-container">
            <div class="heading">
                <h2>We Integrate With These Platforms</h2>
            </div>
            <!--Tabs Section starts here-->
             <!--TABS CONTENT-->
            <div id="myTabContent" class="tab-content" >
            
@php $text=''; $li=''; @endphp
            
@foreach($Plateform as $k => $p)

<?php



$active = $k == 0 ? 'active' : '';
$in = $k == 0 ? 'in' : '';



$text .='<div class="tab-pane fade '.$in.' '.$active.'" id="tab'.$p->id.'">';
$text .='<div class="shopify-platform">';
$text .='<div class="shopify">';
$text .='<img src="'.url($p->logo).'">';
$text .='</div>';
$text .='<p class="text">A lot of our customers are shopify users and they have some wonderful things to say about us:</p>';
$text .='<div class="review">';
$text .='<ul>';

$text .='<li>';
$text .='<div class="rating">';
$text .='<figure>';
$text .='<img src="'.url('frontend/images/review.png').'">';
$text .='</figure>';
$text .='<figcaption>';
$text .='<p>1589 <span>Reviews</span></p>';
$text .='</figcaption>';
$text .='</div>';
$text .='</li><li>';

$text .='<div class="rating">';
$text .='<figure>';
$text .='<img src="'.url('frontend/images/rating.png').'">';
$text .='</figure>';
$text .='<figcaption>
<div class="star"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></div>';
$text .='<p><span>Average Rating</span></p>';
$text .='</figcaption>';
$text .='</div>';
$text .='</li>';
$text .='<li>';
$text .='<div class="read-more">';
$text .='<a href="javascript:void(0);" class="btn-2">Visit Shopify</a>';
$text .='</div>';
$text .='</li>';
$text .='</ul>';
$text .='</div>';
$text .='</div>  ';
$text .='</div>';

$text .='</div>';





 


$li .='<li class="'.$active.'">';
$li .='<a href="#tab'.$p->id.'" data-toggle="tab">';
$li .='<img src="'.url($p->logo).'"  >    ';
$li .='</a>';
$li .='</li>';



?>

@endforeach


        
  <?= $text ?>
 
       </div>     
            
            <!--TAbS-->
            <ul id="myTab" class="nav nav-tabs">

           
            <?= $li ?>
            
               
            
            </ul>
            
           
        </div>
    </section>