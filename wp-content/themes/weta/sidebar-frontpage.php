<?php
/**
 * All Widget Areas for the Custom Front Page Template
 *
 * @package Weta
 * @since Weta 1.0
 * @version 1.0
 */
?>

<?php
	/* Check if any of the Front page widget areas have widgets.
	 *
	 * If none of the footer widget areas have widgets, let's bail early.
	 */
	if (   ! is_active_sidebar( 'front-fullwidth-top' )
		&& ! is_active_sidebar( 'front-content-1' )
		&& ! is_active_sidebar( 'front-sidebar-1' )
		&& ! is_active_sidebar( 'front-fullwidth-center' )
		&& ! is_active_sidebar( 'front-sidebar-2' )
		&& ! is_active_sidebar( 'front-content-2' )
		&& ! is_active_sidebar( 'front-fullwidth-bottom' )
		)
		return;
	// If we get this far, we have widgets. Let do this.
?>

	<?php if ( is_active_sidebar( 'front-fullwidth-top' ) ) : ?>
		<div id="front-fullwidth-top" class="front-fullwidth column-area widget-area">
			<?php dynamic_sidebar( 'front-fullwidth-top' ); ?>
		</div><!-- #front-fullwidth-top -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'front-content-1' ) || is_active_sidebar( 'front-sidebar-1' ) ) : ?>
		<div id="content-sidebar-one-wrap" class="content-sidebar-wrap cf">
			<div id="front-content-one" class="front-content column-area widget-area">
				<?php dynamic_sidebar( 'front-content-1' ); ?>
			</div><!-- #front-content-one -->

			<div id="front-sidebar-one" class="front-sidebar sidebar-small widget-area" role="complementary">
				<?php dynamic_sidebar( 'front-sidebar-1' ); ?>
			</div><!-- #front-sidebar-one -->
		</div><!-- #content-sidebar-one-wrap -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'front-fullwidth-center' ) ) : ?>
		<div id="front-fullwidth-center" class="front-fullwidth column-area widget-area">
			<?php dynamic_sidebar( 'front-fullwidth-center' ); ?>
		</div><!-- #front-fullwidth-center -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'front-sidebar-2' ) || is_active_sidebar( 'front-content-2' ) ) : ?>
		<div id="content-sidebar-two-wrap" class="content-sidebar-wrap cf">
			<div id="front-sidebar-two" class="front-sidebar sidebar-small widget-area" role="complementary">
				<?php dynamic_sidebar( 'front-sidebar-2' ); ?>
			</div><!-- #front-sidebar-two -->
			<div id="front-content-two" class="front-content column-area widget-area">
				<?php dynamic_sidebar( 'front-content-2' ); ?>
			</div><!-- #front-content-two -->
		</div><!-- #content-sidebar-two-wrap -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'front-fullwidth-bottom' ) ) : ?>
		<div id="front-fullwidth-bottom" class="front-fullwidth column-area widget-area">
			<?php dynamic_sidebar( 'front-fullwidth-bottom' ); ?>
		</div><!-- #front-fullwidth-bottom -->
	<?php endif; ?>