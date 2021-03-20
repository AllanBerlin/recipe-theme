<?php

/**
 * This function adds the About Me Content to admin menu.
 */
function herbst_acf_add_about_me_edit_page() {
  // Check function exists.
  if( function_exists('acf_add_options_page') ) {

    // Register options page.
    $option_page = acf_add_options_page(array(
      'page_title'    => __('About Me Content'),
      'menu_title'    => __('Me'),
      'menu_slug'     => 'about-me-content',
      'capability'    => 'edit_posts',
      'position'      => 9,
      'parent_slug'   => '',
      'icon_url'      => 'dashicons-universal-access',
      'redirect'      => false
    ));
  }
}
//add_action('acf/init', 'herbst_acf_add_about_me_edit_page');


/**
 * Add custom styles for the acf backend
 */
function herbst_acf_backend_styles() {
  ?>
  <style type="text/css">
    .acf-flexible-content .layout[data-layout="content_grid"] .acf-fields {
      display: flex;
      flex-flow: row wrap;
      justify-content: flex-start;
    }

    .acf-flexible-content .layout[data-layout="content_grid"] .acf-field[data-name="grid_type"],
    .acf-flexible-content .layout[data-layout="content_grid"] .acf-field[data-name="grid_alignment"] {
      flex: 0 0 100%;
    }

    .acf-flexible-content .layout[data-layout="content_grid"] .acf-field.column {
      flex: 0 0 50%;
    }
  </style>
  <?php
}
add_action('acf/input/admin_head', 'herbst_acf_backend_styles');