const ScrollRevealHandler = parent => {

  function init() {
    document.addEventListener('DOMContentLoaded', animateElements);
  }

  function animateElements() {
    gsap.utils.toArray(parent).forEach(elem => {
      hide(elem); // assure that the element is hidden when scrolled into view

      ScrollTrigger.create({
        trigger: elem,
        onEnter: function() { animateFrom(elem) },
        onLeaveBack: self => self.disable()
      });
    });
  }

  function animateFrom(elem, direction) {
    direction = direction || 1;

    let x = 0,
        y = direction * 100;

    if(elem.classList.contains('reveal-left')) {
      x = -100;
      y = 0;
    } else if (elem.classList.contains('reveal-right')) {
      x = 100;
      y = 0;
    }

    elem.style.transform = `translate(${x}px, ${y}px)`;
    elem.style.opacity = '0';

    gsap.fromTo(elem, {x: x, y: y, autoAlpha: 0}, {
      duration: 1.25,
      x: 0,
      y: 0,
      autoAlpha: 1,
      ease: 'expo',
      overwrite: 'auto'
    });
  }

  function hide(elem) {
    gsap.set(elem, {autoAlpha: 0});
  }

  init();
};