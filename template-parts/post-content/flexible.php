<?php if( have_rows('flexible_article_content') ): ?>

  <?php while( have_rows('flexible_article_content') ) : the_row();
    $bodyText = get_row_layout() == 'body_text';
    $largeImage = get_row_layout() == 'large_image';
    $slideshow = get_row_layout() == 'slideshow';
    $videoEmbed = get_row_layout() == 'video_embed';
    $pullQuote = get_row_layout() == 'pull_quote';
    $portrait = get_row_layout() == 'portrait_image';
    $sideBySide = get_row_layout() == 'side_by_side';

    ?>

    <?php if( $bodyText ):
      $textContent = get_sub_field('section_content');
      set_query_var('text_content', $textContent);

      ?>

      <?php get_template_part( 'template-parts/modules/text-content' ); ?>

    <?php endif; ?>


    <?php if( $largeImage ):
      $imageLarge = get_sub_field('image');
      set_query_var('image', $imageLarge);

      ?>

      <div class="large-image">

        <?php get_template_part( 'template-parts/modules/image' ); ?>

      </div>

    <?php endif; ?>


    <?php if( $sideBySide ):
      $imageLeft = get_sub_field('image_left');
      $imageRight = get_sub_field('image_right');

      ?>

      <?php if( $imageLeft && $imageRight ): ?>

        <div class="side-by-side">

          <div class="left-wrapper">

            <div class="image-container lazy">

              <div class="image" data-src="<?php echo $imageLeft['url']; ?>" title="<?php echo $imageLeft['alt']; ?>"></div>

            </div>

          </div>

          <div class="right-wrapper">

            <div class="image-container lazy">

              <div class="image" data-src="<?php echo $imageRight['url']; ?>" title="<?php echo $imageRight['alt']; ?>"></div>

            </div>

          </div>

        </div>

      <?php endif; ?>

    <?php endif; ?>


    <?php if( $videoEmbed ):
      $video = get_sub_field('video');
      $videoDescription = get_sub_field('video_description');

      ?>

      <?php if( $video ): ?>

        <div class="video-embed<?php if( $videoDescription ) echo ' has-description';?>">

          <div class="video"><?php echo $video; ?></div>

          <?php if( $videoDescription ): ?>

            <div class="video-description"><?php echo $videoDescription; ?></div>

          <?php endif; ?>

        </div>

      <?php endif; ?>

    <?php endif; ?>

  <?php endwhile; ?>

<?php endif; ?>