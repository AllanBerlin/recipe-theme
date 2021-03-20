<?php
/**
 * Template part for displaying the intro content field.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package herbst
 */

$introContent = get_field('intro_content');

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

<?php if( $introContent ): ?>

  <div class="intro-wrapper">

    <div class="intro-text"><?php echo wp_kses( $introContent, $allowedHtml ); ?></div>

  </div>

<?php endif; ?>