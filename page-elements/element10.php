<?php /*

Element label: Bookmaker Advantages
Element name: element09

*/

?>

<div <?php if( get_sub_field('id')){?> id="<?= get_sub_field('id')?>" data-anchor="<?= get_sub_field('is_horizontal_id_custom') ? get_sub_field('horizontal_menu_custom_id') : get_sub_field('id'); ?>" <?php }?> class="review-text bookie-advantages" <?php if( get_sub_field('color')){?> style="background-color:<?= get_sub_field('color');?>"  <?php }?>>
          <div id="advantage-list" class="advantage-list text-container">
                 <h2>Die größten Vorteile von <?php echo get_field('bookie_name'); ?></h2>
                <ul>
                <?php if (have_rows('advantage')) : 
                 $x = 1;?>
                <?php while (have_rows('advantage')) : the_row(); ?>
                    <li class='listitem'><span class='number'><?php echo $x;?></span><span class='text'><?php echo get_sub_field('advantage_text'); ?></span> </li> 
                <?php $x++; 
                endwhile;
                endif;  ?> 
                </ul>
          </div>
</div>