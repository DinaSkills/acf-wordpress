<?php
/**
 * trex functions and definitions
 *
 * @package trex
 * @since trex 1.0
 * @version 1.0.4
 */



/*-----------------------------------------------------------------------------------*/
/* Sets up the content width value based on the theme's design.
/*-----------------------------------------------------------------------------------*/

if ( ! isset( $content_width ) )
		$content_width = 660;

function trex_adjust_content_width() {
		global $content_width;

		if ( is_page_template( 'templates/acf.php' ) )
				$content_width = 970;
}
add_action( 'template_redirect', 'trex_adjust_content_width' );


/*-----------------------------------------------------------------------------------*/
/* Sets up theme defaults and registers support for various WordPress features.
/*-----------------------------------------------------------------------------------*/

function trex_setup() {

	// Make trex available for translation. Translations can be added to the /languages/ directory.
	load_theme_textdomain( 'trex', get_template_directory() . '/languages' );

	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );
        

	// Add support for wider content.
	add_theme_support( 'align-wide' );

	// Add support for editor font sizes.
	add_theme_support( 'editor-font-sizes', array(
		array(
				'name' => __( 'small', 'trex' ),
				'shortName' => __( 'S', 'trex' ),
				'size' => 13,
				'slug' => 'small'
		),
		array(
				'name' => __( 'regular', 'trex' ),
				'shortName' => __( 'M', 'trex' ),
				'size' => 16,
				'slug' => 'regular'
		),
		array(
				'name' => __( 'large', 'trex' ),
				'shortName' => __( 'L', 'trex' ),
				'size' => 19,
				'slug' => 'large'
		),
		array(
				'name' => __( 'larger', 'trex' ),
				'shortName' => __( 'XL', 'trex' ),
				'size' => 23,
				'slug' => 'larger'
		)
) );

	// Disable custom editor font sizes.
	add_theme_support('disable-custom-font-sizes');

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'editor-style.css' ) );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// This theme uses wp_nav_menu().
	register_nav_menus( array (
		'primary' => __( 'Primary menu', 'trex' ),
		'header-top' => __( 'Header Top menu', 'trex' ),
		'header-social' => __( 'Header Social menu', 'trex' ),
		'footer-social' => __( 'Footer Social menu', 'trex' )
	) );


	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'trex_custom_background_args', array(
		'default-color'	=> 'fff',
		'default-image'	=> '',
	) ) );

	// Enable support for Video Post Formats.
	add_theme_support( 'post-formats', array(
		'video',
	) );

	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'trex_get_featured_posts',
		'max_posts' => 10,
	) );

	// This theme uses post thumbnails.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 660 );


	//  Adding several sizes for Post Thumbnails
	add_image_size( 'trex-landscape-big', 1000, 667, true ); // big landscape thumbnails (cropped)
	add_image_size( 'trex-square-big', 1000, 1000, true ); // big square thumbnails (cropped)
	add_image_size( 'trex-portrait-big', 1000 ); // big portrait thumbnails (height flexible, not cropped)

	add_image_size( 'trex-landscape-medium', 660, 440, true ); // medium landscape thumbnails (cropped)
	add_image_size( 'trex-square-medium', 660, 660, true ); // medium square thumbnails (cropped)
	add_image_size( 'trex-portrait-medium', 660, 742, true ); // medium portrait thumbnails (cropped)

	add_image_size( 'trex-landscape-small', 373, 248, true ); // small landscape thumbnails (cropped)
	add_image_size( 'maga-square-small', 200, 100, true); // small square thumbnails (cropped)
	add_image_size( 'trex-portrait-small', 373, 420, true ); // small portrait thumbnails (cropped)

}
add_action( 'after_setup_theme', 'trex_setup' );



/*-----------------------------------------------------------------------------------*/
/*  Returns the Google font stylesheet URL if available.
/*-----------------------------------------------------------------------------------*/

/*function trex_font_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	 * supported by Source Sans Pro translate this to 'off'. Do not translate
	 * into your own language.

	$sourcesanspro = _x( 'off', 'Source Sans Pro: on or off', 'trex' );

	if ( 'off' !== $sourcesanspro ) {
		$font_families = array();

		if ( 'off' !== $sourcesanspro )
			$font_families[] = 'Open+Sans:wght@300&display=swap';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) )
			
		);
		$fonts_url = add_query_arg( $query_args, "https://fonts.googleapis.com/css2" );
	}

	return esc_url_raw( $fonts_url );
}*/


/*-----------------------------------------------------------------------------------*/
/*  Enqueue scripts and styles
/*-----------------------------------------------------------------------------------*/

function trex_scripts() {
	global $wp_styles;

	// Add fonts, used in the main stylesheet.

	// Loads JavaScript to pages with the comment form to support sites with threaded comments (when in use)
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
	wp_enqueue_script( 'comment-reply' );

	// Loads main stylesheet.
	wp_enqueue_style( 'trex-style', get_stylesheet_uri(), array(), '21022027' );

	// Loads Custom trex JavaScript functionality
	wp_enqueue_script( 'trex-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '17012023', true );
	wp_localize_script( 'trex-script', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'trex' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'trex' ) . '</span>',
	) );

	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/assets/genericons/genericons.css', array(), '3.3.1' );

}
add_action( 'wp_enqueue_scripts', 'trex_scripts' );

function add_google_analytics_to_wp_head() { ?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-154333056-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-154333056-1');
</script>
<?php
}
 
add_action( 'wp_head', 'add_google_analytics_to_wp_head' );

function add_google_analytics_4_to_wp_head() { ?>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-W0GJN3SXN5"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-W0GJN3SXN5');
</script>
<?php
}
add_action( 'wp_head', 'add_google_analytics_4_to_wp_head' );
/*-----------------------------------------------------------------------------------*/
/*  Disable sitemap caching
/*-----------------------------------------------------------------------------------*/

add_filter('wpseo_enable_xml_sitemap_transient_caching', '__return_false');

/*-----------------------------------------------------------------------------------*/
/*  Add schort code to ACF textarea
/*-----------------------------------------------------------------------------------*/

add_filter('acf/format_value/type=textarea', 'do_shortcode');

/*-----------------------------------------------------------------------------------*/
/*  Schema org
/*-----------------------------------------------------------------------------------*/

function add_review_schema_head(){
    $post = get_post();
   $featured_img_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
        if ( is_singular( 'wettanbieter' ) ) {
                 $schema = array(
                 // Tell search engines that this is structured data
                 '@context'  => "http://schema.org",
                 // Tell search engines the content type it is looking at 
                 '@type'     => "Review",
                 'itemReviewed'   => array(
                         '@type' => "Organization",
                         'name'  => get_field('bookie_name'),
                         'image' => $featured_img_url,     
                 ),       
                  'reviewRating'   => array(
                             '@type'     => "Rating",
                             'ratingValue'   =>  get_field('bookie_stars'),
                             'bestRating'  => '5',
                             'worstRating'  => '0',  
                 ),      
                 'author'   => array(
                             '@type'     => "Organization",
                             'name'   =>  'sportwettenschweiz.pro',          
                 ),        
                  'publisher'   => array(
                             '@type'     => "Organization",
                             'name'   =>  'sportwettenschweiz.pro',
                             'url'   =>  "https://sportwettenschweiz.pro/"            
                 ),    

               );
             echo '<script type="application/ld+json">' . json_encode($schema) . '</script>';

     }      
    
}
add_action( 'wp_head', 'add_review_schema_head' );


function faq(){
    if(is_plugin_active( 'advanced-custom-fields/acf.php' )){
                 $schema = array(
                 // Tell search engines that this is structured data
                 '@context'  => "http://schema.org",
                 // Tell search engines the content type it is looking at 
                 '@type'     => "FAQPage",
                  );
              $schema['mainEntity']=array();
                $x = 1;
                 $fq;
  
              while(get_field('faq_heading_'. $x)){
                 
            $fq = array(
             
                        '@type'     => "Question",
                        'name'   =>  get_field('faq_heading_'. $x),

                        'acceptedAnswer'   => array(
                                     '@type'     => "Answer",
                                     'text'   => get_field('faq_text_'. $x),                      
                 ),    
             );
              
            $x++; 
            array_push($schema['mainEntity'], $fq);      
              }
               
             echo '<script type="application/ld+json">' . json_encode($schema) . '</script>';
     }     
}

remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');

/*-----------------------------------------------------------------------------------*/
/* Load block editor styles.
/*-----------------------------------------------------------------------------------*/
function trex_block_editor_styles() {
 wp_enqueue_style( 'trex-block-editor-styles', get_template_directory_uri() . '/block-editor.css');

}
add_action( 'enqueue_block_editor_assets', 'trex_block_editor_styles' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue Google fonts style to admin screen for custom header display.
/*-----------------------------------------------------------------------------------*/
function trex_admin_fonts() {
	wp_enqueue_style( 'trex-fonts', trex_font_url(), array(), null );
}
add_action( 'admin_print_scripts-appearance_page_custom-header', 'trex_admin_fonts' );


/*-----------------------------------------------------------------------------------*/
/* Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
/*-----------------------------------------------------------------------------------*/

function trex_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'trex_page_menu_args' );


/*-----------------------------------------------------------------------------------*/
/* Sets the authordata global when viewing an author archive.
/*-----------------------------------------------------------------------------------*/

function trex_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'trex_setup_author' );


/*-----------------------------------------------------------------------------------*/
/* Short Title.
/*-----------------------------------------------------------------------------------*/

function trex_title_limit($length, $replacer = '...') {
 $string = the_title('','',FALSE);
 if(strlen($string) > $length)
 $string = (preg_match('/^(.*)\W.*$/', substr($string, 0, $length+1), $matches) ? $matches[1] : substr($string, 0, $length)) . $replacer;
 echo $string;
}

/*-----------------------------------------------------------------------------------*/
/* Multiple Custom Excerpt Lengths
/*-----------------------------------------------------------------------------------*/

function trex_excerpt($limit) {
 $excerpt = explode(' ', get_the_excerpt(), $limit);
 if (count($excerpt)>=$limit) {
 array_pop($excerpt);
 $excerpt = implode(" ",$excerpt).'...';
 } else {
 $excerpt = implode(" ",$excerpt);
 }
$excerpt = preg_replace('/<a class=\"excerpt-more-link\"(.*?)>(.*?)<\/a>/','',$excerpt);
 return $excerpt;
}

function content($limit) {
 $content = explode(' ', get_the_content(), $limit);
 if (count($content)>=$limit) {
 array_pop($content);
 $content = implode(" ",$content).'...';
 } else {
 $content = implode(" ",$content);
 }
 $content = preg_replace('/[.+]/','', $content);
 $content = apply_filters('the_content', $content);
 $content = str_replace(']]>', ']]>', $content);
 return $content;
}

/*-----------------------------------------------------------------------------------*/
/* Add custom max excerpt lengths.
/*-----------------------------------------------------------------------------------*/

function custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


/*-----------------------------------------------------------------------------------*/
/* Replace "[...]" with custom read more in excerpts.
/*-----------------------------------------------------------------------------------*/

function trex_excerpt_more( $more ) {
	global $post;
	return '? <a class="excerpt-more-link" href="'. get_permalink($post->ID) . '">' . esc_html__( 'Read More', 'trex' ) . '</a>';
}
add_filter( 'excerpt_more', 'trex_excerpt_more' );


/*-----------------------------------------------------------------------------------*/
/* Add Theme Customizer CSS
/*-----------------------------------------------------------------------------------*/

function trex_customize_css() {
		?>
	<style type="text/css">
	.entry-content a, .comment-text a, .author-bio a, .textwidget a {color: <?php echo get_theme_mod('link_color'); ?>;}
	<?php if ('#ffffff' != get_theme_mod( 'header_bg_color' ) ) { ?>
	#masthead {background: <?php echo get_theme_mod('header_bg_color'); ?>;}
	@media screen and (min-width: 1023px) {
	.sticky-content.fixed {background: <?php echo get_theme_mod('header_bg_color'); ?>;}
	}
	<?php } ?>
	<?php if ('#1e1e24' != get_theme_mod( 'footer_bg_color' ) ) { ?>
	#colophon {background: <?php echo get_theme_mod('footer_bg_color'); ?>;}
	<?php } ?>
	<?php if ('#f5f5f5' != get_theme_mod( 'authorwidget_bg_color' ) ) { ?>
	.widget_trex_authors {background: <?php echo get_theme_mod('authorwidget_bg_color'); ?>;}
	<?php } ?>
	<?php if ('#f5f5f5' != get_theme_mod( 'quotewidget_bg_color' ) ) { ?>
	.widget_trex_quote {background: <?php echo get_theme_mod('quotewidget_bg_color'); ?>;}
	<?php } ?>
	<?php if ('#f5f5f5' != get_theme_mod( 'numberedrpwidget_bg_color' ) ) { ?>
	.widget_trex_numbered_rp {background: <?php echo get_theme_mod('numberedrpwidget_bg_color'); ?>;}
	<?php } ?>
        
        
	<?php if ( '' != get_theme_mod( 'fixed_nav' ) ) { ?>
	
	.sticky-content {margin-top: 0;}
	.sticky-element .sticky-anchor {display: block !important;}
	.sticky-content.fixed {position: fixed !important; left:0; right: 0; z-index: 10000; background: #0b043e;}
	<?php } ?>
	
	<?php if ( '' != get_theme_mod( 'show_headersearch' ) &&  '' != get_theme_mod( 'show_shopnav' ) ) { ?>
	@media screen and (min-width: 1023px) {
	.header-top-nav {max-width: 50%;}
	
	<?php } ?>
	<?php if ('' != get_theme_mod( 'small_logo' ) ) { ?>
	@media screen and (min-width: 1023px) {
	.sticky-wrap {padding-left: 5px; padding-right: 5px;}
	
	<?php } ?>
	</style>
		<?php
}
add_action( 'wp_head', 'trex_customize_css');


/*-----------------------------------------------------------------------------------*/
/* Remove inline styles printed when the gallery shortcode is used.
/*-----------------------------------------------------------------------------------*/

add_filter('use_default_gallery_style', '__return_false');


if ( ! function_exists( 'trex_comment' ) ) :
/*-----------------------------------------------------------------------------------*/
/* Comments template trex_comment
/*-----------------------------------------------------------------------------------*/
function trex_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>

	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="comment-avatar">
				<?php echo get_avatar( $comment, 40 ); ?>
			</div>

			<div class="comment-wrap">
				<div class="comment-details">
					<div class="comment-author">


						<?php printf( ( '%s' ), wp_kses_post( sprintf( '%s', get_comment_author_link() ) ) ); ?>
					</div><!-- end .comment-author -->
					<div class="comment-meta">
						<span class="comment-time"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
							<?php
							/* translators: 1: date */
								printf( esc_html__( '%1$s', 'trex' ),
								get_comment_date());
							?></a>
						</span>
						<?php edit_comment_link( esc_html__(' Edit', 'trex'), '<span class="comment-edit">', '</span>'); ?>
					</div><!-- end .comment-meta -->
				</div><!-- end .comment-details -->

				<div class="comment-text">
				<?php comment_text(); ?>
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'trex' ); ?></p>
					<?php endif; ?>
				</div><!-- end .comment-text -->
				<?php if ( comments_open () ) : ?>
					<div class="comment-reply"><?php comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', 'trex' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></div>
				<?php endif; ?>
			</div><!-- end .comment-wrap -->
		</article><!-- end .comment -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="pingback">
		<p><?php esc_html_e( 'Pingback:', 'trex' ); ?> <?php comment_author_link(); ?></p>
		<p class="pingback-edit"><?php edit_comment_link(); ?></p>
	<?php
			break;
	endswitch;
}
endif;

/*-----------------------------------------------------------------------------------*/
/* Function to disale editor
 * 
 * In project was asked to use ACF for custom template. In order not to confused user editor is deactivated. 
 */
/*-----------------------------------------------------------------------------------*/
function trex_remove_editor() {
    if (isset($_GET['post'])) {
        $id = $_GET['post'];
        $template = get_post_meta($id, '_wp_page_template', true);
        switch ($template) {
            case 'templates/acf.php':  
            // the below removes 'editor' support for 'pages'
            // if you want to remove for posts or custom post types as well
            // add this line for posts:
            // remove_post_type_support('post', 'editor');
            // add this line for custom post types and replace 
            // custom-post-type-name with the name of post type:
            // remove_post_type_support('custom-post-type-name', 'editor');
            remove_post_type_support('page', 'editor');
            break;
            default :
            // Don't remove any other template.
            break;
        }
    }
}
add_action('admin_init', 'trex_remove_editor');


/*-----------------------------------------------------------------------------------*/
/* Register widgetized areas
/*-----------------------------------------------------------------------------------*/

function trex_widgets_init() {

	register_sidebar( array (
		'name' => esc_html__( 'Wett-Tipps - Sidebar', 'trex' ),
		'id' => 'short-post-sidebar',
		'description' => esc_html__( 'Tipps and Bookie Table', 'trex' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => esc_html__( 'Front Page - Magazin', 'trex' ),
		'id' => 'front-fullwidth-top',
		'description' => esc_html__( 'Sidebar to post Tipps.', 'trex' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => esc_html__( 'Front Page - Football', 'trex' ),
		'id' => 'front-content-1',
		'description' => esc_html__( 'Widgets appear left of Sidebar 1 and below the Full Width Top widget area.', 'trex' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => esc_html__( 'Front Page - Bookmaker', 'trex' ),
		'id' => 'front-bookmaker',
		'description' => esc_html__( 'Widgets appear in a right-aligned sidebar area next to the Content 1 widget area.', 'trex' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	
        register_sidebar( array (
		'name' => esc_html__( 'Front Page - Full Width Center', 'trex' ),
		'id' => 'front-strategies',
		'description' => esc_html__( 'Widgets will appear in a single-column widget area below the Content 1 and Sidebar 1 widget areas.', 'trex' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );


	register_sidebar( array (
		'name' => esc_html__( 'Footer - 1', 'trex' ),
		'id' => 'footer-one',
		'description' => esc_html__( 'Widgets will appear in the 1. widget area of the 5-column footer.', 'trex' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => esc_html__( 'Footer - 2', 'trex' ),
		'id' => 'footer-two',
		'description' => esc_html__( 'Widgets will appear in the 2. widget area of the 5-column footer.', 'trex' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => esc_html__( 'Footer - 3', 'trex' ),
		'id' => 'footer-three',
		'description' => esc_html__( 'Widgets will appear in the 3. widget area of the 5-column footer.', 'trex' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => esc_html__( 'Footer - 4', 'trex' ),
		'id' => 'footer-four',
		'description' => esc_html__( 'Widgets will appear in the 4. widget area of the 5-column footer.', 'trex' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => esc_html__( 'Footer - 5', 'trex' ),
		'id' => 'footer-five',
		'description' => esc_html__( 'Widgets will appear in the 5. widget area of the 5-column footer.', 'trex' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );


}
add_action( 'widgets_init', 'trex_widgets_init' );


if ( ! function_exists( 'trex_content_nav' ) ) :


/*-----------------------------------------------------------------------------------*/
/* Display navigation to next/previous pages when applicable.
/*-----------------------------------------------------------------------------------*/

function trex_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<div class="nav-wrap cf">
			<nav id="<?php echo $nav_id; ?>">
				<div class="nav-previous"><?php next_posts_link( wp_kses_post(__( '<span>vorherige Einträge</span>', 'trex'  ) ) ); ?></div>
				<div class="nav-next"><?php previous_posts_link( wp_kses_post(__( '<span>weitere Einträge</span>', 'trex' ) ) ); ?></div>
			</nav>
		</div><!-- end .nav-wrap -->
	<?php endif;
}

endif; // trex_content_nav


/*-----------------------------------------------------------------------------------*/
/* Display navigation to next/previous post when applicable.
/*-----------------------------------------------------------------------------------*/

function trex_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<div class="nav-wrap cf">
		<nav id="nav-single">
			<div class="nav-previous"><?php previous_post_link( '%link', wp_kses_post( __( '<span class="meta-nav">Previous Post</span>%title', 'trex' ) )  ); ?></div>
			<div class="nav-next"><?php next_post_link('%link', wp_kses_post( __( '<span class="meta-nav">Next Post</span>%title', 'trex' ) ) ); ?></div>
		</nav><!-- #nav-single -->
	</div><!-- end .nav-wrap -->
	<?php
}


/*-----------------------------------------------------------------------------------*/
/* Extends the default WordPress body classes
/*-----------------------------------------------------------------------------------*/
function trex_body_class( $classes ) {

	if ( is_page_template( 'page-templates/front-page.php' ) ) {
		$classes[] = 'template-front';
	}

	if ( is_page_template( 'page-templates/full-width.php' ) ) {
		$classes[] = 'fullwidth';
	}
        
        if ( is_page_template( 'page-templates/full-width.php' ) ) {
		$classes[] = 'fullwidth';
	}

	if ( is_page_template( 'templates/acf.php' ) ) {
		$classes[] = '';
	}
	return $classes;
	

	if ( ! is_active_sidebar( 'blog-sidebar' ) ) {
		$classes[] = 'blog-fullwidth';
	}

	if ( is_page_template( 'page-templates/no-sidebar.php' ) ) {
		$classes[] = 'nosidebar';
	}


	return $classes;
}
add_filter( 'body_class', 'trex_body_class' );


function trex_footer_customize_register( $wp_customize ) {
   
}
add_action( 'customize_register', 'trex_footer_customize_register' );






function post_types_admin_order( $wp_query ) {
  if (is_admin()) {

    // Get the post type from the query
    $post_type = $wp_query->query['post_type'];

    if ( $post_type == 'short-posts') {

      $wp_query->set('orderby', 'date');

      $wp_query->set('order', 'DESC');
    }
  }
}
add_filter('pre_get_posts', 'post_types_admin_order');

// function for implementing posts from custom post type in tags and arhive 
function tagsCategory_add_custom_types( $query ) {
  if( (is_category() || is_tag()) && $query->is_archive() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'post', 'short_posts'
        ));
    }
    return $query;
}
add_filter( 'pre_get_posts', 'tagsCategory_add_custom_types' );


// removes name of custom post type in breadcrumbs

add_filter( 'wpseo_breadcrumb_single_link' ,'wpseo_remove_breadcrumb_link', 10 ,2);
function wpseo_remove_breadcrumb_link( $link_output , $link ){
    $text_to_remove = 'Short Posts';
  
    if( $link['text'] == $text_to_remove ) {
      $link_output = '';
    }
 
    return $link_output;
}



add_filter('pre_get_posts', 'limit_pages');
function limit_pages($query) {

    $query->max_num_pages = 5;
    if ($query->query_vars['paged'] > 5) {
        $query->query_vars['paged'] = 5;
        $query->query['paged'] = 5;
    }

    return $query;
}

function seo_pagination_meta(){

	if ( is_paged() ) { 
		$url  = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	    $a = explode("/page/", $url);
		echo '<meta name="robots" content="noindex,follow" />';
		echo '<link rel="canonical" href="'. $a[0] .'"/>';
	}

}




function image_alt_by_url($image_url) {
$image_id   = attachment_url_to_postid($image_url);
$alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
return $alt; 
}


function alter_author_wpse_84696() {
  if (!is_author()) return false;
  global $wp_query;
  $wp_query->set('posts_per_page', 50);
  $wp_query->set('post_type', array('post', 'wettanbieter', 'page' ));
}
add_action('pre_get_posts','alter_author_wpse_84696');


/**
 * Gravatar Alt Fix
 */
function gravatar_alt($text) {
    $alt = get_the_author_meta( 'display_name' );
    $text = str_replace('alt=\'\'', 'alt=\''.$alt.'\' title=\''.$alt.'\'',$text);
    return $text;
}
add_filter('get_avatar','gravatar_alt');


/*
 * Fix for Autor page query
 * 
 */

 /*function add_cpt_author( $query ) {
    if ( !is_admin() && $query->is_author() && $query->is_main_query() ) {
    $query->set( 'post_type', array('post', 'wettanbieter', 'page' ) );
    }
  }
  
  add_action( 'pre_get_posts', 'add_cpt_author' ); */


/*-----------------------------------------------------------------------------------*/
/* Customizer additions
/*-----------------------------------------------------------------------------------*/
require get_template_directory() . '/inc/customizer.php';

/*-----------------------------------------------------------------------------------*/
/* Load Jetpack compatibility file.
/*-----------------------------------------------------------------------------------*/
require get_template_directory() . '/inc/jetpack.php';

/*-----------------------------------------------------------------------------------*/
/* Grab the trex Custom widgets.
/*-----------------------------------------------------------------------------------*/
require( get_template_directory() . '/inc/widget-magazin.php' );

/*-----------------------------------------------------------------------------------*/
/* Grab the trex Custom shortcodes.
/*-----------------------------------------------------------------------------------*/
require( get_template_directory() . '/inc/shortcodes.php' );


/*-----------------------------------------------------------------------------------*/
/* Get custom post types
/*-----------------------------------------------------------------------------------*/
 require get_template_directory() . '/inc/cpt.php';

