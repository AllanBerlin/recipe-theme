<?php

$backgroundColour = get_query_var('background_colour');
$borderColour = get_query_var('border_colour');
$articleImage = get_query_var('article_image');
$articleLink = get_query_var('article_link');
$articleTitle = get_query_var('article_title');
$articleSubtitle = get_query_var('article_subtitle');

$textContent = array(
  'headline' => $articleTitle,
  'text' => $articleSubtitle,
  'cta' => $articleLink
);

?>

<div class="image-text left" style="--block-color: <?php echo esc_attr( $backgroundColour ); ?>;">

  <div class="layout-grid">

    <?php if( !empty( $articleImage ) ):
      set_query_var('image', $articleImage);

      ?>

      <div class="image-wrapper" style="border-color: <?php echo esc_attr( $borderColour['label'] ); ?>;">

        <?php get_template_part( 'template-parts/modules/image' ); ?>

      </div>

    <?php endif; ?>

    <?php if( !empty( $textContent ) ):
      set_query_var('text_content', $textContent);

      ?>

      <?php get_template_part( 'template-parts/modules/text-content' ); ?>

    <?php endif; ?>

  </div>

</div>