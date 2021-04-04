<?php

/**
 * Replace Posts label as Articles in Admin Panel
 */
function recipe_change_post_menu_label() {
  global $menu;
  global $submenu;

  $menu[5][0] = 'Articles';
  $submenu['edit.php'][5][0] = 'Articles';
  $submenu['edit.php'][10][0] = 'Add Articles';
}
add_action( 'admin_menu', 'recipe_change_post_menu_label' );

/**
 * Replace Posts label as Articles Object Labels
 */
function recipe_change_post_object_label() {
  global $wp_post_types;

  $labels = &$wp_post_types['post']->labels;
  $labels->name = 'Articles';
  $labels->singular_name = 'Article';
  $labels->add_new = 'Add Article';
  $labels->add_new_item = 'Add Article';
  $labels->edit_item = 'Edit Article';
  $labels->new_item = 'Article';
  $labels->view_item = 'View Article';
  $labels->search_items = 'Search Articles';
  $labels->parent_item_colon = 'Parent Article:';
  $labels->not_found = 'No Articles found';
  $labels->not_found_in_trash = 'No Articles found in Trash';
  $labels->featured_image = 'Article Featured Image';
  $labels->set_featured_image = 'Set Article Featured Image';
  $labels->remove_featured_image = 'Remove Article Featured Image';
  $labels->use_featured_image    = 'Use as Article Featured Image';
  $labels->archives              = 'Article archives';
  $labels->insert_into_item      = 'Insert into Article Item';
  $labels->uploaded_to_this_item = 'Uploaded to this Article Item';
  $labels->filter_items_list     = 'Filter Articles list';
  $labels->items_list_navigation = 'Article list navigation';
  $labels->items_list            = 'Article list';
  $labels->menu_name = 'Articles';
  $labels->name_admin_bar = 'Add News';
}
add_action( 'init', 'recipe_change_post_object_label' );


/**
 * Register a custom post types called "Team Member" and "User Story".
 */
function recipe_custom_post_types() {

  // Team Member Labels
  $teamMemberlabels = array(
    'name'                  => _x( 'Team Members', 'recipe' ),
    'singular_name'         => _x( 'Team Member', 'recipe' ),
    'menu_name'             => _x( 'Team Members', 'recipe' ),
    'name_admin_bar'        => _x( 'Team Members', 'recipe' ),
    'add_new'               => _x( 'Add New', 'recipe' ),
    'add_new_item'          => _x( 'Add New Team Member', 'recipe' ),
    'new_item'              => _x( 'New Team Member', 'recipe' ),
    'edit_item'             => _x( 'Edit Team Member', 'recipe' ),
    'view_item'             => _x( 'View Team Member', 'recipe' ),
    'all_items'             => _x( 'All Team Members', 'recipe' ),
    'search_items'          => _x( 'Search Team Members', 'recipe' ),
    'parent_item_colon'     => _x( 'Parent Team Member:', 'recipe' ),
    'not_found'             => _x( 'No Team Members found.', 'recipe' ),
    'not_found_in_trash'    => _x( 'No Team Members found in Trash.', 'recipe' ),
    'featured_image'        => _x( 'Team Member Image', 'recipe' ),
    'set_featured_image'    => _x( 'Set Team Member image', 'recipe' ),
    'remove_featured_image' => _x( 'Remove Team Member image', 'recipe' ),
    'use_featured_image'    => _x( 'Use as Team Member image', 'recipe' ),
    'archives'              => _x( 'Team Member archives', 'recipe' ),
    'insert_into_item'      => _x( 'Insert into Team Member', 'recipe' ),
    'uploaded_to_this_item' => _x( 'Uploaded to this Team Member', 'recipe' ),
    'filter_items_list'     => _x( 'Filter Team Members list', 'recipe' ),
    'items_list_navigation' => _x( 'Team Members list navigation', 'recipe' ),
    'items_list'            => _x( 'Team Members list', 'recipe' ),
  );

  // User Stories Labels
  $userStorieslabels = array(
    'name'                  => _x( 'User Stories', 'recipe' ),
    'singular_name'         => _x( 'User Story', 'recipe' ),
    'menu_name'             => _x( 'User Stories', 'recipe' ),
    'name_admin_bar'        => _x( 'User Stories', 'recipe' ),
    'add_new'               => _x( 'Add New', 'recipe' ),
    'add_new_item'          => _x( 'Add New User Story', 'recipe' ),
    'new_item'              => _x( 'New User Story', 'recipe' ),
    'edit_item'             => _x( 'Edit User Story', 'recipe' ),
    'view_item'             => _x( 'View User Story', 'recipe' ),
    'all_items'             => _x( 'All User Stories', 'recipe' ),
    'search_items'          => _x( 'Search User Stories', 'recipe' ),
    'parent_item_colon'     => _x( 'Parent User Story:', 'recipe' ),
    'not_found'             => _x( 'No User Stories found.', 'recipe' ),
    'not_found_in_trash'    => _x( 'No User Stories found in Trash.', 'recipe' ),
    'featured_image'        => _x( 'User Story Image', 'recipe' ),
    'set_featured_image'    => _x( 'Set User Story image', 'recipe' ),
    'remove_featured_image' => _x( 'Remove User Story image', 'recipe' ),
    'use_featured_image'    => _x( 'Use as User Story image', 'recipe' ),
    'archives'              => _x( 'User Stories archives', 'recipe' ),
    'insert_into_item'      => _x( 'Insert into User Story', 'recipe' ),
    'uploaded_to_this_item' => _x( 'Uploaded to this User Story', 'recipe' ),
    'filter_items_list'     => _x( 'Filter User Stories list', 'recipe' ),
    'items_list_navigation' => _x( 'User Stories list navigation', 'recipe' ),
    'items_list'            => _x( 'User Stories list', 'recipe' ),
  );


  // Team Member Arguments
  $teamMemberArgs = array(
    'labels'             => $teamMemberlabels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'capability_type'    => 'post',
    'has_archive'        => false,
    'menu_position'      => 6,
    'menu_icon'          => 'dashicons-groups',
    'supports'           => array( 'title'),
    'hierarchical'       => true,
    '_builtin'           => false,
    'rewrite'            => array( 'slug' => 'team-member', 'with_front' => true )
  );

  // User Story Arguments
  $userStoriesArgs = array(
    'labels'             => $userStorieslabels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'capability_type'    => 'post',
    'has_archive'        => false,
    'menu_position'      => 7,
    'menu_icon'          => 'dashicons-testimonial',
    'supports'           => array( 'title'),
    'hierarchical'       => true,
    '_builtin'           => false,
    'rewrite'            => array( 'slug' => 'user-story', 'with_front' => true )
  );


  // Register new custom post type called "team_member"
  register_post_type( 'team_member', $teamMemberArgs );

  // Register new custom post type called "user_story"
  register_post_type( 'user_story', $userStoriesArgs );
}
add_action( 'init', 'recipe_custom_post_types' );