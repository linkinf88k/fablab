/**
 * Gallery Lightbox Interaction
 * Click-to-enlarge fullscreen viewer for "HÌNH ẢNH HỌC TẬP TRẢI NGHIỆM"
 * on the Courses page.
 */

(function () {
  "use strict";

  function initGalleryLightbox() {
    var items = document.querySelectorAll(".gallery-item[data-full-image]");
    var modal = document.getElementById("gallery-lightbox-modal");
    var modalImg = document.getElementById("gallery-lightbox-image");
    var closeBtn = document.getElementById("gallery-lightbox-close");

    if (!items.length || !modal || !modalImg) {
      return;
    }

    function openModal(src, alt) {
      modalImg.setAttribute("src", src);
      modalImg.setAttribute("alt", alt || "");
      modal.classList.add("is-open");
      document.body.style.overflow = "hidden";
    }

    function closeModal() {
      modal.classList.remove("is-open");
      document.body.style.overflow = "";
      modalImg.setAttribute("src", "");
    }

    items.forEach(function (item) {
      item.addEventListener("click", function () {
        openModal(
          item.getAttribute("data-full-image"),
          item.getAttribute("data-alt"),
        );
      });
    });

    if (closeBtn) {
      closeBtn.addEventListener("click", closeModal);
    }

    modal.addEventListener("click", function (e) {
      if (e.target === modal) {
        closeModal();
      }
    });

    document.addEventListener("keydown", function (e) {
      if (e.key === "Escape" && modal.classList.contains("is-open")) {
        closeModal();
      }
    });
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initGalleryLightbox);
  } else {
    initGalleryLightbox();
  }
})();
