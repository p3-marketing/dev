<?php
/**
 * The template for displaying the footer.
 *
 * @package Weta
 * @since Weta 1.0
 * @version 1.0
 */
?>

<footer id="colophon" class="site-footer cf">
	
	<div class="footer-wrap">
		<?php get_sidebar( 'footer' ); ?>
		<?php if (has_nav_menu( 'footer-social' ) ) : ?>
			<div id="footer-social-nav" class="social-nav" role="navigation">
				<?php wp_nav_menu( array('theme_location' => 'footer-social', 'container' => 'false', 'depth' => -1));  ?>
			</div><!-- end #footer-social -->
		<?php endif; ?>
	
		<div id="site-info">
			<ul class="credit" role="contentinfo">
				<?php if ( get_theme_mod( 'credit_text' ) ) : ?>
					<li><?php echo wp_kses_post( get_theme_mod( 'credit_text' ) ); ?></li>
				<?php else : ?>
				<li class="copyright">&copy; <?php echo date('Y'); ?> <a href="<?php echo home_url( '/' ); ?>"><?php bloginfo(); ?>.</a></li>
				<li class="wp-credit"><?php esc_html_e('Powered by', 'weta') ?> <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'weta' ) ); ?>" ><?php esc_html_e( 'WordPress', 'weta' ); ?></a></li>
				<li><?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'weta' ), 'Weta', '<a href="http://www.elmastudio.de/en/" rel="designer">Elmastudio</a>' ); ?></li>
				<?php endif; ?>
			</ul><!-- end .credit -->
		</div><!-- end #site-info -->
	</div><!-- end .footer-wrap -->
	
	<?php if ( is_active_sidebar( 'widgetarea-subscribe' ) ) : ?>
		<?php if ( get_theme_mod( 'lightbox_btn_text' ) ) : ?>
			<button class="lightbox-btn"><span><?php echo wp_kses_post( get_theme_mod( 'lightbox_btn_text' ) ); ?></span></button>
		<?php else : ?>
			<button class="lightbox-btn"><span><?php esc_html_e('Subscribe Now', 'weta') ?></span></button>
		<?php endif; ?>
		<div class="widgetarea-subscribe-outer lightbox">
			<div class="widgetarea-subscribe-inner">
				<?php dynamic_sidebar( 'widgetarea-subscribe' ); ?>
				<?php if ( get_theme_mod( 'lightbox_close_text' ) ) : ?>
					<button class="close-text lightbox-close"><span><?php echo wp_kses_post( get_theme_mod( 'lightbox_close_text' ) ); ?></span></button>
				<?php else : ?>
					<button class="close-text lightbox-close"><span><?php esc_html_e('No Thanks', 'weta') ?></span></button>
				<?php endif; ?>
				<button class="close-icon lightbox-close"><span><?php esc_html_e('Close', 'weta') ?></span></button>
			</div>
		</div>
	<?php endif; ?>

	<div class="top"><span><?php esc_html_e('Top', 'weta') ?></span></div>

</footer><!-- end #colophon -->
</div><!-- end #main-wrap -->

<?php wp_footer(); ?>

</body>
</html>