<?php
/**
 * Blueprint Setup, Scripts and Styles
 *
 * @package    Blueprint
 * @version    1.3
 * @author     Elite Layers <admin@elitelayers.com>
 * @copyright  Copyright (c) 2018, Elite Layers
 * @link       http://blueprint.elitelayers.com/
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2 or later
 */

if ( ! function_exists( 'Blueprint_setup' ) ) :

	/**
	 * Sets up theme defaults.
	 */
	function blueprint_setup() {

		load_theme_textdomain( 'blueprint', get_template_directory() . '/languages' );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/**
		 * Register Menus
		 */
		 register_nav_menus( array(
			 'main-menu' => esc_html__( 'Main Menu', 'blueprint' )
 		 ) );

		/**
		 * Add post type
		 */
		add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio' ) );

		/**
		 * Add post thumbnail support
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Add image size
		 */
		add_image_size( 'blueprint_full', 1180, 650, true );
		add_image_size( 'blueprint_std', 865, 530, true );
		add_image_size( 'blueprint_thumb', 100, 100, true );

		/**
		 * Add support for core custom logo.
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/**
		 * Add feed links
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Add theme support for selective refresh for widgets.
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );


		/**
		 * Add title tag
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Add Editor Style
		 */
		add_editor_style( array( 'assets/css/editor-style.css', blueprint_fonts_url() ) );

	}

endif;
add_action( 'after_setup_theme', 'blueprint_setup' );

/**
 * Register Google Fonts
 *
 * @since 1.0
 */
if ( ! function_exists( 'blueprint_fonts_url' ) ) :

	function blueprint_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Ubuntu, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Ubuntu font: on or off', 'blueprint' ) ) {
			$fonts[] = 'Ubuntu:300,400,500,700';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), 'https://fonts.googleapis.com/css' );
		}

		return $fonts_url;
	}

endif;

/**
 * Register Sidebars
 *
 * @since 1.0
 */
if ( function_exists('register_sidebar') ) {

	register_sidebar(array(
		'name'          => esc_html__( 'Sidebar', 'blueprint' ),
		'id'            => 'sidebar-primary',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'blueprint' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h6>',
		'after_title'   => '</h6></div>',
	));

}

if ( ! function_exists( 'blueprint_load_scripts' ) ) :

	/**
	 * Register and enqueue styles/scripts
	 */
	function blueprint_load_scripts() {

		/**
		 * Load Fonts
		 */
		wp_enqueue_style( 'blueprint-fonts', blueprint_fonts_url(), array(), null );

		/**
		 * Load styles
		 */
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/fonts/font-awesome/font-awesome.min.css', array(), '4.7.0' );
   		wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), BLUEPRINT_VERSION );
		wp_enqueue_style( 'blueprint-style', get_template_directory_uri() . '/style.css', array(), BLUEPRINT_VERSION );
		wp_enqueue_style( 'blueprint-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), BLUEPRINT_VERSION );

		/**
		 * Load scripts
		 */
		wp_enqueue_script( 'masonry');
    	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/libs/owl.carousel.min.js', array('jquery'), BLUEPRINT_VERSION, true );
		wp_enqueue_script( 'blueprint-script', get_template_directory_uri() . '/assets/js/blueprint-script.js', array('jquery'), BLUEPRINT_VERSION, true );

		if ( is_singular() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	 }

endif;
add_action( 'wp_enqueue_scripts', 'blueprint_load_scripts' );
