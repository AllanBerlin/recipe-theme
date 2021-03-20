<?php

function herbst_related_posts() {
  ?>

  <?php
  $tags = wp_get_post_terms( get_queried_object_id(), 'post_tag', ['fields' => 'ids'] );
  $args = [
    'post__not_in'        => array( get_queried_object_id() ),
    'posts_per_page'      => 4,
    'ignore_sticky_posts' => 1,
    'tax_query' => [
      [
        'taxonomy' => 'post_tag',
        'terms'    => $tags
      ]
    ]
  ];
  $my_query = new wp_query( $args );

  if( $my_query->have_posts() ) : ?>
    <div class="related-posts layout-module">
      <h3 class="related-title">Related Features</h3>
      <?php while( $my_query->have_posts() ): $my_query->the_post(); ?>
        <div class="related-thumb column-four">

          <?php

          $image = get_field('main_image');

          if( !empty($image) ): ?>

            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
              <div class="post-image" style="background-image: url('<?php echo $image['sizes']['medium']; ?>')"></div>

              <?php
              $config = get_field('config');

              if($config): ?>

                <h4 class="related-feature-title" title="<?php the_title(); ?>" style="color:<?php echo $config['font_primary_color']; ?>"><?php the_title(); ?></h4>
              <?php endif; ?>
            </a>
            <h5 class="related-feature-headline"><p><?php echo wp_trim_words( get_field('headline'), 15, '...' ); ?></p></h5>

          <?php endif; ?>

        </div>
      <?php endwhile;
      wp_reset_postdata(); ?>
    </div>
  <?php endif; ?>

  <?php
}