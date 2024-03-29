<?php

/**
 * Collection of the following clean up tasks in the HTML head element:
 * - Remove unnecessary extra feed links
 * - Remove RSD link
 * - Remove WLW link
 * - Remove Adjacent Posts link
 * - Remove WP Emoji Scripts and Styles
 * - Remove WP Generator Meta Data
 * - Remove WP Shortlink
 * - Remove WP OEmbed Links and JS
 * - Remove REST Output Link
 * - Disable WP hard-coded CSS
 * - Disable use of XML-RPC
 * - Remove X-Pingback header for single post/page
 * - Only display media in style tags if it makes sense
 * - Remove type='text/javascript' from script tags and replace single quotes with double quotes
 *
 *
 * Remove unnecessary <link>'s
 * Remove inline CSS and JS from WP emoji support
 * Remove inline CSS used by Recent Comments widget
 * Remove inline CSS used by posts with galleries
 * Remove self-closing tag
 *
 */
add_action('init', function () {
  remove_action('wp_head', 'feed_links_extra', 3);
  add_action('wp_head', 'ob_start', 1, 0);
  add_action('wp_head', function () {
    $pattern = '/.*' . preg_quote(esc_url(get_feed_link('comments_' . get_default_feed())), '/') . '.*[\r\n]+/';
    echo preg_replace($pattern, '', ob_get_clean());
  }, 3, 0);
  remove_action('wp_head', 'rsd_link');
  remove_action('wp_head', 'wlwmanifest_link');
  remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
  remove_action('wp_head', 'wp_generator');
  remove_action('wp_head', 'wp_shortlink_wp_head', 10);
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('admin_print_scripts', 'print_emoji_detection_script');
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_action('admin_print_styles', 'print_emoji_styles');
  remove_action('wp_head', 'wp_oembed_add_discovery_links');
  remove_action('wp_head', 'wp_oembed_add_host_js');
  remove_action('wp_head', 'rest_output_link_wp_head', 10);
  remove_filter('the_content_feed', 'wp_staticize_emoji');
  remove_filter('comment_text_rss', 'wp_staticize_emoji');
  remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
  add_filter( 'xmlrpc_enabled', '__return_false' );
  add_filter('pings_open', '__return_false', PHP_INT_MAX);
  add_filter('use_default_gallery_style', '__return_false');
  add_filter('emoji_svg_url', '__return_false');
});


/**
 * Clean up output of stylesheet <link> tags
 *
 * @param $input
 * @return string
 */
function recipe_restyle_loader_tag( $input ) {
  preg_match_all( "!<link rel='stylesheet'\s?(id='[^']+')?\s+href='(.*)' type='text/css' media='(.*)' />!", $input, $matches );

  if( empty( $matches[ 2 ] ) ) {
    return $input;
  }

  // Only display media if it is meaningful
  $media = $matches[ 3 ][ 0 ] !== '' && $matches[ 3 ][ 0 ] !== 'all' ? ' media="' . $matches[ 3 ][ 0 ] . '"' : '';

  return '<link rel="stylesheet" href="' . $matches[ 2 ][ 0 ] . '"' . $media . '>' . "\n";
}
add_filter('style_loader_tag', 'recipe_restyle_loader_tag');


/**
 * Remove version from scripts and styles
 *
 * @param $src
 * @return bool|mixed|string
 */
function recipe_remove_version_scripts_styles( $src ) {
  if( strpos( $src, 'ver=' )) {
    $src = remove_query_arg( 'ver', $src );
  }

  return $src;
}
add_filter( 'style_loader_src', 'recipe_remove_version_scripts_styles', 9999 );
add_filter( 'script_loader_src', 'recipe_remove_version_scripts_styles', 9999 );