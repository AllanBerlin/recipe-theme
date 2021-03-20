const HeaderHandler = (parent, container) => {
  let windowWidth;

  const menuToggle = parent.querySelector('.menu-toggle');

  const init = () => {
    container.classList.remove('menu-visible');

    const menuLinks = parent.querySelectorAll('.menu-item .menu-link');

    for(const link of menuLinks) {
      link.addEventListener('click', scrollToSection);
    }

    windowWidth = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
    if (windowWidth <= 1200) {
      if(menuToggle) {
        menuToggle.addEventListener('click', onMenuClick);
        window.addEventListener('click', onMenuClick);
      }
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

  function scrollToSection(event) {
    event.preventDefault();

    menuToggleCaller();

    const href = this.getAttribute('href');
    const offsetTop = document.querySelector(href).offsetTop;

    scroll({
      top: offsetTop,
      behavior: 'smooth'
    });
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

  init();
};