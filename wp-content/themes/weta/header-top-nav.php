<?php
/**
 * The template for for the Header Top Navigation
 *
 * @subpackage Weta
 * @since Weta 1.0
  * @version 1.0
 */
?>

<?php if (has_nav_menu( 'header-top' ) ) : ?>
	<nav class="header-top-nav" role="navigation">
		<?php
			// Top navigation menu.
			wp_nav_menu( array(
				'theme_location'	=> 'header-top',
				'menu_class' 		=> 'nav-menu',
				'container' 		=> 'false' ));  ?>
	</nav><!-- end .header-top-nav -->
<?php endif; ?>

<div class="social-search-wrap">
	<?php if (has_nav_menu( 'header-social' ) ) : ?>
	<nav class="header-social-nav social-nav" role="navigation">
		<?php wp_nav_menu( array(
			'theme_location'	=> 'header-social',
			'container' 		=> 'false',
			'depth' 			=> -1));  ?>
	</nav><!-- end #header-social -->
	<?php endif; ?>

	<?php if ( get_theme_mod( 'show_headersearch' ) ) : ?>
		<div class="search-box">
			<?php get_search_form(); ?>
		</div><!-- end .search-box -->
	<?php endif; ?>
	
	<?php if ( get_theme_mod( 'show_shopnav' ) ) : ?>
	<div class="header-shop-wrap">
	 <?php if ( is_user_logged_in() ) { ?>
	 <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php esc_html_e('Account','weta'); ?>"><?php esc_html_e('Account','weta'); ?></a>
	<?php } 
	else { ?>
		<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php esc_html_e('Login / Register','weta'); ?>"><?php esc_html_e('Login / Register','weta'); ?></a>
		 	<?php } ?>
		<a class="cart-btn-top" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php esc_html_e( 'View cart', 'weta' ); ?>"><?php echo sprintf ( esc_html__('Cart (%d)', 'weta'), WC()->cart->cart_contents_count ); ?></a>
	</div><!-- end .header-shop-wrap -->
	<?php endif; ?>
</div><!-- end .social-search-wrap -->