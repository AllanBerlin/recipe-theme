const BatchRevealHandler = parent => {

  function init() {
    document.addEventListener('DOMContentLoaded', animateBatchElements);

    gsap.defaults({ease: 'power3'});
    gsap.set(parent, {y: 100});

    ScrollTrigger.addEventListener('refreshInit', () => gsap.set(parent, {y: 0}));
  }

  function animateBatchElements() {
    ScrollTrigger.batch(parent, {
      interval: 0.1, // time window (in seconds) for batching to occur. The first callback that occurs (of its type) will start the timer, and when it elapses, any other similar callbacks for other targets will be batched into an array and fed to the callback. Default is 0.1
      batchMax: 4,   // maximum batch size (targets)
      onEnter: batch => gsap.to(batch, {autoAlpha: 1, y: 0, stagger: 0.15, overwrite: true})
    });
  }

  init();
};