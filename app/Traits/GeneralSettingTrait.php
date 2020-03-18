<?php
namespace App\Traits;
use App\Models\Admin\PageMetaTag;

trait GeneralSettingTrait {



 public $ignors = [
     '_token'
 ];


  public function getArrayValue($slug) {
	    switch ($slug) {
		 	case 'homepage':
		 		    return [
                       // Meta Data
                       'meta_title' => getAllValueWithMeta('meta_title', $slug),
                       'meta_description' => getAllValueWithMeta('meta_description', $slug),
                       'meta_keyword' => getAllValueWithMeta('meta_keyword', $slug),
		 		    	         
                       // Slide - 1
                       'slider_title1' => getAllValueWithMeta('slider_title1', $slug),
                       'slider_heading1' => getAllValueWithMeta('slider_heading1', $slug),
                       'slider_subheading1' => getAllValueWithMeta('slider_subheading1', $slug),
                       'slider_description1' => getAllValueWithMeta('slider_description1', $slug),
                       'slider_button_title1' => getAllValueWithMeta('slider_button_title1', $slug),
                       'slider_button_url1' => getAllValueWithMeta('slider_button_url1', $slug),
                       'slider_image1' => getAllValueWithMeta('slider_image1', $slug),

                       // Slide - 2
                       'slider_title2' => getAllValueWithMeta('slider_title2', $slug),
                       'slider_heading2' => getAllValueWithMeta('slider_heading2', $slug),
                       'slider_subheading2' => getAllValueWithMeta('slider_subheading2', $slug),
                       'slider_description2' => getAllValueWithMeta('slider_description2', $slug),
                       'slider_button_title2' => getAllValueWithMeta('slider_button_title2', $slug),
                       'slider_button_url2' => getAllValueWithMeta('slider_button_url2', $slug),
                       'slider_image2' => getAllValueWithMeta('slider_image2', $slug),

                       // Slide - 3
                       'slider_title3' => getAllValueWithMeta('slider_title3', $slug),
                       'slider_heading3' => getAllValueWithMeta('slider_heading3', $slug),
                       'slider_subheading3' => getAllValueWithMeta('slider_subheading3', $slug),
                       'slider_description3' => getAllValueWithMeta('slider_description3', $slug),
                       'slider_button_title3' => getAllValueWithMeta('slider_button_title3', $slug),
                       'slider_button_url3' => getAllValueWithMeta('slider_button_url3', $slug),
                       'slider_image3' => getAllValueWithMeta('slider_image3', $slug),

						            // About Us Section
                       'section1_title' => getAllValueWithMeta('section1_title', $slug),
                       'section1_tagline' => getAllValueWithMeta('section1_tagline', $slug),
                       'aboutus_image' => getAllValueWithMeta('aboutus_image', $slug),
                       'section1_button_title' => getAllValueWithMeta('section1_button_title', $slug),
                       'section1_button_url' => getAllValueWithMeta('section1_button_url', $slug),

                       // Course/Camp Linking section
                       'section2_title' => getAllValueWithMeta('section2_title', $slug),
                       'section2_button_title' => getAllValueWithMeta('section2_button_title', $slug),
                       'section2_button_url' => getAllValueWithMeta('section2_button_url', $slug),

		 		    ];
		 		break;
		 	case 'login':
		 		    return [
                      // Meta Data
                       'meta_title' => getAllValueWithMeta('meta_title', $slug),
                       'meta_description' => getAllValueWithMeta('meta_description', $slug),
                       'meta_keyword' => getAllValueWithMeta('meta_keyword', $slug),

                       'login_title' => getAllValueWithMeta('login_title', $slug),
                       'heading' => getAllValueWithMeta('heading', $slug),
                       'login_banner' => getAllValueWithMeta('login_banner', $slug),
                       'description' => getAllValueWithMeta('description', $slug),
                       
                       // Section 1
                       'section1_title' => getAllValueWithMeta('section1_title', $slug),
                       'section1_tagline' => getAllValueWithMeta('section1_tagline', $slug),
                       'section1_video' => getAllValueWithMeta('section1_video', $slug),
                       'section1_video_poster' => getAllValueWithMeta('section1_video_poster', $slug),
                       
                       // Section 2
                       'section2_title' => getAllValueWithMeta('section2_title', $slug),
		 		    ];
		 		break;
		 	case 'signup': 
		 	  	return [
                        // Meta Data
                       'meta_title' => getAllValueWithMeta('meta_title', $slug),
                       'meta_description' => getAllValueWithMeta('meta_description', $slug),
                       'meta_keyword' => getAllValueWithMeta('meta_keyword', $slug),

                       'signup_title' => getAllValueWithMeta('signup_title', $slug),
					             'signup_background_image' => getAllValueWithMeta('signup_background_image', $slug),
                       'heading' => getAllValueWithMeta('heading', $slug),
                       'signup_banner' => getAllValueWithMeta('signup_banner', $slug),
                       'description' => getAllValueWithMeta('description', $slug),
                       
                       // Section 1
                       'section1_title' => getAllValueWithMeta('section1_title', $slug),
                       'section1_tagline' => getAllValueWithMeta('section1_tagline', $slug),
                       'section1_video' => getAllValueWithMeta('section1_video', $slug),
                       'section1_video_poster' => getAllValueWithMeta('section1_video_poster', $slug),
                       
                       // Section 2
                       'section2_title' => getAllValueWithMeta('section2_title', $slug),
		 	  	];
		 	case 'course-listing': 
		 	  	return [
                        // Meta Data
                       'meta_title' => getAllValueWithMeta('meta_title', $slug),
                       'meta_description' => getAllValueWithMeta('meta_description', $slug),
                       'meta_keyword' => getAllValueWithMeta('meta_keyword', $slug),
                       
                       // Banner
          					   'page_title' => getAllValueWithMeta('page_title', $slug),
                       'banner_image' => getAllValueWithMeta('banner_image', $slug),

                       // Section - 1
                       'heading1' => getAllValueWithMeta('heading1', $slug),
                       'description1' => getAllValueWithMeta('description1', $slug),

                       // Section - 2
                       'heading2' => getAllValueWithMeta('heading2', $slug),
                       'description2' => getAllValueWithMeta('description2', $slug),
                       
                       // Section - 3
                       'heading3' => getAllValueWithMeta('heading3', $slug),
                       'description3' => getAllValueWithMeta('description3', $slug),

                       // Course/Camp Linking section
                       'section4_title' => getAllValueWithMeta('section4_title', $slug),
                       'section4_button_title' => getAllValueWithMeta('section4_button_title', $slug),
                       'section4_button_url' => getAllValueWithMeta('section4_button_url', $slug),

                       // PDF Upload
                       'pdf_upload' => getAllValueWithMeta('pdf_upload', $slug),
		 	  	];
        case 'contact-us': 
          return [
                        // Meta Data
                       'meta_title' => getAllValueWithMeta('meta_title', $slug),
                       'meta_description' => getAllValueWithMeta('meta_description', $slug),
                       'meta_keyword' => getAllValueWithMeta('meta_keyword', $slug),
                       
                       // Banner
                       'page_title' => getAllValueWithMeta('page_title', $slug),
                       'banner_image' => getAllValueWithMeta('banner_image', $slug),

                       // Section - 1
                       'heading1' => getAllValueWithMeta('heading1', $slug),
                       'description1' => getAllValueWithMeta('description1', $slug),

                       // Section - 2
                       'heading2' => getAllValueWithMeta('heading2', $slug),
                       'phone_number' => getAllValueWithMeta('phone_number', $slug),
                       'email' => getAllValueWithMeta('email', $slug),
                       
                       // Section - 3
                       'heading3' => getAllValueWithMeta('heading3', $slug),
                       'facebook' => getAllValueWithMeta('facebook', $slug),
                       'instagram' => getAllValueWithMeta('instagram', $slug),
                       'google' => getAllValueWithMeta('google', $slug),

                       // Course/Camp Linking section
                       'section4_title' => getAllValueWithMeta('section4_title', $slug),
                       'section4_button_title' => getAllValueWithMeta('section4_button_title', $slug),
                       'section4_button_url' => getAllValueWithMeta('section4_button_url', $slug),
          ];
        case 'early-bird': 
          return [    
                       // Early Bird Date & Time
                       'early_bird_date' => getAllValueWithMeta('early_bird_date', $slug),
                       'early_bird_time' => getAllValueWithMeta('early_bird_time', $slug),

                       // Percentage of categories
                       'tennis_percentage' => getAllValueWithMeta('tennis_percentage', $slug),
                       'football_percentage' => getAllValueWithMeta('football_percentage', $slug),
                       'school_percentage' => getAllValueWithMeta('school_percentage', $slug),
          ];
      case 'general-setting': 
          return [        
                      // Admin Email
                       'admin_email' => getAllValueWithMeta('admin_email', $slug),

                       // Website logo
                       'website_logo' => getAllValueWithMeta('website_logo', $slug),

                       // Social links
                       'facebook_link' => getAllValueWithMeta('facebook_link', $slug),
                       'instagram_link' => getAllValueWithMeta('instagram_link', $slug),
                       'google_link' => getAllValueWithMeta('google_link', $slug),

                       // Email
                       'website_email' => getAllValueWithMeta('website_email', $slug),

                       // Phone Number
                       'website_phone_number' => getAllValueWithMeta('website_phone_number', $slug),

                       // Footer Section
                       'footer_section1' => getAllValueWithMeta('footer_section1', $slug),
                       'newsletter_content' => getAllValueWithMeta('newsletter_content', $slug),

                       // Copyright Section
                       'copyright_section' => getAllValueWithMeta('copyright_section', $slug),
          ];
		 	case 'global-settings': 
          return [
                  'google_api_key' => getAllValueWithMeta('google_api_key', $slug),
                  'weather_api_key' => getAllValueWithMeta('weather_api_key', $slug),
                  'taxjar_api_key' => getAllValueWithMeta('taxjar_api_key', $slug),
                  'commission_fee_type' => getAllValueWithMeta('commission_fee_type', $slug),
                  'commission_fee_amount' => getAllValueWithMeta('commission_fee_amount', $slug),
                  'service_fee_type' => getAllValueWithMeta('service_fee_type', $slug),
                  'service_fee_amount' => getAllValueWithMeta('service_fee_amount', $slug),
          ];
      case 'paypal-credentials': 
          return [
                  'paypal_credentials' => getAllValueWithMeta('paypal_credentials', $slug)
          ];
      case 'stripe-credentials':
          return [
                  'stripe_credentials' => getAllValueWithMeta('stripe_credentials', $slug),
          ];
		 	default:
		 		# code...
		 		break;
		 }	 
		 
 }




     
}




















