<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package herbst
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <header class="entry-header">

    <?php get_template_part( 'template-parts/post-content/hero' ); ?>

  </header><!-- .entry-header -->

  <div class="entry-content">

    <?php get_template_part( 'template-parts/post-content/flexible' ); ?>

  </div><!-- .entry-content -->

  <!-- Related Posts -->
<!--  --><?php //herbst_related_posts(); ?>

  <footer class="entry-footer">

    <?php herbst_entry_footer(); ?>

  </footer><!-- .entry-footer -->

</article><!-- #post-## -->
