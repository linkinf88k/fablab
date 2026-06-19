/**
 * Lead / registration form UX.
 *
 * Presentation-only for now: on submit we block the default page reload,
 * hide the form and reveal its sibling success message. No data is stored
 * or sent anywhere yet.
 *
 * TODO (backend): when a real lead pipeline is added, replace the
 * "hide + show success" block below with an AJAX POST (admin-ajax or a
 * REST route) that persists the submission (e.g. a `lead` CPT) and/or
 * emails it, then show success on the server's OK response.
 */

(function () {
  "use strict";

  function initLeadForms() {
    var forms = document.querySelectorAll(".fablab-lead-form");
    if (!forms.length) {
      return;
    }

    forms.forEach(function (form) {
      form.addEventListener("submit", function (e) {
        e.preventDefault();

        // Sibling success message (rendered right after the form).
        var success = form.parentElement
          ? form.parentElement.querySelector(".fablab-lead-success")
          : null;

        form.classList.add("hidden");
        if (success) {
          success.classList.remove("hidden");
        }
        form.reset();
      });
    });
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initLeadForms);
  } else {
    initLeadForms();
  }
})();
