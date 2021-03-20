<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package herbst
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <?php
  $postContent = get_field('post_content');
  $link = $postContent['link'];

  if( $link ): ?>

  <a href="<?php echo $link['url'];?>" target="<?php echo $link['target'];?>" class="external-link" title="<?php echo $link['title'];?>" rel="noopener">

    <div class="entry-content">
      <?php

      $image = get_field('main_image');

      if ( !empty($image) ): ?>

        <div class="image-container lazy">

          <div class="image" data-src="<?php echo $image['url']; ?>" style="background-image: url('/wp-content/themes/herbst/images/loading.png')" title="<?php echo $image['alt']; ?>"></div>

        </div>

      <?php endif; ?>

    </div><!-- .entry-content -->

    <header class="entry-header">

      <?php if( $postContent['title'] ): ?>

        <h2 class="entry-title"><span><?php echo esc_special( $postContent['title'] );?></span></h2>

      <?php endif; ?>

    </header><!-- .entry-header -->

    <div class="entry-summary">

      <span class="link-text"><?php echo $link['title'];?></span>

    </div><!-- .entry-summary -->

    <footer class="entry-footer">
      <?php herbst_entry_footer(); ?>
    </footer><!-- .entry-footer -->

  </a>

  <?php endif; ?>

</article><!-- #post-## -->