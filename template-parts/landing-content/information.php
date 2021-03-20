<?php
/**
 * Template part for displaying the information section on landing page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package recipe
 */

$information = get_field('information');

?>

<?php if( $information ):
  $informationSectionTitle = $information['section_title'];
  $informationTitle = $information['title'];
  $informationAddress = $information['address'];
  $informationPhone = $information['phone'];

  ?>

  <div class="information layout-module" id="<?php echo recipe_remove_special_chars( $informationSectionTitle ); ?>">

    <div class="information-details">

      <?php if( $informationTitle ): ?>

        <h3 class="information-title"><strong><?php echo $informationTitle; ?></strong></h3>

      <?php endif; ?>

      <?php if( $informationAddress ): ?>

        <address class="information-address"><?php echo $informationAddress; ?></address>

      <?php endif; ?>

      <?php if( $informationPhone ): ?>

        <a href="tel:<?php echo str_replace( ' ', '', $informationPhone ); ?>" class="information-phone"><?php echo $informationPhone; ?></a>

      <?php endif; ?>

    </div>

  </div>

<?php endif; ?>