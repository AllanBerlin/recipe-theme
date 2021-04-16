<?php if( have_rows('flexible_sections') ): ?>

  <div class="flexible-sections">

    <?php while( have_rows('flexible_sections') ) : the_row();
      $featuredArticlesSlider = get_row_layout() == 'featured_articles_slider';
      $textLargeImage = get_row_layout() == 'text_large_image';
      $testimonials = get_row_layout() == 'testimonials';
      $imageText = get_row_layout() == 'image_text_section';
      $columnList = get_row_layout() == 'column_list';
      $teamList = get_row_layout() == 'team_list';
      $parallaxList = get_row_layout() == 'parallax_list';
      $strengthsGrid = get_row_layout() == 'strengths_grid';
      $contactForm = get_row_layout() == 'contact_form';

      ?>

      <?php if( $featuredArticlesSlider ):
        $sectionBgColour = get_sub_field('recipe_background_colour');
        $sectionTitle = get_sub_field('section_title');
        $sectionContent = get_sub_field('section_content');
        set_query_var('text_content', $sectionContent);

        ?>

        <section class="section-articles-slider layout-grid" title="<?php echo esc_attr( $sectionTitle ); ?>" style="background-color: <?php echo $sectionBgColour; ?>;">

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
        $sectionBgColour = get_sub_field('recipe_background_colour');
        $sectionTitle = get_sub_field('section_title');
        $sectionContent = get_sub_field('section_content');
        $image = get_sub_field('image');

        set_query_var('text_content', $sectionContent);
        set_query_var('image', $image);

        ?>

        <section class="section-text-image layout-grid" title="<?php echo esc_attr( $sectionTitle ); ?>" style="background-color: <?php echo $sectionBgColour; ?>;">

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
        $sectionBgColour = get_sub_field('recipe_background_colour');
        $sectionTitle = get_sub_field('section_title');
        $sectionContent = get_sub_field('section_content');
        set_query_var('text_content', $sectionContent);

        ?>

        <section class="section-testimonials layout-grid" title="<?php echo esc_attr( $sectionTitle ); ?>" style="background-color: <?php echo $sectionBgColour; ?>;">

          <?php if( $sectionTitle ): ?>

            <h2 class="section-title"><?php echo $sectionTitle; ?></h2>

          <?php endif; ?>

          <?php get_template_part( 'template-parts/modules/text-content' ); ?>

          <?php if( have_rows('testimonials_grid') ): ?>

            <div class="testimonial-grid">

              <?php $count = 0; ?>

              <?php while( have_rows('testimonials_grid') ) : the_row();
                $testimonial = get_sub_field('testimonial');

                ?>

                <?php if ( ( $count % 2 ) == 0 ): ?>

                  <div class="testimonial-wrapper">

                <?php endif; ?>

                <?php if( $testimonial ):
                  $post = $testimonial;
                  setup_postdata( $post );

                  ?>

                  <?php get_template_part( 'template-parts/content', 'testimonial' ); ?>

                  <?php wp_reset_postdata(); ?>

                <?php endif; ?>

              <?php if ( ( $count % 2 ) == 1 ): ?>

                </div>

              <?php endif; ?>

            <?php $count++; endwhile; ?>

            <?php if ( ( $count % 2 ) != 0 ): ?>

              </div>

            <?php endif; ?>

            </div>

          <?php endif; ?>

        </section>

      <?php endif; ?>


      <?php if( $imageText ):
        $sectionBgColour = get_sub_field('recipe_background_colour');
        $sectionTitle = get_sub_field('section_title');
        $sectionHeadline = get_sub_field('section_headline');

        ?>

        <section class="section-image-text" title="<?php echo esc_attr( $sectionTitle ); ?>" style="background-color: <?php echo $sectionBgColour; ?>;">

          <?php if( $sectionTitle ): ?>

            <h2 class="section-title"><?php echo $sectionTitle; ?></h2>

          <?php endif; ?>

          <?php if( $sectionHeadline ): ?>

            <h3 class="headline"><?php echo $sectionHeadline; ?></h3>

          <?php endif; ?>

          <?php if( have_rows('image_text_row') ): ?>

            <div class="list-wrapper">

              <?php while( have_rows('image_text_row') ): the_row();
                $imageAlignment = get_sub_field('image_alignment');
                $image = get_sub_field('image');
                $text = get_sub_field('text');

                if($imageAlignment === 'left') {
                  $revealDirection = 'reveal-left';
                } else {
                  $revealDirection = 'reveal-right';
                }

                ?>

                <div class="list-row layout-grid <?php echo $imageAlignment; ?>">

                  <?php if( !empty( $image ) ):
                    set_query_var('image', $image);

                    ?>

                    <div class="image-wrapper reveal <?php echo $revealDirection; ?>">

                      <?php get_template_part( 'template-parts/modules/image' ); ?>

                    </div>

                  <?php endif; ?>

                  <?php if( !empty( $text ) ):
                    $allowedHtml = recipe_allowed_html_types();

                    ?>

                    <div class="text-content reveal"><?php echo wp_kses( $text, $allowedHtml );?></div>

                  <?php endif; ?>

                </div>

              <?php endwhile; ?>

            </div>

          <?php endif; ?>

        </section>

      <?php endif; ?>


      <?php if( $columnList ):
        $sectionBgColour = get_sub_field('recipe_background_colour');
        $sectionTitle = get_sub_field('section_title');
        $sectionContent = get_sub_field('section_content');
        set_query_var('text_content', $sectionContent);

        ?>

        <section class="section-column-list layout-grid" title="<?php echo esc_attr( $sectionTitle ); ?>" style="background-color: <?php echo $sectionBgColour; ?>;">

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

                <div class="list-row layout-grid">

                  <?php if( !empty( $heading ) ): ?>

                    <h4 class="heading reveal reveal-left"><?php echo $heading; ?></h4>

                  <?php endif; ?>

                  <?php if( !empty( $text ) ):
                    $allowedHtml = recipe_allowed_html_types();

                    ?>

                    <div class="text-content reveal reveal-right"><?php echo wp_kses( $text, $allowedHtml );?></div>

                  <?php endif; ?>

                </div>

              <?php endwhile; ?>

            </div>

          <?php endif; ?>

        </section>

      <?php endif; ?>


      <?php if( $teamList ):
        $sectionBgColour = get_sub_field('recipe_background_colour');
        $sectionTitle = get_sub_field('section_title');
        $sectionContent = get_sub_field('section_content');
        set_query_var('text_content', $sectionContent);

        ?>

        <section class="section-team-list layout-grid" title="<?php echo esc_attr( $sectionTitle ); ?>" style="background-color: <?php echo $sectionBgColour; ?>;">

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

                  <div class="batch-reveal">

                    <?php get_template_part( 'template-parts/content', 'team' ); ?>

                  </div>

                  <?php wp_reset_postdata(); ?>

                <?php endif; ?>

              <?php endwhile; ?>

            </div>

          <?php endif; ?>

        </section>

      <?php endif; ?>


      <?php if( $parallaxList ):
        $sectionBgColour = get_sub_field('recipe_background_colour');
        $sectionTitle = get_sub_field('section_title');

        ?>

        <section class="section-parallax-list" title="<?php echo esc_attr( $sectionTitle ); ?>" style="background-color: <?php echo $sectionBgColour; ?>;">

          <?php if( have_rows('parallax_item') ): ?>

            <div class="parallax-wrapper layout-grid">

              <div class="parallax-texts">

                <?php if( $sectionTitle ): ?>

                  <h2 class="section-title"><?php echo $sectionTitle; ?></h2>

                <?php endif; ?>

                <?php $count = 1; ?>

                <?php while( have_rows('parallax_item') ): the_row();
                  $textContent = get_sub_field('text_content');

                  ?>

                  <?php if( !empty( $textContent ) ):
                    set_query_var('text_content', $textContent);

                    if( $count > 1 ) {
                      $textHidden = ' hidden';
                    } else {
                      $textHidden = '';
                    }

                    if( $count === 1 ) {
                      $textMarker = 'marker-one';
                    } elseif($count === 2) {
                      $textMarker = 'marker-two';
                    } elseif($count === 3) {
                      $textMarker = 'marker-three';
                    } else {
                      $textMarker = 'marker-four';
                    }

                    ?>

                    <div class="parallax-text<?php echo $textHidden; ?>" data-marker="<?php echo $textMarker; ?>">

                      <?php get_template_part( 'template-parts/modules/text-content' ); ?>

                    </div>

                  <?php endif; ?>

                <?php $count++; endwhile; ?>

              </div>


              <div class="parallax-images">

                <?php while( have_rows('parallax_item') ): the_row();
                  $images = get_sub_field('images');

                  ?>

                  <?php if( !empty( $images ) ): ?>

                    <?php foreach( $images as $image ):
                      $parallaxImage = $image['image'];
                      $parallaxImageClass = get_field('classname', $parallaxImage['ID']);

                      ?>

                      <div class="parallax-image<?php echo $parallaxImageClass ? ' ' . $parallaxImageClass : ''; ?>" data-speed="<?php echo $image['image_speed']; ?>">

                        <?php if( !empty( $parallaxImage ) ):
                          $parallaxImageDetails = wp_get_attachment_image_src( $parallaxImage['ID'] , 'full' );

                          ?>

                          <div class="image-container img">

                            <img data-src="<?php echo $parallaxImageDetails[0]; ?>" width="<?php echo $parallaxImageDetails[1]; ?>" height="<?php echo $parallaxImageDetails[2]; ?>" class="image" alt="<?php echo $parallaxImage['alt']; ?>" />

                          </div>

                        <?php endif; ?>

                      </div>

                    <?php endforeach; ?>

                  <?php endif; ?>

                <?php endwhile; ?>

              </div>

              <div class="marker marker-one" data-marker="marker-one"></div>
              <div class="marker marker-two" data-marker="marker-two"></div>
              <div class="marker marker-three" data-marker="marker-three"></div>
              <div class="marker marker-four" data-marker="marker-four"></div>

            </div>

          <?php endif; ?>

        </section>

      <?php endif; ?>


      <?php if( $strengthsGrid ):
        $sectionBgColour = get_sub_field('recipe_background_colour');
        $sectionTitle = get_sub_field('section_title');

        ?>

        <section class="section-strengths-grid layout-grid" title="<?php echo esc_attr( $sectionTitle ); ?>" style="background-color: <?php echo $sectionBgColour; ?>;">

          <?php if( $sectionTitle ): ?>

            <h2 class="section-title"><?php echo $sectionTitle; ?></h2>

          <?php endif; ?>

          <?php if( have_rows('text_column') ): ?>

            <div class="column-wrapper">

              <?php while( have_rows('text_column') ): the_row();
                $headline = get_sub_field('headline');
                $text = get_sub_field('text');

                ?>

                <div class="text-column batch-reveal">

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


      <?php if( $contactForm ):
        $sectionBgColour = get_sub_field('recipe_background_colour');
        $sectionTitle = get_sub_field('section_title');
        $sectionContent = get_sub_field('section_content');
        $form = get_sub_field('form');
        $imageDetails = get_sub_field('image_details');

        set_query_var('text_content', $sectionContent);

        ?>

        <section class="section-contact layout-grid" title="<?php echo esc_attr( $sectionTitle ); ?>" style="background-color: <?php echo $sectionBgColour; ?>;">

          <?php if( $sectionTitle ): ?>

            <h2 class="section-title"><?php echo $sectionTitle; ?></h2>

          <?php endif; ?>

          <?php get_template_part( 'template-parts/modules/text-content' ); ?>

          <?php if( !empty( $form ) ): ?>

            <div class="form-wrapper"><?php echo $form; ?></div>

          <?php endif; ?>

          <?php if( !empty( $imageDetails ) ):
            $image = $imageDetails['image'];
            set_query_var('image', $image);

            $borderColour = $imageDetails['recipe_frame_colour'];
            ?>

            <?php if( !empty( $image ) ): ?>

              <div class="image-wrapper" style="border-color: <?php echo esc_attr( $borderColour ); ?>;">

                <?php get_template_part( 'template-parts/modules/image' ); ?>

              </div>

            <?php endif; ?>

          <?php endif; ?>

        </section>

      <?php endif; ?>

    <?php endwhile; ?>

  </div>

<?php endif; ?>