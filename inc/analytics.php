<?php

/**
 * Add Google Tag Manager
 */
function recipe_google_universal_tag_and_analytics() { ?>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-VXK3Y9D07Q"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-VXK3Y9D07Q');
  </script>
<?php }
add_action('wp_head', 'recipe_google_universal_tag_and_analytics');


function recipe_true_conversion_analytics() { ?>

  <!-- TruConversion for re-ci-pe.com -->
  <script type="text/javascript">
    var _tip = _tip || [];
    (function(d,s,id){
      var js, tjs = d.getElementsByTagName(s)[0];
      if(d.getElementById(id)) { return; }
      js = d.createElement(s); js.id = id;
      js.async = true;
      js.src = d.location.protocol + '//app.truconversion.com/ti-js/13791/79121.js';
      tjs.parentNode.insertBefore(js, tjs);
    }(document, 'script', 'ti-js'));
  </script>

<?php }
//add_action('wp_head', 'recipe_true_conversion_analytics');