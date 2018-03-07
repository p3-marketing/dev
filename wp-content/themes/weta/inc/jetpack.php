<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Weta
 * @since Weta 1.0
 * @version 1.0
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function weta_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' 		=> 'primary',
		'footer_widgets' 	=> array( 'footer-one', 'footer-two', 'footer-three', 'footer-four', 'footer-five' ),
		'footer'    		=> 'main-wrap',
	) );
}
add_action( 'after_setup_theme', 'weta_jetpack_setup' );

