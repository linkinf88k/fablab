/**
 * Header / footer interactions.
 *  - Mobile menu toggle (#mobile-menu-toggle ↔ #mobile-nav-panel) with
 *    hamburger ↔ ✕ icon swap, closing when a panel link is clicked.
 *  - Scroll-to-top button (#scroll-to-top-btn) in the footer.
 */

(function () {
  "use strict";

  function initMobileMenu() {
    var toggle = document.getElementById("mobile-menu-toggle");
    var panel = document.getElementById("mobile-nav-panel");
    if (!toggle || !panel) {
      return;
    }

    var menuIcon = toggle.querySelector(".menu-icon");
    var xIcon = toggle.querySelector(".x-icon");

    function setOpen(isOpen) {
      panel.classList.toggle("hidden", !isOpen);
      if (menuIcon) {
        menuIcon.classList.toggle("hidden", isOpen);
      }
      if (xIcon) {
        xIcon.classList.toggle("hidden", !isOpen);
      }
      toggle.setAttribute("aria-expanded", isOpen ? "true" : "false");
    }

    toggle.addEventListener("click", function () {
      setOpen(panel.classList.contains("hidden"));
    });

    // Close after tapping any link inside the panel.
    panel.querySelectorAll("a").forEach(function (link) {
      link.addEventListener("click", function () {
        setOpen(false);
      });
    });
  }

  function initScrollToTop() {
    var btn = document.getElementById("scroll-to-top-btn");
    if (!btn) {
      return;
    }
    btn.addEventListener("click", function () {
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
  }

  function init() {
    initMobileMenu();
    initScrollToTop();
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }
})();
