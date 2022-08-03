<?php

?>

<div class="footer-top layout-grid">

  <?php if( have_rows('footer_column', 'option') ): ?>

    <?php while( have_rows('footer_column', 'option') ): the_row();
      $columnType = get_sub_field('footer_column_type');

      ?>

      <div class="column">

        <?php if( $columnType === 'logo_with_address' ):
          $logoAddress = get_sub_field('logo_and_address');
          $address = $logoAddress['address'];
          $logo = $logoAddress['logo'];
          set_query_var('image', $logo);

          ?>

          <div class="logo-wrapper">

            <?php get_template_part( 'template-parts/modules/image' ); ?>

          </div>

          <?php if( $address ): ?>

            <address class="address"><?php echo $address; ?></address>

          <?php endif; ?>

        <?php elseif( $columnType === 'title_with_links' ):
          $titleLinks = get_sub_field('title_and_links');
          $title = $titleLinks['title'];
          $links = $titleLinks['links'];

          ?>

          <?php if( !empty( $title ) ): ?>

            <h4 class="column-headline"><?php echo $title; ?></h4>

          <?php endif; ?>

          <?php if( !empty( $links ) ): ?>

            <ul class="page-links">

              <?php foreach( $links as $link ):
                $pageLink = $link['link'];

                ?>

                <li class="page-item">

                  <?php if( !empty( $pageLink ) ):
                    $postID = url_to_postid( $pageLink );
                    $pageLinkTitle = get_the_title( $postID );

                    ?>

                    <a href="<?php echo esc_url( $pageLink ); ?>"
                       class="page-link"
                       title="<?php echo esc_html( $pageLinkTitle ); ?>"
                       rel="noopener"><?php echo esc_html( $pageLinkTitle ); ?></a>

                  <?php endif; ?>

                </li>

              <?php endforeach; ?>

            </ul>

          <?php endif; ?>

        <?php endif; ?>

      </div>

    <?php endwhile; ?>

  <?php endif; ?>

</div>