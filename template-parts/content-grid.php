<?php
/**
 * Template part for displaying posts within a list.
 *
 * @package recipe
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>

  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="post-link">

    <header class="entry-header">

      <?php
      $image = get_field('main_image');
      set_query_var('image', $image);

      if ( $image ): ?>

        <?php get_template_part( 'template-parts/modules/image' ); ?>

      <?php endif; ?>

      <h4 class="entry-title"><strong><?php the_title(); ?></strong></h4>

    </header><!-- .entry-header -->

    <div class="entry-content">

      <?php
      $serviceExcerpt = get_field('service_excerpt');

      if ( $serviceExcerpt ): ?>

        <p class="entry-description"><?php echo $serviceExcerpt; ?></p>

        <button type="button" class="button fourth" title="More">More</button>

      <?php endif; ?>

    </div><!-- .entry-content -->

  </a>

</article><!-- #post-## -->