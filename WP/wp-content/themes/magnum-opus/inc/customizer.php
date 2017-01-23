<?php
/**
 * Magnum Opus Theme Customizer.
 *
 * @package Magnum_Opus
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function magnumopus_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/* Theme options panel */
	$wp_customize->add_panel( 'magnumopus_theme_options', array(
		'priority'			=> 200,
		'title'				=> esc_html__( 'Theme Options', 'magnum-opus' ),
		'description'		=> esc_html__( 'This theme supports a number of options which you can set using this panel.', 'magnum-opus' ),
	) );

	/* Theme options front page section */
	$wp_customize->add_section( 'magnumopus_front_page_options', array(
		'title'				=> esc_html__( 'Front Page Options', 'magnum-opus' ),
		'priority'			=> 10,
		'panel'				=> 'magnumopus_theme_options',
		'description'		=> esc_html__( 'To customize the appearance of pages using the front page template adjust any of the settings below.', 'magnum-opus' ),
	) );

	/* Theme options footer section */
	$wp_customize->add_section( 'magnumopus_footer_options', array(
		'title'				=> esc_html__( 'Footer Options', 'magnum-opus' ),
		'priority'			=> 20,
		'panel'				=> 'magnumopus_theme_options',
		'description'		=> esc_html__( 'Replace the default copyright text.', 'magnum-opus' ),
	) );

	/* The number of portfolio items to be shown. */
	$wp_customize->add_setting( 'magnumopus_portfolio_limit', array(
		'default'			=> 9,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback' => 'magnumopus_sanatize_integer',
	) );
	$wp_customize->add_control( 'magnumopus_portfolio_limit', array(
		'label'				=> esc_html__( 'Number of portfolio items: ', 'magnum-opus' ),
		'section'			=> 'magnumopus_front_page_options',
		'priority'			=> 1,
	) );

	/* Adjust the portfolio link text. */
	$wp_customize->add_setting( 'magnumopus_portfolio_read_more', array(
		'default'			=> 'Discover more',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback' => 'magnumopus_sanatize_text',
	) );
	$wp_customize->add_control( 'magnumopus_portfolio_read_more', array(
		'label'				=> esc_html__( 'The text of the portfolio read more link: ', 'magnum-opus' ),
		'section'			=> 'magnumopus_front_page_options',
		'priority'			=> 2,
	) );

	/* The number of featured items to be shown. */
	$wp_customize->add_setting( 'magnumopus_featured_limit', array(
		'default'			=> 3,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback' => 'magnumopus_sanatize_integer',
	) );
	$wp_customize->add_control( 'magnumopus_featured_limit', array(
		'label'				=> esc_html__( 'Number of featured items: ', 'magnum-opus' ),
		'section'			=> 'magnumopus_front_page_options',
		'priority'			=> 3,
	) );

	/* Adjust the portfolio link text. */
	$wp_customize->add_setting( 'magnumopus_featured_read_more', array(
		'default'			=> esc_html__( 'Read more', 'magnum-opus' ),
		'capability'		=> 'edit_theme_options',
		'sanitize_callback' => 'magnumopus_sanatize_text',
	) );
	$wp_customize->add_control( 'magnumopus_featured_read_more', array(
		'label'				=> esc_html__( 'The text of the featured read more link: ', 'magnum-opus' ),
		'section'			=> 'magnumopus_front_page_options',
		'priority'			=> 4,
	) );

	/* Add a featured background image to the "sidekick" content area. */
	$wp_customize->add_setting( 'magnumopus_sidekick_featured_image', array(
		'default'              => '',
		'capability'		   => 'edit_theme_options',
		'sanitize_callback'    => 'attachment_url_to_postid',
		'sanitize_js_callback' => 'attachment_url_to_postid',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'magnumopus_sidekick_featured_image', array(
		'label'				=> esc_html__( 'Background image of the content:', 'magnum-opus' ),
		'section'			=> 'magnumopus_front_page_options',
		'priority'			=> 5,
	) ) );

	/* The number of testimonial items to be shown. */
	$wp_customize->add_setting( 'magnumopus_testimonial_limit', array(
		'default'			=> 3,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback' => 'magnumopus_sanatize_integer',
	) );
	$wp_customize->add_control( 'magnumopus_testimonial_limit', array(
		'label'				=> esc_html__( 'Number of featured items: ', 'magnum-opus' ),
		'section'			=> 'magnumopus_front_page_options',
		'priority'			=> 3,
	) );

	/* Custom copyright text. */
	$wp_customize->add_setting( 'magnumopus_custom_copyright', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'magnumopus_custom_copyright', array(
		'label'				=> esc_html__( 'Your custom copyright text: ', 'magnum-opus' ),
		'section'			=> 'magnumopus_footer_options',
		'priority'			=> 1,
	) );

}
add_action( 'customize_register', 'magnumopus_customize_register' );

/**
 * Sanitize integer.
 *
 * @param string $int.
 * @return string.
 */
function magnumopus_sanatize_integer( $int ) {
	if ( empty( $int ) || ! ctype_digit( $int ) ) {
		$int = 9;
	}
	else {
		$int = absint( $int );
	}

	return $int;
}

/**
 * Sanitize text.
 *
 * @param string $input.
 * @return string.
 */
function magnumopus_sanatize_text( $text ) {
	if ( empty( $text ) ) {
		$text = 'Discover more';
	}
	wp_kses( $text );

	return $text;
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function magnumopus_customize_preview_js() {
	wp_enqueue_script( 'magnumopus_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'magnumopus_customize_preview_js' );
