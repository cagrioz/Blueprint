<?php
/**
 * Bluprint Theme Customizer
 *
 * @package Bluprint
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function blueprint_customize_register( $wp_customize ) {

    // Remove Sections
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->remove_section("colors");
    $wp_customize->remove_section("title_tagline");
    $wp_customize->remove_section("static_front_page");

/*--------------------------------------------------------------
# Add Custom Panels
--------------------------------------------------------------*/

# Panel: Theme Options
$wp_customize->add_panel( 'theme_options', array(
    'priority' => 1,
    'capability' => 'edit_theme_options',
    'title' => __( 'Theme Options', 'blueprint' ),
    'description' => __( 'Blueprint theme customization panel, create your style!', 'blueprint' )
) );

# Panel: Social Media
$wp_customize->add_panel( 'socials', array(
    'priority' => 2,
    'capability' => 'edit_theme_options',
    'title' => __( 'Social Media Settings', 'blueprint' ),
    'description' => __( 'Create your social media settings on here easily!', 'blueprint' )
) );


/* Theme Options Panel Starts Here
-------------------------------------- */

    /*=============== Section: General Options ===================*/
    $wp_customize->add_section( 'general', array(
        'title'       => esc_html__( 'General Options' ,'blueprint' ),
        'priority'    => 10,
        'panel'       => 'theme_options'
    ) );

        // Homepage Post Layout
        $wp_customize->add_setting( 'home_layout', array(
            'sanitize_callback' => 'blueprint_sanitize_select',
            'type'              => 'theme_mod',
            'default'           => 'std'
        ) );

        $wp_customize->add_control('home_layout', array(
            'settings'    => 'home_layout',
            'priority'    => 10,
            'section'     => 'general',
            'label'       => esc_html__( 'Homepage Post Layout', 'blueprint' ),
            'type'        => 'select',
            'choices'     => array(
                'std'          => esc_html__( 'Standard', 'blueprint' )
            )
        ) );

        // Homepage Sidebar Layout
        $wp_customize->add_setting( 'home_sidebar', array(
            'sanitize_callback' => 'blueprint_sanitize_select',
            'type'              => 'theme_mod',
            'default'           => 'r_sidebar'
        ) );

        $wp_customize->add_control('home_sidebar', array(
            'settings'    => 'home_sidebar',
            'priority'    => 20,
            'section'     => 'general',
            'label'       => esc_html__( 'Homepage Sidebar Layout', 'blueprint' ),
            'type'        => 'select',
            'choices'     => array(
                'r_sidebar'    => esc_html__( 'Right Sidebar', 'blueprint' ),
                'l_sidebar'    => esc_html__( 'Left Sidebar', 'blueprint' ),
                'no_sidebar'   => esc_html__( 'Full Width (No sidebar)', 'blueprint' )
            )
        ) );

        // Single Post Sidebar Layout
        $wp_customize->add_setting( 'single_sidebar', array(
            'sanitize_callback' => 'blueprint_sanitize_select',
            'type'              => 'theme_mod',
            'default'           => 'r_sidebar'
        ) );

        $wp_customize->add_control('single_sidebar', array(
            'settings'    => 'single_sidebar',
            'priority'    => 30,
            'section'     => 'general',
            'label'       => esc_html__( 'Single Post Layout', 'blueprint' ),
            'type'        => 'select',
            'choices'     => array(
                'r_sidebar'    => esc_html__( 'Right Sidebar', 'blueprint' ),
                'l_sidebar'    => esc_html__( 'Left Sidebar', 'blueprint' ),
                'no_sidebar'   => esc_html__( 'Full Width (No sidebar)', 'blueprint' )
            )
        ) );

        // Archive Pages Post Layout
        $wp_customize->add_setting( 'archive_layout', array(
            'sanitize_callback' => 'blueprint_sanitize_select',
            'type'              => 'theme_mod',
            'default'           => 'std'
        ) );

        $wp_customize->add_control('archive_layout', array(
            'settings'    => 'archive_layout',
            'priority'    => 40,
            'section'     => 'general',
            'label'       => esc_html__( 'Archive Pages Post Layout', 'blueprint' ),
            'type'        => 'select',
            'choices'     => array(
                'std'          => esc_html__( 'Standard', 'blueprint' )
            )
        ) );

        // Homepage Sidebar Layout
        $wp_customize->add_setting( 'archive_sidebar', array(
            'sanitize_callback' => 'blueprint_sanitize_select',
            'type'              => 'theme_mod',
            'default'           => 'r_sidebar'
        ) );

        $wp_customize->add_control('archive_sidebar', array(
            'settings'    => 'archive_sidebar',
            'priority'    => 50,
            'section'     => 'general',
            'label'       => esc_html__( 'Archive Sidebar Layout', 'blueprint' ),
            'type'        => 'select',
            'choices'     => array(
                'r_sidebar'    => esc_html__( 'Right Sidebar', 'blueprint' ),
                'l_sidebar'    => esc_html__( 'Left Sidebar', 'blueprint' ),
                'no_sidebar'   => esc_html__( 'Full Width (No sidebar)', 'blueprint' )
            )
        ) );

    /*=============== Section: Color Customization ===================*/
    $wp_customize->add_section( 'color_customization', array(
        'title'       => esc_html__( 'Color Customization' ,'blueprint' ),
        'priority'    => 20,
        'panel'       => 'theme_options'
    ) );

    /*=============== Section: Header Options ===================*/
    $wp_customize->add_section( 'header', array(
        'title'       => esc_html__( 'Header Options' ,'blueprint' ),
        'priority'    => 30,
        'panel'       => 'theme_options'
    ) );

        // Header Logo
        $wp_customize->add_setting( 'header_logo', array(
            'default'           => '',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'blueprint_sanitize_callback'
        ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_logo', array(
            'priority'          =>  10,
            'section'           =>  'header',
            'settings'          =>  'header_logo',
            'label'             =>  esc_html__( 'Header Logo', 'blueprint' )
        ) ) );

        // Sidemenu Logo
        $wp_customize->add_setting( 'sidemenu_logo', array(
            'default'           => '',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'blueprint_sanitize_callback'
        ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sidemenu_logo', array(
            'priority'          =>  20,
            'section'           =>  'header',
            'settings'          =>  'sidemenu_logo',
            'label'             =>  esc_html__( 'Custom Sidemenu Logo', 'blueprint' ),
            'description'       =>  esc_html__( 'Responsive menu\'s logo. Default is header logo.', 'blueprint' )
        ) ) );


    /*=============== Section: Blog Post Customization ===================*/
    $wp_customize->add_section( 'post_customization', array(
        'title'       => esc_html__( 'Blog Post Customization' ,'blueprint' ),
        'priority'    => 40,
        'panel'       => 'theme_options'
    ) );

    /*=============== Section: Footer Options ===================*/
    $wp_customize->add_section( 'footer', array(
        'title'       => esc_html__( 'Footer Options' ,'blueprint' ),
        'priority'    => 50,
        'panel'       => 'theme_options'
    ) );

        // Footer Copyright
        $wp_customize->add_setting( 'footer_copyright', array(
            'sanitize_callback' => 'blueprint_sanitize_callback',
            'type'              => 'theme_mod',
            'default'           => 'Copyright &copy; 2018. All rights reserved.'
        ) );

        $wp_customize->add_control( 'footer_copyright', array(
            'settings'    => 'footer_copyright',
            'priority'    => 10,
            'section'     => 'footer',
            'label'       => esc_html__( 'Copyright Text', 'blueprint' ),
            'type'        => 'text'
        ) );

    /*=============== Section: 404 Page ===================*/
    $wp_customize->add_section( 'page_404', array(
        'title'       => esc_html__( '404 Page Options' ,'blueprint' ),
        'priority'    => 60,
        'panel'       => 'theme_options'
    ) );

        // Error Title
        $wp_customize->add_setting( 'err_title', array(
            'sanitize_callback' => 'blueprint_sanitize_callback',
            'type'              => 'theme_mod',
            'default'           => 'Oops! That page can&rsquo;t be found.'
        ) );

        $wp_customize->add_control( 'err_title', array(
            'settings'    => 'err_title',
            'priority'    => 10,
            'section'     => 'page_404',
            'label'       => esc_html__( 'Error Page Title', 'blueprint' ),
            'type'        => 'text'
        ) );

        // Error Description
        $wp_customize->add_setting( 'err_desc', array(
            'sanitize_callback' => 'blueprint_sanitize_callback',
            'type'              => 'theme_mod',
            'default'           => 'This page isn\'t it. But while you\'re here,'
        ) );

        $wp_customize->add_control( 'err_desc', array(
            'settings'    => 'err_desc',
            'priority'    => 20,
            'section'     => 'page_404',
            'label'       => esc_html__( 'Error Page Description', 'blueprint' ),
            'type'        => 'text'
        ) );

        // Error Home Link Text
        $wp_customize->add_setting( 'err_linktext', array(
            'sanitize_callback' => 'blueprint_sanitize_callback',
            'type'              => 'theme_mod',
            'default'           => 'how about going home?'
        ) );

        $wp_customize->add_control( 'err_linktext', array(
            'settings'    => 'err_linktext',
            'priority'    => 30,
            'section'     => 'page_404',
            'label'       => esc_html__( 'Error Link Text', 'blueprint' ),
            'type'        => 'text'
        ) );

        // Error Page Image
        $wp_customize->add_setting( 'err_img', array(
            'default'           => '',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'blueprint_sanitize_callback'
        ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'err_img', array(
            'priority'          =>  40,
            'section'           =>  'page_404',
            'settings'          =>  'err_img',
            'description'       =>  esc_html__( 'Error Page IMG/GIF', 'blueprint' )
        ) ) );

/* Theme Options Panel Ends Here
-------------------------------------- */
    

/* Social Media Panel Starts Here
-------------------------------------- */

    $socials = blueprint_socials();

    /*=============== Section: Social Profiles ===================*/
    $wp_customize->add_section( 'social_profiles', array(
        'title'       => esc_html__( 'Social Profiles' ,'blueprint' ),
        'priority'    => 10,
        'panel'       => 'socials'
    ) );

        // Social Profiles
        $priority = 10;
        foreach ( $socials as $social => $media ) {
            $wp_customize->add_setting( 'profile_' . $social, array(
                'sanitize_callback' => 'blueprint_sanitize_callback',
                'type'              => 'theme_mod',
                'default'           => ''
            ) );

            $wp_customize->add_control( 'profile_' . $social, array(
                'settings'    => 'profile_' . $social,
                'priority'    => $priority,
                'section'     => 'social_profiles',
                'label'       => $media,
                'type'        => 'text'
            ) );

            $priority += 10;
        }


    /*=============== Section: Social Share ===================*/
    $wp_customize->add_section( 'social_share', array(
        'title'       => esc_html__( 'Social Share' ,'blueprint' ),
        'priority'    => 20,
        'panel'       => 'socials'
    ) );

        $shares = array(
            'facebook'   => 'Facebook',
            'twitter'     => 'Twitter',
            'pinterest'   => 'Pinterest',
            'google-plus' => 'Google Plus',
            'linkedin'    => 'Linkedin',
            'reddit'      => 'Reddit',
            'tumblr'      => 'Tumblr'
        );

        // Social Shares
        $priority = 10;
        foreach ( $shares as $share => $media ) {
            $wp_customize->add_setting( 'share_' . $share, array(
                'sanitize_callback' => 'blueprint_sanitize_callback',
                'type'              => 'theme_mod',
                'default'           => false
            ) );

            $wp_customize->add_control( 'share_' . $share, array(
                'settings'    => 'share_' . $share,
                'priority'    => $priority,
                'section'     => 'social_share',
                'label'       => $media,
                'type'        => 'checkbox'
            ) );

            $priority += 10;
        }

/* Social Media Panel Ends Here
-------------------------------------- */
}
add_action( 'customize_register', 'blueprint_customize_register' );

/* Sanitize nonnegative integer */
function blueprint_sanitize_number( $value ) {
	$value = absint( $value );
	if ( ! $value )
		$value = '';
	return $value;
}

/* Sanitize the checkbox */
function blueprint_sanitize_checkbox( $value ) {
	if ( 0 == $value )
		return false;
	else
		return true;
}

function blueprint_sanitize_callback( $value ) {
	return $value;
}

function blueprint_sanitize_select( $input, $setting ) {

  // Ensure input is a slug.
  $input = sanitize_key( $input );

  // Get list of choices from the control associated with the setting.
  $choices = $setting->manager->get_control( $setting->id )->choices;

  // If the input is a valid key, return it; otherwise, return the default.
  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}


/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function blueprint_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function blueprint_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function blueprint_customize_preview_js() {
	wp_enqueue_script( 'blueprint-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'blueprint_customize_preview_js' );
