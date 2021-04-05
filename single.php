<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package recipe
 */

get_header(); ?>

<div class="post-content">

  <?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>

      <?php get_template_part( 'template-parts/content', get_post_format() ); ?>

    <?php endwhile; ?>

  <?php endif; ?>

</div><!-- .post-content -->

<?php
get_footer();
