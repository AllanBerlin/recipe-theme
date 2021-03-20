<?php
/**
 * Template Name: Service
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package recipe
 */

get_header(); ?>

  <div id="primary" class="primary-content">

    <main id="main" class="site-main layout-body" role="main">

      <?php
      $categories = get_terms(
        array(
          'taxonomy'   => 'service_categories',
          'hide_empty' => true,
        )
      );

      $categoryIds = array();
      $categoryNames = array();

      if ( !empty( $categories ) && is_array( $categories ) ): ?>

        <ul class="category-nav">

          <li class="category">

            <button type="button" data-filter="*" class="filter-button">All</button>

          </li>

          <?php foreach ( $categories as $category ):
            $categoryIds[] = $category->term_id;
            $categoryNames[] = $category->name;

            ?>

            <li class="category">

              <button type="button" data-filter="<?php echo '.category-'.recipe_remove_special_chars( $category->name ); ?>" class="category-link"><?php echo $category->name; ?></button>

            </li>

          <?php endforeach; ?>

        </ul>

      <?php endif; ?>

      <?php
      $i = 0;

      foreach ( $categoryIds as $categoryId ): ?>

        <?php
        $loop = new WP_Query(
          array(
            'post_type' => 'service',
            'posts_per_page' => -1
          )
        );

        if ( $loop->have_posts() ) :
          $categoryTitle = $categoryNames[$i++];

          ?>

          <div class="category-wrapper category-<?php echo recipe_remove_special_chars( $categoryTitle ); ?>">

            <div class="grid grid-two">

              <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                <?php get_template_part( 'template-parts/content', 'grid' ); ?>

              <?php endwhile; ?>

            </div>

          </div>

          <?php wp_reset_postdata(); ?>

        <?php else : ?>

          <div class="layout-module">

            <?php get_template_part( 'template-parts/content', 'none' ); ?>

          </div>

        <?php endif; ?>

      <?php endforeach; ?>

    </main><!-- #main -->

  </div><!-- #primary -->

<?php
get_footer();