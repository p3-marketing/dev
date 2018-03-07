<?php
/**
 * Weta functions and definitions
 *
 * @package Weta
 * @since Weta 1.0
 * @version 1.0.3
 */

/*-----------------------------------------------------------------------------------*/
/* Sets up the content width value based on the theme's design.
/*-----------------------------------------------------------------------------------*/

if ( ! isset( $content_width ) )
    $content_width = 660;

function weta_adjust_content_width() {
    global $content_width;

    if ( is_page_template( 'page-templates/full-width.php' ) )
        $content_width = 1200;
}
add_action( 'template_redirect', 'weta_adjust_content_width' );


/*-----------------------------------------------------------------------------------*/
/* Sets up theme defaults and registers support for various WordPress features.
/*-----------------------------------------------------------------------------------*/

function weta_setup() {

	// Make Weta available for translation. Translations can be added to the /languages/ directory.
	load_theme_textdomain( 'weta', get_template_directory() . '/languages' );

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'editor-style.css' ) );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// This theme uses wp_nav_menu().
	register_nav_menus( array (
		'primary' => __( 'Primary menu', 'weta' ),
		'header-top' => __( 'Header Top menu', 'weta' ),
		'header-social' => __( 'Header Social menu', 'weta' ),
		'footer-social' => __( 'Footer Social menu', 'weta' )
	) );

	// Implement the Custom Header feature
	require get_template_directory() . '/inc/custom-header.php';

	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'weta_custom_background_args', array(
		'default-color'	=> 'fff',
		'default-image'	=> '',
	) ) );

	// Enable support for Video Post Formats.
	add_theme_support( 'post-formats', array(
		'video',
	) );

	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'weta_get_featured_posts',
		'max_posts' => 10,
	) );

	// This theme uses post thumbnails.
	add_theme_support( 'post-thumbnails' );

	// Add WooCommerce Support, deactivate WooCommerce CSS + shop sidebar.
	add_theme_support( 'woocommerce' );
	add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
	remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar',10);


	//  Adding several sizes for Post Thumbnails
	add_image_size( 'weta-landscape-big', 1000, 667, true ); // big landscape thumbnails (cropped)
	add_image_size( 'weta-square-big', 1000, 1000, true ); // big square thumbnails (cropped)
	add_image_size( 'weta-portrait-big', 1000 ); // big portrait thumbnails (height flexible, not cropped)

	add_image_size( 'weta-landscape-medium', 660, 440, true ); // medium landscape thumbnails (cropped)
	add_image_size( 'weta-square-medium', 660, 660, true ); // medium square thumbnails (cropped)
	add_image_size( 'weta-portrait-medium', 660, 742, true ); // medium portrait thumbnails (cropped)

	add_image_size( 'weta-landscape-small', 373, 248, true ); // small landscape thumbnails (cropped)
	add_image_size( 'weta-square-small', 373, 373, true ); // small square thumbnails (cropped)
	add_image_size( 'weta-portrait-small', 373, 420, true ); // small portrait thumbnails (cropped)

}
add_action( 'after_setup_theme', 'weta_setup' );


/*-----------------------------------------------------------------------------------*/
/*  Returns the Google font stylesheet URL if available.
/*-----------------------------------------------------------------------------------*/

function weta_font_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	 * supported by Source Sans Pro translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$sourcesanspro = _x( 'on', 'Source Sans Pro: on or off', 'weta' );

	if ( 'off' !== $sourcesanspro ) {
		$font_families = array();

		if ( 'off' !== $sourcesanspro )
			$font_families[] = 'Source Sans Pro:400,400italic,600,600italic';
			
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "https://fonts.googleapis.com/css" );
	}

	return esc_url_raw( $fonts_url );
}


/*-----------------------------------------------------------------------------------*/
/*  Enqueue scripts and styles
/*-----------------------------------------------------------------------------------*/

function weta_scripts() {
	global $wp_styles;

	// Add fonts, used in the main stylesheet.
	wp_enqueue_style( 'weta-fonts', weta_font_url(), array(), null );

	// Loads JavaScript to pages with the comment form to support sites with threaded comments (when in use)
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
	wp_enqueue_script( 'comment-reply' );

	// Loads main stylesheet.
	wp_enqueue_style( 'weta-style', get_stylesheet_uri(), array(), '20150704' );

	// Loads Custom Weta JavaScript functionality
	wp_enqueue_script( 'weta-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150704', true );
	wp_localize_script( 'weta-script', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'weta' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'weta' ) . '</span>',
	) );

	// FitVids for responsive videos
	wp_enqueue_script( 'weta-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), '1.1' );

	// Loads Scripts for Featured Post Slider
	wp_enqueue_style( 'weta-flex-slider-style', get_template_directory_uri() . '/js/flex-slider/flexslider.css' );
	wp_enqueue_script( 'weta-flex-slider', get_template_directory_uri() . '/js/flex-slider/jquery.flexslider-min.js', array( 'jquery' ) );


	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.3.1' );

}
add_action( 'wp_enqueue_scripts', 'weta_scripts' );



/*-----------------------------------------------------------------------------------*/
/* Enqueue Google fonts style to admin screen for custom header display.
/*-----------------------------------------------------------------------------------*/
function weta_admin_fonts() {
	wp_enqueue_style( 'weta-fonts', weta_font_url(), array(), null );
}
add_action( 'admin_print_scripts-appearance_page_custom-header', 'weta_admin_fonts' );


/*-----------------------------------------------------------------------------------*/
/* Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
/*-----------------------------------------------------------------------------------*/

function weta_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'weta_page_menu_args' );


/*-----------------------------------------------------------------------------------*/
/* Sets the authordata global when viewing an author archive.
/*-----------------------------------------------------------------------------------*/

function weta_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'weta_setup_author' );


/*-----------------------------------------------------------------------------------*/
/* Short Title.
/*-----------------------------------------------------------------------------------*/

function weta_title_limit($length, $replacer = '...') {
 $string = the_title('','',FALSE);
 if(strlen($string) > $length)
 $string = (preg_match('/^(.*)\W.*$/', substr($string, 0, $length+1), $matches) ? $matches[1] : substr($string, 0, $length)) . $replacer;
 echo $string;
}

/*-----------------------------------------------------------------------------------*/
/* Multiple Custom Excerpt Lengths
/*-----------------------------------------------------------------------------------*/

function weta_excerpt($limit) {
 $excerpt = explode(' ', get_the_excerpt(), $limit);
 if (count($excerpt)>=$limit) {
 array_pop($excerpt);
 $excerpt = implode(" ",$excerpt).'...';
 } else {
 $excerpt = implode(" ",$excerpt);
 }
 $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
 return $excerpt;
}

function content($limit) {
 $content = explode(' ', get_the_content(), $limit);
 if (count($content)>=$limit) {
 array_pop($content);
 $content = implode(" ",$content).'...';
 } else {
 $content = implode(" ",$content);
 }
 $content = preg_replace('/[.+]/','', $content);
 $content = apply_filters('the_content', $content);
 $content = str_replace(']]>', ']]&gt;', $content);
 return $content;
}

/*-----------------------------------------------------------------------------------*/
/* Add custom max excerpt lengths.
/*-----------------------------------------------------------------------------------*/

function custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


/*-----------------------------------------------------------------------------------*/
/* Replace "[...]" with custom read more in excerpts.
/*-----------------------------------------------------------------------------------*/

function weta_excerpt_more( $more ) {
	global $post;
	return '&hellip; <a class="excerpt-more-link" href="'. get_permalink($post->ID) . '">' . esc_html__( 'Read More', 'weta' ) . '</a>';
}
add_filter( 'excerpt_more', 'weta_excerpt_more' );


/*-----------------------------------------------------------------------------------*/
/* Add Theme Customizer CSS
/*-----------------------------------------------------------------------------------*/

function weta_customize_css() {
    ?>
	<style type="text/css">
	.entry-content a, .comment-text a, .author-bio a, .textwidget a {color: <?php echo get_theme_mod('link_color'); ?>;}
	<?php if ('#ffffff' != get_theme_mod( 'header_bg_color' ) ) { ?>
	#masthead {background: <?php echo get_theme_mod('header_bg_color'); ?>;}
	@media screen and (min-width: 1023px) {
	.sticky-content.fixed {background: <?php echo get_theme_mod('header_bg_color'); ?>;}
	}
	<?php } ?>
	<?php if ('#f5f5f5' != get_theme_mod( 'footer_bg_color' ) ) { ?>
	#colophon {background: <?php echo get_theme_mod('footer_bg_color'); ?>;}
	<?php } ?>
	<?php if ('#f5f5f5' != get_theme_mod( 'authorwidget_bg_color' ) ) { ?>
	.widget_weta_authors {background: <?php echo get_theme_mod('authorwidget_bg_color'); ?>;}
	<?php } ?>
	<?php if ('#f5f5f5' != get_theme_mod( 'quotewidget_bg_color' ) ) { ?>
	.widget_weta_quote {background: <?php echo get_theme_mod('quotewidget_bg_color'); ?>;}
	<?php } ?>
	<?php if ('#f5f5f5' != get_theme_mod( 'numberedrpwidget_bg_color' ) ) { ?>
	.widget_weta_numbered_rp {background: <?php echo get_theme_mod('numberedrpwidget_bg_color'); ?>;}
	<?php } ?>
	<?php if ( '' != get_theme_mod( 'fixed_nav' ) ) { ?>
	@media screen and (min-width: 1023px) {
	.sticky-content {margin-top: 0;}
	.sticky-element .sticky-anchor {display: block !important;}
	.sticky-content.fixed {position: fixed !important; top: 0 !important; left:0; right: 0; z-index: 10000;}
	}
	<?php } ?>
	<?php if ( '' != get_theme_mod( 'hide_borders' ) ) { ?>
	#masthead, .front-fullwidth .widget, #front-fullwidth-center, #front-fullwidth-bottom, #front-sidebar-one, #front-content-two {border: none;}
	@media screen and (min-width: 1023px) {#site-nav ul ul.sub-menu, #site-nav ul ul.children {border-top: none;}}
	<?php } ?>
	<?php if ( '' != get_theme_mod( 'show_headersearch' ) &&  '' != get_theme_mod( 'show_shopnav' ) ) { ?>
	@media screen and (min-width: 1023px) {
	.header-top-nav {max-width: 50%;}
	}
	<?php } ?>
	<?php if ('' != get_theme_mod( 'show_shopnav' ) ) { ?>
	@media screen and (min-width: 1023px) {
	.sticky-wrap {padding-left: 120px; padding-right: 120px;}
	}
	<?php } ?>
	<?php if ('' != get_theme_mod( 'small_logo' ) ) { ?>
	@media screen and (min-width: 1023px) {
	.sticky-wrap {padding-left: 120px; padding-right: 120px;}
	}
	<?php } ?>
	</style>
    <?php
}
add_action( 'wp_head', 'weta_customize_css');


/*-----------------------------------------------------------------------------------*/
/* Remove inline styles printed when the gallery shortcode is used.
/*-----------------------------------------------------------------------------------*/

add_filter('use_default_gallery_style', '__return_false');


if ( ! function_exists( 'weta_comment' ) ) :
/*-----------------------------------------------------------------------------------*/
/* Comments template weta_comment
/*-----------------------------------------------------------------------------------*/
function weta_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>

	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="comment-avatar">
				<?php echo get_avatar( $comment, 40 ); ?>
			</div>

			<div class="comment-wrap">
				<div class="comment-details">
					<div class="comment-author">


						<?php printf( ( '%s' ), wp_kses_post( sprintf( '%s', get_comment_author_link() ) ) ); ?>
					</div><!-- end .comment-author -->
					<div class="comment-meta">
						<span class="comment-time"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
							<?php
							/* translators: 1: date */
								printf( esc_html__( '%1$s', 'weta' ),
								get_comment_date());
							?></a>
						</span>
						<?php edit_comment_link( esc_html__(' Edit', 'weta'), '<span class="comment-edit">', '</span>'); ?>
					</div><!-- end .comment-meta -->
				</div><!-- end .comment-details -->

				<div class="comment-text">
				<?php comment_text(); ?>
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'weta' ); ?></p>
					<?php endif; ?>
				</div><!-- end .comment-text -->
				<?php if ( comments_open () ) : ?>
					<div class="comment-reply"><?php comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', 'weta' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></div>
				<?php endif; ?>
			</div><!-- end .comment-wrap -->
		</article><!-- end .comment -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="pingback">
		<p><?php esc_html_e( 'Pingback:', 'weta' ); ?> <?php comment_author_link(); ?></p>
		<p class="pingback-edit"><?php edit_comment_link(); ?></p>
	<?php
			break;
	endswitch;
}
endif;


/*-----------------------------------------------------------------------------------*/
/* Register widgetized areas
/*-----------------------------------------------------------------------------------*/

function weta_widgets_init() {

	register_sidebar( array (
		'name' => esc_html__( 'Blog - Sidebar', 'weta' ),
		'id' => 'blog-sidebar',
		'description' => esc_html__( 'Widgets appear in a right-aligned sidebar on the default blog and on single posts.', 'weta' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => esc_html__( 'Front Page - FullWidth Top', 'weta' ),
		'id' => 'front-fullwidth-top',
		'description' => esc_html__( 'Widgets appear in a single-column widget area on the top of the Front Page.', 'weta' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => esc_html__( 'Front Page - Content 1', 'weta' ),
		'id' => 'front-content-1',
		'description' => esc_html__( 'Widgets appear left of Sidebar 1 and below the Full Width Top widget area.', 'weta' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => esc_html__( 'Front Page - Sidebar 1', 'weta' ),
		'id' => 'front-sidebar-1',
		'description' => esc_html__( 'Widgets appear in a right-aligned sidebar area next to the Content 1 widget area.', 'weta' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => esc_html__( 'Front Page - Full Width Center', 'weta' ),
		'id' => 'front-fullwidth-center',
		'description' => esc_html__( 'Widgets will appear in a single-column widget area below the Content 1 and Sidebar 1 widget areas.', 'weta' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => esc_html__( 'Front Page - Sidebar 2', 'weta' ),
		'id' => 'front-sidebar-2',
		'description' => esc_html__( 'Widgets appear in a left-aligned sidebar area next to the Content 2 widget area.', 'weta' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => esc_html__( 'Front Page - Content 2', 'weta' ),
		'id' => 'front-content-2',
		'description' => esc_html__( 'Widgets appear right to Sidebar 2 and below the Full Width Center widget area.', 'weta' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => esc_html__( 'Front Page - Full Width Bottom', 'weta' ),
		'id' => 'front-fullwidth-bottom',
		'description' => esc_html__( 'Widgets will appear in a single-column widget area at the bottom of your Front Page above the footer.', 'weta' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => esc_html__( 'Footer - 1', 'weta' ),
		'id' => 'footer-one',
		'description' => esc_html__( 'Widgets will appear in the 1. widget area of the 5-column footer.', 'weta' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => esc_html__( 'Footer - 2', 'weta' ),
		'id' => 'footer-two',
		'description' => esc_html__( 'Widgets will appear in the 2. widget area of the 5-column footer.', 'weta' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => esc_html__( 'Footer - 3', 'weta' ),
		'id' => 'footer-three',
		'description' => esc_html__( 'Widgets will appear in the 3. widget area of the 5-column footer.', 'weta' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => esc_html__( 'Footer - 4', 'weta' ),
		'id' => 'footer-four',
		'description' => esc_html__( 'Widgets will appear in the 4. widget area of the 5-column footer.', 'weta' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => esc_html__( 'Footer - 5', 'weta' ),
		'id' => 'footer-five',
		'description' => esc_html__( 'Widgets will appear in the 5. widget area of the 5-column footer.', 'weta' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => esc_html__( 'Blog Subscribe Widget Area', 'weta' ),
		'id' => 'widgetarea-subscribe',
		'description' => esc_html__( 'Widget area for the Jetpack Blog Subscriptions widget only. Subscribe widget will appear with in a lightbox. (The Subscribe Now text can be customized in the Customizer under Theme Options.)', 'weta' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}
add_action( 'widgets_init', 'weta_widgets_init' );


if ( ! function_exists( 'weta_content_nav' ) ) :


/*-----------------------------------------------------------------------------------*/
/* Display navigation to next/previous pages when applicable.
/*-----------------------------------------------------------------------------------*/

function weta_content_nav( $nav_id ) {
	global $wp_query; 

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<div class="nav-wrap cf">
			<nav id="<?php echo $nav_id; ?>">
				<div class="nav-previous"><?php next_posts_link( wp_kses_post(__( '<span>Previous Posts</span>', 'weta'  ) ) ); ?></div>
				<div class="nav-next"><?php previous_posts_link( wp_kses_post(__( '<span>Next Posts</span>', 'weta' ) ) ); ?></div>
			</nav>
		</div><!-- end .nav-wrap -->
	<?php endif;
}

endif; // weta_content_nav


/*-----------------------------------------------------------------------------------*/
/* Display navigation to next/previous post when applicable.
/*-----------------------------------------------------------------------------------*/

function weta_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<div class="nav-wrap cf">
		<nav id="nav-single">
			<div class="nav-previous"><?php previous_post_link( '%link', wp_kses_post( __( '<span class="meta-nav">Previous Post</span>%title', 'weta' ) )  ); ?></div>
			<div class="nav-next"><?php next_post_link('%link', wp_kses_post( __( '<span class="meta-nav">Next Post</span>%title', 'weta' ) ) ); ?></div>
		</nav><!-- #nav-single -->
	</div><!-- end .nav-wrap -->
	<?php
}


/*-----------------------------------------------------------------------------------*/
/* Extends the default WordPress body classes
/*-----------------------------------------------------------------------------------*/
function weta_body_class( $classes ) {

	if ( is_page_template( 'page-templates/front-page.php' ) ) {
		$classes[] = 'template-front';
	}

	if ( is_page_template( 'page-templates/full-width.php' ) ) {
		$classes[] = 'fullwidth';
	}

	if ( is_page_template( 'page-templates/cart-page.php' ) ) {
		$classes[] = 'fullwidth';
	}

	if ( is_page_template( 'page-templates/checkout-page.php' ) ) {
		$classes[] = 'fullwidth';
	}

	if ( ! is_active_sidebar( 'blog-sidebar' ) ) {
		$classes[] = 'blog-fullwidth';
	}

	if ( is_page_template( 'page-templates/no-sidebar.php' ) ) {
		$classes[] = 'nosidebar';
	}

	if ( is_page_template( 'page-templates/account-page.php' ) ) {
		$classes[] = 'nosidebar';
	}

	if ( '' != get_theme_mod( 'show_shopnav' ) ) {
		$classes[] = 'show-shopnav';
	}
	
	if ( '' != get_theme_mod( 'weta_sharebtns' ) ) {
		$classes[] = 'weta-sharebtns';
	}

	if ( is_active_sidebar( 'widgetarea-subscribe' ) ) {
		$classes[] = 'show-subscribe';
	}

	return $classes;
}
add_filter( 'body_class', 'weta_body_class' );


/*-----------------------------------------------------------------------------------*/
/* WooCommerce Customizations & Hooks
/*-----------------------------------------------------------------------------------*/
// Change number or products per row to 3
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}

// Change number or related products per row to 3
function woo_related_products_limit() {
  global $product;

	$args['posts_per_page'] = 3;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
  function jk_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 3 related products
	$args['columns'] = 3; // arranged in 3 columns
	return $args;
}

// Add 4 images to the Featured Image gallery
add_filter ( 'woocommerce_product_thumbnails_columns', 'xx_thumb_cols' );
	function xx_thumb_cols() {
	return 4; // .last class applied to every 4th thumbnail
}

// Remove the product rating display on product loops
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );
function woocommerce_header_add_to_cart_fragment( $fragments ) {
        ob_start();
        ?>
        <a class="cart-btn-top" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php esc_html_e( 'View cart', 'weta' ); ?>"><?php echo sprintf ( esc_html__('Cart (%d)', 'weta') , WC()->cart->cart_contents_count ); ?></a>
        <?php

        $fragments['a.cart-btn-top'] = ob_get_clean();
        ob_start();
        ?>
        <a class="cart-btn-menu" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php esc_html_e( 'View cart', 'weta' ); ?>"><?php echo sprintf ( esc_html__('Cart (%d)', 'weta') , WC()->cart->cart_contents_count ); ?></a>
        <?php

        $fragments['a.cart-btn-menu'] = ob_get_clean();

        return $fragments;
}

// Define WooCommerce image sizes
function weta_woocommerce_image_dimensions() {
	global $pagenow;

	if ( ! isset( $_GET['activated'] ) || $pagenow != 'themes.php' ) {
		return;
	}
  	$catalog = array(
		'width' 	=> '660',	// px
		'height'	=> '742',	// px
		'crop'		=> 1 		// true
	);
	$single = array(
		'width' 	=> '660',	// px
		'height'	=> '742',	// px
		'crop'		=> 1 		// false
	);
	$thumbnail = array(
		'width' 	=> '660',	// px
		'height'	=> '742',	// px
		'crop'		=> 0 		// true
	);
	// Image sizes
	update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
	update_option( 'shop_single_image_size', $single ); 		// Single product image
	update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
}
add_action( 'after_switch_theme', 'weta_woocommerce_image_dimensions', 1 );

/*-----------------------------------------------------------------------------------*/
/* Customizer additions
/*-----------------------------------------------------------------------------------*/
require get_template_directory() . '/inc/customizer.php';

/*-----------------------------------------------------------------------------------*/
/* Load Jetpack compatibility file.
/*-----------------------------------------------------------------------------------*/
require get_template_directory() . '/inc/jetpack.php';

/*-----------------------------------------------------------------------------------*/
/* Grab the Weta Custom widgets.
/*-----------------------------------------------------------------------------------*/
require( get_template_directory() . '/inc/widgets.php' );

/*-----------------------------------------------------------------------------------*/
/* Grab the Weta Custom shortcodes.
/*-----------------------------------------------------------------------------------*/
require( get_template_directory() . '/inc/shortcodes.php' );