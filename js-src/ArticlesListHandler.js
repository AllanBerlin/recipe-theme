const ArticlesListHandler = parent => {
  let loadMoreBtn;

  function init() {
    loadMoreBtn = parent.querySelector('.load-more');

    if(loadMoreBtn) {
      loadMoreBtn.addEventListener('click', showMoreArticles);
    }
  }

  function showMoreArticles() {
    let articles = parent.querySelectorAll('.article-item.hide');

    if(articles.length > 0) {
      console.log(articles);

      for(let i = 0; i < 6 && i < articles.length; i++) {console.log(articles[i]);
        articles[i].classList.add('show');
        articles[i].classList.remove('hide');
      }

    }

    if(articles.length < 1) {
      loadMoreBtn.classList.add('inactive');
    }
  }

  init();
};