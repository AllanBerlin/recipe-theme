<?php

/**
 * This function adds the Newsletter Content to admin menu.
 */
function recipe_acf_add_newsletter_edit_page() {
  // Check function exists.
  if( function_exists('acf_add_options_page') ) {

    // Register options page.
    $option_page = acf_add_options_page(array(
      'page_title'    => __('Newsletter Content'),
      'menu_title'    => __('Newsletter'),
      'menu_slug'     => 'newsletter-content',
      'capability'    => 'edit_posts',
      'position'      => 8,
      'parent_slug'   => '',
      'icon_url'      => 'dashicons-email-alt',
      'redirect'      => false
    ));
  }
}
add_action('acf/init', 'recipe_acf_add_newsletter_edit_page');

/**
 * Add custom styles for the acf backend
 */
function recipe_load_admin_styles() {
  wp_enqueue_style( 'admin-styles', get_template_directory_uri() . '/admin-css/main.min.css' );
}
add_action( 'admin_enqueue_scripts', 'recipe_load_admin_styles' );