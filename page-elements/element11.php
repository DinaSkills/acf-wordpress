<?php /*

Element label: Info Bookmaker list
Element name: element11

*/

?>
<div <?php if( get_sub_field('id')){?> id="<?= get_sub_field('id')?>" data-anchor="<?= get_sub_field('is_horizontal_id_custom') ? get_sub_field('horizontal_menu_custom_id') : get_sub_field('id'); ?>" <?php }?> class="info-block" <?php if( get_sub_field('color')){?> style="background-color:<?= get_sub_field('color');?>"  <?php }?>>
		<div class="text-container">
                    <div class='list-container'>
                        <p class="info-title"><?php echo get_sub_field('title');?></p>
                            <ul class="block-info"> 
			      <?php if (have_rows('infos')) : 
				$x = 1;?>
				<?php while (have_rows('infos')) : the_row(); ?>
                                <li><span><?php echo get_sub_field('info_name');?></span>
                               <?php if(get_sub_field('is_link')){?>
                                <a href='<?php echo get_sub_field('link');?>' <?= get_sub_field('open_link_in_new_tab') ? ' target="_blank"' : "" ?> <?= get_sub_field('no_follow') ? 'rel="nofollow noopener noreferrer"' : "" ?>><?php echo get_sub_field('text_info');?></a>
                               <?php }else{
                                       echo get_sub_field('text_info');}
                                       ?></li> 
                                
				<?php $x++; 
				endwhile;
				endif;  ?>   
                            </ul>
		     </div>
		</div>
</div>