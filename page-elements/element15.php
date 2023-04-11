<?php /*

Element label: List box
Element name: element15

*/

?>
<div <?php if( get_sub_field('id')){?> id="<?= get_sub_field('id')?>" data-anchor="<?= get_sub_field('is_horizontal_id_custom') ? get_sub_field('horizontal_menu_custom_id') : get_sub_field('id'); ?>" <?php }?> class="line-box" <?php if( get_sub_field('color')){?> style="background-color:<?= get_sub_field('color');?>"<?php }?>>
		<div class="text-container">
                    <div id="list-box-container">
                  <?=  get_sub_field('list_box_content');  ?>               
		     </div>
		</div>
</div>
