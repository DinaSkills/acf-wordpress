<?php

/* 
 * Category posts  - for displaying posts in categories.
 *
 */

 ?>
      
  <article id="post-<?php the_ID(); ?>" class="card">
        <a href="<?php the_permalink(); ?>">
               
                <div class="entry-thumbnail">
                    <?php the_post_thumbnail('maga-square-small'); ?>
                </div><!-- end .entry-thumbnail -->
                <div class="entry-meta">
                    <?php $categories = get_the_category();
                    foreach ( $categories as $category ) { 
                        echo  $category->name; 
                    } ?>
                </div><!-- end .entry-meta -->
                <header class="entry-header">
                     <?php the_title( sprintf( '<h3 class="entry-title">' ), '</h3>' );?>
                </header><!-- end .entry-header -->

        </a>
    </article><!-- #post-## -->
    

    
  