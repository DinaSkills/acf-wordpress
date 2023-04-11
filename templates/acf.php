<?php
/*
 * Template Name: Advanced Custom Field
 *
 */
 
get_header(); 

if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
    
<div id="primary" class="site-content cf" role="main">
<main class="entry-content cf">
    
    <?php
if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
}
?>
 
        <?php if ( have_rows( 'sections' ) ) :
            while ( have_rows('sections') ) : the_row();  ?>
            <div class="row">
                    <?php
                    if( have_rows( 'elements' ) ) :
                        while ( have_rows( 'elements' ) ) : the_row();

                            $layout = get_row_layout();

                       include __DIR__ . '../../page-elements/' . $layout . '.php';

                        endwhile;
                    endif;
                    ?>
                    </div>
                <?php
            endwhile;
        endif;
    ?>
</main>
</div>
    <?php endwhile;
endif;


 get_footer();
 
?>