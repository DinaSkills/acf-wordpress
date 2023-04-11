<?php /*

Element label: Bookmaker/bonus header/
Element name: element07

*/
$button = get_sub_field('button_linked_page');
?>
<div <?php if( get_sub_field('id')){?> id="<?= get_sub_field('id')?>" data-anchor="<?= get_sub_field('is_horizontal_id_custom') ? get_sub_field('horizontal_menu_custom_id') : get_sub_field('id'); ?>" <?php }?> class="bookie-header" <?php if( get_sub_field('color')){?> style="background-color:<?= get_sub_field('color');?>"  <?php }?>>
    <div class="container-no-mr el-anbieter-header">   <?php  $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full'); ?>
                                           
    <?php
$thumb_id = get_post_thumbnail_id(get_the_ID());
$alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);?>
										<div class="el-item-1">
									
											<img src="<?php echo $featured_img_url ?>" alt="<?php echo $alt ?>" width="160" height="100" class="profile-pic-r" />
										<span class="el-item-3-p-1"> <?php echo get_sub_field('black_button'); ?> </span>   
											<?php if(get_sub_field('button_text') || $button || get_sub_field('button_url'))
													{?>
											<a href="<?= get_sub_field('button_is_manual_url') ? get_sub_field('button_url') : $page_link; ?>" class="btn-block bcb-btn bcb-btn-secondary"
													<?= get_sub_field('open_link_in_new_tab') ? ' target="_blank"' : "" ?> <?= get_sub_field('no_follow') ? 'rel="nofollow noopener noreferrer"' : "" ?>>
													<?= get_sub_field('button_text'); ?>
											</a>
											<?php }?>
                                                                                
										</div>
                                
                                                                    <div class="el-item-2">
                                                                   <?php if(get_sub_field('title')) {?>
                                    <label><?php echo get_sub_field('title'); ?></label>    <?php }?>
                                                                        <ul>
                                                                     <?php if (have_rows('advantages')) : 
                                                                        $x = 1;
                                                                        while (have_rows('advantages')) : the_row(); ?>
                                                                           <li><?php echo get_sub_field('advantage'); ?> </li> 
                                                                       <?php $x++; 
                                                                       endwhile;
                                                                       endif;  ?>   
                                                                        </ul>
								</div>
                            
										<div class="el-item-3">
											<table class="el-table-details">
												
												<tbody>
											<tr><td>Bonus</td><td> <?php echo get_sub_field('bookie_con_1'); ?></td></tr>
											<tr><td>Bonusbedingungen</td><td> <?php echo get_sub_field('bookie_con_2'); ?></td></tr>
											<tr><td>Zahlmethoden</td><td> <?php echo get_sub_field('bookie_con_3'); ?></td></tr>
											<tr><td>Support</td><td> <?php echo get_sub_field('bookie_con_4'); ?></td></tr>
											<tr><td>Produkte</td><td> <?php echo get_sub_field('bookie_con_5'); ?></td></tr>
											<tr><td>Lizenz</td><td> <?php echo get_sub_field('bookie_con_6'); ?></td></tr>
											<tr><td>Wettsteuer</td><td style="color:red"><?php echo get_sub_field('bookie_con_7'); ?></td></tr>
											<tr> <td>Quotenhöhe</td> <td> <?php echo get_sub_field('bookie_con_8'); ?></td> </tr>
 
												</tbody>
											</table>
										</div>
										
								</div>    
</div>