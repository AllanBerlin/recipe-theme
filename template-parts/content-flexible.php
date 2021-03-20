<?php if( have_rows('flexible_content') ): ?>

  <?php while( have_rows('flexible_content') ) : the_row();
    $bodyText = get_row_layout() == 'body_text';
    $fullImage = get_row_layout() == 'full_image';
    $fullVideo = get_row_layout() == 'full_video';
    $largeImage = get_row_layout() == 'large_image';
    $slideshow = get_row_layout() == 'slideshow';
    $videoEmbed = get_row_layout() == 'video_embed';
    $pullQuote = get_row_layout() == 'pull_quote';
    $portrait = get_row_layout() == 'portrait_image';
    $sideBySide = get_row_layout() == 'side_by_side';
    $agencyDetails = get_row_layout() == 'agency_details';
    $teamMembers = get_row_layout() == 'team_members';
    $parallax = get_row_layout() == 'parallax';
    $servicePosts = get_row_layout() == 'service_posts';

    ?>


    <?php if( $agencyDetails ):
      $sectionTitle = herbst_remove_special_chars( get_sub_field('section_title') );
      $headline = get_sub_field('details_headline');

      ?>

      <div class="details-container">

        <?php if( have_rows('illustration_and_content') ): ?>

          <?php while( have_rows('illustration_and_content') ) : the_row();
            $defaultIllustration = get_sub_field('default_illustration');
            $imageLinkItems = get_sub_field('image_link_items');

            ?>

            <div class="grid grid-two">

              <div class="illustration-container">

                <div class="image-container lazy">

                  <div class="image" data-src="<?php echo $defaultIllustration['url']; ?>" style="background-image: url('')" title="<?php echo $defaultIllustration['alt']; ?>"></div>

                  <?php foreach( $imageLinkItems as $imageLinkItem ):
                    $linkTitle = herbst_remove_special_chars( $imageLinkItem['link']['title'] );

                    ?>

                    <div class="hover-image" data-image-name="<?php echo $linkTitle; ?>" data-image-url="<?php echo $imageLinkItem['image']['url']; ?>"></div>

                  <?php endforeach; ?>

                </div>

              </div>

              <div class="links-container">

                <?php if( $headline ): ?>

                  <h3 class="details-headline"><?php echo $headline; ?></h3>

                <?php endif; ?>

                <?php foreach( $imageLinkItems as $imageLinkItem ):
                  $imageLink = $imageLinkItem['link'];

                  ?>

                  <?php if( $imageLink ):
                    $linkUrl = $imageLink['url'];
                    $linkTitle = herbst_remove_special_chars( $imageLink['title'] );
                    $linkTarget = $imageLink['target'] ? $imageLink['target'] : '_self';

                    ?>

                    <a href="<?php echo esc_url( $linkUrl ); ?>" target="<?php echo esc_attr( $linkTarget ); ?>" class="link-button" data-image-link="<?php echo $linkTitle; ?>"><?php echo esc_html( $imageLink['title'] ); ?></a>

                  <?php endif; ?>

                <?php endforeach; ?>

              </div>

            </div>

          <?php endwhile; ?>

        <?php endif; ?>

      </div>

    <?php endif; ?>


    <?php if( $teamMembers ): ?>

      <div class="details-container">

        <?php if( have_rows('team_member') ): ?>

          <div class="grid grid-three">

            <?php while( have_rows('team_member') ) : the_row();
              $memberImage = get_sub_field('image');
              $memberDescription = herbst_clean_text( get_sub_field('description') );

              ?>

              <div class="team-member">

                <div class="image-container lazy">

                  <div class="image" data-src="<?php echo $memberImage['url']; ?>" style="background-image: url('')" title="<?php echo $memberImage['alt']; ?>"></div>

                </div>

                <?php if( $memberDescription ): ?>

                  <div class="description-container"><?php echo $memberDescription; ?></div>

                <?php endif; ?>

              </div>

            <?php endwhile; ?>

          </div>

        <?php endif; ?>

      </div>

    <?php endif; ?>


    <?php if( $servicePosts ): ?>

      <div class="details-container">

        <?php if( have_rows('service_post_list') ): ?>

          <div class="grid grid-two">

            <?php while( have_rows('service_post_list') ) : the_row();
              $servicePost = get_sub_field('service_post');

              ?>

              <?php if( $servicePost ):
                $post = $servicePost;
                setup_postdata( $post );

                ?>

                <?php get_template_part( 'template-parts/content', 'grid' ); ?>

                <?php wp_reset_postdata(); ?>

              <?php endif; ?>

            <?php endwhile; ?>

          </div>

        <?php endif; ?>

      </div>

    <?php endif; ?>

  <?php endwhile; ?>

<?php endif; ?>