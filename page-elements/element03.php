<?php /*

Element label: FAQ
Element name: element03

*/ ?>

<div <?php if( get_sub_field('id')){?> id="<?= get_sub_field('id')?>" data-anchor="<?= get_sub_field('is_horizontal_id_custom') ? get_sub_field('horizontal_menu_custom_id') : get_sub_field('id'); ?>"   <?php }?> class="faq-container" <?php if( get_sub_field('color')){?> style="background-color:<?= get_sub_field('color');?>"<?php }?> >
          
     <div class='text-container'>
         <?php if( get_sub_field('title')){?> 
        <h2><?= get_sub_field('title'); ?> </h2>
        <?php }?>
        <div class="accordion" itemscope itemtype="https://schema.org/FAQPage">
        <?php if (have_rows('questions')) : ?>
        <?php while (have_rows('questions')) : the_row(); ?>
                    <div class="accordion-item"  itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                      <h3 itemprop="name" class='h3'>  <span class ="active"><?= get_sub_field('question'); ?></span></h3>
                        <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" class="content">
                          <p itemprop="text"><?php echo get_sub_field('answer'); ?></p>
                        </div>
                    </div>
        <?php endwhile;
        endif;  ?> 
       </div>   
    </div>
</div>
