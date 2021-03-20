const PrivacyPolicyHandler = parent => {
  let user;

  const init = () => {
    user = getCookie('lb_privacy_agreed');
    if (!user) {
      parent.style.display = 'block';
    }

    const closePP = parent.querySelector('.close');
    closePP.addEventListener('click', privacyPolicyAgree);
  };

  function privacyPolicyAgree() {
    parent.style.display = 'none';

    if(!user) {
      setCookie('lb_privacy_agreed', 1, 365);
    }
  }

  function setCookie(cname, cvalue, exdays) {
    const date = new Date();

    date.setTime(date.getTime() + (exdays * 24 * 60 * 60 * 1000));

    const expires = `expires=${date.toUTCString()}`;

    document.cookie = `${cname}=${cvalue};${expires};path=/`;
  }

  function getCookie(cname) {
    const name = `${cname}=`;
    const ca = document.cookie.split(';');

    for(let i = 0; i < ca.length; i++) {
      let c = ca[i];

      while(c.charAt(0) === ' ') {
        c = c.substring(1);
      }

      if(c.indexOf(name) === 0) {
        return c.substring(name.length, c.length);
      }
    }
    return '';
  }

  init();
};