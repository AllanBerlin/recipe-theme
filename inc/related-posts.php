<?php

function herbst_related_posts() {
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

  if( $loop->have_posts() ): ?>

    <div class="related-posts">

      <h3 class="related-title">More Work</h3>

      <?php while( $loop->have_posts() ): $loop->the_post(); ?>

        <div class="related-thumb">

          <?php
          $image = get_field('main_image');

          if( $image ): ?>

            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="image-container lazy">

              <div class="image" data-src="<?php echo $image['sizes']['full']; ?>"></div>

            </a>

          <?php endif; ?>

        </div>

      <?php endwhile; ?>

      <?php wp_reset_postdata(); ?>

    </div>

  <?php endif; ?>

  <?php
}