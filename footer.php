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

    <?php if( get_field('is_newsletter_active', 'option') ): ?>

      <?php get_template_part( 'template-parts/content', 'newsletter' ); ?>

    <?php endif; ?>

  </main><!-- .main-content -->

  <footer class="layout-footer" role="contentinfo">

    <?php get_template_part( 'template-parts/footer-content/footer-top' ); ?>

    <?php get_template_part( 'template-parts/footer-content/footer-bottom' ); ?>

  </footer><!-- .layout-footer -->

<!--  <div class="policy-popup">-->
<!---->
<!--    <div class="layout-module">-->
<!---->
<!--      <p class="privacy-text">-->
<!--        This website uses cookies to provide necessary site functionality-->
<!--        and improve user experience. If you close this box or continue browsing,-->
<!--        you agree to the use of cookies as outlined in <a href="/privacy-policy/" class="link" title="Recipe’s Privacy Policy">Recipe’s Privacy Policy.</a>-->
<!--      </p>-->
<!---->
<!--    </div>-->
<!---->
<!--    <button type="button" class="close" title="Close">&times;</button>-->
<!---->
<!--  </div>-->


<?php wp_footer(); ?>

</body>
</html>
