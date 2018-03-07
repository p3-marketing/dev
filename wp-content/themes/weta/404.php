<?php
/**
 * The template for displaying 404 error pages.
 *
 * @package Weta
 * @since Weta 1.0
 * @version 1.0
 */

get_header(); ?>
	
	<div class="blog-wrap cf">
		<div id="primary" class="site-content cf" role="main">

		<article id="post-0" class="page no-results not-found cf">

				<header class="entry-header">
					<h1 class="entry-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'weta' ); ?></h1>
				</header><!--end .entry-header -->

				<div class="entry-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try another search term?', 'weta' ); ?></p>

					<?php get_search_form(); ?>

				</div><!-- end .entry-content -->
		</article><!-- end #post-0 -->

</div><!-- end #primary -->
	<?php get_sidebar(); ?>
	</div><!-- end .blog-wrap -->
<?php get_footer(); ?>