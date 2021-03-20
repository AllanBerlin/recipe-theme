<?php
$heroVideo = get_field('hero_video');
$heroAlignment = get_field('hero_alignment');

?>

  <?php if( $heroVideo ):
    $videoType = $heroVideo['video_type'];

    ?>

    <?php if( $videoType === 'external-video' ):
      $externalVideo = $heroVideo['external_video'];

      ?>

      <div class="hero-video <?php echo $heroAlignment; ?>">

        <div class="video-container"><?php echo $externalVideo; ?></div>

      </div>

    <?php elseif( $videoType === 'upload-video' ):
      $videoUpload = $heroVideo['video_upload'];

      ?>

      <div class="hero-video <?php echo $heroAlignment; ?>">

        <div class="video-container">

          <video src="<?php echo $videoUpload; ?>" class="video" preload="auto" controls></video>

        </div>

      </div>

    <?php endif; ?>

  <?php endif; ?>
