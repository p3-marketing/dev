<?php
/**
 * Available Weta Custom Widgets
 *
 * @package Weta
 * @since Weta 1.0
 * @version 1.0
 */


/*-----------------------------------------------------------------------------------*/
/* 1. Weta: Recent Posts
/*-----------------------------------------------------------------------------------*/

class weta_rp extends WP_Widget {

	public function __construct() {
		parent::__construct( 'widget_weta_rp', esc_html__( 'Weta: Recent Posts', 'weta' ), array(
			'classname'   => 'widget_weta_rp',
			'description' => esc_html__( 'Show a number of recent posts that can be filtered by categories on the Weta Front page.', 'weta' ),
		) );
	}

	public function widget($args, $instance) {
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$layout = isset( $instance['layout'] ) ? esc_attr( $instance['layout'] ) : '';
		$imgformat = isset( $instance['imgformat'] ) ? esc_attr( $instance['imgformat'] ) : '';
   		$postnumber = isset( $instance['postnumber'] ) ? esc_attr( $instance['postnumber'] ) : '';
   		$category = isset( $instance['category'] ) ? esc_attr( $instance['category'] ) : '';
   		$orderby = isset( $instance['orderby'] ) ? esc_attr( $instance['orderby'] ) : '';
   		$hideexcerpt = isset( $instance['hideexcerpt'] ) ? esc_attr( $instance['hideexcerpt'] ) : '';
   		$hidecats = isset( $instance['hidecats'] ) ? esc_attr( $instance['hidecats'] ) : '';
   		$hidedate = isset( $instance['hidedate'] ) ? esc_attr( $instance['hidedate'] ) : '';
   		$hideauthor = isset( $instance['hideauthor'] ) ? esc_attr( $instance['hideauthor'] ) : '';
   		$hidecomments = isset( $instance['hidecomments'] ) ? esc_attr( $instance['hidecomments'] ) : '';

		echo $args['before_widget']; ?>

		<?php if ( ! empty( $title ) )  : ?>
		<h3 class="widget-title <?php echo esc_attr( $layout ); ?>-title"><?php echo esc_html( $title ); ?></h3>
		<?php endif; ?>

<?php
// The Query
	$weta_rp_query = new WP_Query(array (
		'post_status'	   => 'publish',
		'posts_per_page' => $postnumber,
		'orderby' => $orderby,
		'ignore_sticky_posts' => 1,
		'category_name' => $category,
	) );
?>

<?php
// The Loop
if($weta_rp_query->have_posts()) : ?>

	<?php if ( $layout == 'one-column-overlay'  ) : ?>
		<div class="rp-one-column-overlay cf">
	<?php elseif ( $layout == 'one-column-textright' ) : ?>
		<div class="rp-one-column-textright cf">
	<?php elseif ( $layout == 'two-columns' ) : ?>
		<div class="rp-two-columns cf">
	<?php elseif ( $layout == 'two-columns-textright' ) : ?>
		<div class="rp-two-columns-textright cf">
	<?php elseif ( $layout == 'three-columns' ) : ?>
		<div class="rp-three-columns cf">
	<?php elseif ( $layout == 'three-columns-textright' ) : ?>
		<div class="rp-three-columns-textright cf">
	<?php elseif ( $layout == 'four-columns' ) : ?>
		<div class="rp-four-columns cf">
	<?php elseif ( $layout == 'four-columns-textright' ) : ?>
		<div class="rp-four-columns-textright cf">
	<?php endif; ?>

   <?php while($weta_rp_query->have_posts()) : $weta_rp_query->the_post() ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if ( has_post_thumbnail() && ( $imgformat == 'landscape' ) && ( $layout == 'one-column-overlay' )
			|| ( $imgformat == 'landscape' ) && ( $layout == 'one-column-textright' ) ) : ?>
			<div class="entry-thumbnail">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('weta-landscape-big'); ?></a>
			</div><!-- end .entry-thumbnail -->

		<?php elseif ( has_post_thumbnail() && ( $imgformat == 'square' ) && ( $layout == 'one-column-overlay' )
			|| ( $imgformat == 'square' ) && ( $layout == 'one-column-textright' ) ) : ?>
			<div class="entry-thumbnail">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('weta-square-big'); ?></a>
			</div><!-- end .entry-thumbnail -->

		<?php elseif ( has_post_thumbnail() && ( $imgformat == 'portrait' ) && ( $layout == 'one-column-overlay' )
			|| ( $imgformat == 'portrait' ) && ( $layout == 'one-column-textright' ) ) : ?>
			<div class="entry-thumbnail">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('weta-portrait-big'); ?></a>
			</div><!-- end .entry-thumbnail -->

		<?php elseif ( has_post_thumbnail() && ( $imgformat == 'landscape' ) && ( $layout == 'two-columns' )
			|| ( $imgformat == 'landscape' ) && ( $layout == 'three-columns' ) ) : ?>
			<div class="entry-thumbnail">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('weta-landscape-medium'); ?></a>
			</div><!-- end .entry-thumbnail -->

		<?php elseif ( has_post_thumbnail() && ( $imgformat == 'square' ) && ( $layout == 'two-columns' )
			|| ( $imgformat == 'square' ) && ( $layout == 'three-columns' ) ) : ?>
			<div class="entry-thumbnail">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('weta-square-medium'); ?></a>
			</div><!-- end .entry-thumbnail -->

		<?php elseif  ( has_post_thumbnail() && ( $imgformat == 'portrait' ) && ( $layout == 'two-columns' )
			|| ( $imgformat == 'portrait' ) && ( $layout == 'three-columns' ) ) : ?>
			<div class="entry-thumbnail">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('weta-portrait-medium'); ?></a>
			</div><!-- end .entry-thumbnail -->

		<?php elseif  ( has_post_thumbnail() && ( $imgformat == 'landscape' ) && ( $layout == 'four-columns' )
			|| ( $imgformat == 'landscape' ) && ( $layout == 'two-columns-textright' )
			|| ( $imgformat == 'landscape' ) && ( $layout == 'three-columns-textright' )
			|| ( $imgformat == 'landscape' ) && ( $layout == 'four-columns-textright' ) ) : ?>
			<div class="entry-thumbnail">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('weta-landscape-small'); ?></a>
			</div><!-- end .entry-thumbnail -->

		<?php elseif  ( has_post_thumbnail() && ( $imgformat == 'square' ) && ( $layout == 'four-columns' )
			|| ( $imgformat == 'square' ) && ( $layout == 'two-columns-textright' )
			|| ( $imgformat == 'square' ) && ( $layout == 'three-columns-textright' )
			|| ( $imgformat == 'square' ) && ( $layout == 'four-columns-textright' ) ) : ?>
			<div class="entry-thumbnail">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('weta-square-small'); ?></a>
			</div><!-- end .entry-thumbnail -->

		<?php elseif  ( has_post_thumbnail() && ( $imgformat == 'portrait' ) && ( $layout == 'four-columns' )
			|| ( $imgformat == 'portrait' ) && ( $layout == 'two-columns-textright' )
			|| ( $imgformat == 'portrait' ) && ( $layout == 'three-columns-textright' )
			|| ( $imgformat == 'portrait' ) && ( $layout == 'four-columns-textright' ) ) : ?>
			<div class="entry-thumbnail">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('weta-portrait-small'); ?></a>
			</div><!-- end .entry-thumbnail -->

		<?php elseif ( has_post_thumbnail() && ( $imgformat == 'default' ) ) : ?>
			<div class="entry-thumbnail">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
			</div><!-- end .entry-thumbnail -->
		<?php endif; ?>

		<div class="entry-text-wrap">
			<?php if ( $layout == 'one-column-overlay'  ) : ?>
			<div class="centered-wrap">
				<div class="centered">
					<div class="overlay">
		<?php endif; ?>

		<?php if ( $hidecats != true ) : ?>
		<div class="entry-meta">
			<?php the_category(', '); ?>
		</div><!-- end .entry-meta -->
		<?php endif; ?>

   		<header class="entry-header">
   			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
   		</header><!-- end .entry-header -->

		<?php if ( $hideexcerpt != true ) : ?>
		<div class="entry-summary">
			<?php if ( get_theme_mod('excerpt_morelink') != true ) : ?>
				<?php echo weta_excerpt(35); ?>
			<?php else : ?>
				<?php the_excerpt(); ?>
			<?php endif; ?>	
		</div><!-- end .entry-summary -->
		<?php endif; ?>

		<footer class="entry-footer">
			<?php if ( $hidedate != true )  : ?>
			<div class="entry-date">
				<a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>
			</div><!-- end .entry-date -->
			<?php endif; ?>

			<?php if ( $hideauthor != true )  : ?>
			<div class="entry-author">
			<?php
				printf( __( 'by <a href="%1$s" title="%2$s">%3$s</a>', 'weta' ),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				sprintf( esc_attr__( 'All posts by %s', 'weta' ), get_the_author() ),
				get_the_author() );
			?>
			</div><!-- end .entry-author -->
			<?php endif; ?>

			<?php if (comments_open()&& ( $hidecomments != true )) : ?>
			<div class="entry-comments">
				<?php comments_popup_link( __( 'Comments 0', 'weta' ), __( 'Comment 1', 'weta' ), __( 'Comments %', 'weta' ) ); ?>
			</div><!-- end .entry-comments -->
			<?php endif; ?>
			<?php edit_post_link( __( 'Edit', 'weta' ), '<div class="entry-edit">', '</div>' ); ?>
		</footer><!-- end .entry-footer -->

		<?php if ( $layout == 'one-column-overlay'  ) : ?>
					</div><!--  end .overlay -->
				</div><!--  end .centered -->
			</div><!-- end .centered-wrap -->
		<?php endif; ?>
		</div><!-- end .entry-text-wrap -->
	</article><!-- #post-## -->
   <?php endwhile; ?>
<?php endif ?>
</div><!-- .rp-wrap -->

		<?php
		echo $args['after_widget'];

		 // Reset the post globals as this query will have stomped on it
		wp_reset_postdata();
		}

   function update($new_instance, $old_instance) {
   		$instance['title'] = $new_instance['title'];
   		$instance['layout'] = $new_instance['layout'];
   		$instance['imgformat'] = $new_instance['imgformat'];
   		$instance['postnumber'] = $new_instance['postnumber'];
   		$instance['category'] = $new_instance['category'];
   		$instance['orderby'] = $new_instance['orderby'];
   		$instance['hideexcerpt'] = $new_instance['hideexcerpt'];
   		$instance['hidecats'] = $new_instance['hidecats'];
   		$instance['hidedate'] = $new_instance['hidedate'];
   		$instance['hideauthor'] = $new_instance['hideauthor'];
   		$instance['hidecomments'] = $new_instance['hidecomments'];

	   return $new_instance;
   }

   function form( $instance ) {
   		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
   		$layout = isset( $instance['layout'] ) ? esc_attr( $instance['layout'] ) : '';
   		$imgformat = isset( $instance['imgformat'] ) ? esc_attr( $instance['imgformat'] ) : '';
   		$postnumber = isset( $instance['postnumber'] ) ? esc_attr( $instance['postnumber'] ) : '';
   		$category = isset( $instance['category'] ) ? esc_attr( $instance['category'] ) : '';
   		$orderby = isset( $instance['orderby'] ) ? esc_attr( $instance['orderby'] ) : '';
   		$hideexcerpt = isset( $instance['hideexcerpt'] ) ? esc_attr( $instance['hideexcerpt'] ) : '';
   		$hidecats = isset( $instance['hidecats'] ) ? esc_attr( $instance['hidecats'] ) : '';
   		$hidedate = isset( $instance['hidedate'] ) ? esc_attr( $instance['hidedate'] ) : '';
   		$hideauthor = isset( $instance['hideauthor'] ) ? esc_attr( $instance['hideauthor'] ) : '';
   		$hidecomments = isset( $instance['hidecomments'] ) ? esc_attr( $instance['hidecomments'] ) : '';
   	?>

	<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:','weta'); ?></label>
		<input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" /></p>

	<p><label for="<?php echo $this->get_field_id('layout'); ?>"><?php esc_html_e('Post Layout:','weta'); ?></label>
		<select name="<?php echo $this->get_field_name('layout'); ?>" class="widefat" id="<?php echo $this->get_field_id('layout'); ?>">
			<option value="one-column-overlay" <?php if($layout == "one-column-overlay"){ echo "selected='selected'";} ?>><?php esc_html_e('1-column text overlay', 'weta'); ?></option>
			<option value="one-column-textright" <?php if($layout == "one-column-textright"){ echo "selected='selected'";} ?>><?php esc_html_e('1-column text right', 'weta'); ?></option>
			<option value="two-columns" <?php if($layout == "two-columns"){ echo "selected='selected'";} ?>><?php esc_html_e('2-columns', 'weta'); ?></option>
			<option value="two-columns-textright" <?php if($layout == "two-columns-textright"){ echo "selected='selected'";} ?>><?php esc_html_e('2-columns text right', 'weta'); ?></option>
			<option value="three-columns" <?php if($layout == "three-columns"){ echo "selected='selected'";} ?>><?php esc_html_e('3-columns', 'weta'); ?></option>
			<option value="three-columns-textright" <?php if($layout == "three-columns-textright"){ echo "selected='selected'";} ?>><?php esc_html_e('3-columns text right', 'weta'); ?></option>
			<option value="four-columns" <?php if($layout == "four-columns"){ echo "selected='selected'";} ?>><?php esc_html_e('4-columns', 'weta'); ?></option>
			<option value="four-columns-textright" <?php if($layout == "four-columns-textright"){ echo "selected='selected'";} ?>><?php esc_html_e('4-columns text right', 'weta'); ?></option>
		</select>
	</p>

	<p><label for="<?php echo $this->get_field_id('imgformat'); ?>"><?php esc_html_e('Thumbnail Format:','weta'); ?></label>
		<select name="<?php echo $this->get_field_name('imgformat'); ?>" class="widefat" id="<?php echo $this->get_field_id('imgformat'); ?>">
			<option value="landscape" <?php if($imgformat == "landscape"){ echo "selected='selected'";} ?>><?php esc_html_e('Landscape', 'weta'); ?></option>
			<option value="portrait" <?php if($imgformat == "portrait"){ echo "selected='selected'";} ?>><?php esc_html_e('Portrait', 'weta'); ?></option>
			<option value="square" <?php if($imgformat == "square"){ echo "selected='selected'";} ?>><?php esc_html_e('Square', 'weta'); ?></option>
			<option value="default" <?php if($imgformat == "default"){ echo "selected='selected'";} ?>><?php esc_html_e('default (no cropping)', 'weta'); ?></option>
		</select>
	</p>

	<p><label for="<?php echo $this->get_field_id('postnumber'); ?>"><?php esc_html_e('Number of posts:','weta'); ?></label>
		<input type="text" name="<?php echo $this->get_field_name('postnumber'); ?>" value="<?php echo esc_attr($postnumber); ?>" class="widefat" id="<?php echo $this->get_field_id('postnumber'); ?>" /></p>

	<p><label for="<?php echo $this->get_field_id('category'); ?>"><?php esc_html_e('Show only posts with the following category slug (separate multiple category slugs by comma)','weta'); ?></label>
	<input type="text" name="<?php echo $this->get_field_name('category'); ?>" value="<?php echo esc_attr($category); ?>" class="widefat" id="<?php echo $this->get_field_id('category'); ?>" /></p>

	<p><label for="<?php echo $this->get_field_id('orderby'); ?>"><?php esc_html_e('Order posts by:','weta'); ?></label>
		<select name="<?php echo $this->get_field_name('orderby'); ?>" class="widefat" id="<?php echo $this->get_field_id('orderby'); ?>">
			<option value="date" <?php if($orderby == "date"){ echo "selected='selected'";} ?>><?php esc_html_e('publish date (newest first)', 'weta'); ?></option>
			<option value="rand" <?php if($orderby == "rand"){ echo "selected='selected'";} ?>><?php esc_html_e('random', 'weta'); ?></option>
		</select>
	</p>

    <p><input id="<?php echo $this->get_field_id('hideexcerpt'); ?>" name="<?php echo $this->get_field_name('hideexcerpt'); ?>" type="checkbox" value="1" <?php checked( '1', $hideexcerpt ); ?> />
<label for="<?php echo $this->get_field_id('hideexcerpt'); ?>"><?php esc_html_e('Hide excerpt text', 'weta'); ?></label>
	</p>

	<p><input id="<?php echo $this->get_field_id('hidecats'); ?>" name="<?php echo $this->get_field_name('hidecats'); ?>" type="checkbox" value="1" <?php checked( '1', $hidecats ); ?> />
<label for="<?php echo $this->get_field_id('hidecats'); ?>"><?php esc_html_e('Hide categories', 'weta'); ?></label>
	</p>

	<p><input id="<?php echo $this->get_field_id('hidedate'); ?>" name="<?php echo $this->get_field_name('hidedate'); ?>" type="checkbox" value="1" <?php checked( '1', $hidedate ); ?> />
<label for="<?php echo $this->get_field_id('hidedate'); ?>"><?php esc_html_e('Hide publish date', 'weta'); ?></label>
	</p>

	<p><input id="<?php echo $this->get_field_id('hideauthor'); ?>" name="<?php echo $this->get_field_name('hideauthor'); ?>" type="checkbox" value="1" <?php checked( '1', $hideauthor ); ?> />
<label for="<?php echo $this->get_field_id('hideauthor'); ?>"><?php esc_html_e('Hide post author', 'weta'); ?></label>
	</p>

	<p><input id="<?php echo $this->get_field_id('hidecomments'); ?>" name="<?php echo $this->get_field_name('hidecomments'); ?>" type="checkbox" value="1" <?php checked( '1', $hidecomments ); ?> />
<label for="<?php echo $this->get_field_id('hidecomments'); ?>"><?php esc_html_e('Hide number of comments', 'weta'); ?></label>
	</p>

	<?php
	}
}

register_widget('weta_rp');


/*-----------------------------------------------------------------------------------*/
/* 2. Weta: Numbered Recent Posts
/*-----------------------------------------------------------------------------------*/

class weta_numbered_rp extends WP_Widget {

	public function __construct() {
		parent::__construct( 'widget_weta_numbered_rp', esc_html__( 'Weta: Numbered Recent Posts', 'weta' ), array(
			'classname'   => 'widget_weta_numbered_rp',
			'description' => esc_html__( 'Show a number of numbered recent posts (without thumbnails and excerpt text) that can be filtered by categories.', 'weta' ),
		) );
	}

	public function widget($args, $instance) {
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
   		$postnumber = isset( $instance['postnumber'] ) ? esc_attr( $instance['postnumber'] ) : '';
   		$category = isset( $instance['category'] ) ? esc_attr( $instance['category'] ) : '';
   		$orderby = isset( $instance['orderby'] ) ? esc_attr( $instance['orderby'] ) : '';
   		$hidedate = isset( $instance['hidedate'] ) ? esc_attr( $instance['hidedate'] ) : '';
   		$hideauthor = isset( $instance['hideauthor'] ) ? esc_attr( $instance['hideauthor'] ) : '';
   		$hidecomments = isset( $instance['hidecomments'] ) ? esc_attr( $instance['hidecomments'] ) : '';

		echo $args['before_widget']; ?>

		<?php if($title != '')
			echo '<div class="widget-title-wrap"><h3 class="widget-title"><span>'. esc_html($title) .'</span></h3></div>'; ?>

<?php
// The Query
	$weta_rp_numbered_query = new WP_Query(array (
		'post_status'	   		=> 'publish',
		'posts_per_page' 		=> $postnumber,
		'category_name' 		=> $category,
		'orderby' 				=> $orderby,
		'ignore_sticky_posts' 	=> 1,
	) );
?>

<?php
// The Loop
if($weta_rp_numbered_query->have_posts()) : ?>

	<div class="rp-numbered-wrap cf">

   <?php while($weta_rp_numbered_query->have_posts()) : $weta_rp_numbered_query->the_post() ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-wrap">
   		<header class="entry-header">
   			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
   		</header><!-- end .rp-header -->
		<footer class="entry-footer">
			<?php if ( $hidedate != true )  : ?>
			<div class="entry-date">
				<a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>
			</div><!-- end .entry-date -->
			<?php endif; ?>

			<?php if ( $hideauthor != true )  : ?>
			<div class="entry-author">
			<?php
				printf( __( 'by <a href="%1$s" title="%2$s">%3$s</a>', 'weta' ),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				sprintf( esc_attr__( 'All posts by %s', 'weta' ), get_the_author() ),
				get_the_author() );
			?>
			</div><!-- end .entry-author -->
			<?php endif; ?>

			<?php if (comments_open()&& ( $hidecomments != true )) : ?>
			<div class="entry-comments">
				<?php comments_popup_link( esc_html__( 'Comments 0', 'weta' ), esc_html__( 'Comment 1', 'weta' ), esc_html__( 'Comments %', 'weta' ) ); ?>
			</div><!-- end .entry-comments -->
			<?php endif; ?>
			<?php edit_post_link( esc_html__( 'Edit', 'weta' ), '<div class="entry-edit">', '</div>' ); ?>
		</footer><!-- end .entry-footer -->
	</div><!-- end .entry-wrap -->
	</article><!-- #post-## -->

   <?php endwhile; ?>

<?php endif ?>
</div><!-- .rp-numbered-wrap -->

		<?php
		echo $args['after_widget'];

		 // Reset the post globals as this query will have stomped on it
		wp_reset_postdata();
		}

   function update($new_instance, $old_instance) {
   		$instance['title'] = $new_instance['title'];
   		$instance['postnumber'] = $new_instance['postnumber'];
   		$instance['category'] = $new_instance['category'];
   		$instance['orderby'] = $new_instance['orderby'];
   		$instance['hidedate'] = $new_instance['hidedate'];
   		$instance['hideauthor'] = $new_instance['hideauthor'];
   		$instance['hidecomments'] = $new_instance['hidecomments'];

	   return $new_instance;
   }

   function form($instance) {
   		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
   		$postnumber = isset( $instance['postnumber'] ) ? esc_attr( $instance['postnumber'] ) : '';
   		$category = isset( $instance['category'] ) ? esc_attr( $instance['category'] ) : '';
   		$orderby = isset( $instance['orderby'] ) ? esc_attr( $instance['orderby'] ) : '';
   		$hidedate = isset( $instance['hidedate'] ) ? esc_attr( $instance['hidedate'] ) : '';
   		$hideauthor = isset( $instance['hideauthor'] ) ? esc_attr( $instance['hideauthor'] ) : '';
   		$hidecomments = isset( $instance['hidecomments'] ) ? esc_attr( $instance['hidecomments'] ) : '';
   	?>

	<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:','weta'); ?></label>
		<input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" /></p>

	<p><label for="<?php echo $this->get_field_id('orderby'); ?>"><?php esc_html_e('Order by:','weta'); ?></label>
		<select name="<?php echo $this->get_field_name('orderby'); ?>" class="widefat" id="<?php echo $this->get_field_id('orderby'); ?>">
			<option value="date" <?php if($orderby == "date"){ echo "selected='selected'";} ?>><?php esc_html_e('publish date (newest first)', 'weta'); ?></option>
			<option value="rand" <?php if($orderby == "rand"){ echo "selected='selected'";} ?>><?php esc_html_e('random', 'weta'); ?></option>
		</select>
	</p>

	<p><label for="<?php echo $this->get_field_id('category'); ?>"><?php esc_html_e('Show only posts with the following category slug (separate multiple category slugs by comma)','weta'); ?></label>
	<input type="text" name="<?php echo $this->get_field_name('category'); ?>" value="<?php echo esc_attr($category); ?>" class="widefat" id="<?php echo $this->get_field_id('category'); ?>" /></p>

	<p><label for="<?php echo $this->get_field_id('postnumber'); ?>"><?php esc_html_e('Number of Posts:','weta'); ?></label>
		<select name="<?php echo $this->get_field_name('postnumber'); ?>" class="widefat" id="<?php echo $this->get_field_id('postnumber'); ?>">
			<option value="1" <?php if($postnumber == "1"){ echo "selected='selected'";} ?>><?php esc_html_e('1', 'weta'); ?></option>
			<option value="2" <?php if($postnumber == "2"){ echo "selected='selected'";} ?>><?php esc_html_e('2', 'weta'); ?></option>
			<option value="3" <?php if($postnumber == "3"){ echo "selected='selected'";} ?>><?php esc_html_e('3', 'weta'); ?></option>
			<option value="4" <?php if($postnumber == "4"){ echo "selected='selected'";} ?>><?php esc_html_e('4', 'weta'); ?></option>
			<option value="5" <?php if($postnumber == "5"){ echo "selected='selected'";} ?>><?php esc_html_e('5', 'weta'); ?></option>
			<option value="6" <?php if($postnumber == "6"){ echo "selected='selected'";} ?>><?php esc_html_e('6', 'weta'); ?></option>
			<option value="7" <?php if($postnumber == "7"){ echo "selected='selected'";} ?>><?php esc_html_e('7', 'weta'); ?></option>
			<option value="8" <?php if($postnumber == "8"){ echo "selected='selected'";} ?>><?php esc_html_e('8', 'weta'); ?></option>
			<option value="9" <?php if($postnumber == "9"){ echo "selected='selected'";} ?>><?php esc_html_e('9', 'weta'); ?></option>
			<option value="10" <?php if($postnumber == "10"){ echo "selected='selected'";} ?>><?php esc_html_e('10', 'weta'); ?></option>
			<option value="11" <?php if($postnumber == "11"){ echo "selected='selected'";} ?>><?php esc_html_e('11', 'weta'); ?></option>
			<option value="12" <?php if($postnumber == "12"){ echo "selected='selected'";} ?>><?php esc_html_e('12', 'weta'); ?></option>
		</select>
	</p>

	<p><input id="<?php echo $this->get_field_id('hidedate'); ?>" name="<?php echo $this->get_field_name('hidedate'); ?>" type="checkbox" value="1" <?php checked( '1', $hidedate ); ?> />
<label for="<?php echo $this->get_field_id('hidedate'); ?>"><?php esc_html_e('Hide publish date', 'weta'); ?></label>
	</p>

	<p><input id="<?php echo $this->get_field_id('hideauthor'); ?>" name="<?php echo $this->get_field_name('hideauthor'); ?>" type="checkbox" value="1" <?php checked( '1', $hideauthor ); ?> />
<label for="<?php echo $this->get_field_id('hideauthor'); ?>"><?php esc_html_e('Hide post author', 'weta'); ?></label>
	</p>

	<p><input id="<?php echo $this->get_field_id('hidecomments'); ?>" name="<?php echo $this->get_field_name('hidecomments'); ?>" type="checkbox" value="1" <?php checked( '1', $hidecomments ); ?> />
<label for="<?php echo $this->get_field_id('hidecomments'); ?>"><?php esc_html_e('Hide number of comments', 'weta'); ?></label>
	</p>

	<?php
	}
}

register_widget('weta_numbered_rp');


/*-----------------------------------------------------------------------------------*/
/* 3. Weta: Quote
/*-----------------------------------------------------------------------------------*/

class weta_quote extends WP_Widget {

	public function __construct() {
		parent::__construct( 'widget_weta_quote', esc_html__( 'Weta: Quote', 'weta' ), array(
			'classname'   => 'widget_weta_quote',
			'description' => esc_html__( 'Show a big quote or text slogan.', 'weta' ),
		) );
	}

	public function widget($args, $instance) {
		extract( $args );
		$title = $instance['title'];
		$quotetext = $instance['quotetext'];
		$quoteauthor = $instance['quoteauthor'];

		echo $before_widget; ?>

		<div class="quote-wrap">

		<?php if($title != '')
			echo '<div class="widget-title-wrap"><h3 class="widget-title"><span>'. esc_html($title) .'</span></h3></div>'; ?>

			<blockquote class="quote-text"><?php echo ( wp_kses_post(wpautop($quotetext))  ); ?>
			<?php if($quoteauthor != '') {
				echo '<cite class="quote-author"> ' . ( wp_kses_post($quoteauthor) ) . ' </cite>';
			}
			?>
			</blockquote>
			</div><!-- end .quote-wrap -->

	   <?php
	   echo $after_widget;

	   // Reset the post globals as this query will have stomped on it
	   wp_reset_postdata();
	   }

   function update($new_instance, $old_instance) {

   		$instance['title'] = $new_instance['title'];
   		$instance['quotetext'] = $new_instance['quotetext'];
   		$instance['quoteauthor'] = $new_instance['quoteauthor'];

       return $new_instance;
   }

   function form($instance) {
   		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
   		$quotetext = isset( $instance['quotetext'] ) ? esc_attr( $instance['quotetext'] ) : '';
   		$quoteauthor = isset( $instance['quoteauthor'] ) ? esc_attr( $instance['quoteauthor'] ) : '';
	?>

	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:','weta'); ?></label>
		<input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
	</p>

	<p>
		<label for="<?php echo $this->get_field_id('quotetext'); ?>"><?php esc_html_e('Quote Text:','weta'); ?></label>
		<textarea name="<?php echo $this->get_field_name('quotetext'); ?>" class="widefat" rows="8" cols="12" id="<?php echo $this->get_field_id('quotetext'); ?>"><?php echo( $quotetext ); ?></textarea>
	</p>

	<p>
	<label for="<?php echo $this->get_field_id('quoteauthor'); ?>"><?php esc_html_e('Quote Author (optional):','weta'); ?></label>
	<input type="text" name="<?php echo $this->get_field_name('quoteauthor'); ?>" value="<?php echo esc_attr($quoteauthor); ?>" class="widefat" id="<?php echo $this->get_field_id('quoteauthor'); ?>" />
	</p>

	<?php
	}
}

register_widget('weta_quote');


/*-----------------------------------------------------------------------------------*/
/* 4. Weta: Authors
/*-----------------------------------------------------------------------------------*/

class weta_authors extends WP_Widget {

	public function __construct() {
		parent::__construct( 'widget_weta_authors', esc_html__( 'Weta: Authors', 'weta' ), array(
			'classname'   => 'widget_weta_authors',
			'description' => esc_html__( 'A list of blog authors with gravatars.', 'weta' ),
		) );
	}

	public function widget($args, $instance) {
		extract( $args );
		$title = $instance['title'];
		$authornumber = $instance['authornumber'];
		$imgformat = $instance['imgformat'];

		echo $before_widget; ?>

		<?php if($title != '')
			echo '<div class="widget-title-wrap"><h3 class="widget-title"><span>'. esc_html($title) .'</span></h3></div>'; ?>

		<div class="authors-wrap">
		<?php
			$authors = get_users(array(
	    		'number' => $authornumber,
	    		'orderby' => 'post_count',
	    		'order' => 'DESC',
	    	) );
		    $i=0;
		    //get all users list
		    foreach($authors as $author){
		        $authorList[$i]['id']=$author->data->ID;
		        $authorList[$i]['name']=$author->data->display_name;
		        $authorList[$i]['email']=$author->data->user_email;
		        $i++;
		    }
    	?>

		<?php
        foreach($authorList as $author){
            $args=array(
            	'posts_per_page' 		=> 1,
				'author'				=> $author['id'],
				'ignore_sticky_posts' 	=> true,
			);
            $weta_authors_query = new WP_Query($args);
            if($weta_authors_query->have_posts() ) {
                while ($weta_authors_query->have_posts()){
                    $weta_authors_query->the_post();
        ?>

       <div class="author">
	      <a class="author-avatar <?php if ( $imgformat == 'circle'  ) : ?><?php echo 'circle' ?><?php endif; ?>" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 150 ); ?></a>
		  <h4 class="author-link"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></h4>
		  <p class="author-latest-post"><a href="<?php echo get_permalink(); ?>"> <?php echo get_the_title(); ?> </a></p>
		  <a class="author-all-posts" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php esc_html_e('All Posts by', 'weta') ?> <?php the_author(); ?></a>
        </div><!-- end .author -->
        <?php
                }
            }
        }
        ?>
		</div><!-- end .authors-wrap -->

	   <?php
	   echo $after_widget;

	   // Reset the post globals as this query will have stomped on it
	   wp_reset_postdata();
	   }

   function update($new_instance, $old_instance) {

   		$instance['title'] = $new_instance['title'];
   		$instance['authornumber'] = $new_instance['authornumber'];
   		$instance['imgformat'] = $new_instance['imgformat'];

       return $new_instance;
   }

   function form($instance) {
   		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
   		$authornumber = isset( $instance['authornumber'] ) ? esc_attr( $instance['authornumber'] ) : '';
   		$imgformat = isset( $instance['imgformat'] ) ? esc_attr( $instance['imgformat'] ) : '';

	?>

	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:','weta'); ?></label>
		<input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
	</p>

	<p><label for="<?php echo $this->get_field_id('authornumber'); ?>"><?php esc_html_e('Number of authors to show:','weta'); ?></label>
		<input type="text" name="<?php echo $this->get_field_name('authornumber'); ?>" value="<?php echo esc_attr($authornumber); ?>" class="widefat" id="<?php echo $this->get_field_id('authornumber'); ?>" /></p>

	<p><label for="<?php echo $this->get_field_id('imgformat'); ?>"><?php esc_html_e('Gravatar image format:','weta'); ?></label>
		<select name="<?php echo $this->get_field_name('imgformat'); ?>" class="widefat" id="<?php echo $this->get_field_id('imgformat'); ?>">
			<option value="square" <?php if($imgformat == "square"){ echo "selected='selected'";} ?>><?php esc_html_e('square', 'weta'); ?></option>
			<option value="circle" <?php if($imgformat == "circle"){ echo "selected='selected'";} ?>><?php esc_html_e('circle', 'weta'); ?></option>
		</select>
	</p>

	<?php
	}
}

register_widget('weta_authors');


/*-----------------------------------------------------------------------------------*/
/* 5. Weta: Recent Posts Slider
/*-----------------------------------------------------------------------------------*/

class weta_slider extends WP_Widget {

	public function __construct() {
		parent::__construct( 'widget_weta_slider', esc_html__( 'Weta: Post Slider', 'weta' ), array(
			'classname'   => 'widget_weta_slider',
			'description' => esc_html__( 'Show (up to 10) posts in a featured slider.', 'weta' ),
		) );
	}

	public function widget($args, $instance) {
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
   		$postnumber = isset( $instance['postnumber'] ) ? esc_attr( $instance['postnumber'] ) : '';
   		$tag = isset( $instance['tag'] ) ? esc_attr( $instance['tag'] ) : '';

		echo $args['before_widget']; ?>

		<?php if($title != '')
			echo '<div class="widget-title-wrap"><h3 class="widget-title"><span>'. esc_html($title) .'</span></h3></div>'; ?>

		<div id="featured-content" class="flexslider">
			<ul class="featured-posts slides">

<?php
// The Query
	$weta_slider_query = new WP_Query(array (
		'post_status'	   => 'publish',
		'posts_per_page' => $postnumber,
		'tag' => $tag,
		'ignore_sticky_posts' => 1,
	) );
?>

<?php
// The Loop
if($weta_slider_query->have_posts()) : ?>

   <?php while($weta_slider_query->have_posts()) : $weta_slider_query->the_post() ?>

   <li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-thumbnail">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('weta-landscape-big'); ?></a>
		</div><!-- end .entry-thumbnail -->
		<div class="entry-text-wrap">
			<div class="centered-wrap">
				<div class="centered">
					<div class="overlay">
						<header class="entry-header">
							<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	   					</header><!-- end .entry-header -->
	   					<footer class="entry-footer">
	   						<?php the_category(', '); ?>
						</footer><!-- .entry-footer -->
					</div><!-- .overlay -->
				</div><!-- .centered -->
			</div><!-- .centered-wrap -->
		</div><!-- .entry-text-wrap -->
	</li><!--end .post -->

   <?php endwhile; ?>

<?php endif ?>
</ul><!-- .featured-content-inner -->
</div><!-- #featured-content .featured-content -->

	<?php
	echo $args['after_widget'];

	 // Reset the post globals as this query will have stomped on it
	wp_reset_postdata();
	}

   function update($new_instance, $old_instance) {
   		$instance['title'] = $new_instance['title'];
   		$instance['postnumber'] = $new_instance['postnumber'];
   		$instance['tag'] = $new_instance['tag'];

	   return $new_instance;
   }

   function form($instance) {
   		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
   		$postnumber = isset( $instance['postnumber'] ) ? esc_attr( $instance['postnumber'] ) : '';
   		$tag = isset( $instance['tag'] ) ? esc_attr( $instance['tag'] ) : '';
   	?>

	<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:','weta'); ?></label>
		<input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" /></p>
		
	<p><label for="<?php echo $this->get_field_id('postnumber'); ?>"><?php esc_html_e('Number of Posts (max 10):','weta'); ?></label>
		<select name="<?php echo $this->get_field_name('postnumber'); ?>" class="widefat" id="<?php echo $this->get_field_id('postnumber'); ?>">
			<option value="1" <?php if($postnumber == "1"){ echo "selected='selected'";} ?>><?php esc_html_e('1', 'weta'); ?></option>
			<option value="2" <?php if($postnumber == "2"){ echo "selected='selected'";} ?>><?php esc_html_e('2', 'weta'); ?></option>
			<option value="3" <?php if($postnumber == "3"){ echo "selected='selected'";} ?>><?php esc_html_e('3', 'weta'); ?></option>
			<option value="4" <?php if($postnumber == "4"){ echo "selected='selected'";} ?>><?php esc_html_e('4', 'weta'); ?></option>
			<option value="5" <?php if($postnumber == "5"){ echo "selected='selected'";} ?>><?php esc_html_e('5', 'weta'); ?></option>
			<option value="6" <?php if($postnumber == "6"){ echo "selected='selected'";} ?>><?php esc_html_e('6', 'weta'); ?></option>
			<option value="7" <?php if($postnumber == "7"){ echo "selected='selected'";} ?>><?php esc_html_e('7', 'weta'); ?></option>
			<option value="8" <?php if($postnumber == "8"){ echo "selected='selected'";} ?>><?php esc_html_e('8', 'weta'); ?></option>
			<option value="9" <?php if($postnumber == "9"){ echo "selected='selected'";} ?>><?php esc_html_e('9', 'weta'); ?></option>
			<option value="10" <?php if($postnumber == "10"){ echo "selected='selected'";} ?>><?php esc_html_e('10', 'weta'); ?></option>
		</select>
	</p>

	<p><label for="<?php echo $this->get_field_id('tag'); ?>"><?php esc_html_e('Show only posts with the following tag (separate multiple tags by comma)','weta'); ?></label><input type="text" name="<?php echo $this->get_field_name('tag'); ?>" value="<?php echo esc_attr($tag); ?>" class="widefat" id="<?php echo $this->get_field_id('tag'); ?>" /></p>

	<?php
	}
}

register_widget('weta_slider');