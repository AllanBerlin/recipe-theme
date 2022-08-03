<?php

/**
 * Allow svg upload
 *
 * @param $mimes
 * @return mixed
 */
function recipe_custom_mtypes( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  $mimes['svgz'] = 'image/svg+xml';

  return $mimes;
}
add_filter( 'upload_mimes', 'recipe_custom_mtypes' );


/**
 * Remove wordpress default image sizes.
 *
 * @param $sizes
 * @return mixed
 */
function recipe_remove_default_images( $sizes ) {
  unset( $sizes['small']); // 150px
  unset( $sizes['medium']); // 300px
  unset( $sizes['medium_large']); // 768px
  unset( $sizes['large']); // 1024px

  return $sizes;

}
add_filter( 'intermediate_image_sizes_advanced', 'recipe_remove_default_images' );


/**
 * Collapse Admin Menu by default
 */
function recipe_collapse_admin_menu() {
  set_user_setting('mfold', 't');
}
add_action('admin_init', 'recipe_collapse_admin_menu');


/**
 * This function adds page name as class to body
 *
 * @param $classes
 * @return mixed
 */
function recipe_page_body_class( $classes ) {
  global $post;

  if ( isset( $post ) && is_page() ) {
    $classes[] = 'page-' . $post->post_name;
  }

  return $classes;
}
add_filter( 'body_class', 'recipe_page_body_class' );


/**
 * This function removes the default post class
 *
 * @param $classes
 * @return array
 */
function recipe_remove_postclasses( $classes ) {
  $classes = array_diff( $classes, array(
    'post',
  ) );
  return $classes;
}
add_filter( 'post_class', 'recipe_remove_postclasses', 10, 3 );


/**
 * Remove the h1 & h2 tags from the WordPress editor.
 *
 * @param $tags
 * @return mixed
 */
function recipe_format_TinyMCE( $tags ) {
  $tags[ 'block_formats' ] = "Paragraph=p; Heading 3=h3; Heading 4=h4; Heading 5=h5; Heading 6=h6";

  return $tags;
}
add_filter( 'tiny_mce_before_init', 'recipe_format_TinyMCE' );


/**
 * Helper function to allow only certain html tags from the wysiwyg editor
 *
 * @return array
 */
function recipe_allowed_html_types( ): array {
  return [
    'h3'     => [],
    'h4'     => [],
    'h5'     => [],
    'h6'     => [],
    'br'     => [],
    'em'     => [],
    'strong' => [],
    'p'      => [],
    'ul'      => [],
    'li'      => [],
    'span'   => [
      'class' => [],
    ],
    'a'      => [
      'class' => [],
      'href'  => [],
      'rel'   => [],
      'title' => [],
    ]
  ];
}
add_action( 'init', 'recipe_allowed_html_types' );


/**
 * Clean up string to remove any html attributes
 *
 * @param $text
 * @return string|string[]|null
 */
function recipe_clean_text( $text ) {
  $text = preg_replace( '/<([a-z][a-z0-9]*)[^>]*?(\/?)>/i','<$1$2>', $text );

  return $text;
}


/**
 * Replaces all spaces with hyphens and removes special chars.
 *
 * @param $string
 * @return string|string[]|null
 */
function recipe_remove_special_chars( $string ) {
  $string = str_replace( ' ', '-', $string );
  $string = preg_replace( '/[^A-Za-z0-9\-]/', '', $string );
  $string = strtolower( $string );

  return preg_replace( '/-+/', '-', $string );
}


/**
 * Fix svg images that the dimensions can be extracted
 *
 * @param $image
 * @param $attachment_id
 * @param $size
 * @param $icon
 * @return array|mixed
 */
function recipe_fix_wp_get_attachment_image_svg( $image, $size ) {
  if ( is_array( $image ) && preg_match('/\.svg$/i', $image[0]) && $image[1] == 0 ) {
    if( is_array( $size ) ) {
      $image[1] = $size[0];
      $image[2] = $size[1];
    } elseif( ( $xml = simplexml_load_file( $image[0] ) ) !== false ) {

      $attr = $xml->attributes();

      $viewbox = explode( ' ', $attr->viewBox );
      $image[1] = isset( $attr->width ) && preg_match('/\d+/', $attr->width, $value ) ? ( int ) $value[0] : ( count( $viewbox ) == 4 ? ( int ) $viewbox[2] : null );
      $image[2] = isset( $attr->height ) && preg_match('/\d+/', $attr->height, $value ) ? ( int ) $value[0] : ( count( $viewbox ) == 4 ? ( int ) $viewbox[3] : null );
    } else {
      $image[1] = $image[2] = null;
    }
  }
  return $image;
}
add_filter( 'wp_get_attachment_image_src', 'recipe_fix_wp_get_attachment_image_svg', 10, 4 );

