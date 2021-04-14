<?php
/**
 * Template part for displaying articles within a grid.
 *
 * @package recipe
 */

?>

<article id="article-<?php the_ID(); ?>" <?php post_class('article-item'); ?>>

  <?php recipe_entry_tags(); ?>

  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="article-link">

    <div class="entry-header">

      <?php
      $image = get_field('article_image');
      set_query_var('image', $image);

      if ( $image ): ?>

        <?php get_template_part( 'template-parts/modules/image' ); ?>

      <?php endif; ?>

    </div><!-- .entry-header -->

    <div class="entry-content">

      <h4 class="entry-title"><?php the_title(); ?></h4>

      <h5 class="read-now">Read Now</h5>

    </div><!-- .entry-content -->

  </a>

</article><!-- #article-## -->