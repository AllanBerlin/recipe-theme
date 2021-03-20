<?php

/**
 * Function to add Meta Tags in Header without Plugin
 */
function recipe_add_meta_tags() {
  $url = esc_url( get_permalink() );

  if ( is_front_page() ) {
    $title = get_bloginfo('name');
    $description = get_bloginfo('description');
    $image = get_template_directory_uri() . '';
    $imageWidth = '';
    $imageHeight = '';
  } else {
    $title = get_the_title();
    $description = sanitize_text_field( get_field('headline') );
    $mainImage = get_field('main_image');

    if( !$mainImage ) {
      $image = get_template_directory_uri() . '';
      $imageWidth = '';
      $imageHeight = '';
    } else {
      $image = $mainImage['url'];
      $imageWidth = $mainImage['width'];
      $imageHeight = $mainImage['height'];
    }
  }

  echo "<meta property='og:site_name' content='$title' />";
  echo "<meta property='og:title' content='$title' />";
  echo "<meta property='og:description' content='$description' />";
  echo "<meta property='og:url' content='$url' />";
  echo '<meta property="og:type" content="article" />';
  echo "<meta property='og:image' content='$image' />";
  echo "<meta property='og:image:width' content='$imageWidth' />";
  echo "<meta property='og:image:height' content='$imageHeight' />";

  echo "<meta name='twitter:card' content='$title' />";
  echo "<meta name='twitter:site' content='$title' />";
  echo "<meta name='twitter:url' content='$url' />";
  echo "<meta name='twitter:title' content='$title' />";
  echo "<meta name='twitter:image' content='$image' />";
}
add_action( 'wp_head', 'recipe_add_meta_tags' );