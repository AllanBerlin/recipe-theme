<?php

$sectionBgColour = get_field('recipe_background_colour', 'option');
$sectionTitle = get_field('section_title', 'option');
$sectionConsent = get_field('consent_label', 'option');
$sectionContent = get_field('section_content', 'option');
set_query_var('text_content', $sectionContent);

?>

<section class="section-newsletter layout-grid" title="<?php echo esc_attr( $sectionTitle ); ?>" style="background-color: <?php echo $sectionBgColour; ?>;">

  <?php if( $sectionTitle ): ?>

    <h2 class="section-title"><?php echo $sectionTitle; ?></h2>

  <?php endif; ?>

  <?php get_template_part( 'template-parts/modules/text-content' ); ?>

  <?php if( $sectionConsent ): ?>

    <p class="consent"><?php echo $sectionConsent; ?></p>

  <?php endif; ?>

</section>
