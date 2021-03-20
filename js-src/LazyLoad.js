const LazyLoad = parent => {
  const exports = {};

  let _image;
  let _imageUrl;

  function init() {
    _image = parent.querySelector('.image');
    _imageUrl = _image.getAttribute('data-src');

    window.addEventListener('load', lazyLoad);
    window.addEventListener('touchmove', lazyLoad);
    window.addEventListener('scroll', lazyLoad);
  }

  exports.currentImage = () => _image;

  function lazyLoad() {
    if (isInViewport(parent)) {
      _image.addEventListener('load', onImageLoad);

      if (_image.tagName === 'IMG') {
        if (_imageUrl !== null) {
          _image.setAttribute('src', _imageUrl);
          _image.removeAttribute('data-src');
        }
      } else {
        _image.style.backgroundImage = `url("${_imageUrl}")`;
        parent.classList.remove('lazy');
        _image.classList.add('loaded');
      }

      if (_image.length === 0) {
        window.removeEventListener('load', lazyLoad);
        window.removeEventListener('touchmove', lazyLoad);
        window.removeEventListener('scroll', lazyLoad);
      }

      window.removeEventListener('scroll', lazyLoad);
    }
  }

  function onImageLoad() {
    _image.classList.add('loaded');
    parent.classList.remove('lazy');
    _image.removeEventListener('load', onImageLoad);
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
  return exports;
};