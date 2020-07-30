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
		 	
		 	case 'course-listing': 
		 	  	return [
                        // Meta Data
                       'meta_title' => getAllValueWithMeta('meta_title', $slug),
                       'meta_description' => getAllValueWithMeta('meta_description', $slug),
                       'meta_keyword' => getAllValueWithMeta('meta_keyword', $slug),
                       
                       // Banner
          			       'page_title' => getAllValueWithMeta('page_title', $slug),
                       'banner_image' => getAllValueWithMeta('banner_image', $slug),

                       // Course/Camp Linking section
                       'section4_title' => getAllValueWithMeta('section4_title', $slug),
                       'section4_button_title' => getAllValueWithMeta('section4_button_title', $slug),
                       'section4_button_url' => getAllValueWithMeta('section4_button_url', $slug),

		 	  	];
          case 'football-course-listing': 
          return [
                        // Meta Data
                       'meta_title' => getAllValueWithMeta('meta_title', $slug),
                       'meta_description' => getAllValueWithMeta('meta_description', $slug),
                       'meta_keyword' => getAllValueWithMeta('meta_keyword', $slug),
                       
                       // Banner
                       'football_course_page_title' => getAllValueWithMeta('football_course_page_title', $slug),
                       'football_course_banner_image' => getAllValueWithMeta('football_course_banner_image', $slug),

                       // Course/Camp Linking section
                       'football_course_section4_title' => getAllValueWithMeta('football_course_section4_title', $slug),
                       'football_course_section4_button_title' => getAllValueWithMeta('football_course_section4_button_title', $slug),
                       'football_course_section4_button_url' => getAllValueWithMeta('football_course_section4_button_url', $slug),

          ];
          case 'tennis-course-listing': 
          return [
                        // Meta Data
                       'meta_title' => getAllValueWithMeta('meta_title', $slug),
                       'meta_description' => getAllValueWithMeta('meta_description', $slug),
                       'meta_keyword' => getAllValueWithMeta('meta_keyword', $slug),
                       
                       // Banner
                       'tennis_course_page_title' => getAllValueWithMeta('tennis_course_page_title', $slug),
                       'tennis_course_banner_image' => getAllValueWithMeta('tennis_course_banner_image', $slug),

                       // Course/Camp Linking section
                       'tennis_course_section4_title' => getAllValueWithMeta('tennis_course_section4_title', $slug),
                       'tennis_course_section4_button_title' => getAllValueWithMeta('tennis_course_section4_button_title', $slug),
                       'tennis_course_section4_button_url' => getAllValueWithMeta('tennis_course_section4_button_url', $slug),

          ];
          case 'school-course-listing': 
          return [
                        // Meta Data
                       'meta_title' => getAllValueWithMeta('meta_title', $slug),
                       'meta_description' => getAllValueWithMeta('meta_description', $slug),
                       'meta_keyword' => getAllValueWithMeta('meta_keyword', $slug),
                       
                       // Banner
                       'school_course_page_title' => getAllValueWithMeta('school_course_page_title', $slug),
                       'school_course_banner_image' => getAllValueWithMeta('school_course_banner_image', $slug),

                       // Course/Camp Linking section
                       'school_course_section4_title' => getAllValueWithMeta('school_course_section4_title', $slug),
                       'school_course_section4_button_title' => getAllValueWithMeta('school_course_section4_button_title', $slug),
                       'school_course_section4_button_url' => getAllValueWithMeta('school_course_section4_button_url', $slug),

          ];
        case 'camp-listing': 
          return [
                        // Meta Data
                       'meta_title' => getAllValueWithMeta('meta_title', $slug),
                       'meta_description' => getAllValueWithMeta('meta_description', $slug),
                       'meta_keyword' => getAllValueWithMeta('meta_keyword', $slug),

                       // logo
                       'camp_go_logo' => getAllValueWithMeta('camp_go_logo', $slug),
                       'camp_go_title' => getAllValueWithMeta('camp_go_title', $slug),
                       
                       // Banner
                       'camp_page_title' => getAllValueWithMeta('camp_page_title', $slug),
                       'camp_banner_image' => getAllValueWithMeta('camp_banner_image', $slug),

                       // Tab Section
                       'camp_tab_title' => getAllValueWithMeta('camp_tab_title', $slug),

                       'camp_tab1_image1' => getAllValueWithMeta('camp_tab1_image1', $slug),
                       'camp_tab1_image2' => getAllValueWithMeta('camp_tab1_image2', $slug),
                       'camp_tab1_image3' => getAllValueWithMeta('camp_tab1_image3', $slug),
                       'camp_tab1_description' => getAllValueWithMeta('camp_tab1_description', $slug),

                       'camp_tab2_title' => getAllValueWithMeta('camp_tab2_title', $slug),
                       'camp_tab2_image' => getAllValueWithMeta('camp_tab2_image', $slug),
                       'camp_tab2_description' => getAllValueWithMeta('camp_tab2_description', $slug),

                       // Tab - 3
                       'camp_tab3_image' => getAllValueWithMeta('camp_tab3_image', $slug),
                       'camp_tab3_description' => getAllValueWithMeta('camp_tab3_description', $slug),

                       // Tab - 4
                       'camp_tab4_title' => getAllValueWithMeta('camp_tab4_title', $slug),

                       // Activities Section
                       'act_heading' => getAllValueWithMeta('act_heading', $slug),
                       'act_sub_heading' => getAllValueWithMeta('act_sub_heading', $slug),

                       'act1_image' => getAllValueWithMeta('act1_image', $slug),
                       'act1_title' => getAllValueWithMeta('act1_title', $slug),
                       'act1_description' => getAllValueWithMeta('act1_description', $slug),

                       'act2_image' => getAllValueWithMeta('act2_image', $slug),
                       'act2_title' => getAllValueWithMeta('act2_title', $slug),
                       'act2_description' => getAllValueWithMeta('act2_description', $slug),

                       'act3_image' => getAllValueWithMeta('act3_image', $slug),
                       'act3_title' => getAllValueWithMeta('act3_title', $slug),
                       'act3_description' => getAllValueWithMeta('act3_description', $slug),

                       'act4_image' => getAllValueWithMeta('act4_image', $slug),
                       'act4_title' => getAllValueWithMeta('act4_title', $slug),
                       'act4_description' => getAllValueWithMeta('act4_description', $slug),

                       'act5_image' => getAllValueWithMeta('act5_image', $slug),
                       'act5_title' => getAllValueWithMeta('act5_title', $slug),
                       'act5_description' => getAllValueWithMeta('act5_description', $slug),

                       // Section - 2
                       'camp_heading2' => getAllValueWithMeta('camp_heading2', $slug),
                       'camp_description2' => getAllValueWithMeta('camp_description2', $slug),

                       // Section - 3
                       'camp_heading3' => getAllValueWithMeta('camp_heading3', $slug),
                       'camp_description3' => getAllValueWithMeta('camp_description3', $slug),
                       'camp_image3' => getAllValueWithMeta('camp_image3', $slug),

                       // Section - 4
                       'camp_image4' => getAllValueWithMeta('camp_image4', $slug),
                       'camp_link_title4' => getAllValueWithMeta('camp_link_title4', $slug),
                       'camp_link4' => getAllValueWithMeta('camp_link4', $slug),

                       // Section - 5
                       'camp_heading5' => getAllValueWithMeta('camp_heading5', $slug),
                       'camp_description5' => getAllValueWithMeta('camp_description5', $slug),

                       // Course/Camp Linking section
                       'camp_title' => getAllValueWithMeta('camp_title', $slug),
                       'camp_button_title' => getAllValueWithMeta('camp_button_title', $slug),
                       'camp_button_url' => getAllValueWithMeta('camp_button_url', $slug),

          ];
        case 'camp-detail': 
          return [
                        // Meta Data
                       'meta_title' => getAllValueWithMeta('meta_title', $slug),
                       'meta_description' => getAllValueWithMeta('meta_description', $slug),
                       'meta_keyword' => getAllValueWithMeta('meta_keyword', $slug),
                       
                       // Logo
                       'camp_detail_logo' => getAllValueWithMeta('camp_detail_logo', $slug),

                       // Banner
                       'camp_detail_title' => getAllValueWithMeta('camp_detail_title', $slug),
                       'camp_detail_banner_image' => getAllValueWithMeta('camp_detail_banner_image', $slug),

                       // Course/Camp Linking section
                       'camp_detail_title' => getAllValueWithMeta('camp_detail_title', $slug),
                       'camp_detail_button_title' => getAllValueWithMeta('camp_detail_button_title', $slug),
                       'camp_detail_button_url' => getAllValueWithMeta('camp_detail_button_url', $slug),
          ];
        case 'book-a-camp': 
          return [
                        // Meta Data
                       'meta_title' => getAllValueWithMeta('meta_title', $slug),
                       'meta_description' => getAllValueWithMeta('meta_description', $slug),
                       'meta_keyword' => getAllValueWithMeta('meta_keyword', $slug),
                       
                       // Banner
                       'book_camp_title' => getAllValueWithMeta('book_camp_title', $slug),
                       'book_camp_banner_image' => getAllValueWithMeta('book_camp_banner_image', $slug),

                       // Course/Camp Linking section
                       'book_camp_box_title' => getAllValueWithMeta('book_camp_box_title', $slug),
                       'book_camp_button_title' => getAllValueWithMeta('book_camp_button_title', $slug),
                       'book_camp_button_url' => getAllValueWithMeta('book_camp_button_url', $slug),
          ];
        case 'tennis-landing': 
          return [
                        // Meta Data
                       'meta_title' => getAllValueWithMeta('meta_title', $slug),
                       'meta_description' => getAllValueWithMeta('meta_description', $slug),
                       'meta_keyword' => getAllValueWithMeta('meta_keyword', $slug),

                       // logo
                       'ten_lan_camp_go_logo' => getAllValueWithMeta('ten_lan_camp_go_logo', $slug),
                       'ten_lan_camp_go_title' => getAllValueWithMeta('ten_lan_camp_go_title', $slug),
                       
                       // Banner
                       'ten_lan_camp_page_title' => getAllValueWithMeta('ten_lan_camp_page_title', $slug),
                       'ten_lan_camp_banner_image' => getAllValueWithMeta('ten_lan_camp_banner_image', $slug),

                       // Tab's Title
                       'ten_lan_tab_title1' => getAllValueWithMeta('ten_lan_tab_title1', $slug),
                       'ten_lan_tab_title2' => getAllValueWithMeta('ten_lan_tab_title2', $slug),
                       'ten_lan_tab_title3' => getAllValueWithMeta('ten_lan_tab_title3', $slug),
                       'ten_lan_tab_title4' => getAllValueWithMeta('ten_lan_tab_title4', $slug),

                       // Tab Section
                       'ten_lan_camp_tab1_image1' => getAllValueWithMeta('ten_lan_camp_tab1_image1', $slug),
                       'ten_lan_camp_tab1_image2' => getAllValueWithMeta('ten_lan_camp_tab1_image2', $slug),
                       'ten_lan_camp_tab1_image3' => getAllValueWithMeta('ten_lan_camp_tab1_image3', $slug),
                       'ten_lan_camp_tab1_description' => getAllValueWithMeta('ten_lan_camp_tab1_description', $slug),

                       'ten_lan_camp_tab2_image' => getAllValueWithMeta('ten_lan_camp_tab2_image', $slug),
                       'ten_lan_camp_tab2_description' => getAllValueWithMeta('ten_lan_camp_tab2_description', $slug),

                       // Tab - 3
                       'ten_lan_camp_tab3_description' => getAllValueWithMeta('ten_lan_camp_tab3_description', $slug),
                       'ten_lan_btn' => getAllValueWithMeta('ten_lan_btn', $slug),
                       'ten_lan_btn_link' => getAllValueWithMeta('ten_lan_btn_link', $slug),

                       // Tab - 4
                       'ten_lan_camp_tab4_title' => getAllValueWithMeta('ten_lan_camp_tab4_title', $slug),

                       // Activities Section
                       'ten_lan_act_heading' => getAllValueWithMeta('ten_lan_act_heading', $slug),
                       'ten_lan_act_sub_heading' => getAllValueWithMeta('ten_lan_act_sub_heading', $slug),

                       'ten_lan_act1_image' => getAllValueWithMeta('ten_lan_act1_image', $slug),
                       'ten_lan_act1_title' => getAllValueWithMeta('ten_lan_act1_title', $slug),
                       'ten_lan_act1_description' => getAllValueWithMeta('ten_lan_act1_description', $slug),

                       'ten_lan_act2_image' => getAllValueWithMeta('ten_lan_act2_image', $slug),
                       'ten_lan_act2_title' => getAllValueWithMeta('ten_lan_act2_title', $slug),
                       'ten_lan_act2_description' => getAllValueWithMeta('ten_lan_act2_description', $slug),

                       'ten_lan_act3_image' => getAllValueWithMeta('ten_lan_act3_image', $slug),
                       'ten_lan_act3_title' => getAllValueWithMeta('ten_lan_act3_title', $slug),
                       'ten_lan_act3_description' => getAllValueWithMeta('ten_lan_act3_description', $slug),

                       'ten_lan_act4_image' => getAllValueWithMeta('ten_lan_act4_image', $slug),
                       'ten_lan_act4_title' => getAllValueWithMeta('ten_lan_act4_title', $slug),
                       'ten_lan_act4_description' => getAllValueWithMeta('ten_lan_act4_description', $slug),

                       'ten_lan_act5_image' => getAllValueWithMeta('ten_lan_act5_image', $slug),
                       'ten_lan_act5_title' => getAllValueWithMeta('ten_lan_act5_title', $slug),
                       'ten_lan_act5_description' => getAllValueWithMeta('ten_lan_act5_description', $slug),

                       // Section - 2
                       'ten_lan_camp_heading2' => getAllValueWithMeta('ten_lan_camp_heading2', $slug),
                       'ten_lan_camp_description2' => getAllValueWithMeta('ten_lan_camp_description2', $slug),

                       // Course/Camp Linking section
                       'ten_lan_camp_title' => getAllValueWithMeta('ten_lan_camp_title', $slug),
                       'ten_lan_camp_button_title' => getAllValueWithMeta('ten_lan_camp_button_title', $slug),
                       'ten_lan_camp_button_url' => getAllValueWithMeta('ten_lan_camp_button_url', $slug),

          ];
        case 'school-landing': 
          return [
                        // Meta Data
                       'meta_title' => getAllValueWithMeta('meta_title', $slug),
                       'meta_description' => getAllValueWithMeta('meta_description', $slug),
                       'meta_keyword' => getAllValueWithMeta('meta_keyword', $slug),

                       // logo
                       'sch_lan_camp_go_logo' => getAllValueWithMeta('sch_lan_camp_go_logo', $slug),
                       'sch_lan_camp_go_title' => getAllValueWithMeta('sch_lan_camp_go_title', $slug),
                       
                       // Banner
                       'sch_lan_camp_page_title' => getAllValueWithMeta('sch_lan_camp_page_title', $slug),
                       'sch_lan_camp_banner_image' => getAllValueWithMeta('sch_lan_camp_banner_image', $slug),

                       // Tab's Title
                       'sch_lan_tab_title1' => getAllValueWithMeta('sch_lan_tab_title1', $slug),
                       'sch_lan_tab_title2' => getAllValueWithMeta('sch_lan_tab_title2', $slug),
                       'sch_lan_tab_title3' => getAllValueWithMeta('sch_lan_tab_title3', $slug),
                       'sch_lan_tab_title4' => getAllValueWithMeta('sch_lan_tab_title4', $slug),

                       // Tab Section
                       'sch_lan_camp_tab1_image1' => getAllValueWithMeta('sch_lan_camp_tab1_image1', $slug),
                       'sch_lan_camp_tab1_image2' => getAllValueWithMeta('sch_lan_camp_tab1_image2', $slug),
                       'sch_lan_camp_tab1_image3' => getAllValueWithMeta('sch_lan_camp_tab1_image3', $slug),
                       'sch_lan_camp_tab1_description' => getAllValueWithMeta('sch_lan_camp_tab1_description', $slug),

                       'sch_lan_camp_tab2_title' => getAllValueWithMeta('sch_lan_camp_tab2_title', $slug),
                       'sch_lan_camp_tab2_image' => getAllValueWithMeta('sch_lan_camp_tab2_image', $slug),
                       'sch_lan_camp_tab2_description' => getAllValueWithMeta('sch_lan_camp_tab2_description', $slug),

                       // Tab - 3
                       'sch_lan_camp_tab3_description' => getAllValueWithMeta('sch_lan_camp_tab3_description', $slug),
                       'sch_lan_btn' => getAllValueWithMeta('sch_lan_btn', $slug),
                       'sch_lan_btn_link' => getAllValueWithMeta('sch_lan_btn_link', $slug),

                       // Tab - 4
                       'sch_lan_camp_tab4_title' => getAllValueWithMeta('sch_lan_camp_tab4_title', $slug),

                       // Activities Section
                       'sch_lan_act_heading' => getAllValueWithMeta('sch_lan_act_heading', $slug),
                       'sch_lan_act_sub_heading' => getAllValueWithMeta('sch_lan_act_sub_heading', $slug),

                       'sch_lan_act1_image' => getAllValueWithMeta('sch_lan_act1_image', $slug),
                       'sch_lan_act1_title' => getAllValueWithMeta('sch_lan_act1_title', $slug),
                       'sch_lan_act1_description' => getAllValueWithMeta('sch_lan_act1_description', $slug),

                       'sch_lan_act2_image' => getAllValueWithMeta('sch_lan_act2_image', $slug),
                       'sch_lan_act2_title' => getAllValueWithMeta('sch_lan_act2_title', $slug),
                       'sch_lan_act2_description' => getAllValueWithMeta('sch_lan_act2_description', $slug),

                       'sch_lan_act3_image' => getAllValueWithMeta('sch_lan_act3_image', $slug),
                       'sch_lan_act3_title' => getAllValueWithMeta('sch_lan_act3_title', $slug),
                       'sch_lan_act3_description' => getAllValueWithMeta('sch_lan_act3_description', $slug),

                       'sch_lan_act4_image' => getAllValueWithMeta('sch_lan_act4_image', $slug),
                       'sch_lan_act4_title' => getAllValueWithMeta('sch_lan_act4_title', $slug),
                       'sch_lan_act4_description' => getAllValueWithMeta('sch_lan_act4_description', $slug),

                       'sch_lan_act5_image' => getAllValueWithMeta('sch_lan_act5_image', $slug),
                       'sch_lan_act5_title' => getAllValueWithMeta('sch_lan_act5_title', $slug),
                       'sch_lan_act5_description' => getAllValueWithMeta('sch_lan_act5_description', $slug),

                       // Section - 2
                       'sch_lan_camp_heading2' => getAllValueWithMeta('sch_lan_camp_heading2', $slug),
                       'sch_lan_camp_description2' => getAllValueWithMeta('sch_lan_camp_description2', $slug),

                       // Section - 3
                       'sch_lan_camp_heading3' => getAllValueWithMeta('sch_lan_camp_heading3', $slug),
                       'sch_lan_camp_description3' => getAllValueWithMeta('sch_lan_camp_description3', $slug),
                       'sch_lan_camp_image3' => getAllValueWithMeta('sch_lan_camp_image3', $slug),

                       // Section - 4
                       'sch_lan_camp_image4' => getAllValueWithMeta('sch_lan_camp_image4', $slug),
                       'sch_lan_camp_link_title4' => getAllValueWithMeta('sch_lan_camp_link_title4', $slug),
                       'sch_lan_camp_link4' => getAllValueWithMeta('sch_lan_camp_link4', $slug),

                       // Section - 5
                       'sch_lan_camp_heading5' => getAllValueWithMeta('sch_lan_camp_heading5', $slug),
                       'sch_lan_camp_description5' => getAllValueWithMeta('sch_lan_camp_description5', $slug),

                       // Course/Camp Linking section
                       'sch_lan_camp_title' => getAllValueWithMeta('sch_lan_camp_title', $slug),
                       'sch_lan_camp_button_title' => getAllValueWithMeta('sch_lan_camp_button_title', $slug),
                       'sch_lan_camp_button_url' => getAllValueWithMeta('sch_lan_camp_button_url', $slug),

          ];
        case 'football-landing': 
          return [
                        // Meta Data
                       'meta_title' => getAllValueWithMeta('meta_title', $slug),
                       'meta_description' => getAllValueWithMeta('meta_description', $slug),
                       'meta_keyword' => getAllValueWithMeta('meta_keyword', $slug),

                       // logo
                       'foot_lan_camp_go_logo' => getAllValueWithMeta('foot_lan_camp_go_logo', $slug),
                       'foot_lan_camp_go_title' => getAllValueWithMeta('foot_lan_camp_go_title', $slug),
                       
                       // Banner
                       'foot_lan_camp_page_title' => getAllValueWithMeta('foot_lan_camp_page_title', $slug),
                       'foot_lan_camp_banner_image' => getAllValueWithMeta('foot_lan_camp_banner_image', $slug),

                       // Tab's Title
                       'foot_lan_tab_title1' => getAllValueWithMeta('foot_lan_tab_title1', $slug),
                       'foot_lan_tab_title2' => getAllValueWithMeta('foot_lan_tab_title2', $slug),
                       'foot_lan_tab_title3' => getAllValueWithMeta('foot_lan_tab_title3', $slug),
                       'foot_lan_tab_title4' => getAllValueWithMeta('foot_lan_tab_title4', $slug),

                       // Tab Section
                       'foot_lan_camp_tab1_image1' => getAllValueWithMeta('foot_lan_camp_tab1_image1', $slug),
                       'foot_lan_camp_tab1_image2' => getAllValueWithMeta('foot_lan_camp_tab1_image2', $slug),
                       'foot_lan_camp_tab1_image3' => getAllValueWithMeta('foot_lan_camp_tab1_image3', $slug),
                       'foot_lan_camp_tab1_description' => getAllValueWithMeta('foot_lan_camp_tab1_description', $slug),

                       'foot_lan_camp_tab2_image' => getAllValueWithMeta('foot_lan_camp_tab2_image', $slug),
                       'foot_lan_camp_tab2_description' => getAllValueWithMeta('foot_lan_camp_tab2_description', $slug),

                       // Tab - 3
                       'foot_lan_camp_tab3_description' => getAllValueWithMeta('foot_lan_camp_tab3_description', $slug),
                       'foot_lan_btn' => getAllValueWithMeta('foot_lan_btn', $slug),
                       'foot_lan_btn_link' => getAllValueWithMeta('foot_lan_btn_link', $slug),

                       // Tab - 4
                       'foot_lan_camp_tab4_title' => getAllValueWithMeta('foot_lan_camp_tab4_title', $slug),

                       // Activities Section
                       'foot_lan_act_heading' => getAllValueWithMeta('foot_lan_act_heading', $slug),
                       'foot_lan_act_sub_heading' => getAllValueWithMeta('foot_lan_act_sub_heading', $slug),

                       'foot_lan_act1_image' => getAllValueWithMeta('foot_lan_act1_image', $slug),
                       'foot_lan_act1_title' => getAllValueWithMeta('foot_lan_act1_title', $slug),
                       'foot_lan_act1_description' => getAllValueWithMeta('foot_lan_act1_description', $slug),

                       'foot_lan_act2_image' => getAllValueWithMeta('foot_lan_act2_image', $slug),
                       'foot_lan_act2_title' => getAllValueWithMeta('foot_lan_act2_title', $slug),
                       'foot_lan_act2_description' => getAllValueWithMeta('foot_lan_act2_description', $slug),

                       'foot_lan_act3_image' => getAllValueWithMeta('foot_lan_act3_image', $slug),
                       'foot_lan_act3_title' => getAllValueWithMeta('foot_lan_act3_title', $slug),
                       'foot_lan_act3_description' => getAllValueWithMeta('foot_lan_act3_description', $slug),

                       'foot_lan_act4_image' => getAllValueWithMeta('foot_lan_act4_image', $slug),
                       'foot_lan_act4_title' => getAllValueWithMeta('foot_lan_act4_title', $slug),
                       'foot_lan_act4_description' => getAllValueWithMeta('foot_lan_act4_description', $slug),

                       'foot_lan_act5_image' => getAllValueWithMeta('foot_lan_act5_image', $slug),
                       'foot_lan_act5_title' => getAllValueWithMeta('foot_lan_act5_title', $slug),
                       'foot_lan_act5_description' => getAllValueWithMeta('foot_lan_act5_description', $slug),

                       // Section - 2
                       'foot_lan_camp_heading2' => getAllValueWithMeta('foot_lan_camp_heading2', $slug),
                       'foot_lan_camp_description2' => getAllValueWithMeta('foot_lan_camp_description2', $slug),

                       // Section - 3
                       'foot_lan_camp_heading3' => getAllValueWithMeta('foot_lan_camp_heading3', $slug),
                       'foot_lan_camp_description3' => getAllValueWithMeta('foot_lan_camp_description3', $slug),
                       'foot_lan_camp_image3' => getAllValueWithMeta('foot_lan_camp_image3', $slug),

                       // Section - 4
                       'foot_lan_camp_image4' => getAllValueWithMeta('foot_lan_camp_image4', $slug),
                       'foot_lan_camp_link_title4' => getAllValueWithMeta('foot_lan_camp_link_title4', $slug),
                       'foot_lan_camp_link4' => getAllValueWithMeta('foot_lan_camp_link4', $slug),

                       // Section - 5
                       'foot_lan_camp_heading5' => getAllValueWithMeta('foot_lan_camp_heading5', $slug),
                       'foot_lan_camp_description5' => getAllValueWithMeta('foot_lan_camp_description5', $slug),

                       // Course/Camp Linking section
                       'foot_lan_camp_title' => getAllValueWithMeta('foot_lan_camp_title', $slug),
                       'foot_lan_camp_button_title' => getAllValueWithMeta('foot_lan_camp_button_title', $slug),
                       'foot_lan_camp_button_url' => getAllValueWithMeta('foot_lan_camp_button_url', $slug),

          ];
        case 'tennis-pro': 
          return [
                        // Meta Data
                       'meta_title' => getAllValueWithMeta('meta_title', $slug),
                       'meta_description' => getAllValueWithMeta('meta_description', $slug),
                       'meta_keyword' => getAllValueWithMeta('meta_keyword', $slug),
                       
                       // Banner
                       'tennis_pro_page_title' => getAllValueWithMeta('tennis_pro_page_title', $slug),
                       'tennis_pro_banner_image' => getAllValueWithMeta('tennis_pro_banner_image', $slug),

                       // Image Section
                       'tennis_pro_img1' => getAllValueWithMeta('tennis_pro_img1', $slug),
                       'tennis_pro_img2' => getAllValueWithMeta('tennis_pro_img2', $slug),

                       // Section-1 Section
                       'tennis_pro_sec1_desc' => getAllValueWithMeta('tennis_pro_sec1_desc', $slug),
                       'tennis_pro_sec1_img1' => getAllValueWithMeta('tennis_pro_sec1_img1', $slug),
                       'tennis_pro_sec1_img1_link' => getAllValueWithMeta('tennis_pro_sec1_img1_link', $slug),
                       'tennis_pro_sec1_img2' => getAllValueWithMeta('tennis_pro_sec1_img2', $slug),
                       'tennis_pro_sec1_img2_link' => getAllValueWithMeta('tennis_pro_sec1_img2_link', $slug),
                       'tennis_pro_sec1_btn'  => getAllValueWithMeta('tennis_pro_sec1_btn', $slug),
                       'tennis_pro_sec1_link' => getAllValueWithMeta('tennis_pro_sec1_link', $slug),

                       // How it works
                       'tennis_pro_htw_title' => getAllValueWithMeta('tennis_pro_htw_title', $slug),
                       'tennis_pro_htw_desc' => getAllValueWithMeta('tennis_pro_htw_desc', $slug),

                       // Last Section
                       'ten_pro_lastsec_text' => getAllValueWithMeta('ten_pro_lastsec_text', $slug),
                       'ten_pro_lastsec_btn1_text' => getAllValueWithMeta('ten_pro_lastsec_btn1_text', $slug),
                       'ten_pro_lastsec_btn1_link' => getAllValueWithMeta('ten_pro_lastsec_btn1_link', $slug),
                       'ten_pro_lastsec_btn2_text' => getAllValueWithMeta('ten_pro_lastsec_btn2_text', $slug),
                       'ten_pro_lastsec_btn2_link' => getAllValueWithMeta('ten_pro_lastsec_btn2_link', $slug),

                       // Course/Camp Linking section
                       'tennis_pro_sec_title' => getAllValueWithMeta('tennis_pro_sec_title', $slug),
                       'tennis_pro_sec_button_title' => getAllValueWithMeta('tennis_pro_sec_button_title', $slug),
                       'tennis_pro_sec_button_url' => getAllValueWithMeta('tennis_pro_sec_button_url', $slug),

          ];
        case 'badges': 
          return [
                       // Meta Data
                       'meta_title' => getAllValueWithMeta('meta_title', $slug),
                       'meta_description' => getAllValueWithMeta('meta_description', $slug),
                       'meta_keyword' => getAllValueWithMeta('meta_keyword', $slug),

                       // Banner
                       'badges_heading' => getAllValueWithMeta('badges_heading', $slug),
                       'badges_banner_img' => getAllValueWithMeta('badges_banner_img', $slug),

                       // Description of goals section
                       'badges_desc' => getAllValueWithMeta('badges_desc', $slug),

                       // Description of goals section
                       'goals_desc' => getAllValueWithMeta('goals_desc', $slug),

                       // Basic detils of goals section
                       'specific_title' => getAllValueWithMeta('specific_title', $slug),
                       'specific_desc' => getAllValueWithMeta('specific_desc', $slug),

                       'measurable_title' => getAllValueWithMeta('measurable_title', $slug),
                       'measurable_desc' => getAllValueWithMeta('measurable_desc', $slug),

                       'achievable_title' => getAllValueWithMeta('achievable_title', $slug),
                       'achievable_desc' => getAllValueWithMeta('achievable_desc', $slug),

                       'realistic_title' => getAllValueWithMeta('realistic_title', $slug),
                       'realistic_desc' => getAllValueWithMeta('realistic_desc', $slug),

                       'timed_title' => getAllValueWithMeta('timed_title', $slug),
                       'timed_desc' => getAllValueWithMeta('timed_desc', $slug),

                       'confirmation_msg' => getAllValueWithMeta('confirmation_msg', $slug),
                       'goals_date' => getAllValueWithMeta('goals_date', $slug),

                       // Course/Camp Linking section
                       'badges_sec_title' => getAllValueWithMeta('badges_sec_title', $slug),
                       'badges_sec_button_title' => getAllValueWithMeta('badges_sec_button_title', $slug),
                       'badges_sec_button_url' => getAllValueWithMeta('badges_sec_button_url', $slug),
          ];
        case 'coach-listing': 
          return [
                       // Head Section 
                       'coach_listing_heading' => getAllValueWithMeta('coach_listing_heading', $slug),
                       'coach_listing_desc' => getAllValueWithMeta('coach_listing_desc', $slug),
          ];
        case 'my-profile': 
          return [
                       // Banner
                       'form_head_content' => getAllValueWithMeta('form_head_content', $slug),
                       'form_footer_content' => getAllValueWithMeta('form_footer_content', $slug),
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
                       'early_bird_enable' => getAllValueWithMeta('early_bird_enable', $slug),

                       // Percentage of categories
                       'tennis_percentage' => getAllValueWithMeta('tennis_percentage', $slug),
                       'check_tennis_percentage' => getAllValueWithMeta('check_tennis_percentage', $slug),
                       'football_percentage' => getAllValueWithMeta('football_percentage', $slug),
                       'check_football_percentage' => getAllValueWithMeta('check_football_percentage', $slug),
                       'school_percentage' => getAllValueWithMeta('school_percentage', $slug),
                       'check_school_percentage' => getAllValueWithMeta('check_school_percentage', $slug),
          ];
        case 'report': 
          return [    
                       // Child care popup
                       'report1_content' => getAllValueWithMeta('report1_content', $slug),
                       'report2_content' => getAllValueWithMeta('report2_content', $slug),
                       'report_detail' => getAllValueWithMeta('report_detail', $slug),
          ];
        case 'child-care-popup': 
          return [    
                       // Child care popup
                       'childcare_heading' => getAllValueWithMeta('childcare_heading', $slug),
                       'childcare_subheading' => getAllValueWithMeta('childcare_subheading', $slug),
                       'childcare_content' => getAllValueWithMeta('childcare_content', $slug),
                       'providers_heading' => getAllValueWithMeta('providers_heading', $slug),
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
                       'google_analytics' => getAllValueWithMeta('google_analytics', $slug),

                       // Mailchimp API Key
                       'mailchimp_api_key' => getAllValueWithMeta('mailchimp_api_key', $slug),
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

