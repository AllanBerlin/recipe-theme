<?php

$termsLink = get_field('terms_link', 'option');
$privacyLink = get_field('privacy_link', 'option');

?>

<div class="footer-bottom layout-grid">

  <div class="social-links"><?php recipe_social_icons_output(); ?></div>

  <?php if( !empty( $termsLink ) || !empty( $privacyLink ) ): ?>

    <div class="links-wrapper">

      <?php if( !empty( $termsLink ) ):
        $termsUrl = $termsLink['url'];
        $termsTitle = $termsLink['title'];
        $termsTarget = $termsLink['target'] ? $termsLink['target'] : '_self';

        ?>

        <a href="<?php echo esc_url( $termsUrl ); ?>"
           target="<?php echo esc_attr( $termsTarget ); ?>"
           class="page-link"
           title="<?php echo esc_attr( $termsTitle ); ?>"
           rel="noopener"><?php echo esc_html( $termsTitle ); ?></a>

      <?php endif; ?>

      <?php if( !empty( $privacyLink ) ):
        $privacyUrl = $privacyLink['url'];
        $privacyTitle = $privacyLink['title'];
        $privacyTarget = $privacyLink['target'] ? $privacyLink['target'] : '_self';

        ?>

        <?php echo ' &amp; '; ?>

        <a href="<?php echo esc_url( $privacyUrl ); ?>"
           target="<?php echo esc_attr( $privacyTarget ); ?>"
           class="page-link"
           title="<?php echo esc_attr( $privacyTitle ); ?>"
           rel="noopener"><?php echo esc_html( $privacyTitle ); ?></a>

      <?php endif; ?>

    </div>

  <?php endif; ?>

  <div class="copyright">Copyright <?php echo sprintf( "%s-%s", date( 'Y', strtotime( '-1 year' ) ), date( 'Y' ) ); ?> recipe GbR</div>

</div>