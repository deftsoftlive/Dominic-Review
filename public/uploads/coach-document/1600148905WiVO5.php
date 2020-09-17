<?php
/**
 * Theme functions and definitions.
 *
 * Sets up the theme and provides some helper functions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package OceanWP WordPress theme
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Core Constants.
define( 'OCEANWP_THEME_DIR', get_template_directory() );
define( 'OCEANWP_THEME_URI', get_template_directory_uri() );

/**
 * OceanWP theme class
 */
final class OCEANWP_Theme_Class {

	/**
	 * Main Theme Class Constructor
	 *
	 * @since   1.0.0
	 */
	public function __construct() {

		// Define constants.
		add_action( 'after_setup_theme', array( 'OCEANWP_Theme_Class', 'constants' ), 0 );

		// Load all core theme function files.
		add_action( 'after_setup_theme', array( 'OCEANWP_Theme_Class', 'include_functions' ), 1 );

		// Load configuration classes.
		add_action( 'after_setup_theme', array( 'OCEANWP_Theme_Class', 'configs' ), 3 );

		// Load framework classes.
		add_action( 'after_setup_theme', array( 'OCEANWP_Theme_Class', 'classes' ), 4 );

		// Setup theme => add_theme_support, register_nav_menus, load_theme_textdomain, etc.
		add_action( 'after_setup_theme', array( 'OCEANWP_Theme_Class', 'theme_setup' ), 10 );

		// Setup theme => Generate the custom CSS file.
		add_action( 'admin_bar_init', array( 'OCEANWP_Theme_Class', 'save_customizer_css_in_file' ), 9999 );

		// register sidebar widget areas.
		add_action( 'widgets_init', array( 'OCEANWP_Theme_Class', 'register_sidebars' ) );

		// Registers theme_mod strings into Polylang.
		if ( class_exists( 'Polylang' ) ) {
			add_action( 'after_setup_theme', array( 'OCEANWP_Theme_Class', 'polylang_register_string' ) );
		}

		/** Admin only actions */
		if ( is_admin() ) {

			// Load scripts in the WP admin.
			add_action( 'admin_enqueue_scripts', array( 'OCEANWP_Theme_Class', 'admin_scripts' ) );

			// Outputs custom CSS for the admin.
			add_action( 'admin_head', array( 'OCEANWP_Theme_Class', 'admin_inline_css' ) );

			/** Non Admin actions */
		} else {

			// Load theme CSS.
			add_action( 'wp_enqueue_scripts', array( 'OCEANWP_Theme_Class', 'theme_css' ) );

			// Load his file in last.
			add_action( 'wp_enqueue_scripts', array( 'OCEANWP_Theme_Class', 'custom_style_css' ), 9999 );

			// Remove Customizer CSS script from Front-end.
			add_action( 'init', array( 'OCEANWP_Theme_Class', 'remove_customizer_custom_css' ) );

			// Load theme js.
			add_action( 'wp_enqueue_scripts', array( 'OCEANWP_Theme_Class', 'theme_js' ) );

			// Add a pingback url auto-discovery header for singularly identifiable articles.
			add_action( 'wp_head', array( 'OCEANWP_Theme_Class', 'pingback_header' ), 1 );

			// Add meta viewport tag to header.
			add_action( 'wp_head', array( 'OCEANWP_Theme_Class', 'meta_viewport' ), 1 );

			// Add an X-UA-Compatible header.
			add_filter( 'wp_headers', array( 'OCEANWP_Theme_Class', 'x_ua_compatible_headers' ) );

			// Loads html5 shiv script.
			add_action( 'wp_head', array( 'OCEANWP_Theme_Class', 'html5_shiv' ) );

			// Outputs custom CSS to the head.
			add_action( 'wp_head', array( 'OCEANWP_Theme_Class', 'custom_css' ), 9999 );

			// Minify the WP custom CSS because WordPress doesn't do it by default.
			add_filter( 'wp_get_custom_css', array( 'OCEANWP_Theme_Class', 'minify_custom_css' ) );

			// Alter the search posts per page.
			add_action( 'pre_get_posts', array( 'OCEANWP_Theme_Class', 'search_posts_per_page' ) );

			// Alter WP categories widget to display count inside a span.
			add_filter( 'wp_list_categories', array( 'OCEANWP_Theme_Class', 'wp_list_categories_args' ) );

			// Add a responsive wrapper to the WordPress oembed output.
			add_filter( 'embed_oembed_html', array( 'OCEANWP_Theme_Class', 'add_responsive_wrap_to_oembeds' ), 99, 4 );

			// Adds classes the post class.
			add_filter( 'post_class', array( 'OCEANWP_Theme_Class', 'post_class' ) );

			// Add schema markup to the authors post link.
			add_filter( 'the_author_posts_link', array( 'OCEANWP_Theme_Class', 'the_author_posts_link' ) );

			// Add support for Elementor Pro locations.
			add_action( 'elementor/theme/register_locations', array( 'OCEANWP_Theme_Class', 'register_elementor_locations' ) );

			// Remove the default lightbox script for the beaver builder plugin.
			add_filter( 'fl_builder_override_lightbox', array( 'OCEANWP_Theme_Class', 'remove_bb_lightbox' ) );

		}

	}

	/**
	 * Define Constants
	 *
	 * @since   1.0.0
	 */
	public static function constants() {

		$version = self::theme_version();

		// Theme version.
		define( 'OCEANWP_THEME_VERSION', $version );

		// Javascript and CSS Paths.
		define( 'OCEANWP_JS_DIR_URI', OCEANWP_THEME_URI . '/assets/js/' );
		define( 'OCEANWP_CSS_DIR_URI', OCEANWP_THEME_URI . '/assets/css/' );

		// Include Paths.
		define( 'OCEANWP_INC_DIR', OCEANWP_THEME_DIR . '/inc/' );
		define( 'OCEANWP_INC_DIR_URI', OCEANWP_THEME_URI . '/inc/' );

		// Check if plugins are active.
		define( 'OCEAN_EXTRA_ACTIVE', class_exists( 'Ocean_Extra' ) );
		define( 'OCEANWP_ELEMENTOR_ACTIVE', class_exists( 'Elementor\Plugin' ) );
		define( 'OCEANWP_BEAVER_BUILDER_ACTIVE', class_exists( 'FLBuilder' ) );
		define( 'OCEANWP_WOOCOMMERCE_ACTIVE', class_exists( 'WooCommerce' ) );
		define( 'OCEANWP_EDD_ACTIVE', class_exists( 'Easy_Digital_Downloads' ) );
		define( 'OCEANWP_LIFTERLMS_ACTIVE', class_exists( 'LifterLMS' ) );
		define( 'OCEANWP_ALNP_ACTIVE', class_exists( 'Auto_Load_Next_Post' ) );
		define( 'OCEANWP_LEARNDASH_ACTIVE', class_exists( 'SFWD_LMS' ) );
	}

	/**
	 * Load all core theme function files
	 *
	 * @since 1.0.0
	 */
	public static function include_functions() {
		$dir = OCEANWP_INC_DIR;
		require_once $dir . 'helpers.php';
		require_once $dir . 'header-content.php';
		require_once $dir . 'oceanwp-strings.php';
		require_once $dir . 'customizer/controls/typography/webfonts.php';
		require_once $dir . 'walker/init.php';
		require_once $dir . 'walker/menu-walker.php';
		require_once $dir . 'third/class-gutenberg.php';
		require_once $dir . 'third/class-elementor.php';
		require_once $dir . 'third/class-beaver-themer.php';
		require_once $dir . 'third/class-bbpress.php';
		require_once $dir . 'third/class-buddypress.php';
		require_once $dir . 'third/class-lifterlms.php';
		require_once $dir . 'third/class-learndash.php';
		require_once $dir . 'third/class-sensei.php';
		require_once $dir . 'third/class-social-login.php';
	}

	/**
	 * Configs for 3rd party plugins.
	 *
	 * @since 1.0.0
	 */
	public static function configs() {

		$dir = OCEANWP_INC_DIR;

		// WooCommerce.
		if ( OCEANWP_WOOCOMMERCE_ACTIVE ) {
			require_once $dir . 'woocommerce/woocommerce-config.php';
		}

		// Easy Digital Downloads.
		if ( OCEANWP_EDD_ACTIVE ) {
			require_once $dir . 'edd/edd-config.php';
		}
	}

	/**
	 * Returns current theme version
	 *
	 * @since   1.0.0
	 */
	public static function theme_version() {

		// Get theme data.
		$theme = wp_get_theme();

		// Return theme version.
		return $theme->get( 'Version' );

	}

	/**
	 * Compare WordPress version
	 *
	 * @access public
	 * @since 1.8.3
	 * @param  string $version - A WordPress version to compare against current version.
	 * @return boolean
	 */
	public static function is_wp_version( $version = '5.4' ) {

		global $wp_version;

		// WordPress version.
		return version_compare( strtolower( $wp_version ), strtolower( $version ), '>=' );

	}

	/**
	 * Load theme classes
	 *
	 * @since   1.0.0
	 */
	public static function classes() {

		// Admin only classes.
		if ( is_admin() ) {

			// Recommend plugins.
			require_once OCEANWP_INC_DIR . 'plugins/class-tgm-plugin-activation.php';
			require_once OCEANWP_INC_DIR . 'plugins/tgm-plugin-activation.php';

			// Front-end classes.
		} else {

			// Breadcrumbs class.
			require_once OCEANWP_INC_DIR . 'breadcrumbs.php';

		}

		// Customizer class.
		require_once OCEANWP_INC_DIR . 'customizer/customizer.php';

	}

	/**
	 * Theme Setup
	 *
	 * @since   1.0.0
	 */
	public static function theme_setup() {

		// Load text domain.
		load_theme_textdomain( 'oceanwp', OCEANWP_THEME_DIR . '/languages' );

		// Get globals.
		global $content_width;

		// Set content width based on theme's default design.
		if ( ! isset( $content_width ) ) {
			$content_width = 1200;
		}

		// Register navigation menus.
		register_nav_menus(
			array(
				'topbar_menu' => esc_html__( 'Top Bar', 'oceanwp' ),
				'main_menu'   => esc_html__( 'Main', 'oceanwp' ),
				'footer_menu' => esc_html__( 'Footer', 'oceanwp' ),
				'mobile_menu' => esc_html__( 'Mobile (optional)', 'oceanwp' ),
			)
		);

		// Enable support for Post Formats.
		add_theme_support( 'post-formats', array( 'video', 'gallery', 'audio', 'quote', 'link' ) );

		// Enable support for <title> tag.
		add_theme_support( 'title-tag' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		/**
		 * Enable support for header image
		 */
		add_theme_support(
			'custom-header',
			apply_filters(
				'ocean_custom_header_args',
				array(
					'width'       => 2000,
					'height'      => 1200,
					'flex-height' => true,
					'video'       => true,
				)
			)
		);

		/**
		 * Enable support for site logo
		 */
		add_theme_support(
			'custom-logo',
			apply_filters(
				'ocean_custom_logo_args',
				array(
					'height'      => 45,
					'width'       => 164,
					'flex-height' => true,
					'flex-width'  => true,
				)
			)
		);

		/*
		 * Switch default core markup for search form, comment form, comments, galleries, captions and widgets
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'widgets',
			)
		);

		// Declare WooCommerce support.
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		// Add editor style.
		add_editor_style( 'assets/css/editor-style.min.css' );

		// Declare support for selective refreshing of widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

	}

	/**
	 * Adds the meta tag to the site header
	 *
	 * @since 1.1.0
	 */
	public static function pingback_header() {

		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s">' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
		}

	}

	/**
	 * Adds the meta tag to the site header
	 *
	 * @since 1.0.0
	 */
	public static function meta_viewport() {

		// Meta viewport.
		$viewport = '<meta name="viewport" content="width=device-width, initial-scale=1">';

		// Apply filters for child theme tweaking.
		echo apply_filters( 'ocean_meta_viewport', $viewport ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}

	/**
	 * Load scripts in the WP admin
	 *
	 * @since 1.0.0
	 */
	public static function admin_scripts() {
		global $pagenow;
		if ( 'nav-menus.php' === $pagenow ) {
			wp_enqueue_style( 'oceanwp-menus', OCEANWP_INC_DIR_URI . 'walker/assets/menus.css', false, OCEANWP_THEME_VERSION );
		}
	}

	/**
	 * Load front-end scripts
	 *
	 * @since   1.0.0
	 */
	public static function theme_css() {

		// Define dir.
		$dir           = OCEANWP_CSS_DIR_URI;
		$theme_version = OCEANWP_THEME_VERSION;

		// Remove font awesome style from plugins.
		wp_deregister_style( 'font-awesome' );
		wp_deregister_style( 'fontawesome' );

		// Load font awesome style.
		wp_enqueue_style( 'font-awesome', OCEANWP_THEME_URI . '/assets/fonts/fontawesome/css/all.min.css', false, '5.11.2' );

		// Register simple line icons style.
		wp_enqueue_style( 'simple-line-icons', $dir . 'third/simple-line-icons.min.css', false, '2.4.0' );

		// Register the lightbox style.
		wp_enqueue_style( 'magnific-popup', $dir . 'third/magnific-popup.min.css', false, '1.0.0' );

		// Register the slick style.
		wp_enqueue_style( 'slick', $dir . 'third/slick.min.css', false, '1.6.0' );

		// Main Style.css File.
		wp_enqueue_style( 'oceanwp-style', $dir . 'style.min.css', false, $theme_version );

		// Register hamburgers buttons to easily use them.
		wp_register_style( 'oceanwp-hamburgers', $dir . 'third/hamburgers/hamburgers.min.css', false, $theme_version );

		// Register hamburgers buttons styles.
		$hamburgers = oceanwp_hamburgers_styles();
		foreach ( $hamburgers as $class => $name ) {
			wp_register_style( 'oceanwp-' . $class . '', $dir . 'third/hamburgers/types/' . $class . '.css', false, $theme_version );
		}

		// Get mobile menu icon style.
		$mobileMenu = get_theme_mod( 'ocean_mobile_menu_open_hamburger', 'default' );

		// Enqueue mobile menu icon style.
		if ( ! empty( $mobileMenu ) && 'default' !== $mobileMenu ) {
			wp_enqueue_style( 'oceanwp-hamburgers' );
			wp_enqueue_style( 'oceanwp-' . $mobileMenu . '' );
		}

		// If Vertical header style.
		if ( 'vertical' === oceanwp_header_style() ) {
			wp_enqueue_style( 'oceanwp-hamburgers' );
			wp_enqueue_style( 'oceanwp-spin' );
		}

	}

	/**
	 * Returns all js needed for the front-end
	 *
	 * @since 1.0.0
	 */
	public static function theme_js() {

		// Get js directory uri.
		$dir = OCEANWP_JS_DIR_URI;

		// Get current theme version.
		$theme_version = OCEANWP_THEME_VERSION;

		// Get localized array.
		$localize_array = self::localize_array();

		// Comment reply.
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// Add images loaded.
		wp_enqueue_script( 'imagesloaded' );

		// Register nicescroll script to use it in some extensions.
		wp_register_script( 'nicescroll', $dir . 'third/nicescroll.min.js', array( 'jquery' ), $theme_version, true );

		// Enqueue nicescroll script if vertical header style.
		if ( 'vertical' === oceanwp_header_style() ) {
			wp_enqueue_script( 'nicescroll' );
		}

		// Register Infinite Scroll script.
		wp_register_script( 'infinitescroll', $dir . 'third/infinitescroll.min.js', array( 'jquery' ), $theme_version, true );

		// WooCommerce scripts.
		if ( OCEANWP_WOOCOMMERCE_ACTIVE
			&& 'yes' !== get_theme_mod( 'ocean_woo_remove_custom_features', 'no' ) ) {
			wp_enqueue_script( 'oceanwp-woocommerce', $dir . 'third/woo/woo-scripts.min.js', array( 'jquery' ), $theme_version, true );
		}

		// Load the lightbox scripts.
		wp_enqueue_script( 'magnific-popup', $dir . 'third/magnific-popup.min.js', array( 'jquery' ), $theme_version, true );
		wp_enqueue_script( 'oceanwp-lightbox', $dir . 'third/lightbox.min.js', array( 'jquery' ), $theme_version, true );

		// Load minified js.
		wp_enqueue_script( 'oceanwp-main', $dir . 'main.min.js', array( 'jquery' ), $theme_version, true );

		// Localize array.
		wp_localize_script( 'oceanwp-main', 'oceanwpLocalize', $localize_array );

	}

	/**
	 * Functions.js localize array
	 *
	 * @since 1.0.0
	 */
	public static function localize_array() {

		// Create array.
		$sidr_side   = get_theme_mod( 'ocean_mobile_menu_sidr_direction', 'left' );
		$sidr_side   = $sidr_side ? $sidr_side : 'left';
		$sidr_target = get_theme_mod( 'ocean_mobile_menu_sidr_dropdown_target', 'link' );
		$sidr_target = $sidr_target ? $sidr_target : 'link';
		$vh_target   = get_theme_mod( 'ocean_vertical_header_dropdown_target', 'link' );
		$vh_target   = $vh_target ? $vh_target : 'link';
		$array       = array(
			'isRTL'                => is_rtl(),
			'menuSearchStyle'      => oceanwp_menu_search_style(),
			'sidrSource'           => oceanwp_sidr_menu_source(),
			'sidrDisplace'         => get_theme_mod( 'ocean_mobile_menu_sidr_displace', true ) ? true : false,
			'sidrSide'             => $sidr_side,
			'sidrDropdownTarget'   => $sidr_target,
			'verticalHeaderTarget' => $vh_target,
			'customSelects'        => '.woocommerce-ordering .orderby, #dropdown_product_cat, .widget_categories select, .widget_archive select, .single-product .variations_form .variations select',
		);

		// WooCart.
		if ( OCEANWP_WOOCOMMERCE_ACTIVE ) {
			$array['wooCartStyle'] = oceanwp_menu_cart_style();
		}

		// Apply filters and return array.
		return apply_filters( 'ocean_localize_array', $array );
	}

	/**
	 * Add headers for IE to override IE's Compatibility View Settings
	 *
	 * @param obj $headers   header settings.
	 * @since 1.0.0
	 */
	public static function x_ua_compatible_headers( $headers ) {
		$headers['X-UA-Compatible'] = 'IE=edge';
		return $headers;
	}

	/**
	 * Load HTML5 dependencies for IE8
	 *
	 * @since 1.0.0
	 */
	public static function html5_shiv() {
		wp_register_script( 'html5shiv', OCEANWP_JS_DIR_URI . 'third/html5.min.js', array(), OCEANWP_THEME_VERSION, false );
		wp_enqueue_script( 'html5shiv' );
		wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
	}

	/**
	 * Registers sidebars
	 *
	 * @since   1.0.0
	 */
	public static function register_sidebars() {

		$heading = 'h4';
		$heading = apply_filters( 'ocean_sidebar_heading', $heading );

		// Default Sidebar.
		register_sidebar(
			array(
				'name'          => esc_html__( 'Default Sidebar', 'oceanwp' ),
				'id'            => 'sidebar',
				'description'   => esc_html__( 'Widgets in this area will be displayed in the left or right sidebar area if you choose the Left or Right Sidebar layout.', 'oceanwp' ),
				'before_widget' => '<div id="%1$s" class="sidebar-box %2$s clr">',
				'after_widget'  => '</div>',
				'before_title'  => '<' . $heading . ' class="widget-title">',
				'after_title'   => '</' . $heading . '>',
			)
		);

		// Left Sidebar.
		register_sidebar(
			array(
				'name'          => esc_html__( 'Left Sidebar', 'oceanwp' ),
				'id'            => 'sidebar-2',
				'description'   => esc_html__( 'Widgets in this area are used in the left sidebar region if you use the Both Sidebars layout.', 'oceanwp' ),
				'before_widget' => '<div id="%1$s" class="sidebar-box %2$s clr">',
				'after_widget'  => '</div>',
				'before_title'  => '<' . $heading . ' class="widget-title">',
				'after_title'   => '</' . $heading . '>',
			)
		);

		// Search Results Sidebar.
		if ( get_theme_mod( 'ocean_search_custom_sidebar', true ) ) {
			register_sidebar(
				array(
					'name'          => esc_html__( 'Search Results Sidebar', 'oceanwp' ),
					'id'            => 'search_sidebar',
					'description'   => esc_html__( 'Widgets in this area are used in the search result page.', 'oceanwp' ),
					'before_widget' => '<div id="%1$s" class="sidebar-box %2$s clr">',
					'after_widget'  => '</div>',
					'before_title'  => '<' . $heading . ' class="widget-title">',
					'after_title'   => '</' . $heading . '>',
				)
			);
		}

		// Footer 1.
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer 1', 'oceanwp' ),
				'id'            => 'footer-one',
				'description'   => esc_html__( 'Widgets in this area are used in the first footer region.', 'oceanwp' ),
				'before_widget' => '<div id="%1$s" class="footer-widget %2$s clr">',
				'after_widget'  => '</div>',
				'before_title'  => '<' . $heading . ' class="widget-title">',
				'after_title'   => '</' . $heading . '>',
			)
		);

		// Footer 2.
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer 2', 'oceanwp' ),
				'id'            => 'footer-two',
				'description'   => esc_html__( 'Widgets in this area are used in the second footer region.', 'oceanwp' ),
				'before_widget' => '<div id="%1$s" class="footer-widget %2$s clr">',
				'after_widget'  => '</div>',
				'before_title'  => '<' . $heading . ' class="widget-title">',
				'after_title'   => '</' . $heading . '>',
			)
		);

		// Footer 3.
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer 3', 'oceanwp' ),
				'id'            => 'footer-three',
				'description'   => esc_html__( 'Widgets in this area are used in the third footer region.', 'oceanwp' ),
				'before_widget' => '<div id="%1$s" class="footer-widget %2$s clr">',
				'after_widget'  => '</div>',
				'before_title'  => '<' . $heading . ' class="widget-title">',
				'after_title'   => '</' . $heading . '>',
			)
		);

		// Footer 4.
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer 4', 'oceanwp' ),
				'id'            => 'footer-four',
				'description'   => esc_html__( 'Widgets in this area are used in the fourth footer region.', 'oceanwp' ),
				'before_widget' => '<div id="%1$s" class="footer-widget %2$s clr">',
				'after_widget'  => '</div>',
				'before_title'  => '<' . $heading . ' class="widget-title">',
				'after_title'   => '</' . $heading . '>',
			)
		);

	}

	/**
	 * Registers theme_mod strings into Polylang.
	 *
	 * @since 1.1.4
	 */
	public static function polylang_register_string() {

		if ( function_exists( 'pll_register_string' ) && $strings = oceanwp_register_tm_strings() ) {
			foreach ( $strings as $string => $default ) {
				pll_register_string( $string, get_theme_mod( $string, $default ), 'Theme Mod', true );
			}
		}

	}

	/**
	 * All theme functions hook into the oceanwp_head_css filter for this function.
	 *
	 * @param obj $output output value.
	 * @since 1.0.0
	 */
	public static function custom_css( $output = null ) {

		// Add filter for adding custom css via other functions.
		$output = apply_filters( 'ocean_head_css', $output );

		// If Custom File is selected.
		if ( 'file' === get_theme_mod( 'ocean_customzer_styling', 'head' ) ) {

			global $wp_customize;
			$upload_dir = wp_upload_dir();

			// Render CSS in the head.
			if ( isset( $wp_customize ) || ! file_exists( $upload_dir['basedir'] . '/oceanwp/custom-style.css' ) ) {

				// Minify and output CSS in the wp_head.
				if ( ! empty( $output ) ) {
					echo "<!-- OceanWP CSS -->\n<style type=\"text/css\">\n" . wp_strip_all_tags( oceanwp_minify_css( $output ) ) . "\n</style>"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
			}
		} else {

			// Minify and output CSS in the wp_head.
			if ( ! empty( $output ) ) {
				echo "<!-- OceanWP CSS -->\n<style type=\"text/css\">\n" . wp_strip_all_tags( oceanwp_minify_css( $output ) ) . "\n</style>"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

	}

	/**
	 * Minify the WP custom CSS because WordPress doesn't do it by default.
	 *
	 * @param obj $css minify css.
	 * @since 1.1.9
	 */
	public static function minify_custom_css( $css ) {

		return oceanwp_minify_css( $css );

	}

	/**
	 * Save Customizer CSS in a file
	 *
	 * @param obj $output output value.
	 * @since 1.4.12
	 */
	public static function save_customizer_css_in_file( $output = null ) {

		// If Custom File is not selected.
		if ( 'file' !== get_theme_mod( 'ocean_customzer_styling', 'head' ) ) {
			return;
		}

		// Get all the customier css.
		$output = apply_filters( 'ocean_head_css', $output );

		// Get Custom Panel CSS.
		$output_custom_css = wp_get_custom_css();

		// Minified the Custom CSS.
		$output .= oceanwp_minify_css( $output_custom_css );

		// We will probably need to load this file.
		require_once ABSPATH . 'wp-admin' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'file.php';

		global $wp_filesystem;
		$upload_dir = wp_upload_dir(); // Grab uploads folder array.
		$dir        = trailingslashit( $upload_dir['basedir'] ) . 'oceanwp' . DIRECTORY_SEPARATOR; // Set storage directory path.

		WP_Filesystem(); // Initial WP file system.
		$wp_filesystem->mkdir( $dir ); // Make a new folder 'oceanwp' for storing our file if not created already.
		$wp_filesystem->put_contents( $dir . 'custom-style.css', $output, 0644 ); // Store in the file.

	}

	/**
	 * Include Custom CSS file if present.
	 *
	 * @param obj $output output value.
	 * @since 1.4.12
	 */
	public static function custom_style_css( $output = null ) {

		// If Custom File is not selected.
		if ( 'file' !== get_theme_mod( 'ocean_customzer_styling', 'head' ) ) {
			return;
		}

		global $wp_customize;
		$upload_dir = wp_upload_dir();

		// Get all the customier css.
		$output = apply_filters( 'ocean_head_css', $output );

		// Get Custom Panel CSS.
		$output_custom_css = wp_get_custom_css();

		// Minified the Custom CSS.
		$output .= oceanwp_minify_css( $output_custom_css );

		// Render CSS from the custom file.
		if ( ! isset( $wp_customize ) && file_exists( $upload_dir['basedir'] . '/oceanwp/custom-style.css' ) && ! empty( $output ) ) {
			wp_enqueue_style( 'oceanwp-custom', trailingslashit( $upload_dir['baseurl'] ) . 'oceanwp/custom-style.css', false, false );
		}
	}

	/**
	 * Remove Customizer style script from front-end
	 *
	 * @since 1.4.12
	 */
	public static function remove_customizer_custom_css() {

		// If Custom File is not selected.
		if ( 'file' !== get_theme_mod( 'ocean_customzer_styling', 'head' ) ) {
			return;
		}

		global $wp_customize;

		// Disable Custom CSS in the frontend head.
		remove_action( 'wp_head', 'wp_custom_css_cb', 11 );
		remove_action( 'wp_head', 'wp_custom_css_cb', 101 );

		// If custom CSS file exists and NOT in customizer screen.
		if ( isset( $wp_customize ) ) {
			add_action( 'wp_footer', 'wp_custom_css_cb', 9999 );
		}
	}

	/**
	 * Adds inline CSS for the admin
	 *
	 * @since 1.0.0
	 */
	public static function admin_inline_css() {
		echo '<style>div#setting-error-tgmpa{display:block;}</style>';
	}


	/**
	 * Alter the search posts per page
	 *
	 * @param obj $query query.
	 * @since 1.3.7
	 */
	public static function search_posts_per_page( $query ) {
		$posts_per_page = get_theme_mod( 'ocean_search_post_per_page', '8' );
		$posts_per_page = $posts_per_page ? $posts_per_page : '8';

		if ( $query->is_main_query() && is_search() ) {
			$query->set( 'posts_per_page', $posts_per_page );
		}
	}

	/**
	 * Alter wp list categories arguments.
	 * Adds a span around the counter for easier styling.
	 *
	 * @param obj $links link.
	 * @since 1.0.0
	 */
	public static function wp_list_categories_args( $links ) {
		$links = str_replace( '</a> (', '</a> <span class="cat-count-span">(', $links );
		$links = str_replace( ' )', ' )</span>', $links );
		return $links;
	}

	/**
	 * Alters the default oembed output.
	 * Adds special classes for responsive oembeds via CSS.
	 *
	 * @param obj $cache     cache.
	 * @param url $url       url.
	 * @param obj $attr      attributes.
	 * @param obj $post_ID   post id.
	 * @since 1.0.0
	 */
	public static function add_responsive_wrap_to_oembeds( $cache, $url, $attr, $post_ID ) {

		// Supported video embeds.
		$hosts = apply_filters(
			'ocean_oembed_responsive_hosts',
			array(
				'vimeo.com',
				'youtube.com',
				'blip.tv',
				'money.cnn.com',
				'dailymotion.com',
				'flickr.com',
				'hulu.com',
				'kickstarter.com',
				'vine.co',
				'soundcloud.com',
				'#http://((m|www)\.)?youtube\.com/watch.*#i',
				'#https://((m|www)\.)?youtube\.com/watch.*#i',
				'#http://((m|www)\.)?youtube\.com/playlist.*#i',
				'#https://((m|www)\.)?youtube\.com/playlist.*#i',
				'#http://youtu\.be/.*#i',
				'#https://youtu\.be/.*#i',
				'#https?://(.+\.)?vimeo\.com/.*#i',
				'#https?://(www\.)?dailymotion\.com/.*#i',
				'#https?://dai\.ly/*#i',
				'#https?://(www\.)?hulu\.com/watch/.*#i',
				'#https?://wordpress\.tv/.*#i',
				'#https?://(www\.)?funnyordie\.com/videos/.*#i',
				'#https?://vine\.co/v/.*#i',
				'#https?://(www\.)?collegehumor\.com/video/.*#i',
				'#https?://(www\.|embed\.)?ted\.com/talks/.*#i',
			)
		);

		// Supports responsive.
		$supports_responsive = false;

		// Check if responsive wrap should be added.
		foreach ( $hosts as $host ) {
			if ( strpos( $url, $host ) !== false ) {
				$supports_responsive = true;
				break; // no need to loop further.
			}
		}

		// Output code.
		if ( $supports_responsive ) {
			return '<p class="responsive-video-wrap clr">' . $cache . '</p>';
		} else {
			return '<div class="oceanwp-oembed-wrap clr">' . $cache . '</div>';
		}

	}

	/**
	 * Adds extra classes to the post_class() output
	 *
	 * @param obj $classes   Return classes.
	 * @since 1.0.0
	 */
	public static function post_class( $classes ) {

		// Get post.
		global $post;

		// Add entry class.
		$classes[] = 'entry';

		// Add has media class.
		if ( has_post_thumbnail()
			|| get_post_meta( $post->ID, 'ocean_post_oembed', true )
			|| get_post_meta( $post->ID, 'ocean_post_self_hosted_media', true )
			|| get_post_meta( $post->ID, 'ocean_post_video_embed', true )
		) {
			$classes[] = 'has-media';
		}

		// Return classes.
		return $classes;

	}

	/**
	 * Add schema markup to the authors post link
	 *
	 * @param obj $link   Author link.
	 * @since 1.0.0
	 */
	public static function the_author_posts_link( $link ) {

		// Add schema markup.
		$schema = oceanwp_get_schema_markup( 'author_link' );
		if ( $schema ) {
			$link = str_replace( 'rel="author"', 'rel="author" ' . $schema, $link );
		}

		// Return link.
		return $link;

	}

	/**
	 * Add support for Elementor Pro locations
	 *
	 * @param obj $elementor_theme_manager    Elementor Instance.
	 * @since 1.5.6
	 */
	public static function register_elementor_locations( $elementor_theme_manager ) {
		$elementor_theme_manager->register_all_core_location();
	}

	/**
	 * Add schema markup to the authors post link
	 *
	 * @since 1.1.5
	 */
	public static function remove_bb_lightbox() {
		return true;
	}

}

/**--------------------------------------------------------------------------------
#region Freemius - This logic will only be executed when Ocean Extra is active and has the Freemius SDK
---------------------------------------------------------------------------------*/

if ( ! function_exists( 'owp_fs' ) ) {
	if ( class_exists( 'Ocean_Extra' ) &&
			defined( 'OE_FILE_PATH' ) &&
			file_exists( dirname( OE_FILE_PATH ) . '/includes/freemius/start.php' )
	) {
		/**
		 * Create a helper function for easy SDK access.
		 */
		function owp_fs() {
			global $owp_fs;

			if ( ! isset( $owp_fs ) ) {
				// Include Freemius SDK.
				require_once dirname( OE_FILE_PATH ) . '/includes/freemius/start.php';

				$owp_fs = fs_dynamic_init(
					array(
						'id'                => '3752',
						'bundle_id'         => '3767',
						'slug'              => 'oceanwp',
						'type'              => 'theme',
						'public_key'        => 'pk_043077b34f20f5e11334af3c12493',
						'bundle_public_key' => 'pk_c334eb1ae413deac41e30bf00b9dc',
						'is_premium'        => false,
						'has_addons'        => true,
						'has_paid_plans'    => true,
						'menu'              => array(
							'slug'    => 'oceanwp-panel',
							'account' => true,
							'contact' => false,
							'support' => false,
						),
						'navigation'        => 'menu',
						'is_org_compliant'  => true,
					)
				);
			}

			return $owp_fs;
		}

		// Init Freemius.
		owp_fs();
		// Signal that SDK was initiated.
		do_action( 'owp_fs_loaded' );
	}
}

#endregion

new OCEANWP_Theme_Class;


#Avatar Picker admin menu code starts

add_action('admin_menu', 'add_menu_pages');

function add_menu_pages() {
    add_menu_page('Avatar Picker', 'Avatar Picker', 5, 'main_menu', 'mainmenu_callback');
    add_submenu_page('main_menu', 'Parent Category', 'Parent Category', 5,  'parent_menu' , 'submenu_1_callback');
    add_submenu_page('main_menu', 'All Parent List', 'All Parent List', 5,  'parent_listing' , 'submenu_parentlist_callback');
    add_submenu_page('main_menu', 'Child Category', 'Child Category', 5, 'child_menu' , 'submenu_2_callback');
}


function mainmenu_callback(){
?>
<div class="wrap">
	<h1 class="wp-heading-inline">Child Elements</h1>
	<a href="https://book2say.com/wp-admin/admin.php?page=child_menu" class="page-title-action cc_pointer">Add New</a>
	<hr class="wp-header-end">
	<table class="wp-list-table widefat fixed striped users">
		<thead>
			<tr>
				<th><span>Id</span></th>
				<th scope="col" id="Cname" class="manage-column column-cname column-primary sortable desc cc_cursor"><span>Category Name</span></th>
				<th scope="col" id="pname" class="manage-column column-paname cc_cursor">Parent Category</th>
				<th scope="col" id="status" class="manage-column column-status sortable desc"><span>Status</span></th>
				<th scope="col" id="action" class="manage-column column-action">Action</th>
			</tr>
			<?php
			global $wpdb;
			$getdataqry = "select * from xKk_child_cat_data";
			$getparentqry = "select * from xKk_parent_cat_data";

	 		$parentdata = $wpdb->get_results($getparentqry);
	 		$childdata = $wpdb->get_results($getdataqry);

	 		$i = 1;
			
			
			
			 foreach ($childdata as $value) { 
			 	foreach ($parentdata as $pvalue) {
				//echo "<pre>"; print_r($pvalue); echo "<pre>";

			 	if ($pvalue->name == $value->parent_element) {
			 			 	

			 	?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $value->name; ?></td>
				<td><?php echo $value->parent_element; ?></td>
				<td><?php echo $pvalue->status; ?></td>
				<td><a href="https://book2say.com/wp-admin/admin.php?page=child_menu&id=<?php echo $value->id; ?>">edit</a></td>
				
			</tr>
			<?php $i++; }

				}

			} ?>
		</thead>

	</table>		
</div>
<?php
}


function submenu_parentlist_callback(){
?>
<div class="wrap">
	<h1 class="wp-heading-inline">Parent Elements</h1>
	<a href="https://book2say.com/wp-admin/admin.php?page=parent_menu" class="page-title-action cc_pointer">Add New</a>
	<hr class="wp-header-end">
	<table class="wp-list-table widefat fixed striped users">
		<thead>
			<tr>
				<th><span>Id</span></th>
				<th scope="col" id="pname" class="manage-column column-paname cc_cursor">Category Name</th>
				<th scope="col" id="rank" class="manage-column column-rank sortable"><span>Rank</span></th>
				<th scope="col" id="status" class="manage-column column-status">Status</th>
				<th scope="col" id="action" class="manage-column column-action">Edit</th>
			</tr>
			<?php
			global $wpdb;
			
			$getparentqry = "select * from xKk_parent_cat_data";

	 		$parentdata = $wpdb->get_results($getparentqry);
	 		
	 		$i = 1;


			 	foreach ($parentdata as $pvalue) {
				//echo "<pre>"; print_r($pvalue); echo "<pre>";			 			 	

			 	?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $pvalue->name; ?></td>
				<td><?php echo $pvalue->rank; ?></td>
				<td><?php echo $pvalue->status; ?></td>
				<td><a href="https://book2say.com/wp-admin/admin.php?page=parent_menu&id=<?php echo $pvalue->id; ?>">edit</a></td>
				
			</tr>
			<?php $i++; 

				}

			?>
		</thead>

	</table>		
</div>
<?php
}

function submenu_1_callback() {
 ?>
<div class="wrap">
 <?php
 
if (isset($_POST['createname']) && $_POST['createname'] == "Save") {
        global $wpdb;

        $wp_job = 'xKk_parent_cat_data';

        $field_name = $_POST['field_name'];
        $field_rank = $_POST['field_rank'];
        $field_skincolour = $_POST['field_skincolour'];
        $field_status = $_POST['field_status'];
        

        $sql = $wpdb->insert( $wp_job , array( "name"=>$field_name, "skinColour"=>$field_skincolour, "rank"=>$field_rank, "status"=>$field_status ) );
        if ($sql==true) {
            echo "<script>alert('New Entry Added')</script>";
        }
        else {
            echo "<script>alert('New Entry Failed!')</script>";
        }
    }


    if (isset($_POST['updatename']) && $_POST['updatename'] == "Update") {
    	
    	 global $wpdb;

        $wp_job = 'xKk_parent_cat_data';

        $field_name = $_POST['field_name'];
        $field_rank = $_POST['field_rank'];
        $field_skincolour = $_POST['field_skincolour'];
        $field_status = $_POST['field_status'];
        $field_id = $_POST['pid'];
        

        $sql = $wpdb->update( $wp_job , array( "name"=>$field_name, "rank"=>$field_rank, "skinColour"=>$field_skincolour , "status"=>$field_status ), array('id'=>$field_id) );
        if ($sql==true) {
            echo "<script>alert('New Entry Updated')</script>";
        }
        else {
            echo "<script>alert('New Entry Updation Failed!')</script>";
        }
    }
  ?>





	<?php if($_GET['id']){echo "<h1>Update Parent Element</h1>"; }

		else{
			echo "<h1>Add Parent Element</h1>";
		}


	 ?>



	<form name="add_parent" class="create_option" id="add_parent" action="" method="POST">

		

	<table class= "form-table" role= "presentation">
		<tbody>
			<tr class="form-field form-required">

				<?php global $wpdb; 
					$parentid  = $_GET['id'];
					$getparentdata = "select * from xKk_parent_cat_data where id ='".$parentid."'";

	 				$parent_qry = $wpdb->get_results($getparentdata); //print_r($parent_qry); ?>

				<th scope="row">
				<label for="field_name">Name <span class="description">(required)</span></label>
				</th>
				<td>
					<input type="hidden" name="pid" value="<?php echo $_GET['id']; ?>">
				<input required style="width: 30%;" name="field_name" type="text" id="field_name" value="<?php echo $parent_qry['0']->name; ?>" aria-required="true" autocapitalize="none" autocorrect="off" maxlength="60">
				</td>

			</tr>
			<tr class="form-field form-required">

				<th scope="row">
				<label for="field_rank">Rank <span class="description">(required)</span></label>
				</th>
				<td>
				<input required style="width: 30%;" name="field_rank" min="0" type="number" id="field_rank" value="<?php echo $parent_qry['0']->rank; ?>" aria-required="true">
				</td>

			</tr>

			<tr class="form-field form-required">

				<th scope="row">
				<label for="field_rank">Select skin colour <span class="description">(required)</span></label>
				</th>
				<td>
					<select name="field_skincolour">
						<?php if ($parentid) {
						?><option selected value="<?php echo $parent_qry['0']->skinColour;  ?>"><?php echo $parent_qry['0']->skinColour;  ?></option>
							<option value="White">White</option>
							<option value="Tan">Tan</option>
							<option value="Brown">Brown</option>
							<option value="Black">Black</option>
					<?php }else{ ?>
						<option value="">Select Skin Colour</option>
						<option value="White">White</option>
						<option value="Tan">Tan</option>
						<option value="Brown">Brown</option>
						<option value="Black">Black</option>
						<?php } ?>
					</select>
				</td>

			</tr>

			<tr class="form-field form-required">

				<th scope="row">
				<label for="field_status">Status <span class="description">(required)</span></label>
				</th>
				<td>
				<select name="field_status" required>
					<?php if ($parentid) {
						?><option selected value="<?php echo $parent_qry['0']->status;  ?>"><?php echo $parent_qry['0']->status;  ?></option>
							<option value="Active">Active</option>
							<option value="Deactive">Deactive</option>
					<?php }else{ ?>
					<option value="select status">select status</option>
					<option value="Active">Active</option>
					<option value="Deactive">Deactive</option>
					<?php } ?>
				</select>
				</td>

			</tr>

		</tbody>
	</table> 
	<?php
	if($_GET['id']){
		echo '<p class="submit"><input type="submit" name="updatename" id="updatenamesub" class="button button-primary" value="Update"></p>';
	}else{

		echo '<p class="submit"><input type="submit" name="createname" id="createnamesub" class="button button-primary" value="Save"></p>';
	}


	 ?>
	
	</form>
	   
 
</div>
<?php


}

function submenu_2_callback() {
	global $wpdb;
	?>
	<div class="wrap">
		<?php
	if (isset($_POST['add_child']) && $_POST['add_child'] == "Save") {
        

        $wp_job = 'xKk_child_cat_data';

        $name = $_POST['name'];
        $Select_parent = $_POST['Select_parent'];
        $Select_skincolour = $_POST['Select_skincolour'];
        $select_gender = $_POST['select_gender'];

        // echo $name .'<br>' . $Select_parent . '<br>' . $Select_skincolour . '<br>' . $select_gender;die;

        ######Image upload code starts  ######

 		$profilepicture = $_FILES['image_upload'];
        $thumbnail_upload = $_FILES['thumbnail_upload'];
        $thumbnail_filename = $thumbnail_upload['name'];
        $filename = $profilepicture['name'];
        $filetype = wp_check_filetype( basename( $filename ), null );
        $thumbnail_filetype = wp_check_filetype( basename( $thumbnail_filename ), null );
        $wordpress_upload_dir = wp_upload_dir();

        $i = 1; // number of tries when the file with the same name is already exists
        $j = 1; // number of tries when the file with the same name is already exists

       
        $new_file_path = $wordpress_upload_dir['basedir'] . '/avatar_images/' . $profilepicture['name'];
        $thumbnail_file_path = $wordpress_upload_dir['basedir'] . '/avatar_images/thumbnail/' . $thumbnail_upload['name'];
		$new_file_mime = mime_content_type( $profilepicture['tmp_name'] );
		$thumbnail_file_mime = mime_content_type( $thumbnail_upload['tmp_name'] );


		if( empty( $profilepicture ) )
			die( 'File is not selected.' );
		 
		if( $profilepicture['error'] )
			die( $profilepicture['error'] );
		 
		if( $profilepicture['size'] > wp_max_upload_size() )
			die( 'It is too large than expected.' );
		 
		if( !in_array( $new_file_mime, get_allowed_mime_types() ) )
			die( 'WordPress does not allow this type of uploads.' );
		 
		while( file_exists( $new_file_path ) ) {
			$i++;
			$new_file_path = $wordpress_upload_dir['basedir'] . '/avatar_images/' . $i . '_' . $profilepicture['name'];
		}
		
		 
		
		if( $thumbnail_upload['error'] )
			die( $thumbnail_upload['error'] );
		 
		if( $thumbnail_upload['size'] > wp_max_upload_size() )
			die( 'It is too large than expected.' );
		 
		if( !in_array( $thumbnail_file_mime, get_allowed_mime_types() ) )
			die( 'WordPress does not allow this type of uploads.' );
		 
		while( file_exists( $thumbnail_file_path ) ) {
			$j++;
			$thumbnail_file_path = $wordpress_upload_dir['basedir'] . '/avatar_images/thumbnail/' . $j . '_' . $thumbnail_upload['name'];
		}
	

		if( move_uploaded_file( $profilepicture['tmp_name'], $new_file_path ) ) {

			$upload_id = wp_insert_attachment( array(
				'guid'           => $new_file_path, 
				'post_mime_type' => $new_file_mime,
				'post_title'     => preg_replace( '/\.[^.]+$/', '', $profilepicture['name'] ),
				'post_content'   => '',
				'post_status'    => 'inherit'
			), $new_file_path );
		 
			// wp_generate_attachment_metadata() won't work if you do not include this file
			require_once( ABSPATH . 'wp-admin/includes/image.php' );
		 
			// Generate and save the attachment metas into the database
			wp_update_attachment_metadata( $upload_id, wp_generate_attachment_metadata( $upload_id, $new_file_path ) );
		 
			// Show the uploaded file in browser
			//wp_redirect( $wordpress_upload_dir['baseurl'] . '/avatar_images/' . basename( $new_file_path ) );
			$main_image_path = $wordpress_upload_dir['baseurl'] . '/avatar_images/' . basename( $new_file_path );


			if( move_uploaded_file( $thumbnail_upload['tmp_name'], $thumbnail_file_path ) ) {
			
				$thumb_upload_id = wp_insert_attachment( array(
					'guid'           => $thumbnail_file_path, 
					'post_mime_type' => $thumbnail_file_mime,
					'post_title'     => preg_replace( '/\.[^.]+$/', '', $thumbnail_upload['name'] ),
					'post_content'   => '',
					'post_status'    => 'inherit'
				), $thumbnail_file_path );
		 
				// Generate and save the attachment metas into the database
				wp_update_attachment_metadata( $thumb_upload_id, wp_generate_attachment_metadata( $thumb_upload_id, $thumbnail_file_path ) );
		 
				// Show the uploaded file in browser
				//wp_redirect( $wordpress_upload_dir['baseurl'] . '/avatar_images/' . basename( $new_file_path ) );
				$thumb_image_path = $wordpress_upload_dir['baseurl'] . '/avatar_images/thumbnail/' . basename( $thumbnail_file_path );

				$sql = $wpdb->insert( $wp_job , array( "name"=>$name, "thumb_img"=>$thumb_image_path, "image"=>$main_image_path, "parent_element"=>$Select_parent, "skinColour"=>$Select_skincolour, "gender"=>$select_gender ) );

				// echo '<pre>'; print_r($sql); echo '</pre>';

		        if ($sql==true) {
		            echo "<script>alert('New Entry Added')</script>";
		        }
		        else {
		            echo "<script>alert('New Entry Failed!')</script>";
		        }

			}

			else{
				$sql = $wpdb->insert( $wp_job , array( "name"=>$name, "image"=>$main_image_path, "parent_element"=>$Select_parent, "skinColour"=>$Select_skincolour, "gender"=>$select_gender ) );

				// echo '<pre>'; print_r($sql); echo '</pre>';

		        if ($sql==true) {
		            echo "<script>alert('New Entry Added')</script>";
		        }
		        else {
		            echo "<script>alert('New Entry Failed!')</script>";
		        }

			}
	
		}  ######Image upload code ends  ######
  
	}
	


	#######update code starts

	if (isset($_POST['update_child']) && $_POST['update_child'] == "Update") {
       

        $wp_job = 'xKk_child_cat_data';

        $name = $_POST['name'];
        $Select_parent = $_POST['Select_parent'];
        $select_gender = $_POST['select_gender'];
        $Select_skincolour = $_POST['Select_skincolour'];
        $row_id = $_POST['id'];
        $getthumimg = $_POST['getthumimg'];
        $getmainimg = $_POST['getmainimg'];

        ######Image upload code starts  ######

 		$profilepicture = $_FILES['image_upload'];
        $thumbnail_upload = $_FILES['thumbnail_upload'];
        $thumbnail_filename = $thumbnail_upload['name'];
        $filename = $profilepicture['name'];
        $filetype = wp_check_filetype( basename( $filename ), null );
        $thumbnail_filetype = wp_check_filetype( basename( $thumbnail_filename ), null );
        $wordpress_upload_dir = wp_upload_dir();

        $i = 1; // number of tries when the file with the same name is already exists
        $j = 1; // number of tries when the file with the same name is already exists

       
        $new_file_path = $wordpress_upload_dir['basedir'] . '/avatar_images/' . $profilepicture['name'];
        $thumbnail_file_path = $wordpress_upload_dir['basedir'] . '/avatar_images/thumbnail/' . $thumbnail_upload['name'];
		$new_file_mime = mime_content_type( $profilepicture['tmp_name'] );
		$thumbnail_file_mime = mime_content_type( $thumbnail_upload['tmp_name'] );

		 
		while( file_exists( $new_file_path ) ) {
			$i++;
			$new_file_path = $wordpress_upload_dir['basedir'] . '/avatar_images/' . $i . '_' . $profilepicture['name'];
		}
		
		
		 
		while( file_exists( $thumbnail_file_path ) ) {
			$j++;
			$thumbnail_file_path = $wordpress_upload_dir['basedir'] . '/avatar_images/thumbnail/' . $j . '_' . $thumbnail_upload['name'];
		}
	


		if( move_uploaded_file( $profilepicture['tmp_name'], $new_file_path ) ) {

	 
			$upload_id = wp_insert_attachment( array(
				'guid'           => $new_file_path, 
				'post_mime_type' => $new_file_mime,
				'post_title'     => preg_replace( '/\.[^.]+$/', '', $profilepicture['name'] ),
				'post_content'   => '',
				'post_status'    => 'inherit'
			), $new_file_path );
		 
			// wp_generate_attachment_metadata() won't work if you do not include this file
			require_once( ABSPATH . 'wp-admin/includes/image.php' );
		 
			// Generate and save the attachment metas into the database
			wp_update_attachment_metadata( $upload_id, wp_generate_attachment_metadata( $upload_id, $new_file_path ) );
		 
			// Show the uploaded file in browser
			//wp_redirect( $wordpress_upload_dir['baseurl'] . '/avatar_images/' . basename( $new_file_path ) );
			$main_image_path = $wordpress_upload_dir['baseurl'] . '/avatar_images/' . basename( $new_file_path );


			
			
			if( move_uploaded_file( $thumbnail_upload['tmp_name'], $thumbnail_file_path ) ) {
			
		 
		 
			$thumb_upload_id = wp_insert_attachment( array(
				'guid'           => $thumbnail_file_path, 
				'post_mime_type' => $thumbnail_file_mime,
				'post_title'     => preg_replace( '/\.[^.]+$/', '', $thumbnail_upload['name'] ),
				'post_content'   => '',
				'post_status'    => 'inherit'
			), $thumbnail_file_path );
		 
			// Generate and save the attachment metas into the database
			wp_update_attachment_metadata( $thumb_upload_id, wp_generate_attachment_metadata( $thumb_upload_id, $thumbnail_file_path ) );
		 
			// Show the uploaded file in browser
			//wp_redirect( $wordpress_upload_dir['baseurl'] . '/avatar_images/' . basename( $new_file_path ) );
			$thumb_image_path = $wordpress_upload_dir['baseurl'] . '/avatar_images/thumbnail/' . basename( $thumbnail_file_path );

					$sql = $wpdb->update( $wp_job , array( "name"=>$name, "thumb_img"=>$thumb_image_path,"image"=>$main_image_path, "parent_element"=>$Select_parent, "skinColour"=>$Select_skincolour, "gender"=>$select_gender ),array('id'=>$row_id) );



			        if ($sql==true) {
			            echo "<script>alert('New Entry Updated')</script>";
			        }
			        else {
			            echo "<script>alert('New Entry Updation Failed!')</script>";
			        }
	 
				}
			

			else{ 

				if(empty($getthumimg)){

						$sql = $wpdb->update( $wp_job , array( "name"=>$name, "image"=>$main_image_path, "parent_element"=>$Select_parent, "skinColour"=>$Select_skincolour, "gender"=>$select_gender ),array('id'=>$row_id) );
			        if ($sql==true) {
			            echo "<script>alert('New Entry Updated')</script>";
			        }
			        else {
			            echo "<script>alert('New Entry Updation Failed!')</script>";
			        }

				}

				else{

						$sql = $wpdb->update( $wp_job , array( "name"=>$name, "image"=>$main_image_path,"thumb_img"=>$getthumimg, "parent_element"=>$Select_parent, "skinColour"=>$Select_skincolour, "gender"=>$select_gender ),array('id'=>$row_id) );
			        if ($sql==true) {
			            echo "<script>alert('New Entry Updated')</script>";
			        }
			        else {
			            echo "<script>alert('New Entry Updation Failed!')</script>";
			        }
				}
				

			}

			
		}


		else{

			if( move_uploaded_file( $thumbnail_upload['tmp_name'], $thumbnail_file_path ) ) {
			
		 
		 
			$thumb_upload_id = wp_insert_attachment( array(
				'guid'           => $thumbnail_file_path, 
				'post_mime_type' => $thumbnail_file_mime,
				'post_title'     => preg_replace( '/\.[^.]+$/', '', $thumbnail_upload['name'] ),
				'post_content'   => '',
				'post_status'    => 'inherit'
			), $thumbnail_file_path );
		 
			// Generate and save the attachment metas into the database
			wp_update_attachment_metadata( $thumb_upload_id, wp_generate_attachment_metadata( $thumb_upload_id, $thumbnail_file_path ) );
		 
			// Show the uploaded file in browser
			//wp_redirect( $wordpress_upload_dir['baseurl'] . '/avatar_images/' . basename( $new_file_path ) );
			$thumb_image_path = $wordpress_upload_dir['baseurl'] . '/avatar_images/thumbnail/' . basename( $thumbnail_file_path );

					$sql = $wpdb->update( $wp_job , array( "name"=>$name, "thumb_img"=>$thumb_image_path,"image"=>$getmainimg, "parent_element"=>$Select_parent ),array('id'=>$row_id) );



			        if ($sql==true) {
			            echo "<script>alert('New Entry Updated')</script>";
			        }
			        else {
			            echo "<script>alert('New Entry Updation Failed!')</script>";
			        }
	 
				}

				else{
						$sql = $wpdb->update( $wp_job , array( "name"=>$name, "image"=>$getmainimg,"thumb_img"=>$getthumimg, "parent_element"=>$Select_parent, "skinColour"=>$Select_skincolour ),array('id'=>$row_id) );
			        if ($sql==true) {
			            echo "<script>alert('New Entry Updated')</script>";
			        }
			        else {

			            echo "<script>alert('New Entry Updation Failed!')</script>";
			        }

				}



		
		}

	


        ######Image upload code ends  ######
	}



	#######update code ends

  ?>
 

<?php if($_GET['id']){ echo "<h1>Update Child Element</h1>";} 

	else{ echo "<h1>Add Child Element</h1>"; }?>

	
	<form name="add_child" enctype="multipart/form-data" class="create_child_option" id="add_child" action="" method="POST">
		
	<table class= "form-table" role= "presentation">
		<tbody>
			<tr class="form-field form-required">
				<?php global $wpdb; 
					$id  = $_GET['id'];
					$getdata = "select * from xKk_child_cat_data where id ='".$id."'";

	 				$get_qry = $wpdb->get_results($getdata); //print_r($get_qry); ?>

	 				<input name="id" type="hidden" id="getid" value="<?php echo $id; ?>" >

				<th scope="row">
				<label for="name">Name <span class="description">(required)</span></label>
				</th>
				<td>
				<input required style="width: 30%;" name="name" type="text" id="name" aria-required="true" autocapitalize="none" autocorrect="off" value="<?php if($id){echo $get_qry[0]->name;}  ?>" maxlength="60">
				</td>

			</tr>
			<tr class="form-field">

				<th scope="row">
				<label for="thumbnail_upload">Thumbnail Upload</label>
				</th>
				<td>
					<?php
						if($id){
							?>
						<img width="50" height="50" src="<?php echo $get_qry[0]->thumb_img;  ?>">
						<input type="file" name="thumbnail_upload" id="thumbnail_up" />
						<input name="getthumimg" type="hidden" id="getthumimg" value="<?php echo $get_qry[0]->thumb_img; ?>" >

						<?php
						}else{
					 ?>

				<input name="thumbnail_upload" type="file" id="thumbnail_up">
				<?php } ?>
				</td>

			</tr>
			<tr class="form-field form-required">

				<th scope="row">
				<label for="image_upload">Image Upload</label>
				</th>
				<td>
					<?php
						if($id){
							?>
						<img width="50" height="50" src="<?php echo $get_qry[0]->image;  ?>">
						<input type="file" name="image_upload" id="img_up" />
						<input name="getmainimg" type="hidden" id="getmainimg" value="<?php echo $get_qry[0]->image; ?>" >

						<?php
						}else{
					 ?>
					<input required name="image_upload" type="file" id="img_up">
					<?php } ?>
				</td>

			</tr>
			<tr class="form-field">
				<th scope="row"><label for="Select">Select Parent Element</label></th>
				<td>
				<?php 
					$querystr = "select * from xKk_parent_cat_data";

	 				$pageposts = $wpdb->get_results($querystr);

	 				$querystrupd = "select * from xKk_parent_cat_data where name !='".$get_qry[0]->parent_element."'";

	 				$pagepostsupd = $wpdb->get_results($querystrupd);


				?>

				<select name="Select_parent">

				<?php if($id){ ?><option selected="selected" value="<?php echo $get_qry[0]->parent_element;  ?>"><?php echo $get_qry[0]->parent_element;  ?></option><?php foreach ($pagepostsupd as $value) { ?><option value="<?php echo $value->name; ?>"><?php echo $value->name; ?></option><?php } } else{  ?> 

				<option selected="selected" value="Select Parent Element">Select Parent Element</option>	
				<?php foreach ($pageposts as $value) {
					
				 ?>
				<option value="<?php echo $value->name; ?>"><?php echo $value->name; ?></option>
				
				<?php } }?>
				</select>
				
				</td>
			</tr>

			
			<tr class="form-field">
				<th scope="row"><label for="Select">Select Gender</label></th>
				<td>
					<select name="select_gender">

					<?php if( $id ) { ?>

						<option selected="selected" value="<?php echo $select_gender; ?>"><?php echo $select_gender;  ?></option>
						<option value="male">Male</option>
						<option value="male">Female</option>

					<?php } else{ ?> 

						<option selected="selected" value="">Select Gender</option>	
						<option value="male">Male</option>
						<option value="female">Female</option>
					
					<?php } ?>
					</select>
				
				</td>
			</tr>
			

			<tr class="form-field form-required">

				<th scope="row">
				<label for="field_rank">Select Skin Colour <span class="description"></span></label>
				</th>
				<td>
					<select name="Select_skincolour">
						<?php if ($id) {
						?><option selected value="<?php echo $get_qry['0']->skinColour;  ?>"><?php echo $get_qry['0']->skinColour;  ?></option>
							<option value="White">White</option>
							<option value="Tan">Tan</option>
							<option value="Brown">Brown</option>
							<option value="Black">Black</option>
					<?php }else{ ?>
						<option value="">Select Skin Colour</option>
						<option value="White">White</option>
						<option value="Tan">Tan</option>
						<option value="Brown">Brown</option>
						<option value="Black">Black</option>
						<?php } ?>
					</select>
				</td>

			</tr>

		</tbody>
	</table> 
	<?php
	if($id){
		?>
		<p class="submit"><input type="submit" name="update_child" id="update_child" class="button button-primary" value="Update"></p>
	<?php } 
	else{

	 ?>
	<p class="submit"><input type="submit" name="add_child" id="add_child" class="button button-primary" value="Save"></p>  
	<?php } ?>
	</form>

	 
 
	</div>
	<?php
}


#Avatar Picker admin menu code ends



#Testimonial custom post code starts here


function my_custom_post_testimonials() {
  $labels = array(
    'name'               => _x( 'Testimonials', 'post type general name' ),
    'singular_name'      => _x( 'Testimonial', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'testimonial' ),
    'add_new_item'       => __( 'Add New Testimonial' ),
    'edit_item'          => __( 'Edit Testimonial' ),
    'new_item'           => __( 'New Testimonial' ),
    'all_items'          => __( 'All Testimonials' ),
    'view_item'          => __( 'View Testimonial' ),
    'search_items'       => __( 'Search Testimonial' ),
    'not_found'          => __( 'No Testimonials found' ),
    'not_found_in_trash' => __( 'No Testimonials found in the Trash' ), 
    'parent_item_colon'  => ’,
    'menu_name'          => 'Testimonials'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our products and product specific data',
    'public'        => true,
    'taxonomies' => array('post_tag','category'),
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
    'has_archive'   => true,
  );
  register_post_type( 'testimonial', $args ); 
}
add_action( 'init', 'my_custom_post_testimonials' );

#Testimonial custom post code ends here

/**
 * Enqueue Scripts for Skin Colour
 */
add_action( 'wp_enqueue_scripts', 'skin_colour_scripts' );
function skin_colour_scripts() { 

    wp_register_script( 'skincolour-js', get_stylesheet_directory_uri().'/assets/js/skin-colour.js', array( 'jquery' ) );
    wp_localize_script( 'skincolour-js', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')), array(), false, true );
    wp_enqueue_script( 'skincolour-js' );
}


/**
 * Storing avatar in DB Ajax Handler
 */
add_action( 'wp_ajax_save_character', 'save_character' );
add_action( 'wp_ajax_nopriv_save_character', 'save_character' );

function save_character() {

	global $wpdb;
	
	$wp_job = 'xKk_character_info';
	$user_id = $_GET['userId'];
	$charname = $_GET['charName'];
	$char_body_parts = $_GET['charBodyParts'];

	if( $user_id && $charname ) :
		$char_body_parts_json_encode = json_encode($char_body_parts);
		echo '<pre>'; print_r($char_body_parts_json_encode); echo '</pre>';

		$count =  $wpdb->get_results("SELECT COUNT(*) FROM `xKk_character_info` WHERE `user_id` = '$user_id'");

		if ( $count == 0 ) {
			$sql = $wpdb->insert( $wp_job , array( "user_id"=>$user_id, "char_name"=>$charname, "char_body"=>$char_body_parts_json_encode ) );
		}
		else{
    		$sql = $wpdb->update( $wp_job , array( "user_id"=>$user_id, "char_name"=>$charname,"char_body"=>$char_body_parts_json_encode ),array('user_id'=>$user_id) );
		}
		
	endif;

	wp_die(); // required. to end AJAX request.

}


/**
 * Display avatar thumbnail in Woocommerce cart page
 */
function custom_new_product_image( $_product_img, $cart_item, $cart_item_key ) {

	global $wpdb;

	$current_user_id = get_current_user_id();
	$char_body_parts_json_decode = '';

	$attributesqry = "SELECT char_body FROM `xKk_character_info` WHERE user_id = '" . $current_user_id . "'";
	$getattributesqry = $wpdb->get_results($attributesqry);

	foreach ( $getattributesqry as $key => $value ) {
		$char_body_parts_json_decode = json_decode( $value->char_body, true );
	}
	// echo '<pre>'; print_r($char_body_parts_json_decode); echo '</pre>';

	if( $char_body_parts_json_decode ):
		$thumbnail = '<div class="woo-char-container" id="woo-customChar">';
			$thumbnail .= '<img class="woo-char-parts" id="woo-charBody" src="' . $char_body_parts_json_decode['charBody'] . '">';
			$thumbnail .= '<img class="woo-char-parts" id="woo-charFace" src="' . $char_body_parts_json_decode['charFace'] . '">';
			$thumbnail .= '<img class="woo-char-parts" id="woo-charHair" src="' . $char_body_parts_json_decode['charHair'] . '">';
			$thumbnail .= '<img class="woo-char-parts" id="woo-charEye" src="' . $char_body_parts_json_decode['charEye'] . '">';
			$thumbnail .= '<img class="woo-char-parts" id="woo-charNose" src="' . $char_body_parts_json_decode['charNose'] . '">';
			$thumbnail .= '<img class="woo-char-parts" id="woo-charSpecs" src="' . $char_body_parts_json_decode['charSpecs'] . '">';
			$thumbnail .= '<img class="woo-char-parts" id="woo-charFreckles" src="' . $char_body_parts_json_decode['charFreckles'] . '">';
		$thumbnail .= '</div>';
    	
    	return $thumbnail;

    else:
    	return $_product_img;

	endif;
	
}

add_filter( 'woocommerce_cart_item_thumbnail', 'custom_new_product_image', 10, 3 );



// Reference the Dompdf namespace
use Dompdf\Dompdf;


/** 
 * Generate avatar pdf
 */
function avatar_pdf(){ 
    
    if( isset( $_POST['charpdf'] ) ) {
        
        global $wpdb;
        $current_user_id = get_current_user_id();
        
        // make sure that output buffering has been enabled
        if (ob_start()) { 
                
            // clear previous contents from the server output cache
            ob_clean();
                
            require_once( get_stylesheet_directory() . '/dompdf/autoload.inc.php' );
        
            // Declare variable
        	$char_body_parts_json_decode = '';
        	$avatar_body_html = '';
        	$avatar_name = '';

            if( $current_user_id ) {
            
    	        $attributesqry = "SELECT char_name, char_body FROM `xKk_character_info` WHERE user_id = '" . $current_user_id . "'";
    	        $getattributesqry = $wpdb->get_results($attributesqry);
    
                // echo '<pre>'; print_r($getattributesqry); echo '</pre>';
        
        	    foreach ( $getattributesqry as $key => $value ) {
        	        $avatar_name = $value->char_name;
        		    $char_body_parts_json_decode = json_decode( $value->char_body, true );
        	    }

        
            	// Avatar header html 
            	$avatar_header_html = '<html>
                                  <head>
                                  <img class="charpdf-background" src="' . get_template_directory_uri() . '/assets/img/book cover background-tr-min.png">
                                   <style>
                                  img#charpdf-charBody-large, img#charpdf-charFace-large, img#charpdf-charHair-large, img#charpdf-charEye-large, img#charpdf-charNose-large, img#charpdf-charSpecs-large, img#charpdf-charFreckles-large 
{
                                        position: absolute;
                                        top: 56%;
                                        left: 66.5%;
                                        transform: translate(-50% ,-50%);
                                        height: 300px;
                                    }
img#charpdf-charBody-small,
img#charpdf-charFace-small,
img#charpdf-charHair-small,
img#charpdf-charEye-small,
img#charpdf-charNose-small,
img#charpdf-charSpecs-small,
img#charpdf-charFreckles-small
{
    position: absolute;
    top: 30%;
    left: 37.3%;
    transform: translate(-50% ,0%);
    height: 130px;
} 
                                    img.charpdf-background {
                                        height: 100%;
                                        width: auto;
                                        position: relative;
    z-index: 1;
                                        
                                    }
                                    
                                   </style>
                                  </head>';
        
        
                // Avatar body html
	    		$avatar_body_html = '<body>';
	    		
	    	    if( !empty( $char_body_parts_json_decode ) ) {
	    	    
	                // Avatar body parts html small
	    		    $avatar_body_html .= '<div class="charpdf-char-container-small" id="charpdf-customChar-small">
	    			                 <img class="charpdf-char-parts-small" id="charpdf-charBody-small" src="' . $char_body_parts_json_decode['charBody'] . '">
	    			                 <img class="charpdf-char-parts-small" id="charpdf-charFace-small" src="' .   $char_body_parts_json_decode['charFace'] . '">
	    			                 <img class="charpdf-char-parts-small" id="charpdf-charHair-small" src="' . $char_body_parts_json_decode['charHair'] . '">
	    			                 <img class="charpdf-char-parts-small" id="charpdf-charEye-small" src="' . $char_body_parts_json_decode['charEye'] . '">
	    			                 <img class="charpdf-char-parts-small" id="charpdf-charNose-small" src="' . $char_body_parts_json_decode['charNose'] . '">
	    			                 <img class="charpdf-char-parts-small" id="charpdf-charSpecs-small" src="' . $char_body_parts_json_decode['charSpecs'] . '">
	                    			 <img class="charpdf-char-parts-small" id="charpdf-charFreckles-small" src="' . $char_body_parts_json_decode['charFreckles'] . '">
	    		                    </div>';
	    		                    
	    		    // Avatar body parts html large
	    		    $avatar_body_html .= '<div class="charpdf-char-container-large" id="charpdf-customChar">
	    			                 <img class="charpdf-char-parts-large" id="charpdf-charBody-large" src="' . $char_body_parts_json_decode['charBody'] . '">
	    			                 <img class="charpdf-char-parts-large" id="charpdf-charFace-large" src="' . $char_body_parts_json_decode['charFace'] . '">
	    			                 <img class="charpdf-char-parts-large" id="charpdf-charHair-large" src="' . $char_body_parts_json_decode['charHair'] . '">
	    			                 <img class="charpdf-char-parts-large" id="charpdf-charEye-large" src="' . $char_body_parts_json_decode['charEye'] . '">
	    			                 <img class="charpdf-char-parts-small" id="charpdf-charNose-large" src="' . $char_body_parts_json_decode['charNose'] . '">
	    			                 <img class="charpdf-char-parts-large" id="charpdf-charSpecs-large" src="' . $char_body_parts_json_decode['charSpecs'] . '">
	                    			 <img class="charpdf-char-parts-large" id="charpdf-charFreckles-large" src="' . $char_body_parts_json_decode['charFreckles'] . '">
	    		                    </div>';
	    		
	    	    }
    	
    		    $avatar_footer_html = '</body></html>';
    	
    	        // Build Avatar html
    	        $content = $avatar_header_html . $avatar_body_html . $avatar_footer_html;
    	
                echo '<pre>'; print_r($content); echo '</pre>';die;
        
                // Instantiate dompdf class
                $dompdf = new Dompdf();
                // echo '<pre>'; print_r($dompdf); echo '</pre>';

                // Load HTML content
                $dompdf->loadHtml($content);
        
                $dompdf->set_option('isRemoteEnabled', TRUE);
                
                // Setup paper size
                $dompdf->set_paper('A4', 'landscape');
        
                // Render the HTML as Pdf
                $dompdf->render();
            
                // Output the generated PDF
                $dompdf->stream($avatar_name);
            
            }
            
            // make sure the content of the buffer is sent to the client.
            ob_flush();
            
            // terminate the script to make sure no additional content is sent.
            exit(0);

        }
    }

}

add_action('init', 'avatar_pdf');






/**
 * Fix pagination on archive pages
 * After adding a rewrite rule, go to Settings > Permalinks and click Save to flush the rules cache
 */
/*function my_pagination_rewrite() {
    add_rewrite_rule('blog/page/?([0-9]{1,})/?$', 'index.php/blog?post_type=post&paged=$matches[1]', 'top');
}
add_action('init', 'my_pagination_rewrite');*/

