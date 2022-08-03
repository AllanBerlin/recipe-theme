const CarouselSlider = parent => {
  let articlesWrapper;
  let indicators;
  let imageBadge;

  function init() {
    articlesWrapper = parent.querySelectorAll('.articles-wrapper');
    indicators = parent.querySelector('.indicators');
    imageBadge = indicators.querySelectorAll('.image-badge');

    if(articlesWrapper.length > 1) {
      indicators.classList.add('show');

      for(let i = 0; i < imageBadge.length; i++) {
        imageBadge[i].addEventListener('click', goToSlide);

        imageBadge[0].classList.add('active');
      }
    }
  }

  function goToSlide(event) {
    const target = event.currentTarget;
    const dataItem = target.getAttribute('data-item');

    if(target === event.target && !target.classList.contains('active')) {
      target.classList.add('active');

      for(let i = articlesWrapper.length; i--;) {
        gsap.to(articlesWrapper[i], 0.3, {x: '-' + dataItem + '00%', ease: Sine.easeOut});

        const imageContainer = articlesWrapper[i].querySelectorAll('.image-container');

        if(imageContainer.length > 0) {
          for(let j = 0; j < imageContainer.length; j++) {
            window.dispatchEvent(new CustomEvent('loadSlideImage'));
            imageContainer[j].classList.add('in-view');
          }
        }
      }
    }

    for(let i = 0; i < imageBadge.length; i++) {
      if(imageBadge[i] !== target) {
        imageBadge[i].classList.remove('active');
      }
    }
  }

  init();
};