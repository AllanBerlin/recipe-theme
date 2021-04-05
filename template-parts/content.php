<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package recipe
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <header class="entry-header">

    <?php get_template_part( 'template-parts/post-content/hero' ); ?>

    <?php echo recipe_article_reading_time(); ?>

  </header><!-- .entry-header -->

  <div class="entry-content">

    <?php get_template_part( 'template-parts/post-content/flexible' ); ?>

  </div><!-- .entry-content -->

  <!-- Related Posts -->
  <?php recipe_related_posts(); ?>

  <footer class="entry-footer">

    <?php recipe_entry_footer(); ?>

  </footer><!-- .entry-footer -->

</article><!-- #post-## -->
