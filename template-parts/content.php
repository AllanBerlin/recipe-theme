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

        <?php recipe_the_breadcrumb(); ?>

        <?php echo recipe_social_sharing_buttons(); ?>

      </div>

    </div><!-- .entry-header -->

    <div class="entry-content">

      <h1 class="entry-title"><?php the_title(); ?></h1>

      <?php
      $subtitle = get_field('article_subtitle');

      if( $subtitle ): ?>

        <h2 class="subtitle"><?php echo $subtitle; ?></h2>

      <?php endif; ?>

      <?php recipe_entry_tags(); ?>

      <div class="article-info">

        <?php recipe_posted_on() ?><span class="separator"> | </span><?php recipe_article_reading_time(); ?>

      </div>

      <?php get_template_part( 'template-parts/post-content/flexible' ); ?>

    </div><!-- .entry-content -->

  </div>

</article><!-- #post-## -->
