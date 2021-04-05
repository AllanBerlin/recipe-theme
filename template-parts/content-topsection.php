<?php

$topSection = get_field('top_section');

?>

<?php if( !empty( $topSection ) ):
  $sectionTitle = $topSection['section_title'];
  $sectionType = $topSection['section_type'];
  $sectionConfig = $topSection['section_config'];

  ?>

  <section class="top-section" title="<?php echo esc_attr( $sectionTitle ); ?>">

    <?php if( $sectionTitle ): ?>

      <h2 class="section-title ui-accessible"><?php echo $sectionTitle; ?></h2>

    <?php endif; ?>

    <?php if( $sectionType === 'image_with_text' ):
      set_query_var('image_text', $topSection['image_text_hero']);
      set_query_var('image_alignment', $sectionConfig['image_alignment']);
      set_query_var('background_colour', $sectionConfig['recipe_background_colour']);

      ?>

      <?php get_template_part( 'template-parts/topsection-parts/image-text' ); ?>

    <?php elseif( $sectionType === 'background_with_text' ):
      set_query_var('background_text', $topSection['background_text_hero']);
      set_query_var('background_colour', $sectionConfig['recipe_background_colour']);
      set_query_var('opacity', $sectionConfig['opacity']);

      ?>

      <?php get_template_part( 'template-parts/topsection-parts/background-text' ); ?>

    <?php endif; ?>

  </section>

<?php endif; ?>