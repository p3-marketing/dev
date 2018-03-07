<?php
/**
 * Available Weta Shortcodes
 *
 *
 * @package Weta
 * @since Weta 1.0
 * @version 1.0
 */

/*-----------------------------------------------------------------------------------*/
/* Weta Shortcodes
/*-----------------------------------------------------------------------------------*/
// Enable shortcodes in widget areas
add_filter( 'widget_text', 'do_shortcode' );

// Replace WP autop formatting
if (!function_exists( "weta_remove_wpautop")) {
	function weta_remove_wpautop($content) {
		$content = do_shortcode( shortcode_unautop( $content ) );
		$content = preg_replace( '#^<\/p>|^<br \/>|<p>$#', '', $content);
		return $content;
	}
}

/*-----------------------------------------------------------------------------------*/
/* Multi Columns Shortcodes
/* Don't forget to add "_last" behind the shortcode if it is the last column.
/*-----------------------------------------------------------------------------------*/

// Two Columns
function weta_shortcode_two_columns_one( $atts, $content = null ) {
   return '<div class="two-columns-one">' . weta_remove_wpautop($content) . '</div>';
}
add_shortcode( 'two_columns_one', 'weta_shortcode_two_columns_one' );

function weta_shortcode_two_columns_one_last( $atts, $content = null ) {
   return '<div class="two-columns-one last">' . weta_remove_wpautop($content) . '</div>';
}
add_shortcode( 'two_columns_one_last', 'weta_shortcode_two_columns_one_last' );

// Three Columns
function weta_shortcode_three_columns_one($atts, $content = null) {
   return '<div class="three-columns-one">' . weta_remove_wpautop($content) . '</div>';
}
add_shortcode( 'three_columns_one', 'weta_shortcode_three_columns_one' );

function weta_shortcode_three_columns_one_last($atts, $content = null) {
   return '<div class="three-columns-one last">' . weta_remove_wpautop($content) . '</div>';
}
add_shortcode( 'three_columns_one_last', 'weta_shortcode_three_columns_one_last' );

function weta_shortcode_three_columns_two($atts, $content = null) {
   return '<div class="three-columns-two">' . weta_remove_wpautop($content) . '</div>';
}
add_shortcode( 'three_columns_two', 'weta_shortcode_three_columns_two' );

function weta_shortcode_three_columns_two_last($atts, $content = null) {
   return '<div class="three-columns-two last">' . weta_remove_wpautop($content) . '</div>';
}
add_shortcode( 'three_columns_two_last', 'weta_shortcode_three_columns_two_last' );

// Four Columns
function weta_shortcode_four_columns_one($atts, $content = null) {
   return '<div class="four-columns-one">' . weta_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_one', 'weta_shortcode_four_columns_one' );

function weta_shortcode_four_columns_one_last($atts, $content = null) {
   return '<div class="four-columns-one last">' . weta_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_one_last', 'weta_shortcode_four_columns_one_last' );

function weta_shortcode_four_columns_two($atts, $content = null) {
   return '<div class="four-columns-two">' . weta_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_two', 'weta_shortcode_four_columns_two' );

function weta_shortcode_four_columns_two_last($atts, $content = null) {
   return '<div class="four-columns-two last">' . weta_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_two_last', 'weta_shortcode_four_columns_two_last' );

function weta_shortcode_four_columns_three($atts, $content = null) {
   return '<div class="four-columns-three">' . weta_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_three', 'weta_shortcode_four_columns_three' );

function weta_shortcode_four_columns_three_last($atts, $content = null) {
   return '<div class="four-columns-three last">' . weta_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_three_last', 'weta_shortcode_four_columns_three_last' );


// Divide Text Shortcode
function weta_shortcode_divider($atts, $content = null) {
   return '<div class="divider"></div>';
}
add_shortcode( 'divider', 'weta_shortcode_divider' );


/*-----------------------------------------------------------------------------------*/
/* Info Boxes Shortcodes
/*-----------------------------------------------------------------------------------*/

function weta_shortcode_white_box($atts, $content = null) {
   return '<div class="box white-box">' . do_shortcode( weta_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'white_box', 'weta_shortcode_white_box' );

function weta_shortcode_yellow_box($atts, $content = null) {
   return '<div class="box yellow-box">' . do_shortcode( weta_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'yellow_box', 'weta_shortcode_yellow_box' );

function weta_shortcode_red_box($atts, $content = null) {
   return '<div class="box red-box">' . do_shortcode( weta_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'red_box', 'weta_shortcode_red_box' );

function weta_shortcode_blue_box($atts, $content = null) {
   return '<div class="box blue-box">' . do_shortcode( weta_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'blue_box', 'weta_shortcode_blue_box' );

function weta_shortcode_green_box($atts, $content = null) {
   return '<div class="box green-box">' . do_shortcode( weta_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'green_box', 'weta_shortcode_green_box' );

function weta_shortcode_lightgrey_box($atts, $content = null) {
   return '<div class="box lightgrey-box">' . do_shortcode( weta_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'lightgrey_box', 'weta_shortcode_lightgrey_box' );

function weta_shortcode_grey_box($atts, $content = null) {
   return '<div class="box grey-box">' . do_shortcode( weta_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'grey_box', 'weta_shortcode_grey_box' );

function weta_shortcode_dark_box($atts, $content = null) {
   return '<div class="box dark-box">' . do_shortcode( weta_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'dark_box', 'weta_shortcode_dark_box' );


/*-----------------------------------------------------------------------------------*/
/* Buttons Shortcodes
/*-----------------------------------------------------------------------------------*/
function weta_button( $atts, $content = null ) {
    extract(shortcode_atts(array(
    'link'	=> '#',
    'target' => '',
    'color'	=> '',
    'size'	=> '',
	 'form'	=> '',
	 'font'	=> '',
    ), $atts));

	$color = ($color) ? ' '.$color. '-btn' : '';
	$size = ($size) ? ' '.$size. '-btn' : '';
	$form = ($form) ? ' '.$form. '-btn' : '';
	$font = ($font) ? ' '.$font. '-btn' : '';
	$target = ($target == 'blank') ? ' target="_blank"' : '';

	$out = '<a' .$target. ' class="standard-btn' .$color.$size.$form.$font. '" href="' .$link. '"><span>' .do_shortcode($content). '</span></a>';

    return $out;
}
add_shortcode('button', 'weta_button');

