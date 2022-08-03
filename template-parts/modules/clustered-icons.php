<?php

$pageID = get_query_var('page_id');

?>

<?php if( have_rows( 'clustered_icons', $pageID ) ): ?>

  <div class="clustered-images">

    <?php while( have_rows( 'clustered_icons', $pageID ) ) : the_row();
      $iconGroup = get_sub_field('icon_group');

      ?>

      <?php if( $iconGroup ):
        $icons = $iconGroup['icons'];

        ?>

        <?php if( !empty( $icons ) ):
        $iconsClass = get_field('classname', $icons['ID']);
        set_query_var( 'image', $icons );

        ?>

        <div class="clustered-image<?php echo $iconsClass ? ' ' . $iconsClass : ''; ?>">

          <?php get_template_part( 'template-parts/modules/image' ); ?>

        </div>

      <?php endif; ?>

      <?php endif; ?>

    <?php endwhile; ?>

  </div>

<?php endif; ?>
