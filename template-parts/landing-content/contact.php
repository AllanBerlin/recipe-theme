<?php
/**
 * Template part for displaying the contact form on landing page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package recipe
 */

$contactContent = get_field('contact_content');

if( $contactContent):
  $contactSectionTitle = $contactContent['section_title'];
  $contactForm = $contactContent['contact_form'];

  ?>

  <div class="contact full-container" id="<?php echo recipe_remove_special_chars( $contactSectionTitle ); ?>">

    <?php if( $contactForm ): ?>

      <div class="contact-form"><?php echo $contactForm; ?></div>

    <?php endif; ?>

  </div>

<?php endif; ?>