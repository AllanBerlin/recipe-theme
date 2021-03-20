const SliderHandler = parent => {
  let slides;

  let currentSlide = 0;

  function init() {
    slides = parent.querySelectorAll('.slide-item');
    if (slides === undefined || slides === null) return;

    const nextButton = parent.querySelector('.next');
    const prevButton = parent.querySelector('.prev');

    if (nextButton) {
      nextButton.addEventListener('click', nextSlide);
    }

    if (prevButton) {
      prevButton.addEventListener('click', prevSlide);
    }
  }

  function nextSlide(event) {
    event.preventDefault();

    currentSlide++;
    currentSlide = currentSlide % slides.length;
    goToSlide(currentSlide);
  }

  function prevSlide(event) {
    event.preventDefault();

    currentSlide--;
    currentSlide = (currentSlide < 0) ? slides.length - 1 : currentSlide;
    goToSlide(currentSlide);
  }

  function goToSlide(n) {
    currentSlide = (parseInt(n, 10) + slides.length) % slides.length;

    for (let i = slides.length; i--;) {
      if (i !== currentSlide) {
        slides[i].classList.remove('showing');
      } else {
        slides[i].classList.add('showing');
      }
    }
  }

  init();
};