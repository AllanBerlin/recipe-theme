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

  //Removes 'the_content' area (editor) from the Wordpress backend, since Herbst uses ACF.
  remove_post_type_support('page', 'editor');
  remove_post_type_support('post', 'editor');
}
add_action('init', 'herbst_theme_init');


/**
 * Function to add Meta Tags in Header without Plugin
 */
function herbst_add_meta_tags() {
  $url = esc_url(get_permalink());
  $mainImage = '';
  $imageWidth = '';
  $imageHeight = '';

  if ( is_front_page() ) {
    $title = get_bloginfo('name');
    $description = get_bloginfo('description');
    $image = get_template_directory_uri() . '/images/lucas-bodywork-og-image.jpg';
    $imageWidth = '842';
    $imageHeight = '595';
  } else {
    $title = get_the_title();
    $description = sanitize_text_field( get_field('headline') );
    $mainImage = get_field('main_image');

    if( !$mainImage ) {
      $image = get_template_directory_uri() . '/images/lucas-bodywork-og-image.jpg';
      $imageWidth = '842';
      $imageHeight = '595';
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
add_action('wp_head', 'herbst_add_meta_tags');


/**
 * Enqueue scripts and styles.
 */
function herbst_scripts() {

  wp_enqueue_style( 'herbst-style', get_template_directory_uri() . '/css/main.min.css' );

  // Remove gutenberg block styles
  wp_dequeue_style( 'wp-block-library' );

  wp_register_script( 'smoothscroll-polyfill', 'https://cdnjs.cloudflare.com/ajax/libs/iamdustan-smoothscroll/0.4.0/smoothscroll.min.js', array(), '', true );
  wp_enqueue_script( 'smoothscroll-polyfill' );

	wp_enqueue_script( 'herbst-scripts', get_template_directory_uri() . '/js/scripts.min.js', array(), '', true );

}
add_action( 'wp_enqueue_scripts', 'herbst_scripts' );


/**
 * Remove version from scripts and styles
 */
function herbst_remove_version_scripts_styles($src) {
  if (strpos($src, 'ver=')) {
    $src = remove_query_arg('ver', $src);
  }
  return $src;
}
add_filter('style_loader_src', 'herbst_remove_version_scripts_styles', 9999);
add_filter('script_loader_src', 'herbst_remove_version_scripts_styles', 9999);


/**
 * Allow svg upload
 */
function custom_mtypes( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	$mimes['svgz'] = 'image/svg+xml';

	return $mimes;
}
add_filter( 'upload_mimes', 'custom_mtypes' );


/**
 * Remove default image sizes here.
 */
function herbst_remove_default_images( $sizes ) {
  unset( $sizes['thumbnail']); // 150px
  unset( $sizes['medium']); // 300px
  unset( $sizes['medium_large']); // 768px
  unset( $sizes['large']); // 1024px

  return $sizes;

}
add_filter( 'intermediate_image_sizes_advanced', 'herbst_remove_default_images' );


/**
 *  Remove the h1 & h2 tags from the WordPress editor.
 */
function herbst_format_TinyMCE( $in ) {
  $in['block_formats'] = "Paragraph=p; Heading 4=h4; Heading 5=h5; Heading 6=h6";

  return $in;
}
add_filter( 'tiny_mce_before_init', 'herbst_format_TinyMCE' );


/**
 * Clean up string to remove any html attributes
 */
function herbst_clean_text( $text ) {
  $text = preg_replace("/<([a-z][a-z0-9]*)[^>]*?(\/?)>/i",'<$1$2>', $text);

  return $text;
}


/**
 * Replaces all spaces with hyphens and removes special chars.
 */
function herbst_remove_special_chars( $string ) {
  $string = str_replace(' ', '-', $string);
  $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
  $string = strtolower( $string );

  return preg_replace('/-+/', '-', $string);
}


/**
 * Clean up wp_head()
 */
require get_template_directory() . '/inc/clean-head.php';

/**
 * Add Custom Post types
 */
require get_template_directory() . '/inc/custom-posts.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Get Social Media
 */
require get_template_directory() . '/inc/social.php';

/**
 * Remove comments functionality
 */
require get_template_directory() . '/inc/remove-comments.php';

/**
 * Related Posts.
 */
//require get_template_directory() . '/inc/related-posts.php';