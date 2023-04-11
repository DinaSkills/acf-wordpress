<?php
/**
 * The Template for displaying single posts.
 *
 * @package trex
 * @since trex 1.0
 * @version 1.0
 */

get_header(); ?>
	<div class="blog-wrap cf">
			 <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			 <div class="entry-meta">
			<?php the_category(', '); ?>
		</div><!-- end .entry-meta -->
		<div id="primary" class="site-content cf" role="main">
		<?php
			// Start the Loop.

			while ( have_posts() ) : the_post();

				get_template_part( 'partials/content', 'short-posts' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
			endwhile;
                        
                        
		?>

			<?php
			// Previous/next post navigation.
			trex_post_nav( 'nav-single' ); ?>

		</div><!-- end #primary -->
		<?php get_sidebar(); ?>
	</div><!-- end .blog-wrap -->
<?php get_footer(); ?>