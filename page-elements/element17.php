<?php /*

Element label: Horizontal meni  
Element name: element17
*/ 

?>
 <div class="navigation-menu">
     <label class="navigation-title"><?php echo get_sub_field('label');?></label>
       <?php if (have_rows('horizontal_menu')) :  $x = 1;?>
          
          <div id="navigation-anchor-menu-wrapper">
            <nav id="navigation-anchor-menu" class="anchor-nav__container">
              <ul class="horizontal-nav-menu">
                <?php while (have_rows('horizontal_menu')) : the_row(); 
               if ( is_singular(array( 'post', 'page')) ) {?>
                  <li id="h-<?php echo get_sub_field('horizontal_menu_link');?>" class="nav-menu__item <?php echo get_sub_field('horizontal_menu_link');?>" data-scroll="<?php echo get_sub_field('horizontal_menu_link');?>" >
                      <a class="nav-menu__item--link" href="<?php echo get_page_link()?>#<?php echo get_sub_field('horizontal_menu_link');?>"><span><?php echo get_sub_field('horizontal_menu_item'); ?></span></a></li> 
                    <?php                                    
                                    }else{?>
                  <li id="h-<?php echo get_sub_field('horizontal_menu_link');?>" class="nav-menu__item <?php echo get_sub_field('horizontal_menu_link');?>" data-scroll="<?php echo get_sub_field('horizontal_menu_link');?>" >
                      <a class="nav-menu__item--link" href="<?php echo get_post_permalink()?>#<?php echo get_sub_field('horizontal_menu_link');?>"><span><?php echo get_sub_field('horizontal_menu_item'); ?></span></a></li> 
                                    <?php }$x++; 
                endwhile;
                endif;  ?> 
              </ul>
            </nav>
          </div>
        </div>
 