<?php
$mainImage = get_field('article_image');

if( $mainImage ): ?>

  <div class="hero-image">

    <div class="image-container lazy">

      <div class="image" data-src="<?php echo $mainImage['url']; ?>" title="<?php echo $mainImage['alt']; ?>"></div>

    </div>

  </div>

<?php endif; ?>