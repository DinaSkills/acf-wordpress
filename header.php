<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package trex
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

 <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
<?php seo_pagination_meta(); ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

		<div class="header-bg">
		<header id="masthead" class="cf">    
                <div id="mobile-main-wrap" class="stick sticky-element cf">  
                  <div class="sticky-anchor"></div>
                   <div class="nav-mobile sticky-content cf">
                   <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="small-logo-mobile " rel="home" title="Homepage Sportwetten Schweiz" ><img class="small-logo-img" width="190" height="23" title="Logo Sportwetten Schweiz"   alt="Logo Sportwetten Schweiz" src='<?php echo wp_kses_post( get_theme_mod( 'small_logo' ) ); ?>'></a>	
                  
                    <div class="search-box" id="mobile">
                                        
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <label>
        <span class="screen-reader-text">Search for:</span>
       
    </label>
	 <input type="search" class="search-field" placeholder="Search …" value="" name="s-mobile" title="Search for:" />
    <input type="submit" class="search-submit" value="Search" />
</form>
                                                                                            
                </div>
                   
                   <button id="menu-main-toggle" aria-label="Menü"><span><?php esc_html_e( 'Open', 'trex' ); ?></span></button>
                   <button id="menu-main-close"aria-label="Menü"  class="btn-close"><span><?php esc_html_e( 'Close', 'trex' ); ?></span></button>
                    </div>
                </div>
		
			<div id="menu-main-wrap" class=" stick sticky-element cf">

				<div class="sticky-anchor"></div>
				<nav id="site-nav" class="sticky-content cf">
					<div class="sticky-wrap">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="small-logo" rel="home" title="Homepage Sportwetten Schweiz"><img src="<?php echo wp_kses_post( get_theme_mod( 'small_logo' ) ); ?>" class="small-logo-img" alt="Logo Sportwetten Schweiz"></a>	
				<!--<span class="header-icon-wrap"><a alt="">✚</a></span>-->			
					<?php wp_nav_menu( array(
						'theme_location'	=> 'primary',
						'menu_class' 		=> 'nav-menu',
						'container' 		=> 'false') ); ?>
						
					 
                     
                                        <?php if ( get_theme_mod( 'show_headersearch' ) ) : ?>
                               <div class="search-box" id="mobile2">
                                            <?php get_search_form(); ?>
                        
	                                 <?php endif; ?>
                               </div>
                    
				</div><!-- end .sticky-wrap -->
                                
				</nav><!-- end #site-nav -->
                                
			</div><!-- end #menu-main-wrap -->
                      

		</header><!-- end #masthead -->
		</div><!-- end .header-bg -->

<div id="main-wrap">
	
