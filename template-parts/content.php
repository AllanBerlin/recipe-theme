<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package recipe
 */

$backgroundColour = get_field('recipe_background_colour');

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('article-detail'); ?> style="background-color: <?php echo $backgroundColour; ?>;">

  <div class="layout-grid">

    <div class="entry-header">

      <div class="header-wrapper">

        <?php
        $image = get_field('article_image');
        set_query_var('image', $image);

        if ( $image ): ?>

          <?php get_template_part( 'template-parts/modules/image' ); ?>

        <?php endif; ?>

        <?php echo recipe_article_reading_time(); ?>

      </div>

    </div><!-- .entry-header -->

    <div class="entry-content">

      <h1 class="entry-title"><?php the_title(); ?></h1>

      <?php get_template_part( 'template-parts/post-content/flexible' ); ?>

    </div><!-- .entry-content -->

  </div>

</article><!-- #post-## -->
