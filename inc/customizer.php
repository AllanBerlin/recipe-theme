<?php
/**
 * herbst Theme Customizer.
 *
 * @package herbst
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function herbst_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'herbst_customize_register' );


/**
 * Options for WordPress Theme Customizer.
 */
function herbst_customizer( $wp_customize ) {

	//=============================================================
	// Remove header image, background styles and custom css from theme customizer
	//=============================================================
	$wp_customize->remove_control('header_image');
	$wp_customize->remove_section('background_image');
  $wp_customize->remove_section('custom_css');


	/**
	 * Main Colour Section
	 **/
	$wp_customize->add_section( 'theme_colours' , array(
		'title'      => 'Theme Colours',
		'priority'   => 30,
	) );

	// Main Colour
	$wp_customize->add_setting( 'primary_colour' , array(
		'default'     			=> '#8ac6d1',
		'sanitize_callback' => 'herbst_sanitize_hexcolor',
		'transport'   			=> 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_colour', array(
		'label'      => 'Primary Colour',
		'section'    => 'theme_colours',
		'settings'   => 'primary_colour',
	) ) );

	// Second Colour
	$wp_customize->add_setting( 'second_colour' , array(
		'default'     			=> '#bbded6',
		'sanitize_callback' => 'herbst_sanitize_hexcolor',
		'transport'   			=> 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'second_colour', array(
		'label'      => 'Second Colour',
		'section'    => 'theme_colours',
		'settings'   => 'second_colour',
	) ) );

	// Third Colour
	$wp_customize->add_setting( 'third_colour' , array(
		'default'     			=> '#fae3d9',
		'sanitize_callback' => 'herbst_sanitize_hexcolor',
		'transport'   			=> 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'third_colour', array(
		'label'      => 'Third Colour',
		'section'    => 'theme_colours',
		'settings'   => 'third_colour',
	) ) );

	// Fourth Colour
	$wp_customize->add_setting( 'fourth_colour' , array(
		'default'     			=> '#ffb6b9',
		'sanitize_callback' => 'herbst_sanitize_hexcolor',
		'transport'   			=> 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fourth_colour', array(
		'label'      => 'Fourth Colour',
		'section'    => 'theme_colours',
		'settings'   => 'fourth_colour',
	) ) );

}
add_action( 'customize_register', 'herbst_customizer' );


/**
 * Sanitize url for WordPress customizer
 */
function herbst_sanitize_url( $url ) {
  return esc_url_raw( $url );
}

/**
 * Adds sanitization callback function: Strip Slashes
 */
function herbst_sanitize_strip_slashes($input) {
	return wp_kses_stripslashes($input);
}

/**
 * Sanitize checkbox for WordPress customizer
 */
function herbst_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}

/**
 * Adds sanitization callback function: colors
 */
function herbst_sanitize_hexcolor($color) {
	if ($unhashed = sanitize_hex_color_no_hash($color))
		return '#' . $unhashed;
	return $color;
}

/**
 * Adds sanitization callback function: Slider Category
 */
function herbst_sanitize_slidecat( $input ) {

	if ( array_key_exists( $input, herbst_cats()) ) {
		return $input;
	} else {
		return '';
	}
}

/**
 * Adds sanitization callback function: Radio Header
 */
function herbst_sanitize_radio_header( $input ) {
	global $header_show;
	if ( array_key_exists( $input, $header_show ) ) {
		return $input;
	} else {
		return '';
	}
}

/**
 * Adds sanitization callback function: Number
 */
function herbst_sanitize_number($input) {
	if ( isset( $input ) && is_numeric( $input ) ) {
		return $input;
	}
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function herbst_customize_preview_js() {
	wp_enqueue_script( 'herbst_customizer', get_template_directory_uri() . '/js/customizer.min.js', array( 'customize-preview' ), '20170809', true );
}
add_action( 'customize_preview_init', 'herbst_customize_preview_js' );
