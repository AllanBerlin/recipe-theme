<?php
$heroType = get_field( 'hero_type' );

?>

<?php if( $heroType == 'hero_image' ): ?>

  <?php get_template_part( 'template-parts/hero-parts/image' ); ?>

<?php elseif( $heroType == 'hero_carousel' ): ?>

  <?php get_template_part( 'template-parts/hero-parts/carousel' ); ?>

<?php elseif( $heroType == 'hero_video' ): ?>

  <?php get_template_part( 'template-parts/hero-parts/video' ); ?>

<?php endif; ?>