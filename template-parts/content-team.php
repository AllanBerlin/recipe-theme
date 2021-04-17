<?php
/**
 * Template part for displaying team members within a grid.
 *
 * @package recipe
 */


$image = get_field('image');
set_query_var('image', $image);

$frameColour = get_field('recipe_frame_colour');
$description = get_field('description');

?>

<article id="team-<?php the_ID(); ?>" <?php post_class('team-item'); ?>>

  <header class="entry-header">

    <div class="team-image" style="border-color: <?php echo $frameColour['label']; ?>;">

      <?php get_template_part( 'template-parts/modules/image' ); ?>

    </div>

    <div class="title-wrapper">

      <h4 class="team-title"><strong><?php the_title(); ?></strong></h4>

    </div>

  </header><!-- .entry-header -->

  <div class="entry-content">

    <?php if( $description ):
      $allowedHtml = recipe_allowed_html_types();

      ?>

      <div class="team-description"><?php echo wp_kses( $description, $allowedHtml );?></div>

    <?php endif; ?>

  </div><!-- .entry-content -->

</article><!-- #team-## -->
