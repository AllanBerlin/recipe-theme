<?php
$heroImageCarousel = get_field('hero_image_carousel');
$heroAlignment = get_field('hero_alignment');

if( $heroImageCarousel ): ?>

  <div class="slider <?php echo $heroAlignment; ?>">

    <ul class="slides">

      <?php foreach( $heroImageCarousel as $key => $image ): ?>

        <li class="slide-item<?php echo ( $key === 0 ) ? ' showing' : ''; ?>">

          <div class="image-container lazy">

            <div class="image slide-image" data-src="<?php echo $image['url']; ?>" title="<?php echo $image['alt']; ?>"></div>

            <h3 class="slide-title"><?php echo $image['caption']; ?></h3>

          </div>

        </li>

      <?php endforeach; ?>

    </ul>

    <div class="slider-nav">

      <button type="button" class="prev" title="Previous"></button>

      <button type="button" class="next" title="Next"></button>

    </div>

  </div>

<?php endif; ?>