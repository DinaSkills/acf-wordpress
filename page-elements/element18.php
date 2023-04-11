<?php /*

Element label: Autor  
Element name: element18

*/ ?>

   <div class="authorbox cf">
	<div class="author-avatar">
        
		<?php
		$author_bio_avatar_size = apply_filters( 'trex_author_bio_avatar_size', 150 );
		echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
		?>
	</div><!-- .author-avatar -->
	<div class="author-heading">
		
		<p class="author-title"><?php printf( "<a href='" .  esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )) . "' rel='author'>" . get_the_author() . "</a>" ); ?></h3>
		<span><?php esc_html_e('Autor', 'trex') ?></span>
                  
	</div>    
      
</div><!-- end .authorbox -->