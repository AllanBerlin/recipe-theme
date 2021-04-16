<?php

$termsLink = get_field('terms_link', 'option');

?>

<div class="footer-bottom layout-grid">

  <?php if( !empty( $termsLink ) ):
    $postID = url_to_postid( $termsLink );
    $linkTitle = get_the_title( $postID );

    ?>

    <div class="link-wrapper">

      <a href="<?php echo esc_url( $termsLink ); ?>"
         class="page-link"
         title="<?php echo esc_html( $linkTitle ); ?>"
         rel="noopener"><?php echo esc_html( $linkTitle ); ?></a>

    </div>

  <?php endif; ?>

  <div class="copyright">Copyright <?php echo sprintf( "%s-%s", date( 'Y', strtotime( '-1 year' ) ), date( 'Y' ) ); ?> recipe GbR</div>

  <div class="social-links"><?php recipe_social_icons_output(); ?></div>

</div>