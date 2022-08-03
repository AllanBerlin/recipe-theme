<?php if ( have_rows( 'legal_content' ) ) : ?>

  <div class="legal-content">

    <h1 class="page-title"><?php echo get_the_title(); ?></h1>

    <?php while ( have_rows( 'legal_content' ) ) : the_row();
      $legalTitle = get_sub_field('title');
      $legalText = get_sub_field('text');

      ?>

      <div class="legal-wrapper layout-grid">

        <?php if( !empty( $legalTitle ) ): ?>

          <h2 class="legal-title"><?php echo $legalTitle; ?></h2>

        <?php endif; ?>

        <?php if( !empty( $legalText ) ):
          $allowedHtml = recipe_allowed_html_types();

          ?>

          <div class="legal-text"><?php echo wp_kses( $legalText, $allowedHtml );?></div>

        <?php endif; ?>

      </div>

    <?php endwhile; ?>

  </div>

<?php endif; ?>