<?php
/**
 * Template part for displaying the about group field.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package recipe
 */

$about = get_field('about');

?>

<?php if( $about ):
  $aboutSectionTitle = $about['section_title'];
  $aboutImage = $about['image'];
  $aboutDescription = $about['description'];

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

  <div class="about full-container" id="<?php echo recipe_remove_special_chars( $aboutSectionTitle ); ?>">

    <?php if( $aboutImage ): ?>

      <div class="image-wrapper">

        <div class="image-container lazy">

          <div class="image" data-src="<?php echo $aboutImage['url']; ?>" title="<?php echo $aboutImage['alt']; ?>"></div>

        </div>

      </div>

    <?php endif; ?>

    <?php if( $aboutDescription ): ?>

      <div class="content">

        <div class="description"><?php echo wp_kses( $aboutDescription, $allowedHtml ); ?></div>

      </div>

    <?php endif; ?>

  </div>

<?php endif; ?>