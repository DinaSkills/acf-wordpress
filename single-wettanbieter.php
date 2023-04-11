<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package trex
 */

get_header();
?>

<div id="primary" class="site-content cf">
       <?php
if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
}
?>
 
<h1 class="entry-title text-container"><?php the_title(); ?></h1>

		<main id="bookie" class="entry-content cf">
			<?php
				// Start the Loop.
			while ( have_posts() ) : the_post();
				
						if ( have_rows( 'sections' ) ) :
							while ( have_rows('sections') ) : the_row();
				
									if( have_rows( 'elements' ) ) :
										while ( have_rows( 'elements' ) ) : the_row();
				
											$layout = get_row_layout();
											include 'page-elements/'. $layout . '.php';
				
										endwhile;
									endif;
									?>
								<?php
							endwhile;
						endif;
					endwhile;?>
	</main><!-- end main -->				
	


</div><!-- end #primary-wrap -->
<?php $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full'); ?>

    <?php
$thumb_id = get_post_thumbnail_id($post->ID);
$alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
?>
            
<div class="el-sticky">
       
     <div class="el-sticky-box">
            <div class="el-sticky-item-1">
              <a class="el-sticky-container" href="<?php echo get_field('bookie_test_link'); ?>" target="_blank" rel="nofollow noopener noreferrer" >
              <div class="el-image-cropper-f"><img src="<?php echo $featured_img_url;?>" alt="<?php echo $alt ?>" width="160" height="100" class="profile-pic" /></div>
              <div class="el-image-container-f"><p><?php echo get_field('bookie_name'); ?></p> <p><span class="stars"><?php echo get_field('bookie_stars'); ?></span></p> </div>
              </a>
            </div>
            <div class="el-sticky-item-2">
               
              <span class="el-bookie-p"><?php echo get_field('bookie_score'); ?>/100</span>
            </div>
            <div class="el-sticky-item-3">
                <a href="<?php echo get_field('bookie_affiliate'); ?>" target="_blank" rel="nofollow noopener noreferrer"  class="btn-block bcb-btn bcb-btn-secondary">Wetten</a>
            </div>
     </div>
</div>
<?php get_footer(); ?>