<?php

/**
 * herbst functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions
 *
 * @package herbst
 */


if ( ! function_exists( 'herbst_setup' ) ) :

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

function herbst_setup() {

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );


	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

  /*
   * Remove the admin-bar inline-CSS as it isn't compatible with the sticky header CSS.
   * This prevents unintended scrolling on pages with few content, when logged in.
   */
  add_theme_support('admin-bar', array('callback' => '__return_false'));

  /*
   * This theme uses wp_nav_menu() in one location.
   */
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'herbst' ),
    'secondary' => esc_html__( 'Secondary', 'herbst' )
	) );

  /*
   * This theme uses a custom logo
   */
  add_theme_support( 'custom-logo', array(
    'height'      => 100,
    'width'       => 400,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' ),
  ) );

	/*
	 * Switch default core markup for search form
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'gallery',
		'caption',
    'script',
    'style'
	) );
}

endif;
add_action( 'after_setup_theme', 'herbst_setup' );


/**
 * Function to be called when theme is initialised
 */
function herbst_theme_init() {
  // Disable Gutenberg for posts and pages
  add_filter('use_block_editor_for_post', '__return_false', 10);
  add_filter('use_block_editor_for_post_type', '__return_false', 10);

  // Turn off ability to edit theme in admin
  define('DISALLOW_FILE_EDIT', TRUE);

  //Removes 'the_content' area (editor) from the Wordpress backend, since Recipe uses ACF.
  remove_post_type_support('page', 'editor');
  remove_post_type_support('post', 'editor');
}
add_action('init', 'herbst_theme_init');


/**
 * Enqueue scripts and styles.
 */
function herbst_scripts() {

  wp_enqueue_style( 'herbst-style', get_template_directory_uri() . '/css/main.min.css' );

  // Remove gutenberg block styles
  wp_dequeue_style( 'wp-block-library' );

  // Remove jquery script from frontend not the admin
  if( !is_admin() ) {
    wp_deregister_script( 'jquery' );
  }

  wp_register_script( 'smoothscroll-polyfill', 'https://cdnjs.cloudflare.com/ajax/libs/iamdustan-smoothscroll/0.4.0/smoothscroll.min.js', array(), '', true );
  wp_enqueue_script( 'smoothscroll-polyfill' );

	wp_enqueue_script( 'herbst-scripts', get_template_directory_uri() . '/js/scripts.min.js', array(), '', true );

}
add_action( 'wp_enqueue_scripts', 'herbst_scripts' );


/**
 * ACF helpers.
 */
require get_template_directory() . '/inc/acf-helpers.php';

/**
 * Clean up wp_head()
 */
require get_template_directory() . '/inc/clean-head.php';

/**
 * Add Custom Post types
 */
require get_template_directory() . '/inc/custom-posts.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add meta data functions
 */
require get_template_directory() . '/inc/meta-functions.php';

/**
 * Remove comments functionality
 */
require get_template_directory() . '/inc/remove-comments.php';

/**
 * Get Related Posts
 */
require get_template_directory() . '/inc/related-posts.php';

/**
 * Get Social Media
 */
require get_template_directory() . '/inc/social.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Add theme helper functions
 */
require get_template_directory() . '/inc/theme-helpers.php';
