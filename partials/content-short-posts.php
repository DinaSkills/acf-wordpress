<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<p class="vrijeme"><?php the_field('date_and_time_event'); ?></p>
<header class="entry-header">
		
        <br>
 <h2 class="h2-title"> <?php the_field('heading_2_'); ?> </h2> 
                <div class="flex-container-row">
                       <div class="flex-item-1 "> <?php the_field('team_1_'); ?></div>
                       <div class="flex-item-2 "><?php if ( '' != get_the_post_thumbnail() && ! post_password_required()  &&  ! get_theme_mod('hide_singlethumb')  && ! has_post_format( 'video' ) ) : ?>
                                <div class="entry-thumbnail inpost">
                                        <?php the_post_thumbnail();
                                    echo get_post(get_post_thumbnail_id())->post_excerpt; ?>

                                </div>
                           <?php endif; ?>
                       </div>
                       <div class="flex-item-3 "><?php the_field('team_2_'); ?> </div>
               </div>
 
</header><!-- end .entry-header -->
      <div class="entry-content">
	<h2>Tipp Begründung:</h2>
                <div class="expl-tip">
                	<ul>
                 <li><?php the_field('betting_explanation_1'); ?> </li>
                 <li><?php the_field('betting_explanation_2'); ?> </li>
                 <li><?php the_field('betting_explanation_3'); ?> </li>
                	</ul>
                 </div>
                 <div class="flex-container-row-col">
				<div class="flex-it-row-col-1 "> <p class="tip-text"><?php the_field('tip_text'); ?></p> <?php the_field('risk_color'); ?></div>
				<div class="flex-it-row-col-2 "> <p class="kvota">Empfohlene Quote</p><div class="de"><?php the_field('number_quota'); ?></div> </div>
			     <div class="flex-it-row-col-3 "><a href="<?php the_field('url_button'); ?>" class="btn-block bcb-btn bcb-btn-secondary">Wetten</a></div>
	         </div>	
        
          <?php the_field('bookie_tem'); ?>
	  <?php the_field('glp_widget'); ?>
           
       </div><!-- end .entry-content -->  
        
   
</article>