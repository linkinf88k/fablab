(function () {
  "use strict";

  function initHeroSlider() {
    var container = document.getElementById("hero-slides-container");
    var section = document.getElementById("hero-slider-section");
    if (!container || !section) {
      return;
    }

    var slides = Array.prototype.slice.call(
      container.querySelectorAll(".hero-slide"),
    );
    var dots = Array.prototype.slice.call(
      document.querySelectorAll("#hero-dots [data-slide-index]"),
    );

    if (slides.length <= 1) {
      return;
    }

    var current = 0;
    var intervalId = null;
    var delay = 6000;

    function normalizeIndex(index) {
      if (index < 0) {
        return slides.length - 1;
      }
      if (index >= slides.length) {
        return 0;
      }
      return index;
    }

    function setActiveDot(index) {
      dots.forEach(function (dot, dotIndex) {
        var isActive = dotIndex === index;
        dot.setAttribute("aria-current", isActive ? "true" : "false");
        dot.classList.toggle("is-active", isActive);
        dot.classList.toggle("bg-white", isActive);
        dot.classList.toggle("bg-white/30", !isActive);
      });
    }

    function showSlide(index) {
      current = normalizeIndex(index);

      slides.forEach(function (slide, slideIndex) {
        var isActive = slideIndex === current;
        slide.classList.toggle("active", isActive);
        slide.classList.toggle("hidden", !isActive);
        slide.style.display = isActive ? "block" : "none";
      });

      setActiveDot(current);
    }

    function nextSlide() {
      showSlide(current + 1);
    }

    function stopAutoPlay() {
      if (intervalId) {
        clearInterval(intervalId);
        intervalId = null;
      }
    }

    function startAutoPlay() {
      stopAutoPlay();
      intervalId = setInterval(nextSlide, delay);
    }

    dots.forEach(function (dot) {
      dot.addEventListener("click", function () {
        var idx = Number(dot.getAttribute("data-slide-index"));
        if (!Number.isNaN(idx)) {
          showSlide(idx);
          startAutoPlay();
        }
      });
    });

    section.addEventListener("mouseenter", stopAutoPlay);
    section.addEventListener("mouseleave", startAutoPlay);

    document.addEventListener("visibilitychange", function () {
      if (document.hidden) {
        stopAutoPlay();
      } else {
        startAutoPlay();
      }
    });

    showSlide(0);
    startAutoPlay();
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initHeroSlider);
  } else {
    initHeroSlider();
  }
})();
