<?php
  /**
  
   * The template for displaying all pages.
  
   *
  
   * This is the template that displays all pages by default.
  
   * Please note that this is the WordPress construct of pages
  
   * and that other 'pages' on your WordPress site may use a
  
   * different template.
  
   *
  
   * @link https://codex.wordpress.org/Template_Hierarchy
  
   *
  
   * @package recipe
  
   */
  
get_header(); ?>

  <div class="page-content">

    <h1 class="ui-accessible"><?php echo get_bloginfo('name'); ?></h1>

    <?php get_template_part( 'template-parts/content', 'topsection' ); ?>

    <?php get_template_part( 'template-parts/content', 'flexible' ); ?>

  </div>
  <!-- .page-content -->

<?php
get_footer();