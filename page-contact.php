<?php
/**
 * Template Name: Contact
 *
 * This is the template that displays a contact page
 *
 * @package herbst
 */

get_header(); ?>

  <div id="primary" class="post-detail content">

    <?php while ( have_posts() ) : the_post(); ?>

      <main id="main" class="site-main layout-body" role="main">

        <?php get_template_part( 'template-parts/content', 'contact' ); ?>

      </main><!-- #main -->

    <?php endwhile; // End of the loop.?>

  </div><!-- #primary -->

<?php
get_footer();
