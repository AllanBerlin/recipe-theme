<?php

/**
 * This function adds the Social Media links Page to admin.
 */
if( function_exists('acf_add_options_page') ) {
  acf_add_options_page(array(
    'page_title' 	=> 'Footer Content',
    'menu_title'	=> 'Footer Content',
    'menu_slug' 	=> 'footer-content',
    'capability'	=> 'edit_posts',
    'position'      => 9,
    'parent_slug'   => '',
    'icon_url' => 'dashicons-pets',
    'redirect'  => true
  ));

  acf_add_options_sub_page(array(
    'page_title' 	=> 'Top Footer Content',
    'menu_title'	=> 'Top Footer',
    'parent_slug'	=> 'footer-content',
  ));

  acf_add_options_sub_page(array(
    'page_title' 	=> 'Bottom Footer Content',
    'menu_title'	=> 'Bottom Footer',
    'parent_slug'	=> 'footer-content',
  ));
}


/**
 * Output the social media icons
 */
function recipe_social_icons_output() {

  if( have_rows('social_network', 'option') ): ?>

    <ul class="links">

      <?php while( have_rows('social_network', 'option') ): the_row();

        $name = get_sub_field('social_name');
        $link = get_sub_field('social_link');
        $icon = get_sub_field('social_icon');

        ?>

        <li class="social-item">

          <?php if( $link ): ?>
            <a href="<?php echo esc_url( $link ); ?>" target="_blank" class="social-link" rel="noopener">

              <span class="icon" title="<?php echo esc_attr( $name ); ?>" style="background-image: url('<?php echo esc_attr( esc_url( $icon ) ) ?>')"></span>

            </a>
          <?php endif; ?>

        </li>

      <?php endwhile; ?>

    </ul>

  <?php endif;
}