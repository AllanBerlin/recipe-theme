<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package recipe
 */

?>

    <?php get_template_part( 'template-parts/content', 'newsletter' ); ?>

  </main><!-- .main-content -->

  <footer class="layout-footer" role="contentinfo">

    <div class="footer-container">

      <div class="social-links"><?php recipe_social_icons_output(); ?></div>

      <div class="copyright">&copy; Recipe <?php echo sprintf( "%s-%s", date( 'Y', strtotime( '-1 year' ) ), date( 'Y' ) ); ?></div>

<!--        <a href="https://agency.lolamag.de/" target="_blank" class="made-by" rel="noopener" title="Lola & The Bean Agency">Allan Fitzpatrick</a>-->

    </div>

  </footer><!-- .layout-footer -->

  <div class="policy-popup">

    <div class="layout-module">

      <p class="privacy-text">
        This website uses cookies to provide necessary site functionality
        and improve user experience. If you close this box or continue browsing,
        you agree to the use of cookies as outlined in <a href="/privacy-policy/" class="link" title="Recipe’s Privacy Policy">Recipe’s Privacy Policy.</a>
      </p>

    </div>

    <button type="button" class="close" title="Close">&times;</button>

  </div>


<?php wp_footer(); ?>

</body>
</html>
