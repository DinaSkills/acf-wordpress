<?php
/**
 * Available trex Shortcodes
 *
 *
 * @package trex
 * @since trex 1.0
 * @version 1.0
 */

/*-----------------------------------------------------------------------------------*/
/* trex Shortcodes
/*-----------------------------------------------------------------------------------*/
// Enable shortcodes in widget areas
add_filter( 'widget_text', 'do_shortcode' );

// Replace WP autop formatting
if (!function_exists( "trex_remove_wpautop")) {
	function trex_remove_wpautop($content) {
		$content = do_shortcode( shortcode_unautop( $content ) );
		$content = preg_replace( '#^<\/p>|^<br \/>|<p>$#', '', $content);
		return $content;
	}
}

/*-----------------------------------------------------------------------------------*/
/* Multi Columns Shortcodes
/* Don't forget to add "_last" behind the shortcode if it is the last column.
/*-----------------------------------------------------------------------------------*/

// Two Columns
function trex_shortcode_two_columns_one( $atts, $content = null ) {
   return '<div class="two-columns-one">' . trex_remove_wpautop($content) . '</div>';
}
add_shortcode( 'two_columns_one', 'trex_shortcode_two_columns_one' );

function trex_shortcode_two_columns_one_last( $atts, $content = null ) {
   return '<div class="two-columns-one last">' . trex_remove_wpautop($content) . '</div>';
}
add_shortcode( 'two_columns_one_last', 'trex_shortcode_two_columns_one_last' );

// Three Columns
function trex_shortcode_three_columns_one($atts, $content = null) {
   return '<div class="three-columns-one">' . trex_remove_wpautop($content) . '</div>';
}
add_shortcode( 'three_columns_one', 'trex_shortcode_three_columns_one' );

function trex_shortcode_three_columns_one_last($atts, $content = null) {
   return '<div class="three-columns-one last">' . trex_remove_wpautop($content) . '</div>';
}
add_shortcode( 'three_columns_one_last', 'trex_shortcode_three_columns_one_last' );

function trex_shortcode_three_columns_two($atts, $content = null) {
   return '<div class="three-columns-two">' . trex_remove_wpautop($content) . '</div>';
}
add_shortcode( 'three_columns_two', 'trex_shortcode_three_columns_two' );

function trex_shortcode_three_columns_two_last($atts, $content = null) {
   return '<div class="three-columns-two last">' . trex_remove_wpautop($content) . '</div>';
}
add_shortcode( 'three_columns_two_last', 'trex_shortcode_three_columns_two_last' );

// Four Columns
function trex_shortcode_four_columns_one($atts, $content = null) {
   return '<div class="four-columns-one">' . trex_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_one', 'trex_shortcode_four_columns_one' );

function trex_shortcode_four_columns_one_last($atts, $content = null) {
   return '<div class="four-columns-one last">' . trex_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_one_last', 'trex_shortcode_four_columns_one_last' );

function trex_shortcode_four_columns_two($atts, $content = null) {
   return '<div class="four-columns-two">' . trex_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_two', 'trex_shortcode_four_columns_two' );

function trex_shortcode_four_columns_two_last($atts, $content = null) {
   return '<div class="four-columns-two last">' . trex_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_two_last', 'trex_shortcode_four_columns_two_last' );

function trex_shortcode_four_columns_three($atts, $content = null) {
   return '<div class="four-columns-three">' . trex_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_three', 'trex_shortcode_four_columns_three' );

function trex_shortcode_four_columns_three_last($atts, $content = null) {
   return '<div class="four-columns-three last">' . trex_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_three_last', 'trex_shortcode_four_columns_three_last' );


// Divide Text Shortcode
function trex_shortcode_divider($atts, $content = null) {
   return '<div class="divider"></div>';
}
add_shortcode( 'divider', 'trex_shortcode_divider' );


/*-----------------------------------------------------------------------------------*/
/* Info Boxes Shortcodes
/*-----------------------------------------------------------------------------------*/

function trex_shortcode_white_box($atts, $content = null) {
   return '<div class="box white-box">' . do_shortcode( trex_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'white_box', 'trex_shortcode_white_box' );

function trex_shortcode_yellow_box($atts, $content = null) {
   return '<div class="box yellow-box">' . do_shortcode( trex_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'yellow_box', 'trex_shortcode_yellow_box' );

function trex_shortcode_red_box($atts, $content = null) {
   return '<div class="box red-box">' . do_shortcode( trex_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'red_box', 'trex_shortcode_red_box' );

function trex_shortcode_blue_box($atts, $content = null) {
   return '<div class="box blue-box">' . do_shortcode( trex_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'blue_box', 'trex_shortcode_blue_box' );

function trex_shortcode_green_box($atts, $content = null) {
   return '<div class="box green-box">' . do_shortcode( trex_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'green_box', 'trex_shortcode_green_box' );

function trex_shortcode_lightgrey_box($atts, $content = null) {
   return '<div class="box lightgrey-box">' . do_shortcode( trex_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'lightgrey_box', 'trex_shortcode_lightgrey_box' );

function trex_shortcode_grey_box($atts, $content = null) {
   return '<div class="box grey-box">' . do_shortcode( trex_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'grey_box', 'trex_shortcode_grey_box' );

function trex_shortcode_dark_box($atts, $content = null) {
   return '<div class="box dark-box">' . do_shortcode( trex_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'dark_box', 'trex_shortcode_dark_box' );


/*-----------------------------------------------------------------------------------*/
/* Buttons Shortcodes
/*-----------------------------------------------------------------------------------*/
function trex_button( $atts, $content = null ) {
    extract(shortcode_atts(array(
    'link'	=> '#',
    'target' => '',
      'rel' => '',
    'color'	=> '',
    'size'	=> '',
	 'form'	=> '',
	 'font'	=> '',
    ), $atts));

	$color = ($color) ? ' '.$color. '-btn' : '';
	$size = ($size) ? ' '.$size. '-btn' : '';
	$form = ($form) ? ' '.$form. '-btn' : '';
	$font = ($font) ? ' '.$font. '-btn' : '';
	$target = ($target == 'blank') ? ' target="_blank"' : '';
        $rel = ($rel == 'nofollow') ? ' rel="nofollow noopener noreferrer"' : '';
	$out = '<a' .$target.$rel. ' class="standard-btn' .$color.$size.$form.$font. '" href="' .$link. '"><span>' .do_shortcode($content). '</span></a>';

    return $out;
}
add_shortcode('button', 'trex_button');

