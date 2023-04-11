<?php /*

Element label: Short Posts
Element name: element04

*/

$postnumber = get_sub_field('postnumber');
$category = get_sub_field('category');
$orderby =get_sub_field('orderby');

$trex_rp_query = new WP_Query(array (
    'post_status'	   => 'publish',
    'posts_per_page' => $postnumber,
    'orderby' => $orderby,
    'ignore_sticky_posts' => 1,
    'category_name' => $category,
    'post_type' => array('post', 'short_posts'),
) );


?>



<!-- latest news -->


<div class="news" <?php if( get_sub_field('id')){?> id="<?= get_sub_field('id')?>" data-anchor="<?= get_sub_field('is_horizontal_id_custom') ? get_sub_field('horizontal_menu_custom_id') : get_sub_field('id'); ?>"  <?php }?>  class="latest-posts" <?php if( get_sub_field('color')){?> style="background-color:<?= get_sub_field('color');?>"  <?php }?>>
<div class='text-container'>
               <?php if( get_sub_field('title')){?>
        <h2><?= get_sub_field('title'); ?></h2>
                <?php }?>
            <?php 
    
            // The Loop
    if($trex_rp_query->have_posts()) : ?>
        <div class="rp-three-columns-textright-m cf">
        <?php while($trex_rp_query->have_posts()) : $trex_rp_query->the_post() ?>               
            <article id="post-<?php the_ID(); ?>" class="card">
        <a href="<?php the_permalink(); ?>">
               
                <div class="entry-thumbnail">
                    <?php the_post_thumbnail('maga-square-small'); ?>
                </div><!-- end .entry-thumbnail -->
                <div class="entry-meta">
                    <?php $categories = get_the_category();
                    foreach ( $categories as $category ) { 
                                echo  $category->name . " ";
                    } ?>
                </div><!-- end .entry-meta -->
                <header class="entry-header">
                     <?php the_title( sprintf( '<h3 class="entry-title">' ), '</h3>' );?>
                </header><!-- end .entry-header -->

        </a>
    </article><!-- #post-## -->
    <?php endwhile; ?>
    <?php endif ;?>
    </div>
             
        <?php if(get_sub_field('button_text') || $button || get_sub_field('button_url')){?>
     <div class="btn-container btn-center">
                <a href="<?= get_sub_field('button_is_manual_url') ? get_sub_field('button_url') : $page_link; ?>" class="bcb-btn bcb-btn-inverted"  
                        target=""<?= get_sub_field('open_link_in_new_tab') ? '_blank"' : "" ?>">
                        <?= get_sub_field('button_text'); ?>
                </a>
                        </div>
   
    <?php }?>
</div>
</div>
<?php wp_reset_postdata(); ?>
