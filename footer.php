<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package herbst
 */

?>

      </div><!-- .site-content -->

    </div><!-- .site -->

    <footer class="layout-footer" role="contentinfo">

      <div class="footer-container layout-module">

        <div class="social-links"><?php herbst_social_icons_output(); ?></div>

        <div class="copyright">&copy; Lucas Bodywork <?php echo date('Y'); ?></div>

        <a href="https://agency.lolamag.de/" target="_blank" class="made-by" rel="noopener" title="Lola & The Bean Agency">Lola & The Bean Agency</a>

      </div>

    </footer><!-- .layout-footer -->

  </div><!-- .site-wrapper -->

  <div class="policy-popup">

    <div class="layout-module">

      <p class="privacy-text">
        This website uses cookies to provide necessary site functionality
        and improve user experience. If you close this box or continue browsing,
        you agree to the use of cookies as outlined in <a href="/privacy-policy/" class="link" title="Lucas Bodywork’s Privacy Policy">Lucas Bodywork’s Privacy Policy.</a>
      </p>

    </div>

    <button type="button" class="close" title="Close">&times;</button>

  </div>


<?php wp_footer(); ?>

</body>
</html>
