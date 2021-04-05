<?php

$image = get_query_var('image');

?>

<?php if( !empty( $image ) ): ?>

  <div class="image-container lazy">

    <div class="image" data-src="<?php echo $image['url']; ?>" title="<?php echo $image['alt']; ?>"></div>

  </div>

<?php endif; ?>
