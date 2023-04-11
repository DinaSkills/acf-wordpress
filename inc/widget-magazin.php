<?php
/**
 * Available trex Custom Widgets
 *
 * @package trex
 * @since trex 1.0
 * @version 1.0
 */


/*-----------------------------------------------------------------------------------*/
/* 1. trex: Recent Posts
/*-----------------------------------------------------------------------------------*/

class maga_rp extends WP_Widget {

	public function __construct() {
		parent::__construct( 'widget_maga_rp', esc_html__( 'Trex: Recent Posts', 'trex' ), array(
			'classname'   => 'widget_maga_rp',
			'description' => esc_html__( 'Show a number of recent posts that can be filtered by categories on the trex Front page.', 'trex' ),
		) );
	}

	public function widget($args, $instance) {
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance );
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
	$trex_rp_query = new WP_Query(array (
		'post_status'	   => 'publish',
		'posts_per_page' => $postnumber,
		'orderby' => $orderby,
		'ignore_sticky_posts' => 1,
		'category_name' => $category,
        'post_type' => array('post', 'short_posts'),
	) );

?>

        
<?php
// The Loop
if($trex_rp_query->have_posts()) : ?>

	<?php if ( $layout == 'one-column-overlay'  ) : ?>
		<div class="rp-one-column-overlay-m cf">
	<?php elseif ( $layout == 'one-column-textright' ) : ?>
		<div class="rp-one-column-textright-m cf">
	<?php elseif ( $layout == 'two-columns' ) : ?>
		<div class="rp-two-columns-m cf">
	<?php elseif ( $layout == 'two-columns-textright' ) : ?>
		<div class="rp-two-columns-textright-m cf">
	<?php elseif ( $layout == 'three-columns' ) : ?>
		<div class="rp-three-columns-m cf">
	<?php elseif ( $layout == 'three-columns-textright' ) : ?>
		<div class="rp-three-columns-textright-m cf">
	<?php elseif ( $layout == 'four-columns' ) : ?>
		<div class="rp-four-columns-m cf">
	<?php elseif ( $layout == 'four-columns-textright' ) : ?>
		<div class="rp-four-columns-textright-m cf">
	<?php endif; ?>

   <?php while($trex_rp_query->have_posts()) : $trex_rp_query->the_post() ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if ( has_post_thumbnail() && ( $imgformat == 'landscape' ) && ( $layout == 'one-column-overlay' )
			|| ( $imgformat == 'landscape' ) && ( $layout == 'one-column-textright' ) ) : ?>
			<div class="entry-thumbnail">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('trex-landscape-big'); ?></a>
			</div><!-- end .entry-thumbnail -->

		<?php elseif ( has_post_thumbnail() && ( $imgformat == 'square' ) && ( $layout == 'one-column-overlay' )
			|| ( $imgformat == 'square' ) && ( $layout == 'one-column-textright' ) ) : ?>
			<div class="entry-thumbnail">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('maga-square-small'); ?></a>
			</div><!-- end .entry-thumbnail -->

		<?php elseif ( has_post_thumbnail() && ( $imgformat == 'portrait' ) && ( $layout == 'one-column-overlay' )
			|| ( $imgformat == 'portrait' ) && ( $layout == 'one-column-textright' ) ) : ?>
			<div class="entry-thumbnail">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('trex-portrait-big'); ?></a>
			</div><!-- end .entry-thumbnail -->

		<?php elseif ( has_post_thumbnail() && ( $imgformat == 'landscape' ) && ( $layout == 'two-columns' )
			|| ( $imgformat == 'landscape' ) && ( $layout == 'three-columns' ) ) : ?>
			<div class="entry-thumbnail">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('trex-landscape-medium'); ?></a>
			</div><!-- end .entry-thumbnail -->

		<?php elseif ( has_post_thumbnail() && ( $imgformat == 'square' ) && ( $layout == 'two-columns' )
			|| ( $imgformat == 'square' ) && ( $layout == 'three-columns' ) ) : ?>
			<div class="entry-thumbnail">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('trex-square-medium'); ?></a>
			</div><!-- end .entry-thumbnail -->

		<?php elseif  ( has_post_thumbnail() && ( $imgformat == 'portrait' ) && ( $layout == 'two-columns' )
			|| ( $imgformat == 'portrait' ) && ( $layout == 'three-columns' ) ) : ?>
			<div class="entry-thumbnail">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('trex-portrait-medium'); ?></a>
			</div><!-- end .entry-thumbnail -->

		<?php elseif  ( has_post_thumbnail() && ( $imgformat == 'landscape' ) && ( $layout == 'four-columns' )
			|| ( $imgformat == 'landscape' ) && ( $layout == 'two-columns-textright' )
			|| ( $imgformat == 'landscape' ) && ( $layout == 'three-columns-textright' )
			|| ( $imgformat == 'landscape' ) && ( $layout == 'four-columns-textright' ) ) : ?>
			<div class="entry-thumbnail">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('trex-landscape-small'); ?></a>
			</div><!-- end .entry-thumbnail -->

		<?php elseif  ( has_post_thumbnail() && ( $imgformat == 'square' ) && ( $layout == 'four-columns' )
			|| ( $imgformat == 'square' ) && ( $layout == 'two-columns-textright' )
			|| ( $imgformat == 'square' ) && ( $layout == 'three-columns-textright' )
			|| ( $imgformat == 'square' ) && ( $layout == 'four-columns-textright' ) ) : ?>
			<div class="entry-thumbnail">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('maga-square-small'); ?></a>
			</div><!-- end .entry-thumbnail -->

		<?php elseif  ( has_post_thumbnail() && ( $imgformat == 'portrait' ) && ( $layout == 'four-columns' )
			|| ( $imgformat == 'portrait' ) && ( $layout == 'two-columns-textright' )
			|| ( $imgformat == 'portrait' ) && ( $layout == 'three-columns-textright' )
			|| ( $imgformat == 'portrait' ) && ( $layout == 'four-columns-textright' ) ) : ?>
			<div class="entry-thumbnail">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('trex-portrait-small'); ?></a>
			</div><!-- end .entry-thumbnail -->

		<?php elseif ( has_post_thumbnail() && ( $imgformat == 'default' ) ) : ?>
			<div class="entry-thumbnail-m">
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
   			<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
   		</header><!-- end .entry-header -->

		<?php if ( $hideexcerpt != true ) : ?>
		<div class="entry-summary">
			<?php if ( get_theme_mod('excerpt_morelink') != true ) : ?>
				<?php echo trex_excerpt(35); ?>
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
				printf( __( 'by <a href="%1$s" title="%2$s">%3$s</a>', 'trex' ),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				sprintf( esc_attr__( 'All posts by %s', 'trex' ), get_the_author() ),
				get_the_author() );
			?>
			</div><!-- end .entry-author -->
			<?php endif; ?>

			<?php if (comments_open()&& ( $hidecomments != true )) : ?>
			<div class="entry-comments">
				<?php comments_popup_link( __( 'Comments 0', 'trex' ), __( 'Comment 1', 'trex' ), __( 'Comments %', 'trex' ) ); ?>
			</div><!-- end .entry-comments -->
			<?php endif; ?>
			<?php edit_post_link( __( 'Edit', 'trex' ), '<div class="entry-edit">', '</div>' ); ?>
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

	<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:','trex'); ?></label>
		<input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" /></p>

	<p><label for="<?php echo $this->get_field_id('layout'); ?>"><?php esc_html_e('Post Layout:','trex'); ?></label>
		<select name="<?php echo $this->get_field_name('layout'); ?>" class="widefat" id="<?php echo $this->get_field_id('layout'); ?>">
			<!--<option value="one-column-overlay" <?php if($layout == "one-column-overlay"){ echo "selected='selected'";} ?>><?php esc_html_e('1-column text overlay', 'trex'); ?></option>-->
			<option value="one-column-textright" <?php if($layout == "one-column-textright"){ echo "selected='selected'";} ?>><?php esc_html_e('1-column text right', 'trex'); ?></option>
			<!--<option value="two-columns" <?php if($layout == "two-columns"){ echo "selected='selected'";} ?>><?php esc_html_e('2-columns', 'trex'); ?></option>-->
			<!--<option value="two-columns-textright" <?php if($layout == "two-columns-textright"){ echo "selected='selected'";} ?>><?php esc_html_e('2-columns text right', 'trex'); ?></option>-->
			<!--<option value="three-columns" <?php if($layout == "three-columns"){ echo "selected='selected'";} ?>><?php esc_html_e('3-columns', 'trex'); ?></option>-->
			<option value="three-columns-textright" <?php if($layout == "three-columns-textright"){ echo "selected='selected'";} ?>><?php esc_html_e('3-columns text right', 'trex'); ?></option>
			<!--<option value="four-columns" <?php if($layout == "four-columns"){ echo "selected='selected'";} ?>><?php esc_html_e('4-columns', 'trex'); ?></option>
			<option value="four-columns-textright" <?php if($layout == "four-columns-textright"){ echo "selected='selected'";} ?>><?php esc_html_e('4-columns text right', 'trex'); ?></option>-->
		</select>
	</p>

	<p><label for="<?php echo $this->get_field_id('imgformat'); ?>"><?php esc_html_e('Thumbnail Format:','trex'); ?></label>
		<select name="<?php echo $this->get_field_name('imgformat'); ?>" class="widefat" id="<?php echo $this->get_field_id('imgformat'); ?>">
			<!--<option value="landscape" <?php if($imgformat == "landscape"){ echo "selected='selected'";} ?>><?php esc_html_e('Landscape', 'trex'); ?></option>
			<option value="portrait" <?php if($imgformat == "portrait"){ echo "selected='selected'";} ?>><?php esc_html_e('Portrait', 'trex'); ?></option>-->
			<option value="square" <?php if($imgformat == "square"){ echo "selected='selected'";} ?>><?php esc_html_e('Square', 'trex'); ?></option>
   
			<!--<option value="default" <?php if($imgformat == "default"){ echo "selected='selected'";} ?>><?php esc_html_e('default (no cropping)', 'trex'); ?></option>-->
		</select>
	</p>

	<p><label for="<?php echo $this->get_field_id('postnumber'); ?>"><?php esc_html_e('Number of posts:','trex'); ?></label>
		<input type="text" name="<?php echo $this->get_field_name('postnumber'); ?>" value="<?php echo esc_attr($postnumber); ?>" class="widefat" id="<?php echo $this->get_field_id('postnumber'); ?>" /></p>

	<p><label for="<?php echo $this->get_field_id('category'); ?>"><?php esc_html_e('Show only posts with the following category slug (separate multiple category slugs by comma)','trex'); ?></label>
	<input type="text" name="<?php echo $this->get_field_name('category'); ?>" value="<?php echo esc_attr($category); ?>" class="widefat" id="<?php echo $this->get_field_id('category'); ?>" /></p>

	<p><label for="<?php echo $this->get_field_id('orderby'); ?>"><?php esc_html_e('Order posts by:','trex'); ?></label>
		<select name="<?php echo $this->get_field_name('orderby'); ?>" class="widefat" id="<?php echo $this->get_field_id('orderby'); ?>">
			<option value="date" <?php if($orderby == "date"){ echo "selected='selected'";} ?>><?php esc_html_e('publish date (newest first)', 'trex'); ?></option>
			<option value="rand" <?php if($orderby == "rand"){ echo "selected='selected'";} ?>><?php esc_html_e('random', 'trex'); ?></option>
		</select>
	</p>

    <p><input id="<?php echo $this->get_field_id('hideexcerpt'); ?>" name="<?php echo $this->get_field_name('hideexcerpt'); ?>" type="checkbox" value="1" <?php checked( '1', $hideexcerpt ); ?> />
<label for="<?php echo $this->get_field_id('hideexcerpt'); ?>"><?php esc_html_e('Hide excerpt text', 'trex'); ?></label>
	</p>

	<p><input id="<?php echo $this->get_field_id('hidecats'); ?>" name="<?php echo $this->get_field_name('hidecats'); ?>" type="checkbox" value="1" <?php checked( '1', $hidecats ); ?> />
<label for="<?php echo $this->get_field_id('hidecats'); ?>"><?php esc_html_e('Hide categories', 'trex'); ?></label>
	</p>

	<p><input id="<?php echo $this->get_field_id('hidedate'); ?>" name="<?php echo $this->get_field_name('hidedate'); ?>" type="checkbox" value="1" <?php checked( '1', $hidedate ); ?> />
<label for="<?php echo $this->get_field_id('hidedate'); ?>"><?php esc_html_e('Hide publish date', 'trex'); ?></label>
	</p>

	<p><input id="<?php echo $this->get_field_id('hideauthor'); ?>" name="<?php echo $this->get_field_name('hideauthor'); ?>" type="checkbox" value="1" <?php checked( '1', $hideauthor ); ?> />
<label for="<?php echo $this->get_field_id('hideauthor'); ?>"><?php esc_html_e('Hide post author', 'trex'); ?></label>
	</p>

	<p><input id="<?php echo $this->get_field_id('hidecomments'); ?>" name="<?php echo $this->get_field_name('hidecomments'); ?>" type="checkbox" value="1" <?php checked( '1', $hidecomments ); ?> />
<label for="<?php echo $this->get_field_id('hidecomments'); ?>"><?php esc_html_e('Hide number of comments', 'trex'); ?></label>
	</p>

	<?php
	}
}

register_widget('maga_rp');



add_shortcode('kocka_posts', 'maga_rp');