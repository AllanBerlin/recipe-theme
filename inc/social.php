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

        <li class="social-item <?php echo esc_attr( strtolower( $name ) ); ?>">

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


/**
 * Social Share Buttons
 *
 * @param string $content
 * @return string
 */
function recipe_social_sharing_buttons( $content = '' ) {
  if ( is_single() ) {
    // Get current page URL
    $recipeURL = urlencode( get_permalink() );

    // Get current page title
    $recipeTitle = str_replace( ' ', '%20', get_the_title() );

    // Construct sharing URL without using any script
    $twitterURL = 'https://twitter.com/intent/tweet?text='.$recipeTitle.'&amp;url='.$recipeURL.'&amp;via=recipe';
    $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$recipeURL;
    $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$recipeURL;
    $copyURL = esc_url( get_permalink() );

    // Add sharing button at the end of page/page content
    $content .= '<div class="share-buttons">';
      $content .= '<a class="share-button facebook" href="'.$facebookURL.'" target="_blank" title="Share on Facebook">Share</a>';
      $content .= '<a class="share-button twitter" href="'. $twitterURL .'" target="_blank" title="Tweet on Twitter">Tweet</a>';
      $content .= '<a class="share-button linkedin" href="'.$linkedInURL.'" target="_blank" title="Share on LinkedIn">Share</a>';
      $content .= '<button class="share-button copy-article" data-href="'.$copyURL.'" title="Copy Article">Copy</button>';
    $content .= '</div>';

    return $content;
  } else {
    return '';
  }
}

/**
 * Social Share Buttons Mobile
 *
 * @param string $content
 * @return string
 */
function recipe_social_sharing_buttons_mobile( $content = '' ) {
  if ( is_single() ) {
    // Get current page URL
    $recipeURL = urlencode( get_permalink() );

    // Get current page title
    $recipeTitle = str_replace( ' ', '%20', get_the_title() );

    // Construct sharing URL without using any script
    $twitterURL = 'https://twitter.com/intent/tweet?text='.$recipeTitle.'&amp;url='.$recipeURL.'&amp;via=recipe';
    $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$recipeURL;
    $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$recipeURL;
    $copyURL = esc_url( get_permalink() );

    // Add sharing button at the end of page/page content
    $content .= '<div class="share-buttons mobile">';
    $content .= '<a class="share-button facebook" href="'.$facebookURL.'" target="_blank" title="Share on Facebook"></a>';
    $content .= '<a class="share-button twitter" href="'. $twitterURL .'" target="_blank" title="Tweet on Twitter"></a>';
    $content .= '<a class="share-button linkedin" href="'.$linkedInURL.'" target="_blank" title="Share on LinkedIn"></a>';
    $content .= '<button class="share-button copy-article" data-href="'.$copyURL.'" title="Copy Article"></button>';
    $content .= '</div>';

    return $content;
  } else {
    return '';
  }
}
