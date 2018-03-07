<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main-wrap">
 *
 * @package Weta
 * @since Weta 1.0
 * @version 1.0
 */

 ?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" type="text/css" href="https://cloud.typography.com/6742932/6340372/css/fonts.css">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

		<div class="header-bg">
		<header id="masthead" class="cf" role="banner">

			<div id="menu-top-wrap">
				<?php get_template_part( 'header-top-nav' ); ?>
			</div><!-- end .menu-top-wrap -->

			<div id="site-branding">
				<?php if ( get_header_image() ) : ?>
					<div id="site-logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt=""></a>
					</div><!-- end #site-logo -->
				<?php endif; ?> 

				<?php if ( is_front_page() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php endif; ?>

				<?php if ( '' != get_bloginfo('description') ) : ?>
					<p class="site-description"><?php bloginfo( 'description' ); ?></p>
				<?php endif; ?>
			</div><!-- end #site-branding -->

			<button id="menu-main-toggle"><span><?php esc_html_e( 'Open', 'weta' ); ?></span></button>
			<?php if ( get_theme_mod( 'show_shopnav' ) ) : ?>
			<a id="cart-btn-mobile" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php esc_html_e( 'View cart', 'weta' ); ?>"><?php echo sprintf ( esc_html__('(%d)', 'weta'), WC()->cart->cart_contents_count ); ?></a>
			<?php endif; ?>
			<button id="menu-main-close"  class="btn-close"><span><?php esc_html_e( 'Close', 'weta' ); ?></span></button>

			<div id="menu-main-wrap" class="sticky-element cf">

				<div class="sticky-anchor"></div>
				<nav id="site-nav" class="sticky-content cf" role="navigation">
					<div class="sticky-wrap">
					<?php if ( get_theme_mod( 'small_logo' ) ) : ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="small-logo" rel="home"><img src="<?php echo wp_kses_post( get_theme_mod( 'small_logo' ) ); ?>" class="small-logo-img" alt=""></a>
					<?php endif; ?>
					<?php wp_nav_menu( array(
						'theme_location'	=> 'primary',
						'menu_class' 		=> 'nav-menu',
						'container' 		=> 'false') ); ?>
						
					<?php if ( get_theme_mod( 'show_shopnav' ) ) : ?>
						<a class="cart-btn-menu" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php esc_html_e( 'View cart', 'weta' ); ?>"><?php echo sprintf ( esc_html__('Cart (%d)', 'weta'), WC()->cart->cart_contents_count ); ?></a>
					<?php endif; ?>
					</div><!-- end .sticky-wrap -->
				</nav><!-- end #site-nav -->

				<div id="mobile-menu-top-wrap">
					<?php get_template_part( 'header-top-nav' ); ?>
				</div><!-- end .mobile-menu-top-wrap -->
				<button id="menu-main-close-bottom" class="btn-close"><span><?php esc_html_e( 'Close', 'weta' ); ?></span></button>
			</div><!-- end #menu-main-wrap -->

		</header><!-- end #masthead -->
		</div><!-- end .header-bg -->

<div id="main-wrap">