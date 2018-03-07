<?php
/**
 * Template for displaying the standard search forms
 *
 * @package Weta
 * @since Weta 1.0
 * @version 1.0
 */
?>

<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<label for="s" class="screen-reader-text"><span><?php esc_html_e( 'Search', 'weta' ); ?></span></label>
	<input type="text" class="search-field" name="s" id="s" placeholder="<?php echo esc_attr_x( 'Search&hellip;', 'placeholder', 'weta' ); ?>" />
	<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'weta' ); ?>" />
</form>