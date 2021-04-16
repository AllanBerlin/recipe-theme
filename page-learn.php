<?php
/**
 * Template Name: Learn Template
 *
 * This is the template that displays the Learn Page Template and filter
 *
 * @package recipe
 */

get_header(); ?>

  <div class="page-content">

    <h1 class="ui-accessible"><?php echo get_bloginfo('name'); ?></h1>

    <?php get_template_part( 'template-parts/content', 'featured' ); ?>

    <?php
    $loop = new WP_Query(
      array(
        'post_type' => 'post',
        'posts_per_page' => -1
      )
    );

    if ( $loop->have_posts() ):
      $pageBgColour = get_field('recipe_background_colour');

      ?>

      <section class="section-articles-list layout-grid" title="Articles List" style="background-color: <?php echo esc_attr( $pageBgColour ); ?>;">

        <h2 class="section-title ui-accessible">Articles List</h2>

        <div class="articles-list">

          <?php $loop->the_post();

          for ($x = 0; $x <= 30; $x++):
            set_query_var('article_number', $x);

            ?>

            <?php get_template_part( 'template-parts/content', 'grid' ); ?>

          <?php endfor; ?>

<!--          --><?php //while ( $loop->have_posts() ) : $loop->the_post(); ?>
<!---->
<!--            --><?php //get_template_part( 'template-parts/content', 'grid' ); ?>
<!---->
<!--          --><?php //endwhile; ?>

        </div>

        <div class="button-wrapper">

          <button type="button" class="button load-more" title="Load More">Load More</button>

        </div>

      </section>

      <?php wp_reset_postdata(); ?>

    <?php endif; ?>

  </div>
  <!-- .page-content -->

<?php
get_footer();
