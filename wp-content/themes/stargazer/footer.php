<?php hybrid_get_sidebar( 'primary' ); // Loads the sidebar/primary.php template. ?>

</div><!-- #main -->

<?php hybrid_get_sidebar( 'subsidiary' ); // Loads the sidebar/subsidiary.php template. ?>
<?php hybrid_get_sidebar( 'ssubsidiary' ); // Loads the sidebar/ssubsidiary.php template. ?>
<section class="widget_text widget widget_custom_html"><?php get_category_by_slug( basename(get_permalink()) );?>
<h3 class="widget-title font-headlines section-heading"><span class="wrap"><?php echo( basename(get_permalink()) ); ?></span></h3>
<div class="textwidget"><?php $i=1; ?>
<ul class="menu layout-horizontal theme-story"><?php global $post; $page_slug = $post->post_name; $args = array( 'category_name' => $page_slug ); $category_query = new WP_Query($args); if ($category_query->have_posts()) { while ($category_query->have_posts()) { $category_query->the_post(); ?>
<li class="vc_col-sm-4" >
	<article class="summary">
		<header class="summary" id="<?php the_title(); ?>" name="<?php the_title(); ?>" >
			<a href="<?php the_permalink(); ?>"  >
				<meta itemprop="position" content="<?php echo $i++; ?>">
				<span ><strong><?php the_title(); ?></strong></span></a><br/>
				<span class="entry-byline"> <?php the_category(', '); ?></span>
		</header>
			<span itemprop="description"><?php the_excerpt(); ?></span>
		</article></li>
<?php }} wp_reset_postdata();?></ul></div><!-- .textwidget --></section></aside></div><!-- .wrap -->
<footer <?php hybrid_attr( 'footer' ); ?>><div class="wrap"><?php hybrid_get_sidebar( 'sssubsidiary' ); // Loads the sidebar/subsidiary.php template. ?>
<p class="credit"><a href="//www.p3.marketing/impressum/">Impressum</a> - <a href="//www.p3.marketing/agb/">AGB</a> - <a href="//www.p3.marketing/datenschutz/">Datenschutz</a><br/><?php printf(	// Translators: 1 is current year, 2 is site name/link, 3 is WordPress name/link, and 4 is theme name/link. */
__( 'Copyright &#169; %1$s %2$s.', 'stargazer' ), date_i18n( 'Y' ), hybrid_get_site_link(), hybrid_get_wp_link(), hybrid_get_theme_link() ); ?></p></aside>

</div></footer></div>
<?php  //  wp_footer();   WordPress hook for loading JavaScript, toolbar, and other things in the footer. ?>
</body>
</html>
