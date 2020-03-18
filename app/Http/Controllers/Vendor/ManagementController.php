<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Vendor\VendorController;
use App\VendorCategory;
use App\VendorCategoryMetaData;
use App\Category;
use App\Style;
use Auth;

class ManagementController extends VendorController
{

  public $Invalid =[
       '_token'
  ];
   
  public $restrictions =[
                'imageGallery',
                'videoGallery'
 ];

   #-----------------------------------------------------------------
   #    construct
   #-----------------------------------------------------------------
  
   public function getData($slug)
   {
   	  
      $category = Category::where('slug',$slug)
                           ->join('vendor_categories','vendor_categories.category_id','=','categories.id')
                           ->where('vendor_categories.user_id',Auth::user()->id);


      return $category->count() > 0 ? $category->first() : redirect()->route('vendor_dashboard')->with('error_message','Please check your url, Its wrong!');

   	   
   }


   #-----------------------------------------------------------------
   #    index
   #-----------------------------------------------------------------
  
   public function about($slug)
   {

      $category = $this->getData($slug);
       


       $info =[
           'business_name' => $this->getAllValueWithMeta('business_name','basic_information',$category->category_id),
           'address' => $this->getAllValueWithMeta('address','basic_information',$category->category_id),
           'website' => $this->getAllValueWithMeta('website','basic_information',$category->category_id),
           'phone_number' => $this->getAllValueWithMeta('phone_number','basic_information',$category->category_id),
           'company' => $this->getAllValueWithMeta('company','basic_information',$category->category_id),
           'travel_distaince' => $this->getAllValueWithMeta('travel_distaince','basic_information',$category->category_id),
           'min_price' => $this->getAllValueWithMeta('min_price','basic_information',$category->category_id),
           'cover_photo' => $this->getAllValueWithMeta('cover_photo','basic_information',$category->category_id),
           'short_description' => $this->getAllValueWithMeta('short_description','basic_information',$category->category_id),
           'facebook_url' => $this->getAllValueWithMeta('facebook_url','basic_information',$category->category_id),
           'bessiness_address_proof_1' => $this->getAllValueWithMeta('bessiness_address_proof_1','basic_information',$category->category_id),
           'bessiness_address_proof_2' => $this->getAllValueWithMeta('bessiness_address_proof_2','basic_information',$category->category_id),
           'business_registation_proof' => $this->getAllValueWithMeta('business_registation_proof','basic_information',$category->category_id)
            
      ];
 

      return view('vendors.management.basicInfo.index',$info)
      ->with('slug', $slug)
      ->with('category', $category)
      ->with('addLink', 'vendor_basic_category_management')
      ->with('title',$category->label.' :: Basic Information ');
   }
   #-----------------------------------------------------------------
   #    addAbout
   #-----------------------------------------------------------------
  
   public function addAbout(Request $request,$slug)
   {

      $category = $this->getData($slug);


         $info =[
           'business_name' => $this->getAllValueWithMeta('business_name','basic_information',$category->category_id),
           'address' => $this->getAllValueWithMeta('address','basic_information',$category->category_id),
           'website' => $this->getAllValueWithMeta('website','basic_information',$category->category_id),
           'phone_number' => $this->getAllValueWithMeta('phone_number','basic_information',$category->category_id),
           'company' => $this->getAllValueWithMeta('company','basic_information',$category->category_id),
           'travel_distaince' => $this->getAllValueWithMeta('travel_distaince','basic_information',$category->category_id),
           'min_price' => $this->getAllValueWithMeta('min_price','basic_information',$category->category_id),
           'min_guest' => $this->getAllValueWithMeta('min_guest','basic_information',$category->category_id),
           'cover_photo' => $this->getAllValueWithMeta('cover_photo','basic_information',$category->category_id),
           'cover_video' => $this->getAllValueWithMeta('cover_video','basic_information',$category->category_id),
           'cover_video_image' => $this->getAllValueWithMeta('cover_video_image','basic_information',$category->category_id),
           'short_description' => $this->getAllValueWithMeta('short_description','basic_information',$category->category_id),
           'facebook_url' => $this->getAllValueWithMeta('facebook_url','basic_information',$category->category_id),
           'linkedin_url' => $this->getAllValueWithMeta('linkedin_url','basic_information',$category->category_id),
           'twitter_url' => $this->getAllValueWithMeta('twitter_url','basic_information',$category->category_id),
           'instagram_url' => $this->getAllValueWithMeta('instagram_url','basic_information',$category->category_id),
           'pinterest_url' => $this->getAllValueWithMeta('pinterest_url','basic_information',$category->category_id),
           'bessiness_address_proof_1' => $this->getAllValueWithMeta('bessiness_address_proof_1','basic_information',$category->category_id),
           'bessiness_address_proof_2' => $this->getAllValueWithMeta('bessiness_address_proof_2','basic_information',$category->category_id),
           'business_registation_proof' => $this->getAllValueWithMeta('business_registation_proof','basic_information',$category->category_id)
      ];
       
       if(!empty($request->test)){
          return $info;
       }


       $VendorCategory = VendorCategory::where('category_id', $category->category_id)
        ->where('user_id',Auth::user()->id)->first();


      return view('vendors.management.basicInfo.add', $info)
      ->with('slug', $slug)
      ->with('VendorCategory', $VendorCategory)
      ->with('category', $category)   	   
      ->with('title',$category->label.' :: Basic Information ')
   	  ->with('addLink', 'vendor_category_management');
   }



   #-----------------------------------------------------------------
   #    addAbout
   #-----------------------------------------------------------------


 
  
   public function storeAbout(Request $request,$slug)
   {
       $category = $this->getData($slug);


      
       $validation = [
            'business_name' => 'required',
            'website' => 'required',
            'phone_number' => 'required',
            'company' => 'required',
            'travel_distaince' => 'required',
            'min_price' => 'required|numeric',
            'short_description' => 'required',
            'cover_photo' => 'image',
            'cover_video_image' => 'image',
            'latitude' => 'required',
            'longitude' => 'required',
            'business_location' => 'required',
            'min_guest' => 'required',
            'cover_video' => 'mimes:mp4,3gp,avi,wmv'
      ];

     $VendorCategory = VendorCategory::where('category_id',$category->category_id)
        ->where('user_id',Auth::user()->id);

      

if($category->capacity == 1){

   $validation['capacity_type'] ='required';

   if($request->capacity_type == 1){

        $validation['sitting_capacity'] ='required';
    
   }elseif($request->capacity_type == 2){
        $validation['standing_capacity'] ='required';

   }elseif($request->capacity_type == 3){
      $validation['sitting_capacity'] ='required';
      $validation['standing_capacity'] ='required';
   }
 

 }

$this->validate($request,$validation);

 

if($request->hasFile('cover_video') && $request->file('cover_video')->getSize() < 50000000 && $this->DeleteMetaImages('cover_video',$category->category_id,$request->type)){

         $image = uploadFileWithAjax('videos/vendors/cover/',$request->file('cover_video'));
         

         $this->saveCategoryMetaData('cover_video',$request->type,$image,$category->category_id);


}elseif($request->hasFile('cover_video')){


  return redirect()->back()->with('cover_video','Business Cover video size must be less than 50 mb.')
  ->with('error_message','Business Cover video size must be less than 50 mb.')->withInput();

}

 

if($VendorCategory->count() > 0){
  $vCate = $VendorCategory->first();
  $vCate->title = trim($request->business_name);
  $vCate->business_location = trim($request->business_location);
  $vCate->latitude = trim($request->latitude);
  $vCate->longitude = trim($request->longitude);
  $vCate->price = trim($request->min_price);
  $vCate->travel_distaince = $vCate->capacity == 1 ? trim($request->travel_distaince) : 0;
  if($category->capacity == 1):
      $vCate->standing_capacity =  trim($request->standing_capacity);
      $vCate->sitting_capacity =  trim($request->sitting_capacity);
      $vCate->capacity_type =  trim($request->capacity_type);
  endif;
  $vCate->save();
}

 
 
$this->saveCategoryMetaData('business_name',$request->type,$request->business_name,$category->category_id);
$this->saveCategoryMetaData('short_description',$request->type,$request->short_description,$category->category_id);
$this->saveCategoryMetaData('address',$request->type,$request->business_location,$category->category_id);
$this->saveCategoryMetaData('website',$request->type,$request->website,$category->category_id);
$this->saveCategoryMetaData('phone_number',$request->type,$request->phone_number,$category->category_id);
$this->saveCategoryMetaData('company',$request->type,$request->company,$category->category_id);
$this->saveCategoryMetaData('travel_distaince',$request->type,$request->travel_distaince,$category->category_id);
$this->saveCategoryMetaData('min_price',$request->type,$request->min_price,$category->category_id);
$this->saveCategoryMetaData('facebook_url',$request->type,$request->facebook_url,$category->category_id);
$this->saveCategoryMetaData('linkedin_url',$request->type,$request->linkedin_url,$category->category_id);
$this->saveCategoryMetaData('twitter_url',$request->type,$request->twitter_url,$category->category_id);
$this->saveCategoryMetaData('instagram_url',$request->type,$request->instagram_url,$category->category_id);
$this->saveCategoryMetaData('pinterest_url',$request->type,$request->pinterest_url,$category->category_id);
$this->saveCategoryMetaData('min_guest',$request->type,$request->min_guest,$category->category_id);



if($request->hasFile('cover_photo') && $this->DeleteMetaImages('cover_photo',$category->category_id,$request->type)){
    $image = uploadFileWithAjax('images/vendors/settings/',$request->file('cover_photo'));
    $this->saveCategoryMetaData('cover_photo',$request->type,$image,$category->category_id);
 }

if($request->hasFile('cover_video_image') && $this->DeleteMetaImages('cover_video_image',$category->category_id,$request->type)){
    $image = uploadFileWithAjax('images/vendors/settings/',$request->file('cover_video_image'));
    $this->saveCategoryMetaData('cover_video_image',$request->type,$image,$category->category_id);
}






if($request->hasFile('bessiness_address_proof_1') && $this->DeleteMetaImages('bessiness_address_proof_1',$category->category_id,$request->type)){
    $image = uploadFileWithAjax('images/vendors/settings/',$request->file('bessiness_address_proof_1'));
    $this->saveCategoryMetaData('bessiness_address_proof_1',$request->type,$image,$category->category_id);
}


if($request->hasFile('bessiness_address_proof_2') && $this->DeleteMetaImages('bessiness_address_proof_2',$category->category_id,$request->type)){
    $image = uploadFileWithAjax('images/vendors/settings/',$request->file('bessiness_address_proof_2'));
    $this->saveCategoryMetaData('bessiness_address_proof_2',$request->type,$image,$category->category_id);
}


if($request->hasFile('business_registation_proof') && $this->DeleteMetaImages('business_registation_proof',$category->category_id,$request->type)){
    $image = uploadFileWithAjax('images/vendors/settings/',$request->file('business_registation_proof'));
    $this->saveCategoryMetaData('business_registation_proof',$request->type,$image,$category->category_id);
}

return redirect()->route('vendor_category_management',$slug)->with('messages','Basic Information has been saved successfully.');     
   


  }

   #-----------------------------------------------------------------
   #    images
   #-----------------------------------------------------------------
  
public function saveCategoryMetaData($key,$type,$value,$category_id)
{
    $v = VendorCategoryMetaData::where('category_id',$category_id)
                                      ->where('user_id',Auth::user()->id)
                                      ->where('type',$type)
                                      ->where('key',$key);
                                       
    $metaData = $v->count() > 0 ? $v->first() : new VendorCategoryMetaData;

    

       $metaData->user_id = Auth::user()->id;
       $metaData->category_id = $category_id;
       $metaData->type = $type;
       $metaData->key = $key;
       $metaData->keyValue = $value;
       $metaData->vendor_category_id = $this->getVendorCategoryID($category_id);
       $metaData->save();


  return 1;

}






   #-----------------------------------------------------------------
   #    images
   #-----------------------------------------------------------------
  
   public function images($slug)
   {

 
      $category = $this->getData($slug);
      $images = VendorCategoryMetaData::where('category_id',$category->category_id)
                                      ->where('user_id',Auth::user()->id)
                                      ->where('type','imageGallery')
                                      ->paginate(12);
      return view('vendors.management.images.index')
      ->with('slug',$slug)
      ->with('category',$category)
      ->with('images',$images)
      ->with('addLink', 'vendor_category_add_image_management')
      ->with('title',$category->label.' Management :: About');
   }



   #-----------------------------------------------------------------
   #    imageGallery
   #-----------------------------------------------------------------
  
   public function imageGallery($slug)
   {
   	  $category = $this->getData($slug);
   	  $images = VendorCategoryMetaData::where('category_id',$category->category_id)
   	                                  ->where('user_id',Auth::user()->id)
   	                                  ->where('type','imageGallery');
   	                                   
        $vv = view('vendors.management.images.list')
   	        ->with('category',$category)
   	        ->with('images',$images)->render();

      return response()->json(['status'=> 1 ,'result' => $vv]);
   }



  #--------------------------------------------------------------------------
  #  uploadGalleryImage
  #--------------------------------------------------------------------------




  public function uploadGalleryImage(Request $request)
  {


 
      $validation = \Validator::make($request->all(), [
      'gallery_image' => 'required'
     ]);

     
     if($validation->fails()){

        return response()->json([
                           'message'   => $validation->errors()->all(),
                           'success' => false,
                           'class_name'  => 'alert-danger'
                          ]);

     }else{



              foreach ($request->gallery_image as $key) {
                          $image_name = uploadFileWithAjax('images/vendors/gallery/',$key);

                           $d=new VendorCategoryMetaData;
                           $d->key = 'aboutus_slider_images';
                           $d->keyValue = $image_name;
                           $d->user_id = Auth::user()->id;
                           $d->category_id = $request->category_id;
                           $d->vendor_category_id = $this->getVendorCategoryID($request->category_id);
                           $d->type = 'imageGallery';
                           $d->save();
              }


              return response()->json(['success' => true]);

      }

  }


  public function imageView($slug)
   {

 
      $category = $this->getData($slug);
       
      return view('vendors.management.images.add')
      ->with('slug',$slug)
      ->with('category',$category)
      ->with('addLink', 'vendor_category__image_management')
      ->with('title',$category->label.' Management :: About');
   }

   #-----------------------------------------------------------------
   #    images
   #-----------------------------------------------------------------



public function upload(Request $request)
{
         if($request->hasFile('gallery_image')){

                  # save images
            $imageLink = array();
            $delink = array();



               foreach ($request->gallery_image as $key) {
                

                        # upload image one by one
                           $image_name = uploadFileWithAjax('images/vendors/gallery/',$key);

                           $d=new VendorCategoryMetaData;
                           $d->key = 'aboutus_slider_images';
                           $d->keyValue = $image_name;
                           $d->user_id = Auth::user()->id;
                           $d->category_id = $request->category_id;
                           $d->vendor_category_id = $this->getVendorCategoryID($request->category_id);
                           $d->type = 'imageGallery';
                           $d->save();
                                   
                                 $del = array(
                                      'caption' => 'product_image',
                                      'url'     =>  url('/'),
                                      'key'     => $d->id
                                );
                                array_push($imageLink, url($image_name));

                                array_push($delink, $del);
              
               }
               
         } 

              $json = array(
                            'initialPreview' => $imageLink,
                            'initialPreviewAsData' => true,
                            'initialPreviewConfig' => $delink,
             );

             return response()->json($json); 

}



#-------------------------------------------------------------------------------------------
#  videos view
#-------------------------------------------------------------------------------------------





public function videos($slug)
{
	   $category = $this->getData($slug);
   	 $videos = VendorCategoryMetaData::where('category_id',$category->category_id)
   	                                  ->where('user_id',Auth::user()->id)
   	                                  ->where('type','videoGallery')
   	                                  ->paginate(8);
      return view('vendors.management.videos.index')
   	  ->with('slug',$slug)
   	  ->with('category',$category)
   	  ->with('videos',$videos)
      ->with('addLink', 'vendor_category_videos_add_management')
   	  ->with('title',$category->label.' Management :: Video Gallery');
}


#-------------------------------------------------------------------------------------------
#  videos add
#-------------------------------------------------------------------------------------------





public function addVideos($slug)
{
	  $category = $this->getData($slug);
   	  
      return view('vendors.management.videos.add')
   	  ->with('slug',$slug)
   	  ->with('category',$category)
   	  ->with('addLink', 'vendor_category_videos_management')
   	  ->with('title',$category->label.' Management :: Video Gallery');
}



#-------------------------------------------------------------------------------------------
#  videos saveVideos
#-------------------------------------------------------------------------------------------





public function saveVideos(Request $request,$slug)
{

	$this->validate($request,[
           'title' => 'required',
           'cover_photo' => 'required|image',
           'video_link' => 'required|url'
	]);
	      $category = $this->getData($slug);
        

         $image_name = uploadFileWithAjax('images/vendors/gallery/',$request->cover_photo);
     
                           $data = ['title' => $request->title,'link' => $request->video_link,'image' => $image_name];

                           $d=new VendorCategoryMetaData;
                           $d->key = 'video';
                           $d->keyValue = json_encode($data);
                           $d->user_id = Auth::user()->id;
                           $d->category_id = $category->category_id;
                           $d->vendor_category_id = $this->getVendorCategoryID($category->category_id);
                           $d->type = 'videoGallery';
                           $d->save();


   return redirect()->route('vendor_category_videos_management',$slug)->with('messages','Video has been saved successfully.');
   	  
}

#-------------------------------------------------------------------------------------------
#  Delete Meta Tags
#-------------------------------------------------------------------------------------------

public function deleteVideos($slug,$id)
{
   $category = $this->getData($slug);

   $v = VendorCategoryMetaData::find($id);
   if(!empty($v)){
               $data = json_decode($v->keyValue);
               $file_path =  public_path().'/'.$data->image;
               if (file_exists( $file_path )) {
                   unlink($file_path); 
               } 
               $v->delete();
           return redirect()->route('vendor_category_videos_management',$slug)->with('messages','Video has been deleted successfully.');
      }

        return redirect()->route('vendor_category_videos_management',$slug)->with('messages','Something Went Wrong.');
   

    
}

#-------------------------------------------------------------------------------------------
#  Delete Meta Tags
#-------------------------------------------------------------------------------------------

public function editVideos($slug,$id)
{
     $category = $this->getData($slug);
     $video = VendorCategoryMetaData::find($id);
     if(empty($video)){
        return redirect()->route('vendor_category_videos_management',$slug)->with('messages','Something Went Wrong.');
              
     }

    

      return view('vendors.management.videos.edit')
      ->with('video',$video)
      ->with('slug',$slug)
      ->with('category',$category)
      ->with('addLink', 'vendor_category_videos_management')
      ->with('title',$category->label.' Management :: Video Gallery');
}



public function updateVideos(Request $request,$slug,$id)
{

  $this->validate($request,[
           'title' => 'required',
           'cover_photo' => 'image',
           'video_link' => 'required|url'
  ]);
             $category = $this->getData($slug);
        
     $video = VendorCategoryMetaData::find($id);

     if(empty($video)){

        return redirect()->route('vendor_category_videos_management',$slug)->with('messages','Something went Wrong.');
              
     }

     $data1 = json_decode($video->keyValue);

               $file_path =  public_path().'/'.$data1->image;
               if ($request->hasFile('cover_photo') && file_exists( $file_path )) {
                   unlink($file_path); 
               } 

                   $image_name = ($request->hasFile('cover_photo')) ? uploadFileWithAjax('images/vendors/gallery/',$request->cover_photo) : $data1->image ;

                   $data = ['title' => $request->title,'link' => $request->video_link,'image' => $image_name];

                    
                   $video->key = 'video';
                   $video->keyValue = json_encode($data);
                   $video->user_id = Auth::user()->id;
                   $video->category_id = $category->category_id;
                   $video->vendor_category_id = $this->getVendorCategoryID($category->category_id);
                   $video->type = 'videoGallery';
                   $video->save();


   return redirect()->route('vendor_category_videos_management',$slug)->with('messages','Video has been updated successfully.');
      
}

 
#-------------------------------------------------------------------------------------------
#  Delete Meta Tags
#-------------------------------------------------------------------------------------------



public function delete($slug,$id)
{
	 $category = $this->getData($slug);
     
     $v = VendorCategoryMetaData::where('id',$id)
     ->where('user_id',Auth::user()->id)
     ->whereIn('type',$this->restrictions)->first();

     if(empty($v)){
         return redirect()->back()->with('error_message','Something Went Wrong!');
     }

             // $file_path =  public_path().'/'.$m->value;
             // if (file_exists( $file_path ) && $m->value != "") {

             //        unlink($file_path); 

             //   } 

    $v->delete();

return redirect()->back()->with('error_message','Deleted!');

}




#-------------------------------------------------------------------------------------------
#  Delete Meta Tags
#-------------------------------------------------------------------------------------------




public function faqs($slug)
{
  
       $category = $this->getData($slug);
       $faqs =\App\FAQs::where('category_id',$category->category_id)->where('user_id',Auth::user()->id);
      return view('vendors.management.faqs.index')
      ->with('slug',$slug)
      ->with('faqs',$faqs->paginate(10))
      ->with('faqCount',$faqs->count())
      ->with('category',$category)
      ->with('addLink', 'vendor_faqsadd_management')
       ->with('title',$category->label.' Management :: FAQs');
}



#-------------------------------------------------------------------------------------------
#  Delete Meta Tags
#-------------------------------------------------------------------------------------------




public function faqsAdd(Request $request, $slug) {
  
       $category = $this->getData($slug);
      
      return view('vendors.management.faqs.add')
      ->with('slug',$slug)       
      ->with('category',$category)
      ->with('addLink', 'vendor_faqs_management')
      ->with('title',$category->label.' Management :: FAQs');
}


#-------------------------------------------------------------------------------------------
#  Delete Meta Tags
#-------------------------------------------------------------------------------------------




public function faqsStore(Request $request, $slug)
{
  
      $this->validate($request,[
           'question' => 'required',
           'answer' => 'required'
      ]);
        $category = $this->getData($slug);
    
     
                          // $data = ['question' => $request->question,'answer' => $request->answer];

                           $d=new \App\FAQs;
                           $d->question = trim($request->question);
                           $d->answer = trim($request->answer);
                          
                           $d->user_id = Auth::user()->id;
                           $d->category_id = $category->category_id;
                           $d->vendor_category_id = $this->getVendorCategoryID($category->category_id);
                           $d->status = 1;
                           $d->save();


   return redirect()->route('vendor_faqs_management',$slug)->with('messages','Faq has been saved successfully.');
}


public function faqsEdit(Request $request,$slug,$id)
{
  
       $category = $this->getData($slug);

        $faqs =\App\FAQs::where('category_id',$category->category_id)->where('user_id',Auth::user()->id)->where('id',$id);


        if($faqs->count() == 0){
          return redirect()->route('vendor_faqs_management',$slug)->with('messages','Something Went Wrong.');
        }
      
      return view('vendors.management.faqs.edit')
            ->with('slug',$slug)
            ->with('faqs',$faqs->first())
            ->with('category',$category)
            ->with('addLink', 'vendor_faqs_management')
            ->with('title',$category->label.' Management :: Edit');
}


#-------------------------------------------------------------------------------------------
#  Delete Meta Tags
#-------------------------------------------------------------------------------------------




public function faqsUpdate(Request $request,$slug,$id)
{
  
      $this->validate($request,[
           'question' => 'required',
           'answer' => 'required'
      ]);
        $category = $this->getData($slug);
    
        $faqs =\App\FAQs::where('category_id',$category->category_id)->where('user_id',Auth::user()->id)->where('id',$id);


        if($faqs->count() == 0){
          return redirect()->route('vendor_faqs_management',$slug)->with('messages','Something Went Wrong.');
        }
                           

                           $d=$faqs->first();
                           $d->question = trim($request->question);
                           $d->answer = trim($request->answer);
                          
                           $d->user_id = Auth::user()->id;
                           $d->category_id = $category->category_id;
                           $d->vendor_category_id = $this->getVendorCategoryID($category->category_id);
                           $d->status = 1;
                           $d->save();


   return redirect()->route('vendor_faqs_management',$slug)->with('messages','Faq has been updated successfully.');
}
#-------------------------------------------------------------------------------------------
#  Delete Meta Tags
#-------------------------------------------------------------------------------------------




public function faqsDelete(Request $request,$slug,$id)
{
  
       
        $category = $this->getData($slug);
        $faqs =\App\FAQs::where('category_id',$category->category_id)->where('user_id',Auth::user()->id)->where('id',$id);


        if($faqs->count() == 0){
          return redirect()->route('vendor_faqs_management',$slug)->with('error_message','Something Went Wrong.');
        }

         $faqs->delete();

   return redirect()->route('vendor_faqs_management', $slug)->with('messages', 'Faq has been deleted successfully.');
}

#-------------------------------------------------------------------------------------------
#  Amenities
#-------------------------------------------------------------------------------------------




public function amenity($slug)
{
       
       $category = $this->getData($slug);
        
       $category = Category::with('CategoryAmenity','CategoryAmenity.Amenity')->where('id',$category->category_id)->first();
 
       return view('vendors.management.amenities.index')
              ->with('category',$category)->with('title',$category->label.' Management :: Amenities');
}


#-------------------------------------------------------------------------------------------
#  Event and Games
#-------------------------------------------------------------------------------------------

public function amenityAssign($slug)
{
      $this->validate($request,[
           'amenity' => 'required' 
           
      ]);
      $category = $this->getData($slug);

      
      
      foreach ($variable as $key => $value) {
        # code...
      }

}



#-----------------------------------------------------------------
#  assignCategory
#-----------------------------------------------------------------


   public function amenityAssignAjax(Request $request,$slug)
   {
      
        $v= \Validator::make($request->all(),[
            'amenity' => 'required'
        ]);
 
        if($v->fails()){
           return response()->json(['status' => 0 , 'errors' => $v->errors()]);
         }else{

          $category = $this->getData($slug);

          $status =0;
          $CategoryVaritant = \App\CategoryVariation::where('type','amenity')
                                                    ->where('category_id',$category->category_id)
                                                     ->whereIn('variant_id',$request->amenity);

          $vv = \App\VendorAmenity::where('user_id',Auth::user()->id)
                                   ->where('category_id',$category->category_id)
                                   ->whereNotIn('amenity_id',$request->amenity)
                                   ->delete();

          foreach ($request->amenity as $key => $cate) {

                $VendorEventGame = \App\VendorAmenity::where('user_id',Auth::user()->id)
                                                    ->where('category_id',$category->category_id)
                                                    ->where('amenity_id',$cate);

                $Amenity = \App\Amenity::find($cate);

                if($VendorEventGame->count() == 0):
                        $v = new \App\VendorAmenity;
                        $v->category_id = $category->category_id;
                        $v->user_id = Auth::user()->id;
                        $v->amenity_id = $cate;
                        $v->vendor_category_id = $this->getVendorCategoryID($category->category_id);
                        $v->parent = 0;
                        $v->type = $Amenity->type;
                        $v->save();

                endif;
                

          }

          if($CategoryVaritant->count() == 0) {
                 return response()->json(['status' => 2 , 'msg' => 'Something Went Wrong!']);
          } else {
                 return response()->json(['status' => 1 ,
                  'redirect_links' => url(route('get_vendor_amenity_management',$slug)),
                  'msg' => 'The Amenities & Games has been saved successfully.'
               ]);
          }
 
          

        } 
        
   }


#-------------------------------------------------------------------------------------------
#  Event and Games
#-------------------------------------------------------------------------------------------




public function event($slug)
{
       
       $category = $this->getData($slug);
        
       $category = Category::with('CategoryEvent','CategoryEvent.Event')->where('id',$category->category_id)->first();
 
       return view('vendors.management.events.index')
              ->with('category',$category)
              ->with('title',$category->label.' Management :: Events')
              ;
}







#-----------------------------------------------------------------
#  assignCategory
#-----------------------------------------------------------------


   public function eventAssignAjax(Request $request,$slug)
   {
      
        $v= \Validator::make($request->all(),[
            'event_type' => 'required'
        ]);
 
        if($v->fails()){
           return response()->json(['status' => 0 , 'errors' => $v->errors()]);
         }else{

           $category = $this->getData($slug);

          $status =0;
          $CategoryVaritant = \App\CategoryVariation::where('type','event')
                                                   ->where('category_id',$category->category_id)
                                                    ->whereIn('variant_id',$request->event_type);

             $vv = \App\VendorEventGame::where('user_id',Auth::user()->id)
                                     ->where('category_id',$category->category_id)
                                      ->whereNotIn('event_id',$request->event_type)
                                      ->delete();
            

          foreach ($CategoryVaritant->get() as $key => $cate) {

                 $VendorEventGame = \App\VendorEventGame::where('user_id',Auth::user()->id)
                                                   ->where('category_id',$cate->category_id)
                                                    ->where('event_id',$cate->variant_id);

                if($VendorEventGame->count() == 0):
                  $v = new \App\VendorEventGame;
                  $v->category_id = $cate->category_id;
                  $v->user_id = Auth::user()->id;
                  $v->event_id = $cate->variant_id;
                  $v->vendor_category_id = $this->getVendorCategoryID($category->category_id);
                  $v->parent = 0;
                  $v->save();
                endif;

          }

          if($CategoryVaritant->count() == 0){
                 return response()->json(['status' => 2 , 'msg' => 'Something Went Wrong.']);
          }else{
                 return response()->json(['status' => 1 ,
                  'redirect_links' => url(route('get_vendor_event_management',$slug)),
                  'msg' => 'Event Types has been saved successfully.'
                ]);
          }
 
          

         }


}



#-------------------------------------------------------------------------------------------------
#  services
#-------------------------------------------------------------------------------------------------

public function services($slug)
{
      $category = $this->getData($slug);
        
      $cate = \App\Category::find($category->category_id);


 
       return view('vendors.management.services.index')
              ->with('category',$category)
              ->with('cate',$cate)
              ->with('title',$category->label.' Management :: Services');
}





public function servicesAssignAjax(Request $request,$slug)
{

         $v= \Validator::make($request->all(),[
            'services' => 'required'
        ]);
 
        if($v->fails()){
           return response()->json(['status' => 0 , 'errors' => $v->errors()]);
         }else{

          $category = $this->getData($slug);

           
         $v= \App\VendorCategory::where('category_id',$request->category_id)->where('user_id',Auth::user()->id);
              $id = 0;
              if($v->count() == 0){
                          $vCate = new \App\VendorCategory;
                          $vCate->parent = 0;
                          $vCate->category_id = $value;
                          $vCate->user_id = Auth::user()->id;
                          $vCate->status = 1;
                          $vCate->save();

                          $id = $vCate->id;

              }else{

                        $category = $v->first();
                        $id = $category->id;
              } 



              if($id > 0){

                  $v3= \App\VendorCategory::where('parent',$id)->whereNotIn('category_id',$request->services)->where('user_id',Auth::user()->id)->delete();
                  foreach($request->services as $value):
                         $v1= \App\VendorCategory::where('parent',$id)->where('category_id',$value)->where('user_id',Auth::user()->id);
                         if($v1->count() == 0):
                          $vCate = new \App\VendorCategory;
                          $vCate->parent = $id;
                          $vCate->category_id = $value;
                          $vCate->user_id = Auth::user()->id;
                          $vCate->status = 1;
                          $vCate->save();
                        endif;

                endforeach;
              }


            

          

          if($v->count() == 0){
                 return response()->json(['status' => 2 , 'msg' => 'Something Went Wrong!','msg' => 'Something Went Wrong']);
          }else{
                 return response()->json(['status' => 1 , 'redirect_links' => url(route('get_vendor_services_management',$slug)),'msg' => 'Services has been saved successfully']);
          }
 
          

         }
  
}



#------------------------------------------------------------------------------------------
#description
#------------------------------------------------------------------------------------------

  public function description(Request $request,$slug)
  {
      $category = $this->getData($slug);

      return view('vendors.management.description.index',[
        'description' => $this->getAllValueWithMeta('description','description',$category->category_id)
      ])
      ->with('slug',$slug)
      ->with('category',$category)
      ->with('addLink', 'vendor_descriptionadd_management')
      ->with('title',$category->label.' Management :: About');
  }
#------------------------------------------------------------------------------------------
#description
#------------------------------------------------------------------------------------------

    public function descriptionAdd(Request $request,$slug)
  {
      $category = $this->getData($slug);

      return view('vendors.management.description.add',[
        'description' => $this->getAllValueWithMeta('description','description',$category->category_id)
      ])
      ->with('slug',$slug)
      ->with('category',$category)
      ->with('addLink', 'vendor_description_management')
      ->with('title',$category->label.' Management :: About');
  }


#------------------------------------------------------------------------------------------
#prohibtion
#------------------------------------------------------------------------------------------

  public function prohibtion(Request $request,$slug)
  {
      $category = $this->getData($slug);

      return view('vendors.management.prohibtion.index',[
        'prohibtion' => $this->getAllValueWithMeta('prohibtion','prohibtion',$category->category_id)
      ])
      ->with('slug',$slug)
      ->with('category',$category)
      ->with('addLink', 'vendor_add_prohibtion_management')
      ->with('title',$category->label.' Management :: Prohibtion & Restrictions');
  }
#------------------------------------------------------------------------------------------
#description
#------------------------------------------------------------------------------------------

    public function prohibtionAdd(Request $request,$slug)
  {
      $category = $this->getData($slug);

      return view('vendors.management.prohibtion.add',[
        'prohibtion' => $this->getAllValueWithMeta('prohibtion','prohibtion',$category->category_id)
      ])
      ->with('slug',$slug)
      ->with('category',$category)
      ->with('addLink', 'vendor_prohibtion_management')
      ->with('title',$category->label.' Management :: Prohibtion & Restrictions');
  }
#------------------------------------------------------------------------------------------
#description
#------------------------------------------------------------------------------------------


public function prohibtionStore(Request $request,$slug)
{

   $category = $this->getData($slug);

   $chk = \App\VendorCategoryMetaData::where('key',$request->type)
                                     ->where('type',$request->type)
                                     ->where('user_id',Auth::user()->id)
                                     ->where('category_id',$category->category_id);
    if($chk->count() > 0){

        $c= $chk->first();
        $c->keyValue =$request->prohibtion;
        $c->vendor_category_id = $this->getVendorCategoryID($category->category_id);
        $c->save();

    }


    return redirect()->route('vendor_prohibtion_management',$slug)->with('messages','Prohibtion & Restrictions has been saved successfully.');
                                     
}

#------------------------------------------------------------------------------------------
#description
#------------------------------------------------------------------------------------------


public function getAllValueWithMeta($key,$type,$category_id)
    {
       $chk = \App\VendorCategoryMetaData::where('user_id',Auth::user()->id)->where('key',$key)->where('type',$type)->where('category_id',$category_id)->first();

       if(!empty($chk)){
        return $chk->keyValue;
       }else{
        $c =new \App\VendorCategoryMetaData;
        $c->key = $key;
        $c->keyValue = '';
        $c->type = $type;
        $c->user_id = Auth::user()->id;
        $c->category_id = $category_id;
        $c->vendor_category_id = $this->getVendorCategoryID($category_id);
        $c->save();
        return $c->keyValue;
       }
}



public function getVendorCategoryID($category_id)
{
        $VendorCategory = \App\VendorCategory::where('user_id',Auth::user()->id)
       ->where('category_id',$category_id);
       $vendor = $VendorCategory->first();
       return $vendor_category_id = $VendorCategory->count() > 0 ? $vendor->id : 0;

}
#------------------------------------------------------------------------------------------
#description
#------------------------------------------------------------------------------------------


public function descriptionStore(Request $request,$slug)
{

   $category = $this->getData($slug);

   $chk = \App\VendorCategoryMetaData::where('key',$request->type)
                                     ->where('type',$request->type)
                                     ->where('user_id',Auth::user()->id)
                                     ->where('category_id',$category->category_id);
    if($chk->count() > 0){

        $c= $chk->first();
        $c->keyValue =$request->description;
        $c->vendor_category_id = $this->getVendorCategoryID($category->category_id);
        $c->save();

    }


    return redirect()->route('vendor_description_management',$slug)->with('messages','Description has been saved successfully.');
                                     
}




#------------------------------------------------------------------------------------------
#description
#------------------------------------------------------------------------------------------

  public function style(Request $request,$slug)
  {

      $styles = Style::where('status', 1)->where('user_id', Auth::user()->id)->orWhere('added_by', 'admin');
      $category = $this->getData($slug);
      return view('vendors.management.styles.index',[
        'styles' => $this->getAllValueWithMeta('style','styles', $category->category_id)
      ])
      ->with('slug', $slug)
      ->with('category', $category)
      ->with('styles', $styles)
      ->with('title', $category->label.' Management :: Styles');
  }
  
#------------------------------------------------------------------------------------------
#description
#------------------------------------------------------------------------------------------


  public function styleAdd(Request $request,$slug)
  {
      $category = $this->getData($slug);

      return view('vendors.management.styles.add',[
        'styles' => $this->getAllValueWithMeta('style','styles',$category->category_id)
      ])
      ->with('slug',$slug)
      ->with('category',$category)
      ->with('title',$category->label.' Management :: Styles');
  }
#------------------------------------------------------------------------------------------
#description
#------------------------------------------------------------------------------------------



public function styleStore(Request $request, $slug)
{

   $category = $this->getData($slug);
 
    
  $user = Auth::User();

  VendorCategoryMetaData::where(['user_id' => $user->id, 'category_id' => $category->category_id, 'type' => 'styles', 'key'=>'style'])->delete();       

  if(!empty($request->styles) && count($request->styles)) {
    foreach ($request->styles as $key => $style) {
            if($style) {
              VendorCategoryMetaData::create([
              'category_id' => $category->category_id,
              'type' => 'styles',
              'user_id' => $user->id,
              'key' => 'style',
              'keyValue' => $style,
              'vendor_category_id' => $this->getVendorCategoryID($category->category_id),
              'parent' => 0
            ]);
            }            
          }
  }
          
          
    return redirect()->route('vendor_style_management', $slug)->with('flash_message', 'Styles has been saved successfully!');
                                     
}



public function newStyle($slug)
{
  $category = $this->getData($slug);
  return view('vendors.management.styles.create')
      ->with('slug',$slug)
      ->with('category',$category)
      ->with('title',$category->label.' Management :: Styles');
}


public function storeStyle(Request $request, $slug) {
  $validatedData = $request->validate([
        'title' => ['required', 'string', 'max:20'],
        'description' => ['required', 'string'],
        'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048']
    ]);

  if ($request->hasFile('image')) {
      $image = $request->file('image');
      $filename = time().'.'.$image->getClientOriginalExtension();
      $destinationPath = public_path('/uploads');
      $image->move($destinationPath, $filename);
  }

  Style::create([
    'user_id' => Auth::user()->id,
    'added_by' => 'vendor',
    'title' => $request['title'],
    'description' => $request['description'],
    'image' => $filename,
  ]);
  return redirect()->route('vendor_style_management', $slug)->with('flash_message', 'Style has been created successfully!');
}


public function listingStyles($slug)
{
      $styles = Style::where('status', 1)->where('user_id', Auth::user()->id)->get();
      $category = $this->getData($slug);

      return view('vendors.management.styles.listingStyles',[
        'styles' => $this->getAllValueWithMeta('style','styles', $category->category_id)
      ])
      ->with('slug', $slug)
      ->with('category', $category)
      ->with('styles', $styles)
      ->with('title', $category->label.' Management :: Listing Styles');
}

public function deleteStyles($slug, $id)
{
     $style = Style::where('slug', $slug)->first();
        
     // $v = VendorCategoryMetaData::where('id',$id)
     // ->where('user_id',Auth::user()->id)
     // ->whereIn('type',$this->restrictions)->first();

     if(empty($style)){
         return redirect()->back()->with('error_message','Something Went Wrong!');
      }

     $style->delete();

     return redirect()->back()->with('error_message','Deleted!');
}


public function editStyles(Request $request, $catslug, $slug, $id)
{

    $style = Style::where('slug', $slug)->first();
    if ($request->isMethod('post'))
    {
        $validatedData = $request->validate([
                    'title' => ['required', 'string', 'max:20'],
                    'description' => ['required', 'string'],
                    'image' => ['image','mimes:jpeg,png,jpg,gif,svg','max:2048']
                ]);

              $style = Style::FindBySlugOrFail($slug);

              $filename = $style->image;

              if ($request->hasFile('image')) {
                  $image = $request->file('image');
                  $filename = time().'.'.$image->getClientOriginalExtension();
                  $destinationPath = public_path('/uploads');
                  $img_path = public_path().'/uploads/'.$style->image;
                  if (file_exists($img_path)) {
                    unlink($img_path);
                }
                  $image->move($destinationPath, $filename);
              }
              $style->update([
                'user_id' => Auth::user()->id,
                'added_by' => 'vendor',
                'title' => $request['title'],
                'description' => $request['description'],
                'image' => $filename,
              ]);

              return redirect()->route('vendor_style_management',$catslug)->with('flash_message', 'Style has been updated successfully!');

    }else{
      
     return view('vendors.management.styles.edit')
        ->with('catSlug',$catslug)
        ->with('slug',$slug)
        ->with('style',$style)
        ->with('title',$style->label.' Management :: Edit Style');   
    }
}



#-------------------------------------------------------------------------------------------
#  Event and Games
#-------------------------------------------------------------------------------------------




public function seasons($slug) {
       
   $category = $this->getData($slug);
        
  $seasons = $category->CategorySeasons;
 
       return view('vendors.management.seasons.index')
              ->with('category',$category)
              ->with('seasons',$seasons)
              ->with('title',$category->label.' Management :: Seasons')
              ;
}


#-----------------------------------------------------------------
#  assignCategory
#-----------------------------------------------------------------


   public function seasonAssignAjax(Request $request,$slug)
   {
        $user = Auth::User();
      
        $v= \Validator::make($request->all(),[
            'seasons' => 'required'
        ]);
 
        if($v->fails()){
           return response()->json(['status' => 0 , 'errors' => $v->errors()]);
         }else{

           $category = $this->getData($slug);

           $status = 0;          
 
           VendorCategoryMetaData::where(['user_id' => $user->id, 'category_id' => $category->category_id, 'type' => 'seasons', 'key'=>'season'])->delete();       

          foreach ($request->seasons as $key => $season) {
            VendorCategoryMetaData::create([
              'category_id' => $category->category_id,
              'type' => 'seasons',
              'user_id' => $user->id,
              'key' => 'season',
              'keyValue' => $season,
              'vendor_category_id' => $this->getVendorCategoryID($category->category_id),
              'parent' => 0
            ]);
    
          }

                 $msg = 'Seasons are assigned to '.$category->label;
                 return response()->json(['status' => 1 , 'redirect_links' => url(route('get_vendor_season_management',$slug)),'msg' => $msg]);
           
        } 
        
   }




#-----------------------------------------------------------------
#  assignCategory
#-----------------------------------------------------------------


    public function MetaImage(Request $request,$slug)
    {
        $col = $request->meta;
         if($request->hasFile($col)){

                  # save images
            $imageLink = array();
            $delink = array();

               $category = $this->getData($slug);

                        # upload image one by one
                                $image_name = uploadFileWithAjax('images/vendors/settings/', $request->$col);
                                 $this->DeleteMetaImages($request->meta,$category->category_id,$request->type);
                               //  $this->DeleteMetaImages($request->meta);
                        
                                 $parent = !empty($request->parent) ? $request->parent : 0;
                                 $this->saveCategoryMetaData($request->meta,$request->type,$image_name,$category->category_id);
                    
                                 $del = array(
                                      'caption' => 'product_image',
                                      'url'     => '', // url(route('delete_meta_image')),
                                      'key'     => $request->meta
                                );
                                array_push($imageLink, url($image_name));

                                array_push($delink, $del);
              

              $json = array(
                            'initialPreview' => $imageLink,
                            'initialPreviewAsData' => true,
                            'initialPreviewConfig' => $delink,
             );

             return response()->json($json); 
               
         }



 }






    public function updateMeta($key,$value,$type,$parent=0)
    {
      
           // $chk = \App\VendorCategoryMetaData::where('parent',$parent)->where('key',$key)->where('type',$type)->first();
 

           //   if(!empty($chk)){
           //     $chk->key = $key;
           //     $chk->keyValue = $value;
           //     $chk->type = $type;
           //     $chk->parent = $parent;
           //     $chk->vendor_category_id = $this->getVendorCategoryID($category->category_id);
           //     $chk->user_id = Auth::user()->id;
           //     $chk->save();
           //   }else{
           //    $c =new \App\VendorCategoryMetaData;
           //    $c->key = $key;
           //    $c->keyValue = $value;
           //    $c->type = $type;
           //    $c->user_id = Auth::user()->id;
           //    $c->parent = $parent;
           //    $c->vendor_category_id = $this->getVendorCategoryID($category->category_id);
           //    $c->save();
           //   }
    }


 public function DeleteMetaImages($key, $category_id, $type)
 {
    $m = VendorCategoryMetaData::where('key',$key)
    ->where('user_id',Auth::user()->id)
    ->where('category_id',$category_id)
    ->where('type',$type)
    ->first();

    if(!empty($m)){

              $file_path =  public_path().'/'.$m->keyValue;
        if (file_exists( $file_path ) && $m->keyValue != "") {

                    unlink($file_path); 

               } 
               $m->keyValue = '';
               $m->save();

    }
    return 1;
 }


 public function paymentSetting($slug) {
  $category = $this->getData($slug);
  $vendorCategory= VendorCategory::where(['category_id'=> $category->category_id, 'user_id' => Auth::User()->id])->first();
  return view('vendors.management.payment.index')->with(['ven_cat' => $vendorCategory, 'slug'=> $slug]);
 }

 public function updatePaymentSetting(Request $request, $slug) {
  $category = $this->getData($slug);
  $vendorCategory= VendorCategory::where(['category_id'=> $category->category_id, 'user_id' => Auth::User()->id])->first();
  $vendorCategory->update($request->all());
  return redirect()->route('vendor_cat_pay_management', $slug)->with('flash_message', 'Payment Settings has been saved successfully.');
 }


}
