<?php


/**
 * Register a custom post type called "service".
 */
function recipe_custom_post_type_service() {
  $labels = array(
    'name'                  => _x( 'Service', 'recipe' ),
    'singular_name'         => _x( 'Service', 'recipe' ),
    'menu_name'             => _x( 'Service', 'recipe' ),
    'name_admin_bar'        => _x( 'Service', 'recipe' ),
    'add_new'               => _x( 'Add New', 'recipe' ),
    'add_new_item'          => _x( 'Add New Service Item', 'recipe' ),
    'new_item'              => _x( 'New Service Item', 'recipe' ),
    'edit_item'             => _x( 'Edit Service Item', 'recipe' ),
    'view_item'             => _x( 'View Service Item', 'recipe' ),
    'all_items'             => _x( 'All Service Items', 'recipe' ),
    'search_items'          => _x( 'Search Service Items', 'recipe' ),
    'parent_item_colon'     => _x( 'Parent Service Item:', 'recipe' ),
    'not_found'             => _x( 'No Service Items found.', 'recipe' ),
    'not_found_in_trash'    => _x( 'No Service Items found in Trash.', 'recipe' ),
    'featured_image'        => _x( 'Service Cover Image', 'recipe' ),
    'set_featured_image'    => _x( 'Set Service image', 'recipe' ),
    'remove_featured_image' => _x( 'Remove Service image', 'recipe' ),
    'use_featured_image'    => _x( 'Use as Service image', 'recipe' ),
    'archives'              => _x( 'Service archives', 'recipe' ),
    'insert_into_item'      => _x( 'Insert into Service Item', 'recipe' ),
    'uploaded_to_this_item' => _x( 'Uploaded to this Service Item', 'recipe' ),
    'filter_items_list'     => _x( 'Filter Service Items list', 'recipe' ),
    'items_list_navigation' => _x( 'Service list navigation', 'recipe' ),
    'items_list'            => _x( 'Service list', 'recipe' ),
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
add_action( 'init', 'recipe_custom_post_type_service' );


/**
 * Register a custom taxonomy for the post type called "service".
 */
function recipe_custom_service_taxonomies() {
  $labels = array(
    'name'              => _x( 'Service Categories', 'recipe' ),
    'singular_name'     => _x( 'Service Category', 'recipe' ),
    'search_items'      => _x( 'Search Service Categories', 'recipe'  ),
    'all_items'         => _x( 'All Service Categories', 'recipe'  ),
    'parent_item'       => _x( 'Parent Service Categories', 'recipe'  ),
    'parent_item_colon' => _x( 'Parent Service Category:', 'recipe'  ),
    'edit_item'         => _x( 'Edit Service Category', 'recipe'  ),
    'update_item'       => _x( 'Update Service Category', 'recipe'  ),
    'add_new_item'      => _x( 'Add New Service Category', 'recipe'  ),
    'new_item_name'     => _x( 'New Service Category', 'recipe'  ),
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
//add_action('init' , 'recipe_custom_service_taxonomies' );


/**
 * This function adds custom service post type links
 */
function recipe_service_post_type_link( $link, $post ) {
  if ( $post->post_type === 'service' ) {
    if ( $terms = get_the_terms( $post->ID, 'service_categories' ) )
      $link = str_replace( '%service_categories%', current( $terms )->slug, $link );
    else
      $link = str_replace( '%service_categories%', 'editorial', $link );
  }

  return $link;
}
//add_filter( 'post_type_link', 'recipe_service_post_type_link', 10, 2 );


/**
 * Remove Posts from the admin menu
 */
function recipe_remove_posts_from_menu() {
  remove_menu_page('edit.php');
}
//add_action( 'admin_menu', 'recipe_remove_posts_from_menu' );


/**
 * Remove New post link from the admin bar
 */
function recipe_remove_wp_node_new_post() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_node( 'new-post' );
}
//add_action( 'admin_bar_menu', 'recipe_remove_wp_node_new_post', 999 );