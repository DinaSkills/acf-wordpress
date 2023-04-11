<?php /*

Element label: Article
Element name: element05

*/



?>
<div  <?php if( get_sub_field('id')){?> id="<?= get_sub_field('id')?>" data-anchor="<?= get_sub_field('is_horizontal_id_custom') ? get_sub_field('horizontal_menu_custom_id') : get_sub_field('id'); ?>"  <?php }?> class="article" <?php if( get_sub_field('color')){?> style="background-color:<?= get_sub_field('color');?>"  <?php }?> >
    <div class='text-container'>  
        <?=  get_sub_field('content');  ?>       
    </div>
</div>