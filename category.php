<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
get_header();
$category_id = 'category_' . get_queried_object_id();
?>

<div class="entry-content cf">    
    <div id="primary" class="site-content cf" role="main">
        <div class="text-container">        
<?php if (have_posts()) : ?>

                <header class="archive-header">
    <?php
    single_term_title('<h1 class="">', '</h1>');
    ?>

                </header><!-- end .archive-header --> 
        <?php if (the_archive_description('<div class="archive-review-txt ">', '</div>')): ?>
        <?php the_archive_description('<div class="archive-review-txt ">', '</div>'); ?>
                <?php endif; ?>
                <div class="archive-review-txt">
                <div ><?php echo get_field('custom_category_description', $category_id); ?></div>               
                    <div class="rp-three-columns-textright-m cf">
                <?php
                // Start the Loop.
                while (have_posts()) : the_post();

                    get_template_part('partials/content', 'widget-tip');

                // End the loop.
                endwhile;

            // If no content, include the "No posts found" template.
            else :
                get_template_part('partials/content', 'none');

            endif;
            ?>
                </div>
                <div class="btn-center"><?php echo get_field('shortcode', $category_id); ?></div>
            </div>
        </div>  
        <section class="article-1"> 

            <div class="text-container">  
<?php if (get_field('custom_category_text_1', $category_id)): ?>
                    <div class="archive-review-txt"><p><?php echo get_field('custom_category_text_1', $category_id); ?></p>
                        <div><?php echo get_field('league_tables_shortcode', $category_id); ?></div>
                    </div>   
<?php endif; ?>
            </div>

        </section>



    </div><!-- end #primary -->


</div><!-- end .blog-wrap -->



<?php get_footer(); ?>
    