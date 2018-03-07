<?php
/**
 * The main template file.
 *
 * @package Weta
 * @since Weta 1.0
 * @version 1.0
 */

get_header(); ?>

	<div class="blog-wrap cf">
		<div id="primary" class="site-content cf" role="main">
		<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				get_template_part( 'content' );

				endwhile;
		?>

			<?php
			// Previous/next post navigation.
			weta_content_nav( 'nav-below' ); ?>

		</div><!-- end #primary -->
	<?php get_sidebar(); ?>
	</div><!-- end .blog-wrap -->
<?php get_footer(); ?>