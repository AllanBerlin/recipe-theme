<?php
/**
 * Template part for displaying testimonials within a grid.
 *
 * @package recipe
 */


$image = get_field('image');
set_query_var('image', $image);

$role = get_field('role');
$quote = get_field('quote');

?>

<article id="testimonial-<?php the_ID(); ?>" <?php post_class('testimonial-item batch-reveal'); ?>>

  <header class="entry-header">

    <?php if( $image ):
      $frameColour = get_field('recipe_frame_colour');

      ?>

      <div class="testimonial-image" style="border-color: <?php echo $frameColour['label']; ?>;">

        <?php get_template_part( 'template-parts/modules/image' ); ?>

      </div>

    <?php endif; ?>

    <div class="title-wrapper">

      <h4 class="testimonial-title"><?php the_title(); ?></h4>

      <?php if( $role ): ?>

        <h5 class="testimonial-role"><?php echo $role; ?></h5>

      <?php endif; ?>

    </div>

  </header><!-- .entry-header -->

  <div class="entry-content">

    <?php if( $quote ): ?>

      <div class="entry-description"><?php echo $quote; ?></div>

    <?php endif; ?>

  </div><!-- .entry-content -->

</article><!-- #testimonial-## -->