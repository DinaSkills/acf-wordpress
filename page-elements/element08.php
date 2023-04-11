<?php /*

Element label: Table of contents with icons
Element name: element08

*/

?>

<div <?php if( get_sub_field('id')){?> id="<?= get_sub_field('id')?>" data-anchor="<?= get_sub_field('is_horizontal_id_custom') ? get_sub_field('horizontal_menu_custom_id') : get_sub_field('id'); ?>" <?php }?>  class="toc" <?php if( get_sub_field('color')){?> style="background-color:<?= get_sub_field('color');?>"  <?php }?>>
		<div class="container-no-mr">
                    <div id="main-toc-container">
			<h2 class="main-toc-title">Inhaltsübersicht:</h2>
                            <ul class="main-toc-list"> 
			      <?php if (have_rows('toc')) {
				$x = 1;?>
				<?php while (have_rows('toc')) : the_row();
                                  if ( is_singular(array( 'post', 'page')) ) {?>
                                    <li class='item'><i><?php echo get_sub_field('icon'); ?></i><a href="<?php echo get_page_link().'#'. get_sub_field('id');?>"><?php echo get_sub_field('title'); ?></a> </li> 
                                    <?php                                    
                                    }else{?>
                                    <li class='item'><i><?php echo get_sub_field('icon'); ?></i><a href="<?php echo get_post_permalink().'#'. get_sub_field('id');?>"><?php echo get_sub_field('title'); ?></a></li> 
                                    <?php }$x++; 
				endwhile;
				};  ?>   
                            </ul>
		     </div>
		</div>
</div>
