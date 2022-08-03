<?php

$textContent = get_query_var('text_content');
$relatedImage = get_query_var('related_image');
$relatedImageId = ( !empty( $relatedImage ) ) ? ' data-related-id="'. $relatedImage['id'] . '"' : '';
$relatedImageClass = ( !empty( $relatedImage ) ) ? ' image-related' : '';

?>

<?php if( !empty( $textContent ) ):
  $headline = $textContent['headline'];
  $text = $textContent['text'];
  $cta = $textContent['cta'] ?? '';

  ?>

  <div class="text-content<?php echo $relatedImageClass; ?>"<?php echo $relatedImageId; ?>>

    <?php if( $headline ): ?>

      <h3 class="headline"><?php echo $headline; ?></h3>

    <?php endif; ?>

    <?php if( $text ):
      $allowedHtml = recipe_allowed_html_types();

      ?>

      <div class="text"><?php echo wp_kses( $text, $allowedHtml );?></div>

    <?php endif; ?>

    <?php if( !empty( $cta ) ):
      $postID = url_to_postid( $cta );

      if( get_post_type( $postID ) === 'post' ) {
        $ctaTitle = 'Read Now';
      } else {
        $ctaTitle = get_the_title( $postID );
      }

      ?>

      <a href="<?php echo esc_url( $cta ); ?>"
         class="button cta"
         title="<?php echo esc_html( $ctaTitle ); ?>"
         rel="noopener"><?php echo esc_html( $ctaTitle ); ?></a>

    <?php endif; ?>

  </div>

<?php endif; ?>
