(function () {
  "use strict";

  function initAboutTabs() {
    var buttons = document.querySelectorAll(".about-tab-btn");
    var contents = document.querySelectorAll(".about-tab-content");

    if (buttons.length === 0 || contents.length === 0) {
      return;
    }

    // Set first tab as active on init
    if (buttons[0]) {
      buttons[0].classList.add("active");
      buttons[0].setAttribute("aria-pressed", "true");
    }

    buttons.forEach(function (button) {
      button.addEventListener("click", function (e) {
        e.preventDefault();

        var tabIndex = this.getAttribute("data-tab");

        // Remove active class from all buttons
        buttons.forEach(function (btn) {
          btn.classList.remove("active");
          btn.setAttribute("aria-pressed", "false");
        });

        // Hide all content
        contents.forEach(function (content) {
          content.classList.add("hidden");
        });

        // Add active class to clicked button
        this.classList.add("active");
        this.setAttribute("aria-pressed", "true");

        // Show corresponding content
        var activeContent = document.querySelector(
          ".about-tab-content[data-tab='" + tabIndex + "']",
        );
        if (activeContent) {
          activeContent.classList.remove("hidden");
        }
      });
    });
  }

  // Initialize when DOM is ready
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initAboutTabs);
  } else {
    initAboutTabs();
  }
})();
