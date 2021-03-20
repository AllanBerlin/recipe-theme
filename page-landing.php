<?php
/**
 * Template Name: Landing Page
 *
 * This is the template that displays the journal and director posts
 *
 * @package herbst
 */

get_header(); ?>

  <div id="primary" class="primary-content">

    <main id="main" class="main-content layout-body" role="main">

      <h1 class="ui-accessible"><?php echo get_bloginfo('name'); ?></h1>

      <?php get_template_part( 'template-parts/content', 'hero' ); ?>

      <?php get_template_part( 'template-parts/landing-content/service-posts' ); ?>

      <?php get_template_part( 'template-parts/landing-content/information' ); ?>

      <?php get_template_part( 'template-parts/landing-content/about' ); ?>

      <?php get_template_part( 'template-parts/landing-content/room' ); ?>

      <?php get_template_part( 'template-parts/landing-content/contact' ); ?>

    </main><!-- #main -->

  </div><!-- #primary -->

<?php
get_footer();
