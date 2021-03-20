<?php
$contactContent = get_field('contact_content');

if( $contactContent):
  $contactSectionTitle = $contactContent['section_title'];
  $contactForm = $contactContent['contact_form'];
  $contactDetails = $contactContent['contact_details'];

  ?>

  <div class="contact full-container" id="<?php echo recipe_remove_special_chars( $contactSectionTitle ); ?>">

    <?php if( $contactForm ): ?>

      <div class="contact-form"><?php echo $contactForm; ?></div>

    <?php endif; ?>

    <?php if( $contactDetails ):
      $contactTitle = $contactDetails['title'];
      $contactAddress = $contactDetails['address'];
      $contactPhone = $contactDetails['phone'];

      ?>

      <div class="contact-details">

        <?php if( $contactTitle ): ?>

          <h4 class="contact-title"><strong><?php echo $contactTitle; ?></strong></h4>

        <?php endif; ?>

        <?php if( $contactAddress ): ?>

          <address class="contact-address"><?php echo $contactAddress; ?></address>

        <?php endif; ?>

        <?php if( $contactPhone ): ?>

          <a href="tel:<?php echo str_replace( ' ', '', $contactPhone ); ?>" class="contact-phone"><?php echo $contactPhone; ?></a>

        <?php endif; ?>

      </div>

    <?php endif; ?>

  </div>

<?php endif; ?>