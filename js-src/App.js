/**
 main class handles resize events, view changes and initialises scrolling behavior
 */
const App = (() => {

  function init() {
    let i;

    const body = document.body;
    const header = document.querySelector('.layout-header');

    const articleDetailPage = document.querySelector('.single .article-detail');

    const sectionArticlesList = document.querySelector('.section-articles-list');
    const sectionContact = document.querySelector('.section-contact');
    const policyPopup = document.querySelector('.policy-popup');
    const imageContainer = document.querySelectorAll('.image-container');
    const sliders = document.querySelectorAll('.slider');
    const articlesSliders = document.querySelectorAll('.section-articles-slider');
    const scrollRevealElements = document.querySelectorAll('.reveal');
    const batchRevealElements = document.querySelectorAll('.batch-reveal');
    const brDesktopElements = document.querySelectorAll('.br-desktop');
    const parallaxSectionList = document.querySelector('.section-parallax-list');

    const windowWidth = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
    const windowHeight = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);

    const screenDimensions = {
      width: windowWidth,
      height: windowHeight
    }

    document.addEventListener('DOMContentLoaded', function() {
      gsap.registerPlugin(ScrollTrigger);
    });

    if(header) {
      HeaderHandler(header, body);
    }

    if(body.classList.contains('single-post')) {
      // Animate Scroll Progress Bar
      window.addEventListener('scroll', scrollProgressBar);
    }

    if(articleDetailPage) {
      ArticleDetailHandler(articleDetailPage);
    }

    if(sectionArticlesList) {
      ArticlesListHandler(sectionArticlesList);
    }

    if(sectionContact) {
      ContactFormHandler(sectionContact);
    }

    // if(policyPopup) {
    //   PrivacyPolicyHandler(policyPopup);
    // }

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

    if(scrollRevealElements.length > 0) {
      ScrollRevealHandler(scrollRevealElements);
    }

    if(batchRevealElements.length > 0) {
      BatchRevealHandler(batchRevealElements);
    }

    if(windowWidth >= 1200) {
      if(brDesktopElements.length > 0) {
        BatchRevealHandler(brDesktopElements);
      }
    }

    if(windowWidth > 768) {
      if(parallaxSectionList) {
        ParallaxSectionHandler(parallaxSectionList);
      }

      if(articlesSliders.length > 0) {
        for(i = articlesSliders.length; i--;) {
          CarouselSlider(articlesSliders[i]);
        }
      }
    }

    // call the helper to get exact viewport height, especially for mobile browsers
    viewportHeightHelper();
  }

  const viewportHeightHelper = () => {
    // First we get the viewport height and we multiple it by 1% to get a value for a vh unit
    const vh = window.innerHeight * 0.01;

    // Then we set the value in the --vh custom property to the root of the document
    document.documentElement.style.setProperty('--vh', `${vh}px`);
  };

  const scrollProgressBar = () => {
    let windowScroll = document.body.scrollTop || document.documentElement.scrollTop,
        height = document.querySelector('.article-detail').clientHeight,
        scrolled = (windowScroll / height) * 100;

    document.querySelector('.scroll-progress').style.width = scrolled + '%';
  };

  init();
})();