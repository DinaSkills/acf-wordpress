<?php /*

Element label: Bookmaker Progress bar
Element name: element09

*/

?>

<div <?php if( get_sub_field('id')){?> id="<?= get_sub_field('id')?>" data-anchor="<?= get_sub_field('is_horizontal_id_custom') ? get_sub_field('horizontal_menu_custom_id') : get_sub_field('id'); ?>" <?php }?> class="review-text bookie-progress" <?php if( get_sub_field('color')){?> style="background-color:<?= get_sub_field('color');?>"  <?php }?>>
            <div class="wrapper-rating wrapper-container">
                <div class="star-rating">
                    <div class="col-fx"><span class="star-number-mark"><?php echo get_sub_field('bookie_stars'); ?>/5 </span><span class="stars"><?php echo get_sub_field('bookie_stars'); ?></span></div> 
                    <div class= "progress-bar-rating">WERTUNG<span class="arrow-down"></span>   
                </div>
                </div>
            <div id="answer" class="item-5 progress-rating wrapper-container">
            <?php if (have_rows('Progress_bar')) : ?>
        <?php while (have_rows('Progress_bar')) : the_row(); ?>
                    <div class="box-flex">
                        <span class="name-progress"> <?php echo get_sub_field('label'); ?></span>
                        <div class="progress-bar">
                                    <span class="progress-bar-fill" style="width: <?php echo get_sub_field('progress'); ?>;"><?php echo get_sub_field('progress'); ?></span>
                        </div>
                    </div>
                    <?php endwhile;
        endif;  ?> 
            </div>

</div>
