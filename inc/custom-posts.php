<?php


/**
 * Register a custom post type called "service".
 */
function herbst_custom_post_type_service() {
  $labels = array(
    'name'                  => _x( 'Service', 'herbst' ),
    'singular_name'         => _x( 'Service', 'herbst' ),
    'menu_name'             => _x( 'Service', 'herbst' ),
    'name_admin_bar'        => _x( 'Service', 'herbst' ),
    'add_new'               => _x( 'Add New', 'herbst' ),
    'add_new_item'          => _x( 'Add New Service Item', 'herbst' ),
    'new_item'              => _x( 'New Service Item', 'herbst' ),
    'edit_item'             => _x( 'Edit Service Item', 'herbst' ),
    'view_item'             => _x( 'View Service Item', 'herbst' ),
    'all_items'             => _x( 'All Service Items', 'herbst' ),
    'search_items'          => _x( 'Search Service Items', 'herbst' ),
    'parent_item_colon'     => _x( 'Parent Service Item:', 'herbst' ),
    'not_found'             => _x( 'No Service Items found.', 'herbst' ),
    'not_found_in_trash'    => _x( 'No Service Items found in Trash.', 'herbst' ),
    'featured_image'        => _x( 'Service Cover Image', 'herbst' ),
    'set_featured_image'    => _x( 'Set Service image', 'herbst' ),
    'remove_featured_image' => _x( 'Remove Service image', 'herbst' ),
    'use_featured_image'    => _x( 'Use as Service image', 'herbst' ),
    'archives'              => _x( 'Service archives', 'herbst' ),
    'insert_into_item'      => _x( 'Insert into Service Item', 'herbst' ),
    'uploaded_to_this_item' => _x( 'Uploaded to this Service Item', 'herbst' ),
    'filter_items_list'     => _x( 'Filter Service Items list', 'herbst' ),
    'items_list_navigation' => _x( 'Service list navigation', 'herbst' ),
    'items_list'            => _x( 'Service list', 'herbst' ),
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'capability_type'    => 'post',
    'has_archive'        => false,
    'menu_position'      => 7,
    'menu_icon'          => 'dashicons-thumbs-up',
    'supports'           => array( 'title', 'thumbnail'),
    'hierarchical'       => true,
    '_builtin'           => false,
    'rewrite'            => array( 'slug' => 'service', 'with_front' => true )
  );

  register_post_type( 'service', $args );
}
add_action( 'init', 'herbst_custom_post_type_service' );


/**
 * Register a custom taxonomy for the post type called "service".
 */
function herbst_custom_service_taxonomies() {
  $labels = array(
    'name'              => _x( 'Service Categories', 'herbst' ),
    'singular_name'     => _x( 'Service Category', 'herbst' ),
    'search_items'      => _x( 'Search Service Categories', 'herbst'  ),
    'all_items'         => _x( 'All Service Categories', 'herbst'  ),
    'parent_item'       => _x( 'Parent Service Categories', 'herbst'  ),
    'parent_item_colon' => _x( 'Parent Service Category:', 'herbst'  ),
    'edit_item'         => _x( 'Edit Service Category', 'herbst'  ),
    'update_item'       => _x( 'Update Service Category', 'herbst'  ),
    'add_new_item'      => _x( 'Add New Service Category', 'herbst'  ),
    'new_item_name'     => _x( 'New Service Category', 'herbst'  ),
  );

  register_taxonomy('service_categories', array('service'), array(
    'hierarchical'        => true,
    'labels'              => $labels,
    'show_ui'             => true,
    'query_var'           => true,
    'show_in_nav_menus'   => true,
    'rewrite'             => array( 'slug' => 'service-categories', 'with_front' => false ),
  ));

}
//add_action('init' , 'herbst_custom_service_taxonomies' );


/**
 * This function adds custom service post type links
 */
function herbst_service_post_type_link( $link, $post ) {
  if ( $post->post_type === 'service' ) {
    if ( $terms = get_the_terms( $post->ID, 'service_categories' ) )
      $link = str_replace( '%service_categories%', current( $terms )->slug, $link );
    else
      $link = str_replace( '%service_categories%', 'editorial', $link );
  }

  return $link;
}
//add_filter( 'post_type_link', 'herbst_service_post_type_link', 10, 2 );


/**
 * Remove Posts from the admin menu
 */
function herbst_remove_posts_from_menu() {
  remove_menu_page('edit.php');
}
//add_action( 'admin_menu', 'herbst_remove_posts_from_menu' );


/**
 * Remove New post link from the admin bar
 */
function herbst_remove_wp_node_new_post() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_node( 'new-post' );
}
//add_action( 'admin_bar_menu', 'herbst_remove_wp_node_new_post', 999 );