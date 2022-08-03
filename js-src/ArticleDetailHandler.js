const ArticleDetailHandler = parent => {
  let copyBtn;

  function init() {
    copyBtn = parent.querySelectorAll('.copy-article');

    for(let i = copyBtn.length; i--;) {
      if(copyBtn[i]) {
        copyBtn[i].addEventListener('click', copyLink);
      }
    }
  }

  function copyLink(event) {
    event.preventDefault();

    const copyText = event.target.getAttribute('data-href');
    const textarea = document.createElement('textarea');

    textarea.textContent = copyText;
    textarea.style.position = 'fixed'; // Prevent scrolling to bottom of page in MS Edge.
    document.body.appendChild(textarea);
    textarea.select();
    document.execCommand('copy');

    document.body.removeChild(textarea);
  }

  init();
};