<?php
/**
 * The template for displaying archive pages
 *
 * @package Weta
 * @since Weta 1.0
 * @version 1.0
 */

get_header(); ?>

	<div class="blog-wrap cf">
		<div id="primary" class="site-content cf" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="archive-header">
				<?php
					the_archive_title( '<h1 class="archive-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- end .archive-header -->

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					get_template_part( 'content', get_post_format() );

				// End the loop.
				endwhile;

			// If no content, include the "No posts found" template.
			else :
				get_template_part( 'content', 'none' );

			endif;
			?>

			<?php
			// Previous/next post navigation.
			weta_content_nav( 'nav-below' ); ?>

	</div><!-- end #primary -->
	<?php get_sidebar(); ?>
	</div><!-- end .blog-wrap -->
<?php get_footer(); ?>