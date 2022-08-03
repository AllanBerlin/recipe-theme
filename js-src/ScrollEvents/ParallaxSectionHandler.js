const ParallaxSectionHandler = parent => {
  let textMarkers,
      markerOne,
      markerTwo,
      markerThree,
      markerFour,
      markerFive;

  let textSections;

  function init() {
    const markers = parent.querySelectorAll('.marker');

    textSections = parent.querySelectorAll('.parallax-text');

    textMarkers = gsap.utils.toArray(markers);
    markerOne = parent.querySelector('.marker-one');
    markerTwo = parent.querySelector('.marker-two');
    markerThree = parent.querySelector('.marker-three');
    markerFour = parent.querySelector('.marker-four');
    markerFive = parent.querySelector('.marker-five');

    document.addEventListener('DOMContentLoaded', () => {
      animateTextSections();
      animateFirstParallaxImages();
      animateSecondParallaxImages();
      animateThirdParallaxImages();
      animateFourthParallaxImages();
      animateFifthParallaxImages();
    });
  }

  function animateTextSections() {
    ScrollTrigger.create({
      trigger: ".parallax-wrapper",
      start: "-166",
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

    gsap.to('.discovery-doodle-plane', {
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

    gsap.to('.discovery-doodle-search', {
      yPercent: -100,
      ease: 'none',
      scrollTrigger: {
        trigger: markerOne,
        scrub: true
      },
    });

    gsap.to('.discovery-circle-indigo', {
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
      yPercent: -200,
      ease: 'none',
      scrollTrigger: {
        trigger: markerTwo,
        scrub: true
      },
    });

    gsap.to('.planning-doodle-strategy', {
      yPercent: -200,
      ease: 'none',
      scrollTrigger: {
        trigger: markerTwo,
        scrub: true
      },
    });
  }

  function animateThirdParallaxImages() {
    gsap.to('.creation-img-website', {
      yPercent: -20,
      ease: 'none',
      scrollTrigger: {
        trigger: markerThree,
        scrub: true
      },
    });

    gsap.to('.creation-doodle-wireframe', {
      yPercent: -20,
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
      yPercent: -300,
      ease: 'none',
      scrollTrigger: {
        trigger: markerThree,
        scrub: true
      },
    });

    gsap.to('.creation-rectangle-yellow', {
      yPercent: -300,
      ease: 'none',
      scrollTrigger: {
        trigger: markerThree,
        scrub: true
      },
    });
  }

  function animateFourthParallaxImages() {
    gsap.to('.assure-pexels-image', {
      yPercent: -100,
      ease: 'none',
      scrollTrigger: {
        trigger: markerFour,
        scrub: true
      },
    });

    gsap.to('.assure-doodle-team', {
      yPercent: -100,
      ease: 'none',
      scrollTrigger: {
        trigger: markerFour,
        scrub: true
      },
    });

    gsap.to('.assure-circle-indigo', {
      yPercent: -100,
      ease: 'none',
      scrollTrigger: {
        trigger: markerFour,
        scrub: true
      },
    });

    gsap.to('.assure-rectangle-red', {
      yPercent: -100,
      ease: 'none',
      scrollTrigger: {
        trigger: markerFour,
        scrub: true
      },
    });

    gsap.to('.assure-doodle-planning', {
      yPercent: -100,
      ease: 'none',
      scrollTrigger: {
        trigger: markerFour,
        scrub: true
      },
    });
  }

  function animateFifthParallaxImages() {
    gsap.to('.controlling-circle-red', {
      yPercent: -750,
      ease: 'none',
      scrollTrigger: {
        trigger: markerFive,
        scrub: true
      },
    });

    gsap.to('.controlling-arrow-screw', {
      yPercent: -100,
      ease: 'none',
      scrollTrigger: {
        trigger: markerFive,
        scrub: true
      },
    });

    gsap.to('.controlling-doodle-at', {
      yPercent: -30,
      ease: 'none',
      scrollTrigger: {
        trigger: markerFive,
        scrub: true
      },
    });

    gsap.to('.controlling-doodle-internet', {
      yPercent: -50,
      ease: 'none',
      scrollTrigger: {
        trigger: markerFive,
        scrub: true
      },
    });

    gsap.to('.controlling-linkedin-icon', {
      yPercent: -220,
      ease: 'none',
      scrollTrigger: {
        trigger: markerFive,
        scrub: true
      },
    });

    gsap.to('.controlling-instagram-icon', {
      yPercent: -350,
      ease: 'none',
      scrollTrigger: {
        trigger: markerFive,
        scrub: true
      },
    });

    gsap.to('.controlling-google-icon', {
      yPercent: -200,
      ease: 'none',
      scrollTrigger: {
        trigger: markerFive,
        scrub: true
      },
    });

    gsap.to('.controlling-mail-icon', {
      yPercent: -400,
      ease: 'none',
      scrollTrigger: {
        trigger: markerFive,
        scrub: true
      },
    });

    gsap.to('.controlling-youtube-icon', {
      yPercent: -100,
      ease: 'none',
      scrollTrigger: {
        trigger: markerFive,
        scrub: true
      },
    });

    gsap.to('.controlling-wave-blue', {
      yPercent: -100,
      ease: 'none',
      scrollTrigger: {
        trigger: markerFive,
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