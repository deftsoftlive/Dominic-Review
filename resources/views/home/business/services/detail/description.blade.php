
<?php

$facebook_url = getBasicInfo($vendor->vendors->id, $vendor->category_id,'basic_information','facebook_url');
$linkedin_url = getBasicInfo($vendor->vendors->id, $vendor->category_id,'basic_information','linkedin_url');
$twitter_url =  getBasicInfo($vendor->vendors->id, $vendor->category_id,'basic_information','twitter_url');
$instagram_url = getBasicInfo($vendor->vendors->id, $vendor->category_id,'basic_information','instagram_url');
$pinterest_url = getBasicInfo($vendor->vendors->id, $vendor->category_id,'basic_information','pinterest_url');


?> 
 <div class="summary-card" id="description-sec">
	<div class="pannel-card">
		
		
		 	 <?= notoficationBusinessFlash($types,$vendor->DescriptionComment,$vendor->status) ?>	
		<div class="card-heading">
			<h3>Description</h3>			
		</div>		
		<div class="summary-details-content">
                 <div class="summary-details detail-listing">
					  <?= ($vendor->description->count() > 0) ? $vendor->description->keyValue : 'No Description' ?>
                 </div>
                  <?php
                  $facebook_url = getBasicInfo($vendor->vendors->id, $vendor->category_id,'basic_information','facebook_url');
                  $linkedin_url = getBasicInfo($vendor->vendors->id, $vendor->category_id,'basic_information','linkedin_url');
                  $twitter_url =  getBasicInfo($vendor->vendors->id, $vendor->category_id,'basic_information','twitter_url');
                  $instagram_url = getBasicInfo($vendor->vendors->id, $vendor->category_id,'basic_information','instagram_url');
                  $pinterest_url = getBasicInfo($vendor->vendors->id, $vendor->category_id,'basic_information','pinterest_url');

                  $followus = empty($facebook_url) && empty($linkedin_url) && empty($twitter_url) && empty($instagram_url) && empty($pinterest_url) ? 'hide' : '';
                ?> 
             <ul class="social-links listing-social {{$followus}}">
                        <li><p><strong>Follow us:</strong></p></li>
                  <li class="{{empty($facebook_url) ? 'hide' : ''}}">
                  <a href="<?= $facebook_url ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                  </li>
                  <li class="{{empty($linkedin_url)? 'hide' : ''}}">
                  <a href="<?= $linkedin_url ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                  </li>
                  <li class="{{empty($twitter_url) ? 'hide' : ''}}">
                  <a href="<?= $twitter_url ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                  </li>
                  <li class="{{empty($instagram_url) ? 'hide' : ''}}">
                  <a href="<?= $instagram_url ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                  </li>
                  <li class="{{empty($pinterest_url) ? 'hide' : ''}}">
                  <a href="<?= $pinterest_url ?>" target="_blank"><i class="fab fa-pinterest"></i></a>
                  </li>
                </ul>
			</div>
		</div>
	</div>




