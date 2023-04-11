<?php /*

Element label: Info table with image
Element name: element13

*/

?>
<div <?php if( get_sub_field('id')){?> id="<?= get_sub_field('id')?>" data-anchor="<?= get_sub_field('is_horizontal_id_custom') ? get_sub_field('horizontal_menu_custom_id') : get_sub_field('id'); ?>"<?php }?> class="info-table-section" <?php if( get_sub_field('color')){?> style="background-color:<?= get_sub_field('color');?>"  <?php }?>>
    <div class='text-container'>
        <div id="info-table-container">
      <table class="info-table">
           <?php if( get_sub_field('title')){?>
          <caption class="info-table-title"><?php echo get_sub_field('title');?></caption>
          <?php }?>


<?php 
$attachment_id_desktop = get_sub_field('image');

// This is getting the post id
$feature1_id = attachment_url_to_postid($attachment_id_desktop );

// This is getting the alt text from the image that is set in the media area
$alt = get_post_meta( $feature1_id, '_wp_attachment_image_alt', true );

?>
          
       <thead>
      <tr class="info-table-image-container">
          <td class="info-table-image"><img width="252" height="126" alt="<?php echo $alt ?>" src="<?php echo get_sub_field('image');?>"></td>
      </tr>
       </thead>
       <tbody class='table-left'>
       <?php if (have_rows('table_left')) { $x = 1;?>
                <?php while (have_rows('table_left')) { the_row(); ?>
                    <tr><td><?php echo get_sub_field('label')?></td>
                    <td>
                 <?php if(get_sub_field('is_link')){?>
                    <a href='<?php echo get_sub_field('link');?>' <?= get_sub_field('open_link_in_new_tab') ? ' target="_blank"' : "" ?> <?= get_sub_field('no_follow') ? 'rel="nofollow noopener noreferrer"' : "" ?>><?php echo get_sub_field('content');?></a>
                      <?php }else{
                            echo get_sub_field('content');}?>
                    </td></tr>
                    
              <?php $x++; 
                     }
        }  ?>   
     </tbody>
     <tbody class='table-right'>
            <?php if (have_rows('table_right')) { $x = 1;?>
                <?php while (have_rows('table_right')) { the_row(); ?>
                    <tr><td><?php echo get_sub_field('label')?></td><td> 
                    <?php if(get_sub_field('is_link')){?>
                    <a href='<?php echo get_sub_field('link');?>' <?= get_sub_field('open_link_in_new_tab') ? ' target="_blank"' : "" ?> <?= get_sub_field('no_follow') ? 'rel="nofollow noopener noreferrer"' : "" ?>><?php echo get_sub_field('content');?></a>
                        
                      <?php }else{
                            echo get_sub_field('content');}?>
                        </td></tr>
              <?php $x++; 
                     }
        }  ?>   
     </tbody><!-- end of first tbody -->
     
</table>
        </div>
    </div>
</div>

