<?php
/**
 * Template Name: Account Page
 *
 * Description: A page template for the WooCommerce Account Page
 *
 * @package Weta
 * @since Weta 1.0
 * @version 1.0
 */

get_header(); ?>

<div id="primary" class="site-content" role="main">

	<?php
		// Start the Loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'content', 'page' );

		endwhile;
	?>

</div><!-- end #primary -->
<?php get_footer(); ?>