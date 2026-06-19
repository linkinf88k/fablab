/**
 * Teachers Carousel Interaction
 * Auto-rotating carousel for "ĐỘI NGŨ GIÁO VIÊN" on the Courses page,
 * with prev/next arrow controls and pause-on-hover (mirrors banner-slider.js).
 */

(function () {
  "use strict";

  function initTeachersCarousel() {
    var viewport = document.getElementById("teachers-carousel-viewport");
    var track = document.getElementById("teachers-carousel-track");
    if (!viewport || !track) {
      return;
    }

    var cards = Array.prototype.slice.call(track.children);
    if (cards.length <= 1) {
      return;
    }

    var prevBtn = document.getElementById("teachers-carousel-prev");
    var nextBtn = document.getElementById("teachers-carousel-next");

    var current = 0;
    var intervalId = null;
    var delay = 4500;

    function getVisibleCount() {
      var w = window.innerWidth;
      if (w >= 1024) {
        return 3;
      }
      if (w >= 640) {
        return 2;
      }
      return 1;
    }

    function maxIndex() {
      return Math.max(cards.length - getVisibleCount(), 0);
    }

    function render() {
      if (current > maxIndex()) {
        current = maxIndex();
      }
      var step = cards[0].getBoundingClientRect().width;
      track.style.transform = "translateX(-" + step * current + "px)";
    }

    function goTo(index) {
      var max = maxIndex();
      if (index < 0) {
        index = max;
      } else if (index > max) {
        index = 0;
      }
      current = index;
      render();
    }

    function next() {
      goTo(current + 1);
    }

    function prev() {
      goTo(current - 1);
    }

    function stopAutoPlay() {
      if (intervalId) {
        clearInterval(intervalId);
        intervalId = null;
      }
    }

    function startAutoPlay() {
      stopAutoPlay();
      intervalId = setInterval(next, delay);
    }

    if (nextBtn) {
      nextBtn.addEventListener("click", function () {
        next();
        startAutoPlay();
      });
    }

    if (prevBtn) {
      prevBtn.addEventListener("click", function () {
        prev();
        startAutoPlay();
      });
    }

    viewport.addEventListener("mouseenter", stopAutoPlay);
    viewport.addEventListener("mouseleave", startAutoPlay);

    window.addEventListener("resize", render);

    document.addEventListener("visibilitychange", function () {
      if (document.hidden) {
        stopAutoPlay();
      } else {
        startAutoPlay();
      }
    });

    render();
    startAutoPlay();
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initTeachersCarousel);
  } else {
    initTeachersCarousel();
  }
})();
