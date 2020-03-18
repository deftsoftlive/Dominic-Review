<?php
namespace App\Traits;


use App\Models\Admin\PageMetaTag;

trait NotificationFlash {





    public function MainComment()
    {
       return $this->hasOne('App\Models\Admin\ServiceAprovalProcess','vendor_service_id')->where('key','comment');
    }





   public function faqComment()
    {
       return $this->hasOne('App\Models\Admin\ServiceAprovalProcess','vendor_service_id')->where('key','faq_comment');
    }



   public function GalleryComment()
    {
       return $this->hasOne('App\Models\Admin\ServiceAprovalProcess','vendor_service_id')->where('key','photo_comment');
    }



    public function venueComment()
    {
       return $this->hasOne('App\Models\Admin\ServiceAprovalProcess','vendor_service_id')->where('key','venue_comment');
    }



    public function dealComment()
    {
       return $this->hasOne('App\Models\Admin\ServiceAprovalProcess','vendor_service_id')->where('key','deal_comment');
    }


    public function AmentityComment()
    {
       return $this->hasOne('App\Models\Admin\ServiceAprovalProcess','vendor_service_id')->where('key','amenity_comment');
    }


     public function PackageComment()
    {
       return $this->hasOne('App\Models\Admin\ServiceAprovalProcess','vendor_service_id')->where('key','package_comment');
    }
     public function DescriptionComment()
    {
       return $this->hasOne('App\Models\Admin\ServiceAprovalProcess','vendor_service_id')->where('key','description_comment');
    }



      public function prohibtionComment()
    {
       return $this->hasOne('App\Models\Admin\ServiceAprovalProcess','vendor_service_id')->where('key','prohibtion_estrictions_comment');
    }




}