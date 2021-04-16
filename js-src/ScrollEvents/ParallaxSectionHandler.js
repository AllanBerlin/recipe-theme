const ParallaxSectionHandler = parent => {
  let textMarkers,
      markerOne,
      markerTwo,
      markerThree,
      markerFour;

  let textSections;

  let lastContent;

  function init() {
    const markers = parent.querySelectorAll('.marker');

    textSections = parent.querySelectorAll('.parallax-text');

    textMarkers = gsap.utils.toArray(markers);
    markerOne = parent.querySelector('.marker-one');
    markerTwo = parent.querySelector('.marker-two');
    markerThree = parent.querySelector('.marker-three');
    markerFour = parent.querySelector('.marker-four');

    document.addEventListener('DOMContentLoaded', () => {
      animateTextSections();
      animateFirstParallaxImages();
      animateSecondParallaxImages();
      animateThirdParallaxImages();
      animateFourthParallaxImages();
    });
  }

  function animateTextSections() {
    ScrollTrigger.create({
      trigger: ".parallax-wrapper",
      start: "-226",
      end: "bottom bottom",
      onUpdate: getCurrentTextSection,
      pin: ".parallax-texts"
    });
  }

  function getCurrentTextSection() {
    let newContent;

    for(let i = 0; i < textMarkers.length; i++) {
      let marker = textMarkers[i];

      if(isInViewport(marker)) {
        let textSectionMarker = textSections[i].dataset.marker,
            markerRef = marker.dataset.marker;

        if(textSectionMarker === markerRef) {
          newContent = textSections[i];
        }
      }
    }

    for(let i = 0; i < textSections.length; i++) {
      textSections[i].classList.add('hidden');
      textSections[i].classList.remove('active');

      if(textSections[i] === newContent) {
        newContent.classList.remove('hidden');
        newContent.classList.add('active');
      } else {
        textSections[i].classList.add('hidden');
        textSections[i].classList.remove('active');
      }
    }
  }

  function animateFirstParallaxImages() {
    gsap.to('.discovery-zoom-call', {
      y: '-40vh',
      ease: 'none',
      scrollTrigger: {
        trigger: markerOne,
        scrub: true
      },
    });

    gsap.to('.discovery-doodle-message', {
      yPercent: -100,
      ease: 'none',
      scrollTrigger: {
        trigger: markerOne,
        scrub: true
      },
    });

    gsap.to('.discovery-doodle-play', {
      yPercent: -100,
      ease: 'none',
      scrollTrigger: {
        trigger: markerOne,
        scrub: true
      },
    });

    gsap.to('.discovery-square-red', {
      yPercent: -100,
      ease: 'none',
      scrollTrigger: {
        trigger: markerOne,
        scrub: true
      },
    });

    gsap.to('.discovery-doodle-lightbulb', {
      yPercent: -100,
      ease: 'none',
      scrollTrigger: {
        trigger: markerOne,
        scrub: true
      },
    });

    gsap.to('.discovery-doodle-meeting', {
      yPercent: -100,
      ease: 'none',
      scrollTrigger: {
        trigger: markerOne,
        scrub: true
      },
    });

    gsap.to('.discovery-doodle-search', {
      yPercent: -100,
      ease: 'none',
      scrollTrigger: {
        trigger: markerOne,
        scrub: true
      },
    });
  }

  function animateSecondParallaxImages() {
    gsap.to('.planning-img-planning', {
      yPercent: -100,
      ease: 'none',
      scrollTrigger: {
        trigger: markerTwo,
        scrub: true
      },
    });

    gsap.to('.planning-img-asana', {
      yPercent: -100,
      ease: 'none',
      scrollTrigger: {
        trigger: markerTwo,
        scrub: true
      },
    });

    gsap.to('.planning-circle-indigo', {
      yPercent: -100,
      ease: 'none',
      scrollTrigger: {
        trigger: markerTwo,
        scrub: true
      },
    });

    gsap.to('.planning-line-blue', {
      yPercent: -100,
      ease: 'none',
      scrollTrigger: {
        trigger: markerTwo,
        scrub: true
      },
    });

    gsap.to('.planning-doodle-notebook', {
      yPercent: -100,
      ease: 'none',
      scrollTrigger: {
        trigger: markerTwo,
        scrub: true
      },
    });

    gsap.to('.planning-doodle-planning', {
      yPercent: -100,
      ease: 'none',
      scrollTrigger: {
        trigger: markerTwo,
        scrub: true
      },
    });

    gsap.to('.planning-doodle-strategy', {
      yPercent: -100,
      ease: 'none',
      scrollTrigger: {
        trigger: markerTwo,
        scrub: true
      },
    });
  }

  function animateThirdParallaxImages() {
    gsap.to('.creation-img-website', {
      yPercent: -100,
      ease: 'none',
      scrollTrigger: {
        trigger: markerThree,
        scrub: true
      },
    });

    gsap.to('.creation-doodle-wireframe', {
      yPercent: -100,
      ease: 'none',
      scrollTrigger: {
        trigger: markerThree,
        scrub: true
      },
    });

    gsap.to('.creation-doodle-paint', {
      yPercent: -100,
      ease: 'none',
      scrollTrigger: {
        trigger: markerThree,
        scrub: true
      },
    });

    gsap.to('.creation-doodle-pencil', {
      yPercent: -100,
      ease: 'none',
      scrollTrigger: {
        trigger: markerThree,
        scrub: true
      },
    });

    gsap.to('.creation-doodle-stars', {
      yPercent: -100,
      ease: 'none',
      scrollTrigger: {
        trigger: markerThree,
        scrub: true
      },
    });

    gsap.to('.creation-rectangle-green', {
      yPercent: -100,
      ease: 'none',
      scrollTrigger: {
        trigger: markerThree,
        scrub: true
      },
    });

    gsap.to('.creation-rectangle-yellow', {
      yPercent: -100,
      ease: 'none',
      scrollTrigger: {
        trigger: markerThree,
        scrub: true
      },
    });
  }

  function animateFourthParallaxImages() {
    gsap.to('.controlling-circle-red', {
      yPercent: -100,
      ease: 'none',
      scrollTrigger: {
        trigger: markerFour,
        scrub: true
      },
    });

    gsap.to('.controlling-doodle-spring', {
      yPercent: -100,
      ease: 'none',
      scrollTrigger: {
        trigger: markerFour,
        scrub: true
      },
    });

    gsap.to('.controlling-doodle-internet', {
      yPercent: -100,
      ease: 'none',
      scrollTrigger: {
        trigger: markerFour,
        scrub: true
      },
    });

    gsap.to('.controlling-doodle-wifi', {
      yPercent: -100,
      ease: 'none',
      scrollTrigger: {
        trigger: markerFour,
        scrub: true
      },
    });

    gsap.to('.controlling-linkedin-icon', {
      yPercent: -100,
      ease: 'none',
      scrollTrigger: {
        trigger: markerFour,
        scrub: true
      },
    });

    gsap.to('.controlling-instagram-icon', {
      yPercent: -100,
      ease: 'none',
      scrollTrigger: {
        trigger: markerFour,
        scrub: true
      },
    });

    gsap.to('.controlling-mail-icon', {
      yPercent: -100,
      ease: 'none',
      scrollTrigger: {
        trigger: markerFour,
        scrub: true
      },
    });

    gsap.to('.controlling-youtube-icon', {
      yPercent: -100,
      ease: 'none',
      scrollTrigger: {
        trigger: markerFour,
        scrub: true
      },
    });

    gsap.to('.controlling-wave-blue', {
      yPercent: -100,
      ease: 'none',
      scrollTrigger: {
        trigger: markerFour,
        scrub: true
      },
    });
  }

  //converts viewport units to pixels (like "50vw" or "20vh" into pixels)
  function toPX(value) {
    return parseFloat(value) / 100 * (/vh/gi.test(value) ? window.innerHeight : window.innerWidth);
  }

  function isInViewport(element) {
    const rect = element.getBoundingClientRect();

    return (
      rect.bottom >= 0 &&
      rect.right >= 0 &&
      rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.left <= (window.innerWidth || document.documentElement.clientWidth)
    );
  }

  init();
};