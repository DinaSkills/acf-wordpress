
<?php get_header(); ?>

<div id="primary">
    
    <div class="author-header">
    <h1 class="author-title"><?php printf( get_the_author() ); ?></h1>
	<?php
		if ( get_the_author_meta( 'description' ) ) :?>		
	<p class="author-bio"><?php the_author_meta( 'description' ); ?></p>
		<?php endif; ?>
    </div>
		
	<?php if ( have_posts() ) { ?>
		
	
		
	 <div class="author-three-columns">
		<?php
		// Start the Loop.
               
		while ( have_posts() ) : the_post(); ?>
            <a  class="author-card" href="<?php the_permalink();?>">
        
                        <div class="author-entry-thumbnail-m">
                            <?php the_post_thumbnail('trex-landscape-medium'); ?>
                        </div>
                        <?php the_title( sprintf( '<h2 class="author-post-title">' ), '</h2>' ); ?> 
                        <div class="author-entry-header">
                    <?php if (have_rows('sections')) {
                                        while (have_rows('sections')) : the_row();
                                            ?>
                                                <?php
                                                if (have_rows('elements')) {
                                                    while (have_rows('elements')) : the_row();

                                                        $layout = get_row_layout();
                                                     
                                                    
                                                          if($layout == 'element05'){
                                                       $full_content = get_sub_field('content');
                                                        $limit = 30;
                                                       $content = explode(' ', $full_content, $limit);
                                                            if (count($content)>=$limit) {
                                                            array_pop($content);
                                                            $content = implode(" ",$content).'...';
                                                            } else {
                                                            $content = implode(" ",$content);
                                                            }
                                                            echo "<p>".wp_strip_all_tags($content)."</p>";
                                                           break;
                                                       }
                                                        

                                                    endwhile;
                                                }

                                                ?>
                                     
                                            <?php
                                        endwhile;
                    }
                ?>
  
                <div class="read-more-excerpt"> 
                    <button class="author-button" href="<?php the_permalink(); ?>"> Mehr lesen</button>
               </div>  

               </div>
              
           </a><!-- #post-## -->
	
		<?php endwhile;
	    }
		// If no content, include the "No posts found" template.
		else{
			get_template_part( 'content', 'none' );
	
                };
		?>
            </div><!-- end #primary -->
		<?php
		// Previous/next post navigation.
		trex_content_nav( 'nav-below' ); ?>
</div><!-- end .blog-wrap -->
<?php get_footer(); ?>