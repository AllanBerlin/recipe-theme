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

<div id="primary" class="primary-content">

  <main id="main" class="site-main layout-body" role="main">

    <div class="main-content">

      <?php get_template_part( 'template-parts/content', get_post_format() ); ?>

    </div>

  </main>
  <!-- #main -->

</div>
<!-- #primary -->

<?php
get_footer();