<?php
/**
 * Implement Theme Customizer additions and adjustments.
 *
 * @package Weta
 * @since Weta 1.0
 * @version 1.0
 */

function weta_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	// Rename the label to "Site Title Color" because this only affects the site title in this theme.
	$wp_customize->get_control( 'header_textcolor' )->label = esc_html__( 'Site Title Color', 'weta' );
	
	$wp_customize->get_section('header_image')->title = __( 'Logo' );


	$wp_customize->add_section( 'weta_themeoptions', array(
		'title'         => __( 'Theme Options', 'weta' ),
		'priority'      => 135,
	) );

	// Add the custom settings and controls.
	
	$wp_customize->add_setting( 'header_background_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'refresh',
	) );

	// Custom Colors.

	// Link Color.
	$wp_customize->add_setting( 'link_color' , array(
    	'default'     		=> '#555555',
    	'sanitize_callback' => 'sanitize_hex_color',
		'transport'   		=> 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
		'label'		=> esc_html__( 'Link Color', 'weta' ),
		'section'	=> 'colors',
		'settings'	=> 'link_color',
	) ) );
	
	// Header Background Color.
	$wp_customize->add_setting( 'header_bg_color' , array(
    	'default'     		=> '#ffffff',
    	'sanitize_callback' => 'sanitize_hex_color',
		'transport'   		=> 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_bg_color', array(
		'label'		=> __( 'Header Background Color', 'weta' ),
		'section'	=> 'colors',
		'settings'	=> 'header_bg_color',
	) ) );
	
	// Footer Background Color.
	$wp_customize->add_setting( 'footer_bg_color' , array(
    	'default'     		=> '#f5f5f5',
    	'sanitize_callback' => 'sanitize_hex_color',
		'transport'   		=> 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bg_color', array(
		'label'		=> esc_html__( 'Footer Background Color', 'weta' ),
		'section'	=> 'colors',
		'settings'	=> 'footer_bg_color',
	) ) );

	// Author Widget Background Color.
	$wp_customize->add_setting( 'authorwidget_bg_color' , array(
    	'default'     		=> '#f5f5f5',
    	'sanitize_callback' => 'sanitize_hex_color',
		'transport'   		=> 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'authorwidget_bg_color', array(
		'label'		=> esc_html__( 'Author Widget Background Color', 'weta' ),
		'section'	=> 'colors',
		'settings'	=> 'authorwidget_bg_color',
	) ) );
	
	// Quote Widget Background Color.
	$wp_customize->add_setting( 'quotewidget_bg_color' , array(
    	'default'     		=> '#f5f5f5',
    	'sanitize_callback' => 'sanitize_hex_color',
		'transport'   		=> 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'quotewidget_bg_color', array(
		'label'		=> esc_html__( 'Quote Widget Background Color', 'weta' ),
		'section'	=> 'colors',
		'settings'	=> 'quotewidget_bg_color',
	) ) );

	// Numbered Recent Posts Widget Background Color.
	$wp_customize->add_setting( 'numberedrpwidget_bg_color' , array(
    	'default'     		=> '#f5f5f5',
    	'sanitize_callback' => 'sanitize_hex_color',
		'transport'   		=> 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'numberedrpwidget_bg_color', array(
		'label'		=> esc_html__( 'Numbered Recent Posts Widget Background Color', 'weta' ),
		'section'   => 'colors',
		'settings'  => 'numberedrpwidget_bg_color',
	) ) );

	// Theme Options.
	$wp_customize->add_setting( 'fixed_nav', array(
		'default'			=> '',
		'sanitize_callback' => 'weta_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'fixed_nav', array(
		'label'		=> esc_html__( 'Fixed-position main menu', 'weta' ),
		'description'	=> esc_html__( '(visible on wider screens only)', 'weta' ),
		'section'	=> 'weta_themeoptions',
		'type'		=> 'checkbox',
		'priority'	=> 1,
	) );

	$wp_customize->add_setting( 'show_headersearch', array(
		'default'      		=> '',
		'sanitize_callback' => 'weta_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'show_headersearch', array(
		'label'         => esc_html__( 'Show header search form', 'weta' ),
		'section'       => 'weta_themeoptions',
		'type'          => 'checkbox',
		'priority'		=> 2,
	) );
	
	$wp_customize->add_setting( 'show_shopnav', array(
		'default'       	=> '',
		'sanitize_callback' => 'weta_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'show_shopnav', array(
		'label'         => esc_html__( 'Show shop elements in header', 'weta' ),
		'description'	=> esc_html__( '(use only, if WooCommerce plugin is active)', 'weta' ),
		'section'       => 'weta_themeoptions',
		'type'          => 'checkbox',
		'priority'		=> 3,
	) );

	$wp_customize->add_setting( 'hide_borders', array(
		'default'       	=> '',
		'sanitize_callback' => 'weta_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'hide_borders', array(
		'label'         => esc_html__( 'Hide theme border lines', 'weta' ),
		'description'	=> esc_html__( 'Hide all light grey border lines of the theme design.', 'weta' ),
		'section'       => 'weta_themeoptions',
		'type'          => 'checkbox',
		'priority'		=> 4,
	) );
	
	$wp_customize->add_setting( 'hide_singlethumb', array(
		'default'			=> '',
		'sanitize_callback' => 'weta_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'hide_singlethumb', array(
		'label'		=> esc_html__( 'Hide Featured Image on single posts', 'weta' ),
		'section'	=> 'weta_themeoptions',
		'type'		=> 'checkbox',
		'priority'	=> 5,
	) );
	
	$wp_customize->add_setting( 'archive_excerpts', array(
		'default'			=> '',
		'sanitize_callback' => 'weta_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'archive_excerpts', array(
		'label'			=> esc_html__( 'Automatic archive excerpts', 'weta' ),
		'description'	=> esc_html__( '(Show automatic excerpts on archives and search results.)', 'weta' ),
		'section'		=> 'weta_themeoptions',
		'type'			=> 'checkbox',
		'priority'		=> 6,
	) );

	$wp_customize->add_setting( 'blog_excerpts', array(
		'default'	=> '',
		'sanitize_callback' => 'weta_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'blog_excerpts', array(
		'label'			=> esc_html__( 'Automatic blog excerpts', 'weta' ),
		'description'	=> esc_html__( '(Show automatic excerpts on default blog.)', 'weta' ),
		'section'		=> 'weta_themeoptions',
		'type'			=> 'checkbox',
		'priority'		=> 7,
	) );
	
	$wp_customize->add_setting( 'excerpt_morelink', array(
		'default'	=> '',
		'sanitize_callback' => 'weta_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'excerpt_morelink', array(
		'label'			=> esc_html__( 'Read More links on Front page', 'weta' ),
		'description'	=> esc_html__( '(Show "Read More" links on Front page.)', 'weta' ),
		'section'		=> 'weta_themeoptions',
		'type'			=> 'checkbox',
		'priority'		=> 8,
	) );
	
	$wp_customize->add_setting( 'weta_sharebtns', array(
		'default'	=> '',
		'sanitize_callback' => 'weta_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'weta_sharebtns', array(
		'label'			=> esc_html__( 'Use Custom Jetpack share buttons', 'weta' ),
		'description'	=> esc_html__( '(Activate to use custom Weta share buttons in the Jetpack sharing feature ("Icons only" has to be selected).', 'weta' ),
		'section'		=> 'weta_themeoptions',
		'type'			=> 'checkbox',
		'priority'		=> 9,
	) );
	
	$wp_customize->add_setting( 'small_logo', array(
		'default'       => '',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'small_logo', array(
		'label'         => esc_html__( 'Small logo image', 'weta' ),
		'description'	=> esc_html__( 'Show a small logo image in the main nav. The image height must be 34 pixels and the image width not bigger than 100px.', 'weta' ),
		'section'       => 'weta_themeoptions',
		'type'          => 'text',
		'priority'		=> 10,
	) );

	$wp_customize->add_setting( 'credit_text', array(
		'default'       => '',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'credit_text', array(
		'label'         => esc_html__( 'Footer credit text', 'weta' ),
		'description'	=> esc_html__( 'Customize the footer credit text. (HTML is allowed)', 'weta' ),
		'section'       => 'weta_themeoptions',
		'type'          => 'text',
		'priority'		=> 11,
	) );
	
	$wp_customize->add_setting( 'lightbox_btn_text', array(
		'default'       => '',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'lightbox_btn_text', array(
		'label'         => esc_html__( 'Lightbox button text', 'weta' ),
		'description'	=> esc_html__( 'Customize the lightbox button text (default text is "Subscribe Now").', 'weta' ),
		'section'       => 'weta_themeoptions',
		'type'          => 'text',
		'priority'		=> 12,
	) );
	
	$wp_customize->add_setting( 'lightbox_close_text', array(
		'default'       => '',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'lightbox_close_text', array(
		'label'         => esc_html__( 'Lightbox close text', 'weta' ),
		'description'	=> esc_html__( 'Customize the lightbox close button text (default text is "No Thanks").', 'weta' ),
		'section'       => 'weta_themeoptions',
		'type'          => 'text',
		'priority'		=> 13,
	) );

}
add_action( 'customize_register', 'weta_customize_register' );

/**
 * Sanitize Checkboxes.
 */
function weta_sanitize_checkbox( $input ) {
	if ( 1 == $input ) {
		return true;
	} else {
		return false;
	}
}