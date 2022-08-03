<?php

function recipe_related_posts() {
  ?>

  <?php
  $tags = wp_get_post_terms( get_queried_object_id(), 'post_tag', ['fields' => 'ids'] );

  $args = [
    'post__not_in'        => array( get_queried_object_id() ),
    'posts_per_page'      => 3,
    'ignore_sticky_posts' => 1,
    'tax_query' => [
      [
        'taxonomy' => 'post_tag',
        'terms'    => $tags
      ]
    ]
  ];

  $loop = new wp_query( $args );

//  $loop = new WP_Query(
//    array(
//      'post_type' => 'post',
//      'posts_per_page' => -1
//    )
//  );

  if( $loop->have_posts() ): ?>

    <section class="section-related-articles layout-grid" title="Articles List">

      <h3 class="section-title">Related Articles</h3>

      <div class="articles-list">

        <?php $loop->the_post();

        for ($x = 0; $x <= 2; $x++):
          ?>

          <?php get_template_part( 'template-parts/content', 'grid' ); ?>

        <?php endfor; ?>

        <!--          --><?php //while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <!---->
        <!--            --><?php //get_template_part( 'template-parts/content', 'grid' ); ?>
        <!---->
        <!--          --><?php //endwhile; ?>

      </div>

    </section>

    <?php wp_reset_postdata(); ?>

  <?php endif; ?>

  <?php
}