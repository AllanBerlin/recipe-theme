const HeaderHandler = (parent, container) => {
  let windowWidth;

  const menuToggle = parent.querySelector('.menu-toggle');

  const init = () => {
    container.classList.remove('menu-visible');

    windowWidth = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
    if (windowWidth <= 1200) {
      if(menuToggle) {
        menuToggle.addEventListener('click', onMenuClick);
      }
    } else {
      ScrollTrigger.create({
        start: 'top',
        end: 99999,
        toggleClass: {className: 'shrink', targets: parent}
      });

      activeNavLink();
    }
  };

  function onMenuClick(event) {
    event.stopPropagation();

    menuToggleCaller();

    if(event.target !== menuToggle) {
      parent.classList.remove('show-menu');
      container.classList.remove('menu-visible');
    }
  }

  function menuToggleCaller() {
    if(!parent.classList.contains('show-menu')) {
      parent.classList.add('show-menu');
      container.classList.add('menu-visible');
    } else {
      parent.classList.remove('show-menu');
      container.classList.remove('menu-visible');
    }
  }

  function activeNavLink() {
    const current = window.location.href;

    let navLink = parent.querySelectorAll('.main-navigation a');

    for (let i = navLink.length; i--;) {
      if(navLink[i].href === current) {
        navLink[i].classList.add('active');
      }
    }
  }

  init();
};