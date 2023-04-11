<?php /*

Element label: Table of contests menu (top)
Element name: element12

*/

?>
<div <?php if( get_sub_field('id')){?> id="<?= get_sub_field('id')?>" data-anchor="<?= get_sub_field('is_horizontal_id_custom') ? get_sub_field('horizontal_menu_custom_id') : get_sub_field('id'); ?>" <?php }?> class="review-text" <?php if( get_sub_field('color')){?> style="background-color:<?= get_sub_field('color');?>"  <?php }?>>
            <div id='toc-menu' class='list-container'>
            <div class="wrapper-block-toc" onclick="closeFunction()">
                <div class="block-name"><?= get_sub_field('title')?></div>
                <div>
                    <svg width="30" height="30" viewBox="0 0 40 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 20H29" stroke="#5C5C5C" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M11 14H29" stroke="#5C5C5C" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M11 26H29" stroke="#5C5C5C" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>
            </div>
            <div class='container-no-mr'>
            <ul id='menu-toc' class="block-menu-toc">
                 <?php if (have_rows('menu_toc')) : 
                 $x = 1;?>
                <?php while (have_rows('menu_toc')) : the_row(); ?>
                <li onclick="closeFunction()"><a href="<?php echo get_page_link().'#'. get_sub_field('link_toc');?>"><?php echo get_sub_field('link_text'); ?></a></li> 
                <?php $x++; 
                endwhile;
                endif;  ?> 
            </ul>
        </div>
            </div>

</div>