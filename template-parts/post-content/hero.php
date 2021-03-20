<?php
$mainImage = get_field('main_image');

if( $mainImage ): ?>

  <div class="hero-image">

    <div class="image-container lazy">

      <div class="image" data-src="<?php echo $mainImage['url']; ?>" title="<?php echo $mainImage['alt']; ?>"></div>

    </div>

    <h1 class="entry-title"><strong><?php the_title(); ?></strong></h1>

  </div>

<?php endif; ?>