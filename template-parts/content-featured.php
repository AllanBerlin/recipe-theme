<?php

$featuredArticle = get_field('featured_article');
$article = $featuredArticle['article'];

?>

<?php if( !empty( $article ) ):
  $articleID = $article->ID;
  $sectionTitle = $featuredArticle['section_title'];

  $backgroundColour = $featuredArticle['recipe_background_colour'];
  $borderColour = $featuredArticle['recipe_frame_colour'];

  $articleImage = get_field('article_image', $articleID);
  $articleLink = get_the_permalink( $articleID );
  $articleTitle = get_the_title( $articleID );
  $articleSubtitle = get_field('article_subtitle', $articleID);

  set_query_var('background_colour', $backgroundColour);
  set_query_var('border_colour', $borderColour);
  set_query_var('article_image', $articleImage);
  set_query_var('article_link', $articleLink);
  set_query_var('article_title', $articleTitle);
  set_query_var('article_subtitle', $articleSubtitle);

  ?>

  <section class="top-section" title="<?php echo esc_attr( $sectionTitle ); ?>">

    <?php if( $sectionTitle ): ?>

      <h2 class="section-title ui-accessible"><?php echo $sectionTitle; ?></h2>

    <?php endif; ?>

    <?php get_template_part( 'template-parts/topsection-parts/article' ); ?>

  </section>

<?php endif; ?>