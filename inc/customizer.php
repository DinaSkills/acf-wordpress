<?php
/**
 * trex Theme Customizer
 *
 * @package trex
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function trex_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
 
        $wp_customize->add_section( 'trex_themeoptions', array(
		'title'         => __( 'Theme Options', 'trex' ),
		'priority'      => 135,
	) );
        
        
	$wp_customize->add_section( 'footer_themeoptions', array(
		'title'         => __( 'Footer Options', 'trex' ),
		'priority'      => 136,
	) );
        
        
        
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'trex_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'trex_customize_partial_blogdescription',
			)
		);
	}
        
        
        // Add the custom settings and controls.

	$wp_customize->add_setting( 'header_background_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'refresh',
	) );

	// Custom Colors.

	// Link Color.
	$wp_customize->add_setting( 'link_color' , array(
			'default'     		=> '#555555',
			'sanitize_callback' => 'sanitize_hex_color',
		'transport'   		=> 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
		'label'		=> esc_html__( 'Link Color', 'trex' ),
		'section'	=> 'colors',
		'settings'	=> 'link_color',
	) ) );

	// Header Background Color.
	$wp_customize->add_setting( 'header_bg_color' , array(
			'default'     		=> '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
		'transport'   		=> 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_bg_color', array(
		'label'		=> __( 'Header Background Color', 'trex' ),
		'section'	=> 'colors',
		'settings'	=> 'header_bg_color',
	) ) );

	// Footer Background Color.
	$wp_customize->add_setting( 'footer_bg_color' , array(
			'default'     		=> '#1e1e24',
			'sanitize_callback' => 'sanitize_hex_color',
		'transport'   		=> 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bg_color', array(
		'label'		=> esc_html__( 'Footer Background Color', 'trex' ),
		'section'	=> 'colors',
		'settings'	=> 'footer_bg_color',
	) ) );

        
        // Theme Options.
	$wp_customize->add_setting( 'fixed_nav', array(
		'default'			=> '',
		'sanitize_callback' => 'trex_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'fixed_nav', array(
		'label'		=> esc_html__( 'Fixed-position main menu', 'trex' ),
		'description'	=> esc_html__( '(visible on wider screens only)', 'trex' ),
		'section'	=> 'trex_themeoptions',
		'type'		=> 'checkbox',
		'priority'	=> 1,
	) );

	$wp_customize->add_setting( 'show_headersearch', array(
		'default'      		=> '',
		'sanitize_callback' => 'trex_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'show_headersearch', array(
		'label'         => esc_html__( 'Show header search form', 'trex' ),
		'section'       => 'trex_themeoptions',
		'type'          => 'checkbox',
		'priority'		=> 2,
	) );

	

	$wp_customize->add_setting( 'small_logo', array(
		'default'       => '',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'small_logo', array(
		'label'         => esc_html__( 'Small logo image', 'trex' ),
		'description'	=> esc_html__( 'Show a small logo image in the main nav. The image height must be 34 pixels and the image width not bigger than 100px.', 'trex' ),
		'section'       => 'trex_themeoptions',
		'type'          => 'text',
		'priority'		=> 10,
	) );

	
        
          // Theme Options.
        
        $wp_customize->add_setting( 'footer_text', array(
		'default'       => '',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'footer_text', array(
		'label'         => esc_html__( 'Footer credit text', 'trex' ),
		'description'	=> esc_html__( 'Customize the footer credit text. (HTML is allowed)', 'trex' ),
		'section'       => 'footer_themeoptions',
		'type'          => 'text',
		'priority'		=> 11,
	) );
        
        
         $wp_customize->add_setting( 'home_heading', array(
		'default'       => '',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'home_heading', array(
		'label'         => esc_html__( 'Partner/Region(Home region/partner)', 'trex' ),
		'description'	=> esc_html__( 'Customize text for link anchor.This reloads the site, no custom link', 'trex' ),
		'section'       => 'footer_themeoptions',
		'type'          => 'text',
		'priority'		=> 11,
	) );
        
         $wp_customize->add_setting( 'link_1_heading', array(
		'default'       => '',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'link_1_heading', array(
		'label'         => esc_html__( 'Partner/Region 1', 'trex' ),
		'description'	=> esc_html__( 'Customize text for link anchor.', 'trex' ),
		'section'       => 'footer_themeoptions',
		'type'          => 'text',
		'priority'		=> 12,
	) ); 
        
       $wp_customize->add_setting( 'footer_link_1', array(
		'default'       => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
       

	$wp_customize->add_control( 'footer_link_1', array(
		'label'         => esc_html__( 'Link 1', 'trex' ),
		'description'	=> esc_html__( 'Link for select options in footer', 'trex' ),
		'section'       => 'footer_themeoptions',
		'type'          => 'text',
		'priority'		=> 13,
	) );
        
        
        $wp_customize->add_setting( 'link_2_heading', array(
		'default'       => '',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'link_2_heading', array(
		'label'         => esc_html__( 'Partner/Region 2', 'trex' ),
		'description'	=> esc_html__( 'Customize text for link anchor.', 'trex' ),
		'section'       => 'footer_themeoptions',
		'type'          => 'text',
		'priority'		=> 14,
	) ); 
        
        $wp_customize->add_setting( 'footer_link_2', array(
		'default'       => '',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'footer_link_2', array(
		'label'         => esc_html__( 'Link 2', 'trex' ),
		'description'	=> esc_html__( 'Link for select options in footer', 'trex' ),
		'section'       => 'footer_themeoptions',
		'type'          => 'text',
		'priority'		=> 15,
	) );
        
        
        
        $wp_customize->add_setting( 'link_3_heading', array(
		'default'       => '',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'link_3_heading', array(
		'label'         => esc_html__( 'Partner/Region 3', 'trex' ),
		'description'	=> esc_html__( 'Customize text for link anchor.', 'trex' ),
		'section'       => 'footer_themeoptions',
		'type'          => 'text',
		'priority'		=> 16,
	) ); 
        
        $wp_customize->add_setting( 'footer_link_3', array(
		'default'       => '',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'footer_link_3', array(
		'label'         => esc_html__( 'Link 3', 'trex' ),
		'description'	=> esc_html__( 'Link for select options in footer', 'trex' ),
		'section'       => 'footer_themeoptions',
		'type'          => 'text',
		'priority'		=> 17,
	) );


}
add_action( 'customize_register', 'trex_customize_register' );

/**
 * Sanitize Checkboxes.
 */
function trex_sanitize_checkbox( $input ) {
	if ( 1 == $input ) {
		return true;
	} else {
		return false;
	}
}



/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function trex_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function trex_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function trex_customize_preview_js() {
	wp_enqueue_script( 'trex-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'trex_customize_preview_js' );



