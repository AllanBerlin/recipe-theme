<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package recipe
 */

get_header(); ?>

  <div class="post-overview">

    <?php

    $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
    $loop = new WP_Query( array( 'paged' => $paged, 'posts_per_page' => 10 ) );

    if ( $loop->have_posts() ) : ?>

      <div class="post-list">

        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

          <div class="post-item">

            <?php get_template_part( 'template-parts/content', 'list' ); ?>

          </div>

        <?php endwhile; ?>

      </div>

      <?php wp_reset_postdata(); ?>

    <?php else : ?>

      <div class="post-list">

        <div class="item">

          <?php get_template_part( 'template-parts/content', 'none' ); ?>

        </div>

      </div>

    <?php endif; ?>

  </div><!-- .post-overview -->

<?php
get_footer();
