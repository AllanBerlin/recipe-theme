<?php
$heroAlignment = get_field('hero_alignment');

if( have_rows('hero_image') ): ?>

  <?php while( have_rows('hero_image') ) : the_row();
    $image = get_sub_field('image');
    $title = get_sub_field('title');

    ?>

    <?php if( $image ): ?>

      <div class="hero-image <?php echo $heroAlignment; ?>">

        <div class="image-container lazy">

          <div class="image" data-src="<?php echo $image['url']; ?>" title="<?php echo $image['alt']; ?>"></div>

        </div>

        <?php if( $title ): ?>

          <div class="title-container">

            <h2 class="headline"><?php echo $title; ?></h2>

          </div>

        <?php endif; ?>

      </div>

    <?php endif; ?>

  <?php endwhile; ?>

<?php endif; ?>