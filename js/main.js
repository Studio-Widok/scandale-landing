function throttle(ms, callback) {
  let lastCall = 0;
  let timeout;
  return function (a) {
    var now = new Date().getTime(),
      diff = now - lastCall;
    if (diff >= ms) {
      lastCall = now;
      callback(a);
    } else {
      clearTimeout(timeout);
      timeout = setTimeout(
        (function (a) {
          return function () {
            callback(a);
          };
        })(a),
        ms
      );
    }
  };
}

function onResize() {
  document.documentElement.style
    .setProperty('--vh', `${window.innerHeight / 100}px`);

  fades.forEach(e => e.resize());
}

function onScroll() {
  fades.forEach(e => e.check());
}

function checkFadeQueue() {
  if (fadeQueue.length === 0) return;

  const target = fadeQueue.splice(0, 1)[0]
  target.inQueue = false;
  const isDisplayed = target.check();
  if (fadeQueue.length > 0) {
    if (isDisplayed) {
      setTimeout(checkFadeQueue, delay);
    }
    else {
      checkFadeQueue();
    }
  }
}

class Fade {
  constructor(element) {
    this.element = $(element);
    this.offset;
    this.active = false;
    this.inQueue = false;

    this.resize();
  }

  resize() {
    this.offset = this.element.offset().top;

    this.check();
  }

  check() {
    if (this.inQueue) return false;
    if (this.offset < window.scrollY + window.innerHeight) {
      this.activate();
      return true;
    }
    this.deactivate();
    return false;
  }

  activate() {
    if (this.active) return;

    const now = new Date().getTime();
    if (now >= lastFade + delay) {
      this.active = true;
      this.element.addClass('active');

      lastFade = now;
    }
    else {
      this.inQueue = true;
      fadeQueue.push(this);

      if (fadeQueue.length === 1) {
        setTimeout(checkFadeQueue, delay);
      }
    }
  }

  deactivate() {
    if (!this.active) return;

    this.active = false;
    this.element.removeClass('active');
  }
}

let lastFade = 0;
const fadeQueue = [];
const delay = 200;
const fades = [];
$('.fade').each((index, element) => {
  fades.push(new Fade(element));
});

window.addEventListener('load', onResize);
window.addEventListener('resize', throttle(100, onResize));
window.addEventListener('scroll', throttle(100, onScroll));
onResize();