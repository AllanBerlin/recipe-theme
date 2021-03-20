/**
 main class handles resize events, view changes and initialises scrolling behavior
 */
const App = (() => {

  function init() {
    let i;

    const body = document.body;
    const header = document.querySelector('.layout-header');
    const policyPopup = document.querySelector('.policy-popup');
    const imageContainer = document.querySelectorAll('.image-container');
    const sliders = document.querySelectorAll('.slider');

    if(header) {
      HeaderHandler(header, body);
    }

    if(policyPopup) {
      PrivacyPolicyHandler(policyPopup);
    }

    if(body.classList.contains('home')) {
      // call the helper to get exact viewport height, especially for mobile browsers
      viewportHeightHelper();
    }

    if(imageContainer.length > 0) {
      for(i = 0; i < imageContainer.length; i++) {
        LazyLoad(imageContainer[i]);
      }
    }

    if(sliders.length > 0) {
      for(i = sliders.length; i--;) {
        SliderHandler(sliders[i]);
      }
    }
  }

  const viewportHeightHelper = () => {
    // First we get the viewport height and we multiple it by 1% to get a value for a vh unit
    const vh = window.innerHeight * 0.01;

    // Then we set the value in the --vh custom property to the root of the document
    document.documentElement.style.setProperty('--vh', `${vh}px`);
  };

  init();
})();