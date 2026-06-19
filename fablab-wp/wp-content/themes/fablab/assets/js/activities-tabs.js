/**
 * Activities Tabs Interaction
 * Handles tab switching for "CÁC HOẠT ĐỘNG NỖI BẬT" section
 * Tabs: 1 = Khóa Học, 2 = Tin Tức, 3 = Hợp Tác
 */

(function () {
  "use strict";

  function initActivitiesTabs() {
    const tabButtons = document.querySelectorAll(".activities-tab-pill");
    const tabPanes = document.querySelectorAll(".activities-tab-pane");

    if (!tabButtons.length || !tabPanes.length) {
      return; // Exit if elements don't exist
    }

    // Initialize: set first tab as active
    if (tabButtons.length > 0) {
      tabButtons[0].classList.add("active");
      tabButtons[0].setAttribute("aria-pressed", "true");
    }

    // Add click handlers to each tab button
    tabButtons.forEach((button) => {
      button.addEventListener("click", function (e) {
        e.preventDefault();

        const tabValue = this.getAttribute("data-tab");

        // Remove active state from all buttons and panes
        tabButtons.forEach((btn) => {
          btn.classList.remove("active");
          btn.setAttribute("aria-pressed", "false");
        });

        tabPanes.forEach((pane) => {
          pane.classList.add("hidden");
        });

        // Set active state on clicked button
        this.classList.add("active");
        this.setAttribute("aria-pressed", "true");

        // Show corresponding pane
        const activePane = document.querySelector(
          `.activities-tab-pane[data-tab="${tabValue}"]`,
        );
        if (activePane) {
          activePane.classList.remove("hidden");
        }
      });
    });
  }

  // Initialize when DOM is ready
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initActivitiesTabs);
  } else {
    initActivitiesTabs();
  }
})();
