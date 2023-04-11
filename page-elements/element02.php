<?php /*

Element label: Pros and con list
Element name: element02

*/


?>
<div <?php if( get_sub_field('id')){?> id="<?= get_sub_field('id')?>" data-anchor="<?= get_sub_field('is_horizontal_id_custom') ? get_sub_field('horizontal_menu_custom_id') : get_sub_field('id'); ?>"  <?php }?> <?php if( get_sub_field('color')){?> style="background-color:<?= get_sub_field('color');?>"  <?php }?> class="pros-cons">
		<div class="text-container">
                    <div id="main-list-container" class='list-container'>
                        <?php if( get_sub_field('title')){?>
                        <h3><?= get_sub_field('title');}?></h3>
                             
                            <ul class="block-pros"> 
			      <?php if (have_rows('pros_list')) : 
				$x = 1;?>
				<?php while (have_rows('pros_list')) : the_row(); ?>
                                <li><?php echo get_sub_field('pros'); ?></li> 
				<?php $x++; 
				endwhile;
				endif;  ?>   
                            </ul>
                            <ul class="block-cons"> 
			      <?php if (have_rows('cons_list')) : 
				$x = 1;?>
				<?php while (have_rows('cons_list')) : the_row(); ?>
                                <li><?php echo get_sub_field('cons'); ?></li> 
				<?php $x++; 
				endwhile;
				endif;  ?>   
                            </ul>
                        
		     </div>
		</div>
</div>
