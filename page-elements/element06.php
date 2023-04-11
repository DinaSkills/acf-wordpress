<?php /*

Element label: Main H1 title
Element name: element06

*/

?>
<div <?php if( get_sub_field('id')){?> id="<?= get_sub_field('id')?>"  data-anchor="<?= get_sub_field('is_horizontal_id_custom') ? get_sub_field('horizontal_menu_custom_id') : get_sub_field('id'); ?>"  <?php }?> class="text-container h1-title" <?php if( get_sub_field('color')){?> style="background-color:<?= get_sub_field('color');?>"  <?php }?>>
<h1 class="entry-title"><?= get_sub_field('is_custom_title') ? get_sub_field('custom_title') : the_title(); ?></h1>
</div>