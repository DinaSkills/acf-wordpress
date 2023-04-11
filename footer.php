<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package trex
 */

?>
<div class="prefooter-container">
     <?php get_template_part('sidebars/sidebar-footer'); ?>
  
</div>


<footer id="colophon" class="site-footer cf">
<div id="footer-new-top">


<div class="text-container">

  <div class="column" >
	<div class="logo">
	<a href="https://sportwettenschweiz.pro/">
	<img width="280" height="75.39"  src="https://sportwettenschweiz.pro/wp-content/uploads/2021/01/logo.svg" alt="Sportwetten Schweiz Logo" class="logo" loading="lazy">
	</a>
        </div>
		  <div id="footer-new-bottom" class="text-container">
			  <div class="widget-wrapper">
				  <div class="widget-area">
					  <aside id="text-2" class="  widget widget_text"> 
                                              <div class="textwidget">
                                                  <p>
                                                      <img loading="lazy" class="alignnone size-full wp-image-1392" src="https://sportwettenschweiz.pro/wp-content/uploads/2021/03/cloud.svg" alt="Cloudflare-Sicherheit" width="100" height="24"> 
                                                      <img loading="lazy" class="alignnone size-full wp-image-1393" src="https://sportwettenschweiz.pro/wp-content/uploads/2019/10/18.png" alt="achtzehn plus Inhalt"width="40" height="25"> 
                                                      <img loading="lazy" class="alignnone size-full wp-image-1394" src="https://sportwettenschweiz.pro/wp-content/uploads/2019/10/spiel-sucht.jpg"  alt="Spielsucht" width="40" height="24">
                                                      <img loading="lazy" class="alignnone size-full wp-image-1394" src="https://sportwettenschweiz.pro/wp-content/uploads/2021/03/ssl.svg"   alt="SSL-Sicherheit" width="70" height="24">
                                                      
                                                  </p>
					      </div>
					  </aside> </div>
			  </div>

			  <div class="menu_copyright">
				  <aside id="nav_menu-5" class="  widget widget_block widget_nav_menu"><div class="menu-footer-container"><ul id="menu-footer" class="menu">
                                          <li id="menu-item-1491" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1491"><a href="/about/">Über uns</a></li>
					  <li id="menu-item-1490" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1490"><a href="/cookie-richtlinien/">Cookies</a></li>
					  <li id="menu-item-1492" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-privacy-policy menu-item-1492"><a href="/datenschutzerklaerung/">Datenschutzerklärung</a></li>
					  
					  </ul></div>
                                  </aside> 
			  </div>

		  </div>
	  
	  
	  
  </div>
  <div class="column" id="right_section">  
	 <div class="copyright" id="footer-new-bottom" >
	© 2022 ALLE RECHTE VORBEHALTEN VON SPORTWETTENSCHWEIZ.PRO
	</div>
  </div>
 <div id="myBtn"  class="up"><span><?php esc_html_e('Top', 'trex') ?></span></div>
</div>
	
	
	
	
</div>

	

</footer>
</div><!-- end #main-wrap -->
<?php wp_footer(); ?>

</body>
</html>

