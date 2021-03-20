<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package herbst
 */

get_header(); ?>

<div id="primary" class="post-detail content">

	<main id="main" class="site-main layout-body" role="main">

		<div class="main-content">

      <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>

          <?php get_template_part( 'template-parts/content', get_post_format() ); ?>

        <?php endwhile; ?>

      <?php endif; ?>

		</div>

	</main><!-- #main -->

</div><!-- #primary -->

<?php
get_footer();
