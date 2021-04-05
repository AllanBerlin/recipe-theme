<?php

$textContent = get_query_var('text_content');

?>

<?php if( !empty( $textContent ) ):
  $headline = $textContent['headline'];
  $text = $textContent['text'];
  $cta = $textContent['cta'] ?? '';

  ?>

  <div class="text-content">

    <?php if( $headline ): ?>

      <h3 class="headline"><?php echo $headline; ?></h3>

    <?php endif; ?>

    <?php if( $text ):
      $allowedHtml = recipe_allowed_html_types();

      ?>

      <div class="text"><?php echo wp_kses( $text, $allowedHtml );?></div>

    <?php endif; ?>

    <?php if( !empty( $cta ) ):
      $pageID = url_to_postid( $cta );
      $ctaTitle = get_the_title( $pageID );

      ?>

      <a href="<?php echo esc_url( $cta ); ?>"
         class="button cta"
         title="<?php echo esc_url( $cta ); ?>"
         rel="noopener"><?php echo esc_html( $ctaTitle ); ?></a>

    <?php endif; ?>

  </div>

<?php endif; ?>
