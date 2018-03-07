<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package Weta
 * @since Weta 1.0
 * @version 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<div class="entry-meta">
				<div class="entry-date">
					<a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>
				</div><!-- end .entry-date -->
				<div class="entry-author">
				<?php
					printf( __( 'by <a href="%1$s" title="%2$s">%3$s</a>', 'weta' ),
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
					sprintf( esc_attr__( 'All posts by %s', 'weta' ), get_the_author() ),
					get_the_author() );
				?>
				</div><!-- end .entry-author -->
				<?php if ( comments_open() ) : ?>
				<div class="entry-comments">
					<?php comments_popup_link( '<span class="leave-reply">' . esc_html__( 'Leave a comment', 'weta' ) . '</span>', esc_html__( 'comment 1', 'weta' ), esc_html__( 'comments %', 'weta' ) ); ?>
				</div><!-- end .entry-comments -->
			<?php endif; // comments_open() ?>
			<?php edit_post_link( esc_html__( 'Edit', 'weta' ), '<div class="entry-edit">', '</div>' ); ?>
		</div><!-- end .entry-meta -->
	</header><!-- end .entry-header -->

	<?php if ( '' != get_the_post_thumbnail() && ! post_password_required()  &&  ! get_theme_mod('hide_singlethumb')  && ! has_post_format( 'video' ) ) : ?>
		<div class="entry-thumbnail inpost">
			<?php the_post_thumbnail();
echo get_post(get_post_thumbnail_id())->post_excerpt; ?>
		</div><!-- end .entry-thumbnail -->
	<?php endif; ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'weta' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- end .entry-content -->

	<footer class="entry-footer cf">
		<div class="entry-cats">
			<span><?php esc_html_e('Filed under ', 'weta') ?></span><?php the_category(', '); ?>
		</div><!-- end .entry-cats -->
		<?php $tags_list = get_the_tag_list();
			if ( $tags_list ): ?>
			<div class="entry-tags"><span><?php esc_html_e('Tagged ', 'weta') ?></span><?php the_tags('', ', ', ''); ?></div>
		<?php endif; ?>
		<?php
		// Author bio.
		if ( get_the_author_meta( 'description' ) ) :
			get_template_part( 'author-bio' );
		endif;
		?>
	</footer><!-- end .entry-footer -->
</article><!-- end .post-<?php the_ID(); ?> -->