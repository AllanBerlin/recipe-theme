<?php

$image = get_query_var('image');
$relatedImages = get_query_var('related_images');

?>

<?php if( !empty( $image ) ): ?>

  <div class="featured-images">

    <div class="article-image">

      <div class="image-container lazy">

        <div class="image" data-src="<?php echo $image['url']; ?>" title="<?php echo $image['alt']; ?>"></div>

      </div>

    </div>

    <?php if( !empty( $relatedImages ) ): ?>

      <?php foreach( $relatedImages as $relatedImage ): ?>

        <div class="related-image" data-image-id="<?php echo $relatedImage['id'];?>">

          <div class="image-container lazy">

            <div class="image" data-src="<?php echo $relatedImage['url']; ?>" title="<?php echo $relatedImage['alt']; ?>"></div>

          </div>

        </div>

      <?php endforeach; ?>

    <?php endif; ?>

  </div>

<?php else: ?>

  <div class="placeholder">

    <div class="placeholder-image"></div>

  </div>

<?php endif; ?>
