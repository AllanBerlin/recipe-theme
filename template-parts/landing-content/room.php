<?php
/**
 * Template part for displaying the room group field.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package herbst
 */

$room = get_field('room');

?>

<?php if( $room ):
  $roomSectionTitle = $room['section_title'];
  $roomImage = $room['image'];
  $roomDescription = $room['description'];

  $allowedHtml = [
    'a'      => [
      'href'  => [],
      'title' => [],
      'target' => [],
      'rel' => []
    ],
    'br'     => [],
    'em'     => [],
    'strong' => [],
    'p' => [],
  ];

  ?>

  <div class="room full-container" id="<?php echo herbst_remove_special_chars( $roomSectionTitle ); ?>">

    <?php if( $roomDescription ): ?>

      <div class="content">

        <div class="description"><?php echo wp_kses( $roomDescription, $allowedHtml ); ?></div>

      </div>

    <?php endif; ?>

    <?php if( $roomImage ): ?>

      <div class="image-wrapper">

        <div class="image-container lazy">

          <div class="image" data-src="<?php echo $roomImage['url']; ?>" title="<?php echo $roomImage['alt']; ?>"></div>

        </div>

      </div>

    <?php endif; ?>

  </div>

<?php endif; ?>