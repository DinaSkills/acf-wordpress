<?php /*

Element label: Bookmaker table comparison
Element name: element16

*/
$button = get_sub_field('button_linked_page');
$page_link = get_permalink( $button );
?>
<div <?php if( get_sub_field('id')){?> id="<?= get_sub_field('id')?>" data-anchor="<?= get_sub_field('is_horizontal_id_custom') ? get_sub_field('horizontal_menu_custom_id') : get_sub_field('id'); ?>" <?php }?>  class="table-comparison-box" <?php if( get_sub_field('color')){?> style="background-color:<?= get_sub_field('color');?>"<?php }?>>
	
	<div class='text-container'>
        <div id="comparison-table-container">
      <table class="comparison-table">
        <?php if (get_sub_field('title')): ?>
        <caption class="comparison-table-title"><?php echo get_sub_field('title');?></caption>   
        <?php endif; ?>
        <tbody>
       <tr>
         <?php if (have_rows('table_rows')) : 
             $x = 1;?>
	 <?php while (have_rows('table_rows')) : the_row(); ?>
           <td>
        <div class='comparison-column'>
            <div class='row-image'>
<?php 
$attachment_id_desktop = get_sub_field('image');

// This is getting the post id
$feature1_id = attachment_url_to_postid($attachment_id_desktop );

// This is getting the alt text from the image that is set in the media area
$image1_alt = get_post_meta( $feature1_id, '_wp_attachment_image_alt', true );

?>
      
                <div class='comparison-image-wrapper'> <img width="100" height="50" class='comparison-image'  alt="<?php echo $image1_alt; ?>" src="<?php echo get_sub_field('image');?> "></div>
           

           
            </div>
            
            <div class='row-pros-cons'>  
                <ul>
			      <?php if (have_rows('comparison_pros_list')) : 
				$x = 1;?>
				<?php while (have_rows('comparison_pros_list')) : the_row(); ?>
                            
                   <li> <span>&#9989;️️</span><span class='comparison-pros-text'><?php echo get_sub_field('pros'); ?></span></li>
				<?php $x++; 
				endwhile;
				endif;  ?>   
                 </ul>
       
                 <ul>	      <?php if (have_rows('comparison_con_list')) : 
				$x = 1;?>
				<?php while (have_rows('comparison_con_list')) : the_row(); ?>
                    <li>   <span>&#10060;️</span><span class='comparison-con-text'><?php echo get_sub_field('con'); ?></span></li>
				<?php $x++; 
				endwhile;
				endif;  ?>   
                </ul> 
           </div>
           <div class='cta-button'> <?php if(get_sub_field('button_text') || $button || get_sub_field('button_url')){?>
	      <a href="<?= get_sub_field('button_is_manual_url') ? get_sub_field('button_url') : $page_link; ?>" class="btn-block bcb-btn bcb-btn-secondary"
	      <?= get_sub_field('open_link_in_new_tab') ? ' target="_blank"' : "" ?> <?= get_sub_field('no_follow') ? 'rel="nofollow noopener noreferrer"' : "" ?>>
		<?= get_sub_field('button_text'); ?>
	      </a>
	     <?php }?>
           </div>
              </div>
           </td>
          <?php $x++; 
				endwhile;
				endif;  ?>
   </tr>  
        </tbody>
</table>
        </div>
    </div>

</div>
