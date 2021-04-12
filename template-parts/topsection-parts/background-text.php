<?php

$backgroundText = get_query_var('background_text');
$backgroundColour = get_query_var('background_colour');
$opacity = get_query_var('opacity');

?>

<?php if( !empty( $backgroundText ) ):
  $image = $backgroundText['image'];
  set_query_var('image', $image);

  $headline = $backgroundText['headline'];

  ?>

  <div class="background-text">

    <?php if( !empty( $image ) ): ?>

      <div class="mask" style="background-color: <?php echo esc_attr( $backgroundColour['label'] ); ?>"></div>

      <div class="image-wrapper" style="--bg-opacity: <?php echo esc_attr( $opacity ); ?>;">

        <?php get_template_part( 'template-parts/modules/image' ); ?>

      </div>

    <?php endif; ?>

    <?php if( !empty( $headline ) ): ?>

      <h3 class="headline"><?php echo $headline; ?></h3>

    <?php endif; ?>

  </div>

<?php endif; ?>