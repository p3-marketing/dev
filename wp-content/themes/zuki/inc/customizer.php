<?php
/**
 * Zuki Theme Customizer
 *
 * @package Zuki
 * @since Zuki 1.0
 */

/**
 * Implement Theme Customizer additions and adjustments.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 *
 * @since Zuki 1.0
 */
function zuki_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->add_section( 'zuki_themeoptions', array(
		'title'         => __( 'Theme', 'zuki' ),
		'priority'      => 135,
	) );

	// Add the custom settings and controls.
	$wp_customize->add_setting( 'header_textcolor' , array(
    	'default'     => '#000',
		'transport'   => 'refresh',
	) );

	// Custom Colors.
	$wp_customize->add_setting( 'link_color' , array(
    	'default'     => '#000',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
		'label'        => __( 'Link Color', 'zuki' ),
		'section'    => 'colors',
		'settings'   => 'link_color',
	) ) );

	$wp_customize->add_setting( 'widgetbg_color' , array(
    	'default'     => '#ebf8fe',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'widgetbg_color', array(
		'label'        => __( 'Zuki Recent Posts Widget Background Color', 'zuki' ),
		'section'    => 'colors',
		'settings'   => 'widgetbg_color',
	) ) );

	$wp_customize->add_setting( 'headerarchive_bg_color' , array(
    	'default'     => '#ebf8fe',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'headerarchive_bg_color', array(
		'label'        => __( 'Header Archive Background Color', 'zuki' ),
		'section'    => 'colors',
		'settings'   => 'headerarchive_bg_color',
	) ) );

	// Theme Options.
	$wp_customize->add_setting( 'hide_singlethumb', array(
		'default'	=> '',
		'sanitize_callback' => 'zuki_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'hide_singlethumb', array(
		'label'		=> __( 'Hide Featured Image on single posts', 'zuki' ),
		'section'	=> 'zuki_themeoptions',
		'type'		=> 'checkbox',
		'priority'	=> 1,
	) );

	$wp_customize->add_setting( 'show_headersearch', array(
		'default'       => '',
		'sanitize_callback' => 'zuki_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'show_headersearch', array(
		'label'         => __( 'Show Header Search', 'zuki' ),
		'section'       => 'zuki_themeoptions',
		'type'          => 'checkbox',
		'priority'		=> 2,
	) );

	$wp_customize->add_setting( 'show_headerarchive', array(
		'default'       => '',
		'sanitize_callback' => 'zuki_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'show_headerarchive', array(
		'label'         => __( 'Show Header Archive Area', 'zuki' ),
		'section'       => 'zuki_themeoptions',
		'type'          => 'checkbox',
		'priority'		=> 3,
	) );

	$wp_customize->add_setting( 'headerarchive_title', array(
		'default'       => '',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'headerarchive_title', array(
		'label'         => __( 'Header Archive Title', 'zuki' ),
		'section'       => 'zuki_themeoptions',
		'type'          => 'text',
		'priority'		=> 4,
	) );

	$wp_customize->add_setting( 'footer_socialmenu_title', array(
		'default'       => '',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'footer_socialmenu_title', array(
		'label'         => __( 'Footer Social Menu Title', 'zuki' ),
		'section'       => 'zuki_themeoptions',
		'type'          => 'text',
		'priority'		=> 5,
	) );

	$wp_customize->add_setting( 'credit_text', array(
		'default'       => '',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'credit_text', array(
		'label'         => __( 'Footer Credit Text', 'zuki' ),
		'section'       => 'zuki_themeoptions',
		'type'          => 'text',
		'priority'		=> 6,
	) );

}
add_action( 'customize_register', 'zuki_customize_register' );

/**
 * Sanitize Checkboxes.
 */
function zuki_sanitize_checkbox( $input ) {
	if ( 1 == $input ) {
		return true;
	} else {
		return false;
	}
}