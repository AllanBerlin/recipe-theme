<?php if( have_rows('flexible_sections') ): ?>

  <?php while( have_rows('flexible_sections') ) : the_row();
    $featuredArticlesSlider = get_row_layout() == 'featured_articles_slider';
    $textLargeImage = get_row_layout() == 'text_large_image';
    $testimonials = get_row_layout() == 'testimonials';
    $imageText = get_row_layout() == 'image_text_section';
    $columnList = get_row_layout() == 'column_list';
    $teamList = get_row_layout() == 'team_list';
    $parallaxList = get_row_layout() == 'parallax_list';
    $strengthsGrid = get_row_layout() == 'strengths_grid';

    ?>

    <?php if( $featuredArticlesSlider ):
      $sectionTitle = get_sub_field('section_title');
      $sectionContent = get_sub_field('section_content');
      set_query_var('text_content', $sectionContent);

      ?>

      <section class="section-articles-slider layout-grid" title="<?php echo esc_attr( $sectionTitle ); ?>">

        <?php if( $sectionTitle ): ?>

          <h2 class="section-title"><?php echo $sectionTitle; ?></h2>

        <?php endif; ?>

        <?php get_template_part( 'template-parts/modules/text-content' ); ?>

        <?php if( have_rows('articles_list') ): ?>

          <div class="articles-list">

            <?php while( have_rows('articles_list') ) : the_row();
              $articlePost = get_sub_field('article');

              ?>

              <?php if( $articlePost ):
                $post = $articlePost;
                setup_postdata( $post );

                ?>

                <?php get_template_part( 'template-parts/content', 'grid' ); ?>

                <?php wp_reset_postdata(); ?>

              <?php endif; ?>

            <?php endwhile; ?>

          </div>

        <?php endif; ?>

      </section>

    <?php endif; ?>


    <?php if( $textLargeImage ):
      $sectionTitle = get_sub_field('section_title');
      $sectionContent = get_sub_field('section_content');
      $image = get_sub_field('image');

      set_query_var('text_content', $sectionContent);
      set_query_var('image', $image);

      ?>

      <section class="section-text-image layout-grid" title="<?php echo esc_attr( $sectionTitle ); ?>">

        <?php if( $sectionTitle ): ?>

          <h2 class="section-title"><?php echo $sectionTitle; ?></h2>

        <?php endif; ?>

        <?php get_template_part( 'template-parts/modules/text-content' ); ?>

        <?php if( !empty( $image ) ): ?>

          <div class="large-image">

            <?php get_template_part( 'template-parts/modules/image' ); ?>

          </div>

        <?php endif; ?>

      </section>

    <?php endif; ?>


    <?php if( $testimonials ):
      $sectionTitle = get_sub_field('section_title');
      $sectionContent = get_sub_field('section_content');
      set_query_var('text_content', $sectionContent);

      ?>

      <section class="section-testimonials layout-grid" title="<?php echo esc_attr( $sectionTitle ); ?>">

        <?php if( $sectionTitle ): ?>

          <h2 class="section-title"><?php echo $sectionTitle; ?></h2>

        <?php endif; ?>

        <?php get_template_part( 'template-parts/modules/text-content' ); ?>

        <?php if( have_rows('testimonials_grid') ): ?>

          <div class="testimonial-grid">

            <?php while( have_rows('testimonials_grid') ) : the_row();
              $testimonial = get_sub_field('testimonial');

              ?>

              <?php if( $testimonial ):
                $post = $testimonial;
                setup_postdata( $post );

                ?>

                <?php get_template_part( 'template-parts/content', 'grid' ); ?>

                <?php wp_reset_postdata(); ?>

              <?php endif; ?>

            <?php endwhile; ?>

          </div>

        <?php endif; ?>

      </section>

    <?php endif; ?>


    <?php if( $imageText ):
      $sectionTitle = get_sub_field('section_title');
      $sectionHeadline = get_sub_field('section_headline');

      ?>

      <section class="section-image-text layout-grid" title="<?php echo esc_attr( $sectionTitle ); ?>">

        <?php if( $sectionTitle ): ?>

          <h2 class="section-title"><?php echo $sectionTitle; ?></h2>

        <?php endif; ?>

        <?php if( $sectionHeadline ): ?>

          <h3 class="headline"><?php echo $sectionHeadline; ?></h3>

        <?php endif; ?>

        <?php get_template_part( 'template-parts/modules/text-content' ); ?>

        <?php if( have_rows('image_text_row') ): ?>

          <div class="list-wrapper">

            <?php while( have_rows('image_text_row') ): the_row();
              $imageAlignment = get_sub_field('image_alignment');
              $image = get_sub_field('image');
              $text = get_sub_field('text');

              ?>

              <?php if( !empty( $image ) ): ?>

                <div class="image-wrapper <?php echo $imageAlignment; ?>">

                  <?php get_template_part( 'template-parts/modules/image' ); ?>

                </div>

              <?php endif; ?>

              <?php if( !empty( $text ) ):
                $allowedHtml = recipe_allowed_html_types();

                ?>

                <div class="text-content"><?php echo wp_kses( $text, $allowedHtml );?></div>

              <?php endif; ?>

            <?php endwhile; ?>

          </div>

        <?php endif; ?>

      </section>

    <?php endif; ?>


    <?php if( $columnList ):
      $sectionTitle = get_sub_field('section_title');
      $sectionContent = get_sub_field('section_content');
      set_query_var('text_content', $sectionContent);

      ?>

      <section class="section-column-list layout-grid" title="<?php echo esc_attr( $sectionTitle ); ?>">

        <?php if( $sectionTitle ): ?>

          <h2 class="section-title"><?php echo $sectionTitle; ?></h2>

        <?php endif; ?>

        <?php get_template_part( 'template-parts/modules/text-content' ); ?>

        <?php if( have_rows('heading_text_list') ): ?>

          <div class="list-wrapper">

            <?php while( have_rows('heading_text_list') ): the_row();
              $heading = get_sub_field('heading');
              $text = get_sub_field('text');

              ?>

              <?php if( !empty( $heading ) ): ?>

                <h4 class="heading"><?php echo $heading; ?></h4>

              <?php endif; ?>

              <?php if( !empty( $text ) ):
                $allowedHtml = recipe_allowed_html_types();

                ?>

                <div class="text-content"><?php echo wp_kses( $text, $allowedHtml );?></div>

              <?php endif; ?>

            <?php endwhile; ?>

          </div>

        <?php endif; ?>

      </section>

    <?php endif; ?>


    <?php if( $teamList ):
      $sectionTitle = get_sub_field('section_title');
      $sectionContent = get_sub_field('section_content');
      set_query_var('text_content', $sectionContent);

      ?>

      <section class="section-team-list layout-grid" title="<?php echo esc_attr( $sectionTitle ); ?>">

        <?php if( $sectionTitle ): ?>

          <h2 class="section-title"><?php echo $sectionTitle; ?></h2>

        <?php endif; ?>

        <?php get_template_part( 'template-parts/modules/text-content' ); ?>

        <?php if( have_rows('team_grid') ): ?>

          <div class="team-grid">

            <?php while( have_rows('team_grid') ) : the_row();
              $teamMember = get_sub_field('team_member');

              ?>

              <?php if( $teamMember ):
                $post = $teamMember;
                setup_postdata( $post );

                ?>

                <?php get_template_part( 'template-parts/content', 'grid' ); ?>

                <?php wp_reset_postdata(); ?>

              <?php endif; ?>

            <?php endwhile; ?>

          </div>

        <?php endif; ?>

      </section>

      </section>

    <?php endif; ?>


    <?php if( $parallaxList ):
      $sectionTitle = get_sub_field('section_title');

      ?>

      <section class="section-parallax-list layout-grid" title="<?php echo esc_attr( $sectionTitle ); ?>">

        <?php if( $sectionTitle ): ?>

          <h2 class="section-title"><?php echo $sectionTitle; ?></h2>

        <?php endif; ?>


        <?php if( have_rows('parallax_item') ): ?>

          <div class="parallax-wrapper">

            <?php while( have_rows('parallax_item') ): the_row();
              $textContent = get_sub_field('text_content');
              $image = get_sub_field('image');

              ?>

              <div class="parallax-item">

                <?php if( !empty( $textContent ) ):
                  $headline = get_sub_field('headline');
                  $text = get_sub_field('text');

                  ?>

                  <div class="parallax-text">

                    <?php if( !empty( $headline ) ): ?>

                      <h3 class="headline"><?php echo $headline; ?></h3>

                    <?php endif; ?>

                    <?php if( !empty( $text ) ):
                      $allowedHtml = recipe_allowed_html_types();

                      ?>

                      <div class="text-content"><?php echo wp_kses( $text, $allowedHtml );?></div>

                    <?php endif; ?>

                  </div>

                <?php endif; ?>

                <?php if( !empty( $image ) ): ?>

                  <div class="parallax-image">

                    <?php get_template_part( 'template-parts/modules/image' ); ?>

                  </div>

                <?php endif; ?>

              </div>

            <?php endwhile; ?>

          </div>

        <?php endif; ?>

      </section>

    <?php endif; ?>


    <?php if( $strengthsGrid ):
      $sectionTitle = get_sub_field('section_title');

      ?>

      <section class="section-strengths-grid layout-grid" title="<?php echo esc_attr( $sectionTitle ); ?>">

        <?php if( $sectionTitle ): ?>

          <h2 class="section-title"><?php echo $sectionTitle; ?></h2>

        <?php endif; ?>

        <?php if( have_rows('text_column') ): ?>

          <div class="column-wrapper">

            <?php while( have_rows('text_column') ): the_row();
              $headline = get_sub_field('headline');
              $text = get_sub_field('text');

              ?>

              <div class="text-column">

                <?php if( !empty( $headline ) ): ?>

                  <h4 class="column-headline"><?php echo $headline; ?></h4>

                <?php endif; ?>

                <?php if( !empty( $text ) ):
                  $allowedHtml = recipe_allowed_html_types();

                  ?>

                  <div class="text-content"><?php echo wp_kses( $text, $allowedHtml );?></div>

                <?php endif; ?>

              </div>

            <?php endwhile; ?>

          </div>

        <?php endif; ?>

      </section>

    <?php endif; ?>

  <?php endwhile; ?>

<?php endif; ?>