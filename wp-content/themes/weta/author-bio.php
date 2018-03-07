<?php
/**
 * The template for displaying Author bios
 *
 * @subpackage Weta
 * @since Weta 1.0
  * @version 1.0
 */
?>

<div class="authorbox cf">
	<div class="author-avatar">
		<?php
		$author_bio_avatar_size = apply_filters( 'weta_author_bio_avatar_size', 150 );
		echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
		?>
	</div><!-- .author-avatar -->
	<div class="author-heading">
		<span><?php esc_html_e('Author', 'weta') ?></span>
		<h3 class="author-title"><?php printf( "<a href='" .  esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )) . "' rel='author'>" . get_the_author() . "</a>" ); ?></h3>
		<?php
		$author_url = get_the_author_meta('user_url');
			$to_remove = array( 'http://', 'https://' );
			foreach ( $to_remove as $item ) {
			$author_url = str_replace($item, '', $author_url);
		}
		echo '<a class="author-website" href=' . get_the_author_meta('user_url') .'> '  . $author_url . ' </a>';
		?>
	</div><!-- end .author-heading -->
	<p class="author-bio"><?php the_author_meta( 'description' ); ?></p>
</div><!-- end .authorbox -->