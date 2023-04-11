<?php /*

Element label: Instruction list box
Element name: element14

*/

?>

<div <?php if( get_sub_field('id')){?> id="<?= get_sub_field('id')?>" data-anchor="<?= get_sub_field('is_horizontal_id_custom') ? get_sub_field('horizontal_menu_custom_id') : get_sub_field('id'); ?>" <?php }?>  class="instruction-box" <?php if( get_sub_field('color')){?> style="background-color:<?= get_sub_field('color');?>"<?php }?>>
		<div class="text-container">
                    <div id="instructions-container">
                        <p class='instruction-title'><?php echo get_sub_field('title');?></p>
                            <ol> 
			      <?php if (have_rows('instructions')) : 
				$x = 1;?>        
				<?php while (have_rows('instructions')) : the_row(); ?>
                               <?php if(get_sub_field('is_link')){?>      
                                <li class='instruction-item'>
                                    <a href='<?php echo get_sub_field('link');?>' <?= get_sub_field('open_link_in_new_tab') ? ' target="_blank"' : "" ?> <?= get_sub_field('no_follow') ? 'rel="nofollow noopener noreferrer"' : "" ?>><?php echo get_sub_field('instruction');?></a>   </li>   
                                <?php 
                               }else if(get_sub_field('is_link_internal')){?>      
                                <li class='instruction-item'>
                                    <a href='<?php echo get_permalink (get_sub_field('internal_link'));?>' <?= get_sub_field('open_link_in_new_tab') ? ' target="_blank"' : "" ?> <?= get_sub_field('no_follow') ? 'rel="nofollow noopener noreferrer"' : "" ?>><?php echo get_sub_field('instruction');?></a>   </li>   
                               <?php }else if(get_sub_field('is_link_anchor')){
                                 if ( is_singular(array( 'post', 'page')) ) {?>
                                <li class='instruction-item'>
                                      <a href='<?php echo get_page_link().'#'. get_sub_field('anchor_link');?>' <?= get_sub_field('open_link_in_new_tab') ? ' target="_blank"' : "" ?> <?= get_sub_field('no_follow') ? 'rel="nofollow noopener noreferrer"' : "" ?>><?php echo get_sub_field('instruction');?></a> </li>    
                                    <?php                                    
                                    }else{?>
                                <li class='instruction-item'>
                                    <a href='<?php echo get_post_permalink().'#'. get_sub_field('anchor_link');?>' <?= get_sub_field('open_link_in_new_tab') ? ' target="_blank"' : "" ?> <?= get_sub_field('no_follow') ? 'rel="nofollow noopener noreferrer"' : "" ?>><?php echo get_sub_field('instruction');?></a>  </li>   
                                    <?php }                                   
                                    }else{?>
                                     <li class='instruction-item'>
                                         <span class="instruction-text"> <?php echo get_sub_field('instruction');}?></span>
                                     </li>
				<?php $x++; 
				endwhile;
				endif; ?>   
                            </ol>
		     </div>
		</div>
</div>
