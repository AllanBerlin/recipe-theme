<?php

$backgroundText = get_query_var('background_text');
$backgroundColour = get_query_var('background_colour');
$opacity = get_query_var('opacity');

?>

<?php if( !empty( $backgroundText ) ):
  $image = $backgroundText['image'];
  set_query_var('image', $image);

  $text = $backgroundText['text'];

  ?>

  <div class="background-text">

    <?php if( !empty( $image ) ): ?>

      <div class="image-wrapper" style="--bg-opacity: <?php echo esc_attr( $opacity ); ?>;">

        <?php get_template_part( 'template-parts/modules/image' ); ?>

      </div>

    <?php endif; ?>

    <?php if( !empty( $text ) ):
      $allowedHtml = recipe_allowed_html_types();

      ?>

      <div class="text-content"><?php echo wp_kses( $text, $allowedHtml );?></div>

    <?php endif; ?>

  </div>

<?php endif; ?>