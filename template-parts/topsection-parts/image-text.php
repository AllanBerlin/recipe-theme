<?php

$imageText = get_query_var('image_text');
$imageAlignment = get_query_var('image_alignment');
$backgroundColour = get_query_var('background_colour');

?>

<?php if( !empty( $imageText ) ):
  $imageDetails = $imageText['image_details'];
  $textContent = $imageText['text_content'];

  ?>

  <div class="image-text <?php echo $imageAlignment; ?>" style="--block-color: <?php echo esc_attr( $backgroundColour['label'] ); ?>;">

    <div class="layout-grid">

      <?php if( !empty( $imageDetails ) ):
        $image = $imageDetails['image'];
        set_query_var('image', $image);

        $borderColour = $imageDetails['recipe_frame_colour'];

        ?>

        <?php if( !empty( $image ) ): ?>

          <div class="image-wrapper" style="border-color: <?php echo esc_attr( $borderColour['label'] ); ?>;">

            <?php get_template_part( 'template-parts/modules/image' ); ?>

          </div>

        <?php endif; ?>

      <?php endif; ?>

      <?php if( !empty( $textContent ) ):
        set_query_var('text_content', $textContent);

        ?>

        <?php get_template_part( 'template-parts/modules/text-content' ); ?>

      <?php endif; ?>

    </div>

  </div>

<?php endif; ?>