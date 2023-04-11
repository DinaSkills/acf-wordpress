<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package trex
 */

if ( ! is_active_sidebar( 'short-post-sidebar' ) ) {
	return;
}
?>
<div id="blog-sidebar" class="default-sidebar sidebar-small widget-area" role="complementary">
	<?php dynamic_sidebar( 'short-post-sidebar' ); ?>
     
</div><!-- end #blog-sidebar -->