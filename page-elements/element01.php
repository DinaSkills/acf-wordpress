<?php /*

Element label: Main hero
Element name: element01

*/
$imageBannerFirst = get_sub_field('big_banner_image');
$imageBannerSecond = get_sub_field('background_image_second_banner');
$imageBannerThird = get_sub_field('background_image_third_banner');
$button = get_sub_field('button_linked_page');
?>


<div  <?php if( get_sub_field('id')){?> id="<?= get_sub_field('id')?>"  data-anchor="<?= get_sub_field('is_horizontal_id_custom') ? get_sub_field('horizontal_menu_custom_id') : get_sub_field('id'); ?>"  <?php }?> class="header-main-hero" <?php if( get_sub_field('color')){?> style="background-color:<?= get_sub_field('color');?>"  <?php }?>>

<div class="row">
  <div class="column" id="left_column">
   <div class="bottom-left">
		     <p class="type"  style="color:<?= get_sub_field('label_color_1'); ?>"><?php echo get_sub_field('big_banner_label_txt'); ?></p>	            
                            <p style="color:<?= get_sub_field('font_color_1'); ?>"><?php echo get_sub_field('heading_big_banner'); ?></p>
                     				
                      			
                        	
                            <div class="btn-p">
                                <?php if(get_sub_field('button_text') || $button || get_sub_field('button_url')) {?>
                                <a href="<?= get_sub_field('button_is_manual_url') ? get_sub_field('button_url') : $page_link; ?>" class="btn-block bcb-btn bcb-btn-secondary"
                                        target=""<?= get_sub_field('open_link_in_new_tab') ? '_blank"' : "" ?>">
                                        <?= get_sub_field('button_text'); ?>
                                </a>
                                <?php }?>	
                        </div>	
                        </div>



  <a href="<?php echo get_sub_field('affiliate_url_first_banner'); ?>">
	  <img  class="profile-pic2" alt="first_banner" src="<?php echo  $imageBannerFirst['url']; ?>">						  
     </a>
  </div>
  
	  <div class="column" id="left_column">
   
		  
		    <div id="right_column">
				 <div class="bottom-left">
				
				
				 <p class="type"  style="color:<?= get_sub_field('label_color_2'); ?>"><?php echo get_sub_field('second_banner_label'); ?></p>
                       <div class="title" style="color:<?= get_sub_field('label_color_2'); ?>">
                            <p><?php echo get_sub_field('heading_second_banner'); ?></p> 
                                                           
                
                          <div class="btn-p">
                                <?php if(get_sub_field('button_text') || $button || get_sub_field('button_url')) {?>
                                <a href="<?php echo get_field('affiliate_url_second_banner'); ?>" class="btn-block bcb-btn bcb-btn-secondary"
                                        target=""<?= get_sub_field('open_link_in_new_tab') ? '_blank"' : "" ?>">
                                        <?= get_sub_field('button_text'); ?>
                                </a>
                                <?php }?>	
                        </div>	
                    
                    
                    </div>
				
				
				</div>


			 <a href="<?php echo get_sub_field('affiliate_url_second_banner'); ?>">
				<img class="profile-pic3" alt="second_banner" src="<?php echo  $imageBannerSecond['url']; ?>">
	           	</a>	
			
	  		 </div>
		  
		  
		     <div id="right_column" style=" padding-top: 6px;">
				  <div class="bottom-left">
				 
		 <p class="type"style="color:<?= get_sub_field('label_color_3'); ?>"><?php echo get_sub_field('label_text_third_banner'); ?></p>
                        <div class="title" style="color:<?= get_sub_field('font_color_3'); ?>">
                            <p><?php echo get_sub_field('heading_med_third_banner'); ?></p> 
            
                          <div class="btn-p">
                                <?php if(get_sub_field('button_text') || $button || get_sub_field('button_url')) {?>
                                <a href="<?php echo get_sub_field('affiliate_url_med_third_banner'); ?>" class="btn-block bcb-btn bcb-btn-secondary"
                                        target=""<?= get_sub_field('open_link_in_new_tab') ? '_blank"' : "" ?>">
                                        <?= get_sub_field('button_text'); ?>
                                </a>
                                <?php }?>	
   </div>
                </div>
				 
				 </div>
 				

   				 
 		    <a href="<?php echo get_sub_field('affiliate_url_med_third_banner'); ?>">
			<img class="profile-pic3" alt="med_third_banner" src="<?php echo $imageBannerThird['url']; ?>">
			</a>	 
	  		 </div>
		  
  
	  
  </div>
  
					 
  </div>
  

    </div><!-- end .entry-header -->
</div> 