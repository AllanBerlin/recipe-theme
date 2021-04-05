<?php

function recipe_google_fonts_customize_register($wp_customize) {

  class Google_Font_Dropdown_Custom_Control extends WP_Customize_Control {
    private $fonts = false;

    public function __construct($manager, $id, $args = array(), $options = array()) {
      $this->fonts = $this->get_google_fonts();
      parent::__construct($manager, $id, $args);
    }

    public function render_content() {
      ?>
      <label class="customize_dropdown_input">
        <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
        <select id="<?php echo esc_attr($this->id); ?>" name="<?php echo esc_attr($this->id); ?>"
                data-customize-setting-link="<?php echo esc_attr($this->id); ?>">
          <?php foreach ($this->fonts as $k => $v) {
            echo '<option value="' . $v['family'] . '" ' . selected($this->value(), $v['family'], false) . '>' . $v['family'] . '</option>';
          }
          ?>
        </select>
      </label>
      <?php
    }

    public function get_google_fonts() {
      if (get_transient('recipe_google_font_list')) {
        $content = get_transient('recipe_google_font_list');
      } else {
        $googleApi = 'https://www.googleapis.com/webfonts/v1/webfonts?sort=alpha&key=AIzaSyDy5mPUZhHowDIKE9fDa27oRkFY3pfkcHg';
        $fontContent = wp_remote_get($googleApi, array('sslverify' => false));
        $content = json_decode($fontContent['body'], true);
        set_transient('recipe_google_font_list', $content, 0);
      }

      return $content['items'];
    }

  }
}
add_action( 'customize_register', 'recipe_google_fonts_customize_register' );


/********* Google Fonts URL function  ***********/
if ( ! function_exists( 'recipe_fonts_url' ) ){
  function recipe_fonts_url() {
    $fonts_url = '';
    $content_font = get_theme_mod('recipe_main_google_font_list', '');
    // Translators: If there are characters in your language that are not supported by Google font, translate it to 'off'. Do not translate into your own language.
    // $content_font = _x( 'on', ''.$content_font.' font: on or off', 'herbst' );

    if ( 'off' !== $content_font ) {
      $font_families = array();

      if ( 'off' !== $content_font ) {
        $font_families[] = $content_font;
      }

      $query_args = array(
        'family' => urlencode( implode( '|', array_unique($font_families) ) . ':wght@400;700' ),
        'display' => 'swap'
      );

      $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css2' );
    }

    return esc_url_raw( $fonts_url );
  }
}


/**
 * Enqueue font family style.
 */
function recipe_google_fonts_link() {
  $fonts_url = '';
  $content_font = get_theme_mod('recipe_main_google_font_list', '');

  if ( $content_font ) {
    $query_args = array(
      'family' => urlencode( $content_font . ':wght@400;700' ),
      'display' => 'swap'
    );

    $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css2' );
  }

  wp_enqueue_style( 'herbst-google-fonts-link', $fonts_url, false );
}
add_action( 'wp_enqueue_scripts', 'recipe_google_fonts_link' );