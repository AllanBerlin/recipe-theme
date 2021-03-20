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
 * This function adds custom class to body on play overview page
 *
 * @param $classes
 * @return mixed
 */
function recipe_play_body_class( $classes ) {
  if ( is_page_template( 'page-play.php' ) ) {
    $classes[] = 'page-play';
  }

  return $classes;
}
add_filter( 'body_class','recipe_play_body_class' );


/**
 * This function adds custom class to body on work overview page
 *
 * @param $classes
 * @return mixed
 */
function recipe_work_body_class( $classes ) {
  if ( is_front_page() ) {
    $classes[] = 'page-work';
  }

  return $classes;
}
add_filter( 'body_class','recipe_work_body_class' );


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
