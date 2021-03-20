<?php if( have_rows('flexible_service_content') ): ?>

  <?php while( have_rows('flexible_service_content') ) : the_row();
    $bodyText = get_row_layout() == 'body_text';
    $largeImage = get_row_layout() == 'large_image';
    $sideBySide = get_row_layout() == 'side_by_side';
    $videoEmbed = get_row_layout() == 'video_embed';

    ?>

    <?php if( $bodyText ):
      $text = get_sub_field('text');

      ?>

      <div class="text-content layout-module"><?php echo $text; ?></div>

    <?php endif; ?>


    <?php if( $largeImage ):
      $imageLarge = get_sub_field('image');

      ?>

      <div class="large-image">

        <div class="image-container lazy">

          <div class="image" data-src="<?php echo $imageLarge['url']; ?>" title="<?php echo $imageLarge['alt']; ?>"></div>

          <?php if( $imageLarge['caption'] ): ?>

            <span class="caption"><?php echo $imageLarge['caption']; ?></span>

          <?php endif; ?>

        </div>

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

              <?php if( $imageLeft['caption'] ): ?>

                <span class="caption"><?php echo $imageLeft['caption']; ?></span>

              <?php endif; ?>

            </div>

          </div>

          <div class="right-wrapper">

            <div class="image-container lazy">

              <div class="image" data-src="<?php echo $imageRight['url']; ?>" title="<?php echo $imageRight['alt']; ?>"></div>

              <?php if( $imageRight['caption'] ): ?>

                <span class="caption"><?php echo $imageRight['caption']; ?></span>

              <?php endif; ?>

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